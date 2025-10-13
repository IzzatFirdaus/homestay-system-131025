---
applyTo: '**'
---

# Security Instructions for Homestay Malaysia Management & Analytics System

Project context:
- Government platform (MOTAC). Compliance with PDPA 2010, ISO/IEC 27001-aligned practices.
- Laravel 12, Sanctum, spatie/laravel-permission, Redis, MySQL/MariaDB.
- Align with SYSTEM_OVERVIEW_Version4, D01, D03 (security/NFR), D04 (security design), D08 (API security), D09 (data protection), D10.

Guidelines AI must follow when generating code, answering questions, or reviewing changes:
- Authentication & sessions
  - Use Laravel Sanctum for API auth; session-based for web. Enforce HTTPS/TLS 1.3.
  - Session timeout/inactivity per policy (default 30 minutes inactive).
- Authorization & RBAC
  - Always enforce via Policies and spatie roles/permissions. No bypassing. Apply middleware('can:...').
  - Scope data access by negeri/koperasi where applicable.
- Input validation & CSRF
  - Validate all inputs via FormRequest; localize messages (ms, en).
  - CSRF protection on web routes; disable only for trusted webhook endpoints with HMAC verification.
- Data protection
  - No secrets or PII in code/logs. Use .env for secrets; never commit .env.
  - Encrypt sensitive fields at rest where required; hash passwords with bcrypt/Argon2 via Laravel defaults.
  - Ensure TLS for DB connections where supported; sanitize logs.
- API security
  - Consistent error schema; do not leak stack traces or SQL errors.
  - Rate limiting per endpoint and per user/token (auth ~300/min; public lower).
  - Implement input size limits for uploads; validate MIME/extension; store outside web root; scan if required.
  - Apply CORS policy restricted to approved origins.
- Headers & hardening
  - Add security headers: HSTS, X-Content-Type-Options, X-Frame-Options, Content-Security-Policy (least privilege).
- File handling
  - Validate and store uploads in storage/app; generate randomized file names; do not allow direct execution.
- Secrets management & rotation
  - Store tokens/keys in environment secrets; rotate periodically; log access.
- Audit & logging
  - Log CRUD and import actions into audit_logs with before/after, IP, UA; redact sensitive values.
  - Structured logs; alert on suspicious behavior (failed login spikes, 401/403 surges).
- Dependency & patching
  - Keep Laravel and packages up to date; address CVEs; use composer audit.
- Incident response
  - On suspected breach: isolate, rotate secrets, review logs, notify stakeholders per incident SOP.
- Third-party integrations
  - OAuth2 or signed requests; verify certificates; implement circuit breaker & retry with backoff; never log tokens.

References: D03 security requirements, D04 security design, D08 integration security, D09 data protection, D10 coding conventions.