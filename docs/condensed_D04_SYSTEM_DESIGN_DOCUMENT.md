# Ringkasan Dokumen Reka Bentuk Sistem (SDD)

**Sistem:** Sistem Pengurusan & Analitik Homestay Malaysia  
**Pemilik:** MOTAC, Tourism Malaysia  
**Tarikh:** 14 Oktober 2025  
**Versi:** 1.1

---

## 1. Tujuan & Skop

Dokumen ini merangkum reka bentuk sistem untuk sistem Homestay Malaysia. Ia menerjemahkan keperluan SRS kepada seni bina aplikasi, modul utama, keselamatan, integrasi, dan strategi DevOps dalam ekosistem Laravel.

---

## 2. Gambaran Sistem & Seni Bina

- **Seni Bina MVC Laravel:**  
  - **Model:** Eloquent ORM, migrasi, relasi data.  
  - **Controller:** Logik aplikasi, pemprosesan permintaan, servis.  
  - **View:** Blade/Livewire, AlpineJS untuk interaktiviti, Bootstrap 5+.

- **Komponen Utama:**  
  - Import & Validasi Data (Excel/CSV)  
  - Dashboard Analitik (Livewire, Chart.js)  
  - Pengurusan Homestay & Profil  
  - Pelaporan & Eksport (Excel/PDF)  
  - Pengurusan Pengguna & RBAC (Spatie Permission)  
  - Notifikasi & Queue (Redis, Horizon)

- **Integrasi:**  
  - RESTful API (Sanctum, OAuth2, Bearer Token)  
  - Sinkronisasi dengan API MOTAC & Tourism Malaysia  
  - Queue & job untuk import/eksport berskala besar

---

## 3. Reka Bentuk Fizikal & Logikal

- **Topologi:**  
  - Web > Load Balancer > App Server (Nginx+PHP-FPM) > DB Server (MySQL/MariaDB) > Redis  
  - Sandaran harian, pemulihan disaster (DR), pemantauan automatik

- **Lapisan:**  
  - Presentation: Blade, Livewire, AlpineJS  
  - Application: Controllers, Services, Policies  
  - Data: Model, Migrations, Seeder  
  - Integration: Queue, API Client, Notifications

---

## 4. Data & Struktur DB

- **Jadual Utama:** homestays, cooperatives, clusters, performances, users, imports, audit_logs
- **Indeks:** Kolum carian utama, foreign key, unik untuk prestasi bulanan
- **Relasi:**  
  - 1 koperasi-banyak homestay  
  - 1 homestay-banyak prestasi  
  - 1 user-banyak audit/import  
- **Penamaan:** snake_case, nama Inggeris, tiada prefix

---

## 5. Reka Bentuk Modul

- **ImportDataService:** Import Excel, validasi, pemetaan, logging
- **DashboardAnalyticsModule:** Papar metrik, carta interaktif, caching
- **ReportGenerator:** Eksport & penjadualan laporan
- **NotificationManager:** Notifikasi e-mel, in-app, queue
- **UserAccessManager:** Pengurusan peranan, akses, audit trail

---

## 6. Keselamatan

- **Autentikasi:** Laravel Auth (session), Sanctum/OAuth2 untuk API, MFA (optional)
- **Autorisasi:** Policies, Gates, Middleware RBAC (Spatie/Policies)
- **Penyulitan:** HTTPS (TLS 1.3), bcrypt untuk kata laluan, AES-256 untuk data sensitif
- **Audit Trail:** Semua perubahan penting direkod, log audit di DB
- **Pemantauan ralat:** Logging, alert, SOP insiden

---

## 7. DevOps & CI/CD

- **Git Flow:** main, develop, feature/*, PR review
- **CI/CD:** GitHub Actions (lint, test, build, deploy)
- **Backup & Restore:** Snapshot sebelum deploy, retention 30/90 hari
- **Monitoring:** Monolog, Sentry, Horizon, Prometheus/Grafana (optional)
- **Rollback:** Restore DB/tag jika deploy gagal

---

## 8. Prestasi & Skalabiliti

- **Target:** API <500ms, dashboard <2s, import 10k baris ≤2 min
- **Cache:** Redis untuk dashboard & agregat
- **Skalabiliti:** Load balancer, horizontal scaling app server, DB replica (opsyenal)
- **Queue:** Redis, job concurrency, DLQ untuk job gagal berulang

---

## 9. Ujian & Kualiti

- **Ujian:** Unit, Integration, E2E (Dusk), API Contract (Postman)
- **Coverage:** ≥80% laluan kritikal
- **Automasi:** PHPUnit, Pest, CI Gates mesti lulus untuk merge
- **Static Analysis:** PHPStan, Pint

---

## 10. Logging & Observability

- **Saluran log:** audit, security, performance
- **Pantauan:** Telescope (request, DB, queue), Horizon (job), alert automatik
- **Log retention:** >90 hari operasi, >12 bulan audit penting

---

## 11. Dokumentasi & Rujukan

- **Rujukan utama:** D01 (SDP), D03 (SRS), D09 (Database), D05/D06 (Migrasi), D08 (Integrasi), D10 (Kod Sumber)
- **Struktur kod:** Ikut PSR-12, semua fungsi utama didokumenkan (PHPDoc)
- **.env:** Semua rahsia & konfigurasi sensitif

---

## 12. Kriteria Penerimaan Sistem

- Semua modul utama beroperasi tanpa ralat kritikal
- Import besar (10k baris) berjaya <2 min
- Dashboard utama diload <2s
- Data audit lengkap, log tersedia
- UAT & sign-off rasmi MOTAC

---

## Akhir Ringkasan SDD
