---
applyTo: '**'
---

# Testing Instructions for Homestay Malaysia Management & Analytics System

Project context:
- National platform for MOTAC & Tourism Malaysia.
- Laravel 12 (PHP 8.2+), MySQL/MariaDB, Redis, Sanctum, spatie/laravel-permission, Vue 3.
- Align with SYSTEM_OVERVIEW_Version4, D01 (SDP), D03 (SRS), D04 (SDD), D08 (SIS), D09 (DBD), D10 (Source Code Doc), TECHNICAL_DESIGN_DOCUMENTATION.

Guidelines AI must follow when generating code, answering questions, or reviewing changes:
- Test scope and coverage
  - Use PHPUnit or Pest. Target coverage ≥80% for changed/critical modules (models, services, policies, middleware, controllers, API resources).
  - Include happy-path and at least one edge/failure case per feature.
  - Ensure tests reflect RBAC and policy outcomes (allowed/denied by role and negeri scope).
- Test types
  - Unit: Pure business logic (services, validators, value objects).
  - Feature: HTTP endpoints, controllers using FormRequests and Policies.
  - Integration: Import (Laravel-Excel), queues/jobs, notifications, caching behavior.
  - API contract: Validate response envelope {data|meta|error}, pagination, rate-limits (headers), and localization of messages.
  - Database: Model factories, relationships, scopes, unique constraints (e.g., homestay+tahun+bulan).
  - Performance sanity: Assert no N+1 via Laravel’s expectsDatabaseQueryCount or custom assertions; verify eager loading.
- Test data and isolation
  - Use factories and seeders. Prefer RefreshDatabase or DatabaseTransactions.
  - Avoid brittle time-based assertions; fix timezone Asia/Kuala_Lumpur and use Carbon::setTestNow.
  - Create role fixtures (Admin, Penganalisis, Pemerhati, Negeri Admin, Koperasi Admin) with spatie/permissions seeded.
- API testing conventions
  - Authenticate via Sanctum in tests; check rate limiting headers X-RateLimit-*.
  - Assert JSON structure and localization (ms default, en fallback) for validation errors (422) and domain errors.
  - Validate pagination meta matches D08 and includes per_page, current_page, total, last_page.
- Import workflow tests (D05/D06)
  - Preview → process queue → progress tracking → error report generation.
  - Idempotency: re-running import should not duplicate records; verify unique constraints.
- Jobs/Queues/Events
  - Use Queue::fake() and Notification::fake() to assert dispatches and delivery.
  - Test backoff/retry behavior for transient failures; verify DLQ/failure handling where applicable.
- Policies and middleware
  - Exercise Policy methods directly and via HTTP requests guarded by middleware('can:...'); assert 403 vs 200/201.
- Caching/Performance
  - Cache layer coverage: assert cached responses for dashboard/report, TTL adherence, invalidation on write/import events.
- Static analysis and style (pre-merge)
  - phpstan at documented level; Pint PSR-12; ESLint/Prettier for JS.
- CI integration (D01/D10)
  - Ensure tests runnable via `php artisan test` in CI with .env.testing; database spun up (MySQL 8) and Redis if needed.

Minimum test checklist per feature:
- Unit tests for service methods (success + 1–2 edge cases).
- Feature tests for endpoints (auth required, validation 422, RBAC 403, success 200/201).
- Policy tests for roles and negeri-scoped access.
- Factory-based data setup; no hard-coded IDs.
- Assertions for events/jobs/notifications when applicable.

References: D03, D04, D08, D09, D10 — follow documented contracts, schemas, and acceptance criteria.