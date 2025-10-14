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
            'nama' => 'Test Homestay',
            'negeri' => 'Selangor',
        ]);

        $this->assertDatabaseHas('audit_logs', [
            'model' => Homestay::class,
            'model_id' => $homestay->id,
            'action' => 'created',
            'user_id' => $user->id,
        ]);

        $auditLog = AuditLog::where('model_id', $homestay->id)
            ->where('action', 'created')
            ->first();

        $this->assertNotNull($auditLog);
        $this->assertNotNull($auditLog->after);

        $this->assertEquals('Test Homestay', $auditLog->after['nama']);
        $this->assertEquals('Selangor', $auditLog->after['negeri']);
    }

    public function test_observer_logs_homestay_update(): void
    {
        $user = User::factory()->create();
        $user->assignRole('Admin');

        $this->actingAs($user);

        $homestay = Homestay::factory()->create([
            'nama' => 'Original Homestay',
            'negeri' => 'Selangor',
        ]);

        // Clear any creation audit logs first
        AuditLog::truncate();

        $homestay->update([
            'nama' => 'Updated Homestay',
            'negeri' => 'Johor',
        ]);

        $this->assertDatabaseHas('audit_logs', [
            'model' => Homestay::class,
            'model_id' => $homestay->id,
            'action' => 'updated',
            'user_id' => $user->id,
        ]);

        $auditLog = AuditLog::where('model_id', $homestay->id)
            ->where('action', 'updated')
            ->first();

        $this->assertNotNull($auditLog);
        $this->assertNotNull($auditLog->before);
        $this->assertNotNull($auditLog->after);

        $this->assertEquals('Original Homestay', $auditLog->before['nama']);
        $this->assertEquals('Updated Homestay', $auditLog->after['nama']);
        $this->assertEquals('Selangor', $auditLog->before['negeri']);
        $this->assertEquals('Johor', $auditLog->after['negeri']);
    }

    public function test_observer_logs_homestay_deletion(): void
    {
        $user = User::factory()->create();
        $user->assignRole('Admin');

        $this->actingAs($user);

        $homestay = Homestay::factory()->create([
            'nama' => 'To Be Deleted',
            'negeri' => 'Selangor',
        ]);

        $homestayId = $homestay->id;
        $originalValues = $homestay->toArray();

        // Clear any creation audit logs
        AuditLog::truncate();

        $homestay->delete();

        $this->assertDatabaseHas('audit_logs', [
            'model' => Homestay::class,
            'model_id' => $homestayId,
            'action' => 'deleted',
            'user_id' => $user->id,
        ]);

        $auditLog = AuditLog::where('model_id', $homestayId)
            ->where('action', 'deleted')
            ->first();

        $this->assertNotNull($auditLog);
        $this->assertNotNull($auditLog->before);
        $this->assertNull($auditLog->after);

        $this->assertEquals('To Be Deleted', $auditLog->before['nama']);
        $this->assertEquals('Selangor', $auditLog->before['negeri']);
    }

    public function test_observer_handles_unauthenticated_operations(): void
    {
        // No authenticated user
        $homestay = Homestay::factory()->create([
            'nama' => 'System Homestay',
        ]);

        $this->assertDatabaseHas('audit_logs', [
            'model' => Homestay::class,
            'model_id' => $homestay->id,
            'action' => 'created',
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

        $homestay = Homestay::factory()->create([
            'nama' => 'Metadata Test',
        ]);

        $auditLog = AuditLog::where('model', Homestay::class)
            ->where('model_id', $homestay->id)
            ->first();

        // Just verify that IP address and user agent were captured
        $this->assertNotNull($auditLog->ip_address);
        $this->assertNotNull($auditLog->user_agent);
        // In test environment, IP is typically 127.0.0.1
        $this->assertIsString($auditLog->ip_address);
        $this->assertIsString($auditLog->user_agent);
    }

    public function test_observer_handles_mass_assignment(): void
    {
        $user = User::factory()->create();
        $user->assignRole('Admin');

        $this->actingAs($user);

        // Clear any existing audit logs to avoid confusion
        AuditLog::truncate();

        $homestayData = [
            'nama' => 'Mass Assignment Test',
            'negeri' => 'Selangor',
            'alamat' => 'Test Address',
            'status' => 'Aktif',
        ];

        $homestay = Homestay::create($homestayData);

        $this->assertDatabaseHas('audit_logs', [
            'model' => Homestay::class,
            'model_id' => $homestay->id,
            'action' => 'created',
            'user_id' => $user->id,
        ]);

        $auditLog = AuditLog::where('model', Homestay::class)
            ->where('model_id', $homestay->id)
            ->where('action', 'created')
            ->first();

        $this->assertNotNull($auditLog);
        $this->assertNotNull($auditLog->after);
        $this->assertEquals('Mass Assignment Test', $auditLog->after['nama']);
        $this->assertEquals('Selangor', $auditLog->after['negeri']);
        $this->assertEquals('Test Address', $auditLog->after['alamat']);
        $this->assertEquals('Aktif', $auditLog->after['status']);
    }

    public function test_observer_tracks_partial_updates(): void
    {
        $user = User::factory()->create();
        $user->assignRole('Admin');

        $this->actingAs($user);

        $homestay = Homestay::factory()->create([
            'nama' => 'Original Name',
            'negeri' => 'Selangor',
            'status' => 'Aktif',
        ]);

        // Clear creation logs
        AuditLog::truncate();

        // Update only one field
        $homestay->update(['nama' => 'New Name']);

        $auditLog = AuditLog::where('model_id', $homestay->id)
            ->where('action', 'updated')
            ->first();

        // Should only track changed fields
        $this->assertEquals('Original Name', $auditLog->before['nama']);
        $this->assertEquals('New Name', $auditLog->after['nama']);

        // Other fields should remain in old values but not in changes
        $this->assertEquals('Selangor', $auditLog->before['negeri']);
        $this->assertEquals('Selangor', $auditLog->after['negeri']);
    }

    public function test_observer_handles_soft_deletes(): void
    {
        $user = User::factory()->create();
        $user->assignRole('Admin');

        $this->actingAs($user);

        $homestay = Homestay::factory()->create([
            'nama' => 'Soft Delete Test',
        ]);

        $homestayId = $homestay->id;

        // Clear creation logs
        AuditLog::truncate();

        // Soft delete
        $homestay->delete();

        $this->assertDatabaseHas('audit_logs', [
            'model' => Homestay::class,
            'model_id' => $homestayId,
            'action' => 'deleted',
            'user_id' => $user->id,
        ]);

        // Verify the homestay is soft-deleted
        $this->assertSoftDeleted('homestays', ['id' => $homestayId]);

        $auditLog = AuditLog::where('model_id', $homestayId)
            ->where('action', 'deleted')
            ->first();

        $this->assertEquals('Soft Delete Test', $auditLog->before['nama']);
        $this->assertNull($auditLog->after);
    }
}
