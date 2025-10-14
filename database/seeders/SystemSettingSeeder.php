<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\SystemSetting;
use Illuminate\Database\Seeder;

class SystemSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Seeding system settings...');

        // Global system settings
        $globalSettings = [
            [
                'key' => 'app_name',
                'value' => 'Sistem Pengurusan & Analitik Homestay Malaysia',
                'description' => 'Nama aplikasi yang dipaparkan di antara muka pengguna',
                'scope_type' => 'global',
                'scope_value' => null,
                'is_public' => true,
            ],
            [
                'key' => 'app_version',
                'value' => '1.0.0',
                'description' => 'Versi semasa aplikasi',
                'scope_type' => 'global',
                'scope_value' => null,
                'is_public' => true,
            ],
            [
                'key' => 'maintenance_mode',
                'value' => 'false',
                'description' => 'Status mod penyelenggaraan sistem',
                'scope_type' => 'global',
                'scope_value' => null,
                'is_public' => false,
            ],
            [
                'key' => 'default_timezone',
                'value' => 'Asia/Kuala_Lumpur',
                'description' => 'Zon masa lalai sistem',
                'scope_type' => 'global',
                'scope_value' => null,
                'is_public' => false,
            ],
            [
                'key' => 'max_file_upload_size',
                'value' => '10240', // 10MB in KB
                'description' => 'Saiz maksimum fail yang boleh dimuat naik (dalam KB)',
                'scope_type' => 'global',
                'scope_value' => null,
                'is_public' => false,
            ],
            [
                'key' => 'allowed_file_types',
                'value' => 'xlsx,xls,csv,pdf,jpg,jpeg,png,gif',
                'description' => 'Jenis fail yang dibenarkan untuk dimuat naik',
                'scope_type' => 'global',
                'scope_value' => null,
                'is_public' => false,
            ],
            [
                'key' => 'session_timeout',
                'value' => '1800', // 30 minutes
                'description' => 'Masa tamat sesi pengguna (dalam saat)',
                'scope_type' => 'global',
                'scope_value' => null,
                'is_public' => false,
            ],
            [
                'key' => 'pagination_per_page',
                'value' => '25',
                'description' => 'Bilangan rekod lalai setiap halaman',
                'scope_type' => 'global',
                'scope_value' => null,
                'is_public' => false,
            ],
            [
                'key' => 'backup_retention_days',
                'value' => '30',
                'description' => 'Bilangan hari untuk menyimpan sandaran data',
                'scope_type' => 'global',
                'scope_value' => null,
                'is_public' => false,
            ],
            [
                'key' => 'audit_log_retention_days',
                'value' => '365',
                'description' => 'Bilangan hari untuk menyimpan log audit',
                'scope_type' => 'global',
                'scope_value' => null,
                'is_public' => false,
            ],
        ];

        foreach ($globalSettings as $setting) {
            SystemSetting::create($setting);
        }

        // Import-related settings
        $importSettings = [
            [
                'key' => 'import_batch_size',
                'value' => '1000',
                'description' => 'Saiz kelompok untuk pemprosesan import data',
                'scope_type' => 'global',
                'scope_value' => null,
                'is_public' => false,
            ],
            [
                'key' => 'import_timeout',
                'value' => '3600', // 1 hour
                'description' => 'Masa tamat untuk proses import (dalam saat)',
                'scope_type' => 'global',
                'scope_value' => null,
                'is_public' => false,
            ],
            [
                'key' => 'import_max_errors',
                'value' => '100',
                'description' => 'Bilangan maksimum ralat sebelum import dihentikan',
                'scope_type' => 'global',
                'scope_value' => null,
                'is_public' => false,
            ],
        ];

        foreach ($importSettings as $setting) {
            SystemSetting::create($setting);
        }

        // Notification settings
        $notificationSettings = [
            [
                'key' => 'email_notifications_enabled',
                'value' => 'true',
                'description' => 'Status notifikasi emel',
                'scope_type' => 'global',
                'scope_value' => null,
                'is_public' => false,
            ],
            [
                'key' => 'notification_from_email',
                'value' => 'noreply@motac.gov.my',
                'description' => 'Alamat emel pengirim notifikasi',
                'scope_type' => 'global',
                'scope_value' => null,
                'is_public' => false,
            ],
            [
                'key' => 'notification_from_name',
                'value' => 'Sistem Homestay MOTAC',
                'description' => 'Nama pengirim notifikasi',
                'scope_type' => 'global',
                'scope_value' => null,
                'is_public' => false,
            ],
        ];

        foreach ($notificationSettings as $setting) {
            SystemSetting::create($setting);
        }

        // Dashboard settings
        $dashboardSettings = [
            [
                'key' => 'dashboard_refresh_interval',
                'value' => '300', // 5 minutes
                'description' => 'Selang masa untuk menyegar data papan pemuka (dalam saat)',
                'scope_type' => 'global',
                'scope_value' => null,
                'is_public' => false,
            ],
            [
                'key' => 'dashboard_cache_ttl',
                'value' => '900', // 15 minutes
                'description' => 'Masa hidup cache untuk data papan pemuka (dalam saat)',
                'scope_type' => 'global',
                'scope_value' => null,
                'is_public' => false,
            ],
            [
                'key' => 'chart_default_colors',
                'value' => '#3B82F6,#EF4444,#10B981,#F59E0B,#8B5CF6,#F97316',
                'description' => 'Warna lalai untuk carta dan graf',
                'scope_type' => 'global',
                'scope_value' => null,
                'is_public' => true,
            ],
        ];

        foreach ($dashboardSettings as $setting) {
            SystemSetting::create($setting);
        }

        // Negeri-specific settings for major states
        $majorNegeri = ['Selangor', 'Johor', 'Pahang', 'Perak', 'Sabah', 'Sarawak'];

        foreach ($majorNegeri as $negeri) {
            SystemSetting::create([
                'key' => 'reporting_schedule',
                'value' => 'monthly',
                'description' => "Jadual laporan untuk {$negeri}",
                'scope_type' => 'negeri',
                'scope_value' => $negeri,
                'is_public' => false,
            ]);

            SystemSetting::create([
                'key' => 'target_visitors_annual',
                'value' => (string) fake()->numberBetween(50000, 200000),
                'description' => "Sasaran pelawat tahunan untuk {$negeri}",
                'scope_type' => 'negeri',
                'scope_value' => $negeri,
                'is_public' => false,
            ]);

            SystemSetting::create([
                'key' => 'contact_email',
                'value' => strtolower(str_replace(' ', '', $negeri)).'@motac.gov.my',
                'description' => "Emel hubungan untuk {$negeri}",
                'scope_type' => 'negeri',
                'scope_value' => $negeri,
                'is_public' => true,
            ]);
        }

        // Regional performance thresholds
        $performanceSettings = [
            [
                'key' => 'performance_threshold_low',
                'value' => '10',
                'description' => 'Ambang prestasi rendah (bilangan pelawat bulanan)',
                'scope_type' => 'global',
                'scope_value' => null,
                'is_public' => false,
            ],
            [
                'key' => 'performance_threshold_medium',
                'value' => '50',
                'description' => 'Ambang prestasi sederhana (bilangan pelawat bulanan)',
                'scope_type' => 'global',
                'scope_value' => null,
                'is_public' => false,
            ],
            [
                'key' => 'performance_threshold_high',
                'value' => '100',
                'description' => 'Ambang prestasi tinggi (bilangan pelawat bulanan)',
                'scope_type' => 'global',
                'scope_value' => null,
                'is_public' => false,
            ],
        ];

        foreach ($performanceSettings as $setting) {
            SystemSetting::create($setting);
        }

        // API settings
        $apiSettings = [
            [
                'key' => 'api_rate_limit_per_minute',
                'value' => '300',
                'description' => 'Had kadar API setiap minit untuk pengguna yang disahkan',
                'scope_type' => 'global',
                'scope_value' => null,
                'is_public' => false,
            ],
            [
                'key' => 'api_timeout',
                'value' => '30',
                'description' => 'Masa tamat untuk panggilan API (dalam saat)',
                'scope_type' => 'global',
                'scope_value' => null,
                'is_public' => false,
            ],
        ];

        foreach ($apiSettings as $setting) {
            SystemSetting::create($setting);
        }

        $this->command->info('System settings seeded successfully.');
    }
}
