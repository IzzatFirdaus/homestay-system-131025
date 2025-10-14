<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Extend users table with scoping fields: negeri and cooperative ownership.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table): void {
            $table->string('negeri', 50)->nullable()->after('email');
            $table->unsignedBigInteger('cooperative_id')->nullable()->after('negeri');

            $table->index('negeri', 'idx_users_negeri');
            $table->index('cooperative_id', 'idx_users_cooperative');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table): void {
            $table->dropIndex('idx_users_negeri');
            $table->dropIndex('idx_users_cooperative');
            $table->dropColumn(['negeri', 'cooperative_id']);
        });
    }
};
