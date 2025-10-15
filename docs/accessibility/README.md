# Accessibility Testing Guide

## Overview

This document outlines the accessibility testing strategy for the Homestay Malaysia Management & Analytics System to ensure WCAG 2.1 Level AA compliance as mandated by D03 System Requirements Specification.

## Compliance Standard

**Target:** WCAG 2.1 Level AA

**Key Requirements:**

- All functionality available via keyboard
- Sufficient color contrast (4.5:1 for normal text, 3:1 for large text)
- Semantic HTML structure with proper landmarks
- Form inputs associated with labels
- Error messages programmatically announced
- Alternative text for non-decorative images
- Charts and complex visuals have textual alternatives

## Automated Testing

### Tools

1. **axe-core with Playwright** (Primary)
   - Location: `tests/Accessibility/`
   - Coverage: Login, Import, Dashboard, Reports
   - Run: `npm run a11y:test`
   - Report: `npm run a11y:report`

2. **Laravel Dusk** (Keyboard Navigation)
   - Location: `tests/Browser/`
   - Coverage: Full keyboard workflows
   - Run: `php artisan dusk`

### Running Automated Tests

```bash
# Install Playwright browsers (first time only)
npx playwright install chromium

# Run accessibility tests
npm run a11y:test

# View HTML report
npm run a11y:report
```

### CI/CD Integration

Automated accessibility tests run on every Pull Request via GitHub Actions:

- Zero **critical** or **serious** violations allowed
- **Moderate** and **minor** violations generate warnings
- Test results uploaded as artifacts

## Manual Testing Requirements

Automated tools cannot catch all accessibility issues. The following manual checks are **required** for all new features and UI changes:

### 1. Keyboard-Only Navigation

**Test:** Navigate entire feature using only keyboard (no mouse)

**Checklist:**

- [ ] All interactive elements reachable via Tab/Shift+Tab
- [ ] Focus indicator clearly visible on all elements
- [ ] Logical tab order (top to bottom, left to right)
- [ ] No keyboard traps (can always navigate away)
- [ ] Enter/Space activates buttons and links
- [ ] Escape closes modals/dropdowns
- [ ] Arrow keys navigate within lists/menus
- [ ] Skip-to-content link present and functional

**How to test:**

1. Load page
2. Press Tab repeatedly
3. Verify all interactive elements are reachable
4. Document any elements that cannot be reached

### 2. Screen Reader Spot Check

**Tools:** NVDA (Windows) or VoiceOver (Mac)

**Checklist:**

- [ ] Page title announced on load
- [ ] Headings read in logical order
- [ ] Form labels announced with inputs
- [ ] Validation errors announced immediately
- [ ] Button purpose clearly stated
- [ ] Images have descriptive alt text or are marked decorative
- [ ] Data tables have headers announced
- [ ] Live regions announce dynamic content updates

**How to test (NVDA on Windows):**

1. Start NVDA: Ctrl+Alt+N
2. Navigate page: Down arrow or Tab
3. Read headers: H key
4. Read links: K key
5. Read form fields: F key
6. Listen for announcements when content changes

**How to test (VoiceOver on Mac):**

1. Start VoiceOver: Cmd+F5
2. Navigate: VO+Right arrow (VO = Ctrl+Option)
3. Read headers: VO+Cmd+H
4. Read links: VO+Cmd+L
5. Read form controls: VO+Cmd+J

### 3. Color Contrast

**Tool:** Browser DevTools or [WebAIM Contrast Checker](https://webaim.org/resources/contrastchecker/)

**Checklist:**

- [ ] Normal text: ≥ 4.5:1 contrast ratio
- [ ] Large text (18pt+ or 14pt+ bold): ≥ 3:1
- [ ] UI components and graphics: ≥ 3:1
- [ ] Focus indicators: ≥ 3:1 against background

### 4. Responsive/Zoom Testing

**Checklist:**

- [ ] Page usable at 200% zoom without horizontal scroll
- [ ] Content reflows appropriately
- [ ] No content hidden or cut off
- [ ] All functionality remains accessible

### 5. Forms and Validation

**Checklist:**

- [ ] Every input has associated `<label>` or aria-label
- [ ] Required fields marked with `*` AND `aria-required="true"`
- [ ] Validation errors have `aria-invalid="true"` on input
- [ ] Error messages linked via `aria-describedby`
- [ ] Success/error notifications in `role="alert"` or `aria-live="polite"`

## Primary User Flows to Test

All features must pass automated AND manual accessibility tests for these flows:

1. **Authentication**
   - Login
   - Password reset
   - Logout

2. **Import Workflow**
   - Upload file
   - Preview data
   - View validation errors
   - Download error report

3. **Dashboard**
   - View KPIs
   - Navigate between widgets
   - Access textual chart alternatives
   - Filter data

4. **Reports**
   - Select report type
   - Configure parameters
   - Generate report
   - Download result

5. **CRUD Operations**
   - Create homestay
   - Edit performance data
   - View details
   - Delete records

## Testing Documentation

### For Each Feature PR

Include in PR description:

```markdown
## Accessibility Testing

### Automated
- [ ] `npm run a11y:test` passed with zero critical/serious violations
- [ ] Attached axe-core scan results

### Manual
- [ ] Keyboard-only navigation tested: [PASS/FAIL]
- [ ] Screen reader spot check (NVDA/VoiceOver): [PASS/FAIL]
- [ ] Color contrast verified: [PASS/FAIL]
- [ ] 200% zoom tested: [PASS/FAIL]

### Notes
[Any specific accessibility considerations, known issues, or mitigation strategies]
```

## Known Limitations

1. **Chart.js Canvases:** Charts require textual alternatives. Ensure each chart has:
   - Descriptive `aria-label` on canvas element, OR
   - Visually hidden data table with same information

2. **Third-Party Components:** Bootstrap modals, dropdowns, and tooltips generally accessible but verify:
   - Focus management (focus moved to modal on open, returned on close)
   - Escape key dismissal
   - Aria attributes present

3. **Livewire Dynamic Updates:** Ensure changes announced via aria-live regions

## Remediation Priority

When violations found:

1. **Critical** (blocks use): Fix immediately, block PR merge
2. **Serious** (major barrier): Fix before release
3. **Moderate**: Fix in next sprint
4. **Minor**: Backlog for improvement

## Resources

- [WCAG 2.1 Quick Reference](https://www.w3.org/WAI/WCAG21/quickref/)
- [WebAIM WCAG 2.1 Checklist](https://webaim.org/standards/wcag/checklist)
- [axe DevTools Browser Extension](https://www.deque.com/axe/devtools/)
- [NVDA Screen Reader](https://www.nvaccess.org/download/)
- [D03 System Requirements Specification](../condensed_D03_SYSTEM_REQUIREMENT_SPECIFICATIONS.md) (Accessibility requirements)

## Contact

For accessibility questions or support, contact:

- **QA Lead:** [Name/Email]
- **Frontend Team:** [Name/Email]
- **Project Manager:** [Name/Email]
