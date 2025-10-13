# Spesifikasi Migrasi Data (Data Migration Specification)

**Sistem:** Sistem Pengurusan & Analitik Homestay Malaysia

**Pemilik Sistem:** MOTAC, Tourism Malaysia

**Tarikh:** 11 Oktober 2025

---

## Metadata Dokumen & Kawalan Versi (Document Metadata & Version Control)

| Versi | Tarikh      | Perubahan   | Disemak Oleh | Diluluskan Oleh |
|-------|-------------|-------------|--------------|-----------------|
| 1.0   | 11 Okt 2025 | Draf awal   | BPM MOTAC    | JPK MOTAC       |

**Status:** Draf Awal  
**Penulis:** Pasukan Pembangunan MOTAC  
**Penyemak:** BPM MOTAC  
**Kelulusan:** Ketua Bahagian JPK MOTAC

---

## 1A. Objektif & Prinsip Migrasi (Objectives & Principles)

- **Tujuan:** Mendefinisikan piawaian struktur, integriti, dan transformasi data Homestay untuk memastikan migrasi yang tepat, konsisten, dan audit-ready.
- **Prinsip:** Konsistensi, kebolehkesanan (traceability), auditabiliti, keselamatan, kebolehulang (repeatability), dan pematuhan kepada ISO/IEC 25024 (Data Quality).

---

## Rujukan Dokumen Berkaitan (Related Document References)

| Kod  | Nama Dokumen                                      | Versi | Pautan                |
|------|---------------------------------------------------|-------|-----------------------|
| D01  | System Development Plan (SDP)                     | 1.0   | [D01_SYSTEM_DEVELOPMENT_PLAN.md](D01_SYSTEM_DEVELOPMENT_PLAN.md) |
| D03  | Software Requirements Specification (SRS)          | 1.0   | [D03_SYSTEM_REQUIREMENT_SPECIFICATIONS.md](D03_SYSTEM_REQUIREMENT_SPECIFICATIONS.md) |
| D04  | System Design Document (SDD)                       | 1.0   | [D04_SYSTEM_DESIGN_DOCUMENT.md](D04_SYSTEM_DESIGN_DOCUMENT.md) |
| D05  | Data Migration Plan (DMP)                          | 1.0   | [D05_DATA_MIGRATION_PLAN.md](D05_DATA_MIGRATION_PLAN.md) |
| D09  | Database Documentation (DBD)                       | 1.0   | [D09_DATABASE_DOCUMENTATION.md](D09_DATABASE_DOCUMENTATION.md) |

---
**Sistem:** Sistem Pengurusan & Analitik Homestay Malaysia  
**Pemilik Sistem:** MOTAC, Tourism Malaysia  
**Tarikh:** 11 Oktober 2025

---

## 1. Tujuan

Dokumen ini menerangkan spesifikasi teknikal dan piawaian yang perlu dipatuhi dalam proses migrasi data ke sistem baharu Homestay Malaysia. Ia bertujuan memastikan semua data Homestay yang dimigrasikan adalah tepat, lengkap, konsisten, dan memenuhi struktur pangkalan data baharu.

---

## 2. Skop Data

- Semua data Homestay berdaftar (profil, kapasiti, lokasi, pengurusan/koperasi, prestasi bulanan/tahunan).
- Data berkaitan koperasi, kluster, pengguna/pengusaha, penginapan, prestasi kewangan, dan pelawat.
- Data asal dari fail Excel/CSV atau pangkalan data lama.

---

## 3. Piawaian Struktur Data

---

## 3A. Piawaian Struktur & Konvensyen Data (Data Structure Standards & Conventions)

---

## 3B. Spesifikasi Transformasi Data (Data Transformation Specification)

- **Jadual Pemetaan (Mapping Table):**

| Medan Sumber (Source) | Medan Destinasi (Target) | Transformasi/Logik |
|----------------------|--------------------------|--------------------|
| negeri               | negeri                   | Normalisasi kod negeri (cth: "Johor" → "MY-01") |
| status               | status                   | "Aktif"/"Tidak aktif" → Boolean (1/0) |
| kapasiti             | kapasiti                 | String → Integer |
| pendapatan           | pendapatan               | String (RM) → Decimal |

- **Contoh Transformasi:**
  - Trim whitespace, ubah semua huruf ke uppercase untuk kod negeri.
  - Tukar "Ya"/"Tidak" ke Boolean (1/0).
  - Validasi ejaan negeri dan status terhadap senarai piawai.

- **Konvensyen Penamaan:** Semua nama jadual dan medan menggunakan snake_case (cth: homestay_id, created_by).
- **Kod Negeri/Koperasi:** Mengikut standard MOTAC (cth: MY-01 untuk Johor, MY-02 untuk Kedah, dsb.).
- **Format Tarikh:** YYYY-MM-DD untuk tarikh, integer untuk bulan/tahun.
- **ID Unik:** Integer auto-increment atau UUID (jika perlu).
- **Metadata Audit:** Setiap rekod mesti ada medan created_by, created_at, verified_by, verified_at.
- **Unit Data:** Kapasiti = bilik, pendapatan = RM, pelawat = orang.

### 3.1 Format Sumber

- Fail Excel (XLSX) atau CSV mengikut templat rasmi sistem (akan dibekalkan kepada semua pemilik data).
- Satu fail untuk setiap entiti utama:  
  - `homestay.xlsx`, `koperasi.xlsx`, `kluster.xlsx`, `pengguna.xlsx`, `prestasi_bulanan.xlsx`, dsb.

### 3.2 Struktur Medan (Contoh)

#### Homestay

| Nama Medan         | Jenis       | Wajib | Keterangan                        |
|--------------------|-------------|-------|-----------------------------------|
| id                 | Integer     | Ya    | ID unik Homestay                  |
| nama               | String      | Ya    | Nama Homestay                     |
| negeri             | String      | Ya    | Kod negeri / nama negeri          |
| alamat             | String      | Ya    | Alamat penuh                      |
| kapasiti           | Integer     | Ya    | Kapasiti maksimum                 |
| fasiliti           | String      | Tidak | Senarai fasiliti utama            |
| model_pengurusan   | String      | Ya    | 'koperasi', 'individu', dsb.      |
| id_koperasi        | Integer     | Tidak | Rujukan jika di bawah koperasi    |
| status             | String      | Ya    | Aktif / Tidak aktif               |

#### Prestasi Bulanan

| Nama Medan     | Jenis   | Wajib | Keterangan           |
|----------------|---------|-------|----------------------|
| id             | Integer | Ya    | ID rekod prestasi    |
| homestay_id    | Integer | Ya    | Rujuk jadual Homestay|
| bulan          | Integer | Ya    | 1-12 (Januari-Dis)   |
| tahun          | Integer | Ya    | Contoh: 2025         |
| pelawat_domestik | Integer | Ya  | Bil. pelawat tempatan|
| pelawat_asing  | Integer | Ya    | Bil. pelawat asing   |
| pendapatan     | Decimal | Ya    | Jumlah RM            |

#### Koperasi

| Nama Medan   | Jenis   | Wajib | Keterangan                 |
|--------------|---------|-------|----------------------------|
| id           | Integer | Ya    | ID unik koperasi           |
| nama         | String  | Ya    | Nama koperasi              |
| negeri       | String  | Ya    | Kod/nama negeri            |
| alamat       | String  | Tidak | Alamat koperasi            |

---

## 4. Langkah Pemindahan Data

### 4.1 Pengesahan & Pembersihan Awal

- Semua data mesti disemak untuk duplikasi, ketidakkonsistenan, dan nilai tidak sah.
- Setiap Homestay mesti mempunyai ID unik dan berkait dengan negeri yang sah.
- Data kapasiti, prestasi dan rujukan koperasi mesti selari dengan entiti utama.

### 4.2 Transformasi Data

- Penukaran kod negeri, status, dan lain-lain ke format yang ditetapkan sistem baharu.
- Penyesuaian tarikh/bulan/tahun ke format integer yang konsisten.
- Pemetaan ID koperasi dan kluster jika berkaitan.

### 4.3 Prosedur Import

- Gunakan modul import rasmi sistem (berasaskan Maatwebsite/Laravel-Excel).
- Import entiti secara berperingkat bermula dengan entiti asas (negeri, koperasi, kluster), diikuti Homestay, kemudian prestasi bulanan/tahunan.
- Setiap proses import akan menjana audit log dan laporan ralat (jika ada).

### 4.4 Validasi Pasca Migrasi

- Ujian integriti data:  
  - Tiada Homestay tanpa negeri/rujukan koperasi (jika perlu).
  - Semua prestasi bulanan mesti merujuk Homestay yang sah.
  - Jumlah rekod sebelum dan selepas migrasi mesti sama (kecuali data duplikat dibuang).
- Semakan paparan data di dashboard ujian.
- Laporan audit akhir mesti disemak dan disahkan oleh pentadbir data.

---

## 5. Keperluan Validasi

---

## 5A. Logik Validasi Data (Data Validation Logic)

- **Jenis Validasi:**
  - Struktur: Semak format, panjang, dan jenis data setiap medan.
  - Nilai: Semak julat, keunikan, dan nilai lalai (default) jika kosong.
  - Rujukan Silang: Pastikan foreign key wujud dan sah.
- **Nilai Lalai:** Jika medan tidak diisi, gunakan default (cth: status = "Aktif", kapasiti = 0).
- **Kod Ralat Standard:**
  - E001 = Ralat Format
  - E002 = Nilai Hilang
  - E003 = ID Tidak Sah
  - E004 = Rujukan Silang Tidak Sah
- **Pemberitahuan Ralat:** Semua ralat direkod ke fail log, laporan ralat, dan notifikasi e-mel kepada pentadbir.

- Semua medan wajib tidak boleh kosong.
- Kod negeri, status, model pengurusan mesti mengikut senarai piawai sistem.
- Data numerik (kapasiti, jumlah pelawat, pendapatan) mesti dalam julat munasabah.
- ID dan hubungan (foreign key) mesti wujud dan sah dalam jadual berkaitan.

---

## 6. Pengendalian Ralat

---

## 6A. Proses ETL (Extract–Transform–Load Process)

---

## 6B. Keselamatan & Kawalan Akses (Security & Access Control)

---

## 7. Ujian & Pengesahan Migrasi (Testing & Verification)

---

## 8. Pelan Pemulihan & Rollback (Rollback & Recovery)

---

## 9. Prestasi & Skalabiliti (Performance & Scalability)

---

## 10. Audit & Pelaporan (Audit & Reporting)

---

## 11. Lampiran (Appendices)

### 11.1 Contoh Jadual Pemetaan (Mapping Table Example)

| Sumber | Destinasi | Transformasi |
|--------|-----------|--------------|
| negeri | negeri    | "Johor" → "MY-01" |
| status | status    | "Aktif" → 1 |

### 11.2 Contoh Log ETL (Sample ETL Log)

| Timestamp | Entiti | Status | Jumlah Rekod | Ralat |
|-----------|--------|--------|--------------|-------|
| 2025-10-11 10:00 | Homestay | completed | 10,000 | 0 |

### 11.3 Carta Aliran ETL (ETL Process Diagram)

```text
Excel/CSV → ETL Service → Validasi → Transformasi → Import DB → Audit Log → Dashboard
```

### 11.4 Contoh Dataset Sebelum/Selepas (Before/After Transformation Example)

**Sebelum:**

| negeri | status  |
|--------|---------|
| Johor  | Aktif   |

**Selepas:**

| negeri | status |
|--------|--------|
| MY-01  | 1      |

---

- **Struktur Log Migrasi:**
  - | Timestamp | Entiti | Status | Jumlah Rekod | Ralat | Pengguna |
  - |-----------|--------|--------|--------------|-------|----------|
  - | 2025-10-11 10:00 | Homestay | completed | 10,000 | 0 | admin |
- **Laporan Ringkasan:** CSV/JSON/PDF mengandungi jumlah rekod berjaya/gagal, status, dan nota audit.
- **Templat Laporan Kelulusan:**

| Tarikh | Entiti | Status | Disemak Oleh | Catatan |
|--------|--------|--------|--------------|---------|
| 2025-10-11 | Homestay | Lulus | BPM MOTAC | Tiada isu |

- **Saiz Dataset Maksimum:** Sistem mampu memproses fail >100,000 baris per entiti.
- **Batch Processing:** Import dijalankan secara batch (5,000–10,000 rekod/batch).
- **Import Serentak:** Menyokong import serentak (multi-threaded/queue) untuk entiti berbeza.
- **Jangka Masa:** Purata masa migrasi <2 jam untuk 100,000 rekod.

- **Prosedur Rollback:** Jika import gagal, rollback dilakukan menggunakan backup automatik sebelum sesi migrasi.
- **Backup:** Backup penuh (snapshot/SQL dump) diambil sebelum setiap sesi import.
- **Pemulihan:** Data dipulihkan menggunakan fail backup, disahkan semula sebelum sistem digunakan.

- **Kriteria Penerimaan:** Semua dataset mesti >99% lengkap, tiada ID pendua, dan integriti hubungan terjamin.
- **Pengesahan Integriti:** Semak checksum/hash sebelum dan selepas import.
- **Audit Trail:** Semua operasi direkod untuk audit dalaman dan luaran.
- **UAT:** Pengesahan data oleh negeri/koperasi melalui User Acceptance Test.
- **Pengesahan Pasca Migrasi:** Laporan verifikasi dan audit akhir mesti disediakan.

- **Penyulitan Fail:** Semua fail migrasi dan log disulitkan (AES-256) semasa transit dan simpanan.
- **Kawalan Akses:** Hanya pentadbir dan pengguna berperanan (RBAC) boleh mengakses modul migrasi dan log.
- **Pematuhan PDPA:** Semua proses mematuhi Akta Perlindungan Data Peribadi Malaysia (PDPA).
- **Retensi & Pemadaman:** Fail sementara/log akan dipadamkan selepas 30 hari atau selepas audit selesai.

- **Komponen ETL:** Laravel service class (cth: HomestayImportService) menggunakan Maatwebsite/Laravel-Excel.
- **Struktur Log ETL:** Semua operasi ETL direkod ke fail CSV/JSON (storage/logs/etl-*.csv) dan jadual DB (`imports_logs`).
- **Batching & Retry:** Import dijalankan secara batch (cth: 5,000 rekod/batch), retry automatik sehingga 3 kali jika gagal.
- **Penjadualan & Status:** Import boleh dijadualkan (queue), status import direkod (`queued`, `processing`, `completed`, `failed`).

- Semua ralat semasa import (struktur, nilai, rujukan, duplikasi) mesti direkodkan dan dipaparkan kepada pengguna.
- Data yang bermasalah akan dikeluarkan dari proses import untuk semakan manual.
- Laporan lengkap kesilapan akan diberikan selepas setiap sesi migrasi.

---

## 7. Dokumentasi & Templat

- Templat Excel/CSV rasmi akan disediakan untuk setiap entiti.
- Panduan pemetaan medan dan contoh data akan diberi kepada semua pemilik data.
- Dokumentasi proses migrasi, troubleshooting, dan FAQ disediakan.

---

## 8. Penutup

Migrasi data Homestay mesti dilakukan mengikut spesifikasi ini bagi memastikan integriti dan kualiti data sistem baru. Sebarang isu mesti dirujuk kepada pasukan pembangunan sebelum import akhir.

---

## Akhir Dokumen

 
 
