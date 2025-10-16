# Security Headers Validation Checklist

Use this checklist to validate security headers on the staging environment before production deployment:

## Steps

1. Deploy the latest code to the staging environment (with production-like config).
2. Open https://securityheaders.com/ and enter your staging URL.
3. Confirm the following headers are present and correctly configured:

- [ ] **Strict-Transport-Security (HSTS)**: `max-age=31536000; includeSubDomains`
- [ ] **Content-Security-Policy (CSP)**: No `unsafe-inline` except for Livewire/Alpine (document exceptions)
- [ ] **X-Frame-Options**: `SAMEORIGIN`
- [ ] **X-Content-Type-Options**: `nosniff`
- [ ] **Referrer-Policy**: `strict-origin-when-cross-origin`
- [ ] **Permissions-Policy**: restricts camera, microphone, geolocation, etc.
- [ ] **Cache-Control**: `no-store` for sensitive endpoints
- [ ] **Set-Cookie**: `Secure; HttpOnly; SameSite=Strict` for all session cookies

4. Document any warnings or failures and create issues for remediation.
5. Re-run the scan after any changes.

---

**Reference:** See `SECURITY_AUDIT_SUMMARY.md` and `SECURITY_AUDIT_COMPLETION_SUMMARY.md` for required header details.
