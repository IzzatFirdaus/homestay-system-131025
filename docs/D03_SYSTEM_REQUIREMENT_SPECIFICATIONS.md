# Spesifikasi Keperluan Perisian (Software Requirements Specification — SRS)

## Metadata Dokumen & Kawalan Versi (Document Metadata & Version Control)

| Versi | Tarikh         | Perubahan     | Disemak Oleh           |
|-------|---------------|--------------|------------------------|
| 1.0   | 11 Okt 2025   | Draf awal    | Pasukan BPM MOTAC      |

**Pemilik Dokumen:** MOTAC BPM / Tourism Malaysia
**Kelulusan:** Ketua Bahagian BPM MOTAC

### Kelulusan & Pengesahan (Approvals & Sign-Off)

| Peranan                | Nama                    | Tarikh        | Tandatangan |
|-----------------------|-------------------------|---------------|-------------|
| Disediakan oleh (Prepared by) | Pasukan Projek / Vendor | 11 Okt 2025   |             |
| Disemak oleh (Reviewed by)    | Ketua Teknikal            | 11 Okt 2025   |             |
| Diluluskan oleh (Approved by) | Ketua Bahagian BPM MOTAC | 11 Okt 2025   |             |

**Sistem:** Sistem Pengurusan & Analitik Homestay Malaysia  
**Pemilik Sistem:** MOTAC, Tourism Malaysia  
**Tarikh:** 11 Oktober 2025

## 0. Ringkasan Eksekutif (Executive Summary)

Dokumen ini mentakrifkan tingkah laku perisian secara menyeluruh untuk Sistem Pengurusan & Analitik Homestay Malaysia oleh MOTAC. Ia menjadi rujukan tunggal kepada pasukan pembangunan, QA/QA, pemilik produk MOTAC HQ, MOTAC Negeri, Tourism Malaysia, dan pihak audit untuk memastikan skop, fungsi dan kualiti sistem dipenuhi.

This document defines the complete software behavior for MOTAC’s Homestay Management & Analytics System. It serves as the single source of truth for engineering, QA, MOTAC HQ/state stakeholders, and auditors to ensure scope, functionality, and quality requirements are met.

## 1. Pengenalan

### 1.1 Tujuan

Dokumen ini menerangkan keperluan perisian untuk pembangunan sistem berpusat bagi pengurusan, analisa, dan pelaporan data Homestay di seluruh Malaysia. Sistem ini menyokong operasi harian, pemantauan prestasi, serta pelaporan strategik kepada pihak MOTAC dan Tourism Malaysia, dengan keupayaan import data Excel, dashboard interaktif dan pengurusan pengguna.

### 1.2 Skop

- Pengurusan data Homestay peringkat nasional, negeri, dan koperasi.
- Import data automatik (Excel), validasi dan integrasi ke dalam pangkalan data.
- Dashboard interaktif, carta, graf, dan laporan.
- Akses berasaskan peranan (admin, penganalisis, pemerhati).
- Eksport data dan laporan.

### 1.3 Definisi, Akronim & Singkatan

- **MOTAC:** Kementerian Pelancongan, Seni dan Budaya Malaysia
- **Homestay:** Penginapan berdaftar dalam program rasmi Homestay Malaysia
- **Koperasi:** Homestay yang diuruskan secara koperasi
- **Dashboard:** Ringkasan visual data dan analitik

### 1.4 Pembaca Sasaran & Penggunaan Dokumen (Intended Audience & Usage)

- Kepada pembangun/DevOps: spesifikasi teknikal, API, NFR, konfigurasi dan deployment.
- Kepada QA/UAT: kriteria penerimaan, RTM, rancangan pengesahan & pengesahan.
- Kepada MOTAC HQ/Negeri & Tourism Malaysia: skop fungsi, hak akses, KPI dan metrik laporan.
- Kepada auditor/pematuhan: jejak audit, keselamatan, pematuhan dan kebolehjejakkan keperluan.

Dokumen ini menyajikan tahap teknikal yang mencukupi untuk jurutera sambil mengekalkan naratif perniagaan untuk pemegang taruh bukan teknikal.

---

## 2. Gambaran Keseluruhan Sistem

### 2.1 Perspektif Produk

Aplikasi web baharu berasaskan Laravel (PHP), menggantikan proses manual dan berpecah, menggunakan pangkalan data MySQL/MariaDB dan pustaka moden untuk visualisasi.

### 2.2 Fungsi Produk

- Import data Excel (Homestay, prestasi, kapasiti, struktur pengurusan).
- Validasi dan kemasukan data; pengendalian ralat.
- Penyimpanan dan perkaitan data dalam pangkalan data normal.
- Paparan dashboard nasional, negeri, koperasi, dan Homestay.
- Drill-down ke profil Homestay terperinci.
- Eksport dan cetak laporan.
- Akses pengguna berasaskan peranan dan log audit.

### 2.3 Kelas & Ciri Pengguna

- **Admin:** Akses penuh (urus pengguna, import data, semua laporan).
- **Penganalisis:** Akses dashboard, analitik, eksport.
- **Pemerhati:** Akses bacaan sahaja untuk metrik dan laporan terpilih.

### 2.4 Persekitaran Operasi

- Berasaskan web, boleh diakses melalui pelayar moden (Chrome, Edge, Firefox).
- Dihoskan di pelayan LAMP/LEMP atau cloud (AWS, DigitalOcean).
- PHP >=8.2, MySQL/MariaDB, Node.js untuk aset frontend.

### 2.5 Kekangan Rekabentuk & Implementasi

- Guna amalan terbaik Laravel (MVC, Eloquent ORM, Policies).
- Patuh piawaian keselamatan data kerajaan.
- Integrasi Maatwebsite/Laravel-Excel untuk import/eksport.

### 2.6 Dokumentasi Pengguna

- Manual pengguna (PDF/HTML).
- Bantuan konteks dalam aplikasi.

### 2.7 Konteks Sistem (System Context)

- Sistem berfungsi sebagai repositori berpusat untuk data Homestay nasional, menerima input dari MOTAC Negeri/koperasi melalui import Excel.
- MOTAC HQ dan negeri menggunakan dashboard analitik berbilang peringkat, laporan automatik dan eksport data bagi tujuan pelaporan strategik dan operasi.
- Integrasi masa depan dengan sistem Tourism Malaysia Analytics/portal dalaman melalui API RESTful.

### 2.8 Asumsi & Kebergantungan Sistem (System Assumptions & Dependencies)

- Data Homestay diperoleh daripada fail Excel/CSV yang disediakan oleh MOTAC Negeri dan koperasi.
- Sistem memerlukan sambungan internet stabil untuk import data besar dan akses dashboard.
- Pelayan aplikasi mesti menjalankan PHP >=8.2, MySQL/MariaDB >=8, Node.js >=18, Composer, dan NPM.
- Integrasi dengan Laravel-Excel dan Chart.js bergantung pada kestabilan pustaka semasa.
- Pengguna mesti mempunyai pelayar moden (Chrome, Edge, Firefox) dan akses HTTPS.

### 2.9 Kebergantungan Luaran (External Dependencies)

- Direktori induk MOTAC (senarai Homestay/koperasi) — sumber kebenaran identiti.
- Perkhidmatan e-mel SMTP untuk notifikasi sistem.
- Perkhidmatan pengesahan (contoh: OAuth2) jika diintegrasi dengan SSO.
- Infrastruktur rangkaian dan DNS untuk capaian awam HTTPS.

### 2.10 Konfigurasi & Deployment Sistem (System Configuration & Deployment)

- Minimum pelayan: 4 vCPU, 8 GB RAM, 100 GB storan, SSD; Disyorkan: 8 vCPU, 16 GB RAM.
- OS disokong: Ubuntu 22.04 LTS / Rocky Linux 9 / Windows Server 2022.
- Pelantar: Nginx/Apache, PHP-FPM 8.2, MySQL/MariaDB 10.6+, Redis (pilihan) untuk queue/caching.
- CI/CD: GitHub Actions (lint, unit test, build asset, deploy), pengurusan rahsia selamat.
- Sandaran: pangkalan data harian, retention 30/90 hari; ujian pemulihan berkala.

---

## 3. Ciri-ciri Sistem

### 3.1 Import & Validasi Data

- Muat naik fail Excel (XLSX/CSV)
- Pemetaan kolum ke medan pangkalan data
- Validasi struktur dan nilai data
- Pratonton import dan paparan ralat
- Penyimpanan baris berjaya & laporan kegagalan

### 3.2 Dashboard & Visualisasi

- Dashboard nasional, negeri, koperasi
- Carta: bar, pai, garis, peta
- Metrik utama: pelawat, pendapatan, penghunian, kapasiti, penembusan koperasi, segmentasi pelawat
- Drill-down ke negeri/koperasi/Homestay

### 3.3 Profil & Pengurusan Homestay

- Senarai Homestay boleh cari/tapis
- Profil terperinci: kapasiti, pengurusan, prestasi, sumber pendapatan, status koperasi
- Alat perbandingan antara negeri/model pengurusan

### 3.4 Pengurusan Pengguna & Autorisasi

- Daftar, edit, nyahaktif pengguna
- Tetapan peranan (admin/penganalisis/pemerhati)
- Penguatkuasaan polisi akses
- Log audit perubahan data

### 3.5 Pelaporan & Eksport

- Jana dan eksport laporan ke Excel/PDF
- Pilihan laporan nasional, negeri, koperasi, Homestay
- Penjadualan laporan automatik (jika diperlukan)

### 3.6 Pengendalian Ralat & Pemulihan (Error Handling & Recovery)

#### 3.6.1 Kod Ralat & Mesej (Error Codes & Messages)

- IMP-001: Fail tidak sah (struktur/format tidak sepadan templat).
- IMP-002: Nilai wajib hilang/format tidak sah (baris X, lajur Y).
- VAL-003: Duplikasi rekod dikesan (kunci unik: homestay_id, bulan, tahun).
- SYS-500: Ralat dalaman tidak dijangka — sila cuba semula atau hubungi pentadbir.

#### 3.6.2 Strategi Pemulihan & Ulangan (Retry & Rollback)

- Import excel berjalan dalam queue; jika gagal, job diulang sehingga 3 kali dengan backoff.
- Operasi import adalah idempotent; rekod duplikasi diabaikan/ditandakan.
- Rollback separa: baris gagal dilog; baris berjaya kekal (laporan kegagalan disediakan).
- Notifikasi dihantar selepas import siap/gagal (e-mel dan in-app).

### 3.7 Keperluan Fungsian Tambahan (Additional Functional Requirements)

- **Autentikasi & Pemulihan Akaun:** Pengguna boleh reset kata laluan melalui e-mel; sokongan MFA (opsyenal).
- **Notifikasi Sistem:** E-mel/sistem untuk status import berjaya/gagal, laporan siap, dan amaran data tidak lengkap.
- **Penjadualan Automatik:** Laporan automatik dijana dan dihantar setiap bulan.
- **Audit Trail View:** Admin boleh menapis log aktiviti mengikut tarikh, pengguna, dan jenis operasi.
- **Antaramuka Berbilang Bahasa:** Sokongan tukar bahasa (BM/EN) untuk UI utama.

- Paparan ralat jelas semasa import/validasi
- Logging perubahan data & ralat
- Akses admin ke log audit

### 3.8 Keperluan Fungsian Terperinci (Detailed Functional Requirements)

Setiap keperluan berikut mematuhi format: ID, Penerangan, Input, Proses/Logik, Output, Kebergantungan/Pencetus, Kriteria Penerimaan.

#### SRS-FN-01: Import Data (Excel/CSV)

- Input: Fail XLSX/CSV (templat standard), kolum wajib: homestay_id, negeri, koperasi, bulan, tahun, pelawat_domestik, pelawat_asing, pendapatan.
- Proses: Muat naik → validasi struktur & nilai → simpan baris sah → log baris gagal.
- Output: Ringkasan import, senarai ralat baris, metrik kiraan berjaya/gagal.
- Kebergantungan: Laravel-Excel, storan sementara, queue.
- Kriteria: ≥10k baris diproses ≤2 min; ralat dipaparkan dengan lokasi baris/lajur.

#### SRS-FN-02: Validasi Data Automatik

- Input: Baris data mentah hasil import.
- Proses: Semak medan wajib, julat nilai, keunikan; peraturan perniagaan (contoh: bulan 1–12).
- Output: Senarai isu (severity), pembetulan disyorkan.
- Kebergantungan: Skema validasi, kamus data (D09).
- Kriteria: ≥95% ketepatan pengesanan ralat dalam UAT sampel.

#### SRS-FN-03: Dashboard Nasional & Negeri

- Input: Data agregat harian/bulanan dari DB.
- Proses: Pengiraan KPI, caching, rendering graf.
- Output: Widget metrik, carta interaktif, peta negeri.
- Kebergantungan: Chart.js, peta geoJSON.
- Kriteria: Masa muat <2s untuk set data tipikal.

#### SRS-FN-04: Visualisasi Interaktif

- Input: Data siri masa & kategori.
- Proses: Penapisan dinamik, drill-down, perbandingan negeri/koperasi.
- Output: Bar/Line/Pie/Heatmap; eksport imej.
- Kebergantungan: Chart.js; modul eksport.
- Kriteria: Interaksi <150ms; eksport PNG/PDF berjaya.

#### SRS-FN-05: Laporan Automatik

- Input: Jadual penjadualan; templat laporan.
- Proses: Jana laporan bulanan/quarterly; hantar e-mel/portal.
- Output: PDF/Excel; status penghantaran.
- Kebergantungan: Queue, SMTP.
- Kriteria: Laporan dihantar <06:00 hari pertama bulan berikutnya.

#### SRS-FN-06: Eksport Data & Laporan

- Input: Penapis pengguna; pemilihan dataset/laporan.
- Proses: Jana fail CSV/XLSX/PDF; watermark/metadata.
- Output: Fail muat turun; audit log.
- Kebergantungan: Laravel-Excel; modul PDF.
- Kriteria: Eksport dataset 50k baris ≤ 60s.

#### SRS-FN-07: Kawalan Akses Berasaskan Peranan (RBAC)

- Input: Peranan (admin/penganalisis/pemerhati/negeri), polisi.
- Proses: Authorize setiap permintaan berdasarkan polisi & pemilikan negeri.
- Output: Hasil kebenaran/penafian; log audit.
- Kebergantungan: Laravel Policies; middleware.
- Kriteria: Tiada akses lintas-negeri tanpa kebenaran.

#### SRS-FN-08: Pengurusan Sesi & Keselamatan

- Input: Kredensial/MFA; token sesi.
- Proses: Login, tamat sesi, rate limit, pengesahan semula.
- Output: Sesi sah; amaran keselamatan.
- Kebergantungan: Laravel auth, rate limiter.
- Kriteria: Tamat sesi selepas 30 min tidak aktif; brute-force dihalang.

#### SRS-FN-09: Notifikasi Sistem

- Input: Pencetus (import siap/gagal, laporan siap).
- Proses: Hantar e-mel/in-app/SMS (kritikal).
- Output: Rekod notifikasi; status penghantaran.
- Kebergantungan: SMTP/SMS gateway.
- Kriteria: Notifikasi dihantar ≤1 min selepas peristiwa.

#### SRS-FN-10: Penjadualan & Automasi

- Input: Peraturan jadual.
- Proses: Cron/queue memproses tugasan berkala.
- Output: Log pelaksanaan; status kejayaan.
- Kebergantungan: Scheduler Laravel; queue worker.
- Kriteria: Ketepatan jadual ±1 min.

### 3.9 Keperluan Data (Data Requirements)

- Format Excel: templat standard dengan helaian "Homestay", "Prestasi"; kod negeri/koperasi standard.
- Peraturan validasi medan: jenis data, julat, kebolehan null, kekangan unik (rujuk D09).
- Polisi retensi: log import dan audit disimpan minimum 12 bulan; data metrik kekal.
- Metrik terbitan: pendapatan per bilik = pendapatan / jumlah bilik; occupancy = penghunian / kapasiti.

---

## 4. Keperluan Antara Muka Luaran

### 4.1 Antara Muka Pengguna

- UI responsif (Bootstrap 5+), minimum lebar 1024px untuk tablet/laptop.
- Layout dashboard: widget metrik utama (pelawat, pendapatan, penghunian), panel penapis, carta interaktif, dan senarai Homestay.
- Warna dan kontras patuh WCAG AA untuk aksesibiliti.
- Sokongan pembaca skrin dan navigasi papan kekunci.
- Skrin login, dashboard, drill-down, import/eksport.
- Jadual data dengan fungsi carian, penapisan, dan eksport.

### 4.2 Antara Muka Perkakasan

- Pelayan web standard; tiada perkakasan khas diperlukan

### 4.3 Antara Muka Perisian

- Integrasi Maatwebsite/Laravel-Excel untuk import/eksport (format: XLSX, CSV, JSON).
- Chart.js untuk visualisasi.
- (Optional) API RESTful untuk integrasi sistem MOTAC lain (endpoint, field, response format didokumenkan).
- API authentication menggunakan token atau OAuth2.
- Strategi integrasi: batch upload (import berkala) dan real-time sync (jika diperlukan).

### 4.4 Antara Muka Komunikasi

- Semua sambungan melalui HTTPS

### 4.5 Aliran UX (UX Flow)

- Login → Dashboard Nasional → Penapis/Drill-down → Paparan Negeri/Koperasi → Profil Homestay → Eksport/Laporan.
- Import Data → Pratonton & Validasi → Log Ralat → Ulang Import (jika perlu) → Notifikasi.

### 4.6 Skema API (API Schemas)

- Endpoints (contoh, jika didedahkan): GET /api/dashboard?state=; POST /api/import (multipart file).
- Autentikasi: Bearer token/OAuth2. Respons JSON standard dengan kod/mesaj ralat.

---

## 5. Keperluan Bukan Fungsian

### 5.1 Prestasi

- Sokong sehingga 10,000 rekod Homestay & berkaitan.
- Dashboard dimuatkan < 2 saat untuk jumlah data tipikal.
- Import data ≥ 10,000 rekod dalam ≤ 2 minit.
- Saiz maksimum fail import: 50MB setiap sesi.
- Masa respons API < 500ms untuk permintaan biasa.

Ujian prestasi: JMeter/k6 dengan beban 100 pengguna serentak; keluk degradsi dipantau.

### 5.2 Kebolehpercayaan & Ketersediaan

- Sasaran uptime >99%
- Sandaran pangkalan data harian

SLA: ketersediaan bulanan ≥99.5%; MTTR < 2 jam; pemantauan kesihatan automatik.

### 5.3 Keselamatan

- Akses berasaskan peranan (Laravel Policies) hingga ke tahap CRUD.
- Kata laluan/data sensitif disulitkan (AES-256, bcrypt).
- Perlindungan CSRF/XSS/SQLi.
- Sesi tamat automatik selepas 30 minit tidak aktif.
- Pencegahan brute-force login (rate limiting, lockout sementara).
- Sandaran data disulitkan (encryption at rest).
- Semua sambungan melalui HTTPS (TLS 1.3).

Pematuhan: Dasar keselamatan kerajaan, enkripsi at-rest dan in-transit; audit akses berkala.

### 5.4 Kebolehselenggaraan

- Kod Laravel modular, terdokumen, dan mematuhi PSR-12.
- Ujian automatik untuk ciri kritikal.
- Penggunaan Laravel Queues untuk import data besar dan proses latar.
- Reka bentuk menyokong penambahan microservices dan versioning API pada masa depan.

Amalan: CI/CD dengan semakan lint, unit/integration test; dokumentasi kod (D10).

### 5.5 Kebolehportan (Portability)

- Menyokong deploy on-premise atau cloud (AWS/DigitalOcean); kontena Docker pilihan.
- Konfigurasi melalui .env; parameterisasi untuk persekitaran dev/staging/prod.

### 5.6 Kebolehgunaan & Aksesibiliti (Usability & Accessibility)

- WCAG 2.1 AA: kontras warna, fokus jelas, navigasi papan kekunci penuh.
- Bahasa dwibahasa (BM/EN); istilah konsisten dengan MOTAC.

## 6. Kriteria Penerimaan (Acceptance Criteria)

Kejayaan sistem akan diukur melalui kriteria boleh uji berikut:

- Import 10,000 rekod ≤ 2 min, tiada ralat kritikal; laporan baris gagal jelas.
- Masa muat dashboard utama ≤ 2 saat untuk dataset tipikal.
- SLA ketersediaan ≥ 99.5% dalam tempoh operasi.
- 0 kejadian kebocoran data dalam UAT; semua peranan mematuhi polisi akses.
- Laporan bulanan dijana dan dihantar sebelum 06:00 hari pertama bulan berikutnya.
- UAT: Semua kes ujian kritikal (P1) lulus (≥95%).

## 7. Ujian & Pengesahan (Verification & Validation)

Jenis ujian, persekitaran dan hasil yang dijangka:

- Unit, Integration, System, UAT, Regression.
- Persekitaran: staging menyerupai produksi (DB subset anonim, konfigurasi setara).
- Hasil: Pelan ujian, kes ujian, laporan hasil, matriks liputan.

| Jenis Ujian      | Tujuan                               | Tanggungjawab |
| ---------------- | ------------------------------------ | ------------- |
| Unit Test        | Uji modul kecil (controller, model)  | Developer     |
| Integration Test | Uji sambungan modul import-dashboard | QA            |
| UAT              | Pengesahan oleh MOTAC HQ             | End User      |
| Regression       | Selepas deployment                   | DevOps        |

## 8. Lampiran Tambahan (Appendices)

- **UML/Flow Diagrams:** Proses import → validasi → dashboard (rujuk SDD D04).
- **Data Dictionary:** Lihat D09 Database Documentation untuk jenis data dan nilai dibenarkan.
- **ERD:** Rujuk D09 untuk model entiti dan hubungan.

### 8.1 Model Data (Ringkasan)

- Homestay: id, nama, negeri, alamat, kapasiti, fasiliti, model pengurusan, id koperasi, dsb.
- Prestasi: homestay_id, bulan, tahun, pelawat domestik, pelawat asing, pendapatan, dsb.
- Koperasi: id, nama, kawasan, dsb.
- Pengguna: id, nama, emel, peranan, dsb.

### 8.2 Rujukan Dokumen (Document References)

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

### 8.3 Rujukan Tambahan

- [BRS (D02)](D02_BUSINESS_REQUIREMENT_SPECIFICATIONS.md)
- Fail latihan Laravel (LARAVEL-TRAINING-DAY-1/2/3.md)

## 9. Model Sistem (System Models)

- Use Case Diagram: Import, Validasi, Laporan, Eksport (rujuk D04 SDD).
- Sequence Diagram: Aliran import data (rujuk D04 SDD).
- Activity Diagram: Proses penyegaran dashboard (rujuk D04 SDD).
- Data Flow Diagram: Antara modul import, validasi, storan, analitik (rujuk D04 SDD).

## 10. Matriks Kebolehjejakkan Keperluan (Requirements Traceability Matrix — RTM)

| BRS ID     | SRS ID     | Test Case ID | Penerangan / Description              | Status  |
| ---------- | ---------- | ------------ | ------------------------------------- | ------- |
| BRS-FN-01  | SRS-FN-01  | TC-IMP-01    | Import Excel: validasi & hasil        | Pending |
| BRS-FN-02  | SRS-FN-02  | TC-VAL-01    | Validasi data automatik               | Pending |
| BRS-FN-03  | SRS-FN-03  | TC-DASH-01   | Dashboard nasional/negeri             | Pending |
| BRS-FN-05  | SRS-FN-05  | TC-REP-01    | Laporan automatik                     | Pending |
| BRS-FN-06  | SRS-FN-06  | TC-EXP-01    | Eksport CSV/XLSX/PDF                  | Pending |
| BRS-FN-07  | SRS-FN-07  | TC-RBAC-01   | Akses peranan & polisi                | Pending |

## 11. Penyelenggaraan & Sokongan (Maintenance & Support)

- Kekerapan tampalan keselamatan: bulanan atau segera untuk CVE kritikal.
- Pemantauan: uptime, latensi, ralat aplikasi (contoh: Prometheus/Grafana/CloudWatch).
- Tetingkap penyelenggaraan berjadual: 01:00–03:00, hari bekerja rendah trafik.
- MTTR sasaran: < 2 jam; eskalasi: DevOps → Ketua Teknikal → Pengurusan.

Akhir Dokumen
