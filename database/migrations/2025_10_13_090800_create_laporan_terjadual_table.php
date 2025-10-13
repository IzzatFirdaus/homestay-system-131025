<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Scheduled reports table (laporan_terjadual).
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('laporan_terjadual', function (Blueprint $table): void {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->id();
            $table->foreignId('user_id')->constrained('users')->restrictOnDelete()->cascadeOnUpdate();
            $table->string('nama', 255);
            $table->string('format', 20)->default('pdf'); // pdf, xlsx, csv
            $table->string('frekuensi', 50); // daily, weekly, monthly, cron
            $table->string('cron_expression', 100)->nullable();
            $table->json('filters')->nullable(); // e.g., negeri, koperasi, date range
            $table->json('recipients')->nullable(); // list of emails
            $table->enum('status', ['aktif', 'nyahaktif'])->default('aktif');
            $table->timestamp('last_run_at')->nullable();
            $table->timestamps();

            $table->index(['user_id'], 'idx_laporan_user');
            $table->index(['status'], 'idx_laporan_status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laporan_terjadual');
    }
};
