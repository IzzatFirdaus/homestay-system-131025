# Spesifikasi Keperluan Perisian (Ringkasan SRS)

**Sistem:** Sistem Pengurusan & Analitik Homestay Malaysia  
**Pemilik:** MOTAC, Tourism Malaysia  
**Tarikh:** 15 Oktober 2025  
**Versi:** 1.1

---

## 1. Ringkasan Eksekutif

Dokumen ini merangkumi keperluan perisian utama bagi sistem pengurusan Homestay Malaysia. Sistem ini bertujuan menjadi pusat data nasional, menyokong operasi harian, pemantauan prestasi, pelaporan strategik, dan integrasi dengan sistem luaran.

---

## 2. Skop & Objektif

- Pengurusan data Homestay (nasional, negeri, koperasi)
- Import automatik data (Excel), validasi & integrasi ke DB
- Dashboard analitik, laporan, eksport data (Excel/PDF)
- Akses berasaskan peranan (admin, penganalisis, pemerhati)
- Integrasi API untuk sinkronisasi data luaran

---

## 3. Pengguna & Persekitaran

- **Pengguna:** Admin, penganalisis, pemerhati
- **Persekitaran:** Web (Chrome, Edge, Firefox), cloud/on-premise, PHP 8.2+, MySQL/MariaDB

---

## 4. Fungsi Teras Sistem

- Import & validasi fail Excel (Homestay, prestasi, kapasiti)
- Dashboard nasional/negeri/koperasi/Homestay
- Carian & profil Homestay, perbandingan prestasi
- Pengurusan pengguna & kawalan akses peranan (RBAC)
- Penjanaan & eksport laporan automatik/manual
- Audit trail, logging, notifikasi status import/laporan
- API untuk integrasi luaran & automasi

---

## 5. Keperluan Fungsian Utama

| ID         | Fungsi                        | Kriteria Utama                            |
|------------|------------------------------|-------------------------------------------|
| SRS-FN-01  | Import Data Excel            | ≥10k baris ≤2 min, validasi automatik     |
| SRS-FN-02  | Validasi Data Automatik      | ≥95% ketepatan, log ralat terperinci      |
| SRS-FN-03  | Dashboard Analitik           | KPI utama, drill-down, masa muat <2s      |
| SRS-FN-04  | Visualisasi Interaktif       | Carta dinamik, eksport PNG/PDF            |
| SRS-FN-05  | Laporan Automatik            | Penjadualan, hantar sebelum 6AM           |
| SRS-FN-06  | Eksport Data & Laporan       | CSV/XLSX/PDF, watermark, ≤60s/50k baris   |
| SRS-FN-07  | Kawalan Akses Peranan (RBAC) | Tiada akses lintas-negeri tanpa izin      |
| SRS-FN-08  | Sesi & Keselamatan           | Tamat 30 min tidak aktif, brute-force halang|
| SRS-FN-09  | Notifikasi Sistem            | E-mel/in-app ≤1 min selepas event         |
| SRS-FN-10  | Penjadualan & Automasi       | Cron/queue, log pelaksanaan               |

---

## 6. Keperluan Bukan Fungsian

- **Prestasi:** Import ≥10,000 rekod ≤2 minit, dashboard <2s
- **Kebolehpercayaan:** Uptime ≥99.5%, backup harian, MTTR <2 jam
- **Keselamatan:** RBAC, enkripsi data (AES-256, bcrypt), HTTPS (TLS 1.3), audit log penuh
- **Kebolehselenggaraan:** Kod modular (Laravel), CI/CD, dokumentasi lengkap
- **Kebolehportan:** Deploy cloud atau on-premise, sokong Docker
- **Kebolehgunaan:** Sistem mesti mematuhi **`Web Content Accessibility Guidelines (WCAG) 2.1 Level AA`** untuk memastikan akses inklusif. Keperluan utama termasuk:
  - **Navigasi Papan Kekunci Penuh (`Full Keyboard Navigability`)**: Semua fungsi mesti boleh diakses dan dioperasi menggunakan papan kekunci sahaja.
  - **Kontras Warna (`Color Contrast`)**: Nisbah kontras warna teks dan latar belakang mesti memenuhi minimum `4.5:1`.
  - **HTML Semantik & Atribut ARIA**: Penggunaan `semantic HTML` dan `ARIA attributes` yang betul untuk komponen interaktif bagi menyokong teknologi bantuan seperti pembaca skrin (`screen readers`).
  - **Teks Alternatif**: Semua imej dan visualisasi data bukan teks mesti mempunyai teks alternatif yang deskriptif.

---

## 7. Antara Muka & Integrasi

- **UI:** Responsive, Dashboard utama, modul import, laporan
- **API:** RESTful, versioned, autentikasi token/OAuth2, endpoint utama untuk import, dashboard, laporan
- **Integrasi:** MOTAC API, negeri/koperasi, Google Maps, notifikasi email/SMS

---

## 8. Data & Validasi

- **Struktur data:** Homestay, prestasi, koperasi, pengguna
- **Validasi:** Struktur fail, kod negeri/koperasi, nilai numerik, foreign key
- **Polisi retensi:** Log audit ≥12 bulan, data metrik kekal

---

## 9. Kriteria Penerimaan

- Import 10,000 rekod ≤2 min, laporan baris gagal jelas
- Dashboard utama muat <2s
- SLA uptime ≥99.5%
- Tiada kebocoran data pada UAT, semua peranan ikut polisi akses
- Laporan bulanan dijana & dihantar tepat masa
- ≥95% kes ujian kritikal lulus UAT
- Kriteria Penerimaan Kebolehcapaian: Sistem mesti lulus ujian kebolehcapaian automatik (menggunakan alat seperti `axe-core`) dengan sifar pelanggaran kritikal (`zero critical violations`) dan berjaya melepasi ujian manual untuk aliran pengguna utama (contoh: import data, navigasi dashboard).

---

## 10. Ujian & Jaminan Kualiti

- **Jenis ujian:** Unit, integrasi, sistem, UAT, regresi, **Ujian Kebolehcapaian (`Accessibility Testing`)**
- **Alat:** PHPUnit, Dusk, Postman, CI/CD automasi, `axe-core` untuk imbasan automatik
- **Liputan:** ≥80% untuk laluan kritikal
- **Ujian Kebolehcapaian (Accessibility Testing):** Jenis ujian rasmi termasuk gabungan ujian automatik (contoh: `axe-core` dalam CI), ujian papan kekunci (keyboard-only), dan semakan pembaca skrin (screen reader) pada senario UAT utama. Hasil ujian mesti disertakan dalam laporan UAT.

---

## 11. Rujukan & Lampiran

- Rujuk dokumen: SDP (D01), BRS (D02), SDD (D04), DBD (D09), DMP (D05), DMS (D06)
- Model data/ERD lengkap: D09_DATABASE_DOCUMENTATION.md

---

## Dokumen Ringkasan SRS Tamat
