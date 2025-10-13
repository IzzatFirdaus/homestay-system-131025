<?php

declare(strict_types=1);

namespace Tests\Unit\Services;

use App\Data\ReportType;
use App\Models\Homestay;
use App\Models\Performance;
use App\Services\ReportService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Tests\TestCase;

final class ReportServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_generate_dashboard_summary_xlsx(): void
    {
        Excel::fake();
        Storage::fake('local');

        // seed minimal data
        $homestay = Homestay::factory()->create(['negeri' => 'Selangor']);
        Performance::factory()->create([
            'homestay_id' => $homestay->id,
            'tahun' => 2025,
            'bulan' => 9,
        ]);

        $service = app(ReportService::class);
        $file = $service->generateReport(ReportType::DashboardSummary, ['negeri' => 'Selangor'], 'xlsx');

        $this->assertSame('local', $file->disk);
        $this->assertStringEndsWith('.xlsx', $file->path);
        $this->assertSame('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', $file->mimeType);
    }
}
