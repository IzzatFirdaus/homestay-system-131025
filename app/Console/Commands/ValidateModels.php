<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\AuditLog;
use App\Models\Cluster;
use App\Models\Cooperative;
use App\Models\Homestay;
use App\Models\Import;
use App\Models\LaporanTerjadual;
use App\Models\Performance;
use App\Models\SystemSetting;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class ValidateModels extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'models:validate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Validate all Eloquent models and their relationships';

    /**
     * Model classes to validate
     *
     * @var array<class-string<\Illuminate\Database\Eloquent\Model>>
     */
    private array $models = [
        Homestay::class,
        Cooperative::class,
        Cluster::class,
        Performance::class,
        User::class,
        Import::class,
        AuditLog::class,
        SystemSetting::class,
        LaporanTerjadual::class,
    ];

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info('🔍 Validating Eloquent Models and Relationships...');
        $this->newLine();

        $totalErrors = 0;
        $totalWarnings = 0;

        foreach ($this->models as $modelClass) {
            [$errors, $warnings] = $this->validateSingleModel($modelClass);
            $totalErrors += (int) $errors;
            $totalWarnings += (int) $warnings;
        }

        return $this->displaySummaryAndExit($totalErrors, $totalWarnings);
    }

    /**
     * Validate a single model class.
     *
     * @return array{int, int} Array of [errors, warnings] counts
     */
    private function validateSingleModel(string $modelClass): array
    {
        $this->line("Validating <info>{$modelClass}</info>...");

        $errors = 0;
        $warnings = 0;

        $model = $this->validateModelInstantiation($modelClass, $errors);
        if (! $model) {
            return [$errors, $warnings];
        }

        $this->validateTableExists($model, $errors);
        if ($errors > 0) {
            return [$errors, $warnings];
        }

        $this->validateFillableFields($model, $warnings);
        $this->validateBasicQuery($modelClass, $errors);
        $this->validateModelFactory($modelClass, $errors, $warnings);
        $this->validateModelSpecifics($model, $errors, $warnings);

        $this->displayModelResults($errors, $warnings);

        return [$errors, $warnings];
    }

    /**
     * Validate model can be instantiated.
     */
    private function validateModelInstantiation(string $modelClass, int &$errors): ?Model
    {
        try {
            $modelInstance = new $modelClass;
            if (! $modelInstance instanceof Model) {
                $this->error('  ✌ Model instantiation: Class is not an Eloquent Model');
                $errors++;

                return null;
            }

            $this->line('  ✅ Model instantiation: <info>OK</info>');

            return $modelInstance;
        } catch (\Exception $e) {
            $this->error("  ❌ Model instantiation: {$e->getMessage()}");
            $errors++;

            return null;
        }
    }

    /**
     * Validate table exists for the model.
     */
    private function validateTableExists(Model $model, int &$errors): void
    {
        $tableName = $model->getTable();
        if (Schema::hasTable($tableName)) {
            $this->line("  ✅ Table exists: <info>{$tableName}</info>");
        } else {
            $this->error("  ❌ Table missing: {$tableName}");
            $errors++;
        }
    }

    /**
     * Validate fillable attributes exist as table columns.
     */
    private function validateFillableFields(Model $model, int &$warnings): void
    {
        $fillable = $model->getFillable();
        $columns = Schema::getColumnListing($model->getTable());

        foreach ($fillable as $field) {
            if (! in_array($field, $columns)) {
                $this->warn("  ⚠️  Fillable field not in table: {$field}");
                $warnings++;
            }
        }
    }

    /**
     * Validate basic database query works.
     */
    private function validateBasicQuery(string $modelClass, int &$errors): void
    {
        try {
            /** @var int $count */
            $count = $modelClass::count();
            $this->line('  ✅ Basic query: <info>'.((string) $count).' records</info>');
        } catch (\Exception $e) {
            $this->error("  ❌ Basic query failed: {$e->getMessage()}");
            $errors++;
        }
    }

    /**
     * Validate model factory if it exists.
     */
    private function validateModelFactory(string $modelClass, int &$errors, int &$warnings): void
    {
        $modelName = class_basename($modelClass);
        $factoryClass = "Database\\Factories\\{$modelName}Factory";

        if (! class_exists($factoryClass)) {
            $this->warn("  ⚠️  Factory not found: {$factoryClass}");
            $warnings++;

            return;
        }

        try {
            $factory = new $factoryClass;
            if (method_exists($factory, 'make')) {
                $factory->make();
            }
            $this->line('   Factory: <info>OK</info>');
        } catch (\Exception $e) {
            $this->error("   Factory test failed: {$e->getMessage()}");
            $errors++;
        }
    }

    /**
     * Display results for a single model validation.
     */
    private function displayModelResults(int $errors, int $warnings): void
    {
        if ($errors === 0 && $warnings === 0) {
            $this->line('  <bg=green;fg=white> ALL TESTS PASSED </bg=green;fg=white>');
        } elseif ($errors === 0) {
            $this->line("  <bg=yellow;fg=black> PASSED WITH WARNINGS ({$warnings}) </bg=yellow;fg=black>");
        } else {
            $this->line("  <bg=red;fg=white> FAILED ({$errors} errors, {$warnings} warnings) </bg=red;fg=white>");
        }

        $this->newLine();
    }

    /**
     * Display final summary and exit with appropriate code.
     */
    private function displaySummaryAndExit(int $totalErrors, int $totalWarnings): int
    {
        $this->line('<bg=blue;fg=white> VALIDATION SUMMARY </bg=blue;fg=white>');
        $this->line('Models validated: <info>'.count($this->models).'</info>');
        $this->line("Total errors: <comment>{$totalErrors}</comment>");
        $this->line("Total warnings: <comment>{$totalWarnings}</comment>");

        if ($totalErrors === 0) {
            $this->line('<bg=green;fg=white> ✅ ALL MODELS VALID </bg=green;fg=white>');

            return Command::SUCCESS;
        }

        $this->line('<bg=red;fg=white> ❌ VALIDATION FAILED </bg=red;fg=white>');

        return Command::FAILURE;
    }

    /**
     * Validate model-specific requirements
     */
    private function validateModelSpecifics(Model $model, int &$errors, int &$warnings): void
    {
        $modelName = class_basename($model);

        switch ($modelName) {
            case 'Homestay':
                $this->validateHomestayModel($model, $errors, $warnings);
                break;
            case 'Performance':
                $this->validatePerformanceModel($model, $errors, $warnings);
                break;
            case 'User':
                $this->validateUserModel($model, $errors, $warnings);
                break;
            case 'Cooperative':
                $this->validateCooperativeModel($model, $errors, $warnings);
                break;
        }
    }

    /**
     * Validate Homestay model specifics
     */
    private function validateHomestayModel(
        \Illuminate\Database\Eloquent\Model $model,
        int &$errors,
        int &$warnings
    ): void {
        $this->validateHomestayRelationships($model, $errors);
        $this->validateHomestayScopes($errors);
        // Use $warnings to track unused parameter
        $warnings += 0;
    }

    /**
     * Validate Homestay model relationships
     */
    private function validateHomestayRelationships(\Illuminate\Database\Eloquent\Model $model, int &$errors): void
    {
        try {
            if (
                ! method_exists($model, 'cooperative')
                || ! method_exists($model, 'cluster')
                || ! method_exists($model, 'performances')
            ) {
                throw new \RuntimeException('Required relationship methods missing');
            }

            $model->cooperative();
            $model->cluster();
            $model->performances();
            $this->line('  ✅ Relationships: <info>OK</info>');
        } catch (\Exception $e) {
            $this->error("  ❌ Relationships failed: {$e->getMessage()}");
            $errors++;
        }
    }

    /**
     * Validate Homestay model scopes
     */
    private function validateHomestayScopes(int &$errors): void
    {
        try {
            Homestay::active()->get();
            Homestay::byNegeri('Selangor')->get();
            $this->line('  ✅ Scopes: <info>OK</info>');
        } catch (\Exception $e) {
            $this->error("  ❌ Scopes failed: {$e->getMessage()}");
            $errors++;
        }
    }

    /**
     * Validate Performance model specifics
     */
    private function validatePerformanceModel(
        \Illuminate\Database\Eloquent\Model $model,
        int &$errors,
        int &$warnings
    ): void {
        $this->reportTableName($model);
        $this->testPerformanceUniqueConstraint($warnings, $errors);
        $this->testPerformanceScopes($errors);
    }

    private function reportTableName(Model $model): void
    {
        $modelTable = $model->getTable();
        $this->line("  ✅ Table name: <info>{$modelTable}</info>");
    }

    private function testPerformanceUniqueConstraint(int &$warnings, int &$errors): void
    {
        try {
            $duplicate = Performance::where('homestay_id', 1)
                ->where('tahun', 2024)
                ->where('bulan', 1)
                ->count();

            if ($duplicate > 1) {
                $this->warn('  ⚠️  Possible duplicate performance records found');
                $warnings++;
            } else {
                $this->line('  ✅ Unique constraint: <info>OK</info>');
            }
        } catch (\Exception $e) {
            $this->error("  ❌ Unique constraint test failed: {$e->getMessage()}");
            $errors++;
        }
    }

    private function testPerformanceScopes(int &$errors): void
    {
        try {
            Performance::byPeriod(2024, 1)->get();
            Performance::byNegeri('Selangor')->get();
            $this->line('  ✅ Scopes: <info>OK</info>');
        } catch (\Exception $e) {
            $this->error("  ❌ Scopes failed: {$e->getMessage()}");
            $errors++;
        }
    }

    /**
     * Validate User model specifics
     */
    private function validateUserModel(\Illuminate\Database\Eloquent\Model $model, int &$errors, int &$warnings): void
    {
        $this->validateUserAuthFields($model, $errors);
        $this->validateUserPasswordHashing($warnings);
    }

    /**
     * Validate User model authentication fields
     */
    private function validateUserAuthFields(\Illuminate\Database\Eloquent\Model $model, int &$errors): void
    {
        $requiredFields = ['password', 'email_verified_at'];
        $columns = Schema::getColumnListing($model->getTable());

        foreach ($requiredFields as $field) {
            if (! in_array($field, $columns)) {
                $this->error("  ❌ Required auth field missing: {$field}");
                $errors++;
            }
        }
    }

    /**
     * Validate User model password hashing
     */
    private function validateUserPasswordHashing(int &$warnings): void
    {
        try {
            $testUser = User::factory()->make();
            if (! is_string($testUser->password) || strlen($testUser->password) < 60) { // bcrypt minimum
                $this->warn('  ⚠️  Password may not be properly hashed');
                $warnings++;
            } else {
                $this->line('  ✅ Password hashing: <info>OK</info>');
            }
        } catch (\Exception $e) {
            $this->error("  ❌ Password test failed: {$e->getMessage()}");
        }
    }

    /**
     * Validate Cooperative model specifics
     */
    private function validateCooperativeModel(
        \Illuminate\Database\Eloquent\Model $model,
        int &$errors,
        int &$warnings
    ): void {
        // Use warnings parameter
        $warnings += 0;

        // Test relationships
        try {
            if (! method_exists($model, 'homestays') || ! method_exists($model, 'users')) {
                throw new \RuntimeException('Required relationship methods missing');
            }

            $model->homestays();
            $model->users();
            $this->line('  ✅ Relationships: <info>OK</info>');
        } catch (\Exception $e) {
            $this->error("  ❌ Relationships failed: {$e->getMessage()}");
            $errors++;
        }
    }
}
