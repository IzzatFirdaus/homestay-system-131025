---
applyTo: '**'
---

# Notifications Instructions for Homestay Malaysia Management & Analytics System

Project context:
- System notifications for import status, report generation, security alerts, and operational events.
- Laravel Notifications (mail/database), queued delivery.
- Align with SYSTEM_OVERVIEW_Version4, D03 (SRS), D04 (SDD), D07/D08 (integration), D10.

Guidelines AI must follow when generating code, answering questions, or reviewing changes:
- Channels & delivery
  - Use Mail and Database channels by default; SMS/push only if approved and configured.
  - Queue all notifications; configure retry/backoff; avoid blocking requests.
- Content & templates
  - Localize subjects/body (ms/en); use markdown mail templates; avoid PII; include actionable links and concise summaries.
- Triggers & audit
  - Trigger on ImportCompleted/Failed, ReportGenerated, SecurityIncident, ThresholdBreach.
  - Log notifications sent (type, recipient, status) for audit; handle bounces if applicable.
- Preferences & RBAC
  - Respect user roles and subscription preferences; no leakage across negeri/koperasi boundaries.
- Rate limiting & idempotence
  - De-duplicate repeated alerts within defined windows; apply rate limits to high-frequency alerts.

References: D03 notification requirements, D04 component design, D07/D08 integrations for external channels.