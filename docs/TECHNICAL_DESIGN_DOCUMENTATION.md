# Dokumentasi Reka Bentuk Teknikal (Technical Design Documentation)  

**Sistem:** Sistem Pengurusan & Analitik Homestay Malaysia  
**Pemilik Sistem:** MOTAC, Tourism Malaysia  
**Tarikh:** 12 Oktober 2025

---

## 1. Tujuan

Dokumen ini menerangkan secara terperinci reka bentuk teknikal untuk Sistem Pengurusan & Analitik Homestay Malaysia. Ia merangkumi seni bina sistem, reka bentuk modul, integrasi, pangkalan data, keselamatan, dan panduan pelaksanaan teknikal.

---

## 2. Senibina Sistem

### 2.1 Gambaran Umum

- **Jenis Sistem:** Aplikasi web berasaskan Laravel 12 (PHP 8.3+), API-first
- **Corak Seni Bina:** MVC + Services (lihat D10_SOURCE_CODE_DOCUMENTATION.md)
- **Pangkalan Data:** MySQL / MariaDB
- **Frontend:** Vue 3 SPA (Vite), Vue Router, Pinia, Chart.js, Bootstrap 5+
- **Integrasi:** Laravel-Excel (import/export), barryvdh/laravel-dompdf (PDF), Laravel Notifications, REST API, Google Maps API (jika perlu)
- **RBAC:** Spatie/laravel-permission (roles/permissions), Policies & Gates
- **API Auth:** Laravel Sanctum (token & session)
- **Queue & Cache:** Redis (queue/cache), Horizon (monitoring), failed_jobs, DLQ
- **Observability:** Telescope (request/DB/job), log channels (audit, security, performance)
- **Hosting:** LAMP/LEMP stack, Cloud (AWS, DigitalOcean)
- **Pengurusan Konfigurasi:** `.env` (rahsia), secrets manager (production)
- **Struktur Kod:**
  - `app/Models`, `app/Http/{Controllers,Requests,Resources}`, `app/Services`, `app/Policies`, `app/Observers`
  - `database/{migrations,seeders,factories}`
  - `resources/{views,js/pages,lang}`
  - `routes/{web.php,api.php}`
  - Rujuk D10_SOURCE_CODE_DOCUMENTATION.md untuk konvensyen penuh.

### 2.2 Senibina Frontend (Vue 3 + Vite)

- **SPA Pages:** Vue Router untuk navigasi, setiap halaman di `resources/js/pages/{Dashboard.vue,Homestay.vue,Import.vue}`
- **State Management:** Pinia untuk pengurusan state global
- **Komponen Kongsi:** `resources/js/components/` untuk komponen boleh guna semula
- **i18n:** `resources/lang/ms` & `resources/lang/en` untuk terjemahan BM/EN, toggle bahasa
- **Vite Build:** `npm run build` untuk penghasilan aset, versioning automatik, env vars dari `.env`
- **Konvensyen:** Komponen PascalCase, folder mengikut modul, SCSS untuk gaya
- **API-first:** Semua data dashboard/analitik diambil dari API Laravel (lihat D08_SYSTEM_INTEGRATION_SPECIFICATION.md)

---

## 3. Reka Bentuk Modul Utama

### 3.1 Modul Import & Validasi Data Excel

- **Fungsi:**
  - Muat naik fail Excel/CSV (Homestay, prestasi, kapasiti, koperasi)
  - Pratonton → validasi → pemetaan → queue → audit trail
  - Validasi struktur & nilai data automatik (Form Request)
  - Idempotensi: Import boleh diulang tanpa duplikasi (rujuk D05_DATA_MIGRATION_PLAN.md, D06_DATA_MIGRATION_SPECIFICATION.md)
  - Saiz batch boleh dikonfigurasi, error taxonomy (E001–E004) selaras D05/D06
  - Log ralat, audit, dan status import
- **Teknologi:**
  - Laravel-Excel, Queue (Redis), Jobs, Audit Log, API endpoint: `POST /api/v1/imports`
  - API Resource untuk respons, rujuk D08_SYSTEM_INTEGRATION_SPECIFICATION.md

### 3.2 Modul Dashboard & Analitik

- **Fungsi:**
  - Paparan metrik utama nasional, negeri, koperasi, Homestay individu
  - Visual interaktif: carta bar, pai, garis, peta
  - Drill-down data, penapisan dinamik, pagination
- **Teknologi:**
  - Vue 3 SPA, Chart.js, API endpoint: `GET /api/v1/dashboard`, API Resource
  - Data diambil dari API, rujuk D08_SYSTEM_INTEGRATION_SPECIFICATION.md

### 3.3 Modul Pengurusan Homestay & Profil

- **Fungsi:**
  - Senarai, carian, dan profil terperinci Homestay
  - Hubungan dengan koperasi, kluster, negeri
- **Teknologi:**
  - Eloquent ORM, API endpoint: `GET /api/v1/homestays`, `GET /api/v1/homestays/{id}`
  - API Resource, Policies untuk akses, rujuk D08

### 3.4 Modul Pelaporan & Eksport

- **Fungsi:**
  - Penjanaan laporan dinamik (Excel/PDF) mengikut peringkat
  - Penjadualan laporan automatik/manual, status notifikasi
- **Teknologi:**
  - Laravel-Excel, DomPDF, Queue, API endpoint: `POST /api/v1/reports`
  - Notifikasi status, audit trail

### 3.5 Modul Pengurusan Pengguna & Autorisasi

- **Fungsi:**
  - Pendaftaran, pengurusan peranan (admin, penganalisis, pemerhati)
  - Penguatkuasaan polisi akses (Policies & Gates, Spatie Permission)
  - Audit trail aktiviti pengguna
- **Teknologi:**
  - Sanctum (API), Spatie/laravel-permission, Policies, API endpoint: `POST /api/v1/users`, `GET /api/v1/users`

### 3.6 Modul Notifikasi & Queue

- **Fungsi:**
  - Penghantaran notifikasi (e-mel, aplikasi)
  - Queue jobs untuk tugas latar (import besar, laporan)
- **Teknologi:**
  - Laravel Notifications, Queue (Redis), Horizon, API endpoint: `POST /api/v1/notifications`

---

## 4. API Reka Bentuk & Konvensyen

- **RESTful:** Semua endpoint di bawah `/api/v1/`, versioning jelas
- **Autentikasi:** Sanctum token (API), session (web)
- **Format Ralat:**

```json
{ "error": true, "message": "Ralat input.", "code": "E001" }
```

- **Paginasi:**

```json
{ "data": [...], "meta": { "current_page": 1, "last_page": 5, ... } }
```

- **Rate Limit:** 300/minit (autentikasi), 60/minit (tanpa auth)
- **Validasi:** Form Request, respons 422 untuk input tidak sah
- **API Resource:** Gunakan `app/Http/Resources` untuk serialisasi
- **Rujukan:** D08_SYSTEM_INTEGRATION_SPECIFICATION.md untuk skema penuh

---

---

## 4. Reka Bentuk Pangkalan Data

- **Struktur Relasi:**  
  - Jadual utama: homestays, cooperatives, clusters, performances, users, imports, audit_logs
- **Hubungan:**  
  - 1 koperasi -> banyak homestay  
  - 1 homestay -> banyak rekod prestasi
  - 1 pengguna -> banyak audit log/import
- **Foreign key:** Digunakan untuk jamin integriti
- **Dokumentasi penuh:** Rujuk `DATABASE_DOCUMENTATION.md`

---

## 5. Keselamatan

- **Autentikasi:** Sanctum token (API), session (web)
- **Autorisasi:** Spatie/laravel-permission (roles/permissions), Policies & Gates
- **Contoh Perlindungan Laluan:**

```php
// routes/api.php
Route::middleware(['role:admin|analyst'])->group(function () {
  Route::get('/dashboard', [DashboardController::class, 'index']);
});
```

- **Integrasi Polisi:**
  - Model Policy (`app/Policies`), dihubungkan ke model dan route
- **CSRF:** Aktif untuk web, CORS untuk API
- **CSP:** Header Content-Security-Policy diaktifkan
- **Kata Laluan & MFA:** Polisi kekuatan, MFA jika perlu
- **Rahsia:** Semua rahsia dalam `.env`/secret manager
- **PDPA:** Polisi retention & anonymization, rujuk D09_DATABASE_DOCUMENTATION.md untuk jadual retention
- **Audit Trail:** Semua perubahan penting direkodkan (model observer, log channel audit)

---

## 6. Logging & Observability

- **Saluran Log:** `audit`, `security`, `performance` (config/logging.php)
- **Telescope:** Pantau request, DB, job, queue
- **Horizon:** Pantau queue Redis, status job, retry
- **Sentry/OpenTelemetry:** Pilihan untuk error tracking
- **Contoh Log Berstruktur:**

```php
Log::channel('audit')->info('Import selesai', [
    'user_id' => $user->id,
    'import_id' => $import->id,
    'correlation_id' => $request->header('X-Correlation-ID'),
]);
```

---

## 7. Prestasi & Cache

- **Cache:** Redis, cache tags untuk agregat dashboard
- **Invalidasi:** Selepas import berjaya, cache dashboard di-flush
- **Indeks DB:** Semua FK & kolum carian utama diindeks (rujuk D09_DATABASE_DOCUMENTATION.md)
- **Paginasi:** Gunakan Eloquent pagination, elak N+1 query (with/withCount)
- **Contoh Cache:**

```php
Cache::tags(['dashboard'])->remember('dashboard:summary', 600, fn() => ...);
```

---

## 8. Jobs, Queues & DLQ

- **Queue:** Redis, Horizon untuk monitoring
- **Retry/Backoff:** Setiap job boleh tetapkan tries, backoff
- **Idempotensi:** Semua job idempotent, cek status sebelum proses
- **Failed Jobs:** Guna jadual `failed_jobs`, notifikasi jika gagal
- **DLQ:** Dead Letter Queue untuk job gagal berulang
- **Contoh Job:**

```php
class ImportJob implements ShouldQueue {
    public $tries = 5;
    public $backoff = 60;
    public function handle() { /* ... */ }
}
```

---

## 9. Ujian & Kualiti

- **Unit/Feature:** PHPUnit, Pest untuk ujian automatik
- **API Contract:** Postman/Newman untuk semakan kontrak API
- **UI:** Dusk/Cypress (pilihan) untuk ujian UI
- **Coverage:** ≥80% untuk laluan kritikal
- **Static Analysis:** PHPStan, Pint/CS Fixer, ESLint/Prettier untuk JS
- **CI Gates:** Semua commit mesti lulus pipeline (rujuk CI/CD)

---

## 10. CI/CD & Deployment

- **GitHub Actions:** composer/npm install, ujian, phpstan, vite build, migrate --force (bukan prod), promosi env, manual approval prod
- **Health/Readiness:** Endpoint `/api/v1/health` untuk status
- **Deploy:** Blue/green atau rolling deploy, secrets via GitHub Environments/Key Vault

---

## 11. Kebolehcapaian & i18n

- **WCAG 2.1 AA:** Komitmen aksesibiliti, kontras warna, navigasi keyboard
- **Toggle Bahasa:** BM/EN, i18n di frontend & backend
- **Format MYR:** Helper untuk format mata wang
- **Zon Masa:** Semua tarikh/waktu dalam zon masa tempatan

---

## 12. Dokumentasi Berkaitan & Rujukan

- `D09_DATABASE_DOCUMENTATION.md` — Struktur dan hubungan DB, retention, indeks
- `D08_SYSTEM_INTEGRATION_SPECIFICATION.md` — Spesifikasi integrasi & API
- `D10_SOURCE_CODE_DOCUMENTATION.md` — Dokumentasi kod sumber & struktur
- `D05_DATA_MIGRATION_PLAN.md`, `D06_DATA_MIGRATION_SPECIFICATION.md` — Migrasi & transformasi data

---

## 13. Contoh Kod Penting

### 13.1 Resource & Controller API

```php
// app/Http/Resources/HomestayResource.php
class HomestayResource extends JsonResource {
    public function toArray($request) {
        return [
            'id' => $this->id,
            'nama' => $this->nama,
            'kapasiti' => $this->kapasiti,
        ];
    }
}

// app/Http/Controllers/Api/HomestayController.php
class HomestayController extends Controller {
    public function index() {
        return HomestayResource::collection(Homestay::paginate(20));
    }
}
```

### 13.2 Perlindungan Laluan dengan Spatie

```php
// routes/api.php
Route::middleware(['role:admin|analyst'])->group(function () {
    Route::get('/homestays', [HomestayController::class, 'index']);
});
```

### 13.3 Job Queue dengan Retry/Backoff

```php
class ImportJob implements ShouldQueue {
    public $tries = 5;
    public $backoff = 60;
    public function handle() { /* ... */ }
}
```

---
