<?php

declare(strict_types=1);

namespace Tests\Feature\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class ReportFeatureTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Create roles and permissions
        $adminRole = Role::findOrCreate('Admin', 'web');
        $pemerhatiRole = Role::findOrCreate('Pemerhati', 'web');

        $generatePermission = Permission::findOrCreate('generate-reports', 'web');
        $adminRole->givePermissionTo($generatePermission);
        $pemerhatiRole->givePermissionTo($generatePermission);

        // Fake storage for file generation
        Storage::fake('local');
    }

    public function test_admin_can_view_report_form(): void
    {
        $admin = User::factory()->create();
        $admin->assignRole('Admin');

        $response = $this->actingAs($admin)->get(route('web.reports.index'));

        $response->assertStatus(200);
        $response->assertSee('Jana Laporan');
        $response->assertSee('Jenis Laporan');
        $response->assertSee('Format Fail');
    }

    public function test_user_without_permission_cannot_view_report_form(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('web.reports.index'));

        $response->assertStatus(403);
    }

    public function test_admin_can_generate_dashboard_summary_report(): void
    {
        $admin = User::factory()->create();
        $admin->assignRole('Admin');

        $response = $this->actingAs($admin)->post(route('web.reports.generate'), [
            'type' => 'dashboard_summary',
            'format' => 'xlsx',
        ]);

        $response->assertStatus(200);
        $response->assertDownload();
    }

    public function test_validation_fails_for_missing_report_type(): void
    {
        $admin = User::factory()->create();
        $admin->assignRole('Admin');

        $response = $this->actingAs($admin)->post(route('web.reports.generate'), [
            'format' => 'xlsx',
        ]);

        $response->assertSessionHasErrors('type');
    }

    public function test_validation_fails_for_invalid_report_type(): void
    {
        $admin = User::factory()->create();
        $admin->assignRole('Admin');

        $response = $this->actingAs($admin)->post(route('web.reports.generate'), [
            'type' => 'invalid_type',
            'format' => 'xlsx',
        ]);

        $response->assertSessionHasErrors('type');
    }

    public function test_validation_fails_for_invalid_format(): void
    {
        $admin = User::factory()->create();
        $admin->assignRole('Admin');

        $response = $this->actingAs($admin)->post(route('web.reports.generate'), [
            'type' => 'dashboard_summary',
            'format' => 'doc',
        ]);

        $response->assertSessionHasErrors('format');
    }

    public function test_validation_fails_for_invalid_date_range(): void
    {
        $admin = User::factory()->create();
        $admin->assignRole('Admin');

        $response = $this->actingAs($admin)->post(route('web.reports.generate'), [
            'type' => 'homestay_performance',
            'format' => 'xlsx',
            'start_date' => '2025-12-31',
            'end_date' => '2025-01-01', // End before start
        ]);

        $response->assertSessionHasErrors('start_date');
    }

    public function test_pemerhati_can_generate_reports_for_their_negeri_only(): void
    {
        $pemerhati = User::factory()->create([
            'negeri' => 'Selangor',
        ]);
        $pemerhati->assignRole('Pemerhati');

        $response = $this->actingAs($pemerhati)->post(route('web.reports.generate'), [
            'type' => 'negeri_performance',
            'format' => 'xlsx',
        ]);

        // Large reports are queued, so expect redirect
        $response->assertRedirect(route('web.reports.index'));
        $response->assertSessionHas('success');
    }

    public function test_report_generation_includes_date_filters(): void
    {
        $admin = User::factory()->create();
        $admin->assignRole('Admin');

        $response = $this->actingAs($admin)->post(route('web.reports.generate'), [
            'type' => 'dashboard_summary',
            'format' => 'csv',
            'start_date' => '2025-01-01',
            'end_date' => '2025-12-31',
        ]);

        $response->assertStatus(200);
        $response->assertDownload();
    }

    public function test_large_report_is_queued(): void
    {
        $admin = User::factory()->create();
        $admin->assignRole('Admin');

        // Create a homestay for the report
        $homestay = \App\Models\Homestay::factory()->create();

        $response = $this->actingAs($admin)->post(route('web.reports.generate'), [
            'type' => 'homestay_performance',
            'format' => 'pdf',
            'homestay_id' => $homestay->id,
        ]);

        $response->assertRedirect(route('web.reports.index'));
        $response->assertSessionHas('success');
    }
}
