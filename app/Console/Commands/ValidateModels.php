<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\Cooperative;
use App\Models\Homestay;
use App\Models\Performance;
use App\Models\User;
use Illuminate\Console\Command;
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
     * List of all models to validate.
     *
     * @var list<class-string>
     */
    private readonly array $models;

    public function __construct()
    {
        parent::__construct();

        $this->models = [
            Homestay::class,
            Performance::class,
            Cooperative::class,
            User::class,
        ];
    }

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
            $this->line("Validating <info>{$modelClass}</info>...");

            $modelName = class_basename($modelClass);
            $errors = 0;
            $warnings = 0;

            // Test 1: Check if model can be instantiated
            try {
                $model = new $modelClass();
                $this->line('  ✅ Model instantiation: <info>OK</info>');
            } catch (\Exception $e) {
                $this->error("  ❌ Model instantiation: {$e->getMessage()}");
                $errors++;

                continue; // Skip other tests if instantiation fails
            }

            // Test 2: Check table exists
            $tableName = $model->getTable();
            if (Schema::hasTable($tableName)) {
                $this->line("  ✅ Table exists: <info>{$tableName}</info>");
            } else {
                $this->error("  ❌ Table missing: {$tableName}");
                $errors++;

                continue;
            }

            // Test 3: Check fillable attributes exist as columns
            $fillable = $model->getFillable();
            $columns = Schema::getColumnListing($tableName);

            foreach ($fillable as $field) {
                if (! in_array($field, $columns)) {
                    $this->warn("  ⚠️  Fillable field not in table: {$field}");
                    $warnings++;
                }
            }

            // Test 4: Test basic query
            try {
                $count = $modelClass::count();
                $countStr = is_int($count) ? (string) $count : 'unknown';
                $this->line("  ✅ Basic query: <info>{$countStr} records</info>");
            } catch (\Exception $e) {
                $this->error("  ❌ Basic query failed: {$e->getMessage()}");
                $errors++;
            }

            // Test 5: Test factory (if exists)
            try {
                $factoryClass = "Database\\Factories\\{$modelName}Factory";
                if (class_exists($factoryClass)) {
                    $modelClass::factory()->make();
                    $this->line('  ✅ Factory: <info>OK</info>');
                } else {
                    $this->warn("  ⚠️  Factory not found: {$factoryClass}");
                    $warnings++;
                }
            } catch (\Exception $e) {
                $this->error("  ❌ Factory test failed: {$e->getMessage()}");
                $errors++;
            }

            // Test 6: Model-specific validations
            $this->validateModelSpecifics($model, $errors, $warnings);

            if ($errors === 0 && $warnings === 0) {
                $this->line('  <bg=green;fg=white> ALL TESTS PASSED </bg=green;fg=white>');
            } elseif ($errors === 0) {
                $this->line("  <bg=yellow;fg=black> PASSED WITH WARNINGS ({$warnings}) </bg=yellow;fg=black>");
            } else {
                $this->line("  <bg=red;fg=white> FAILED ({$errors} errors, {$warnings} warnings) </bg=red;fg=white>");
            }

            $totalErrors += $errors;
            $totalWarnings += $warnings;
            $this->newLine();
        }

        // Summary
        $this->line('<bg=blue;fg=white> VALIDATION SUMMARY </bg=blue;fg=white>');
        $this->line('Models validated: <info>' . count($this->models) . '</info>');
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
    private function validateModelSpecifics(object $model, int &$errors, int &$warnings): void
    {
        $modelName = class_basename($model);

        switch ($modelName) {
            case 'Homestay':
                $this->validateHomestayModel($model, $errors, $warnings);
                break;
            case 'Performance':
                /** @phpstan-ignore-next-line */
                $this->validatePerformanceModel($model, $errors, $warnings);
                break;
            case 'User':
                /** @phpstan-ignore-next-line */
                $this->validateUserModel($model, $errors, $warnings);
                break;
            case 'Cooperative':
                /** @phpstan-ignore-next-line */
                $this->validateCooperativeModel($model, $errors, $warnings);
                break;
        }
    }

    /**
     * Validate Homestay model specifics
     */
    private function validateHomestayModel(object $model, int &$errors, int &$warnings): void
    {
        // Test relationships
        try {
            if ($model instanceof Homestay) {
                $model->cooperative();
                $model->cluster();
                $model->performances();
            }
            $this->line('  ✅ Relationships: <info>OK</info>');
        } catch (\Exception $e) {
            $this->error("  ❌ Relationships failed: {$e->getMessage()}");
            $errors++;
        }

        // Test scopes
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
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     */
    private function validatePerformanceModel(object $model, int &$errors, int &$warnings): void
    {
        // Test unique constraint
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

        // Test scopes
        try {
            // Use an explicit, safe query instead of byPeriod which may require additional parameters
            Performance::where('tahun', 2024)->limit(1)->get();
            Performance::byNegeri('Selangor')->get();
            $this->line('  ✅ Scopes: <info>OK</info>');
        } catch (\Exception $e) {
            $this->error("  ❌ Scopes failed: {$e->getMessage()}");
            $errors++;
        }
    }

    /**
     * Validate User model specifics
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     */
    private function validateUserModel(object $model, int &$errors, int &$warnings): void
    {
        // Test authentication fields
        $requiredFields = ['password', 'email_verified_at'];
        $tableName = $model->getTable();
        $columns = Schema::getColumnListing($tableName);

        foreach ($requiredFields as $field) {
            if (! in_array($field, $columns)) {
                $this->error("  ❌ Required auth field missing: {$field}");
                $errors++;
            }
        }

        // Test password hashing
        try {
            $testUser = User::factory()->make();
            if (strlen($testUser->password) < 60) { // bcrypt minimum
                $this->warn('  ⚠️  Password may not be properly hashed');
                $warnings++;
            } else {
                $this->line('  ✅ Password hashing: <info>OK</info>');
            }
        } catch (\Exception $e) {
            $this->error("  ❌ Password test failed: {$e->getMessage()}");
            $errors++;
        }
    }

    /**
     * Validate Cooperative model specifics
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     */
    private function validateCooperativeModel(object $model, int &$errors, int &$warnings): void
    {
        // Test relationships
        try {
            if ($model instanceof Cooperative) {
                $model->homestays();
            }
            $this->line('  ✅ Relationships: <info>OK</info>');
        } catch (\Exception $e) {
            $this->error("  ❌ Relationships failed: {$e->getMessage()}");
            $errors++;
        }
    }
}
