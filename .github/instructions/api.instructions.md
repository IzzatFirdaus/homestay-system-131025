---
applyTo: '**'
---

# API Instructions for Homestay Malaysia Management & Analytics System

**Project Context:**
- RESTful API for a national digital platform, built with Laravel (PHP 8.2+), multi-role RBAC. Refer to SYSTEM_OVERVIEW_Version4, D03, D04, D07, D08, D09, and D10.

**API Design & Coding Guidelines:**

- **RESTful Standards:**
  - Use resource-oriented URLs (`/api/v1/homestays`).
  - Version all endpoints: `/api/v1/...`.
  - Use HTTP methods appropriately.

- **Authentication & Authorization:**
  - All protected routes use Laravel Sanctum. Enforce RBAC via policies/middleware.

- **Responses:**
  - Success: JSON envelope `{ "data": ..., "meta": ... }`.
  - Errors: `{ "message": "...", "errors": {...} }`. Use standard HTTP status codes.

- **Validation:**
  - Validate all input via FormRequest; return 422 for validation errors.
  - **Error messages must be clear, user-friendly, and fully localized (Bahasa Melayu & English) to support an accessible frontend that can announce these errors properly.**

- **Pagination, Filtering, Sorting:**
  - Paginate lists with `?page=` and `?per_page=`. Support filtering/sorting via query params.

- **Rate Limiting:**
  - Apply per-user and per-endpoint rate limits.

- **Security & Error Handling:**
  - Enforce HTTPS. Return meaningful, localized error messages; never leak stack traces. Log all unexpected errors.

- **Testing:**
  - All endpoints must have feature tests covering happy paths and error cases.

**References:** D07 (SIP), D08 (SIS), D04 (architecture), D10 (coding conventions).
