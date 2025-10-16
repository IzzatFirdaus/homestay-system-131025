<?php

declare(strict_types=1);

/**
 * Development Configuration
 *
 * This configuration file provides development user credentials from .env variables.
 * These credentials are used only in local/development environments to seed test users.
 */

return [
    'super_admin_email' => env('DEV_SUPER_ADMIN_EMAIL', 'superadmin@motac.gov.my'),
    'super_admin_password' => env('DEV_SUPER_ADMIN_PASSWORD', 'password123'),

    'national_admin_email' => env('DEV_NATIONAL_ADMIN_EMAIL', 'admin@motac.gov.my'),
    'national_admin_password' => env('DEV_NATIONAL_ADMIN_PASSWORD', 'password123'),

    'penganalisis_email' => env('DEV_PENGANALISIS_EMAIL', 'penganalisis@motac.gov.my'),
    'penganalisis_password' => env('DEV_PENGANALISIS_PASSWORD', 'password123'),

    'pemerhati_email' => env('DEV_PEMERHATI_EMAIL', 'pemerhati@motac.gov.my'),
    'pemerhati_password' => env('DEV_PEMERHATI_PASSWORD', 'password123'),

    'default_user_password' => env('DEV_DEFAULT_USER_PASSWORD', 'password123'),
];
