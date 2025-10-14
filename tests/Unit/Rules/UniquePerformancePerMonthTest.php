<?php

declare(strict_types=1);

namespace Tests\Unit\Rules;

use App\Models\Homestay;
use App\Models\Performance;
use App\Rules\UniquePerformancePerMonth;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Test UniquePerformancePerMonth validation rule.
 */
final class UniquePerformancePerMonthTest extends TestCase
{
    use RefreshDatabase;

    public function test_passes_when_no_duplicate_exists(): void
    {
        $homestay = Homestay::factory()->create();

        $rule = new UniquePerformancePerMonth;
        $rule->setData([
            'homestay_id' => $homestay->id,
            'bulan' => 10,
            'tahun' => 2025,
        ]);

        $failed = false;
        $rule->validate('homestay_id', $homestay->id, function () use (&$failed) {
            $failed = true;
        });

        $this->assertFalse($failed, 'Rule should pass when no duplicate performance record exists');
    }

    public function test_fails_when_duplicate_exists(): void
    {
        $homestay = Homestay::factory()->create();
        Performance::factory()->create([
            'homestay_id' => $homestay->id,
            'bulan' => 10,
            'tahun' => 2025,
        ]);

        $rule = new UniquePerformancePerMonth;
        $rule->setData([
            'homestay_id' => $homestay->id,
            'bulan' => 10,
            'tahun' => 2025,
        ]);

        $failed = false;
        $rule->validate('homestay_id', $homestay->id, function () use (&$failed) {
            $failed = true;
        });

        $this->assertTrue($failed, 'Rule should fail when duplicate performance record exists');
    }

    public function test_passes_when_updating_same_record(): void
    {
        $homestay = Homestay::factory()->create();
        $performance = Performance::factory()->create([
            'homestay_id' => $homestay->id,
            'bulan' => 10,
            'tahun' => 2025,
        ]);

        // Ignore the current record ID when updating
        $rule = new UniquePerformancePerMonth($performance->id);
        $rule->setData([
            'homestay_id' => $homestay->id,
            'bulan' => 10,
            'tahun' => 2025,
        ]);

        $failed = false;
        $rule->validate('homestay_id', $homestay->id, function () use (&$failed) {
            $failed = true;
        });

        $this->assertFalse($failed, 'Rule should pass when updating the same record');
    }

    public function test_passes_when_required_fields_missing(): void
    {
        // Should not fail if other validators will catch missing fields
        $rule = new UniquePerformancePerMonth;
        $rule->setData([]);

        $failed = false;
        $rule->validate('homestay_id', null, function () use (&$failed) {
            $failed = true;
        });

        $this->assertFalse($failed, 'Rule should pass when required fields are missing');
    }
}
