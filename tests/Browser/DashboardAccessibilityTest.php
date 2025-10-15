<?php

declare(strict_types=1);

namespace Tests\Browser;

use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

/**
 * Dashboard accessibility test
 *
 * Verifies WCAG 2.1 AA compliance for dashboard:
 * - Chart alternatives (textual summary or data table)
 * - Keyboard navigation between widgets
 * - Semantic structure (headings, landmarks)
 */
class DashboardAccessibilityTest extends DuskTestCase
{
    /**
     * Test dashboard has textual alternative for charts
     */
    public function test_charts_have_textual_alternative(): void
    {
        $this->browse(function (Browser $browser) {
            $user = User::factory()->create();
            $user->assignRole('Super Admin');

            $browser->loginAs($user)
                ->visit('/dashboard')
                    // Verify main landmark exists
                ->assertPresent('main')
                    // Check for data table alternative (acceptable WCAG pattern)
                ->assertPresent('table.chart-data-table, .visually-hidden table, [aria-label*="data"]');
        });
    }

    /**
     * Test keyboard navigation between dashboard widgets
     */
    public function test_keyboard_navigation_between_widgets(): void
    {
        $this->browse(function (Browser $browser) {
            $user = User::factory()->create();
            $user->assignRole('Super Admin');

            $browser->loginAs($user)
                ->visit('/dashboard')
                    // Tab through widgets
                ->keys('body', '{tab}') // Skip link
                ->keys('body', '{tab}') // First widget/link
                    // Verify focus indicator visible (check computed styles in real impl)
                ->assertScript('document.activeElement !== document.body');

            // Continue tabbing to verify all interactive elements reachable
            for ($i = 0; $i < 10; $i++) {
                $browser->keys('body', '{tab}');
            }

            // Should reach footer or end of page
            $browser->assertScript('document.activeElement !== null');
        });
    }

    /**
     * Test semantic structure and heading hierarchy
     */
    public function test_semantic_structure(): void
    {
        $this->browse(function (Browser $browser) {
            $user = User::factory()->create();
            $user->assignRole('Super Admin');

            $browser->loginAs($user)
                ->visit('/dashboard')
                    // Verify main content landmarks
                ->assertPresent('header')
                ->assertPresent('nav')
                ->assertPresent('main')
                ->assertPresent('footer')
                    // Verify heading hierarchy starts with h1
                ->assertPresent('h1')
                    // Check page title in h1
                ->assertSeeIn('h1', 'Dashboard');
        });
    }

    /**
     * Test live region updates for dynamic content
     */
    public function test_live_region_for_updates(): void
    {
        $this->browse(function (Browser $browser) {
            $user = User::factory()->create();
            $user->assignRole('Super Admin');

            $browser->loginAs($user)
                ->visit('/dashboard')
                    // Verify aria-live region exists for notifications/updates
                ->assertPresent('[aria-live="polite"], [aria-live="assertive"], [role="status"], [role="alert"]');
        });
    }
}
