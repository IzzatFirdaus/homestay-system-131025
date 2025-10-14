<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Create the homestays table.
 *
 * Key notes:
 * - model_pengurusan: ENUM ['koperasi','individu'] per D09 §5.1.
 * - id_koperasi: nullable FK to cooperatives, SET NULL on delete per D09 §6.2.
 * - status: ENUM ['Aktif','Tidak Aktif'] with default 'Aktif'.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('homestays', function (Blueprint $table): void {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->id();
            $table->string('nama', 255);
            $table->string('negeri', 100);
            $table->text('alamat')->nullable();
            $table->unsignedInteger('kapasiti')->default(0);
            $table->text('fasiliti')->nullable();
            $table->enum('model_pengurusan', ['koperasi', 'individu'])->default('individu');
            $table->foreignId('id_koperasi')->nullable()->constrained('cooperatives')->nullOnDelete()->cascadeOnUpdate();
            $table->enum('status', ['Aktif', 'Tidak Aktif'])->default('Aktif');
            $table->foreignId('cluster_id')->nullable()->constrained('clusters')->nullOnDelete()->cascadeOnUpdate();
            $table->timestamps();
            $table->softDeletes();

            $table->index('id_koperasi', 'idx_homestays_cooperative');
            $table->index('negeri', 'idx_homestays_negeri');
            $table->index('status', 'idx_homestays_status');
            $table->index(['cluster_id'], 'idx_homestays_cluster');
            $table->index(['model_pengurusan'], 'idx_homestays_model');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('homestays');
    }
};
