---
applyTo: '**'
---
# CI Instructions for Homestay Malaysia Management & Analytics System

Project context:
- GitHub Actions CI for Laravel 12 + Livewire build/test/lint/security.
- Align with SYSTEM_OVERVIEW_Version4, D01, D04, D10.

Guidelines AI must follow when generating code, answering questions, or reviewing changes:
- Required CI stages
  - PHP static analysis (phpstan), code style (Pint).
  - PHPUnit/Pest tests with coverage ≥80% for changed modules.
  - Node build: ESLint + Prettier check + vite build.
  - Security: composer audit (allowlist acceptable advisories) and npm audit (production).
- Services
  - Spin up MySQL 8 and Redis services in CI; run migrations; use .env.testing.
- Caching
  - Cache composer and npm; bust cache on lockfile changes.
- Artifacts
  - Upload coverage.xml, junit reports, build artifacts if needed.
- Conditions & protections
  - Run on PRs to main; enforce status checks; environment protection on deploy jobs.

Example CI expectations:
- `composer install --no-interaction --prefer-dist --no-progress`
- `php artisan key:generate && php artisan migrate --force`
- `php artisan test --coverage-clover=coverage.xml`
- `npm ci && npm run lint && npm run build`

References: D10 build/test conventions, D01 pipeline overview.
