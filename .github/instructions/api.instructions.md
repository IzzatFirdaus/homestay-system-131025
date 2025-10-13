---
applyTo: '**'
---
# API Instructions for Homestay Malaysia Management & Analytics System

**Project Context:**  
This system is a national digital platform for Homestay management and analytics, owned by MOTAC & Tourism Malaysia, built with Laravel (PHP 8.2+), RESTful API, and multi-role RBAC. Refer to SYSTEM_OVERVIEW_Version4, D03, D04, D07, D08, D09, and D10 for full system and API details.

**API Design & Coding Guidelines:**

- **RESTful Standards:**  
  - Use resource-oriented URLs, plural nouns (e.g., `/api/v1/homestays`).  
  - Version all endpoints: `/api/v1/...`.  
  - Use HTTP methods appropriately (GET, POST, PUT, PATCH, DELETE).
- **Authentication & Authorization:**  
  - All protected routes use Laravel Sanctum (token or SPA), except public endpoints.
  - Enforce role-based access via policies/middleware; no access without explicit authorization.
- **Responses:**  
  - Success: JSON envelope `{ "data": ..., "meta": ... }`.
  - Errors: `{ "error": { "message": "...", "code": "...", "details": [...] } }`.
  - Use standard HTTP status codes (200, 201, 400, 401, 403, 404, 422, 429, 500).
- **Validation:**  
  - Validate all input via FormRequest; return 422 for validation errors with localized (BM/EN) messages.
- **Pagination, Filtering, Sorting:**  
  - Paginate lists with `?page=` and `?per_page=`, and include pagination meta.
  - Support filtering/sorting via query params, as documented in D08.
- **Rate Limiting:**  
  - Apply per-user and per-endpoint rate limits (auth: ~300/min, public: lower); expose X-RateLimit-* headers.
- **OpenAPI Documentation:**  
  - All endpoints must be documented with OpenAPI 3.0 (see D08 and D10).
  - Keep API docs in sync with code; update on breaking or major changes.
- **Security:**  
  - Enforce HTTPS, input/output sanitization, and never expose secrets.
  - Mask sensitive data in logs and responses.
- **Error Handling:**  
  - Return meaningful error codes/messages; never leak stack traces or sensitive data.
  - Log all unexpected errors and audit API accesses.
- **Testing:**  
  - All endpoints must have feature and integration tests covering happy path and at least one failure/edge case.
- **Deprecation/Versioning:**  
  - Never break backward compatibility without version increment and deprecation notice.
  - Announce deprecations via docs and changelogs (see D08).

**References:**  
- D03_SYSTEM_REQUIREMENT_SPECIFICATIONS (functional/non-functional API requirements)  
- D04_SYSTEM_DESIGN_DOCUMENT (API architecture)  
- D07_SYSTEM_INTEGRATION_PLAN, D08_SYSTEM_INTEGRATION_SPECIFICATION (API contracts, schemas, integration policy)  
- D09_DATABASE_DOCUMENTATION (data models and relationships)  
- D10_SOURCE_CODE_DOCUMENTATION (coding conventions, API docs)

_Follow these instructions for all API design, implementation, and review within this project._