# Ringkasan Pelan Integrasi Sistem (System Integration Plan - SIP)

**Sistem:** Sistem Pengurusan & Analitik Homestay Malaysia  
**Pemilik:** MOTAC, Tourism Malaysia  
**Tarikh:** 11 Oktober 2025  
**Versi:** 1.0

---

## 1. Tujuan & Skop

- Memastikan modul dalaman sistem Homestay Malaysia (import, dashboard, notifikasi, dsb.) dan sistem luaran (API MOTAC, negeri, Google Maps) berfungsi secara konsisten dan selamat.
- Mendokumenkan pendekatan, prosedur teknikal, dan kriteria kejayaan integrasi sistem.

---

## 2. Strategi Integrasi

- **Pendekatan:** Integrasi incremental (modul → subsistem → sistem penuh) dengan CI/CD automatik, rollback sekiranya error rate >1%.
- **Pengurusan Versi:** Semua endpoint API mesti versi (cth: /api/v1/), dokumentasi perubahan dan backward compatibility.
- **Ujian:** Semua integrasi diuji di dev, staging, production secara berperingkat.
- **Kejayaan:** Kadar kejayaan integrasi >99.5%, latency API utama <500ms.

---

## 3. Senibina & Komponen Integrasi

- **Aliran Data:**  
  - Import (Excel) → Queue → Transformasi → DB → Dashboard  
  - Integrasi API luar melalui API Gateway dan Integration Service
  - Semua proses async (import, notifikasi) menggunakan queue Redis/Beanstalk + Laravel Worker
- **Komponen Utama:**  
  - API Gateway, Integration Service (Laravel HTTP Client), Queue, Worker, Notifikasi, Logging

---

## 4. Titik & Kontrak Integrasi

| Sistem/Modul        | Jenis     | Protokol | Autentikasi   | Frekuensi   |
|---------------------|-----------|----------|---------------|-------------|
| MOTAC API           | External  | REST     | Bearer Token  | Harian      |
| Negeri API          | External  | REST     | OAuth2        | On-demand   |
| Import Data Module  | Internal  | Queue    | System Auth   | Real-time   |
| Notifikasi          | Internal  | Queue    | System Auth   | Real-time   |
| Google Maps         | External  | REST     | API Key       | On-request  |

- Semua endpoint utama didokumenkan dalam OpenAPI/Postman.

---

## 5. Pengurusan Konfigurasi & Keselamatan

- **Konfigurasi:** Semua token, endpoint, rahsia disimpan dalam Secret Manager, bukan repo kod.
- **.env:** Semua environment variable didokumenkan dalam .env.example.
- **Akses:** Endpoint dalaman dihadkan kepada sistem berdaftar, firewall/whitelist untuk API luaran.
- **Audit Log:** Semua transaksi dan perubahan konfigurasi direkod.

---

## 6. Prosedur Ujian Integrasi

- **Ujian Automatik:** PHPUnit, Postman/Newman untuk API, ujian end-to-end di staging.
- **Kriteria Penerimaan:** Pass rate ≥99.5%, semua laluan kritikal lulus di staging, latency <500ms.
- **Smoke Test:** Selepas deploy, health-check endpoint dan queue/worker mesti aktif.

---

## 7. Pengurusan Ralat & Pemulihan

- **Retry:** 3 kali dengan backoff exponential untuk error sementara (timeout, network).
- **Fallback:** Cache digunakan semasa API luar down; notifikasi kegagalan automatik.
- **Eskalasi:** SLA ralat kritikal (P1) respon <15 minit.
- **Re-sync:** Proses re-sync data boleh dijalankan secara manual dari admin interface.

---

## 8. Pemantauan & Audit

- **Monitoring:** Telescope, Sentry, Grafana untuk latency, error rates.
- **Log Retention:** 90 hari untuk log operasi, 12 bulan untuk log audit.
- **Alert:** Threshold untuk error >1% atau latency >1s pada endpoint kritikal.

---

## 9. Jadual & Milestone Integrasi

| Fasa              | Aktiviti                          | Tempoh    |
|-------------------|-----------------------------------|-----------|
| Persediaan        | Setup env & dokumentasi           | 1 minggu  |
| Integrasi Dalaman | Sprint per modul                  | 2 minggu  |
| API Luaran & Ujian| Integrasi & testing API           | 1 minggu  |
| Staging & UAT     | Ujian staging & UAT               | 1 minggu  |
| Go-live           | Deploy & pemantauan awal          | 1 minggu  |

---

## 10. Risiko & Mitigasi

| Risiko                | Impak  | Mitigasi                      |
|-----------------------|--------|-------------------------------|
| Versi API tidak seragam| Tinggi | Versioning, adapter layer     |
| Beban tinggi endpoint | Sederhana | Throttling, cache, autoscale |
| Queue/worker gagal    | Tinggi | Redundansi, monitoring, retry |
| Token bocor           | Tinggi | Token rotation, revoke cepat  |
| Delay sambungan API   | Sederhana | Fallback, alert, retry       |

---

## 11. Koordinasi & Komunikasi

- Standup harian, laporan mingguan, notifikasi isu kritikal via JIRA/WhatsApp.
- Hierarki eskalasi: Integration Lead → Project Manager → QA Lead → DevOps.

---

## 12. Lampiran

- Contoh konfigurasi .env, OpenAPI, Postman collection, template laporan integrasi, diagram aliran data.
- Checklist readiness integrasi dan senarai endpoint utama.

---

## Akhir Ringkasan SIP
