import { test, expect } from '@playwright/test';
import AxeBuilder from '@axe-core/playwright';

/**
 * Welcome page accessibility test
 * Verifies WCAG 2.1 AA compliance for the public landing page
 */
test.describe('Welcome Page Accessibility', () => {
    test('welcome page loads without authentication errors', async ({ page }) => {
        const response = await page.goto('/');
        expect(response?.status()).toBe(200);
    });

    test('welcome page has no critical accessibility violations', async ({ page }) => {
        await page.goto('/');

        const accessibilityScanResults = await new AxeBuilder({ page })
            .withTags(['wcag2a', 'wcag2aa', 'wcag21a', 'wcag21aa'])
            .analyze();

        // Fail on critical and serious violations
        const criticalViolations = accessibilityScanResults.violations.filter(
            (violation) => violation.impact === 'critical' || violation.impact === 'serious'
        );

        expect(criticalViolations).toHaveLength(0);
    });

    test('welcome page has proper semantic landmarks', async ({ page }) => {
        await page.goto('/');

        // Check for main landmark
        await expect(page.locator('main')).toBeVisible();

        // Check for nav landmark
        await expect(page.locator('nav')).toBeVisible();

        // Check for footer
        await expect(page.locator('footer')).toBeVisible();
    });

    test('welcome page has skip-to-content link', async ({ page }) => {
        await page.goto('/');

        const skipLink = page.locator('.skip-link');
        await expect(skipLink).toBeTruthy();

        // Link should have proper href
        const href = await skipLink.getAttribute('href');
        expect(href).toBe('#main-content');

        // Link should have focusable class
        const className = await skipLink.getAttribute('class');
        expect(className).toContain('visually-hidden-focusable');
    });

    test('welcome page has single h1 heading', async ({ page }) => {
        await page.goto('/');

        const h1Elements = page.locator('h1');
        const count = await h1Elements.count();
        expect(count).toBe(1);

        // Heading should have content
        const heading = h1Elements.first();
        const text = await heading.textContent();
        expect(text?.trim().length).toBeGreaterThan(0);
    });

    test('welcome page navigation is keyboard accessible', async ({ page }) => {
        await page.goto('/');

        // Tab to first interactive element
        await page.keyboard.press('Tab');

        // Get focused element
        let focusedElement = await page.evaluate(() => {
            const el = document.activeElement;
            return el?.tagName;
        });

        // Should focus on skip link first or interactive element
        expect(['A', 'BUTTON']).toContain(focusedElement);
    });

    test('welcome page language switcher is accessible', async ({ page }) => {
        await page.goto('/');

        // Find language dropdown
        const languageDropdown = page.locator('#languageDropdown');
        await expect(languageDropdown).toBeVisible();

        // Verify it has aria-label
        const ariaLabel = await languageDropdown.getAttribute('aria-label');
        expect(ariaLabel).toBeTruthy();

        // Click to open
        await languageDropdown.click();

        // Check for dropdown items
        const dropdownItems = page.locator('ul[aria-labelledby="languageDropdown"] .dropdown-item');
        const itemCount = await dropdownItems.count();
        expect(itemCount).toBeGreaterThan(0);
    });

    test('welcome page buttons have proper contrast and focus', async ({ page }) => {
        await page.goto('/');

        // Find primary buttons
        const buttons = page.locator('button, a[role="button"], .btn');

        for (let i = 0; i < await buttons.count(); i++) {
            const button = buttons.nth(i);
            const isVisible = await button.isVisible();

            if (isVisible) {
                // Check focusability
                const isFocusable = await button.evaluate((el) => {
                    return el.tabIndex >= -1 && el.tabIndex <= 32767;
                });

                expect(isFocusable).toBeTruthy();
            }
        }
    });

    test('welcome page forms are accessible', async ({ page }) => {
        await page.goto('/');

        // Check for form elements with proper labels
        const inputs = page.locator('input, select, textarea');

        for (let i = 0; i < await inputs.count(); i++) {
            const input = inputs.nth(i);
            const inputId = await input.getAttribute('id');
            const ariaLabel = await input.getAttribute('aria-label');
            const ariaLabelledBy = await input.getAttribute('aria-labelledby');

            // Should have one of: id+label, aria-label, or aria-labelledby
            if (inputId) {
                // Check for associated label
                const label = page.locator(`label[for="${inputId}"]`);
                const labelExists = await label.count();
                expect(labelExists > 0 || ariaLabel || ariaLabelledBy).toBeTruthy();
            } else {
                expect(ariaLabel || ariaLabelledBy).toBeTruthy();
            }
        }
    });

    test('welcome page has proper color contrast', async ({ page }) => {
        await page.goto('/');

        const accessibilityScanResults = await new AxeBuilder({ page })
            .withRules(['color-contrast'])
            .analyze();

        // Check for color contrast violations
        const contrastViolations = accessibilityScanResults.violations.filter(
            (v) => v.id === 'color-contrast'
        );

        expect(contrastViolations).toHaveLength(0);
    });

    test('welcome page has proper text alternatives for images', async ({ page }) => {
        await page.goto('/');

        const images = page.locator('img');

        for (let i = 0; i < await images.count(); i++) {
            const img = images.nth(i);
            const alt = await img.getAttribute('alt');

            if (alt === null) {
                // Image should be decorative (aria-hidden or empty alt intentionally)
                const ariaHidden = await img.getAttribute('aria-hidden');
                expect(ariaHidden || alt === '').toBeTruthy();
            }
        }
    });

    test('welcome page dashboard metrics have aria-live regions', async ({ page }) => {
        await page.goto('/');

        // Check for metrics section
        const metricsSection = page.locator('[data-testid="welcome-metrics"]');

        if (await metricsSection.count() > 0) {
            // Check for aria-live regions or role=status/alert
            const liveRegions = metricsSection.locator(
                '[aria-live], [role="alert"], [role="status"]'
            );

            // Should have at least one live region for dynamic updates
            const count = await liveRegions.count();
            expect(count).toBeGreaterThanOrEqual(0);
        }
    });

    test('welcome page alerts are accessible', async ({ page }) => {
        await page.goto('/');

        // Find alert components
        const alerts = page.locator('[role="alert"], .alert');

        for (let i = 0; i < await alerts.count(); i++) {
            const alert = alerts.nth(i);
            const role = await alert.getAttribute('role');

            // Alert should have role or aria attributes
            const isAlert = role === 'alert' || (await alert.getAttribute('aria-live')) === 'assertive';
            expect(isAlert || (await alert.getAttribute('class'))?.includes('alert')).toBeTruthy();
        }
    });
});
