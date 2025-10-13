---
applyTo: '**'
---

# Documentation Instructions for Homestay Malaysia Management & Analytics System

Project context:
- Government-grade documentation set (D01–D10, SYSTEM_OVERVIEW_Version4, Technical Design).
- Source-of-truth lives in docs/; code-level docs in PHPDoc and README.

Guidelines AI must follow when generating code, answering questions, or reviewing changes:
- Code documentation
  - PHPDoc for classes/methods; describe inputs/outputs/exceptions; reference related services/policies.
  - Inline comments for non-obvious logic; docblocks for DTOs, resources, jobs.
- Project docs maintenance
  - Update D10 for architecture/conventions changes; D08 for API contract changes (OpenAPI); D09 for schema migrations; D05/D06 for import specs.
  - Maintain CHANGELOG with semantic versions; add ADR for major decisions.
- README/Getting Started
  - Ensure steps consistent with D01; include environment setup, migrate/seed, queue workers, npm build.
- Diagrams & artifacts
  - Keep ERD, sequence/activity diagrams current; store in docs/ and embed in related documents.
- Localization & accessibility
  - Document translation key strategy and WCAG 2.1 AA compliance notes for UI.

References: D10 (source code doc), D01 (plan), D04 (design), D08 (API), D09 (DB).