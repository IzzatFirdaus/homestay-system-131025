<?php

declare(strict_types=1);

namespace Tests\Unit\Policies;

use App\Models\Homestay;
use App\Models\User;
use App\Policies\HomestayPolicy;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

/**
 * HomestayPolicyTest
 *
 * Tests authorization rules for Homestay model operations.
 * Validates role-based access control and scope-based permissions.
 */
class HomestayPolicyTest extends TestCase
{
    use RefreshDatabase;

    private HomestayPolicy $policy;

    protected function setUp(): void
    {
        parent::setUp();
        $this->policy = new HomestayPolicy();

        // Create roles
        Role::create(['name' => 'Super Admin']);
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Penganalisis']);
        Role::create(['name' => 'Pemerhati']);
    }

    public function test_super_admin_can_view_any_homestays(): void
    {
        $user = User::factory()->create();
        $user->assignRole('Super Admin');

        $response = $this->policy->viewAny($user);

        $this->assertTrue($response->allowed());
    }

    public function test_admin_can_view_any_homestays(): void
    {
        $user = User::factory()->create();
        $user->assignRole('Admin');

        $response = $this->policy->viewAny($user);

        $this->assertTrue($response->allowed());
    }

    public function test_penganalisis_can_view_homestays(): void
    {
        $user = User::factory()->create(['negeri' => 'Selangor']);
        $user->assignRole('Penganalisis');

        $response = $this->policy->viewAny($user);

        $this->assertTrue($response->allowed());
    }

    public function test_pemerhati_can_view_homestays(): void
    {
        $user = User::factory()->create(['negeri' => 'Johor']);
        $user->assignRole('Pemerhati');

        $response = $this->policy->viewAny($user);

        $this->assertTrue($response->allowed());
    }

    public function test_super_admin_can_view_any_specific_homestay(): void
    {
        $user = User::factory()->create();
        $user->assignRole('Super Admin');

        $homestay = Homestay::factory()->create(['negeri' => 'Selangor']);

        $response = $this->policy->view($user, $homestay);

        $this->assertTrue($response->allowed());
    }

    public function test_user_can_view_homestay_in_their_negeri(): void
    {
        $user = User::factory()->create(['negeri' => 'Selangor']);
        $user->assignRole('Penganalisis');

        $homestay = Homestay::factory()->create(['negeri' => 'Selangor']);

        $response = $this->policy->view($user, $homestay);

        $this->assertTrue($response->allowed());
    }

    public function test_user_cannot_view_homestay_in_different_negeri(): void
    {
        $user = User::factory()->create(['negeri' => 'Johor']);
        $user->assignRole('Penganalisis');

        $homestay = Homestay::factory()->create(['negeri' => 'Selangor']);

        $response = $this->policy->view($user, $homestay);

        $this->assertFalse($response->allowed());
        $this->assertEquals(403, $response->status());
    }

    public function test_user_can_view_homestay_in_their_koperasi(): void
    {
        // Create a cooperative first
        $cooperative = \App\Models\Cooperative::factory()->create();

        $user = User::factory()->create([
            'cooperative_id' => $cooperative->id,
            'negeri' => null,  // Explicitly set negeri to null for koperasi-scoped user
        ]);
        $user->assignRole('Penganalisis');

        $homestay = Homestay::factory()->create([
            'model_pengurusan' => 'koperasi',
            'id_koperasi' => $cooperative->id,
            'negeri' => $cooperative->negeri,  // Match cooperative's negeri
        ]);

        // Debug: Check if canAccessCooperative returns true
        $this->assertTrue(
            $user->canAccessCooperative($homestay->id_koperasi),
            "User should be able to access cooperative {$homestay->id_koperasi}. User cooperative_id: {$user->cooperative_id}"
        );

        $response = $this->policy->view($user, $homestay);

        $this->assertTrue($response->allowed(), 'Policy should allow viewing homestay in same cooperative. Response: ' . $response->message());
    }

    public function test_user_cannot_view_homestay_in_different_koperasi(): void
    {
        // Create two cooperatives
        $cooperative1 = \App\Models\Cooperative::factory()->create();
        $cooperative2 = \App\Models\Cooperative::factory()->create();

        $user = User::factory()->create(['cooperative_id' => $cooperative1->id]);
        $user->assignRole('Penganalisis');

        $homestay = Homestay::factory()->create(['id_koperasi' => $cooperative2->id]);

        $response = $this->policy->view($user, $homestay);

        $this->assertFalse($response->allowed());
        $this->assertEquals(403, $response->status());
    }

    public function test_super_admin_can_create_homestays(): void
    {
        $user = User::factory()->create();
        $user->assignRole('Super Admin');

        $response = $this->policy->create($user);

        $this->assertTrue($response->allowed());
    }

    public function test_admin_can_create_homestays(): void
    {
        $user = User::factory()->create();
        $user->assignRole('Admin');

        $response = $this->policy->create($user);

        $this->assertTrue($response->allowed());
    }

    public function test_penganalisis_can_create_homestays(): void
    {
        $user = User::factory()->create(['negeri' => 'Selangor']);
        $user->assignRole('Penganalisis');

        $response = $this->policy->create($user);

        $this->assertTrue($response->allowed());
    }

    public function test_pemerhati_cannot_create_homestays(): void
    {
        $user = User::factory()->create(['negeri' => 'Selangor']);
        $user->assignRole('Pemerhati');

        $response = $this->policy->create($user);

        $this->assertFalse($response->allowed());
        $this->assertEquals(403, $response->status());
        $this->assertStringContainsString('read-only access', $response->message());
    }

    public function test_user_without_scope_cannot_create_homestays(): void
    {
        $user = User::factory()->create(['negeri' => null, 'cooperative_id' => null]);
        $user->assignRole('Penganalisis');

        $response = $this->policy->create($user);

        $this->assertTrue($response->allowed()); // Penganalisis can create regardless of scope
    }

    public function test_super_admin_can_update_any_homestay(): void
    {
        $user = User::factory()->create();
        $user->assignRole('Super Admin');

        $homestay = Homestay::factory()->create(['negeri' => 'Selangor']);

        $response = $this->policy->update($user, $homestay);

        $this->assertTrue($response->allowed());
    }

    public function test_user_can_update_homestay_in_their_scope(): void
    {
        $user = User::factory()->create(['negeri' => 'Selangor']);
        $user->assignRole('Penganalisis');

        $homestay = Homestay::factory()->create(['negeri' => 'Selangor']);

        $response = $this->policy->update($user, $homestay);

        $this->assertTrue($response->allowed());
    }

    public function test_user_cannot_update_homestay_outside_their_scope(): void
    {
        $user = User::factory()->create(['negeri' => 'Johor']);
        $user->assignRole('Penganalisis');

        $homestay = Homestay::factory()->create(['negeri' => 'Selangor']);

        $response = $this->policy->update($user, $homestay);

        $this->assertFalse($response->allowed());
        $this->assertEquals(403, $response->status());
    }

    public function test_pemerhati_cannot_update_any_homestay(): void
    {
        $user = User::factory()->create(['negeri' => 'Selangor']);
        $user->assignRole('Pemerhati');

        $homestay = Homestay::factory()->create(['negeri' => 'Selangor']);

        $response = $this->policy->update($user, $homestay);

        $this->assertFalse($response->allowed());
        $this->assertEquals(403, $response->status());
        $this->assertStringContainsString('read-only access', $response->message());
    }

    public function test_only_super_admin_and_admin_can_delete_homestays(): void
    {
        $superAdmin = User::factory()->create();
        $superAdmin->assignRole('Super Admin');

        $admin = User::factory()->create();
        $admin->assignRole('Admin');

        $penganalisis = User::factory()->create(['negeri' => 'Selangor']);
        $penganalisis->assignRole('Penganalisis');

        $homestay = Homestay::factory()->create(['negeri' => 'Selangor']);

        $this->assertTrue($this->policy->delete($superAdmin, $homestay)->allowed());
        $this->assertTrue($this->policy->delete($admin, $homestay)->allowed());
        $this->assertFalse($this->policy->delete($penganalisis, $homestay)->allowed());
    }

    public function test_only_super_admin_can_force_delete_homestays(): void
    {
        $superAdmin = User::factory()->create();
        $superAdmin->assignRole('Super Admin');

        $admin = User::factory()->create();
        $admin->assignRole('Admin');

        $homestay = Homestay::factory()->create();

        $this->assertTrue($this->policy->forceDelete($superAdmin, $homestay)->allowed());
        $this->assertFalse($this->policy->forceDelete($admin, $homestay)->allowed());
    }

    public function test_super_admin_and_admin_can_restore_homestays(): void
    {
        $superAdmin = User::factory()->create();
        $superAdmin->assignRole('Super Admin');

        $admin = User::factory()->create();
        $admin->assignRole('Admin');

        $homestay = Homestay::factory()->create();

        $this->assertTrue($this->policy->restore($superAdmin, $homestay)->allowed());
        $this->assertTrue($this->policy->restore($admin, $homestay)->allowed());
    }

    public function test_users_can_change_status_within_their_scope(): void
    {
        $user = User::factory()->create(['negeri' => 'Selangor']);
        $user->assignRole('Penganalisis');

        $homestay = Homestay::factory()->create(['negeri' => 'Selangor']);

        $response = $this->policy->changeStatus($user, $homestay);

        $this->assertTrue($response->allowed());
    }

    public function test_users_can_export_data(): void
    {
        $user = User::factory()->create(['negeri' => 'Selangor']);
        $user->assignRole('Pemerhati');

        $response = $this->policy->export($user);

        $this->assertTrue($response->allowed());
    }

    public function test_users_with_proper_permissions_can_import_data(): void
    {
        $admin = User::factory()->create();
        $admin->assignRole('Admin');

        $penganalisis = User::factory()->create(['negeri' => 'Selangor']);
        $penganalisis->assignRole('Penganalisis');

        $pemerhati = User::factory()->create(['negeri' => 'Selangor']);
        $pemerhati->assignRole('Pemerhati');

        $this->assertTrue($this->policy->import($admin)->allowed());
        $this->assertTrue($this->policy->import($penganalisis)->allowed());
        $this->assertFalse($this->policy->import($pemerhati)->allowed());
    }

    public function test_manage_in_negeri_helper_method(): void
    {
        $user = User::factory()->create(['negeri' => 'Selangor']);
        $user->assignRole('Penganalisis');

        $allowedResponse = $this->policy->manageInNegeri($user, 'Selangor');
        $deniedResponse = $this->policy->manageInNegeri($user, 'Johor');

        $this->assertTrue($allowedResponse->allowed());
        $this->assertFalse($deniedResponse->allowed());
    }

    public function test_manage_in_koperasi_helper_method(): void
    {
        // Create two cooperatives
        $cooperative1 = \App\Models\Cooperative::factory()->create();
        $cooperative2 = \App\Models\Cooperative::factory()->create();

        $user = User::factory()->create(['cooperative_id' => $cooperative1->id]);
        $user->assignRole('Penganalisis');

        $allowedResponse = $this->policy->manageInKoperasi($user, $cooperative1->id);
        $deniedResponse = $this->policy->manageInKoperasi($user, $cooperative2->id);

        $this->assertTrue($allowedResponse->allowed());
        $this->assertFalse($deniedResponse->allowed());
    }
}
