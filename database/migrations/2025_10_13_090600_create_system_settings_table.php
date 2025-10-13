<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Application key-value settings with optional JSON value and scoping.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('system_settings', function (Blueprint $table): void {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->id();
            $table->string('key', 150);
            $table->json('value')->nullable(); // Store JSON or scalar stringified
            $table->string('scope', 100)->nullable(); // e.g., global, negeri:Selangor, koperasi:123
            $table->timestamps();

            $table->unique(['key', 'scope'], 'uk_system_settings_key_scope');
            $table->index('key', 'idx_system_settings_key');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('system_settings');
    }
};
