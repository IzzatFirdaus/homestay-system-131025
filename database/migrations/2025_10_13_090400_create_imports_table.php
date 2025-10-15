<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Track file/data import sessions (Laravel-Excel).
 *
 * Includes status, metrics, and references to user who initiated the import.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('imports', function (Blueprint $table): void {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->id();
            // In tests we want user deletion to cascade to imports to avoid FK errors
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('type', 100); // e.g., homestays, performances
            $table->string('filename', 255)->nullable();
            $table->enum('status', ['queued', 'processing', 'completed', 'failed'])->default('queued');
            $table->unsignedInteger('rows_total')->default(0);
            $table->unsignedInteger('rows_processed')->default(0);
            $table->unsignedInteger('rows_success')->default(0);
            $table->unsignedInteger('rows_failed')->default(0);
            $table->json('meta')->nullable(); // includes validation errors, mapping, etc.
            $table->timestamps();

            $table->index(['user_id', 'created_at'], 'idx_imports_user_created');
            $table->index(['status'], 'idx_imports_status');
            $table->index(['type'], 'idx_imports_type');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('imports');
    }
};
