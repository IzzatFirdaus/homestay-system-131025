# Gambaran Keseluruhan Sistem (System Overview) — Versi 5.0

**Sistem:** Sistem Pengurusan & Analitik Homestay Malaysia  
**Pemilik:** MOTAC, Tourism Malaysia  
**Tarikh:** 14 Oktober 2025  
**Versi:** 5.0  
**Perubahan:** Penambahbaikan integrasi, dokumentasi, dan kawalan kualiti

---

## 0. Ringkasan Eksekutif

Sistem Pengurusan & Analitik Homestay Malaysia ialah platform digital bersepadu yang memodenkan pengurusan, pemantauan, dan analitik industri Homestay di seluruh Malaysia. Sistem ini menyokong pemusatan data, automasi pelaporan, analitik pelbagai peringkat, serta integrasi dengan sistem luaran untuk membantu MOTAC dan Tourism Malaysia membuat keputusan strategik berdasarkan data yang tepat, terkini, dan boleh diaudit.

---

## 1. Sasaran dan Objektif

**Sasaran Utama:**

- Pemusatan, standardisasi, dan pengesahan data Homestay nasional
- Automasi pelaporan prestasi negeri, koperasi, dan individu
- Menyokong dashboard dan analitik pelbagai peringkat
- Meningkatkan integriti, keselamatan, dan auditabiliti data

**Objektif Kuantitatif:**

- 100% data negeri/koperasi dimuat naik melalui sistem menjelang 2026
- Laporan bulanan dijana dalam <3 hari bekerja
- Dashboard tersedia di semua peringkat (nasional, negeri, koperasi, individu)

**Rujukan:**  

- [Condensed SRS](condensed_D03_SYSTEM_REQUIREMENT_SPECIFICATIONS.md) (Keperluan Fungsi & NFR)
- [Condensed Technical Design](condensed_TECHNICAL_DESIGN_DOCUMENTATION.md) (Seni bina & Modul)
- [Condensed Source Code Docs](condensed_D10_SOURCE_CODE_DOCUMENTATION.md) (Struktur & Konvensyen Kod)

---

## 2. Tujuan Sistem

Sistem ini menyediakan satu platform berpusat berasaskan Laravel untuk mengurus, mengesahkan, dan menganalisis data Homestay seluruh Malaysia, serta memudahkan pelaporan, integrasi, dan pemantauan prestasi untuk semua pihak berkepentingan.

---

## 3. Skop Fungsi

| Modul                | Fungsi Utama                              | Rujukan           |
|----------------------|-------------------------------------------|-------------------|
| Import Data          | Muat naik Excel, validasi, error log      | D05/D06           |
| Dashboard            | Analitik nasional, negeri, koperasi       | Technical Design  |
| Pengurusan Homestay  | Carian, kemaskini, sejarah prestasi       | Source Code Docs  |
| Pelaporan            | Eksport Excel/PDF, laporan automatik      | Technical Design  |
| Pengguna & RBAC      | Peranan, audit trail, pengurusan akses    | Source Code Docs  |
| Notifikasi & Queue   | Status import, amaran, pemprosesan latar  | Technical Design  |
| API Integrasi        | Sinkronisasi dengan MOTAC/Tourism MY      | SIS, Integration  |

**Rujukan:**  

- [Condensed Technical Design Documentation](condensed_TECHNICAL_DESIGN_DOCUMENTATION.md)  
- [Condensed Source Code Documentation](condensed_D10_SOURCE_CODE_DOCUMENTATION.md)

---

## 4. Seni Bina Sistem

### 4.1 Model Logik

- **Backend:** Laravel 12 (MVC + Service Layer, Eloquent ORM)
- **Frontend:** Livewire (server-side), Blade, AlpineJS, Chart.js
- **API:** RESTful, versioned `/api/v1/`
- **DB:** MySQL/MariaDB (3NF, audit, indeks)
- **Queue:** Redis, Horizon, batch import
- **Observability:** Telescope, log berstruktur (audit, security, performance)

### 4.2 Model Fizikal

- Sokongan multi-node (load balancer, failover, backup)
- Deployment cloud/on-premise, integrasi dengan monitoring (Grafana/Prometheus)

**Diagram & details:**  

- [Condensed Technical Design Documentation, Section 2](./condensed_TECHNICAL_DESIGN_DOCUMENTATION.md#section-2)

---

## 5. Rujukan Modul Utama

- **Import/ETL:** Laravel-Excel, batch, idempotensi, retry, audit log ([D05], [D06])
- **Dashboard:** Livewire components, Chart.js, caching, drill-down ([Technical Design])
- **Pelaporan:** Laporan automatik/manual, eksport PDF/Excel ([Technical Design])
- **RBAC & Security:** Spatie/laravel-permission, Policies, CSRF, audit trail ([Source Code Docs])
- **Integrasi API:** OpenAPI/Swagger, versioned endpoints, OAuth2/Bearer token, retry/circuit breaker ([SIS], [Integration Plan])
- **Database:** Model relasi dengan integriti foreign key, view agregat, stored procedure, automasi arkib ([Database Docs])

---

## 6. Teknologi Utama

- **Backend:** Laravel 12, PHP 8.3+, Eloquent, Service Layer
- **Frontend:** Blade, Livewire, AlpineJS, Bootstrap 5+, Chart.js, Vite
- **DB:** MySQL 8.0+/MariaDB, Redis (cache/queue)
- **Testing:** PHPUnit, Pest, Dusk
- **CI/CD:** GitHub Actions, migration auto-deploy, manual approval to prod
- **Security:** HTTPS/TLS, password (bcrypt), data encryption, audit log, PDPA compliance

---

## 7. Integrasi & Data Flow

- **Import Data:** Excel/CSV → Validasi → Transformasi → Import DB → Audit Log
- **Analitik:** Data DB → Dashboard/Chart → Eksport/Laporan
- **Integrasi Luaran:** API MOTAC/Tourism MY (REST, OAuth2)
- **Notifikasi:** Queue Redis → Notifikasi e-mel/sistem
- **Backup:** Automated daily/weekly, disaster recovery tested

**Rujukan:**  

- [Condensed Technical Design](./condensed_TECHNICAL_DESIGN_DOCUMENTATION.md)  
- [SIS: System Integration Specification](./condensed_D08_SYSTEM_INTEGRATION_SPECIFICATION.md)  
- [Database Documentation](./condensed_D09_DATABASE_DOCUMENTATION.md)

---

## 8. Kawalan Kualiti & Ujian

- **Ujian:** Unit, integrasi, fungsional, UAT, regression
- **Coverage:** ≥80% untuk laluan kritikal
- **Static analysis:** PHPStan, Pint/CS Fixer, ESLint/Prettier
- **CI Gates:** Semua commit mesti lulus pipeline automatik
- **Kriteria penerimaan:** SLA, prestasi, keselamatan, kelulusan audit

---

## 9. Keselamatan & Audit

- **RBAC:** 3 peringkat utama (Admin, Penganalisis, Pemerhati)
- **Audit Trail:** Semua perubahan penting dicatat (DB, log)
- **Encryption:** Kata laluan bcrypt, data sensitif AES-256, HTTPS/TLS 1.3
- **PDPA:** Polisi retensi, anonymization, automasi arkib
- **Monitoring:** Alert pada akses tidak sah, anomali, DR tested

---

## 10. Rujukan Dokumentasi

| Dokumen Ringkasan            | Fokus                               |
|------------------------------|-------------------------------------|
| [Condensed Source Code](./condensed_D10_SOURCE_CODE_DOCUMENTATION.md)   | Struktur kod, konvensyen, docblock  |
| [Condensed Technical Design](./condensed_TECHNICAL_DESIGN_DOCUMENTATION.md) | Seni bina, modul, keselamatan     |
| [Condensed Database Docs](./condensed_D09_DATABASE_DOCUMENTATION.md) | Struktur DB, ERD, kunci, audit      |
| [SRS Ringkasan](./condensed_D03_SYSTEM_REQUIREMENT_SPECIFICATIONS.md)           | Keperluan fungsi, NFR, acceptance   |
| [SIS Ringkasan](./condensed_D08_SYSTEM_INTEGRATION_SPECIFICATION.md)           | API, integrasi, error handling      |
| [Data Migration Plan](./condensed_D05_DATA_MIGRATION_PLAN.md)      | ETL, mapping, rollback, QA          |

---

## 11. Penambahbaikan & Skalabiliti

- **Scalable:** Sokongan multi-node, DB replikasi, cache, batch processing
- **Extensible:** Reka bentuk modular, API-first, automasi CI/CD
- **Maintainable:** Kod PSR-12, dokumentasi lengkap, kemas kini berkala
- **Aksesibiliti:** WCAG 2.1 AA, dwibahasa BM/EN, responsive UI

---

**Kesimpulan:**  
Sistem ini direka secara modular, selamat, dan audit-ready, dengan dokumentasi lengkap merangkumi kod, reka bentuk, dan integrasi. Semua proses pembangunan, migrasi, dan operasi harian mematuhi piawaian MOTAC, PDPA, dan amalan terbaik industri.

---

**Rujukan penuh, diagram, dan spesifikasi boleh didapati dalam dokumen ringkasan berikut:**  

- [Condensed Source Code Documentation](condensed_D10_SOURCE_CODE_DOCUMENTATION.md)  
- [Condensed Technical Design Documentation](condensed_TECHNICAL_DESIGN_DOCUMENTATION.md)  
- [Condensed Database Documentation](condensed_D09_DATABASE_DOCUMENTATION.md)  
- [System Integration Specification](condensed_D08_SYSTEM_INTEGRATION_SPECIFICATION.md)  
- [Data Migration Plan & Specification](condensed_D05_DATA_MIGRATION_PLAN.md)

## Akhir Overview Sistem
