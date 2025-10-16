# Deferred Security Improvements (TODO)

These items are medium-priority improvements identified in the October 2025 audit. Track and implement in the next sprint:

- [ ] **Session invalidation on password change**
  - Invalidate all active sessions/tokens when a user changes their password.
- [ ] **Password reuse prevention**
  - Track password history and prevent reuse of recent passwords.
- [ ] **API rate limiting review**
  - Confirm all endpoints have appropriate throttling; adjust as needed.
- [ ] **CSP strict mode refinement**
  - Remove `unsafe-inline` from CSP where possible; document Livewire/Alpine exceptions.
- [ ] **DOM innerHTML usage**
  - Refactor any direct HTML assignment to safer alternatives.

---

_See SECURITY_AUDIT_SUMMARY.md for context and remediation guidance._
