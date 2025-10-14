# Pelan Pembangunan Sistem (SDP) - Ringkasan

**Sistem:** Sistem Pengurusan & Analitik Homestay Malaysia  
**Pemilik:** MOTAC, Tourism Malaysia  
**Tarikh:** 11 Oktober 2025

---

## 1. Ringkasan Eksekutif

Satu platform tersentralisasi untuk pengurusan data Homestay kebangsaan, analitik, dan pelaporan yang menggantikan proses manual yang berpecah. Projek dijangka mengambil masa 12 minggu dengan pasukan dalaman dan vendor, menyokong transformasi digital untuk pelancongan luar bandar.

---

## 2. Matlamat & Objektif

- **Matlamat:** Mendigitalkan dan menyentralisasi pengurusan Homestay, mengautomasikan pelaporan, dan memudahkan keputusan berdasarkan analitik.
- **Objektif:**  
  - 100% pelaporan negeri/koperasi melalui sistem baru menjelang 2026  
  - Pemprosesan laporan bulanan < 3 hari bekerja  
  - Data yang disahkan dan distandardkan  
  - Papan pemuka / laporan pelbagai peringkat (kebangsaan/negeri/koperasi/individu)
- **KPI:**  
  - ≥99.5% masa operasi  
  - ≥98% ketepatan import data  
  - Import 10,000 baris Excel ≤ 3 min  
  - Masa tindak balas papan pemuka ≤ 2s

---

## 3. Justifikasi

- Menghapuskan proses manual yang berpecah
- Mengautomasikan integrasi data, pengesahan, dan pelaporan
- Mengurangkan ralat manusia dan beban kerja
- Meningkatkan auditan, pemantauan, dan pematuhan

---

## 4. Kebergantungan & Prasyarat

- Akses ke pangkalan data Homestay MOTAC sedia ada
- Templat import Excel rasmi
- Spesifikasi API untuk integrasi
- Kelulusan bajet Projek & ICT
- Pelayan dev/staging/prod (awan/di premis)
- PHP 8.3+, MySQL/MariaDB, Composer, NPM, Git

---

## 5. Anggaran Sumber & Kos

| Peranan            | Qty | Minggu | Kos (RM) |
|--------------------|-----|--------|----------|
| Pengurus Projek    | 1   | 12     | 24,000   |
| Pembangun Backend  | 1   | 12     | 22,000   |
| Pembangun Frontend | 1   | 12     | 20,000   |
| QA/Tester          | 1   | 8      | 12,000   |
| DevOps/Infra       | 1   | 6      | 10,000   |
| Infrastruktur Awan | -   | 12     | 8,000    |
| Alat/Lelebih       | -   | -      | 3,000    |
| **JUMLAH**         |     |        | **99,000**|

---

## 6. Pengurusan Perubahan

- Semua perubahan melalui borang Permintaan Perubahan (CR) rasmi
- Penilaian impak oleh PM/Pembangun Utama
- Kelulusan oleh Pemilik Sistem/MOTAC
- Kemas kini versi/changelog; maklumkan pihak berkepentingan

---

## 7. Strategi Komunikasi

- Dalaman: Teams, WhatsApp, emel MOTAC
- Kemajuan: Laporan mingguan, sprint setiap dua minggu, kemas kini pengurusan bulanan
- Isu/Kecemasan: Emel/telefon segera kepada PM/Pemilik
- Dokumen: Dikongsi melalui Google Drive/SharePoint & GitHub Wiki

---

## 8. Pemantauan & Pelaporan

- KPI: Penyelesaian ciri, halaju sprint, kadar pepijat, status pencapaian
- Perjumpaan harian, ulasan sprint setiap dua minggu, laporan mingguan, laporan bulanan
- Alat: Jira/Trello, Google Sheets, GitHub Actions

---

## 9. Infrastruktur

- **Hosting:** Awan/di premis (AWS, Azure, DigitalOcean)
- **Persekitaran:**  
  - Dev: VM/PC, PHP 8.3+, MySQL/MariaDB, Node.js  
  - Staging: Cloud VM, replika data, UAT terhad  
  - Prod: Cloud VM, sandaran harian, SSL, pemantauan 24/7
- **Spesifikasi Minimum (Prod):** 4 teras CPU, 8GB RAM, 200GB SSD, ≥100Mbps
- **Perisian:** Apache/Nginx, Laravel 12+, MySQL 8/MariaDB 10+, Redis, Git

---

## 10. Latihan & Pemindahan Pengetahuan

- Minggu 11–12: Latihan untuk pentadbir, pengguna negeri/koperasi, pasukan teknikal
- Manual pengguna, tutorial video, sesi amali
- Serahan teknikal: kod sumber, dokumentasi, konfigurasi
- Sokongan pasca-latihan selama 2 minggu

---

## 11. Pemulihan Bencana & Sandaran

- RTO ≤ 4 jam, RPO ≤ 24 jam
- Sandaran automatik harian (luar tapak/awan)
- Ujian pemulihan bulanan
- SOP yang didokumenkan; log kejadian

---

## 12. Kriteria Kejayaan

- Semua modul teras beroperasi tanpa ralat kritikal
- ≥98% lulus untuk ujian auto/manual (unit/integrasi/UAT)
- Semua data Homestay negeri dipindahkan dan disahkan
- Laporan/papan pemuka boleh diakses oleh semua pengguna sasaran
- UAT ditandatangani oleh MOTAC/Tourism Malaysia
- Dokumentasi teknikal & pengguna lengkap diserahkan

---

## 13. Peta Jalan Penambahbaikan Masa Depan

- **v2.0:** Analitik masa nyata, papan pemuka AI, notifikasi pintar
- **v3.0:** Integrasi negeri, API terbuka, pelaporan dinamik lanjutan
- **Berterusan:** Penambahbaikan UX, pengembangan modul analitik, integrasi dengan sistem pelancongan kebangsaan

---

## 14. Glosari & Rujukan

- **MOTAC:** Ministry of Tourism, Arts and Culture Malaysia
- **Homestay:** Penginapan berdaftar di bawah MOTAC
- **KPI:** Petunjuk Prestasi Utama
- **DR:** Pemulihan Bencana
- **CI/CD:** Integrasi / Penyampaian Berterusan
- **API:** Antara Muka Pengaturcaraan Aplikasi

**Rujukan:**  

- Manual BPM MOTAC, IEEE 1058, SRS, SDD, Spesifikasi Pemindahan Data, Dokumen Pangkalan Data, Garis Panduan ICT MAMPU

---

## Tamat - Ringkasan SDP
