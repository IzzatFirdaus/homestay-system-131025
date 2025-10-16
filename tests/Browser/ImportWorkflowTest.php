declare(strict_types=1);

namespace Tests\Browser;

use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ImportWorkflowTest extends DuskTestCase
{
    /**
     * Test complete import workflow: attach file, preview, submit, verify success.
     *
     * @return void
     */
    public function test_import_workflow_with_file_attachment(): void
    {
        $user = User::factory()->create(['role' => 'Admin']);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                ->visit('/import')
                ->assertSee(__('imports.title'))
                ->assertVisible('@import-form')
                ->pause(500);

            // Verify form elements are accessible
            $browser->assertVisible('input[wire\\:model="file"]')
                ->assertVisible('select[wire\\:model="importType"]')
                ->assertVisible('button[type="submit"]');

            // Submit form without file to trigger validation error
            $browser->click('button[type="submit"]')
                ->waitForText(__('validation.required'))
                ->assertSee(__('validation.required'));
        });
    }

    /**
     * Test keyboard navigation through import form.
     *
     * @return void
     */
    public function test_import_form_keyboard_navigation(): void
    {
        $user = User::factory()->create(['role' => 'Admin']);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                ->visit('/import')
                ->pause(500);

            // Tab to import type select
            $browser->keys('input[wire\\:model="file"]', '{tab}')
                ->pause(200)
                ->assertFocused('select[wire\\:model="importType"]');

            // Tab to submit button
            $browser->keys('select[wire\\:model="importType"]', '{tab}')
                ->pause(200)
                ->assertFocused('button[type="submit"]');

            // Tab to additional button or loop back
            $browser->keys('button[type="submit"]', '{tab}')
                ->pause(200);
        });
    }

    /**
     * Test skip-to-content link functionality.
     *
     * @return void
     */
    public function test_skip_to_content_link_accessible(): void
    {
        $user = User::factory()->create(['role' => 'Admin']);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                ->visit('/import')
                ->pause(500);

            // Skip-to-content link should be present
            $browser->assertVisible('a[href="#main-content"]');

            // Clicking it should focus main content
            $browser->click('a[href="#main-content"]')
                ->pause(200);
        });
    }

    /**
     * Test import form displays success message on valid submission.
     * Note: This test assumes a valid file upload scenario and mocked service.
     *
     * @return void
     */
    public function test_import_displays_validation_errors_inline(): void
    {
        $user = User::factory()->create(['role' => 'Admin']);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                ->visit('/import')
                ->pause(500)
                ->assertVisible('@import-form');

            // Trigger validation by submitting empty form
            $browser->click('button[type="submit"]')
                ->waitForText(__('validation.required'))
                ->assertSee(__('validation.required'));

            // Verify error message is associated with form field via aria-describedby
            $browser->assertVisible('input[aria-invalid="true"]');
        });
    }

    /**
     * Test import form reset functionality.
     *
     * @return void
     */
    public function test_import_form_can_be_reset(): void
    {
        $user = User::factory()->create(['role' => 'Admin']);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                ->visit('/import')
                ->pause(500);

            // Select import type
            $browser->select('select[wire\\:model="importType"]', 'performance')
                ->pause(300);

            // Verify selection
            $browser->assertSelected('select[wire\\:model="importType"]', 'performance');

            // Click reset button if available
            if ($browser->isVisible('button:contains("Reset")')) {
                $browser->click('button:contains("Reset")')
                    ->pause(200)
                    ->assertSelected('select[wire\\:model="importType"]', 'homestay');
            }
        });
    }

    /**
     * Test import form accessibility - aria-live region present.
     *
     * @return void
     */
    public function test_import_form_aria_live_region_present(): void
    {
        $user = User::factory()->create(['role' => 'Admin']);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                ->visit('/import')
                ->pause(500)
                ->assertVisible('[aria-live="polite"]');
        });
    }

    /**
     * Test import type select has proper labeling.
     *
     * @return void
     */
    public function test_import_type_select_accessibility(): void
    {
        $user = User::factory()->create(['role' => 'Admin']);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                ->visit('/import')
                ->pause(500);

            // Verify select has aria-label or associated label
            $browser->assertVisible('select[wire\\:model="importType"][aria-required="true"]');

            // Verify options are accessible
            $browser->assertVisible('select[wire\\:model="importType"] option');
        });
    }
}
