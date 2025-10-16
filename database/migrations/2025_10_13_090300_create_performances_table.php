<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Create the performances table (fact table for monthly performance).
 * Composite uniqueness on (homestay_id, bulan, tahun) per D09 §6.3.
 */
return new class() extends Migration
{
    public function up(): void
    {
        Schema::create('performances', function (Blueprint $table): void {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->id();
            $table->foreignId('homestay_id')->constrained('homestays')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedTinyInteger('bulan'); // 1-12
            $table->unsignedSmallInteger('tahun');
            $table->unsignedInteger('pelawat_domestik')->default(0);
            $table->unsignedInteger('pelawat_asing')->default(0);
            $table->decimal('pendapatan', 15, 2)->default(0);
            $table->decimal('sumber_lain', 15, 2)->default(0);
            $table->timestamps();

            $table->unique(['homestay_id', 'bulan', 'tahun'], 'uk_performances_monthly');
            $table->index(['bulan', 'tahun'], 'idx_performances_month_year');
            $table->index(['homestay_id', 'tahun', 'bulan'], 'idx_performances_homestay_period');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('performances');
    }
};
