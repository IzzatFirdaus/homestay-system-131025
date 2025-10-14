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
     * @var class-string[]
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

        $totalErrors = 0;
        $totalWarnings = 0;

        foreach ($this->factories as $factoryClass) {
            $this->line("Validating <info>{$factoryClass}</info>...");

            // $factoryName derived from $factoryClass if needed for messaging
            $errors = 0;
            $warnings = 0;

            // Test 1: Check if factory can be instantiated
            try {
                $factory = new $factoryClass;
                $this->line('  ✅ Factory instantiation: <info>OK</info>');
            } catch (\Exception $e) {
                $this->error("  ❌ Factory instantiation: {$e->getMessage()}");
                $errors++;

                continue;
            }

            // Test 2: Test make() method
            try {
                // Ensure make() works without persisting
                $factory->make();
                $this->line('  ✅ make() method: <info>OK</info>');
            } catch (\Exception $e) {
                $this->error("  ❌ make() method failed: {$e->getMessage()}");
                $errors++;
            }

            // Test 3: Test definition returns array
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

            // Test 4: Test factory states (if any)
            $this->validateFactoryStates($factory, $errors, $warnings);

            // Test 5: Test multiple instances
            try {
                $models = $factory->count(3)->make();
                if ($models->count() === 3) {
                    $this->line('  ✅ Multiple instances: <info>OK</info>');
                } else {
                    $this->error("  ❌ Multiple instances failed: expected 3, got {$models->count()}");
                    $errors++;
                }
            } catch (\Exception $e) {
                $this->error("  ❌ Multiple instances failed: {$e->getMessage()}");
                $errors++;
            }

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
    private function validateFactoryStates(object $factory, int &$errors, int &$warnings): void
    {
        $factoryName = class_basename($factory::class);

        // Define expected states for each factory
        $expectedStates = [
            'HomestayFactory' => ['ecoTourism', 'culturalHeritage'],
            'PerformanceFactory' => ['highPerforming'],
            'UserFactory' => ['inactive', 'unverified'],
            'ImportFactory' => ['successful', 'failed', 'processing', 'pending'],
            'LaporanTerjadualFactory' => ['monthly', 'quarterly', 'annual', 'custom', 'disabled'],
            'AuditLogFactory' => ['loginEvent', 'profileUpdate', 'dataCreation', 'dataUpdate', 'systemEvent', 'importEvent', 'reportEvent', 'securityEvent', 'errorEvent'],
        ];

        if (! isset($expectedStates[$factoryName])) {
            return; // No specific states expected
        }

        $states = $expectedStates[$factoryName];
        $stateErrors = 0;

        foreach ($states as $state) {
            try {
                $factory->$state()->make();
                $this->line("  ✅ State '{$state}': <info>OK</info>");
            } catch (\Exception $e) {
                $this->error("  ❌ State '{$state}' failed: {$e->getMessage()}");
                $stateErrors++;
            }
        }

        if ($stateErrors > 0) {
            $errors += $stateErrors;
        }
    }
}
