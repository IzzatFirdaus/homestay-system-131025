---
# Homestay Malaysia Management & Analytics System — Engineering & Copilot Prompt

**System Owner:** MOTAC & Tourism Malaysia  
**Version:** 4.0  
**Status:** Development  
**Updated:** 12 Oct 2025

This prompt defines the unified technical, engineering, and Copilot agent instructions for developing, scaffolding, and evolving the application codebase for the Homestay Malaysia Management & Analytics System. It supersedes previous prompts and is the single source of truth for all development and Copilot-generated code, fully aligned with the project README.md and all documentation in docs/ (D01–D10, SYSTEM_OVERVIEW_Version4).

---

## SYSTEM CONTEXT

- **Stack Overview:**
  - **Backend:** Laravel 12 (PHP 8.2+), Eloquent ORM, Service Layer, Policies/Gates, Sanctum, Queues/Workers (Redis), Observers (audit)
  - **Frontend:** Livewire (server-side rendering), AlpineJS (client-side interactivity), Blade, Bootstrap 5, Chart.js, Vite, i18n (resources/lang/ms,en)
  - **Database:** MySQL 8.0+/MariaDB, normalized schema with strict FKs
  - **Files/Export:** Laravel-Excel (maatwebsite/excel), DOMPDF (barryvdh/laravel-dompdf)
  - **RBAC:** spatie/laravel-permission with role-based policies (Admin, Penganalisis, Pemerhati, Negeri Admin, Koperasi Admin)
- **Environment/Security:**
  - Use .env for all secrets; PDPA and security best practices apply
  - Timezone Asia/Kuala_Lumpur; default locale ms, fallback en

---

## ARCHITECTURAL PRINCIPLES & CONTRACTS

- **MVC + Service Layer:**  
  - Controllers must remain thin; domain/business logic belongs in `app/Services/*Service.php` with clear input/output contracts and error handling.
- **Authorization-first:**  
  - Always apply Policies/Gates; never bypass RBAC checks. Use spatie/laravel-permission roles and per-model policies.
- **Observers/Audit:**  
  - Record all CRUD and import actions to `audit_logs` with before/after, IP, UA.
- **API Contracts:**  
  - REST endpoints in `routes/api.php` (v1), auth via Sanctum, consistent error schema `{ message|error|code }`, enforce rate limits (auth ~300/min; public lower as per docs).
- **Data Import:**  
  - Use Laravel-Excel for validate → map → preview → queue process; track progress and error logs; implement retry/backoff.
- **Performance & Caching:**  
  - Use Redis caching, eager loading, query scopes; design for ≤50ms queries; ensure appropriate indexing (see D09).
- **i18n & Accessibility:**  
  - Use translation keys everywhere; Malay-first with EN fallback; meet WCAG 2.1 AA for UI.

---

## MODULES TO SCAFFOLD (MINIMUM)

- **Database/Migrations:**  
  - `cooperatives`, `clusters`, `homestays`, `performances`, `imports`, `audit_logs`, `notifications`, `system_settings`, `laporan_terjadual`.
  - Collation `utf8mb4_unicode_ci`, InnoDB, strict FKs, composite indexes per D09, soft deletes where required.
- **Models:**  
  - Homestay, Cooperative, Cluster, Performance, Import, AuditLog, User (with roles/relations). Use casts/attributes, query scopes, and PHPDoc as per docs.
- **Services:**  
  - ImportService, ReportService, PerformanceService, HomestayService, UserAccessService.
- **Policies:**  
  - HomestayPolicy, PerformancePolicy, ImportPolicy (register in AuthServiceProvider, align rules with D03).
- **Middleware:**  
  - AuditTrail, CheckHomestayAccess, CheckImportInProgress, EnsureNegeriAssigned.
- **Routes:**  
  - `routes/web.php` (resources, dashboards, admin), `routes/api.php` (v1 endpoints, throttles, health).
- **Frontend:**  
  - Blade + Livewire components for Dashboard, Homestay, Import; AlpineJS for lightweight interactivity; Chart.js integration; i18n-ready strings.

---

## QUALITY GATES, TESTING & CI

- **Testing:**  
  - Use `php artisan test`; target coverage ≥80% (models, services, controllers, APIs). Add factories/seeders to support tests.
- **Static Analysis:**  
  - Enforce phpstan (level per docs, aim high), PSR-12 with Pint, ESLint/Prettier for JS. Vite build must pass.
- **Security/Compliance:**  
  - No secrets in repo; always honor Policies; structured logs; Sentry-ready hooks; API rate limits.

---

## WORKFLOWS (LOCAL DEV & CI)

- **Setup:**  
  - Follow README.md “Getting Started” exactly:  
    - `composer install`  
    - `npm install`  
    - `cp .env.example .env`  
    - `php artisan key:generate`  
    - `php artisan migrate --seed`  
    - `npm run dev`  
    - `php artisan serve` (and `php artisan queue:work` for imports)
- **CI/CD:**  
  - Require passing static analysis, tests, and build for PR merge (see .github/workflows/ci.yml).
  - Use `.env.example` for all required environment variables.

---

## FEATURE DELIVERY CHECKLIST (APPLY TO EVERY CHANGE)

- Schema/data: migrations, factories, seeders updated; indexes correct; rollback safe.
- Domain logic: service methods with clear contracts, validation, error handling; transactions where needed.
- Authorization: policies/middleware wired; tests for allowed/denied paths by role.
- API/UI: consistent JSON resources; Blade/Livewire uses i18n; accessible markup; handle loading/empty/error states.
- Observability: audit logs on CUD/import; structured logs for failures; performance-conscious queries.
- Tests: unit + feature + API tests for happy and edge cases; maintain coverage.
- Docs: update `docs/D10` or module docs when behavior changes; add ADR for major decisions.

---

## PROMPTING INSTRUCTIONS (FOR GITHUB COPILOT & DEVELOPERS)

1. **ALWAYS** follow all rules, contracts, and style in this file.
2. **NEVER** bypass policies, validation, or security best practices.
3. **NEVER** place business logic in controllers or views.
4. **ALWAYS** write code that is modular, testable, and maintainable.
5. **ALWAYS** use translation keys for all output/UI.
6. **ALWAYS** enforce RBAC and log auditable actions.
7. **ALWAYS** prefer Eloquent/Query Builder over raw SQL; migrations for schema.
8. **ALWAYS** use PSR-12 style for PHP, Prettier/ESLint for JS.
9. **ALWAYS** add/maintain PHPDoc and docstrings for functions/classes.
10. **ALWAYS** write tests for new/changed code.
11. **IF IN DOUBT:** Follow README.md and docs/; enforce services-first, policies-first, and test-first behavior.

---

## EXAMPLES FOR COPILOT PROMPTING

- **Migration/Model:**  
  > Add migration for `<table>` with columns and indexes per D09. Update model `<Model>` with fillable, casts, relations, scopes, accessors; add PHPDoc.

- **Service Logic:**  
  > In `<Service>`, implement `<method>(InputDTO): OutputDTO|throws`; validate inputs, apply policy checks, wrap in DB::transaction as needed; dispatch events/jobs; return value objects.

- **Policies & Routes:**  
  > Define Policy methods for viewAny/view/create/update/delete with role rules from docs; register in AuthServiceProvider; apply `middleware('can:...')` in routes/controllers.

- **API Endpoint:**  
  > Add controller method using service; return Resource/JsonResponse with { data|meta|errors }; validate via Form Request; rate-limit and auth via Sanctum; add tests.

- **Import Workflow:**  
  > Implement `ImportService::process<Type>Import()`: chunked read, row validation/mapping, idempotent upserts, progress and error log, queue job; controller endpoints for upload/preview/process/show; Excel error report.

- **Reporting:**  
  > ReportService methods to generate Excel/PDF (Laravel-Excel, DOMPDF); queue long jobs; store temporary files; schedule via scheduler; RBAC checks.

---

## PHASED DEVELOPMENT FLOW FOR COPILOT

1. **Phase 1: Project Setup**
   - Scaffold Laravel 12, setup .env, composer/npm, CI skeleton, baseline README.
2. **Phase 2: Database Schema & Migrations**
   - All tables, FKs, indexes, constraints per D09, reversible migrations, minimal seeders.
3. **Phase 3: Models, Factories & Seeders**
   - All models with relationships, casts, PHPDoc, SoftDeletes, factories, and seeders.
4. **Phase 4: Service Layer & Domain Logic**
   - All business logic in services, DTOs, custom exceptions, transactions, events/jobs.
5. **Phase 5: Policies, Middleware & Observers**
   - All RBAC, policies, custom middleware, observers for audit logging.
6. **Phase 6: Routes & Controllers**
   - Resource/controllers, API routes, thin controllers using services, FormRequests.
7. **Phase 7: Form Requests & Validation**
   - Validation via FormRequest, custom BM/EN messages, business rules.
8. **Phase 8: Frontend (Blade/Livewire)**
   - Dashboard, CRUD, import UI, i18n, accessibility, Chart.js.
9. **Phase 9: Import/Export & Jobs**
   - Chunked imports, Excel error reporting, queue jobs, progress tracking.
10. **Phase 10: Testing & Documentation**
    - Unit/feature/API tests, update docs/D10, code comments, coverage checks.
11. **Phase 11: Integration & CI/CD**
    - API integration, health checks, GitHub Actions, build/test/deploy pipelines.

At each phase, Copilot/Developer must:

- Reference the exact section(s) of this prompt and docs governing that phase.
- Provide complete, robust, and testable solutions.
- Output full files or commands as needed.
- Explain assumptions, dependencies, and validation steps.
- Validate correctness and fit before proceeding to the next phase.

---

## SOURCES

- README.md (project overview, stack, workflows)
- `docs/D01`–`D10`, SYSTEM_OVERVIEW_Version4.md (system goals, architecture, requirements, data dictionary)
- TECHNICAL_DESIGN_DOCUMENTATION

---

**When in doubt, follow this prompt, README, and docs. Always enforce services-first, policies-first, test-first, and security-first behavior.**

---
