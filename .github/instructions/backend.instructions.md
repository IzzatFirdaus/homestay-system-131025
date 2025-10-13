---
applyTo: '**'
---

# Backend Instructions for Homestay Malaysia Management & Analytics System

**Project Context:**  
This is a Laravel-based national Homestay analytics platform (PHP 8.2+, MySQL/MariaDB, Redis, API-driven, multi-role RBAC) for MOTAC & Tourism Malaysia. Backend architecture, modules, and business logic must comply with SYSTEM_OVERVIEW_Version4, D01, D03, D04, D09, D10, and TECHNICAL_DESIGN_DOCUMENTATION.

**Backend Coding Guidelines:**

- **MVC + Service Layer:**  
  - Controllers remain thin (handle requests, responses, and authorization only).
  - Business/domain logic, validation, and transactions are implemented in app/Services/*Service.php.
  - Use Data Transfer Objects (DTOs) for input/output as needed.
- **Authorization:**  
  - Always enforce RBAC via Laravel Policies and spatie/laravel-permission.
  - Register all Policies in AuthServiceProvider; never bypass access checks.
  - Middleware is required for sensitive routes (e.g., can:view, can:import).
- **Validation:**  
  - Use FormRequest classes for all input validation; never validate directly in controllers.
  - Custom validation rules and localization must be supported (Bahasa Malaysia and English).
- **Jobs, Events, and Observers:**  
  - Use Laravel Queues for long-running, import/export, and notification tasks (Redis recommended).
  - Implement Observers for all CRUD and import actions to write to audit_logs.
  - Dispatch events for business logic triggers (e.g., ImportCompleted, ReportGenerated).
- **Error Handling:**  
  - Use try/catch and custom exceptions in services; never let unhandled exceptions bubble to users.
  - All errors must be logged (structured) and return JSON error schema for API endpoints.
- **Caching & Performance:**  
  - Use Redis for caching dashboard aggregates, frequent queries, and session/jobs.
  - Apply Eloquent eager loading and query scopes for all queries (avoid N+1).
  - Index and optimize queries as per D09.
- **Code Structure:**  
  - Namespace all service, form request, policy, observer, and job classes.
  - Use PSR-4 autoloading; enforce PSR-12 code style.
  - All classes and methods must include PHPDoc and inline comments for complex logic.
- **Security:**  
  - Never log sensitive information (passwords, tokens, PII).
  - Use Laravel’s built-in encryption for secrets.
  - Apply CSRF, XSS, and SQL injection protections.
- **Testing:**  
  - Write unit and feature tests for all services, controllers, and policies.
  - Use factories for test data.
- **Documentation:**  
  - Update D10 and code-level docs for all changes to backend logic.

**References:**  
- D01_SYSTEM_DEVELOPMENT_PLAN (project structure)
- D03_SYSTEM_REQUIREMENT_SPECIFICATIONS (business rules, RBAC)
- D04_SYSTEM_DESIGN_DOCUMENT (architecture, layers, error handling)
- D09_DATABASE_DOCUMENTATION (model, relationships)
- D10_SOURCE_CODE_DOCUMENTATION (coding conventions, PHPDoc, examples)

_Comply with these rules for all backend, service, and business logic code._