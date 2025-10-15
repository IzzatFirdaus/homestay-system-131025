<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AuditTranslations extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'translations:audit
                            {--output=translation-audit.json : Output file path}
                            {--fix : Attempt to add missing keys to translation files}
                            {--detailed : Show detailed output}';

    /**
     * The console command description.
     */
    protected $description = 'Audit Blade/Volt files for hardcoded text and suggest translation keys';

    /**
     * Detected hardcoded strings.
     *
     * @var array<string, array<string, mixed>>
     */
    private array $hardcodedStrings = [];

    /**
     * Loaded translation files per locale and namespace.
     *
     * @var array<string, array<string, mixed>>
     */
    private array $translationFiles = [];

    private int $filesScanned = 0;

    private int $stringsFound = 0;

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info('🔍 Starting translation audit...');

        $this->loadTranslationFiles();
        $this->scanBladeFiles();
        $this->generateReport();

        if ($this->option('fix')) {
            $this->addMissingTranslations();
        }

        return Command::SUCCESS;
    }

    private function loadTranslationFiles(): void
    {
        $locales = ['ms', 'en'];

        foreach ($locales as $locale) {
            $path = resource_path("lang/{$locale}");

            if (! File::isDirectory($path)) {
                continue;
            }

            foreach (File::files($path) as $file) {
                if ($file->getExtension() === 'php') {
                    $namespace = $file->getBasename('.php');
                    $data = require $file->getPathname();
                    // Ensure we only store arrays
                    $this->translationFiles[$locale][$namespace] = is_array($data) ? $data : [];
                }
            }
        }

        $msNamespaces = $this->translationFiles['ms'] ?? [];
        $this->info('✅ Loaded translation files: ' . count((array) $msNamespaces) . ' namespaces');
    }

    private function scanBladeFiles(): void
    {
        $viewsPath = resource_path('views');
        $bladeFiles = File::allFiles($viewsPath);

        $this->info("📂 Scanning {$viewsPath}...");

        foreach ($bladeFiles as $file) {
            if (! Str::endsWith($file->getFilename(), ['.blade.php', '.volt.php'])) {
                continue;
            }

            $this->scanFile($file->getPathname());
        }

        $this->info("✅ Scanned {$this->filesScanned} files, found {$this->stringsFound} potential hardcoded strings");
    }

    private function scanFile(string $filePath): void
    {
        $this->filesScanned++;
        $content = File::get($filePath);
        $relativePath = str_replace(resource_path('views') . '/', '', $filePath);

        // Patterns to detect hardcoded text
        $patterns = [
            // Text in quotes within HTML tags (excluding attributes and Blade directives)
            '/>\s*(["\'])([A-Z][^<>{}@]*?)\1\s*</u',
            // Placeholder attributes
            '/placeholder\s*=\s*["\']([^"\'{}@]+?)["\']/u',
            // Title/label/aria attributes with hardcoded text
            '/(?:title|aria-label|alt)\s*=\s*["\']([^"\'{}@]+?)["\']/u',
            // Alert/message text
            '/<(?:p|span|div|h[1-6])[^>]*>\s*([A-Z][^<>{}@]{5,}?)\s*<\//u',
            // Button/link text
            '/<(?:button|a)[^>]*>\s*([A-Z][^<>{}@]{2,}?)\s*<\//u',
        ];

        foreach ($patterns as $pattern) {
            $matches = [];
            if (preg_match_all($pattern, $content, $matches, PREG_OFFSET_CAPTURE)) {
                $items = [];
                // Merge all capture groups (1..n) into a single list of matches. preg_match_all always returns arrays for groups when matches are found.
                foreach ($matches as $index => $group) {
                    if ($index === 0) {
                        continue; // skip full match
                    }

                    foreach ($group as $m) {
                        $items[] = $m;
                    }
                }

                foreach ($items as $match) {
                    // preg_match_all returns capture group arrays of [string, offset]
                    // preg_match_all returned a capture group with [string, offset]
                    $matchedString = (string) $match[0];
                    $matchedOffset = (int) $match[1];

                    $text = trim((string) $matchedString);

                    // Skip if empty, too short, or already translated
                    if ($text === '' || strlen($text) < 2 || $this->isTranslationCall($text) || $this->isVariable($text)) {
                        continue;
                    }

                    // Skip common HTML/PHP constructs
                    if ($this->shouldSkip($text)) {
                        continue;
                    }

                    $position = (int) $matchedOffset;
                    $this->recordHardcodedString($text, $relativePath, $position);
                    $this->stringsFound++;
                }
            }
        }
    }

    private function isTranslationCall(string $text): bool
    {
        return Str::contains($text, ['__', 'trans', '@lang', '{{', '{!!', '$']);
    }

    private function isVariable(string $text): bool
    {
        return Str::startsWith($text, ['$', '@', 'wire:', 'x-']);
    }

    private function shouldSkip(string $text): bool
    {
        $skipPatterns = [
            '/^[\d\s\.\-\/]+$/', // Only numbers/symbols
            '/^[a-z_\-]+$/', // Lowercase identifiers
            '/^https?:\/\//', // URLs
            '/^\w+\(/', // Function calls
            '/^</', // HTML tags
            '/^[\W_]+$/', // Only special chars
        ];

        foreach ($skipPatterns as $pattern) {
            if (preg_match($pattern, $text)) {
                return true;
            }
        }

        // Skip very long strings (likely code/markdown)
        if (strlen($text) > 100) {
            return true;
        }

        return false;
    }

    private function recordHardcodedString(string $text, string $file, int $position): void
    {
        $key = $this->suggestTranslationKey($text, $file);
        if (! isset($this->hardcodedStrings[$key]) || ! is_array($this->hardcodedStrings[$key])) {
            $this->hardcodedStrings[$key] = [
                'text' => $text,
                'suggested_key' => $key,
                'occurrences' => [],
                'exists_in_ms' => $this->existsInTranslations($key, 'ms'),
                'exists_in_en' => $this->existsInTranslations($key, 'en'),
            ];
        }

        // Ensure occurrences is an array and append safely
        $entry = &$this->hardcodedStrings[$key];
        if (! isset($entry['occurrences']) || ! is_array($entry['occurrences'])) {
            $entry['occurrences'] = [];
        }

        $entry['occurrences'][] = [
            'file' => $file,
            'position' => $position,
        ];
    }

    private function suggestTranslationKey(string $text, string $file): string
    {
        // Determine namespace from file path
        $namespace = $this->guessNamespace($file);

        // Generate key from text
        $key = (string) Str::snake(Str::limit($text, 50, ''));
        $key = (string) preg_replace('/[^a-z0-9_]/', '_', $key);
        $key = (string) preg_replace('/_+/', '_', $key);
        $key = (string) trim($key, '_');

        return "{$namespace}.{$key}";
    }

    private function guessNamespace(string $file): string
    {
        if (Str::contains($file, 'pages/dashboard')) {
            return 'dashboard';
        }
        if (Str::contains($file, 'pages/homestays') || Str::contains($file, 'livewire/homestays')) {
            return 'homestays';
        }
        if (Str::contains($file, 'pages/performances') || Str::contains($file, 'livewire/performances')) {
            return 'performances';
        }
        if (Str::contains($file, 'pages/imports') || Str::contains($file, 'livewire/imports')) {
            return 'imports';
        }
        if (Str::contains($file, 'pages/reports') || Str::contains($file, 'livewire/reports')) {
            return 'reports';
        }
        if (Str::contains($file, 'layouts')) {
            return 'layout';
        }

        return 'common';
    }

    private function existsInTranslations(string $key, string $locale): bool
    {
        $parts = explode('.', $key);
        $namespace = array_shift($parts);
        $translations = $this->translationFiles[$locale][$namespace] ?? [];
        if (! is_array($translations)) {
            return false;
        }

        foreach ($parts as $part) {
            if (! is_array($translations) || ! isset($translations[$part])) {
                return false;
            }
            $translations = $translations[$part];
        }

        return true;
    }

    private function generateReport(): void
    {
        $outputPath = (string) $this->option('output');

        $missingInMs = array_filter($this->hardcodedStrings, function ($s): bool {
            return ! ($s['exists_in_ms'] ?? false);
        });

        $missingInEn = array_filter($this->hardcodedStrings, function ($s): bool {
            return ! ($s['exists_in_en'] ?? false);
        });

        $report = [
            'summary' => [
                'files_scanned' => $this->filesScanned,
                'strings_found' => $this->stringsFound,
                'unique_strings' => count($this->hardcodedStrings),
                'missing_in_ms' => count($missingInMs),
                'missing_in_en' => count($missingInEn),
            ],
            'hardcoded_strings' => $this->hardcodedStrings,
        ];

        File::put($outputPath, (string) json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        $this->info("\n📊 Audit Report:");
        $this->table(
            ['Metric', 'Count'],
            [
                ['Files Scanned', $report['summary']['files_scanned']],
                ['Strings Found', $report['summary']['strings_found']],
                ['Unique Strings', $report['summary']['unique_strings']],
                ['Missing in MS', $report['summary']['missing_in_ms']],
                ['Missing in EN', $report['summary']['missing_in_en']],
            ]
        );

        $this->info("💾 Full report saved to: {$outputPath}");

        if ($this->option('detailed')) {
            $this->displayDetailedReport();
        }
    }

    private function displayDetailedReport(): void
    {
        $this->newLine();
        $this->info('🔍 Detailed Findings:');

        foreach ($this->hardcodedStrings as $data) {
            $existsInMs = $data['exists_in_ms'] ?? false;
            $existsInEn = $data['exists_in_en'] ?? false;

            if (! $existsInMs || ! $existsInEn) {
                $this->line('');
                $this->warn('Text: ' . (is_string($data['text'] ?? null) ? $data['text'] : ''));
                $this->line('Suggested key: ' . (is_string($data['suggested_key'] ?? null) ? $data['suggested_key'] : ''));
                $this->line('Status: ' . ($existsInMs ? '✓' : '✗') . ' MS | ' . ($existsInEn ? '✓' : '✗') . ' EN');

                $occurrences = $data['occurrences'] ?? [];
                $count = is_array($occurrences) ? count($occurrences) : 0;
                $this->line('Found in: ' . $count . ' location(s)');

                if (is_array($occurrences)) {
                    foreach (array_slice($occurrences, 0, 3) as $occurrence) {
                        $file = '';
                        if (is_array($occurrence) && isset($occurrence['file']) && is_string($occurrence['file'])) {
                            $file = $occurrence['file'];
                        }

                        $this->line('  - ' . $file);
                    }
                }
            }
        }
    }

    private function addMissingTranslations(): void
    {
        if (empty($this->hardcodedStrings)) {
            $this->info('✅ No missing translations to add.');

            return;
        }

        $this->info("\n🔧 Adding missing translation keys...");

        $added = ['ms' => 0, 'en' => 0];

        foreach ($this->hardcodedStrings as $data) {
            $key = $data['suggested_key'] ?? null;
            $text = $data['text'] ?? null;

            if (! is_string($key) || ! is_string($text)) {
                continue;
            }

            if (empty($data['exists_in_ms'])) {
                $this->addTranslationKey($key, $text, 'ms');
                $added['ms']++;
            }
            if (empty($data['exists_in_en'])) {
                $this->addTranslationKey($key, $text, 'en');
                $added['en']++;
            }
        }

        $this->info("✅ Added {$added['ms']} keys to MS, {$added['en']} keys to EN");
        $this->warn('⚠️  Please review and translate EN keys manually!');
    }

    private function addTranslationKey(string $key, string $value, string $locale): void
    {
        $parts = explode('.', $key);
        $namespace = array_shift($parts);
        $filePath = resource_path("lang/{$locale}/{$namespace}.php");

        if (! File::exists($filePath)) {
            $this->createTranslationFile($filePath);
        }

        $translations = require $filePath;
        if (! is_array($translations)) {
            $translations = [];
        }

        $this->setNestedValue($translations, $parts, $value);

        $this->writeTranslationFile($filePath, $translations);
    }

    private function createTranslationFile(string $filePath): void
    {
        $stub = <<<'PHP'
<?php

declare(strict_types=1);

return [
    //
];

PHP;

        File::put($filePath, $stub);
    }

    /**
     * Set a nested translation value inside an array.
     *
     * @param  array<mixed>  $array
     * @param  list<string>  $keys
     */
    private function setNestedValue(array &$array, array $keys, mixed $value): void
    {
        $key = array_shift($keys);

        if (empty($keys)) {
            $array[$key] = $value;

            return;
        }

        if (! isset($array[$key]) || ! is_array($array[$key])) {
            $array[$key] = [];
        }

        $this->setNestedValue($array[$key], $keys, $value);
    }

    /**
     * @param  array<mixed>  $translations
     */
    private function writeTranslationFile(string $filePath, array $translations): void
    {
        $export = var_export($translations, true);
        $content = <<<PHP
<?php

declare(strict_types=1);

return {$export};

PHP;

        File::put($filePath, $content);
    }
}
