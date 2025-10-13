---
applyTo: '**'
---

# Localization (i18n) Instructions for Homestay Malaysia Management & Analytics System

Project context:
- Malay-first (ms) with English (en) fallback; resources/lang/ms and resources/lang/en.
- Laravel 12 Blade/Vue 3 with i18n-ready UI.
- Align with SYSTEM_OVERVIEW_Version4, D03 (SRS), D04 (SDD), D10.

Guidelines AI must follow when generating code, answering questions, or reviewing changes:
- Keys & structure
  - Use dot-notated keys grouped by domain (e.g., homestay.form.name, dashboard.kpi.total_visitors).
  - Never hardcode user-facing strings; always use trans() or __() in PHP and localization helpers in Vue.
- Defaults & fallback
  - Provide ms translations; ensure en fallback exists; avoid partial keys.
- Validation & messages
  - Localize validation messages and custom attributes; ensure consistent terminology with MOTAC lexicon.
- Dates, numbers, currency
  - Format using locale-aware helpers; currency in MYR (RM) with 2 decimals; timezone Asia/Kuala_Lumpur.
- Content updates
  - When adding UI, update both ms and en files; keep alphabetical order and comments for context if needed.
- Testing
  - Feature tests should assert localized messages present (ms by default); ensure fallback logic is correct.

References: D03 UI requirements, D10 coding conventions.