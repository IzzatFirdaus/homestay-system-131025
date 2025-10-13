---
applyTo: '**'
---

# Database Instructions for Homestay Malaysia Management & Analytics System

**Project Context:**  
This system is a national Homestay management and analytics platform for MOTAC & Tourism Malaysia, using MySQL 8+/MariaDB with Laravel ORM, strict normalization, and audit-ready schema. Refer to SYSTEM_OVERVIEW_Version4, D01, D03, D04, D05, D06, D09, and D10 for data and architecture standards.

**Database Design & Coding Guidelines:**

- **Schema Design:**  
  - Normalize to at least 3NF; avoid redundancy.
  - Use plural, lowercase, snake_case table names (e.g., `homestays`, `audit_logs`).
  - Field names use snake_case, descriptive, with foreign keys as `{table}_id`.
  - All tables use `BIGINT AUTO_INCREMENT` for PKs unless UUIDs are justified.
  - Soft deletes via `deleted_at` (nullable `timestamp`); avoid physical deletes unless required.
- **Data Types & Constraints:**  
  - Use appropriate types (see D09): `VARCHAR`, `TEXT`, `ENUM`, `DECIMAL`, `TIMESTAMP`.
  - Implement NOT NULL, CHECK, and DEFAULT constraints for data integrity.
  - Foreign keys: always enforce referential integrity; use `ON DELETE CASCADE` or `SET NULL` as per D09.
  - Index fields used in queries, filtering, and joins (see D09 index matrix).
  - Unique constraints for business keys (e.g., unique user emails, unique monthly performance by homestay+bulan+tahun).
  - Use ENUM for status and categorical fields (e.g., `status`, `model_pengurusan`).
- **Migrations:**  
  - All schema changes must be in versioned Laravel migration files.
  - Name migrations descriptively: `YYYY_MM_DD_HHMMSS_create_homestays_table.php`.
  - Reversible: implement `down()` for every migration.
- **Seeders & Factories:**  
  - Use factories for test data generation.
  - Use seeders for essential reference data (e.g., negeri list, roles).
- **Performance & Indexing:**  
  - Add BTREE indexes for foreign keys, common filters, and aggregation fields.
  - Use composite indexes for reporting queries (e.g., `idx_performances_homestay_period`).
  - Analyze query plans for slow queries and optimize accordingly.
  - Use Redis for caching dashboard/report queries as per D09.
- **Security & Compliance:**  
  - Sensitive data is encrypted at rest where required.
  - All access controlled via RBAC (see D09 for role hierarchy).
  - Audit all CUD operations in `audit_logs` table.
  - Data retention, anonymization, and archival policies must follow D09 and PDPA.
- **Backup & Recovery:**  
  - Full daily backups; incremental every 4 hours; off-site replication.
  - Test restore procedures quarterly.
- **Testing & Maintenance:**  
  - Write SQL scripts for referential integrity, duplicate detection, and business rule validation.
  - Use Laravel factories and PHPUnit for model/repository tests.
- **Documentation:**  
  - Keep ERD, Data Dictionary, and migration changelogs up-to-date (see D09, D10).

**References:**  
- D09_DATABASE_DOCUMENTATION (schema, constraints, ERD, naming)
- D03_SYSTEM_REQUIREMENT_SPECIFICATIONS (data requirements)
- D05_DATA_MIGRATION_PLAN, D06_DATA_MIGRATION_SPECIFICATION (migration, mapping)
- D10_SOURCE_CODE_DOCUMENTATION (migration/testing conventions)

_Follow these standards for all schema design, migrations, queries, and data operations._