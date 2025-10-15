import { defineConfig, devices } from '@playwright/test';

/**
 * Playwright configuration for accessibility testing
 *
 * Tests accessibility compliance (WCAG 2.1 AA) on primary user flows
 */
export default defineConfig({
    testDir: './tests/Accessibility',
    fullyParallel: true,
    forbidOnly: !!process.env.CI,
    retries: process.env.CI ? 2 : 0,
    workers: process.env.CI ? 1 : undefined,
    reporter: [
        ['html', { outputFolder: 'build/playwright-report' }],
        ['json', { outputFile: 'build/playwright-results.json' }],
    ],
    use: {
        baseURL: process.env.APP_URL || 'http://127.0.0.1:8000',
        trace: 'on-first-retry',
        screenshot: 'only-on-failure',
    },

    projects: [
        {
            name: 'chromium',
            use: { ...devices['Desktop Chrome'] },
        },
    ],

    webServer: {
        command: 'php artisan serve --port=8000',
        port: 8000,
        reuseExistingServer: !process.env.CI,
        timeout: 120 * 1000,
    },
});

