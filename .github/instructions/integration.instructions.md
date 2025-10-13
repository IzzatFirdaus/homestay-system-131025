---
applyTo: '**'
---

# Integration Instructions for Homestay Malaysia Management & Analytics System

Project context:
- Internal module integration plus external APIs (MOTAC HQ, State APIs, Maps, Email/SMS).
- Align with SYSTEM_OVERVIEW_Version4, D03 (SRS), D04 (SDD), D07 (SIP), D08 (SIS), D10.

Guidelines AI must follow when generating code, answering questions, or reviewing changes:
- Contracts & versioning
  - API-first with OpenAPI 3; version endpoints (/api/v1). Backward-compatible changes only in minor/patch; deprecate with notice.
- Security
  - HTTPS/TLS 1.3; OAuth2/Bearer tokens; secrets in env; rotate tokens; never log tokens/PII.
- Reliability
  - Implement timeout, retries with exponential backoff, and circuit breaker for external calls.
  - Use queues for bulk/long-running integrations; idempotent operations and correlation IDs.
- Error handling
  - Normalize errors into { error: { message, code, details } }; map external error codes; do not leak internals.
- Data mapping & validation
  - Transform inputs/outputs to internal schema; validate enums (state codes), date formats (ISO8601), numeric bounds.
- Rate limiting
  - Respect provider limits; throttle outbound calls; cache stable reference data.
- Health & monitoring
  - Add health/readiness endpoints; structured logs with correlation ID; metrics for latency, error rate.
- Environments
  - Separate config per env; never call production from non-production; use stubs/mocks for tests.

References: D07 integration plan, D08 specification, D04 architecture.