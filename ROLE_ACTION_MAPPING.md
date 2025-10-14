# Role/Action Mapping — Homestay Malaysia Management & Analytics System

This document summarizes the mapping of user roles to allowed actions for each main model/entity, as implemented in Phase 5 (Policies, Middleware & Observers).

| Role                | Homestay         | Performance      | Import           | User             | Cluster          | Cooperative      |
|---------------------|------------------|------------------|------------------|------------------|------------------|-----------------|
| Super Admin         | Full CRUD        | Full CRUD        | Full CRUD        | Full CRUD        | Full CRUD        | Full CRUD       |
| Admin               | Full CRUD        | Full CRUD        | Full CRUD        | Full CRUD        | Full CRUD        | Full CRUD       |
| Penganalisis        | Read, Create, Update | Read, Export, Report | View, Import     | View (self)       | Create, View     | View            |
| Pemerhati           | Read-only        | Read-only        | View only        | View (self)      | View             | View            |
| Negeri Admin        | CRUD (assigned negeri) | CRUD (assigned negeri) | Import (assigned negeri) | View (assigned negeri) | CRUD (assigned negeri) | CRUD (assigned negeri) |
| Koperasi Admin      | CRUD (assigned koperasi) | CRUD (assigned koperasi) | Import (assigned koperasi) | View (assigned koperasi) | -                | CRUD (assigned koperasi) |

**Notes:**
- All actions are further restricted by negeri/koperasi assignment where applicable.
- Policies enforce these rules; middleware and observers provide additional enforcement and audit logging.
- See D03, D04, and D09 for detailed business rules and exceptions.

_Last updated: 2025-10-14_
