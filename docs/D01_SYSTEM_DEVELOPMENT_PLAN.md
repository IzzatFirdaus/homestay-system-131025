
# Pelan Pembangunan Sistem (System Development Plan — SDP)

**Sistem:** Sistem Pengurusan & Analitik Homestay Malaysia**  
**Pemilik Sistem:** MOTAC, Tourism Malaysia  
**Tarikh:** 11 Oktober 2025
**Versi Dokumen:** 1.2.0

---

## 0. Ringkasan Eksekutif | Executive Summary

Sistem Pengurusan & Analitik Homestay Malaysia ialah inisiatif digitalisasi nasional oleh MOTAC dan Tourism Malaysia untuk memodenkan pengurusan, pemantauan, dan analitik industri Homestay. Projek ini bertujuan untuk mewujudkan platform berpusat yang menyokong pengumpulan, integrasi, dan pelaporan data Homestay seluruh negara secara automatik dan selamat.

Manfaat utama termasuk peningkatan kecekapan operasi, ketelusan data, dan pembuatan keputusan strategik berasaskan analitik. Projek ini dijangka berlangsung selama 12 minggu, dikendalikan oleh pasukan pembangunan dalaman dan vendor teknologi terpilih, dengan bajet dalam kategori ICT kerajaan. Hasil projek akan menyokong transformasi digital sektor pelancongan desa dan memperkasakan pentadbiran negeri serta koperasi Homestay.

---

## 1. Matlamat & Objektif Projek | Project Goals & Objectives

**Matlamat (Goals):**

- Menyokong transformasi digital pengurusan Homestay Malaysia di bawah inisiatif MOTAC.
- Memusatkan data, automasi pelaporan, dan mempertingkatkan kecekapan operasi pelancongan desa.
- Menyediakan asas data untuk analitik, pelaporan, dan pembuatan keputusan strategik.

**Objektif (Objectives):**

- 100% laporan negeri dan koperasi dimuat naik melalui sistem baharu menjelang 2026.
- Masa pemprosesan laporan bulanan dikurangkan kepada <3 hari kerja.
- Semua data Homestay disahkan dan diseragamkan mengikut piawaian MOTAC.
- Dashboard dan laporan tersedia untuk semua peringkat (nasional, negeri, koperasi, individu).

**Petunjuk Prestasi Utama (KPIs):**

- Uptime sistem ≥ 99.5% sepanjang tahun.
- Ketepatan data import ≥ 98%.
- Masa import data Excel ≤ 3 minit untuk 10,000 baris.
- Masa respons dashboard utama ≤ 2 saat.
- Pematuhan Aksesibiliti (WCAG 2.1 AA): Audit aksesibiliti automatik dan manual mesti menunjukkan pematuhan untuk aliran pengguna teras (dashboard, borang import, laporan), dengan pengesahan bulanan.
- Pematuhan Aksesibiliti (WCAG 2.1 AA): Audit aksesibiliti automatik dan manual mesti menunjukkan pematuhan untuk aliran pengguna teras (dashboard, borang import, laporan), dengan pengesahan bulanan.

### Tambahan (Seksyen 1 — KPI)

- KPI Kebolehcapaian: Sistem mesti mencapai pematuhan `WCAG 2.1 Level AA` untuk aliran pengguna teras dengan laporan automatik (`axe-core`) dan verifikasi manual tanpa pelanggaran kritikal pada setiap pelepasan (release).

---

## 2. Justifikasi & Rasional Pembangunan | Justification & Development Rationale

Sistem ini dibangunkan untuk menangani kekangan sistem sedia ada yang berasaskan manual, berpecah, dan tidak bersepadu. Ketiadaan platform digital berpusat menyebabkan data Homestay sukar dipantau, analitik prestasi tidak menyeluruh, dan pelaporan lambat serta tidak seragam.

Dengan sistem baharu, MOTAC dan Tourism Malaysia akan mendapat manfaat seperti:

- Integrasi data Homestay seluruh negara secara automatik.
- Analitik prestasi dan pelaporan yang lebih pantas, tepat, dan telus.
- Pengurangan beban kerja manual dan risiko ralat manusia.
- Peningkatan keupayaan pemantauan, audit, dan pematuhan piawaian kerajaan.

---

## 3. Kebergantungan & Pra-syarat Projek | Dependencies & Prerequisites

Sebelum pembangunan bermula, projek ini memerlukan:

- Akses kepada pangkalan data Homestay MOTAC sedia ada.
- Template Excel rasmi untuk import data.
- Spesifikasi API integrasi (MOTAC, Tourism Malaysia, sistem analitik pihak ketiga).
- Kelulusan pelan projek dan bajet ICT oleh MOTAC.
- Peruntukan pelayan pembangunan, staging, dan production (cloud/on-premise).
- Perisian: PHP 8.3+, MySQL/MariaDB, Composer, NPM, Git, VS Code.

---

## 4. Anggaran Sumber & Kos | Resource & Cost Estimation

| Sumber/Resource         | Kuantiti/Quantity | Tempoh/Duration | Kos Anggaran (RM) |
|------------------------|-------------------|-----------------|-------------------|
| Project Manager        | 1                 | 12 minggu        | 24,000            |
| Backend Developer      | 1                 | 12 minggu        | 22,000            |
| Frontend Developer     | 1                 | 12 minggu        | 20,000            |
| QA/Tester              | 1                 | 8 minggu         | 12,000            |
| DevOps/Infra           | 1                 | 6 minggu         | 10,000            |
| Infrastruktur Cloud    | -                 | 12 minggu        | 8,000             |
| Lain-lain (tools, dsb) | -                 | -                | 3,000             |
| **JUMLAH**             |                   |                  | **99,000**        |

*Nota: Anggaran kos adalah indikatif dan tertakluk kepada kelulusan bajet ICT MOTAC. Sumber tambahan mungkin diperlukan untuk penyelenggaraan selepas pelancaran.*

---

## 5. Pengurusan Perubahan | Change Management Plan

Semua perubahan skop, keperluan, atau ciri sistem mesti melalui proses berikut:

1. Permintaan perubahan didokumenkan dalam borang Change Request (CR) rasmi.
2. Penilaian impak oleh Project Manager dan Lead Developer.
3. Kelulusan oleh System Owner (MOTAC) dan, jika perlu, Jawatankuasa ICT.
4. Versi dokumen dan kod dikemas kini, dengan rekod perubahan dalam changelog.
5. Semua perubahan utama dimaklumkan kepada semua pihak berkepentingan melalui e-mel dan mesyuarat projek.

---

## 6. Strategi Komunikasi | Communication Strategy

Komunikasi projek akan menggunakan saluran berikut:

- **Saluran Dalaman:** Microsoft Teams, WhatsApp, e-mel rasmi MOTAC.
- **Laporan Kemajuan:**
  - Laporan mingguan kepada Project Manager dan System Owner.
  - Sprint review setiap dua minggu bersama semua pihak berkepentingan.
  - Laporan bulanan kepada pengurusan MOTAC.
- **Notifikasi Isu/Kecemasan:** E-mel segera dan panggilan telefon kepada Project Manager dan System Owner.
- **Dokumentasi:** Semua dokumen projek dikongsi melalui Google Drive/SharePoint dan GitHub Wiki.

---

## 7. Pelan Pemantauan & Pelaporan Kemajuan | Monitoring & Progress Reporting Plan

Kemajuan projek dipantau menggunakan petunjuk berikut:

- **KPI Projek:** Kadar siap ciri (feature completion rate), kelajuan sprint (velocity), kadar penemuan & pembetulan pepijat, status milestone.
- **Struktur Pelaporan:**
  - Standup harian (5-10 minit) untuk pasukan pembangunan.
  - Sprint review dan demo setiap dua minggu.
  - Laporan kemajuan mingguan kepada pengurusan projek.
  - Laporan bulanan kepada pengurusan MOTAC.
- **Alat Pemantauan:** Jira/Trello untuk tracking, Google Sheets untuk dashboard kemajuan, GitHub Actions untuk status CI/CD.

---

## 8. Keperluan Infrastruktur | Infrastructure Requirements

Sistem memerlukan infrastruktur berikut untuk operasi stabil dan selamat:

- **Hosting:** Cloud (AWS, Azure, DigitalOcean) atau on-premise (VM, bare metal).
- **Persekitaran:**
  - Development: VM/PC, PHP 8.3+, MySQL/MariaDB, Node.js, Composer, NPM.
  - Staging: Cloud VM, replikasi data, akses terhad untuk UAT.
  - Production: Cloud VM, backup harian, firewall, SSL, pemantauan 24/7.
- **Spesifikasi Minimum Production:**
  - CPU: 4 core
  - RAM: 8GB
  - Storage: 200GB SSD
  - Bandwidth: ≥ 100Mbps
- **Perisian:** Apache/Nginx, Laravel 12+, MySQL 8/MariaDB 10+, Redis (cache/queue), Git, VS Code.

---

## 9. Pelan Latihan & Pemindahan Pengetahuan | Training & Knowledge Transfer Plan

Latihan dan pemindahan pengetahuan akan dilaksanakan seperti berikut:

- **Jadual:** Minggu ke-11 hingga ke-12 projek.
- **Sasaran:** Admin MOTAC, pengguna negeri/koperasi, pasukan teknikal.
- **Kandungan:**
  - Manual pengguna (PDF/online), video tutorial, sesi latihan hands-on.
  - Latihan penggunaan dashboard, import data, pelaporan, dan pengurusan pengguna.
  - Latihan teknikal untuk DevOps (deployment, backup, pemantauan).
- **Pemindahan Pengetahuan:**
  - Handover kod sumber, dokumentasi teknikal, dan konfigurasi ke pasukan MOTAC.
  - Sesi Q&A dan sokongan pasca-latihan selama 2 minggu.

---

## 10. Strategi Pemulihan & Sandaran | Disaster Recovery & Backup Strategy

Strategi pemulihan dan sandaran sistem adalah seperti berikut:

- **RTO (Recovery Time Objective):** ≤ 4 jam.
- **RPO (Recovery Point Objective):** ≤ 24 jam.
- **Kekerapan Sandaran:** Backup harian automatik ke lokasi berasingan (cloud/offsite).
- **Ujian Pemulihan:** Ujian restore data dijalankan sekurang-kurangnya sebulan sekali.
- **Prosedur:**
  - Restore boleh dilakukan oleh DevOps/Infra Admin dengan SOP yang didokumenkan.
  - Semua insiden dan pemulihan direkodkan dalam log insiden.

---

## 11. Kriteria Penilaian Kejayaan Projek | Project Success Criteria

Projek dianggap berjaya sekiranya:

- Semua modul utama (import, dashboard, pelaporan, pengurusan pengguna) beroperasi tanpa ralat kritikal.
- Semua ujian automatik dan manual (unit, integrasi, UAT) lulus ≥ 98%.
- Data Homestay seluruh negeri berjaya dimigrasi dan disahkan.
- Laporan dan dashboard boleh diakses oleh semua peranan pengguna sasaran.
- UAT dan sign-off rasmi oleh MOTAC dan Tourism Malaysia diperoleh.
- Dokumentasi lengkap (teknikal & pengguna) diserahkan.
- Sistem lulus audit aksesibiliti WCAG 2.1 Level AA untuk aliran pengguna utama — termasuk pemeriksaan automatik (e.g., axe-core) dengan tiada pelanggaran kritikal dan verifikasi manual oleh pasukan QA sebelum penerimaan akhir (MOTAC sign-off).

---

## 12. Rancangan Peningkatan Masa Depan | Future Improvement Roadmap

Selepas pelancaran versi 1.0, sistem akan terus dipertingkatkan mengikut keperluan MOTAC dan pengguna:

- **v2.0:** Integrasi analitik masa nyata, dashboard AI-based forecasting, automasi notifikasi pintar.
- **v3.0:** Modul integrasi pelancongan negeri, API terbuka untuk pihak ketiga, pelaporan dinamik lanjutan.
- **Penambahbaikan Berterusan:** Penambahbaikan UX, penambahan modul analitik, integrasi sistem pelancongan nasional.

Semua penambahbaikan akan didokumenkan dalam roadmap dan changelog projek.

---

## 13. Glosari & Rujukan | Glossary & References

### Glosari | Glossary

| Istilah (BM) | Term (EN) | Definisi / Definition |
|--------------|-----------|----------------------|
| MOTAC        | MOTAC     | Kementerian Pelancongan, Seni dan Budaya Malaysia / Ministry of Tourism, Arts and Culture Malaysia |
| Homestay     | Homestay  | Penginapan berdaftar di bawah program rasmi MOTAC / Registered accommodation under MOTAC official program |
| KPI          | KPI       | Petunjuk Prestasi Utama / Key Performance Indicator |
| DR           | DR        | Pemulihan Bencana / Disaster Recovery |
| CI/CD        | CI/CD     | Integrasi Berterusan / Continuous Integration & Deployment |
| API          | API       | Antara Muka Pengaturcaraan Aplikasi / Application Programming Interface |

### Rujukan | References

1. MOTAC Business Process Manual (BPM)
2. IEEE 1058: Standard for Software Project Management Plans
3. D02_BUSINESS_REQUIREMENT_SPECIFICATIONS.md
4. D03_SYSTEM_REQUIREMENT_SPECIFICATIONS.md
5. D04_SYSTEM_DESIGN_DOCUMENT.md
6. D10_SOURCE_CODE_DOCUMENTATION.md
7. Panduan Pelaksanaan Projek ICT Sektor Awam (MAMPU)
8. Any other referenced documents as required by MOTAC

---

### Akhir Dokumen
