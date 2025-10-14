# Dokumen Reka Bentuk Sistem (System Design Document)

## Metadata Dokumen & Kawalan Versi (Document Metadata & Version Control)

| Versi | Tarikh       | Perubahan                          | Disemak Oleh            |
|-------|--------------|------------------------------------|-------------------------|
| 1.1   | 14 Okt 2025  | Update teknologi frontend: Vue.js → Livewire | Pasukan BPM MOTAC |
| 1.0   | 11 Okt 2025  | Draf awal                          | Pasukan BPM MOTAC       |

**Sistem:** Sistem Pengurusan & Analitik Homestay Malaysia  
**Pemilik Sistem:** MOTAC, Tourism Malaysia  
**Tarikh:** 11 Oktober 2025

### Kelulusan & Pengesahan (Approvals & Sign-Off)

| Peranan                         | Nama                          | Tarikh       | Tandatangan |
|---------------------------------|-------------------------------|--------------|-------------|
| Disediakan (Prepared by)        | Pasukan Projek / Vendor       | 11 Okt 2025  |             |
| Disemak (Reviewed by)           | Arkitek Sistem (System Architect) | 11 Okt 2025  |             |
| Diluluskan (Approved by)        | Ketua Bahagian BPM MOTAC      | 11 Okt 2025  |             |

### Sejarah Revisi (Revision History)

| Versi | Tarikh      | Perubahan                                   | Penyedia |
|-------|-------------|---------------------------------------------|----------|
| 1.1   | 14 Okt 2025 | Update teknologi frontend: Vue.js → Livewire | Team     |
| 1.0   | 11 Okt 2025 | Draf awal dokumen, struktur IEEE 1016/MOTAC | Team     |

---

## 1. Gambaran Dokumen (Document Overview)

### 1.1 Tujuan (Purpose)

Dokumen ini mentakrifkan reka bentuk sistem perisian untuk Sistem Pengurusan & Analitik Homestay Malaysia, sebagai pelan terperinci yang menerjemah keperluan dalam SRS (D03) kepada seni bina, modul, data, keselamatan, integrasi, dan operasi.

### 1.2 Audiens (Audience)

- Arkitek Sistem, Jurutera Perisian, DevOps, QA/UAT, dan pihak audit MOTAC.

### 1.3 Skop (Scope of Design)

- Skop merangkumi seni bina logikal dan fizikal, reka bentuk komponen, data, keselamatan, integrasi, DevOps, prestasi, ujian, penyelenggaraan, serta kebolehjejakkan reka bentuk.

### 1.4 Hubungan dengan Dokumen Lain (Related Documents)

- D01: System Development Plan — perancangan projek dan pengurusan.  
- D03: Software Requirements Specification — keperluan fungsi/NFR rujukan.  
- D09: Database Documentation — ERD dan kamus data terperinci.

---

## 2. Gambaran Sistem & Konteks (System Overview & Context)

### 2.1 Rajah Konteks (Context Diagram)

```text
┌──────────────┐      ┌────────────────────────────┐      ┌──────────────┐
│ MOTAC Negeri │<--->│ Sistem Pengurusan Homestay │<--->│ MOTAC HQ     │
│ Koperasi     │<--->│ (Laravel, MySQL, API)      │<--->│ Tourism MY   │
│ Pengusaha    │      └────────────────────────────┘      │ API Luar     │
└──────────────┘                                         └──────────────┘
```

### 2.2 Aliran Data (DFD Level 0)

- Data Excel dimuat naik → Validasi → Simpan ke DB → Dashboard/Analitik → Eksport Laporan

### 2.3 Sempadan Sistem (System Boundary)

- Sistem berinteraksi dengan pengguna (admin, negeri, koperasi), API MOTAC, dan sistem pelaporan luar jika perlu.

---

## 3. Reka Bentuk Seni Bina Logikal (Logical Architecture Design)

### 3.1 Lapisan Seni Bina (Layered Architecture)

```text
Presentation (Blade, Livewire, AlpineJS) 
   ↓ via Controllers & Routes
Application (Controllers, Services, Policies, Form Requests, Events)
   ↓ via Repositories/ORM
Data (Eloquent Models, Migrations, DB)
   ↕
Integration (Queues, Jobs, Notifications, External APIs)
```

### 3.2 Pemetaan Komponen Laravel ke Lapisan

- Presentation: Blade templates, Livewire components, AlpineJS untuk interaktiviti ringan, asset build (Vite).  
- Application: Controllers, Service classes, Policies/Gates, FormRequest validation, Events/Listeners.  
- Data: Eloquent Models, Repositories (opsyenal), Query Builders, Migrations/Seeders.  
- Integration: Laravel-Excel import/export, Queue/Jobs (Redis), Notifications (mail), HTTP clients.

---

## 4. Reka Bentuk Seni Bina Fizikal (Physical Architecture Design)

### 4.1 Topologi Deployment (On-Prem/Cloud)

```text
Internet → WAF/Firewall → Load Balancer → App Server(s) (Nginx+PHP-FPM) → DB Server (MySQL)
                                                    ↘ Redis (Queue/Cache)
```

### 4.2 Port & Keselamatan Rangkaian

- HTTPS/TLS 1.3 (443), SSH (22) terhad IP, MySQL (3306) hanya intra-VPC, Redis (6379) private.  
- Hardening OS, fail2ban, automasi patch OS/PHP.

### 4.3 Sandaran & Pemulihan (Backup & Restore)

- Sandaran DB harian; retention 30/90 hari; ujian pemulihan berkala; snapshot sebelum deployment utama.

---

## 5. Reka Bentuk Keselamatan (Security Design)

### 5.1 Autentikasi (Authentication)

- Laravel auth (session-based); opsyen token/OAuth2 untuk API; MFA (opsyenal).  
- Tamat sesi automatik (30 min tidak aktif); rate limiting untuk login.

### 5.2 Autorisasi (Authorization)

- Policies & Gates untuk RBAC (admin/penganalisis/pemerhati/negeri); middleware untuk semakan setiap permintaan.

### 5.3 Penyulitan & Rahsia

- HTTPS (TLS 1.3), bcrypt untuk kata laluan, AES-256 untuk data sensitif; rahsia dalam .env/secret manager.

### 5.4 Audit & Insiden

- Audit log bagi perubahan data & akses; pemantauan ralat; SOP tindak balas insiden (triage → mitigasi → RCA → penambahbaikan).

---

## 6. Reka Bentuk Komponen (Component Design)

### 6.1 Komponen Utama & Tanggungjawab

- ImportDataService — import, validasi, pemetaan Excel ke DB.  
- DashboardAnalyticsModule — metrik, carta, analitik dashboard.  
- ReportGenerator — penjanaan, eksport, penjadualan laporan.  
- NotificationManager — notifikasi e-mel/sistem untuk import/laporan/amarans.  
- UserAccessManager — pengguna, peranan, audit trail.

### 6.2 Interaksi Komponen (Pseudocode)

```text
Admin upload Excel → ImportDataService → Validasi → Simpan DB → DashboardAnalyticsModule update → NotificationManager (jika gagal/berjaya)
```

---

## 7. Reka Bentuk Data (Data Design Summary)

### 7.1 Rujukan ERD & Data Dictionary

- Rujuk D09_DATABASE_DOCUMENTATION.md untuk model entiti, hubungan, dan jenis data.

### 7.2 Strategi Indeks & Kunci Asing

- Indeks: nama, negeri, id koperasi, bulan, tahun; FK memastikan integriti (homestays, performances, cooperatives, users).

### 7.3 Konvensyen Penamaan & Sejarah Data

- snake_case, English names; soft deletes; audit logs; retention untuk log import ≥12 bulan.

### 7.4 Jadual Utama

- homestays, clusters, cooperatives, performances, capacities, users, imports, audit_logs.

---

## 8. Reka Bentuk Logik Aplikasi (Application Logic Design)

### 8.1 Import Data (UML Sequence — teks)

1. Admin → ImportDataService → Validasi → Simpan DB → Emit Event → NotificationManager.  
2. Kegagalan: retry queue (≤3 kali, backoff), baris gagal dilog, baris berjaya kekal.

### 8.2 Kemas Kini Dashboard (Activity)

- Cron/queue memproses agregat; cache dipanaskan; invalidasi cache bila import baru selesai.

### 8.3 Penjanaan Laporan (Sequence)

- Pengguna pilih laporan → ReportGenerator → Query DB → Jana fail → Notifikasi/eksport.

---

## 9. Antara Muka Luaran & Integrasi (External Interfaces & Integration)

### 9.1 API & Endpoints

```http
POST /api/import-homestay  # multipart file
GET  /api/dashboard-metrics?negeri=Johor
```

- Autentikasi: Bearer token/OAuth2; JSON error schema { error, message, details }.

### 9.2 Polisi Kadar & Logging (Rate Limit & Logging)

- Rate limiting per token/IP; log permintaan penting; korelasi ID untuk jejak.

### 9.3 Senario Integrasi

- Batch upload berkala (fail Excel), pilihan live sync masa depan dengan webhook/API dalaman MOTAC.

---

## 10. DevOps, Logging & Pemantauan (DevOps, Logging & Monitoring)

### 10.1 CI/CD & Cabang (Branching)

- Git flow: main, develop, feature/*; PR dengan lint/test; GitHub Actions untuk build, test, deploy.

### 10.2 Rollback & Rilis

- Deployment berlabel; DB backup/snapshot; rollback melalui restore/tag apabila gagal.

### 10.3 Logging, Monitoring & Alerting

- Laravel Monolog → fail/Syslog/Sentry; metrik uptime/latensi; alert e-mel/Slack; retention log sesuai dasar (≥90 hari ringkas, ≥12 bulan audit terpilih).

---

## 11. Reka Bentuk Prestasi & Kebolehskalaan (Performance & Scalability)

### 11.1 Ambang Prestasi (Thresholds)

- TPS sasaran: 50 req/s biasa; masa respons API < 500ms; dashboard < 2s (dataset tipikal); import 10k baris ≤ 2 minit.

### 11.2 Pengoptimuman Pertanyaan & Cache

- Indeks, eager loading, cache per widget; invalidasi pintar; precompute agregat.

### 11.3 Skalabiliti

- Skala mendatar app server di belakang load balancer; queue concurrency ditingkatkan; DB replikasi baca (opsyenal).

---

## 12. Reka Bentuk Ujian, Penyelenggaraan & Sokongan (Testing, Maintenance & Support)

### 12.1 Reka Bentuk Ujian (Testing Design)

- Liputan: unit, integration, e2e (Laravel Dusk), API (Postman).  
- Persekitaran: dev → staging → production; seed data untuk dashboard/import.  
- Automasi: PHPUnit, k6/JMeter untuk prestasi.

### 12.2 Penyelenggaraan & DR

- Jadual penyelenggaraan 01:00–03:00; sandaran harian; DR: RPO ≤ 24 jam, RTO ≤ 2 jam; cleanup log terjadual.

### 12.3 Matriks Jejak Reka Bentuk (Design Traceability Matrix)

| SRS ID    | Komponen SDD              | Penerangan                         | Status       |
|-----------|---------------------------|------------------------------------|--------------|
| SRS-FN-01 | ImportDataService         | Import Excel & validasi            | Implemented  |
| SRS-FN-02 | Validasi (Service/Rules)  | Validasi data automatik            | Implemented  |
| SRS-FN-03 | DashboardAnalyticsModule  | Dashboard visualisasi              | Implemented  |
| SRS-FN-05 | ReportGenerator           | Laporan automatik                  | Planned      |
| SRS-FN-06 | Export (Excel/PDF)        | Eksport CSV/XLSX/PDF               | Planned      |
| SRS-FN-07 | Policies & Middleware     | RBAC                               | Implemented  |

---

## Lampiran (Appendices)

### A.1 Glosari Istilah (Glossary)

- SRS: Software Requirement Specification  
- SDD: System Design Document  
- API: Application Programming Interface  
- CI/CD: Continuous Integration/Continuous Deployment

### A.2 Rujukan Dokumen (Document References)

| Kod  | Nama Dokumen                                      | Versi | Pautan                |
|------|---------------------------------------------------|-------|-----------------------|
| D01  | System Development Plan (SDP)                     | 1.0   | [D01_SYSTEM_DEVELOPMENT_PLAN.md](D01_SYSTEM_DEVELOPMENT_PLAN.md) |
| D02  | Business Requirements Specification (BRS)         | 1.0   | [D02_BUSINESS_REQUIREMENT_SPECIFICATIONS.md](D02_BUSINESS_REQUIREMENT_SPECIFICATIONS.md) |
| D03  | Software Requirements Specification (SRS)         | 1.0   | [D03_SYSTEM_REQUIREMENT_SPECIFICATIONS.md](D03_SYSTEM_REQUIREMENT_SPECIFICATIONS.md) |
| D04  | System Design Document (SDD)                      | 1.0   | [D04_SYSTEM_DESIGN_DOCUMENT.md](D04_SYSTEM_DESIGN_DOCUMENT.md) |
| D05  | Data Migration Plan                               | 1.0   | [D05_DATA_MIGRATION_PLAN.md](D05_DATA_MIGRATION_PLAN.md) |
| D06  | Data Migration Specification                      | 1.0   | [D06_DATA_MIGRATION_SPECIFICATION.md](D06_DATA_MIGRATION_SPECIFICATION.md) |
| D07  | System Integration Plan                           | 1.0   | [D07_SYSTEM_INTEGRATION_PLAN.md](D07_SYSTEM_INTEGRATION_PLAN.md) |
| D09  | Database Documentation (ERD/Data Dictionary)      | 1.0   | [D09_DATABASE_DOCUMENTATION.md](D09_DATABASE_DOCUMENTATION.md) |
| D10  | Source Code Documentation                         | 1.0   | [D10_SOURCE_CODE_DOCUMENTATION.md](D10_SOURCE_CODE_DOCUMENTATION.md) |

### A.3 Rujukan Tambahan (Additional References)

- IEEE 1016-2009, MOTAC SDD Template, Laravel Docs, Bootstrap Docs

---

## Akhir Dokumen
