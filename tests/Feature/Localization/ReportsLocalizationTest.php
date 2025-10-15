<?php

declare(strict_types=1);

namespace Tests\Feature\Localization;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class ReportsLocalizationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Seed minimal roles/permissions needed
        Role::create(['name' => 'Admin']);
        Permission::create(['name' => 'generate-reports']);
    }

    public function test_reports_page_labels_render_in_malay(): void
    {
        app()->setLocale('ms');

        $user = User::factory()->create();
        $user->assignRole('Admin');
        $user->givePermissionTo('generate-reports');

        $this->actingAs($user)
            ->get(route('web.reports.index'))
            ->assertOk()
            ->assertSee(__('reports.title'))
            ->assertSee(__('reports.type'))
            ->assertSee(__('reports.generate'));
    }

    public function test_validation_error_message_is_localized_in_malay(): void
    {
        app()->setLocale('ms');

        $user = User::factory()->create();
        $user->assignRole('Admin');
        $user->givePermissionTo('generate-reports');

        // Submit without required type
        $response = $this->actingAs($user)
            ->post(route('web.reports.generate'), [
                // 'type' omitted
                'format' => 'xlsx',
            ]);

        $response->assertSessionHasErrors('type');

        // Assert Malay custom validation message appears in errors bag
        $errors = session('errors');
        $this->assertNotNull($errors);
        $this->assertStringContainsString('Jenis laporan mesti dipilih.', $errors->first('type'));
    }
}
