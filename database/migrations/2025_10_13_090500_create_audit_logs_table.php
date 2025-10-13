<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * System-wide audit log table.
 *
 * Stores who did what and when, with optional before/after JSON payloads.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('audit_logs', function (Blueprint $table): void {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->restrictOnDelete()->cascadeOnUpdate();
            $table->string('action', 100); // created, updated, deleted, imported, etc.
            $table->string('model', 150)->nullable();
            $table->unsignedBigInteger('model_id')->nullable();
            $table->json('before')->nullable();
            $table->json('after')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->string('user_agent')->nullable();
            $table->timestamps();

            $table->index(['created_at'], 'idx_audit_logs_created');
            $table->index(['action'], 'idx_audit_logs_action');
            $table->index(['model', 'model_id'], 'idx_audit_logs_model');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('audit_logs');
    }
};
