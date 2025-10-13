---
mode: agent
---

# Homestay Malaysia Management & Analytics System — Unified Copilot Prompt

_System owner: MOTAC & Tourism Malaysia_  
_Version: 4.0 • Status: Development • Updated: 12 Oct 2025_

---

## 1. Purpose

This prompt defines how GitHub Copilot (including Copilot Chat) must generate, revise, and review application code for the Homestay Malaysia Management & Analytics System. It consolidates all engineering, architectural, and coding standards from the project’s source documentation and training materials. Use this as the single source of truth for all scaffolding, feature, and maintenance work.

---

## 2. System Context

- **System Owner:** MOTAC & Tourism Malaysia
- **System:** Homestay Malaysia Management & Analytics System
- **Tech Stack:**  
	- **Backend:** Laravel 12 (PHP 8.2+), Eloquent ORM, Service Layer, Policies/Gates, Sanctum, Queues/Workers (Redis), Observers (audit)
	- **Frontend:** Vue 3 + Vite, Blade, Bootstrap 5, Chart.js, i18n (`resources/lang/ms,en`)
	- **Database:** MySQL 8.0+/MariaDB, normalized schema with strict FKs
	- **Files/Export:** Laravel-Excel (maatwebsite/excel), DOMPDF (barryvdh/laravel-dompdf)
	- **RBAC:** spatie/laravel-permission with role-based policies (Admin, Penganalisis, Pemerhati, Negeri Admin, Koperasi Admin)
- **General Notes:**
	- All secrets in `.env`; PDPA & security best practices apply.
	- Timezone: Asia/Kuala_Lumpur; default locale: ms, fallback: en.

---

## 3. Architecture & Coding Contracts

- **MVC + Services:**  
	- Controllers must remain thin; all domain/business logic resides in `app/Services/*Service.php` with clear input/output contracts and error handling.
- **Authorization:**  
	- Always apply Policies/Gates; never bypass RBAC. Use spatie roles and per-model policies.
- **Observers/Audit:**  
	- Record all CRUD and import actions to `audit_logs` with before/after, IP, UA.
- **API:**  
	- RESTful (`routes/api.php` v1), auth via Sanctum, consistent error schema `{ message|error|code }`, rate limits (auth: ~300/min; public: lower per docs).
- **Data Import:**  
	- Use Laravel-Excel: validate → map → preview → queue process; progress tracking, error logs, retry/backoff.
- **Performance/Caching:**  
	- Use Redis caching, eager loading, query scopes; ≤50ms queries where feasible; index per D09.
- **i18n & Accessibility:**  
	- Use translation keys; Malay-first labels with EN fallback; WCAG 2.1 AA for UI.

---

## 4. Modules & Scaffolding Requirements

- **Database (migrations):**  
	- `cooperatives`, `clusters`, `homestays`, `performances`, `imports`, `audit_logs`, `notifications`, `system_settings`, `laporan_terjadual`.  
	- Collation: `utf8mb4_unicode_ci`, Engine: InnoDB, strict FKs, required composite indexes per D09, soft deletes where specified.
- **Models:**  
	- Homestay, Cooperative, Cluster, Performance, Import, AuditLog, User (extends with roles/relations).  
	- Use casts/attributes and query scopes per README/docs.
- **Services:**  
	- ImportService, ReportService, PerformanceService, HomestayService, UserAccessService (with business logic, transactions, retries, events/queues).
- **Policies:**  
	- HomestayPolicy, PerformancePolicy, ImportPolicy (register in AuthServiceProvider); align rules with D03.
- **Middleware:**  
	- AuditTrail, CheckHomestayAccess, CheckImportInProgress, EnsureNegeriAssigned.
- **Routes:**  
	- `routes/web.php` (resources + dashboards + admin), `routes/api.php` (v1 endpoints, throttles, health).
- **Frontend:**  
	- Blade + Vue 3 pages for Dashboard, Homestay, Import; Chart.js integration; i18n-ready strings.

---

## 5. Quality Gates & CI Expectations

- **Testing:**  
	- Use `php artisan test`; target coverage ≥80% (models, services, controllers, API resources). Add factories/seeders to support tests.
- **Static Analysis:**  
	- phpstan (high level per docs), PSR-12 via Pint; ESLint/Prettier for JS. Vite build must pass.
- **Security/Compliance:**  
	- No secrets in repo; respect Policies; structured logs; Sentry-ready hooks; API rate limits.

---

## 6. Developer Workflow (Local)

Follow README.md “Getting Started” exactly:
1. `composer install`
2. `npm install`
3. `cp .env.example .env`
4. `php artisan key:generate`
5. `php artisan migrate --seed`
6. `npm run dev`
7. `php artisan serve` (and `php artisan queue:work` for imports)
8. Use Redis for queues/caching.

---

## 7. Feature Delivery Checklist

For every change:
- **Schema & Data:** migrations, factories, seeders updated; indexes appropriate; rollback safe.
- **Domain Logic:** service methods with clear contracts, validation, error handling; transactions where needed.
- **Authorization:** policies/middleware wired; tests for allowed/denied paths by role.
- **API/UI:** consistent JSON resources; Blade/Vue uses i18n; accessible markup; loading/empty/error states.
- **Observability:** audit logs on CUD/import; structured logs for failures; performance-conscious queries with eager loading.
- **Testing:** unit + feature + API tests for happy path and 1–2 edge cases; coverage maintained.
- **Docs:** update docs/D10 or module docs when behavior changes; add ADR for major decisions.

---

## 8. Minimal Scaffolding Prompts (for Copilot Completions)

1. **Migration & Model:**
	 - Add migration for `<table>` with columns and indexes per D09.
	 - Update model `<Model>` with fillable, casts, relations, scopes, accessors; add PHPDoc.

2. **Service Logic:**
	 - In `<Service>`, implement `<method>(InputDTO): OutputDTO|throws`; validate inputs, apply policy checks (caller enforces), wrap in DB::transaction as needed; dispatch events/jobs; return value objects.

3. **Policy & Routes:**
	 - Define Policy methods for viewAny/view/create/update/delete with role rules from README/docs; register in AuthServiceProvider; apply middleware('can:...') in routes/controllers.

4. **API Endpoint:**
	 - Add controller method using service; return Resource/JsonResponse with `{ data|meta|errors }`; validate via Form Request; rate-limit and auth via Sanctum; add tests.

5. **Import Workflow:**
	 - Implement `ImportService::process<Type>Import()`: chunked read, row validation/mapping, idempotent upserts, progress + error log, queue job; controller endpoints for upload/preview/process/show; Excel error report.

6. **Reporting:**
	 - ReportService methods to generate Excel/PDF (Laravel-Excel, DOMPDF); queue long jobs; store temporary files; schedule via scheduler; RBAC checks.

---

## 9. Acceptance Criteria Examples

- **Dashboard KPIs/charts** reflect scoped data by role; responses cached 15min; queries ≤ N+1; tests cover role scoping and caching.
- **Performance create/update** prevents duplicates (unique homestay+tahun+bulan), blocks edits >3 months old; policy denies out-of-scope.
- **Import:** preview validates headers; queued job updates status/counters; error report downloadable; audit logs written.

---

## 10. Prompting Instructions for Copilot

- **ALWAYS** follow all rules, contracts, and style in this file.
- **NEVER** bypass policies, validation, or security best practices.
- **NEVER** place business logic in controllers or views.
- **ALWAYS** write code that is modular, testable, and maintainable.
- **ALWAYS** use translation keys for all output/UI.
- **ALWAYS** enforce RBAC and log auditable actions.
- **ALWAYS** prefer Eloquent/Query Builder over raw SQL; migrations for schema.
- **ALWAYS** use PSR-12 style for PHP, Prettier/ESLint for JS.
- **ALWAYS** add/maintain PHPDoc and docstrings for functions/classes.
- **ALWAYS** write tests for new/changed code.
- **IF IN DOUBT:** Follow README.md, docs, or ask for clarification.

---

## 11. Examples

- **Migration/Model:**  
	> Add migration for `<table>` per D09. Update model `<Model>` with fillable, casts, relations, scopes, accessors. Add PHPDoc.

- **Service:**  
	> In `<Service>`, implement `<method>(InputDTO): OutputDTO|throws`; validate, apply policy, use transaction, dispatch events/jobs, return DTOs.

- **API Endpoint:**  
	> Add controller method using Service; return Resource/JsonResponse; validate via FormRequest; auth via Sanctum; rate-limit; add tests.

- **Import:**  
	> Implement `ImportService::process<Type>Import()`: chunked read, validate/map, idempotent upserts, progress + error log, queue job; controller endpoints for upload/preview/process/show; Excel error report.

---

## 12. Phase-by-Phase Development Flow

**For each phase:**
1. State the phase and intent (e.g., "Phase 2: Add migrations for all main tables").
2. Copilot should generate the complete, standards-compliant code for that phase.
3. At each phase, explain what is being done, reference the standards being followed, and provide full, robust, and testable code (no partials unless explicitly requested).
4. After each phase, pause and wait for user confirmation or next phase instruction.

**Typical phases:**
1. Project Setup
2. Database Schema & Migrations
3. Models, Factories & Seeders
4. Service Layer & Domain Logic
5. Policies, Middleware & Observers
6. Routes & Controllers
7. Form Requests & Validation
8. Frontend (Blade/Vue, i18n, accessibility)
9. Import/Export & Jobs
10. Testing & Documentation
11. Integration & CI/CD

---

## 13. References

- SYSTEM_OVERVIEW_Version4
- D01_SYSTEM_DEVELOPMENT_PLAN
- D02_BUSINESS_REQUIREMENT_SPECIFICATIONS
- D03_SYSTEM_REQUIREMENT_SPECIFICATIONS
- D04_SYSTEM_DESIGN_DOCUMENT
- D05_DATA_MIGRATION_PLAN
- D06_DATA_MIGRATION_SPECIFICATION
- D07_SYSTEM_INTEGRATION_PLAN
- D08_SYSTEM_INTEGRATION_SPECIFICATION
- D09_DATABASE_DOCUMENTATION
- D10_SOURCE_CODE_DOCUMENTATION
- TECHNICAL_DESIGN_DOCUMENTATION

**If any requirement is ambiguous or context is missing, Copilot must ask for clarification before proceeding.**
