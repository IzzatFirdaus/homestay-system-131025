<?php

declare(strict_types=1);

namespace Tests\Unit\Services;

use App\Data\HomestayData;
use App\Exceptions\BusinessRuleException;
use App\Models\Homestay;
use App\Services\HomestayService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class HomestayServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_homestay_success(): void
    {
        $service = app(HomestayService::class);

        $data = new HomestayData(
            nama: 'Kampung Indah',
            negeri: 'Selangor',
            alamat: 'Alamat',
            kapasiti: 10,
            fasiliti: null,
            modelPengurusan: 'individu',
            cooperativeId: null,
            status: 'Aktif',
            clusterId: null,
        );

        $homestay = $service->createHomestay($data);

        $this->assertInstanceOf(Homestay::class, $homestay);
        $this->assertDatabaseHas('homestays', ['nama' => 'Kampung Indah', 'negeri' => 'Selangor']);
    }

    public function test_create_duplicate_active_same_name_negeri_throws(): void
    {
        $service = app(HomestayService::class);

        // First record
        Homestay::factory()->create([
            'nama' => 'Kampung Indah',
            'negeri' => 'Selangor',
            'status' => 'Aktif',
        ]);

        $this->expectException(BusinessRuleException::class);

        $data = new HomestayData(
            nama: 'Kampung Indah',
            negeri: 'Selangor',
            alamat: null,
            kapasiti: 5,
            fasiliti: null,
            modelPengurusan: 'individu',
            cooperativeId: null,
            status: 'Aktif',
            clusterId: null,
        );

        $service->createHomestay($data);
    }
}
