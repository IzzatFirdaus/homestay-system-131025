
# Pelan Migrasi Data (Data Migration Plan)

**Sistem:** Sistem Pengurusan & Analitik Homestay Malaysia

**Pemilik Sistem:** MOTAC, Tourism Malaysia

**Tarikh:** 11 Oktober 2025

---

## Metadata Dokumen & Kawalan Versi (Document Metadata & Version Control)

| Versi | Tarikh      | Perubahan   | Disemak Oleh |
|-------|-------------|-------------|--------------|
| 1.0   | 11 Okt 2025 | Draf awal   | BPM MOTAC    |

**Status:** Draf Awal  
**Penulis:** Pasukan Pembangunan MOTAC  
**Penyemak:** BPM MOTAC  
**Kelulusan:** Ketua Bahagian BPM MOTAC

---

### 0. Skop & Audiens Dokumen (Document Scope & Audience)

- Tujuan: Pelan operasi migrasi data terperinci untuk DevOps, Pentadbir Data MOTAC, Pembangun, dan QA/UAT, sejajar dengan SRS (D03), SDD (D04), dan DMS (D06).
- Audiens: Pentadbir Data, Pembangun/DevOps, QA/UAT, MOTAC HQ/Negeri, auditor dalaman.
- Hubungan Dokumen: D06 (Spesifikasi Migrasi Data) memperincikan skema dan transformasi, D09 (Dokumentasi Pangkalan Data) menyediakan ERD/kamus data, D03 (SRS) menetapkan keperluan penerimaan.

---

## 1A. Objektif & Prinsip Migrasi Data (Objectives & Principles)

---

## 1B. Strategi Migrasi (Migration Strategy)

---

## 1C. Peranan & Tanggungjawab (Roles & Responsibilities)

| Aktiviti/Milestone         | Pentadbir Data MOTAC | Pembangun | QA/UAT | Negeri/Koperasi |
|---------------------------|:--------------------:|:---------:|:------:|:--------------:|
| Kenal pasti sumber data    |    A/R               |    C      |   I    |      C/R       |
| ETL & import data         |    C                 |    A/R    |   C    |      I         |
| Validasi & audit          |    C                 |    C      |   A/R  |      I         |
| Backup & rollback         |    A/R               |    C      |   I    |      I         |
| Ujian dry run             |    C                 |    A/R    |   C    |      I         |
| Komunikasi status         |    A/R               |    C      |   I    |      C/R       |

**Nota:** A = Accountable, R = Responsible, C = Consulted, I = Informed

- **Pendekatan:** Pilihan antara *big bang* (semua data dimigrasi serentak) atau *incremental* (berperingkat mengikut negeri/kluster). Pilihan bergantung pada saiz data, risiko, dan keperluan operasi.
- **Kriteria Pemilihan:** Jika data < 100,000 rekod dan downtime dibenarkan, gunakan *big bang*. Jika data besar atau risiko tinggi, gunakan *incremental*.
- **Fallback/Rollback:** Jika migrasi gagal, sistem akan rollback ke backup terakhir. Semua operasi migrasi didahului dengan sandaran penuh.
- **Dry Run:** Ujian migrasi percubaan (dry run) akan dijalankan pada subset data untuk menguji proses ETL, validasi, dan prestasi sebelum migrasi sebenar.

- **Objektif:** Memastikan peralihan data ke sistem baharu berjalan lancar tanpa kehilangan, kerosakan, atau ketidakselarasan data. Menjamin operasi sistem tidak terganggu selepas migrasi.
- **Prinsip Utama:** Ketepatan, keselamatan, ketelusan, auditabiliti, dan pematuhan kepada piawaian kerajaan.
- **Piawaian Rujukan:** ISO/IEC 25024 (Data Quality Model), IEEE 1062 (Software Acquisition), serta dasar keselamatan data MOTAC.

---

## 1D. Tadbir Urus & Kelulusan (Governance & Sign-off)

- Data Steward: Pemilik data pasca-migrasi bertanggungjawab ke atas kualiti, pembetulan, dan kelulusan perubahan.
- Eskalasi: QA → Arkitek Sistem → Ketua Bahagian BPM (jika KPI kritikal gagal).
- Templet Kelulusan Go-Live: borang sign-off yang menyatakan KPI dipenuhi, laporan validasi dilampirkan, dan persetujuan pihak berkepentingan.

---

## Rujukan Dokumen Berkaitan (Related Document References)

| Kod  | Nama Dokumen                                      | Versi | Pautan                |
|------|---------------------------------------------------|-------|-----------------------|
| D01  | System Development Plan (SDP)                     | 1.0   | [D01_SYSTEM_DEVELOPMENT_PLAN.md](D01_SYSTEM_DEVELOPMENT_PLAN.md) |
| D02  | Business Requirements Specification (BRS)          | 1.0   | [D02_BUSINESS_REQUIREMENT_SPECIFICATIONS.md](D02_BUSINESS_REQUIREMENT_SPECIFICATIONS.md) |
| D03  | Software Requirements Specification (SRS)          | 1.0   | [D03_SYSTEM_REQUIREMENT_SPECIFICATIONS.md](D03_SYSTEM_REQUIREMENT_SPECIFICATIONS.md) |
| D04  | System Design Document (SDD)                       | 1.0   | [D04_SYSTEM_DESIGN_DOCUMENT.md](D04_SYSTEM_DESIGN_DOCUMENT.md) |
| D06  | Data Migration Specification (DMS)                 | 1.0   | [D06_DATA_MIGRATION_SPECIFICATION.md](D06_DATA_MIGRATION_SPECIFICATION.md) |
| D09  | Database Documentation (DBD)                       | 1.0   | [D09_DATABASE_DOCUMENTATION.md](D09_DATABASE_DOCUMENTATION.md) |

---

**Sistem:** Sistem Pengurusan & Analitik Homestay Malaysia  
**Pemilik Sistem:** MOTAC, Tourism Malaysia  
**Tarikh:** 11 Oktober 2025

---

## 1. Tujuan

Dokumen ini menerangkan perancangan dan langkah-langkah migrasi data ke dalam Sistem Pengurusan & Analitik Homestay Malaysia. Fokus utama adalah memastikan semua data Homestay daripada pelbagai sumber (fail Excel, pangkalan data lama, atau rekod manual) dapat dipindahkan, divalidasi, dan disusun dengan selamat serta berintegriti ke dalam sistem baharu.

---

## 2. Skop Migrasi

- Semua data Homestay berdaftar di seluruh Malaysia (profil, kapasiti, lokasi, koperasi, prestasi bulanan/tahunan).
- Data berkaitan koperasi, kluster, pengguna/pemilik, penginapan, prestasi kewangan, dan kehadiran pelawat.
- Penukaran data daripada format Excel/CSV atau sistem lama ke format pangkalan data sistem baharu (MySQL/MariaDB).

---

## 2A. Persekitaran Migrasi (Migration Environment Setup)

- Persekitaran: dev → staging → production; migrasi sebenar hanya di production selepas lulus ujian staging.
- Storan sementara: direktori sementara pada pelayan aplikasi (cth: storage/app/migration) dengan akses terhad.
- Alat: Laravel-Excel, skrip artisan import, MySQL client/Workbench/phpMyAdmin, SFTP/HTTPS untuk pemindahan fail.
- Kredensial: akses baca/tulis DB (scoped), akses storan SFTP/HTTP, akses rahsia melalui .env/secret manager.
- Pra-migrasi checklist:
  - Kapasiti pelayan (CPU/RAM/IO) mencukupi.
  - Kebenaran folder sementara & quota storan.
  - Versi PHP, Laravel, Maatwebsite/Laravel-Excel disahkan.
  - Versi skrip migrasi ditag dalam VCS (git tag) dan semakan PR selesai.

---

## 3. Sumber Data

- Fail Excel/CSV rasmi dari MOTAC, negeri, koperasi, dan pengusaha Homestay.
- Pangkalan data warisan (jika ada).
- Sumber manual (untuk data yang tidak wujud dalam sistem digital).

---

## 3A. Pemetaan Data (Data Mapping Overview)

| Sumber (Excel) | Sasaran (Jadual/Medan DB) | Peraturan Transformasi               | Validasi   |
|----------------|----------------------------|--------------------------------------|------------|
| negeri         | homestays.state            | Uppercase; sahkan kod negeri rasmi   | Diperlukan |
| koperasi       | cooperatives.name          | Trim whitespace                      | Opsyenal   |
| bulan          | performances.month         | Integer 1–12                         | Diperlukan |
| pendapatan     | performances.revenue       | Parse nombor; minimum 0              | Diperlukan |

Nota: Pemetaan terperinci dirujuk dalam D06 (Spesifikasi Migrasi Data).

---

## 4. Langkah-langkah Migrasi

---

## 4A. Perincian Proses ETL (Detailed ETL Process)

- **Modul/Skrip ETL:** Menggunakan Laravel service class (ImportDataService) dengan Maatwebsite/Laravel-Excel untuk import, validasi, dan pemetaan data.
- **Log ETL:** Semua operasi ETL direkod ke fail log (storage/logs/etl-migration-YYYYMMDD.log) dan audit trail DB (jadual `imports`, `audit_logs`).
- **Pengendalian Ralat:** Jika berlaku ralat, sistem akan log error, retry automatik sehingga 3 kali, dan notifikasi kepada pentadbir.
- **Versi Dataset & Timestamp:** Setiap import direkod dengan versi dataset, timestamp, dan ID unik untuk audit.

### 4.1 Persediaan

- Kenal pasti semua sumber data dan tetapkan pemilik data bertanggungjawab.
- Sediakan templat fail Excel piawai untuk konsistensi struktur dan format.
- Bersihkan data (pengesahan, penghapusan pendua, pembetulan ejaan dan kod negeri/koperasi).

### 4.2 Proses ETL (Extract, Transform, Load)

#### a) Extract (Pengekstrakan)

- Ekstrak semua data Homestay, koperasi, dan prestasi daripada fail Excel/CSV atau pangkalan data lama.
- Simpan salinan sandaran sebelum sebarang pemprosesan.

#### b) Transform (Transformasi)

- Tukar struktur data supaya mengikut skema baharu sistem (rujuk model data dalam SRS/SDD).
- Penyesuaian kod negeri, kod koperasi, tarikh, dan format nilai numerik.
- Pemetaan ID unik dan hubungan antara entiti (Homestay, koperasi, kluster, dsb.).
- Validasi data (rujuk bahagian validasi di bawah).

#### c) Load (Pemindahan ke Sistem Baharu)

- Import data menggunakan modul import sistem (Maatwebsite/Laravel-Excel).
- Jalankan import secara berperingkat (cth: negeri demi negeri atau kluster demi kluster).
- Semak dan sahkan hasil import pada setiap peringkat.

### 4.3 Validasi & Jaminan Kualiti

---

## 4B. Validasi Data & Kualiti (Data Validation & Quality)

---

### KPI Kualiti Data (Data Quality KPIs)

- Kelengkapan ≥99%; kehilangan data = 0%; kadar penolakan <1%; masa import 10k rekod < 5 min.
- Ambang kegagalan: jika mana-mana KPI dilanggar, eskalasi kepada Arkitek Sistem untuk keputusan henti/terus.

### Profiling & Pembersihan (Profiling & Cleansing)

- Profiling pra-migrasi: semak nilai kosong, sebaran kod negeri/koperasi, outlier numerik.  
- Contoh semakan: SQL COUNT DISTINCT, Excel pivots, skrip pemeriksaan format tarikh.

## 4C. Keselamatan Data (Data Security)

---

- Akses berdasarkan peranan ke storan migrasi; least privilege untuk akaun skrip.
- Polisi kitaran kunci enkripsi (key rotation) bagi rahsia sensitif.
- Pematuhan PDPA Malaysia & Garis Panduan ICT MOTAC.
- Polisi retensi & pemadaman selamat fail sementara (shred/wipe untuk on-prem jika perlu).

## 4D. Pemulihan & Sandaran (Backup & Recovery)

---

- Pencetus rollback: kehilangan data >0%, kadar penolakan ≥5%, integriti hubungan gagal pada sampel ≥2%.
- Toleransi downtime maksimum: 2 jam dalam tetingkap penyelenggaraan dipersetujui.
- Ujian rollback: latihan pemulihan dilakukan di staging sebelum migrasi production.

## 4E. Ujian Migrasi (Migration Testing)

---

### Pelan Validasi Pasca-Load (Post-Load Validation Plan)

| Jenis Validasi | Kaedah | Alat | Pemilik | Output |
|----------------|--------|------|---------|--------|
| Kiraan rekod | Banding jumlah rekod | SQL script | QA | validation_report.sql |
| Pemetaan medan | Spot-check sampel | Excel diff | Pembangun | mismatch_log.csv |
| Integriti hubungan | FK checks, orphan detection | SQL | QA | fk_check.csv |
| Dashboard konsistensi | Banding metrik agregat | Aplikasi | QA | dashboard_compare.pdf |

## 4F. Pelan Komunikasi Migrasi (Migration Communication Plan)

- **Mekanisme Komunikasi:** Semua notifikasi migrasi akan dihantar melalui e-mel rasmi MOTAC, WhatsApp group, dan sistem notifikasi dalaman.
- **Jadual Pemakluman:**
  - Pra-migrasi: Notis 7 hari & 1 hari sebelum migrasi.
  - Semasa migrasi: Status kemajuan setiap 2 jam.
  - Pasca migrasi: Laporan akhir dan pengesahan data.
- **Templat Laporan Status:**

| Tarikh/Masa | Status | Jumlah Rekod | Ralat | Tindakan Susulan |
|------------|--------|--------------|-------|------------------|
| 2025-10-11 10:00 | Import bermula | 0 | 0 | - |
| 2025-10-11 12:00 | 50% selesai | 50,000 | 2 | Semak ralat |
| 2025-10-11 14:00 | Selesai | 100,000 | 2 | Sahkan data |

- **Ujian Integriti:** Semak data sebelum dan selepas migrasi untuk memastikan tiada kehilangan atau perubahan tidak sah.
- **Ujian Prestasi:** Ukur masa pemindahan, throughput (rekod/saat), dan kecekapan proses ETL.
- **Pengesahan QA:** Ujian manual dan automatik oleh pasukan QA/UAT, termasuk semakan laporan dan dashboard.
- **Ujian Beban:** Stress test untuk import besar (>100,000 rekod) dan pemantauan kestabilan sistem.

### Saluran Komunikasi & Kenalan (Channels & Contacts)

| Peranan | Nama/Kumpulan | Saluran | Waktu | Nota |
|--------|----------------|---------|-------|------|
| War Room | Projek Homestay | Microsoft Teams / WhatsApp | 24x7 semasa migrasi | — |
| Hotline insiden | DevOps On-call | Telefon | 24x7 | Pusingan on-call |
| Notifikasi pengguna | MOTAC HQ/Negeri | E-mel rasmi | Waktu pejabat | Templat tersedia |

### Jadual Latihan & Kehadiran (Training & Attendance)

| Tarikh | Topik | Audiens | Kehadiran |
|--------|-------|---------|-----------|
| 2025-10-05 | Penggunaan modul import & validasi | Pentadbir Data | — |
| 2025-10-06 | Proses pemulihan & rollback | DevOps/Arkitek | — |

### 4G. Runbook Pelaksanaan Migrasi (Migration Execution Runbook)

| Langkah | Penerangan | Tanggungjawab | Output Dijangka |
|--------|------------|----------------|-----------------|
| 1 | Backup DB lama (full) | SysAdmin | backup.sql / snapshot |
| 2 | Sediakan storan sementara & fail | Pentadbir Data | folder siap, checksum fail |
| 3 | Jalankan ImportDataService (ETL) | Pembangun | import_log.log, job ID |
| 4 | Validasi pasca-load | QA | validation_report.pdf/csv |
| 5 | Audit & semakan silang | Pentadbir Data | audit_log.csv |
| 6 | Kelulusan Go-Live | Ketua BPM/Arkitek | signoff.pdf |

### 4H. Pemantauan & KPI Migrasi (Monitoring & KPIs)

- Metrik: kadar import (rekod/saat), kadar kejayaan validasi (%), bilangan rekod ditolak, masa total migrasi.
- Pelaporan: log automatik setiap 15 min; dashboard ringkas (graf kadar import, ralat mengikut jenis) jika tersedia.

- **Jenis Backup:** Backup penuh sebelum migrasi, backup incremental harian semasa proses migrasi, dan backup differential jika perlu.
- **Jadual & Polisi Simpanan:** Backup disimpan sekurang-kurangnya 30 hari selepas migrasi. Lokasi backup di server selamat dan/atau storan awan (cloud).
- **Prosedur Rollback:** Jika migrasi gagal, sistem akan dipulihkan ke status sebelum migrasi menggunakan backup terakhir. Ujian pemulihan dilakukan sebelum migrasi sebenar.

- **Pemindahan Fail:** Semua fail migrasi dipindahkan melalui SFTP, HTTPS upload, atau pemacu fizikal selamat (on-prem drive) mengikut sensitiviti data.
- **Perlindungan Data:** Data dienkripsi semasa transit (TLS 1.3) dan disimpan (AES-256 untuk fail sensitif). Akses ke fail migrasi dihadkan kepada pentadbir yang diberi kuasa sahaja.
- **Penghapusan Fail Sementara:** Semua fail sementara dan cache akan dipadamkan selepas migrasi selesai untuk mengelakkan kebocoran data.

- **Tahap Validasi:**
  - Field-level: Semak format, panjang, dan jenis data setiap medan.
  - Record-level: Semak kelengkapan dan keunikan setiap rekod (ID unik, tiada pendua).
  - Relational-level: Semak integriti hubungan antara entiti (foreign key, negeri, koperasi).
- **Kriteria Penerimaan:**
  - >99% kelengkapan data, 0% ID pendua, <1% ralat minor.
- **Audit Selepas Migrasi:**
  - Audit silang dengan laporan negeri/koperasi, semakan manual dan automatik, serta pengesahan oleh QA/UAT.

- Semak kelengkapan data (tiada rekod tertinggal).
- Pastikan tiada pendua (berdasarkan ID/rujukan unik).
- Semak integriti hubungan (cth: setiap Homestay mesti berkait dengan satu negeri/kluster).
- Audit log setiap proses import & kesilapan.
- Ujian laporan selepas migrasi untuk semakan data.

### 4.4 Latihan & Dokumentasi

- Latih pentadbir data untuk menggunakan modul import dan melakukan validasi asas.
- Sediakan dokumentasi langkah migrasi, templat Excel, dan panduan troubleshooting.

---

## 5. Pengurusan Risiko & Mitigasi (Risk Management)

### 5.1 Matriks Risiko & Pemilik (Risk Matrix & Ownership)

| Risiko | Kebarangkalian (Probability) | Impak (Impact) | Skor Risiko (Risk Score) | Mitigasi (Mitigation) | Kontingensi/Fallback | Pemilik (Owner) |
|--------|------------------------------|----------------|-------------------------|-----------------------|---------------------|-----------------|
| Data tidak konsisten/format salah | Sederhana | Sederhana | S | Validasi awal & templat Excel piawai | Manual correction, re-import | Data Steward |
| Kehilangan data semasa migrasi | Rendah | Tinggi | M | Sandaran sebelum migrasi, import berperingkat | Restore backup, retry | DevOps |
| Duplikasi rekod | Sederhana | Sederhana | S | Algoritma semakan pendua & ID unik | Remove duplicates, re-validate | Pembangun |
| Data tidak lengkap | Rendah | Sederhana | R | Penyelarasan manual & semakan silang | Manual entry, escalate | Pentadbir Data |
| Ralat hubungan data | Rendah | Tinggi | M | Validasi integriti hubungan (foreign key) | Fix mapping, re-run ETL | QA |
| Kegagalan sambungan/server | Rendah | Tinggi | M | Failover server, retry automation | Switch to backup, retry | DevOps |
| Ralat format besar/timeout | Sederhana | Sederhana | S | Sandbox testing, batch import | Split files, increase timeout | Pembangun |
| Gangguan operasi/akses | Rendah | Sederhana | R | Komunikasi proaktif, window migrasi | Reschedule, notify users | PM |

**Penjelasan:**

- Skor Risiko: S = Sederhana (Medium), M = Major, R = Rendah (Low)
- Setiap risiko dipantau oleh pemilik yang ditetapkan. Tindakan mitigasi dan kontingensi mesti didokumenkan dalam laporan migrasi.

### 5.2 Proses Pengurusan Risiko (Risk Management Process)

- **Pengenalpastian Risiko:** Risiko dikenal pasti semasa perancangan dan dikemas kini sepanjang projek.
- **Penilaian Risiko:** Setiap risiko dinilai dari segi kebarangkalian dan impak.
- **Mitigasi:** Langkah pencegahan diambil untuk mengurangkan kemungkinan atau impak risiko.
- **Pemantauan:** Risiko dipantau secara berkala dalam mesyuarat projek dan semakan status.
- **Pelaporan:** Semua insiden dan tindakan mitigasi didokumenkan dalam log risiko projek.

---

## 6. Penilaian Pasca Migrasi (Post-Migration Review)

### 6.1 Semakan Pasca Migrasi (Post-Migration Assessment)

- **Tempoh Pemerhatian:** 2 minggu selepas Go-Live.
- **Pemantauan:** Pantau ralat, data susulan, dan prestasi sistem setiap hari.
- **Audit Data:** Audit silang dengan laporan negeri/koperasi, semakan manual dan automatik, serta pengesahan oleh QA/UAT.
- **Laporan Go-Live:** Sediakan laporan readiness, pengesahan QA/UAT, dan kelulusan rasmi sebelum sistem digunakan sepenuhnya.
- **Maklum Balas Pengguna:** Kumpul maklum balas pengguna, selesaikan isu tertunggak, dan kemaskini dokumentasi jika perlu.
- **Penutupan:** Dokumen sign-off akhir diluluskan oleh Ketua Bahagian BPM MOTAC.

### 6.2 Senarai Semak Penilaian (Review Checklist)

| Semakan (Review Item) | Kaedah (Method) | Status |
|----------------------|-----------------|--------|
| Semua data dimigrasi | SQL count, Excel diff |  |
| Tiada kehilangan data | Audit log, backup check |  |
| Tiada pendua | Uniqueness check |  |
| Integriti hubungan | FK check, orphan detection |  |
| Validasi laporan | Manual & automasi |  |
| Prestasi sistem | Monitoring dashboard |  |
| Maklum balas pengguna | Survey, interview |  |
| Dokumentasi dikemas kini | Checklist, peer review |  |
| Penutupan rasmi | Sign-off BPM |  |

**Nota:** Semua semakan mesti didokumenkan dan diluluskan sebelum projek migrasi dianggap selesai.

---

### 6A. Pemantauan Pasca Migrasi & Penutupan (Post-Migration Monitoring & Closure)

- Tetingkap pemerhatian: 2 minggu selepas Go-Live; pemantauan ralat/import susulan harian.
- Aliran pembetulan data: tiket dilog ke tracker → semakan Data Steward → pelaksanaan pembetulan → audit.
- Penutupan: dokumen sign-off akhir diluluskan oleh Ketua Bahagian BPM MOTAC.

## 7. Audit & Pematuhan (Audit & Compliance)

- Proses audit dalaman: semakan log import, laporan validasi, skrip verifikasi (SQL, diff).
- Bukti audit: log ETL, laporan QA, borang sign-off Go-Live.
- Tempoh retensi: minimum 12 bulan untuk log audit kritikal; 90 hari untuk log operasional.

---

## 8. Kawalan Perubahan & Versi (Change Control & Versioning)

- Versi skrip migrasi dan templat Excel dijejak dalam VCS (git tags/releases).
- Perubahan pemetaan data didokumenkan dalam D06 dan memerlukan kelulusan Arkitek Sistem & Data Steward.
- Semakan impak perubahan mesti disertakan dalam PR dengan senarai semak risiko.

---

## 9. Lampiran (Appendices)

### 9.1 Contoh Templat Excel Standard (Sample Excel Template)

| id | nama_homestay | negeri | koperasi | kapasiti | ... |
|----|---------------|--------|----------|----------|-----|
| 1  | Seri Indah    | JOHOR  | KOPJORA  | 20       | ... |

### 9.2 Senarai Kod Negeri/Koperasi (Official State/Cooperative Codes)

| Kod Negeri | Nama Negeri |
|------------|-------------|
| JOHOR      | Johor       |
| KEDAH      | Kedah       |
| ...        | ...         |

### 9.3 Contoh Laporan Log Migrasi (Migration Log Example)

| Timestamp           | Status         | Rekod Berjaya | Ralat | Nota           |
|---------------------|---------------|---------------|-------|----------------|
| 2025-10-11 10:00:00 | Import bermula | 0             | 0     | -              |
| 2025-10-11 12:00:00 | 50% selesai    | 50,000        | 2     | Semak ralat    |
| 2025-10-11 14:00:00 | Selesai        | 100,000       | 2     | Sahkan data    |

---

## 8. Jadual Migrasi

| Aktiviti                | Tempoh           |
|-------------------------|------------------|
| Persediaan data & templat | 1 minggu       |
| Ekstrak & pembersihan     | 1 minggu       |
| Transformasi & pemetaan   | 1 minggu       |
| Import & validasi         | 2 minggu       |
| Ujian & audit akhir       | 1 minggu       |
| **JUMLAH**               | **6 minggu**    |

---

## 9. Penutup

Migrasi data adalah kritikal untuk memastikan kelancaran operasi sistem baharu Homestay Malaysia. Semua pihak perlu memberi kerjasama dalam penyediaan dan pengesahan data, serta mematuhi piawaian migrasi yang ditetapkan supaya integriti dan keselamatan data sentiasa terjaga.

---

## 10. Audit & Pematuhan (Audit & Compliance)

- Proses audit dalaman: semakan log import, laporan validasi, skrip verifikasi (SQL, diff).  
- Bukti audit: log ETL, laporan QA, borang sign-off Go-Live.  
- Tempoh retensi: minimum 12 bulan untuk log audit kritikal; 90 hari untuk log operasional.

---

## 10A. Kawalan Perubahan & Versi (Change Control & Versioning)

- Versi skrip migrasi dan templat Excel dijejak dalam VCS (git tags/releases).  
- Perubahan pemetaan data didokumenkan dalam D06 dan memerlukan kelulusan Arkitek Sistem & Data Steward.  
- Semakan impak perubahan mesti disertakan dalam PR dengan senarai semak risiko.
