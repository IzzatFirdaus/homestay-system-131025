// ============================================================================
// MOTAC Homestay System - Main JavaScript Entry Point
// Bootstrap 5 + Alpine.js initialization
// ============================================================================

import './bootstrap';
import * as bootstrap from 'bootstrap';
import Alpine from 'alpinejs';

// ============================================================================
// BOOTSTRAP INITIALIZATION
// ============================================================================

// Make Bootstrap globally available for tooltips, popovers, modals, etc.
window.bootstrap = bootstrap;

// Initialize all Bootstrap tooltips
document.addEventListener('DOMContentLoaded', () => {
    // Enable all tooltips (requires data-bs-toggle="tooltip")
    const tooltipTriggerList = [].slice.call(
        document.querySelectorAll('[data-bs-toggle="tooltip"]')
    );
    tooltipTriggerList.map((tooltipTriggerEl) => {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Enable all popovers (requires data-bs-toggle="popover")
    const popoverTriggerList = [].slice.call(
        document.querySelectorAll('[data-bs-toggle="popover"]')
    );
    popoverTriggerList.map((popoverTriggerEl) => {
        return new bootstrap.Popover(popoverTriggerEl);
    });
});

// ============================================================================
// ALPINE.JS INITIALIZATION
// ============================================================================

// Make Alpine globally available for debugging and inline usage
window.Alpine = Alpine;

// Start Alpine (handles x-data, x-show, x-if, etc.)
Alpine.start();

// ============================================================================
// ACCESSIBILITY ENHANCEMENTS
// ============================================================================

// WCAG Pattern: Modal Focus Trap
// Ensures focus stays within modal dialog when opened, improving keyboard navigation
// Bootstrap modals have built-in focus management, but we enhance with explicit trap
document.addEventListener('shown.bs.modal', (event) => {
    const modal = event.target;
    const focusableElements = modal.querySelectorAll(
        'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'
    );

    if (focusableElements.length === 0) {
        return;
    }

    const firstElement = focusableElements[0];
    const lastElement = focusableElements[focusableElements.length - 1];

    // Focus first focusable element when modal opens
    firstElement.focus();

    // Trap focus within modal: Shift+Tab on first element goes to last, Tab on last goes to first
    modal.addEventListener('keydown', (e) => {
        if (e.key !== 'Tab') {
            return;
        }

        if (e.shiftKey && document.activeElement === firstElement) {
            e.preventDefault();
            lastElement.focus();
        } else if (!e.shiftKey && document.activeElement === lastElement) {
            e.preventDefault();
            firstElement.focus();
        }
    });
});

// WCAG Pattern: Ensure focus moves out of hidden modals
document.addEventListener('hidden.bs.modal', (event) => {
    const modal = event.target;
    // Remove focus from modal elements when modal closes
    if (document.activeElement && modal.contains(document.activeElement)) {
        // Focus the triggering button or body
        document.body.focus();
    }
});

// Announce dynamic content changes to screen readers (for Livewire updates)
// WCAG Pattern: Live region announcements for Livewire components
// When component updates, ensure aria-live regions re-announce for screen readers
if (typeof Livewire !== 'undefined') {
    Livewire.hook('message.processed', (message, component) => {
        // Find aria-live regions within the component and trigger announcement
        const liveRegions = component.el.querySelectorAll('[aria-live]');
        liveRegions.forEach((region) => {
            // Force screen reader announcement by temporarily clearing and restoring content
            const content = region.textContent;
            const ariaLive = region.getAttribute('aria-live');

            if (ariaLive === 'polite' || ariaLive === 'assertive') {
                region.textContent = '';
                window.setTimeout(() => {
                    region.textContent = content;
                }, 10);
            }
        });
    });
}

// ============================================================================
// PERFORMANCE & OPTIMIZATION
// ============================================================================

// Preload critical images/assets when page is idle
if ('requestIdleCallback' in window) {
    window.requestIdleCallback(() => {
        // Preload any critical images here if needed
        // Example: const img = new Image(); img.src = '/images/logo.png';
    });
}

// Log initialization complete (remove in production)
if (import.meta.env.DEV) {
    console.log('✅ Bootstrap 5 initialized');
    console.log('✅ Alpine.js initialized');
    console.log('✅ Accessibility enhancements loaded');
}

