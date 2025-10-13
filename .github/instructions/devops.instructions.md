---
applyTo: '**'
---

# DevOps Instructions for Homestay Malaysia Management & Analytics System

Project context:
- Laravel 12 app for MOTAC; environments: dev, staging, production.
- CI/CD via GitHub Actions; MySQL 8/MariaDB, Redis, Node/Vite build.
- Align with SYSTEM_OVERVIEW_Version4, D01 (SDP), D04 (deployment), D05–D06 (data), D08 (integration), D09 (DB), D10.

Guidelines AI must follow when generating code, answering questions, or reviewing changes:
- Branching & releases
  - Protected main; feature branches via PR; require passing CI (lint, static analysis, tests, build).
  - Semantic versioning in tags/releases; changelog entries.
- Build & artifacts
  - Composer install with optimized autoloader; npm ci; vite build for production.
  - Cache composer/npm in CI; upload coverage artifacts.
- Environment configuration
  - Manage configuration via .env per environment; never commit secrets; use GitHub Environments/Secrets or Vault.
  - Timezone Asia/Kuala_Lumpur; APP_URL, cache/queue drivers, mail settings configured per env.
- Database & migrations
  - Run migrations with backup window; ensure reversible down() methods.
  - Seed only non-sensitive reference data in production with explicit approval.
- Queues & workers
  - Redis as queue; supervise/horizon for workers; configure concurrency and retry/backoff.
- Caching & sessions
  - Redis for cache/session in production; configure appropriate TTL; clear cache on deploy.
- Observability
  - Centralized logging (structured); health endpoints; metrics scraping; alerts for SLA breaches (latency, error rate).
- Backups & DR
  - Automated DB backups; retention policy; periodic restore tests; document RTO/RPO.
- Deploy strategy
  - Zero-downtime preferred (atomic symlink or blue/green); maintenance mode only when necessary; warm caches.
- Rollback
  - Keep previous release available; rollback script; ensure DB rollback strategy or safe forwards-only migrations.

References: D01 deployment plan, D04 ops design, D09 DB ops, D10 CI build steps.