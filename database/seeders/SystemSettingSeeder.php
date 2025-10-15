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
                'scope' => null,
            ],
            [
                'key' => 'app_version',
                'value' => '1.0.0',
                'scope' => null,
            ],
            [
                'key' => 'maintenance_mode',
                'value' => 'false',
                'scope' => null,
            ],
            [
                'key' => 'default_timezone',
                'value' => 'Asia/Kuala_Lumpur',
                'scope' => null,
            ],
            [
                'key' => 'max_file_upload_size',
                'value' => '10240', // 10MB in KB
                'scope' => null,
            ],
            [
                'key' => 'allowed_file_types',
                'value' => 'xlsx,xls,csv,pdf,jpg,jpeg,png,gif',
                'scope' => null,
            ],
            [
                'key' => 'session_timeout',
                'value' => '1800', // 30 minutes
                'scope' => null,
            ],
            [
                'key' => 'pagination_per_page',
                'value' => '25',
                'scope' => null,
            ],
            [
                'key' => 'backup_retention_days',
                'value' => '30',
                'scope' => null,
            ],
            [
                'key' => 'audit_log_retention_days',
                'value' => '365',
                'scope' => null,
            ],
        ];

        foreach ($globalSettings as $setting) {
            SystemSetting::updateOrCreate(
                ['key' => $setting['key'], 'scope' => $setting['scope']],
                $setting
            );
        }

        // Import-related settings
        $importSettings = [
            [
                'key' => 'import_batch_size',
                'value' => '1000',
                'scope' => null,
            ],
            [
                'key' => 'import_timeout',
                'value' => '3600', // 1 hour
                'scope' => null,
            ],
            [
                'key' => 'import_max_errors',
                'value' => '100',
                'scope' => null,
            ],
        ];

        foreach ($importSettings as $setting) {
            SystemSetting::updateOrCreate(
                ['key' => $setting['key'], 'scope' => $setting['scope']],
                $setting
            );
        }

        // Notification settings
        $notificationSettings = [
            [
                'key' => 'email_notifications_enabled',
                'value' => 'true',
                'scope' => null,
            ],
            [
                'key' => 'notification_from_email',
                'value' => 'noreply@motac.gov.my',
                'scope' => null,
            ],
            [
                'key' => 'notification_from_name',
                'value' => 'Sistem Homestay MOTAC',
                'scope' => null,
            ],
        ];

        foreach ($notificationSettings as $setting) {
            SystemSetting::updateOrCreate(
                ['key' => $setting['key'], 'scope' => $setting['scope']],
                $setting
            );
        }

        // Dashboard settings
        $dashboardSettings = [
            [
                'key' => 'dashboard_refresh_interval',
                'value' => '300', // 5 minutes
                'scope' => null,
            ],
            [
                'key' => 'dashboard_cache_ttl',
                'value' => '900', // 15 minutes
                'scope' => null,
            ],
            [
                'key' => 'chart_default_colors',
                'value' => '#3B82F6,#EF4444,#10B981,#F59E0B,#8B5CF6,#F97316',
                'scope' => null,
            ],
        ];

        foreach ($dashboardSettings as $setting) {
            SystemSetting::updateOrCreate(
                ['key' => $setting['key'], 'scope' => $setting['scope']],
                $setting
            );
        }

        // Negeri-specific settings for major states
        $majorNegeri = ['Selangor', 'Johor', 'Pahang', 'Perak', 'Sabah', 'Sarawak'];

        foreach ($majorNegeri as $negeri) {
            SystemSetting::updateOrCreate(
                ['key' => 'reporting_schedule', 'scope' => "negeri:{$negeri}"],
                [
                    'key' => 'reporting_schedule',
                    'value' => 'monthly',
                    'scope' => "negeri:{$negeri}",
                ]
            );

            SystemSetting::updateOrCreate(
                ['key' => 'target_visitors_annual', 'scope' => "negeri:{$negeri}"],
                [
                    'key' => 'target_visitors_annual',
                    'value' => (string) fake()->numberBetween(50000, 200000),
                    'scope' => "negeri:{$negeri}",
                ]
            );

            SystemSetting::updateOrCreate(
                ['key' => 'contact_email', 'scope' => "negeri:{$negeri}"],
                [
                    'key' => 'contact_email',
                    'value' => strtolower(str_replace(' ', '', $negeri)) . '@motac.gov.my',
                    'scope' => "negeri:{$negeri}",
                ]
            );
        }

        // Regional performance thresholds
        $performanceSettings = [
            [
                'key' => 'performance_threshold_low',
                'value' => '10',
                'scope' => null,
            ],
            [
                'key' => 'performance_threshold_medium',
                'value' => '50',
                'scope' => null,
            ],
            [
                'key' => 'performance_threshold_high',
                'value' => '100',
                'scope' => null,
            ],
        ];

        foreach ($performanceSettings as $setting) {
            SystemSetting::updateOrCreate(
                ['key' => $setting['key'], 'scope' => $setting['scope']],
                $setting
            );
        }

        // API settings
        $apiSettings = [
            [
                'key' => 'api_rate_limit_per_minute',
                'value' => '300',
                'scope' => null,
            ],
            [
                'key' => 'api_timeout',
                'value' => '30',
                'scope' => null,
            ],
        ];

        foreach ($apiSettings as $setting) {
            SystemSetting::updateOrCreate(
                ['key' => $setting['key'], 'scope' => $setting['scope']],
                $setting
            );
        }

        $this->command->info('System settings seeded successfully.');
    }
}
