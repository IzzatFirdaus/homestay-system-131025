<?php

declare(strict_types=1);

namespace Tests\Unit\Observers;

use App\Models\AuditLog;
use App\Models\Homestay;
use App\Models\User;
use App\Observers\HomestayObserver;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

/**
 * HomestayObserverTest
 *
 * Tests the HomestayObserver functionality.
 * Validates audit log creation for homestay model events.
 */
class HomestayObserverTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Create test role
        Role::create(['name' => 'Admin']);
    }

    public function test_observer_logs_homestay_creation(): void
    {
        $user = User::factory()->create();
        $user->assignRole('Admin');

        $this->actingAs($user);

        $homestay = Homestay::factory()->create([
            'nama_homestay' => 'Test Homestay',
            'negeri' => 'Selangor',
        ]);

        $this->assertDatabaseHas('audit_logs', [
            'model_type' => Homestay::class,
            'model_id' => $homestay->id,
            'action' => 'CREATE',
            'user_id' => $user->id,
        ]);

        $auditLog = AuditLog::where('model_id', $homestay->id)
            ->where('action', 'CREATE')
            ->first();

        $this->assertNotNull($auditLog);
        $this->assertNotNull($auditLog->new_values);

        $newValues = json_decode($auditLog->new_values, true);
        $this->assertEquals('Test Homestay', $newValues['nama_homestay']);
        $this->assertEquals('Selangor', $newValues['negeri']);
    }

    public function test_observer_logs_homestay_update(): void
    {
        $user = User::factory()->create();
        $user->assignRole('Admin');

        $this->actingAs($user);

        $homestay = Homestay::factory()->create([
            'nama_homestay' => 'Original Homestay',
            'negeri' => 'Selangor',
        ]);

        // Clear any creation audit logs first
        AuditLog::truncate();

        $homestay->update([
            'nama_homestay' => 'Updated Homestay',
            'negeri' => 'Johor',
        ]);

        $this->assertDatabaseHas('audit_logs', [
            'model_type' => Homestay::class,
            'model_id' => $homestay->id,
            'action' => 'UPDATE',
            'user_id' => $user->id,
        ]);

        $auditLog = AuditLog::where('model_id', $homestay->id)
            ->where('action', 'UPDATE')
            ->first();

        $this->assertNotNull($auditLog);
        $this->assertNotNull($auditLog->old_values);
        $this->assertNotNull($auditLog->new_values);

        $oldValues = json_decode($auditLog->old_values, true);
        $newValues = json_decode($auditLog->new_values, true);

        $this->assertEquals('Original Homestay', $oldValues['nama_homestay']);
        $this->assertEquals('Updated Homestay', $newValues['nama_homestay']);
        $this->assertEquals('Selangor', $oldValues['negeri']);
        $this->assertEquals('Johor', $newValues['negeri']);
    }

    public function test_observer_logs_homestay_deletion(): void
    {
        $user = User::factory()->create();
        $user->assignRole('Admin');

        $this->actingAs($user);

        $homestay = Homestay::factory()->create([
            'nama_homestay' => 'To Be Deleted',
            'negeri' => 'Selangor',
        ]);

        $homestayId = $homestay->id;
        $originalValues = $homestay->toArray();

        // Clear any creation audit logs
        AuditLog::truncate();

        $homestay->delete();

        $this->assertDatabaseHas('audit_logs', [
            'model_type' => Homestay::class,
            'model_id' => $homestayId,
            'action' => 'DELETE',
            'user_id' => $user->id,
        ]);

        $auditLog = AuditLog::where('model_id', $homestayId)
            ->where('action', 'DELETE')
            ->first();

        $this->assertNotNull($auditLog);
        $this->assertNotNull($auditLog->old_values);
        $this->assertNull($auditLog->new_values);

        $oldValues = json_decode($auditLog->old_values, true);
        $this->assertEquals('To Be Deleted', $oldValues['nama_homestay']);
        $this->assertEquals('Selangor', $oldValues['negeri']);
    }

    public function test_observer_handles_unauthenticated_operations(): void
    {
        // No authenticated user
        $homestay = Homestay::factory()->create([
            'nama_homestay' => 'System Homestay',
        ]);

        $this->assertDatabaseHas('audit_logs', [
            'model_type' => Homestay::class,
            'model_id' => $homestay->id,
            'action' => 'CREATE',
            'user_id' => null, // Should be null when no authenticated user
        ]);

        $auditLog = AuditLog::where('model_id', $homestay->id)->first();
        $this->assertNull($auditLog->user_id);
        $this->assertNotNull($auditLog->ip_address);
        $this->assertNotNull($auditLog->user_agent);
    }

    public function test_observer_captures_request_metadata(): void
    {
        $user = User::factory()->create();
        $user->assignRole('Admin');

        $this->actingAs($user);

        // Simulate a request with custom headers
        request()->headers->set('User-Agent', 'TestAgent/1.0');
        request()->server->set('REMOTE_ADDR', '192.168.1.100');

        $homestay = Homestay::factory()->create([
            'nama_homestay' => 'Metadata Test',
        ]);

        $auditLog = AuditLog::where('model_id', $homestay->id)->first();

        $this->assertEquals('192.168.1.100', $auditLog->ip_address);
        $this->assertEquals('TestAgent/1.0', $auditLog->user_agent);
    }

    public function test_observer_handles_mass_assignment(): void
    {
        $user = User::factory()->create();
        $user->assignRole('Admin');

        $this->actingAs($user);

        $homestayData = [
            'nama_homestay' => 'Mass Assignment Test',
            'negeri' => 'Selangor',
            'daerah' => 'Petaling',
            'status' => 'Aktif',
        ];

        $homestay = Homestay::create($homestayData);

        $this->assertDatabaseHas('audit_logs', [
            'model_type' => Homestay::class,
            'model_id' => $homestay->id,
            'action' => 'CREATE',
            'user_id' => $user->id,
        ]);

        $auditLog = AuditLog::where('model_id', $homestay->id)->first();
        $newValues = json_decode($auditLog->new_values, true);

        $this->assertEquals('Mass Assignment Test', $newValues['nama_homestay']);
        $this->assertEquals('Selangor', $newValues['negeri']);
        $this->assertEquals('Petaling', $newValues['daerah']);
        $this->assertEquals('Aktif', $newValues['status']);
    }

    public function test_observer_tracks_partial_updates(): void
    {
        $user = User::factory()->create();
        $user->assignRole('Admin');

        $this->actingAs($user);

        $homestay = Homestay::factory()->create([
            'nama_homestay' => 'Original Name',
            'negeri' => 'Selangor',
            'daerah' => 'Petaling',
            'status' => 'Aktif',
        ]);

        // Clear creation logs
        AuditLog::truncate();

        // Update only one field
        $homestay->update(['nama_homestay' => 'New Name']);

        $auditLog = AuditLog::where('model_id', $homestay->id)
            ->where('action', 'UPDATE')
            ->first();

        $oldValues = json_decode($auditLog->old_values, true);
        $newValues = json_decode($auditLog->new_values, true);

        // Should only track changed fields
        $this->assertEquals('Original Name', $oldValues['nama_homestay']);
        $this->assertEquals('New Name', $newValues['nama_homestay']);

        // Other fields should remain in old values but not in changes
        $this->assertEquals('Selangor', $oldValues['negeri']);
        $this->assertEquals('Selangor', $newValues['negeri']);
    }

    public function test_observer_handles_soft_deletes(): void
    {
        $user = User::factory()->create();
        $user->assignRole('Admin');

        $this->actingAs($user);

        $homestay = Homestay::factory()->create([
            'nama_homestay' => 'Soft Delete Test',
        ]);

        $homestayId = $homestay->id;

        // Clear creation logs
        AuditLog::truncate();

        // Soft delete
        $homestay->delete();

        $this->assertDatabaseHas('audit_logs', [
            'model_type' => Homestay::class,
            'model_id' => $homestayId,
            'action' => 'DELETE',
            'user_id' => $user->id,
        ]);

        // Verify the homestay is soft-deleted
        $this->assertSoftDeleted('homestays', ['id' => $homestayId]);

        $auditLog = AuditLog::where('model_id', $homestayId)
            ->where('action', 'DELETE')
            ->first();

        $oldValues = json_decode($auditLog->old_values, true);
        $this->assertEquals('Soft Delete Test', $oldValues['nama_homestay']);
        $this->assertNull($auditLog->new_values);
    }
}
