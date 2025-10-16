<?php

declare(strict_types=1);

namespace Tests\Feature\Components;

use Tests\TestCase;

class ButtonComponentTest extends TestCase
{
    /**
     * Test button component renders with default primary type.
     */
    public function test_button_renders_with_primary_type(): void
    {
        $view = (string) $this->blade('<x-button>Save</x-button>');

        $this->assertStringContainsString('btn btn-primary', $view);
        $this->assertStringContainsString('Save', $view);
    }

    /**
     * Test button component renders all variants.
     */
    public function test_button_renders_all_variants(): void
    {
        $variants = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark'];

        foreach ($variants as $variant) {
            $view = (string) $this->blade("<x-button variant=\"{$variant}\">Test</x-button>");
            $this->assertStringContainsString("btn-{$variant}", $view);
        }
    }

    /**
     * Test button component renders size variants.
     */
    public function test_button_renders_sizes(): void
    {
        $view = (string) $this->blade('<x-button size="sm">Small</x-button>');
        $this->assertStringContainsString('btn-sm', $view);

        $view = (string) $this->blade('<x-button size="lg">Large</x-button>');
        $this->assertStringContainsString('btn-lg', $view);
    }

    /**
     * Test button component renders disabled state.
     */
    public function test_button_renders_disabled_state(): void
    {
        $view = (string) $this->blade('<x-button disabled>Disabled</x-button>');

        $this->assertStringContainsString('disabled', $view);
        // Button component uses native disabled attribute, not aria-disabled
        $this->assertStringContainsString('<button', $view);
    }

    /**
     * Test button component renders outline variant.
     */
    public function test_button_renders_outline_variant(): void
    {
        $view = (string) $this->blade('<x-button variant="primary" outline>Cancel</x-button>');
        $this->assertStringContainsString('btn-outline-primary', $view);
    }

    /**
     * Test button component renders with icon.
     */
    public function test_button_renders_with_icon(): void
    {
        $view = (string) $this->blade('<x-button icon="bi-trash" variant="danger">Delete</x-button>');

        $this->assertStringContainsString('bi-trash', $view);
        $this->assertStringContainsString('Delete', $view);
        $this->assertStringContainsString('btn-danger', $view);
    }

    /**
     * Test button component renders with accessibility attributes.
     */
    public function test_button_renders_with_accessibility_attributes(): void
    {
        $view = (string) $this->blade('<x-button aria-label="Delete item">Delete</x-button>');
        $this->assertStringContainsString('aria-label="Delete item"', $view);
    }
}
