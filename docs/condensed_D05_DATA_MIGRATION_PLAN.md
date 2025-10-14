# Ringkasan Pelan Migrasi Data (Data Migration Plan - DMP)

**Sistem:** Sistem Pengurusan & Analitik Homestay Malaysia  
**Pemilik:** MOTAC, Tourism Malaysia  
**Tarikh:** 11 Oktober 2025  
**Versi:** 1.0

---

## 1. Tujuan & Skop

- Menyediakan pelan operasi migrasi data dari pelbagai sumber (Excel, DB lama, manual) ke sistem Homestay Malaysia.
- Sasaran: Data profil, kapasiti, lokasi, koperasi, prestasi bulanan/tahunan semua Homestay berdaftar seluruh negara.

---

## 2. Prinsip & Objektif Migrasi

- **Prinsip:** Ketepatan, keselamatan, ketelusan, auditabiliti, pematuhan piawaian (ISO/IEC 25024, PDPA).
- **Objektif:** Migrasi lancar tanpa kehilangan, kerosakan, atau duplikasi data; operasi sistem tidak terganggu; data pasca-migrasi sedia audit.

---

## 3. Strategi Migrasi

- **Pendekatan:**  
  - *Big bang* (sekali gus) jika <100,000 rekod & downtime dibenarkan.  
  - *Incremental* (berperingkat) jika data besar/risk tinggi.
- **Fallback/Rollback:** Rollback ke backup terakhir jika migrasi gagal; semua operasi didahului dengan sandaran penuh.
- **Dry Run:** Ujian migrasi percubaan (subset data) sebelum migrasi sebenar.

---

## 4. Peranan & Tanggungjawab

| Aktiviti             | Pentadbir Data | Pembangun | QA/UAT | Negeri/Koperasi |
|----------------------|:--------------:|:---------:|:------:|:--------------:|
| Sumber data          |   A/R          |    C      |   I    |     C/R        |
| ETL & import         |   C            |   A/R     |   C    |     I          |
| Validasi & audit     |   C            |    C      |  A/R   |     I          |
| Backup & rollback    |   A/R          |    C      |   I    |     I          |
| Ujian dry run        |   C            |   A/R     |   C    |     I          |
| Komunikasi status    |   A/R          |    C      |   I    |     C/R        |

### A = Accountable, R = Responsible, C = Consulted, I = Informed*

---

## 5. Proses ETL (Extract, Transform, Load)

1. **Extract:** Ekstrak semua data Homestay, koperasi, prestasi dari Excel/CSV/DB lama.
2. **Transform:** Normalisasi format (rujuk templat rasmi), validasi kod negeri/koperasi, pembersihan & pemetaan struktur baru.
3. **Load:** Import berperingkat ke sistem baru menggunakan modul Laravel-Excel, audit log setiap operasi.
4. **Validasi:** Banding jumlah rekod, integriti hubungan (FK), tiada pendua, semakan ralat, audit data.

---

## 6. Validasi & Jaminan Kualiti

- KPI: Kelengkapan ≥99%, kehilangan data = 0%, kadar penolakan <1%, import 10k rekod < 5 min.
- Profiling pra-migrasi (nilai kosong, kod negeri/koperasi), cleansing, laporan ralat.
- Validasi pasca-load: SQL count, FK check, dashboard aggregate, audit laporan.

---

## 7. Keselamatan & Sandaran

- Akses storan migrasi berasaskan peranan; data dan log disulitkan (AES-256, TLS 1.3).
- Backup penuh sebelum migrasi, backup incremental harian, retention ≥30 hari selepas migrasi.
- Semua data sensitif dan sementara dipadam selepas selesai.

---

## 8. Pengurusan Risiko

- Risiko utama: data tidak konsisten, kehilangan data, duplikasi, ralat hubungan, kegagalan sambungan/server.
- Mitigasi: validasi awal, backup, batch import, retry, komunikasi proaktif.
- Setiap risiko dipantau dan tindakan kontingensi didokumenkan.

---

## 9. Ujian Migrasi & Go-Live

- Dry run di staging; import sebenar hanya selepas lulus ujian & validasi.
- Post-load: Audit QA/UAT, laporan integriti & konsistensi.
- Go-live selepas sign-off dan semua KPI dipenuhi.

---

## 10. Komunikasi & Latihan

- Notifikasi status migrasi melalui e-mel, WhatsApp, sistem notifikasi dalaman.
- Latihan pentadbir: penggunaan modul import, validasi & troubleshooting.
- Dokumentasi: templat, panduan, log, checklist audit.

---

## 11. Kawalan Perubahan & Versi

- Skrip migrasi dan templat Excel dijejak dalam VCS (git tag/relase).
- Semua perubahan pemetaan/transformasi mesti didokumenkan & diluluskan.

---

## 12. Penilaian & Penutupan

- Pemerhatian 2 minggu pasca-migrasi; audit silang, semak kelengkapan, tiada pendua, integriti hubungan.
- Sign-off akhir oleh Ketua Bahagian BPM MOTAC selepas semua semakan selesai.

---

## 13. Rujukan

- D01 (SDP), D03 (SRS), D04 (SDD), D06 (Spesifikasi Migrasi), D09 (Database), D10 (Kod Sumber)

---

## Akhir Ringkasan DMP
