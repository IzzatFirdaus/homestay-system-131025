import { test, expect } from '@playwright/test';
import AxeBuilder from '@axe-core/playwright';
import './playwright-setup.js';

/**
 * Login flow accessibility test
 *
 * Verifies WCAG 2.1 AA compliance for authentication flow
 */
test.describe('Login Flow Accessibility', () => {
    test('login page has no critical accessibility violations', async ({ page }) => {
        await page.goto('/login');

        const accessibilityScanResults = await new AxeBuilder({ page })
            .withTags(['wcag2a', 'wcag2aa', 'wcag21a', 'wcag21aa'])
            .analyze();

        // Fail on critical and serious violations
        const criticalViolations = accessibilityScanResults.violations.filter(
            (violation) => violation.impact === 'critical' || violation.impact === 'serious'
        );

        expect(criticalViolations).toHaveLength(0);
    });

    test('login form is keyboard accessible', async ({ page }) => {
        await page.goto('/login');

        // Tab to email input
        await page.keyboard.press('Tab');
        let focusedElement = await page.evaluate(() => document.activeElement.tagName);
        expect(['INPUT', 'A']).toContain(focusedElement); // Could be skip link first

        // Ensure we can reach all form elements
        await page.keyboard.press('Tab');
        await page.keyboard.press('Tab');
        await page.keyboard.press('Tab');

        // Should be able to submit via keyboard
        const submitButton = page.locator('button[type="submit"]');
        await expect(submitButton).toBeFocusable();
    });
});

/**
 * Import workflow accessibility test
 */
test.describe('Import Flow Accessibility', () => {
    test('import page has no critical violations', async ({ page }) => {
        // Note: This assumes authenticated session
        // In real implementation, set up authentication cookie or use API login
        await page.goto('/imports/create');

        const accessibilityScanResults = await new AxeBuilder({ page })
            .withTags(['wcag2a', 'wcag2aa'])
            .analyze();

        const criticalViolations = accessibilityScanResults.violations.filter(
            (v) => v.impact === 'critical' || v.impact === 'serious'
        );

        expect(criticalViolations).toHaveLength(0);
    });

    test('file input has accessible label', async ({ page }) => {
        await page.goto('/imports/create');

        const fileInput = page.locator('input[type="file"]');
        const inputId = await fileInput.getAttribute('id');

        if (inputId) {
            // Check for associated label
            const label = page.locator(`label[for="${inputId}"]`);
            await expect(label).toBeVisible();
        } else {
            // Check for aria-label or aria-labelledby
            const ariaLabel = await fileInput.getAttribute('aria-label');
            const ariaLabelledBy = await fileInput.getAttribute('aria-labelledby');
            expect(ariaLabel || ariaLabelledBy).toBeTruthy();
        }
    });
});

/**
 * Dashboard accessibility test
 */
test.describe('Dashboard Accessibility', () => {
    test('dashboard has no critical violations', async ({ page }) => {
        await page.goto('/dashboard');

        const accessibilityScanResults = await new AxeBuilder({ page })
            .withTags(['wcag2a', 'wcag2aa'])
            .exclude('#chart-container canvas') // Charts may need custom handling
            .analyze();

        const criticalViolations = accessibilityScanResults.violations.filter(
            (v) => v.impact === 'critical' || v.impact === 'serious'
        );

        expect(criticalViolations).toHaveLength(0);
    });

    test('dashboard has semantic landmarks', async ({ page }) => {
        await page.goto('/dashboard');

        // Check for required landmarks
        await expect(page.locator('main')).toBeVisible();
        await expect(page.locator('nav')).toBeVisible();

        // Check heading hierarchy
        const h1 = page.locator('h1');
        await expect(h1).toHaveCount(1);
    });

    test('live regions exist for dynamic content', async ({ page }) => {
        await page.goto('/dashboard');

        // Check for aria-live regions or role=alert/status
        const liveRegions = page.locator(
            '[aria-live], [role="alert"], [role="status"]'
        );
        const count = await liveRegions.count();
        expect(count).toBeGreaterThan(0);
    });
});
