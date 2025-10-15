---
applyTo: '**'
---

# Accessibility (A11y) & Human-Centered Design Instructions for Homestay Malaysia Management & Analytics System

**Project context:**
- Public-sector system; **`WCAG 2.1 Level AA`** compliance is a mandatory requirement.
- Design process must align with **Human-Centered Design principles (ISO 9241-210)**.
- Laravel Blade + Livewire + AlpineJS + Bootstrap 5 UI stack.
- Align with SYSTEM_OVERVIEW_Version4, D03 (SRS UI), D04 (SDD UI), D10.

**Guidelines AI must follow when generating code, answering questions, or reviewing changes:**

### Human-Centered Design (ISO 9241-210) Principles
- **User Focus:** Ground all UI/UX decisions in an understanding of the end-users (e.g., "Pegawai Negeri," "Admin Koperasi"). Reference user personas where available.
- **Iterative Process:** Propose solutions that can be prototyped, tested with users, and refined. Acknowledge that user feedback is critical.
- **Holistic Experience:** Ensure new features integrate seamlessly into existing user workflows, minimizing cognitive load.

### WCAG 2.1 Level AA Requirements

- **Semantics & Structure:**
  - Use semantic HTML (`nav`, `main`, `header`, `footer`, `section`); ensure a logical heading hierarchy (`h1` through `h6`); every form input must have a programmatically associated `<label>`.

- **Keyboard & Focus:**
  - **Mandatory:** All interactive elements must be reachable and operable via keyboard.
  - Provide highly visible focus states (`visible focus indicator`).
  - Manage focus logically on route changes and when dialogs/modals open and close.
  - Include a "skip-to-content" link at the top of every page.

- **ARIA & Roles:**
  - Use ARIA attributes (`role`, `aria-label`, `aria-describedby`) only when native HTML semantics are insufficient.
  - For dynamic content (e.g., import progress, validation errors), use `aria-live` regions to announce status changes to screen readers.

- **Contrast & Color:**
  - Adhere strictly to WCAG AA contrast ratios (4.5:1 for normal text).
  - Never use color as the sole means of conveying information (e.g., accompany a red error state with an icon and text).

- **Forms & Validation:**
  - Associate error messages with their respective inputs using `aria-describedby`.
  - Ensure error messages are clear, concise, and provide guidance for correction in both Bahasa Melayu and English.

- **Media & Charts:**
  - All charts and complex visuals must have an accessible alternative, such as a summary text or an associated data table with proper headers and scope.
  - All icons and informational images must have descriptive `alt` text or be implemented as decorative (`alt=""`) if they provide no information.

- **Testing (Mandatory):**
  - **Automated:** All Pull Requests with UI changes must pass an automated accessibility scan (e.g., `axe-core`) integrated into the CI pipeline with zero critical violations.
  - **Manual:** All new features must undergo manual testing for keyboard-only navigation and a basic screen reader walkthrough (NVDA/VoiceOver) on critical user flows. Document this check in the PR.

**References:** D03/D04 UI requirements; MOTAC accessibility guidelines.
