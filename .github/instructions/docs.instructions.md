---
applyTo: '**'
---

# Documentation Instructions for Homestay Malaysia Management & Analytics System

**Project context:**
- Government-grade documentation set (D01–D10, SYSTEM_OVERVIEW_Version4, Technical Design).
- Source-of-truth lives in docs/; code-level docs in PHPDoc and README.

**Guidelines AI must follow when generating code, answering questions, or reviewing changes:**

- **Code Documentation:**
  - PHPDoc for classes/methods; describe inputs/outputs/exceptions.
  - Inline comments for non-obvious logic.

- **Project Docs Maintenance:**
  - Update D10 for architecture changes, D08 for API contracts, and D09 for schema migrations.
  - **Document accessibility (`WCAG 2.1 AA`) compliance measures and human-centered design (`ISO 9241-210`) decisions in relevant documents (D03, D04, D10).**
  - Maintain CHANGELOG with semantic versions.

- **README/Getting Started:**
  - Ensure steps are consistent with D01; include environment setup, `migrate --seed`, queue workers, and `npm run build`.

- **Diagrams & Artifacts:**
  - Keep ERD, sequence, and activity diagrams current.

**References:** D10 (source code doc), D01 (plan), D04 (design), D08 (API), D09 (DB).
