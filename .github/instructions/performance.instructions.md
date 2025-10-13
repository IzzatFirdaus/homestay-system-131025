---
applyTo: '**'
---

# Performance Instructions for Homestay Malaysia Management & Analytics System

Project context:
- Targets (typical): dashboard <2s, API P95 <500ms, imports 10k rows ≤2–5 min.
- Laravel 12, MySQL 8/MariaDB, Redis cache/queue, Vue 3 + Vite.
- Align with SYSTEM_OVERVIEW_Version4, D03 NFR, D04 performance design, D09 DB optimizations, D10.

Guidelines AI must follow when generating code, answering questions, or reviewing changes:
- Database
  - Avoid N+1 with eager loading; add appropriate indexes (per D09); use composite unique/index for reporting keys; paginate results.
- Caching
  - Cache heavy aggregates (dashboard/report) with Redis::remember; TTL ~15 minutes unless otherwise specified; include role/negeri in cache keys.
  - Invalidate caches on data changes (imports, updates).
- Queries & memory
  - Prefer select lists over select *; stream/ chunk for large exports/imports; batch upserts; avoid loading huge collections into memory.
- HTTP & assets
  - Use ETags/Last-Modified for API where applicable; compress responses; vite production build with code splitting and minification.
- Jobs & background tasks
  - Offload long-running tasks (reports, imports) to queues; tune concurrency; set timeouts and backoff; use Horizon where applicable.
- Metrics & monitoring
  - Collect latency, throughput, error rates; set alerts for SLA breaches; add lightweight health endpoints.
- Testing & budgets
  - Include performance assertions in critical tests; run periodic load tests (k6/JMeter) for peak scenarios; keep performance budgets documented.

References: D04 performance design, D09 indexing, D03 NFR targets.