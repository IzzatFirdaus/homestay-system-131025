# Ringkasan Dokumentasi Reka Bentuk Teknikal

**Sistem:** Sistem Pengurusan & Analitik Homestay Malaysia  
**Pemilik:** MOTAC, Tourism Malaysia  
**Versi:** 1.1  
**Tarikh:** 14 Oktober 2025

---

## 1. Tujuan & Skop

Dokumen ini memberi ringkasan seni bina teknikal sistem Homestay Malaysia yang merangkumi struktur, modul utama, keselamatan, integrasi, pangkalan data, dan amalan pelaksanaan.

---

## 2. Senibina Sistem

- **Backend:** Laravel 12 (PHP 8.3+), corak MVC + Service Layer
- **Frontend:** Livewire (server-side rendering), AlpineJS, Bootstrap 5+, Chart.js, Vite
- **API:** RESTful, versioned di `/api/v1/`, autentikasi Sanctum
- **RBAC:** Spatie/laravel-permission, Policies/Gates
- **Queue & Cache:** Redis (queue/cache), Horizon untuk monitoring
- **Observability:** Telescope, log channel audit/security/performance
- **Integrasi:** Laravel-Excel (import/export), DomPDF (PDF), Notifikasi, Google Maps API (jika perlu)
- **Struktur Kod:**  
  - `app/Models`, `app/Http/{Controllers,Requests,Resources}`, `app/Services`, `app/Livewire`, `database/`, `resources/`, `routes/`

---

## 3. Modul Utama

- **Import & Validasi Data:**  
  - Laravel-Excel, validasi Form Request, batch import, queue, idempotensi, audit trail
- **Dashboard & Analitik:**  
  - Livewire, Chart.js, API dashboard, drill-down, filter dinamik
- **Pengurusan Homestay/Profil:**  
  - Eloquent ORM, API Resource, Policies akses
- **Pelaporan & Eksport:**  
  - Excel/PDF, laporan dijadual/manual, notifikasi status
- **Pengurusan Pengguna & Autorisasi:**  
  - Spatie/laravel-permission, audit trail aktiviti
- **Notifikasi & Queue:**  
  - Laravel Notifications, queue Redis, Horizon

---

## 4. Reka Bentuk API

- **Endpoint:** `/api/v1/`
- **Format respons:** JSON standard, paginasi, kod ralat jelas
- **Rate limit:** 300/min (auth), 60/min (tanpa auth)
- **Validasi:** 422 untuk input tidak sah, Form Request
- **API Resource:** Serialisasi dalam `app/Http/Resources`

---

## 5. Reka Bentuk Pangkalan Data

- **DBMS:** MySQL/MariaDB, model relasi 3NF
- **Jadual utama:** homestays, cooperatives, clusters, performances, users, imports, audit_logs
- **Integrity:** Foreign key, indeks pada kolum carian, unique constraint
- **Rujukan penuh:** D09_DATABASE_DOCUMENTATION.md

---

## 6. Keselamatan

- **Autentikasi:** Sanctum token (API), session (web)
- **Autorisasi:** Policies/Gates, RBAC Spatie
- **CSRF/CORS:** CSRF aktif untuk web, CORS untuk API
- **Audit Trail:** Semua perubahan penting direkod (model observer, log audit)
- **Retensi Data:** Retention & anonymization ikut PDPA

---

## 7. Logging & Observability

- **Saluran log:** audit, security, performance
- **Pantauan:** Telescope untuk request/DB/job, Horizon untuk queue
- **Contoh log:**

  ```php
  Log::channel('audit')->info('Import selesai', [...]);
  ```

---

## 8. Prestasi & Cache

- **Cache:** Redis (dashboard aggregate), invalidasi selepas import
- **Indexing:** Semua FK & medan carian utama
- **Paginasi:** Eloquent paginate, elakkan N+1 query
- **Contoh cache:**

  ```php
  Cache::tags(['dashboard'])->remember('dashboard:summary', 600, fn() => ...);
  ```

---

## 9. Queue & Job

- **Queue:** Redis, Horizon monitoring, failed_jobs, DLQ
- **Job idempotent:** Cek status sebelum proses
- **Retry/backoff:** Configurable, contoh:

  ```php
  class ImportJob implements ShouldQueue { public $tries = 5; public $backoff = 60; ... }
  ```

---

## 10. Ujian & Kualiti

- **Ujian:** PHPUnit, Pest (unit/feature), Dusk/Cypress (UI)
- **Coverage:** ≥80% laluan kritikal
- **Static Analysis:** PHPStan, Pint/CS Fixer, ESLint/Prettier
- **CI:** GitHub Actions untuk lint, test, build, migrate

---

## 11. CI/CD & Deployment

- **Aliran:** composer/npm install, test, static analysis, vite build, migrate, manual approval prod
- **Deploy:** Blue/green atau rolling, secrets melalui secrets manager/env
- **Health check:** `/api/v1/health`

---

## 12. Aksesibiliti & i18n

- **WCAG 2.1 AA:** Kontras, navigasi keyboard, responsif
- **Bahasa:** Toggle BM/EN, i18n frontend/backend
- **Format:** Helper untuk MYR, tarikh tempatan

---

## 13. Rujukan

- `D09_DATABASE_DOCUMENTATION.md` — Struktur DB & retention
- `D08_SYSTEM_INTEGRATION_SPECIFICATION.md` — Spesifikasi API/Integrasi
- `D10_SOURCE_CODE_DOCUMENTATION.md` — Struktur kod
- `D05/D06` — Migrasi data

---

## Akhir Ringkasan Dokumentasi Reka Bentuk Teknikal
