import { expect } from '@playwright/test';

/**
 * Custom Playwright matchers for accessibility testing
 */

// Add toBeFocusable matcher
expect.extend({
    async toBeFocusable(locator) {
        const elementHandle = await locator.elementHandle();

        if (!elementHandle) {
            return {
                pass: false,
                message: () => 'Element not found',
            };
        }

        const isFocusable = await elementHandle.evaluate((el) => {
            // Check if element is focusable
            const tabIndex = el.tabIndex;
            const tagName = el.tagName.toLowerCase();
            const type = el.type;

            // Naturally focusable elements
            const naturallyFocusable = ['a', 'button', 'input', 'select', 'textarea'].includes(tagName);

            // Input types that are not focusable
            const nonFocusableInputTypes = ['hidden'];

            // Check if disabled
            const isDisabled = el.disabled || el.getAttribute('aria-disabled') === 'true';

            // Element is focusable if:
            // 1. It has tabIndex >= 0
            // 2. It's a naturally focusable element and not disabled
            // 3. It's not a non-focusable input type
            const focusable = (
                (tabIndex >= 0) ||
                (naturallyFocusable && !isDisabled && !nonFocusableInputTypes.includes(type))
            ) && !isDisabled;

            return focusable;
        });

        return {
            pass: isFocusable,
            message: () => isFocusable
                ? 'Element is focusable'
                : 'Element is not focusable (no tabindex, not a focusable element, or disabled)',
        };
    },
});
