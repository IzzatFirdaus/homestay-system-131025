<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Create the clusters table.
 *
 * Notes:
 * - Groups homestays by thematic/administrative cluster (see D09 §5.3 and ERD).
 * - "negeri" stores the Malaysia state code/name (WCAG i18n aligned).
 */
return new class() extends Migration
{
    public function up(): void
    {
        Schema::create('clusters', function (Blueprint $table): void {
            // Storage & collation policy per D09 (utf8mb4 + InnoDB)
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->id();
            $table->string('nama', 255);
            $table->foreignId('id_negeri')->constrained('states')->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('keterangan')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('id_negeri', 'idx_clusters_state');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clusters');
    }
};
