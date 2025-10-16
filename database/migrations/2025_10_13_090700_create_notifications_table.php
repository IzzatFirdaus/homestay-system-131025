<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Laravel-compatible database notifications table.
 *
 * See: https://laravel.com/docs/notifications#database-notifications
 */
return new class() extends Migration
{
    public function up(): void
    {
        Schema::create('notifications', function (Blueprint $table): void {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->uuid('id')->primary();
            $table->string('type');
            $table->morphs('notifiable'); // notifiable_type, notifiable_id (bigint unsigned)
            $table->text('data'); // JSON string
            $table->timestamp('read_at')->nullable();
            $table->timestamps();

            $table->index(['notifiable_type', 'notifiable_id'], 'idx_notifications_notifiable');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
