---
applyTo: '**'
---

# Testing Instructions for Homestay Malaysia Management & Analytics System

**Project context:**
- National platform for MOTAC & Tourism Malaysia, built on Laravel 12.
- Align with SYSTEM_OVERVIEW_Version4, D01, D03, D04, D08, D09, D10.

**Guidelines AI must follow when generating code, answering questions, or reviewing changes:**

- **Test Scope and Coverage:**
  - Use PHPUnit or Pest. Target coverage ≥80% for critical modules (models, services, policies, controllers).
  - Include happy-path and at least one edge/failure case per feature.
  - Ensure tests reflect RBAC and policy outcomes.

- **Test Types:**
  - **Unit:** Pure business logic (services, validators).
  - **Feature:** HTTP endpoints, controllers, and FormRequests.
  - **Integration:** Import workflows, queues/jobs, notifications, caching.
  - **API Contract:** Validate response envelopes, pagination, and error localization.
  - **Database:** Model factories, relationships, and constraints.
  - **Accessibility (`A11y`):**
    - **Automated:** Integrate `axe-core` or similar tools into the CI pipeline to scan primary user flows. Fail builds on critical violations.
    - **Manual:** Feature validation must include keyboard-only navigation tests and screen reader spot-checks for all new UI components.

- **Test Data and Isolation:**
  - Use factories and `RefreshDatabase`.
  - Use `Carbon::setTestNow` for time-sensitive tests.
  - Seed roles and permissions for RBAC tests.

- **API Testing Conventions:**
  - Authenticate via Sanctum; assert JSON structure and localized error messages.

- **Jobs/Queues/Events:**
  - Use `Queue::fake()` and `Notification::fake()` to assert dispatches.

- **Policies and Middleware:**
  - Test policy methods directly and via guarded HTTP requests, asserting 403 vs. 200/201 status codes.

**References:** D03, D04, D08, D09, D10 — follow documented contracts, schemas, and acceptance criteria.
