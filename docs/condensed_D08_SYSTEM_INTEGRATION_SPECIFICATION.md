# Ringkasan Spesifikasi Integrasi Sistem (System Integration Specification - SIS)

**Sistem:** Sistem Pengurusan & Analitik Homestay Malaysia  
**Pemilik:** MOTAC, Tourism Malaysia  
**Tarikh:** 15 Oktober 2025  
**Versi:** 1.2

---

## 1. Objektif & Skop Integrasi

- Menjamin interoperabiliti sistem dalaman (import, dashboard, pelaporan, notifikasi) dan luaran (MOTAC HQ, negeri, Google Maps, MyGOV Identity).
- Sasaran: Konsistensi data (>95% ketepatan), keselamatan komunikasi (TLS 1.3, OAuth2/JWT), uptime >99.5%, response API <2s, throughput >1000 req/min.
- Lapisan utama: Fungsi (automasi workflow, real-time sync), Data (governance, format standard, audit trail), Keselamatan (RBAC, encryption, PDPA).

---

## 2. Senibina & Reka Bentuk

- **Logik:** Presentation (UI, API Gateway) → Service (Auth, Business Logic, Integration) → Data (DB, Redis, Queue) → External (API MOTAC/Negeri, Email/SMS, Maps).
- **Fizikal:** DMZ (Load Balancer, WAF) → Application Network (Web/App Server) → Data Network (DB, Redis) → External (API MOTAC, Negeri, Cloud).
- **Lapisan API:**  
  - Gateway: Rate limit, auth, routing (Sanctum, HTTPS).
  - Business Logic: Proses data, rules, workflow (Service Layer).
  - Data: Simpanan DB, cache, queue (Eloquent ORM, Redis).
  - Integration: Komunikasi API luar (Guzzle/Http), circuit breaker.

- **Master Data:**  
  - Homestay: MOTAC HQ (sync harian, 2-arah)
  - Akaun Pengguna: MyGOV (pull, real-time)
  - Prestasi: Negeri/Coop → MOTAC (push, harian)
  - Koperasi: Local → MOTAC (push, real-time)
  - Geo: Google Maps (pull, on-demand)

---

## 3. Spesifikasi Titik Integrasi

- **MOTAC HQ API:** REST, `/api/v1/homestay`, Bearer Token, harian, 100/min, skema JSON standard.
- **State API:** REST, `/api/v1/state/{id}/data`, OAuth2, on-demand, 50/min.
- **Cooperative API:** REST, `/api/v1/coop/{id}/homestays`, API Key, mingguan.
- **Notification Queue:** Internal, Queue, JSON, real-time, 1000/min.
- **Google Maps API:** REST, geocode, API Key, on-request, 100/hari.
- **MyGOV Identity:** SAML/OAuth2, callback, setiap login.

- **Dasar Versioning API:** URL-based (`/api/v1/`), semantic versioning, backward compatibility minimum 12 bulan.
- **Pemilikan Data:** MOTAC HQ, State, MyGOV, Koperasi, Google Maps mengikut domain.

---

## 4. Pemetaan & Validasi Data

- **Pemetaan dwihala:** Medan tempatan ↔ API MOTAC (capitalize, trim, enum, round, email format, dsb).
- **Kod Negeri:** MY-01 hingga MY-16 (rujuk mapping standard).
- **Validasi:** Format, julat, enum, keunikan, serta business rules Laravel (contoh: exists, min/max, lte, email, dsb).
- **Normalisasi:** 3NF untuk DB utama, views untuk agregat.
- **Fallback Data:** Auto gunakan sumber alternatif jika data hilang (cth: guna contact koperasi jika phone tiada).

---

## 5. Protokol & Kaedah Integrasi

- **HTTP/HTTPS:** HTTP/2, TLS 1.3, wildcard SSL, security headers penuh.
- **WebSocket:** Untuk dashboard & notifikasi real-time.
- **Queue:** Redis/DB untuk async processing (priority, batch, DLQ).
- **Batch/Pagination:** Cursor atau offset, saiz batch dikonfigurasi.
- **Serialization:** snake_case (API), camelCase (JS), PascalCase (C#).
- **Timeout/Circuit Breaker:** Konfigurasi granular setiap endpoint; automasi retry/backoff.

---

## 6. Autentikasi & Kawalan Akses

- **MFA:** LDAP/AD, SSO MyGOV, TOTP/SMS/OTP ikut kategori pengguna.
- **Token:** JWT RS256, refresh auto, rotation automatik, overlap 48 jam.
- **RBAC:** Matrix peranan (super_admin, motac_hq_admin, state_admin, dsb) — endpoint-level.
- **Akses mengikut persekitaran:** VPN+MFA untuk prod, whitelist IP, monitoring/logging penuh.
- **API Key Registry:** Setiap consumer didaftarkan, rate limit dan expiry jelas.

---

## 7. Keselamatan Data

- **At Rest:** AES-256 DB, column-level untuk PII, encryption file, backup, PDF report.
- **In Transit:** TLS 1.3 untuk semua komunikasi.
- **PDPA 2010:** Data classification, retention, anonymization, dan hak subjek data.
- **Audit Trail:** Semua operasi penting dilog, privacy masking, log retention ≥7 tahun.

---

## 8. Prestasi & SLA

- **API:** Target 95% response <2s, throughput >1000 req/min.
- **DB Query:** 99% <500ms.
- **Uptime:** ≥99.5% sebulan.
- **Ujian Beban:** K6/JMeter, load >200 pengguna serentak, error rate <1%, endurance 24 jam tiada memory leak.
- **SLA:** Critical API 99.9%, State 99.5%, Coop 99.0%, Public 98%.

---

## 9. Pemantauan & Audit

- **Health-check:** Endpoint `/health`, Prometheus/Grafana monitoring, alert automatik.
- **Logging:** Structured logging, alert escalation matrix, policy retention log ≥7 tahun.
- **Audit:** Bulanan integrasi, audit trail, penjejakan perubahan, anomaly detection.

---

## 10. Ujian & Jaminan Integrasi

- **Automasi:** PHPUnit, Postman/Newman, CI/CD integration.
- **UAT:** Semua kes authentication, data sync, error handling, performance, security mesti lulus.
- **Test Data:** Factory dataset lengkap, edge case, unicode.
- **Sign-off:** QA Lead, Integration Lead, Security, Business Owner.

### Senario UAT Kebolehcapaian (Accessibility UAT Scenarios)

- Keyboard-only Import Workflow: pengguna mesti dapat memuat naik, mengesahkan, dan menyelesaikan proses import tanpa penggunaan tetikus; semua kawalan interaktif boleh difokus dan dioperasikan.
- Dashboard Chart Accessibility: setiap carta utama mesti mempunyai ringkasan teks yang boleh dibaca oleh pembaca skrin atau jadual data alternatif yang menyampaikan nilai utama.
- Form & Error Programmatic Linking: setiap medan borang mesti mempunyai label berkaitan dan sebarang mesej ralat mesti dipautkan menggunakan `aria-describedby`/`aria-live` supaya pembaca skrin mengumumkannya secara automatik.

---

## 11. Risiko & Recovery

- Risiko utama: API gagal, format data berubah, beban puncak, mismatch data, security breach, compliance.
- **Mitigasi:** Circuit breaker, fallback, cache, retry, alert, disaster recovery, backup, versioning, manual review.
- **Recovery:** Rollback automatik jika error spike >5%; disaster recovery script, post-rollback data reconciliation.

---

## 12. Lampiran

- Contoh skema OpenAPI, sequence diagram sync, checklist readiness, template laporan ujian integrasi.
- Pematuhan: IEEE 12207, ISO 27001, PDPA, MyGOV ICT Policy.

---

## Akhir Ringkasan SIS
