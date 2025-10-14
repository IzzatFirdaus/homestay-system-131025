# Ringkasan Spesifikasi Migrasi Data (Data Migration Specification - DMS)

**Sistem:** Sistem Pengurusan & Analitik Homestay Malaysia  
**Pemilik:** MOTAC, Tourism Malaysia  
**Tarikh:** 11 Oktober 2025  
**Versi:** 1.0

---

## 1. Tujuan & Prinsip

- Mendefinisikan piawaian struktur, integriti, dan transformasi data Homestay untuk memastikan migrasi ke sistem baru adalah tepat, konsisten, dan audit-ready.
- Prinsip utama: konsistensi, auditabiliti, kebolehkesanan, keselamatan, kebolehulang, pematuhan ISO/IEC 25024.

---

## 2. Skop Data

- Semua data Homestay berdaftar: profil, kapasiti, lokasi, koperasi, prestasi bulanan/tahunan.
- Termasuk data koperasi, kluster, pengguna, penginapan, prestasi kewangan, pelawat.
- Sumber: fail Excel/CSV, pangkalan data lama.

---

## 3. Piawaian Struktur & Transformasi Data

- Templat Excel/CSV rasmi setiap entiti: homestay.xlsx, koperasi.xlsx, kluster.xlsx, pengguna.xlsx, prestasi_bulanan.xlsx.
- Jadual & medan: snake_case, kod negeri/koperasi ikut standard MOTAC (MY-01 dsb.), tarikh (YYYY-MM-DD), ID unik (auto-increment/UUID).
- Semua rekod wajib ada metadata audit: created_by, created_at, verified_by, verified_at.
- Unit data: kapasiti (bilik), pendapatan (RM), pelawat (orang).

**Contoh Pemetaan & Transformasi:**

| Sumber     | Destinasi     | Transformasi                           |
|------------|--------------|----------------------------------------|
| negeri     | negeri        | "Johor" → "MY-01" (uppercase, piawai) |
| status     | status        | "Aktif"/"Tidak aktif" → 1/0            |
| kapasiti   | kapasiti      | String → Integer                       |
| pendapatan | pendapatan    | String RM → Decimal                    |

**Struktur Medan Utama:**

- Homestay: id, nama, negeri, alamat, kapasiti, fasiliti, model_pengurusan, id_koperasi, status.
- Prestasi Bulanan: id, homestay_id, bulan, tahun, pelawat_domestik, pelawat_asing, pendapatan.
- Koperasi: id, nama, negeri, alamat.

---

## 4. Proses Migrasi Data

1. **Pengesahan & Pembersihan Awal:**  
   - Semak duplikasi, konsistensi, nilai tidak sah.
   - Setiap Homestay mesti ada ID unik & negeri sah.
2. **Transformasi Data:**  
   - Normalisasi kod negeri/status.
   - Penyesuaian tarikh/bulan/tahun ke integer.
   - Pemetaan ID koperasi/kluster.
3. **Import:**  
   - Guna modul import rasmi (Laravel-Excel).
   - Import mengikut urutan: negeri, koperasi, kluster, homestay, prestasi.
   - Audit log & laporan ralat setiap proses.
4. **Validasi Pasca Migrasi:**  
   - Tiada Homestay tanpa negeri/koperasi.
   - Semua prestasi mesti rujuk Homestay sah.
   - Jumlah rekod konsisten, duplikat dibuang.

---

## 5. Validasi & Logik

- Validasi struktur (format, panjang, jenis data), nilai (julat, keunikan, default), dan rujukan silang (FK).
- Kod ralat standard: E001 (Format), E002 (Nilai Hilang), E003 (ID Tidak Sah), E004 (FK Tidak Sah).
- Semua ralat direkod/log, notifikasi pentadbir.
- Default jika kosong: status = "Aktif", kapasiti = 0.
- Data numerik mesti dalam julat munasabah.

---

## 6. Pengendalian Ralat & ETL

- Proses ETL: Extract → Transform → Load.
- Modul/Skrip ETL: Laravel service class (cth: HomestayImportService), audit log ke CSV/DB.
- Import batch (5,000–10,000 rekod/batch), retry automatik hingga 3 kali jika gagal.
- Semua ralat import (struktur, nilai, FK, duplikasi) mesti direkodkan.

---

## 7. Keselamatan & Audit

- Penyulitan data/log: AES-256 (simapan), TLS 1.3 (transit).
- Akses hanya untuk pentadbir/berperanan (RBAC).
- Pematuhan PDPA: fail/log dipadam selepas 30 hari/audit selesai.
- Audit trail untuk semua operasi, UAT pengesahan data negeri/koperasi.

---

## 8. Prestasi & Skalabiliti

- Sistem mampu proses >100,000 baris/entiti, import batch & serentak.
- Masa purata migrasi <2 jam untuk 100,000 rekod.

---

## 9. Kriteria Penerimaan

- >99% lengkapan data, tiada ID pendua, integriti hubungan terjamin.
- Semua ralat didokumenkan, laporan lengkap setiap sesi migrasi.

---

## 10. Dokumentasi & Templat

- Semua templat Excel/CSV rasmi, panduan pemetaan, dan contoh data disediakan.
- Dokumentasi troubleshooting, FAQ, dan panduan penggunaan modul import.

---

## Akhir Ringkasan DMS
