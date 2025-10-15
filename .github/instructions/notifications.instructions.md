---
applyTo: '**'
---

# Notifications Instructions for Homestay Malaysia Management & Analytics System

**Project context:**
- System notifications for import status, report generation, security alerts.
- Laravel Notifications (mail/database), queued delivery.
- Align with SYSTEM_OVERVIEW_Version4, D03 (SRS), D04 (SDD), D07/D08, D10.

**Guidelines AI must follow when generating code, answering questions, or reviewing changes:**

- **Channels & Delivery:**
  - Use Mail and Database channels by default.
  - Queue all notifications to avoid blocking requests.

- **Content & Templates:**
  - Localize all subjects and body content (ms/en).
  - Use markdown mail templates.
  - **Ensure email templates are accessible:** Use semantic HTML, provide `alt` text for images, and ensure links are descriptive. Do not rely on color alone to convey status.

- **Triggers & Audit:**
  - Trigger on key business events (e.g., `ImportCompleted`, `ReportGenerated`).
  - Log notifications sent for audit purposes.

- **Preferences & RBAC:**
  - Respect user roles and notification preferences.

**References:** D03 notification requirements, D04 component design, D07/D08 integrations.
