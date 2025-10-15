## Summary

<!-- Provide a brief description of what this PR does -->

## Related Issue(s)

<!-- Link to related issues: Closes #123, Relates to #456 -->

## Type of Change

- [ ] Bug fix (non-breaking change which fixes an issue)
- [ ] New feature (non-breaking change which adds functionality)
- [ ] Breaking change (fix or feature that would cause existing functionality to not work as expected)
- [ ] Documentation update
- [ ] Performance improvement
- [ ] Code refactoring
- [ ] Accessibility improvement

## Test Coverage

- [ ] Unit tests added/updated
- [ ] Feature tests added/updated
- [ ] Integration tests added/updated (if applicable)
- [ ] All tests passing locally: `composer test`
- [ ] Coverage threshold met (≥80% for critical paths)

**Link to test artifacts:** <!-- Add link after CI runs -->

## Accessibility Compliance (WCAG 2.1 AA)

### Automated Testing

- [ ] `npm run a11y:test` passed with **zero critical/serious violations**
- [ ] axe-core scan results attached or linked

**Violations Summary:**
<!-- Paste summary or link to full report -->
- Critical: 0
- Serious: 0
- Moderate: X
- Minor: Y

### Manual Testing

- [ ] **Keyboard-only navigation tested:** All interactive elements reachable via Tab, Enter/Space activates, no keyboard traps
- [ ] **Screen reader spot check (NVDA/VoiceOver):** Headings, labels, errors, and notifications announced correctly
- [ ] **Color contrast verified:** All text and UI components meet 4.5:1 (or 3:1 for large text)
- [ ] **200% zoom tested:** Content reflows without horizontal scroll, no cut-off content

### Accessibility Notes

<!-- Document any specific accessibility considerations, known issues, or mitigation strategies -->
<!-- Examples: chart alternatives provided, focus management in modals, aria-live for notifications -->

## Performance Impact

- [ ] No significant performance degradation (dashboard p95 < 2s, API p95 < 500ms)
- [ ] Tested with sample data of realistic size (10k+ rows for imports)
- [ ] Database queries optimized (eager loading, indexes)

**Performance notes:**
<!-- Any performance metrics, optimizations, or concerns -->

## Security Impact

- [ ] No new security vulnerabilities introduced
- [ ] Input validation applied
- [ ] CSRF protection maintained
- [ ] Authorization checks enforced
- [ ] No sensitive data in logs

## Database Changes

- [ ] Migrations added (reversible with `down()` method)
- [ ] Seeds updated if needed
- [ ] No destructive changes to existing data

**Migration notes:**
<!-- Describe schema changes, data impacts, rollback strategy -->

## Deployment Notes

- [ ] Environment variables documented (if new vars added)
- [ ] Background jobs/queues considered
- [ ] Cache invalidation handled
- [ ] No breaking API changes (or documented with version bump)

## Checklist

- [ ] Code follows PSR-12 standards: `composer run format:test`
- [ ] PHPStan analysis passes: `composer run analyse`
- [ ] ESLint/Prettier checks pass: `npm run lint && npm run format:check`
- [ ] Self-reviewed code and addressed obvious issues
- [ ] Documentation updated (inline PHPDoc, README, or docs/)
- [ ] Localized all user-facing strings (ms and en)
- [ ] Verified no console errors or warnings in browser

## Screenshots (if UI changes)

<!-- Add before/after screenshots or videos for UI changes -->

## Additional Context

<!-- Any other context, dependencies, or information reviewers should know -->
