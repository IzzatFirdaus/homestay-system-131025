<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Create the cooperatives table.
 *
 * Stores cooperative organizations managing homestays.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cooperatives', function (Blueprint $table): void {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->id();
            $table->string('nama', 255);
            $table->string('negeri', 50);
            $table->text('alamat')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('negeri', 'idx_cooperatives_negeri');
            $table->index('nama', 'idx_cooperatives_nama');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cooperatives');
    }
};
