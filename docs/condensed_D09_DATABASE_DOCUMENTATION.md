# Ringkasan Dokumentasi Pangkalan Data

**Sistem:** Sistem Pengurusan & Analitik Homestay Malaysia  
**Pemilik:** MOTAC, Tourism Malaysia  
**Versi:** 1.0  
**Tarikh:** 11 Oktober 2025

---

## 1. Tujuan & Skop

- **Tujuan:** Panduan struktur, hubungan, dan piawaian utama pangkalan data untuk pembangunan, penyelenggaraan, audit dan integrasi sistem.
- **Skop:** Homestay, koperasi, kluster, prestasi, pengguna, import, audit. Data luaran: import Excel bulanan, integrasi API MOTAC.

---

## 2. Gambaran Umum Reka Bentuk

- **DBMS:** MySQL 8.0 / MariaDB, model relasi (3NF).
- **Charset:** UTF-8 (utf8mb4).
- **Engine:** InnoDB.
- **CI/CD:** Laravel migration (auto ke staging, manual ke production).
- **Backup:** Harian (retensi 30 hari prod, 7 dev, 14 staging), direplikasi off-site.

---

## 3. Struktur Data Utama

### 3.1 Jadual & Hubungan

- **homestays:** id, nama, negeri, alamat, kapasiti, fasiliti, model_pengurusan, id_koperasi (FK), status, created_at, updated_at
- **cooperatives:** id, nama, negeri, alamat, created_at, updated_at
- **clusters:** id, nama, negeri, created_at, updated_at
- **performances:** id, homestay_id (FK), bulan, tahun, pelawat_domestik, pelawat_asing, pendapatan, sumber_lain, created_at, updated_at
- **users:** id, nama, email, password, peranan, created_at, updated_at
- **imports:** id, filename, user_id (FK), status, remarks, created_at
- **audit_logs:** id, user_id (FK), aktiviti, entiti, entiti_id, butiran, created_at

#### Hubungan

- 1 koperasi → banyak homestay
- 1 homestay → banyak performances
- 1 kluster → banyak homestay
- 1 user → banyak imports, audit_logs

### 3.2 Indeks & Kekangan

- **Index utama:** negeri, status, bulan, tahun, homestay_id, email (unik)
- **Unique:** users.email, performances (homestay_id, bulan, tahun)
- **Foreign key:** id_koperasi (homestays→cooperatives), homestay_id (performances→homestays), user_id (imports/audit_logs→users)

---

## 4. Piawaian Penamaan

- Jadual: plural, lowercase, snake_case (cth: homestays)
- Medan: snake_case, deskriptif (cth: pelawat_domestik)
- Boolean: is_/has_
- FK: {table}_id (cth: homestay_id)
- PK/FK/Index/Unique: pk_{table}, fk_{child}_{parent}, idx_{table}_{field}, uk_{table}_{field}

---

## 5. Data & Contoh SQL

### 5.1 Contoh Ciptaan Jadual

```sql
CREATE TABLE homestays (
  id BIGINT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(255) NOT NULL,
  negeri VARCHAR(50) NOT NULL,
  alamat TEXT,
  kapasiti INTEGER NOT NULL DEFAULT 0,
  fasiliti TEXT,
  model_pengurusan ENUM('koperasi','individu') NOT NULL,
  id_koperasi BIGINT NULL,
  status ENUM('Aktif','Tidak Aktif') NOT NULL DEFAULT 'Aktif',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT fk_homestays_cooperatives FOREIGN KEY (id_koperasi) REFERENCES cooperatives(id) ON DELETE SET NULL ON UPDATE CASCADE
);
```

### 5.2 Contoh Data

```sql
INSERT INTO cooperatives (nama, negeri) VALUES ('Koperasi Homestay Selangor', 'Selangor');
INSERT INTO homestays (nama, negeri, kapasiti, model_pengurusan, id_koperasi) VALUES ('Homestay Seri Kenangan', 'Selangor', 25, 'koperasi', 1);
INSERT INTO performances (homestay_id, bulan, tahun, pelawat_domestik, pelawat_asing, pendapatan) VALUES (1, 10, 2025, 150, 25, 15000.50);
```

---

## 6. Keselamatan & Audit

- **Akses:** Kawalan peranan (db_admin/db_analyst/db_import/db_viewer), enforce least privilege.
- **Kata laluan:** bcrypt/Argon2, panjang ≥12, tamat tempoh 180 hari.
- **Pematuhan:** PDPA 2010, ISO/IEC 27001, MyRAM.
- **Penyulitan:** AES-256-CBC untuk data sensitif, TLS 1.3 untuk sambungan DB.
- **Audit Trail:** Setiap INSERT/UPDATE/DELETE direkod dalam audit_logs.
- **Retensi Data:** performances 10 tahun, audit_logs 7 tahun, imports 2 tahun, users (aktif+2 tahun, selepas itu anonymize).

---

## 7. Penyelenggaraan & Prestasi

- **Backup:** Harian penuh, incremental setiap 4 jam, direplikasi off-site.
- **Recovery:** RTO < 4 jam, RPO < 1 jam, script restore disediakan.
- **Indexing:** Semua kolum carian utama diindeks, optimize mingguan.
- **Caching:** Redis untuk agregat dashboard, MySQL query cache untuk lookup statik.
- **Ujian:** Unit test (model/relationship), integration (end-to-end), load test bulanan.
- **Monitoring:** Zabbix/Grafana, alert CPU>80%, RAM>85%, disk>90%, slow query>5s.

---

## 8. Proses Perubahan & Rollback

- Semua migration Laravel didokumenkan dan versioned.
- Rollback: `php artisan migrate:rollback` atau restore backup jika perlu.
- Perubahan skema mesti direviu BPM → kelulusan JPK jika production.
- Semua rollback & perubahan dicatat dalam changelog.

---

## 9. Contoh Konfigurasi

### 9.1 Laravel .env

```text
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestay_system
DB_USERNAME=homestay_user
DB_PASSWORD=********
CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
```

### 9.2 MySQL my.cnf

```text
character-set-server = utf8mb4
collation-server = utf8mb4_unicode_ci
innodb_buffer_pool_size = 2G
max_connections = 200
log_bin = mysql-bin
slow_query_log = 1
```

---

## 10. Ringkasan Objekt Pangkalan Data

| Objek      | Kiraan | Senarai                                   |
|------------|--------|-------------------------------------------|
| Jadual     | 7      | homestays, cooperatives, clusters, performances, users, imports, audit_logs |
| View       | 2      | view_homestay_summary, view_monthly_performance |
| Trigger    | 1      | tr_homestays_audit_update                 |
| Procedure  | 1      | sp_generate_monthly_report                |

---

## Akhir Ringkasan Dokumentasi Pangkalan Data
