---
applyTo: '**'
---

# CI Instructions for Homestay Malaysia Management & Analytics System

**Project context:**
- GitHub Actions CI for Laravel 12 + Livewire build/test/lint/security.
- Align with SYSTEM_OVERVIEW_Version4, D01, D04, D10.

**Guidelines AI must follow when generating code, answering questions, or reviewing changes:**

- **Required CI Stages:**
  - PHP static analysis (`phpstan`), code style (`pint`).
  - PHPUnit/Pest tests with coverage ≥80%.
  - Node build: ESLint + Prettier check + `vite build`.
  - Security: `composer audit` and `npm audit --production`.
  - **Frontend Accessibility Checks:** Run automated `axe-core` scans on critical user flows. The build must fail on critical violations.

- **Services:**
  - Spin up MySQL 8 and Redis services in CI; run migrations; use `.env.testing`.

- **Caching:**
  - Cache composer and npm dependencies.

- **Artifacts:**
  - Upload `coverage.xml`, test reports, and build artifacts.

- **Conditions & Protections:**
  - Run on all Pull Requests targeting `main` or `develop`; enforce status checks via branch protection rules.

**References:** D10 build/test conventions, D01 pipeline overview.
