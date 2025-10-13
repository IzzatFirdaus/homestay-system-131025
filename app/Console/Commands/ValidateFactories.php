<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Database\Factories\AuditLogFactory;
use Database\Factories\ClusterFactory;
use Database\Factories\CooperativeFactory;
use Database\Factories\HomestayFactory;
use Database\Factories\ImportFactory;
use Database\Factories\LaporanTerjadualFactory;
use Database\Factories\PerformanceFactory;
use Database\Factories\SystemSettingFactory;
use Database\Factories\UserFactory;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Factories\Factory;

class ValidateFactories extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'factories:validate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Validate all model factories can generate valid data';

    /**
     * Factory classes to validate
     *
     * @var array<int, class-string>
     */
    private array $factories = [
        HomestayFactory::class,
        CooperativeFactory::class,
        ClusterFactory::class,
        PerformanceFactory::class,
        UserFactory::class,
        ImportFactory::class,
        AuditLogFactory::class,
        SystemSettingFactory::class,
        LaporanTerjadualFactory::class,
    ];

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info('🏭 Validating Model Factories...');
        $this->newLine();

        $totals = ['errors' => 0, 'warnings' => 0];

        foreach ($this->factories as $factoryClass) {
            [$errors, $warnings] = $this->validateSingleFactory($factoryClass);
            $totals['errors'] += $errors;
            $totals['warnings'] += $warnings;
        }

        return $this->displaySummaryAndExit($totals['errors'], $totals['warnings']);
    }

    /**
     * Validate a single factory class.
     *
     * @param  class-string  $factoryClass
     * @return array{0:int,1:int}
     */
    private function validateSingleFactory(string $factoryClass): array
    {
        $this->line("Validating <info>{$factoryClass}</info>...");
        $errors = 0;
        $warnings = 0;

        $factory = $this->instantiateFactory($factoryClass, $errors);
        if (! $factory) {
            return [$errors, $warnings];
        }

        $this->testMake($factory, $errors);
        $this->testDefinition($factory, $errors);
        $this->validateFactoryStates($factory, $errors, $warnings);
        $this->testMultipleInstances($factory, $errors);

        $this->displayFactoryResult($errors, $warnings);

        return [$errors, $warnings];
    }

    /**
     * @return Factory<\Illuminate\Database\Eloquent\Model>|null
     */
    private function instantiateFactory(string $factoryClass, int &$errors): ?Factory
    {
        try {
            /** @var Factory<\Illuminate\Database\Eloquent\Model> $factory */
            $factory = new $factoryClass;
            $this->line('   Factory instantiation: <info>OK</info>');

            return $factory;
        } catch (\Exception $e) {
            $this->error("   Factory instantiation: {$e->getMessage()}");
            $errors++;

            return null;
        }
    }

    /**
     * @param  Factory<\Illuminate\Database\Eloquent\Model>  $factory
     */
    private function testMake(Factory $factory, int &$errors): void
    {
        try {
            $factory->make();
            $this->line('  ✅ make() method: <info>OK</info>');
        } catch (\Exception $e) {
            $this->error("  ❌ make() method failed: {$e->getMessage()}");
            $errors++;
        }
    }

    /**
     * @param  Factory<\Illuminate\Database\Eloquent\Model>  $factory
     */
    private function testDefinition(Factory $factory, int &$errors): void
    {
        try {
            $definition = $factory->definition();
            if (is_array($definition)) {
                $this->line('  ✅ definition() returns array: <info>OK</info>');
            } else {
                $this->error('  ❌ definition() must return array');
                $errors++;
            }
        } catch (\Exception $e) {
            $this->error("  ❌ definition() method failed: {$e->getMessage()}");
            $errors++;
        }
    }

    /**
     * @param  Factory<\Illuminate\Database\Eloquent\Model>  $factory
     */
    private function testMultipleInstances(Factory $factory, int &$errors): void
    {
        try {
            $models = $factory->count(3)->make();
            if (method_exists($models, 'count') && $models->count() === 3) {
                $this->line('  ✅ Multiple instances: <info>OK</info>');
            } else {
                $this->error('  ❌ Multiple instances failed: expected 3');
                $errors++;
            }
        } catch (\Exception $e) {
            $this->error("  ❌ Multiple instances failed: {$e->getMessage()}");
            $errors++;
        }
    }

    private function displayFactoryResult(int $errors, int $warnings): void
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

    private function displaySummaryAndExit(int $totalErrors, int $totalWarnings): int
    {
        // Summary
        $this->line('<bg=blue;fg=white> VALIDATION SUMMARY </bg=blue;fg=white>');
        $this->line('Factories validated: <info>'.count($this->factories).'</info>');
        $this->line("Total errors: <comment>{$totalErrors}</comment>");
        $this->line("Total warnings: <comment>{$totalWarnings}</comment>");

        if ($totalErrors === 0) {
            $this->line('<bg=green;fg=white> ✅ ALL FACTORIES VALID </bg=green;fg=white>');

            return Command::SUCCESS;
        }

        $this->line('<bg=red;fg=white> ❌ VALIDATION FAILED </bg=red;fg=white>');

        return Command::FAILURE;
    }

    /**
     * Validate factory states if they exist
     */
    /**
     * @param  Factory<\Illuminate\Database\Eloquent\Model>  $factory
     */
    private function validateFactoryStates(Factory $factory, int &$errors, int &$warnings): void
    {
        $factoryName = class_basename($factory::class);
        $states = $this->expectedStatesFor($factoryName);
        if ($states === []) {
            return;
        }
        $stateErrors = 0;

        foreach ($states as $state) {
            if (! $this->hasState($factory, $state, $warnings)) {
                continue;
            }

            if (! $this->executeState($factory, $state, $stateErrors)) {
                continue;
            }

            $this->line("  ✅ State '{$state}': <info>OK</info>");
        }

        if ($stateErrors > 0) {
            $errors += $stateErrors;
        }
    }

    /**
     * @return list<string>
     */
    private function expectedStatesFor(string $factoryName): array
    {
        return match ($factoryName) {
            'HomestayFactory' => ['ecoTourism', 'culturalHeritage'],
            'PerformanceFactory' => ['highPerforming'],
            'UserFactory' => ['inactive', 'unverified'],
            'ImportFactory' => ['successful', 'failed', 'processing', 'pending'],
            'LaporanTerjadualFactory' => ['monthly', 'quarterly', 'annual', 'custom', 'disabled'],
            'AuditLogFactory' => [
                'loginEvent', 'profileUpdate', 'dataCreation', 'dataUpdate', 'systemEvent',
                'importEvent', 'reportEvent', 'securityEvent', 'errorEvent',
            ],
            default => [],
        };
    }

    /**
     * @param  Factory<\Illuminate\Database\Eloquent\Model>  $factory
     */
    private function hasState(Factory $factory, string $state, int &$warnings): bool
    {
        if (! method_exists($factory, $state)) {
            $this->warn("  ⚠️  State method missing: {$state}");
            $warnings++;

            return false;
        }

        return true;
    }

    /**
     * @param  Factory<\Illuminate\Database\Eloquent\Model>  $factory
     */
    private function executeState(Factory $factory, string $state, int &$stateErrors): bool
    {
        try {
            $result = $factory->{$state}();
            if (is_object($result) && method_exists($result, 'make')) {
                $result->make();
            } else {
                // Fallback: call make on original factory
                $factory->make();
            }
        } catch (\Exception $e) {
            $this->error("  ❌ State '{$state}' failed: {$e->getMessage()}");
            $stateErrors++;

            return false;
        }

        return true;
    }
}
