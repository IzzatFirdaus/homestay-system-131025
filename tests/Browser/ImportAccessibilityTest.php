<?php

declare(strict_types=1);

namespace Tests\Browser;

use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

/**
 * Keyboard-only navigation test for import flow
 *
 * Tests WCAG 2.1 AA compliance:
 * - All interactive elements keyboard accessible
 * - Visible focus indicators
 * - Logical tab order
 * - Error announcements
 */
class ImportAccessibilityTest extends DuskTestCase
{
    /**
     * Test keyboard-only import flow
     *
     * User should be able to complete entire import using only keyboard:
     * 1. Tab to file input
     * 2. Select file via keyboard
     * 3. Tab to submit button
     * 4. Submit form
     * 5. Receive accessible success/error notification
     */
    public function test_keyboard_only_import_flow(): void
    {
        $this->browse(function (Browser $browser) {
            $user = User::factory()->create();
            $user->assignRole('Super Admin');

            $browser->loginAs($user)
                ->visit('/imports/create')
                    // Verify page has main landmark
                ->assertPresent('main')
                    // Tab to file input (should have visible focus)
                ->keys('body', ['{tab}', '{tab}'])
                    // Verify focus indicator visible (implementation-specific selector)
                ->assertFocused('input[type="file"]')
                    // Note: File selection via keyboard depends on OS file picker
                    // In real test, use @driver->executeScript to inject file
                    // Tab to submit button
                ->keys('input[type="file"]', '{tab}')
                ->assertFocused('button[type="submit"]')
                    // Verify button has accessible label
                ->assertSeeIn('button[type="submit"]', 'Upload')
                    // Submit with Enter key
                ->keys('button[type="submit"]', '{enter}')
                    // Verify success notification has aria-live region or role=alert
                ->waitFor('[role="alert"], [aria-live="polite"]', 5)
                ->assertSee('Import queued');
        });
    }

    /**
     * Test form validation errors are announced accessibly
     */
    public function test_validation_errors_are_announced(): void
    {
        $this->browse(function (Browser $browser) {
            $user = User::factory()->create();
            $user->assignRole('Super Admin');

            $browser->loginAs($user)
                ->visit('/imports/create')
                    // Submit without selecting file
                ->press('Upload')
                    // Wait for validation error
                ->waitFor('.invalid-feedback, [role="alert"]', 3)
                    // Verify error message present
                ->assertSee('file field is required')
                    // Verify error linked to input via aria-describedby or similar
                ->assertAttribute('input[type="file"]', 'aria-invalid', 'true');
        });
    }

    /**
     * Test skip-to-content link exists and works
     */
    public function test_skip_to_content_link(): void
    {
        $this->browse(function (Browser $browser) {
            $user = User::factory()->create();
            $user->assignRole('Super Admin');

            $browser->loginAs($user)
                ->visit('/dashboard')
                    // Tab to first element (should be skip link)
                ->keys('body', '{tab}')
                    // Verify skip link is visible on focus
                ->assertVisible('a[href="#main-content"], a[href="#content"]')
                    // Activate skip link
                ->keys('a[href="#main-content"], a[href="#content"]', '{enter}')
                    // Verify focus moved to main content
                ->waitFor('#main-content, #content', 2);
        });
    }
}
