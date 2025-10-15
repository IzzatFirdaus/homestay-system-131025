
# Ringkasan Keperluan Perniagaan (BRS) - Tersusun

**Sistem:** Sistem Pengurusan & Analitik Homestay Malaysia  
**Pemilik:** MOTAC, Tourism Malaysia  
**Tarikh:** 15 Oktober 2025  
**Versi:** 3.1

---

## 1. Ringkasan Eksekutif

Satu sistem kebangsaan tersentralisasi untuk memodenkan pengurusan Homestay, mengautomasikan penjanaan laporan, dan menyediakan analitik bagi MOTAC dan Tourism Malaysia. Matlamat utama: laporan lebih pantas, kualiti data lebih tinggi, dan sokongan keputusan strategik.

---

## 2. Skop & Objektif

**Skop:**

- Pengurusan lebih daripada 1,200 Homestay berdaftar dan 300+ koperasi
- Automasi laporan bulanan (import Excel, pengesahan)
- Papan pemuka analitik pelbagai peringkat (kebangsaan, negeri, koperasi, pengendali)
- Integrasi data dengan ekosistem pelancongan negara

**Objektif:**

- 100% pelaporan melalui sistem baru menjelang 2026
- Kitaran pelaporan bulanan < 3 hari
- Ketepatan data >95%
- Akses papan pemuka/laporan berdasarkan peranan

---

## 3. Pemegang Taruh

- **MOTAC (Ibu Pejabat/Negeri):** Pelaporan strategik dan operasi
- **Koperasi Homestay:** Input dan pengurusan data
- **Tourism Malaysia:** Analitik untuk tujuan promosi
- **Pengendali (Operators):** Akses dan paparan prestasi
- **IT/DevOps/Audit:** Sokongan, pematuhan dan jaminan kualiti

---

## 4. Nilai Perniagaan & Justifikasi

- Masa penyediaan laporan dipendekkan dari 3 minggu kepada 3 hari
- Ketepatan data meningkat dari 75% ke 95%+
- Menjimatkan lebih daripada 200 jam kerja tahunan untuk pelaporan
- Automasi 90% proses manual
- Menyokong inisiatif MyDIGITAL dan sasaran pelancongan negara

---

## 5. Dalam Skop / Di Luar Skop

**Dalam Skop:**

- Pengurusan data Homestay/koperasi/negeri
- Import data, pengesahan, dan log audit
- Papan pemuka interaktif, laporan, dan eksport data
- Pengurusan pengguna (RBAC) dan notifikasi

**Di Luar Skop:**

- Modul kewangan/perakaunan
- Tempahan pelancong / e-dagang
- Pengurusan daftar masuk harian / inventori

---

## 6. Keperluan Fungsi (Ringkasan)

| ID         | Keperluan                           | Keutamaan |
|------------|-------------------------------------|-----------|
| BRS-FN-01  | Import Data Homestay                | Tinggi    |
| BRS-FN-02  | Pengesahan Data Automatik           | Tinggi    |
| BRS-FN-03  | Papan Pemuka Analitik Berperingkat  | Tinggi    |
| BRS-FN-04  | Visualisasi Data Interaktif         | Sederhana |
| BRS-FN-05  | Penjanaan Laporan Automatik         | Tinggi    |
| BRS-FN-06  | Eksport Data & Laporan (Excel/PDF)  | Sederhana |
| BRS-FN-07  | Kawalan Akses Berdasarkan Peranan   | Tinggi    |
| BRS-FN-08  | Pengurusan Sesi & Keselamatan       | Tinggi    |
| BRS-FN-09  | Sistem Notifikasi                   | Sederhana |
| BRS-FN-10  | Penjadualan & Automasi              | Sederhana |

---

## 7. Keperluan Bukan Fungsi (Ringkasan)

- **Prestasi:** Import 10,000 rekod <5 min; papan pemuka dimuat <3s
- **Skalabiliti:** Menampung pertumbuhan data tahunan 20%; sedia untuk awan
- **Ketersediaan:** Ketersediaan 99.5%, RTO pemulihan bencana <4 jam
- **Keselamatan:** Penyulitan data semasa rehat (AES-256), semasa hantar (TLS 1.3), MFA untuk akaun kritikal, jejak audit, pematuhan PDPA
- **Kebolehgunaan:** Responsif, dwibahasa (BM/EN), antara muka mesra pengguna
- **Kebolehgunaan:** Responsif, dwibahasa (BM/EN), antara muka mesra pengguna; sistem mesti mematuhi `Web Content Accessibility Guidelines (WCAG) 2.1 Level AA` untuk memastikan akses inklusif untuk semua pengguna. Ini termasuk `semantic HTML`, `keyboard navigation`, kontras warna yang mematuhi piawaian, dan penggunaan `ARIA attributes` di komponen interaktif.
- **Kebolehgunaan:** Responsif, dwibahasa (BM/EN), antara muka mesra pengguna; pematuhan `WCAG 2.1 Level AA` untuk semua muka utama (dashboard, import, laporan) termasuk `semantic HTML`, `keyboard navigation`, kontras warna yang mematuhi piawaian, dan atribut `ARIA` yang sesuai.
- **Integrasi:** API RESTful, LDAP/SSO, export API, webhooks
- **Sokongan:** Meja bantuan 8AM-6PM, dokumentasi dalam talian, sistem tiket, latihan jarak jauh

---

## 8. Pelaporan & Analitik

- Laporan mengikut peringkat: kebangsaan, negeri, koperasi
- Metik utama: bilangan pelawat, hasil, kadar penghunian, kapasiti
- Eksport: Excel, PDF; visualisasi interaktif

---

## 9. Kriteria Kejayaan

- Laporan negeri/kebangsaan dijana secara automatik tanpa input manual
- Muat naik/pengesahan data oleh semua negeri selesai dalam masa 3 hari
- Ketepatan data ≥95%
- Semua pengguna dapat mengakses papan pemuka/laporan mengikut peranan
- UAT dan tandatangan rasmi oleh MOTAC
- UAT dan tandatangan rasmi oleh MOTAC
- Kriteria Penerimaan Kebolehcapaian: Sistem lulus ujian kebolehcapaian automatik dan manual yang mengesahkan pematuhan `WCAG 2.1 Level AA` sebelum `sign-off` perniagaan diberikan.
- Kriteria Penerimaan Kebolehcapaian: Sistem mesti lulus ujian kebolehcapaian automatik (`axe-core`) tanpa pelanggaran kritikal dan lulus semakan manual untuk laluan utama sebelum `sign-off`.

---

## 10. Pengurusan Perubahan & Latihan

- Pelaksanaan secara berperingkat: latihan, perintis (pilot), penerapan penuh
- Komunikasi perubahan: emel, webinar, sesi soal jawab
- Latihan praktikal dan sokongan untuk semua peringkat pengguna

---

## 11. Pematuhan & Keselamatan

- Mematuhi Polisi ICT Kerajaan (MyGOV) dan PDPA 2010
- Penahanan data: ≥7 tahun untuk tujuan audit
- Akses selamat mengikut peranan; log audit untuk semua aktiviti

---

## 12. Pengembangan Masa Depan

- Sokongan untuk kategori data baru (demografi, eko-pelancongan)
- Integrasi dengan sistem analitik kebangsaan, analitik ramalan
- API terbuka untuk pihak ketiga

---

## 13. Rujukan

- D01 Pelan Pembangunan Sistem (SDP)
- D03 Spesifikasi Keperluan Sistem (SRS)
- D04 Dokumen Reka Bentuk Sistem (SDD)
- D05 Pelan Pemindahan Data (DMP)
- D07 Pelan Integrasi Sistem (SIP)

---

## Tamat - Ringkasan BRS
