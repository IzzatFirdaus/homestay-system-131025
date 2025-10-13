---
applyTo: '**'
---

# Data Migration & Import Instructions for Homestay Malaysia Management & Analytics System

Project context:
- ETL for Homestay, Cooperative, Cluster, Performance data from Excel/CSV and legacy DB.
- Laravel-Excel driven workflow with preview → validate → queue → process → report.
- Align with SYSTEM_OVERVIEW_Version4, D05 (Plan), D06 (Specification), D09 (DBD), D04 (Design), D10.

Guidelines AI must follow when generating code, answering questions, or reviewing changes:
- Process design
  - Validate structure and values; map fields; preview first N rows; display localized errors.
  - Queue processing in chunks; track progress; idempotent upserts; unique keys (e.g., homestay+tahun+bulan).
- Error management
  - Generate error report (Excel/CSV) with row, column, code, message; store and link in UI.
  - Retry policy with backoff; DLQ handling; audit all runs (imports table + audit_logs).
- Data quality
  - Normalize state codes, statuses; enforce referential integrity; default reasonable values when safe; reject otherwise.
  - Post-load validation: counts match, no orphans, indexes respected.
- Security & compliance
  - File size limits; MIME validation; storage in non-public path; encryption in transit; cleanup temp files after retention.
- Performance
  - Chunk sizes tuned (e.g., 1k–5k rows); memory-safe mapping; eager loading reference lookups; batch upserts.
- Rollback & traceability
  - Maintain import session ID; reversible operations where feasible; backups per D05; complete audit trail.

References: D05/D06 migration docs, D09 schema, D10 code guidelines.