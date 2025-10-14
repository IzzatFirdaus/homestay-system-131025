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
            $table->string('action', 100); // CREATE, UPDATE, DELETE, IMPORT, etc.
            // Support both middleware (table_name/record_id) and observers (model_type/model_id)
            $table->string('table_name', 150)->nullable();
            $table->unsignedBigInteger('record_id')->nullable();
            $table->string('model_type', 255)->nullable();
            $table->unsignedBigInteger('model_id')->nullable();
            $table->json('old_values')->nullable();
            $table->json('new_values')->nullable();
            $table->string('url')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->string('user_agent')->nullable();
            $table->timestamps();

            $table->index(['created_at'], 'idx_audit_logs_created');
            $table->index(['action'], 'idx_audit_logs_action');
            $table->index(['table_name', 'record_id'], 'idx_audit_logs_model');
            $table->index(['model_type', 'model_id'], 'idx_audit_logs_model_type');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('audit_logs');
    }
};
