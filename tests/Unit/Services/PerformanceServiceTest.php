<?php

declare(strict_types=1);

namespace Tests\Unit\Services;

use App\Data\PerformanceData;
use App\Exceptions\BusinessRuleException;
use App\Models\Homestay;
use App\Models\Performance;
use App\Services\PerformanceService;
use Carbon\CarbonImmutable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class PerformanceServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_update_denied_when_older_than_3_months(): void
    {
        $homestay = Homestay::factory()->create();
        $performance = Performance::factory()->create([
            'homestay_id' => $homestay->id,
            'tahun' => 2024,
            'bulan' => 1,
        ]);

        // Freeze time to May 2024 so January is older than 3 months
        CarbonImmutable::setTestNow(CarbonImmutable::create(2024, 5, 15));

        $service = app(PerformanceService::class);
        $data = new PerformanceData(
            homestayId: $homestay->id,
            bulan: 1,
            tahun: 2024,
            pelawatDomestik: 10,
            pelawatAsing: 5,
            pendapatan: 100.0,
            sumberLain: 0.0,
        );

        $this->expectException(BusinessRuleException::class);
        $service->updatePerformance($performance, $data);
    }
}
