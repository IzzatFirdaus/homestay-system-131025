---
applyTo: '**'
---

# Accessibility (A11y) Instructions for Homestay Malaysia Management & Analytics System

Project context:
- Public-sector system; WCAG 2.1 AA compliance target.
- Laravel Blade + Livewire + Bootstrap 5 UI.
- Align with SYSTEM_OVERVIEW_Version4, D03 (SRS UI), D04 (SDD UI), D10.

Guidelines AI must follow when generating code, answering questions, or reviewing changes:
- Semantics & structure
  - Use semantic HTML (nav, main, header, footer); proper heading hierarchy; labels for inputs.
- Keyboard & focus
  - Ensure all interactive elements are reachable via keyboard; visible focus states; focus management on route/dialog open/close; provide skip-to-content links.
- ARIA & roles
  - Use ARIA attributes only when necessary; ensure ARIA matches behavior; provide aria-live regions for async status (e.g., import progress).
- Contrast & color
  - Maintain contrast ratios per WCAG AA; never rely on color alone to convey meaning; provide text alternatives.
- Forms & validation
  - Associate labels with inputs; describe errors inline and programmatically (aria-describedby); include instructions and examples.
- Media & charts
  - Provide alternative text/summary for charts; data tables with headers, caption, and scope; ensure screen-reader-friendly chart descriptions.
- Testing
  - Run axe or similar checks; manual keyboard testing; NVDA/VoiceOver spot checks on critical flows.

References: D03/D04 UI requirements; follow GOV/Malaysia accessibility guidance if available.
