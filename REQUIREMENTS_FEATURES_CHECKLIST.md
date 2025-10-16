
# Homestay-System — Senarai Keperluan & Semakan Ciri (Requirements List & Features Checklist)

_Referensi: SRS, BRS, SDD, Technical Design, Source Code Docs, Integration & Migration Specification, DB Docs_

---

## 📝 Senarai Keperluan (Top-Down Requirements List)

### 1. Keperluan Perniagaan & Sistem (Business & System Requirements)

#### 1.1 Objektif Eksekutif (Executive Objectives)

- Pengurusan berpusat >1,200 Homestay berdaftar & 300+ koperasi
- Automasi pelaporan bulanan & validasi untuk semua negeri/koperasi
- Dashboard analitik pelbagai peringkat (kebangsaan, negeri, koperasi, operator)
- Integrasi dengan ekosistem data pelancongan negara (MOTAC, Tourism Malaysia)
- 100% pelaporan digital menjelang 2026; kitaran pelaporan <3 hari; ketepatan data >95%

#### 1.2 Keperluan Fungsian (Functional Requirements)

- CRUD Homestay, koperasi, kluster, pengguna, prestasi (web & API)
- Import data Excel/CSV (pukal, batch, incremental, dengan preview & validation)
- Validasi data automatik & terperinci (struktur, rujukan, business rules)
- Dashboard pelbagai peringkat: kebangsaan, negeri, koperasi, individu
- Visualisasi data interaktif (carta, peta, jadual, drill-down)
- Penjanaan laporan berjadual & manual (Excel, PDF, CSV)
- Eksport data mentah & terproses (Excel, PDF, CSV, imej)
- Kawalan akses berasaskan peranan (Admin, Analyst, Viewer, State, Operator)
- Audit trail untuk semua aktiviti & perubahan data (dengan metadata)
- Notifikasi sistem (ralat data, status laporan, tarikh akhir)
- Integrasi API (RESTful, versioned, OAuth2/Bearer token)
- Queue untuk proses latar (import, penjanaan laporan, notifikasi)
- Migrasi data & ETL (legacy import, rollback, dry run, audit)

#### 1.3 Keperluan Bukan Fungsian (Non-Functional Requirements)

- Prestasi: Import ≥10,000 rekod <5 minit; dashboard <2s
- Skalabiliti: Sokong pertumbuhan data 20%/tahun, cloud-ready, horizontal scaling
- Ketersediaan: Uptime ≥99.5% HQ, ≥99% negeri/koperasi; RTO <4 jam
- Sekuriti: Encryption (AES-256, TLS 1.3, bcrypt), MFA, kawalan peranan
- Audit & Pematuhan: PDPA, MyGOV ICT, audit log retention ≥7 tahun
- Kebolehgunaan: Responsif, dwibahasa (BM/EN), WCAG 2.1 AA accessibility
- Integrasi: REST API, SSO (LDAP/AD), export API, webhooks
- Penyelenggaraan: Pemantauan automatik, backup, kemaskini berkala

#### 1.4 Kriteria Penerimaan (Acceptance Criteria)

- Semua negeri memuat naik/validasi data bulanan dalam 3 hari selepas tarikh akhir
- Dashboard/laporan ≥95% tepat berbanding sumber
- Semua pengguna akses fungsi mengikut peranan tanpa isu
- Semua laporan utama boleh dieksport ke Excel/PDF tanpa ralat
- Kebolehcapaian: Lulus imbasan axe-core (tiada critical/serious violation); navigasi papan kekunci; walkthrough screen reader
- Migrasi data: tiada kehilangan data, audit trail penuh, rollback diuji

---

## ✅ Semakan Ciri (Features Checklist)

### Pengurusan Data (Data Management)

- [ ] CRUD Homestay melalui web & API
- [ ] CRUD koperasi, kluster, pengguna, prestasi
- [ ] Model Eloquent dengan hubungan didokumen
- [ ] Modul import data Excel/CSV (Maatwebsite/Laravel-Excel)
- [ ] Validasi data (medan, format, rujukan, business rules)
- [ ] Logging ralat & status import terperinci
- [ ] Migrasi/ETL data dengan rollback, dry run, audit

### Analitik & Dashboard

- [ ] Dashboard kebangsaan, negeri, koperasi, individu
- [ ] Carta interaktif (bar, pie, line, map, table)
- [ ] Penapisan, carian, drill-down
- [ ] KPI summary (bil pelawat, hasil, occupancy, kapasiti)
- [ ] Visualisasi mesra A11y (tabular alt, ARIA, text summary)

### Pelaporan (Reporting)

- [ ] Penjanaan laporan berjadual & manual
- [ ] Eksport ke Excel, PDF, CSV, PNG/JPEG (dengan watermark/audit metadata)
- [ ] Eksport pukal untuk pelbagai dataset/laporan

### Pengurusan Pengguna & Sekuriti (User Management & Security)

- [ ] Kawalan akses peranan (Spatie/laravel-permission)
- [ ] Pengesahan selamat (Sanctum/session)
- [ ] Multi-factor authentication untuk pengguna kritikal
- [ ] Polisi kata laluan
- [ ] Pengurusan sesi (timeout, secure cookies)
- [ ] Audit trail semua tindakan (user, IP, before/after)
- [ ] Enkripsi data at-rest & in-transit

### API & Integrasi

- [ ] RESTful API endpoint (/api/v1/) dengan OpenAPI spec
- [ ] API versioned & documented untuk semua entiti utama
- [ ] OAuth2/Bearer token untuk integrasi luaran
- [ ] Webhook untuk notifikasi/integrasi
- [ ] Modul integrasi luaran (MOTAC API, Tourism Malaysia API)

### Notifikasi & Automasi

- [ ] Notifikasi emel, in-app, SMS (status, alert)
- [ ] Pilihan notifikasi boleh dikonfigurasi per pengguna
- [ ] Penjadualan laporan automatik & peringatan
- [ ] Queue untuk proses latar (import, laporan, notifikasi)

### Kebolehcapaian & Lokalizasi (Accessibility & Localization)

- [ ] UI responsif (desktop, tablet, mobile)
- [ ] Antara muka dwibahasa (BM/EN), penukaran bahasa mudah
- [ ] Pematuhan WCAG 2.1 AA (HTML semantik, keyboard nav, ARIA, kontras)
- [ ] Pautan programatik error/help text (aria-describedby, error summary)
- [ ] Warna bukan satu-satunya indikator; ikon/teks sokong

### Kualiti Data & Tadbir Urus (Data Quality & Governance)

- [ ] Validasi automatik (duplikasi, kosong, format, cross-ref)
- [ ] Pengendalian ralat, logging, panduan pembetulan
- [ ] Audit log dengan metadata (user, masa, tindakan, perubahan)
- [ ] Mekanisme backup & restore, DR diuji

### Ujian & CI/CD

- [ ] Ujian unit, feature, integration, browser (Dusk)
- [ ] Ujian accessibility automatik (axe-core dalam CI)
- [ ] ≥85% test coverage untuk aliran kritikal
- [ ] Analisis statik (PHPStan, Pint), code style gate
- [ ] CI/CD pipeline (GitHub Actions): build, test, audit, deploy

### Prestasi & Pengoptimuman (Performance & Optimization)

- [ ] Caching (Redis untuk agregat, dashboard)
- [ ] Indexing pada semua medan utama DB
- [ ] Paginasi, query optimum, elak N+1
- [ ] Queue untuk operasi berat/batch
- [ ] Monitoring (Telescope, Horizon, Grafana/Prometheus)

### Dokumentasi

- [ ] Docblock untuk semua kelas, method, logik kompleks
- [ ] README dengan langkah pemasangan, penggunaan, dev notes
- [ ] Dokumentasi API (OpenAPI/Postman)
- [ ] .env.example dengan komen config
- [ ] Panduan contributor, checklist code review, PR template

---

## Rujukan (References)

- [D03 System Requirements Specification (SRS)]  
- [condensed_D02 Business Requirements Specification (BRS)]  
- [D04 System Design Document (SDD)]  
- [Technical Design Documentation]  
- [D10 Source Code Documentation]  
- [D05 Data Migration Plan & D06 Data Migration Specification]  
- [D07 System Integration Plan & D08 System Integration Specification]  
- [D09 Database Documentation]  

---

**Nota:**  
Semua keperluan & ciri mesti mematuhi konvensyen Laravel/MOTAC, sekuriti, kebolehcapaian, dan dokumentasi seperti dinyatakan di atas.
