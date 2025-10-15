<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Homestay;
use App\Models\Performance;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class PerformanceCreateEditTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Create Admin role for tests
        Role::findOrCreate('Admin', 'web');
    }

    public function test_admin_can_create_performance(): void
    {
        $user = User::factory()->create()->assignRole('Admin');
        $homestay = Homestay::factory()->create();

        $response = $this->actingAs($user)->post(route('performances.store'), [
            'homestay_id' => $homestay->id,
            'bulan' => 6,
            'tahun' => 2024,
            'pelawat_domestik' => 100,
            'pelawat_asing' => 50,
            'pendapatan' => 15000.00,
            'sumber_lain' => 2500.00,
        ]);

        $response->assertRedirect(route('performances.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('performances', [
            'homestay_id' => $homestay->id,
            'bulan' => 6,
            'tahun' => 2024,
            'pelawat_domestik' => 100,
            'pelawat_asing' => 50,
        ]);
    }

    public function test_admin_can_update_recent_performance(): void
    {
        $user = User::factory()->create()->assignRole('Admin');

        // Create performance from current month (within 3-month editability window)
        $performance = Performance::factory()->create([
            'bulan' => (int) date('n'),
            'tahun' => (int) date('Y'),
            'pelawat_domestik' => 100,
        ]);

        $response = $this->actingAs($user)->put(route('performances.update', $performance), [
            'homestay_id' => $performance->homestay_id,
            'bulan' => $performance->bulan,
            'tahun' => $performance->tahun,
            'pelawat_domestik' => 200,
            'pelawat_asing' => $performance->pelawat_asing,
            'pendapatan' => $performance->pendapatan,
            'sumber_lain' => $performance->sumber_lain,
        ]);

        $response->assertRedirect(route('performances.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('performances', [
            'id' => $performance->id,
            'pelawat_domestik' => 200,
        ]);
    }

    public function test_validation_fails_for_invalid_data(): void
    {
        $user = User::factory()->create()->assignRole('Admin');

        $response = $this->actingAs($user)->post(route('performances.store'), [
            'homestay_id' => '',
            'bulan' => 13, // Invalid month
            'tahun' => 1999, // Before minimum year
        ]);

        $response->assertSessionHasErrors(['homestay_id', 'bulan', 'tahun']);
    }

    public function test_duplicate_performance_record_prevented(): void
    {
        $user = User::factory()->create()->assignRole('Admin');
        $performance = Performance::factory()->create();

        // Try to create duplicate record (same homestay + bulan + tahun)
        $response = $this->actingAs($user)->post(route('performances.store'), [
            'homestay_id' => $performance->homestay_id,
            'bulan' => $performance->bulan,
            'tahun' => $performance->tahun,
            'pelawat_domestik' => 100,
            'pelawat_asing' => 50,
            'pendapatan' => 15000.00,
            'sumber_lain' => 2500.00,
        ]);

        // Should redirect back with business rule error
        $response->assertRedirect();
        $response->assertSessionHasErrors('general');
    }

    public function test_old_performance_cannot_be_updated(): void
    {
        $user = User::factory()->create()->assignRole('Admin');

        // Create performance from 6 months ago (beyond 3-month editability window)
        $sixMonthsAgo = now()->subMonths(6);
        $performance = Performance::factory()->create([
            'bulan' => $sixMonthsAgo->month,
            'tahun' => $sixMonthsAgo->year,
            'pelawat_domestik' => 100,
        ]);

        $response = $this->actingAs($user)->put(route('performances.update', $performance), [
            'homestay_id' => $performance->homestay_id,
            'bulan' => $performance->bulan,
            'tahun' => $performance->tahun,
            'pelawat_domestik' => 200,
            'pelawat_asing' => $performance->pelawat_asing,
            'pendapatan' => $performance->pendapatan,
            'sumber_lain' => $performance->sumber_lain,
        ]);

        // Should redirect back with business rule error about being too old
        $response->assertRedirect();
        $response->assertSessionHasErrors('general');
    }
}
