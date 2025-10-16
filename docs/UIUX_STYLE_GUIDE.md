# Style Guide

- **Sistem:** Sistem Pengurusan & Analitik Homestay Malaysia
- **Pemilik Sistem:** MOTAC, Tourism Malaysia
- **Versi:** 1.0
- **Tarikh:** 16 Oktober 2025
- **Stack Teknologi:** `Laravel Blade` + `Livewire` + `Volt` + `Tailwind CSS` + `Alpine.js`

---

## Metadata Dokumen & Kawalan Versi | Document Metadata & Version Control

| Versi | Tarikh      | Perubahan | Disemak Oleh | Diluluskan Oleh |
|-------|-------------|-----------|--------------|-----------------|
| 1.0   | 16 Okt 2025 | Draf awal | BPM MOTAC    | JPK MOTAC       |

- **Status:** Draf Awal | Initial Draft
- **Penulis:** Pasukan Frontend MOTAC
- **Penyemak:** BPM MOTAC
- **Kelulusan:** Ketua Bahagian JPK MOTAC

---

## Daftar Kandungan | Table of Contents

1.  [Pendahuluan](#1-pendahuluan--introduction)
2.  [Konvensyen Penamaan](#2-konvensyen-penamaan--naming-conventions)
3.  [Struktur Fail & Folder](#3-struktur-fail--folder--file--folder-structure)
4.  [Blade Templating Style](#4-blade-templating-style)
5.  [Livewire Component Style](#5-livewire-component-style)
6.  [Volt Component Style](#6-volt-component-style)
7.  [Tailwind CSS & Responsive Design](#7-tailwind-css--responsive-design)
8.  [Alpine.js & Client-Side Interactivity](#8-alpinejs--client-side-interactivity)
9.  [PHP & Laravel Code Style](#9-php--laravel-code-style)
10. [Aksesibiliti & WCAG 2.1 AA](#10-aksesibiliti--wcag-21-aa)
11. [Testing & Documentation](#11-testing--documentation)
12. [Git & Version Control](#12-git--version-control)

---

## 1. Pendahuluan | Introduction

### 1.1 Tujuan Style Guide

Panduan ini menetapkan piawaian pengkodan, penamaan, dan gaya untuk `Sistem Pengurusan & Analitik Homestay Malaysia`. Ia memastikan konsistensi, kebolehbacaan, dan keselarasan dengan amalan terbaik `Laravel` + `Blade` + `Livewire` + `Volt` + `Tailwind CSS`.

### 1.2 Audiens Sasaran

- Pembangun Frontend & Backend
- Desainer UX/UI
- QA/Tester
- Code Reviewer

### 1.3 Prinsip Utama

-   **Konsistensi:** Satu cara untuk melakukan sesuatu.
-   **Kejelasan:** Kod yang mudah dibaca dan dipahami.
-   **Keselamatan:** Melindungi data pengguna dan sistem.
-   **Prestasi:** Optimisasi untuk kecepatan dan efisiensi.
-   **Aksesibiliti:** `WCAG 2.1 Level AA` sebagai standard minimum.

---

## 2. Konvensyen Penamaan | Naming Conventions

### 2.1 PHP & Laravel Classes

```php
// ✅ Class Names: PascalCase
class HomestayController extends Controller {}
class ImportDataService extends BaseService {}
class HomestayRepository implements RepositoryInterface {}
class CreateHomestayRequest extends FormRequest {}
class HomestayPolicy {}
class HomestayObserver {}

// ✅ Method Names: camelCase
public function createHomestay() {}
public function validateImportData() {}
public function getHomestaysByState() {}
private function calculateOccupancyRate() {}

// ✅ Properties: camelCase
private $homestayRepository;
protected $fillable = ['nama', 'kapasiti', 'status'];
public $validated = [];

// ✅ Constants: UPPER_SNAKE_CASE
const MAX_UPLOAD_SIZE = 10485760; // 10MB
const DEFAULT_PAGINATION = 20;
const HOMESTAY_STATUS_ACTIVE = 'Aktif';
```

### 2.2 Database & Models

```php
// ✅ Table Names: plural, snake_case
// Table: homestays
// Table: cooperatives
// Table: performances

// ✅ Column Names: snake_case
// Columns: id, nama, negeri, alamat, kapasiti, created_at, updated_at

// ✅ Foreign Keys: {table_name}_id
// homestay_id, cooperative_id, user_id

// ✅ Index Names: idx_{table}_{field}
// idx_homestays_negeri, idx_performances_tahun_bulan

// ✅ Model Names: singular, PascalCase
class Homestay extends Model {}
class Cooperative extends Model {}
class Performance extends Model {}
```

### 2.3 Blade Templates & Views

```blade
{{-- ✅ Folder Structure: kebab-case --}}
resources/views/
  ├── components/
  │   ├── button.blade.php
  │   ├── form-input.blade.php
  │   ├── card.blade.php
  │   └── modal.blade.php
  ├── pages/
  │   ├── dashboard.blade.php
  │   ├── homestays-index.blade.php
  │   └── homestays-show.blade.php
  └── layouts/
      ├── app.blade.php
      ├── guest.blade.php
      └── admin.blade.php

{{-- ✅ Component Names: kebab-case in HTML --}}
<x-button />
<x-form-input />
<x-card title="Title" />
<x-alert type="success" />

{{-- ✅ Blade Variables: camelCase --}}
@php
    $totalHomestays = 100;
    $isAdmin = auth()->user()->isAdmin();
    $homestayList = $homestays->paginate(20);
@endphp
```

### 2.4 Livewire & Volt Components

```php
// ✅ Component Class Names: PascalCase
class DashboardMetrics extends Component {}
class HomestayTable extends Component {}
class ImportDataForm extends Component {}
class FilterSidebar extends Component {}

// ✅ Livewire Component Files: PascalCase
// app/Livewire/DashboardMetrics.php
// app/Livewire/HomestayTable.php
// app/Livewire/ImportDataForm.php

// ✅ Volt File Names: kebab-case in views
// resources/views/components/dashboard-metrics.blade.php
// resources/views/components/homestay-table.blade.php
// resources/views/components/import-data-form.blade.php

// ✅ Public Properties: camelCase
public $searchQuery = '';
public $selectedState = null;
public $isLoading = false;
public $filteredResults = [];

// ✅ Methods: camelCase
public function updateSearch($query) {}
public function filterByState($state) {}
public function submitForm() {}
```

### 2.5 CSS Classes & IDs

```html
<!-- ✅ CSS Classes: kebab-case (following BEM methodology) -->
<div class="card card--primary card__header">
  <h2 class="card__title">Title</h2>
  <button class="btn btn--primary btn--lg btn__icon--left">
    Action
  </button>
</div>

<!-- ✅ IDs: kebab-case, prefixed by purpose -->
<form id="import-form">
  <input id="file-input-homestay" type="file">
  <button id="btn-submit-import">Upload</button>
</form>

<!-- ✅ Data Attributes: kebab-case -->
<div data-toggle="modal" data-target="#importModal" data-delay="300">
  Open Import
</div>

<!-- ✅ Tailwind Classes: Always use lowercase with hyphens -->
<div class="flex flex-col gap-4 p-6 bg-white rounded-lg shadow-md">
  <!-- Content -->
</div>
```

### 2.6 JavaScript & Alpine.js

```javascript
// ✅ Function Names: camelCase
function validateImportFile() {}
function calculateOccupancyRate() {}
function openModal() {}

// ✅ Variable Names: camelCase
let totalHomestays = 0;
const maxUploadSize = 10485760;
var filteredResults = [];

// ✅ Object Keys: camelCase
const config = {
  apiUrl: 'https://homestay.motac.gov.my/api',
  maxRetries: 3,
  timeoutMs: 5000,
  debugMode: false
};

// ✅ Alpine.js Component Names: camelCase
x-data="{ isOpen: false, selectedTab: 'overview' }"
x-init="initializeComponent()"
@click="handleClick($event)"
x-model="formData.homestayName"
```

### 2.7 Routes & URLs

```php
// ✅ Route Names: kebab-case, hierarchical
Route::get('/homestays', [HomestayController::class, 'index'])->name('homestays.index');
Route::get('/homestays/{id}', [HomestayController::class, 'show'])->name('homestays.show');
Route::get('/dashboard/analytics', [DashboardController::class, 'analytics'])->name('dashboard.analytics');

// ✅ API Routes: version-prefixed, kebab-case
Route::prefix('api/v1')->group(function () {
    Route::get('/homestays', [Api\HomestayController::class, 'index']);
    Route::post('/import-data', [Api\ImportController::class, 'store']);
    Route::get('/dashboard-metrics', [Api\DashboardController::class, 'metrics']);
});

// ✅ URL Fragments: kebab-case
// /dashboard?sort=newest&filter-state=johor&page=2
```

---

## 3. Struktur Fail & Folder | File & Folder Structure

### 3.1 Laravel Project Structure (Condensed)

```bash
homestay-system/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── HomestayController.php          (Page/Resource controllers)
│   │   │   ├── DashboardController.php
│   │   │   ├── ImportController.php
│   │   │   └── Api/
│   │   │       ├── HomestayController.php      (API resource controllers)
│   │   │       └── DashboardController.php
│   │   ├── Requests/
│   │   │   ├── StoreHomestayRequest.php        (Form validation)
│   │   │   ├── UpdateHomestayRequest.php
│   │   │   └── ImportDataRequest.php
│   │   ├── Resources/
│   │   │   ├── HomestayResource.php            (API serialization)
│   │   │   └── HomestayCollection.php
│   │   └── Middleware/
│   │       ├── Authenticate.php
│   │       ├── VerifyRole.php
│   │       └── LogRequests.php
│   ├── Models/
│   │   ├── Homestay.php                        (Eloquent models)
│   │   ├── Cooperative.php
│   │   ├── Performance.php
│   │   ├── User.php
│   │   └── AuditLog.php
│   ├── Services/
│   │   ├── HomestayService.php                 (Business logic)
│   │   ├── ImportDataService.php
│   │   ├── DashboardAnalyticsService.php
│   │   ├── ReportGeneratorService.php
│   │   └── NotificationService.php
│   ├── Repositories/
│   │   ├── HomestayRepository.php              (Data access abstraction)
│   │   ├── PerformanceRepository.php
│   │   └── RepositoryInterface.php
│   ├── Policies/
│   │   ├── HomestayPolicy.php                  (Authorization)
│   │   ├── PerformancePolicy.php
│   │   └── UserPolicy.php
│   ├── Livewire/
│   │   ├── DashboardMetrics.php                (Livewire components)
│   │   ├── HomestayTable.php
│   │   ├── ImportDataForm.php
│   │   └── FilterSidebar.php
│   ├── Events/
│   │   ├── DataImportedEvent.php               (Event classes)
│   │   ├── HomestayCreatedEvent.php
│   │   └── ReportGeneratedEvent.php
│   ├── Listeners/
│   │   ├── SendImportNotification.php          (Event listeners)
│   │   ├── UpdateDashboardCache.php
│   │   └── LogDataChange.php
│   ├── Jobs/
│   │   ├── ProcessImportJob.php                (Background jobs)
│   │   ├── GenerateReportJob.php
│   │   └── SyncExternalDataJob.php
│   ├── Observers/
│   │   ├── HomestayObserver.php                (Model observers)
│   │   └── AuditObserver.php
│   ├── Notifications/
│   │   ├── ImportCompletedNotification.php     (Notifications)
│   │   ├── ImportFailedNotification.php
│   │   └── ReportReadyNotification.php
│   ├── Exceptions/
│   │   ├── InvalidImportException.php          (Custom exceptions)
│   │   ├── ValidationException.php
│   │   └── UnauthorizedException.php
│   ├── Enums/
│   │   ├── HomestayStatus.php                  (Enums)
│   │   ├── UserRole.php
│   │   └── ImportStatus.php
│   ├── Traits/
│   │   ├── HasAuditLog.php                     (Reusable traits)
│   │   ├── HasTimestamps.php
│   │   └── FilterableQuery.php
│   ├── Providers/
│   │   ├── AppServiceProvider.php              (Service providers)
│   │   ├── AuthServiceProvider.php
│   │   ├── EventServiceProvider.php
│   │   └── RouteServiceProvider.php
│   └── Helpers/
│       ├── FormatHelper.php                    (Helper functions)
│       ├── ValidationHelper.php
│       └── DateHelper.php
├── database/
│   ├── migrations/
│   │   ├── 2025_10_01_000000_create_homestays_table.php
│   │   ├── 2025_10_02_000000_create_cooperatives_table.php
│   │   ├── 2025_10_03_000000_create_performances_table.php
│   │   └── 2025_10_04_000000_create_audit_logs_table.php
│   ├── seeders/
│   │   ├── DatabaseSeeder.php                  (Data seeders)
│   │   ├── HomestaySeeder.php
│   │   ├── CooperativeSeeder.php
│   │   ├── UserSeeder.php
│   │   └── StateSeeder.php
│   └── factories/
│       ├── HomestayFactory.php                 (Model factories)
│       ├── PerformanceFactory.php
│       └── UserFactory.php
├── resources/
│   ├── views/
│   │   ├── layouts/
│   │   │   ├── app.blade.php                   (Master layouts)
│   │   │   ├── guest.blade.php
│   │   │   └── admin.blade.php
│   │   ├── components/
│   │   │   ├── button.blade.php                (Reusable components)
│   │   │   ├── card.blade.php
│   │   │   ├── form-input.blade.php
│   │   │   ├── modal.blade.php
│   │   │   ├── alert.blade.php
│   │   │   ├── data-table.blade.php
│   │   │   ├── navbar.blade.php
│   │   │   ├── sidebar.blade.php
│   │   │   └── footer.blade.php
│   │   ├── pages/
│   │   │   ├── dashboard.blade.php             (Page templates)
│   │   │   ├── homestays/
│   │   │   │   ├── index.blade.php
│   │   │   │   ├── show.blade.php
│   │   │   │   ├── create.blade.php
│   │   │   │   └── edit.blade.php
│   │   │   ├── import/
│   │   │   │   ├── index.blade.php
│   │   │   │   └── results.blade.php
│   │   │   └── reports/
│   │   │       └── index.blade.php
│   │   ├── livewire/
│   │   │   ├── dashboard-metrics.blade.php     (Livewire templates)
│   │   │   ├── homestay-table.blade.php
│   │   │   ├── import-data-form.blade.php
│   │   │   └── filter-sidebar.blade.php
│   │   ├── emails/
│   │   │   ├── welcome.blade.php               (Email templates)
│   │   │   ├── import-completed.blade.php
│   │   │   └── import-failed.blade.php
│   │   └── errors/
│   │       ├── 404.blade.php                   (Error pages)
│   │       ├── 500.blade.php
│   │       └── 403.blade.php
│   ├── css/
│   │   ├── app.css                             (Tailwind CSS)
│   │   └── custom.css                          (Custom styles)
│   ├── js/
│   │   ├── app.js                              (Entry point)
│   │   ├── bootstrap.js                        (Bootstrap Livewire/Alpine)
│   │   └── components/
│   │       ├── modal.js
│   │       ├── dropdown.js
│   │       └── notification.js
│   └── lang/
│       ├── ms/
│       │   ├── messages.php                    (Malay translations)
│       │   ├── validation.php
│       │   └── pagination.php
│       └── en/
│           ├── messages.php                    (English translations)
│           ├── validation.php
│           └── pagination.php
├── tests/
│   ├── Feature/
│   │   ├── HomestayTest.php                    (Feature tests)
│   │   ├── ImportDataTest.php
│   │   └── DashboardTest.php
│   ├── Unit/
│   │   ├── Services/
│   │   │   ├── HomestayServiceTest.php         (Unit tests)
│   │   │   └── ImportDataServiceTest.php
│   │   └── Models/
│   │       ├── HomestayTest.php
│   │       └── PerformanceTest.php
│   └── Browser/
│       ├── DashboardTest.php                   (Dusk tests)
│       └── ImportTest.php
├── routes/
│   ├── web.php                                 (Web routes)
│   ├── api.php                                 (API routes)
│   └── console.php                             (Console routes)
├── config/
│   ├── app.php                                 (Laravel config)
│   ├── database.php
│   ├── cache.php
│   ├── queue.php
│   ├── mail.php
│   ├── filesystems.php
│   └── logging.php
├── storage/
│   ├── app/
│   │   ├── imports/                            (Uploaded import files)
│   │   └── reports/                            (Generated reports)
│   ├── logs/                                   (Application logs)
│   └── framework/
│       ├── cache/                              (Cache files)
│       ├── sessions/                           (Session files)
│       ├── views/                              (Compiled views)
│       └── testing/                            (Testing artifacts)
├── public/
│   ├── index.php                               (Entry point)
│   ├── .htaccess
│   ├── css/
│   │   └── app.css                             (Built CSS)
│   ├── js/
│   │   └── app.js                              (Built JS)
│   └── images/
│       ├── logo.png
│       └── icons/
├── .env.example                                (Environment template)
├── .env                                        (Environment - NOT in VCS)
├── .gitignore
├── .editorconfig
├── artisan                                     (Laravel CLI)
├── composer.json                               (PHP dependencies)
├── composer.lock
├── package.json                                (Node dependencies)
├── package-lock.json
├── tailwind.config.js                          (Tailwind configuration)
├── vite.config.js                              (Vite configuration)
├── phpunit.xml                                 (Test configuration)
└── README.md
```

### 3.2 File Naming Conventions

```php
// ✅ Controllers: Noun + Controller
// HomestayController.php
// DashboardController.php
// ImportController.php
// Api/HomestayController.php (namespace suffix for API)

// ✅ Models: Singular, PascalCase
// Homestay.php
// Cooperative.php
// Performance.php
// User.php

// ✅ Services: Noun + Service
// HomestayService.php
// ImportDataService.php
// DashboardAnalyticsService.php
// ReportGeneratorService.php

// ✅ Repositories: Noun + Repository
// HomestayRepository.php
// PerformanceRepository.php

// ✅ Policies: Noun + Policy
// HomestayPolicy.php
// PerformancePolicy.php

// ✅ Requests: Verb + Noun + Request
// StoreHomestayRequest.php
// UpdateHomestayRequest.php
// ImportDataRequest.php

// ✅ Resources: Noun + Resource
// HomestayResource.php
// HomestayCollection.php

// ✅ Livewire Components: PascalCase
// DashboardMetrics.php
// HomestayTable.php
// ImportDataForm.php

// ✅ Blade Views: kebab-case
// dashboard.blade.php
// homestays-index.blade.php
// import-data-form.blade.php

// ✅ Migrations: timestamp_description
// 2025_10_11_100000_create_homestays_table.php
// 2025_10_12_110000_add_status_to_homestays.php

// ✅ Seeders: Noun + Seeder
// HomestaySeeder.php
// UserSeeder.php

// ✅ Tests: Class + Test
// HomestayTest.php
// ImportDataTest.php
```

---

## 4. Blade Templating Style

### 4.1 Blade Syntax Conventions

```blade
{{-- ✅ Comments: Use Blade comment syntax --}}
{{-- This is a Blade comment, not visible in HTML --}}

{{-- ✅ Output escaping: Default behavior (auto-escape) --}}
<p>{{ $user->name }}</p>  {{-- Safe: XSS protected --}}
<p>{!! $htmlContent !!}</p>  {{-- Only when trusted --}}

{{-- ✅ Control structures: One space after keyword --}}
@if ($condition)
    <p>True</p>
@elseif ($otherCondition)
    <p>Other</p>
@else
    <p>False</p>
@endif

{{-- ✅ Loops: Clear variable naming --}}
@foreach ($homestays as $homestay)
    <div class="homestay-card">
        <h3>{{ $homestay->nama }}</h3>
    </div>
@endforeach

{{-- ✅ Forelse: Provide empty state --}}
@forelse ($homestays as $homestay)
    <div class="homestay-item">{{ $homestay->nama }}</div>
@empty
    <p class="text-gray-500">Tiada Homestay ditemui</p>
@endforelse

{{-- ✅ For loops: Use clear iteration --}}
@for ($i = 1; $i <= 12; $i++)
    <option value="{{ $i }}">{{ $i }}</option>
@endfor

{{-- ✅ Auth checks: Use blade directives --}}
@auth
    <p>User logged in</p>
@endauth

@guest
    <p>Guest view</p>
@endguest

{{-- ✅ Can directive: Authorization checks --}}
@can('edit', $homestay)
    <button>Edit Homestay</button>
@endcan

@cannot('delete', $homestay)
    <p>Cannot delete</p>
@endcannot

{{-- ✅ PHP blocks: Minimal usage --}}
@php
    $total = $homestays->sum('kapasiti');
    $average = $total / count($homestays);
@endphp

{{-- ✅ Include templates: Cleaner syntax --}}
@include('components.form-input', ['name' => 'email', 'label' => 'Email'])

{{-- ✅ Include with condition --}}
@includeIf('components.modal', ['id' => 'confirmModal'])

{{-- ✅ Slots: Flexible content injection --}}
<x-card title="Ringkasan">
    <x-slot name="header">
        <p>Header content</p>
    </x-slot>

    Main content here

    <x-slot name="footer">
        <button>Action</button>
    </x-slot>
</x-card>
```

### 4.2 Component Creation Best Practices

```blade
{{-- ✅ resources/views/components/button.blade.php --}}
@props([
    'variant' => 'primary',  {{-- Define props with defaults --}}
    'size' => 'md',
    'disabled' => false,
    'type' => 'button',
    'loading' => false,
])

<button
    type="{{ $type }}"
    @class([
        'btn',
        'btn-' . $variant,
        'btn-' . $size,
        'is-disabled' => $disabled || $loading,
        'is-loading' => $loading,
    ])
    {{ $disabled || $loading ? 'disabled' : '' }}
    {{ $attributes }}
>
    @if ($loading)
        <span class="spinner-border spinner-border-sm mr-2"></span>
    @endif
    {{ $slot }}
</button>

<style scoped>
    /* Button styles can go in app.css instead */
</style>

{{-- ✅ Usage --}}
<x-button variant="primary" size="lg">
    Simpan
</x-button>

<x-button variant="danger" @click="deleteItem" :disabled="isDeleting">
    Padam
</x-button>

<x-button type="submit" :loading="$isSubmitting">
    <x-icon name="upload" class="mr-2" />
    Muat Naik
</x-button>
```

### 4.3 Layout Inheritance

```blade
{{-- ✅ resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name'))</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>

<body class="bg-gray-50">
    {{-- Navigation --}}
    @include('components.navbar')

    <div class="flex">
        {{-- Sidebar --}}
        @include('components.sidebar')

        {{-- Main Content --}}
        <main class="flex-1 min-h-screen">
            {{-- Breadcrumb --}}
            @include('components.breadcrumb')

            {{-- Alerts --}}
            @if ($errors->any())
                <x-alert type="danger" dismissible>
                    <strong>Ralat Pengesahan:</strong>
                    <ul class="mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </x-alert>
            @endif

            @if (session('success'))
                <x-alert type="success" dismissible>
                    {{ session('success') }}
                </x-alert>
            @endif

            {{-- Content Slot --}}
            <div class="container mx-auto px-4 py-8">
                @yield('content')
            </div>
        </main>
    </div>

    {{-- Footer --}}
    @include('components.footer')

    @stack('scripts')
</body>
</html>

{{-- ✅ resources/views/pages/dashboard.blade.php --}}
@extends('layouts.app')

@section('title', 'Dashboard - Sistem Homestay')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <x-card-metric label="Total Homestay" value="{{ $totalHomestays }}" />
        <x-card-metric label="Pelawat Bulan Ini" value="{{ $visitorsThisMonth }}" />
        <x-card-metric label="Hasil" value="RM {{ number_format($revenue, 2) }}" />
        <x-card-metric label="Penghunian" value="{{ $occupancyRate }}%" />
    </div>

    @livewire('dashboard-metrics')
@endsection

@push('scripts')
    <script>
        // Page-specific scripts
    </script>
@endpush
```

## 5. Livewire Component Style

### 5.1 Livewire Class Structure

```php
<?php
// app/Livewire/ImportDataForm.php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use App\Services\ImportDataService;
use Illuminate\Contracts\View\View;

class ImportDataForm extends Component
{
    use WithFileUploads;

    /**
     * Public properties (reactive)
     */
    #[Validate('required|file|mimes:xlsx,csv|max:10240')]
    public $file;

    #[Validate('required|string')]
    public $importType = 'homestay';

    public $isProcessing = false;
    public $uploadProgress = 0;
    public $successMessage = '';
    public $errorMessage = '';

    /**
     * Mount: Initialize component
     */
    public function mount(): void
    {
        // Component initialization
    }

    /**
     * Handle file upload
     */
    public function submitImport(): void
    {
        $this->validate();

        $this->isProcessing = true;

        try {
            $result = app(ImportDataService::class)->process(
                $this->file,
                $this->importType
            );

            $this->successMessage = "Berjaya diimport: {$result['count']} baris";
            $this->dispatch('data-imported', count: $result['count']);
            $this->resetForm();

        } catch (\Exception $e) {
            $this->errorMessage = $e->getMessage();
        } finally {
            $this->isProcessing = false;
        }
    }

    /**
     * Reset form
     */
    public function resetForm(): void
    {
        $this->reset(['file', 'importType', 'successMessage', 'errorMessage']);
    }

    /**
     * Render component
     */
    public function render(): View
    {
        return view('livewire.import-data-form');
    }
}
```

### 5.2 Livewire Template

```blade
{{-- resources/views/livewire/import-data-form.blade.php --}}
<div class="space-y-6">
    {{-- Header --}}
    <div>
        <h2 class="text-2xl font-bold text-gray-900">Muat Naik Data</h2>
        <p class="text-sm text-gray-600 mt-1">Import fail Excel atau CSV</p>
    </div>

    {{-- Form --}}
    <form wire:submit="submitImport" class="space-y-6">
        {{-- Import Type --}}
        <div>
            <label for="importType" class="block text-sm font-medium text-gray-700 mb-2">
                Jenis Data
            </label>
            <select
                id="importType"
                wire:model="importType"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
            >
                <option value="homestay">Data Homestay</option>
                <option value="performance">Data Prestasi</option>
                <option value="capacity">Data Kapasiti</option>
            </select>
            @error('importType')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- File Input --}}
        <div>
            <label for="fileInput" class="block text-sm font-medium text-gray-700 mb-2">
                Pilih Fail
                <span class="text-red-600">*</span>
            </label>

            <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center hover:border-blue-500 transition">
                <input
                    type="file"
                    id="fileInput"
                    wire:model="file"
                    accept=".xlsx,.csv"
                    class="hidden"
                />

                <label for="fileInput" class="cursor-pointer block">
                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                        <path d="M28 8H12a4 4 0 00-4 4v20a4 4 0 004 4h24a4 4 0 004-4V20m-8-12l8 8m-8-8v8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <p class="mt-4 text-gray-900 font-semibold">Klik untuk memilih atau seret fail</p>
                    <p class="text-xs text-gray-500 mt-1">Format: XLSX, CSV (Max 10MB)</p>
                </label>
            </div>

            @if ($file)
                <div class="mt-4 flex items-center gap-2 p-3 bg-blue-50 rounded-lg border border-blue-200">
                    <svg class="h-5 w-5 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8 16.5a.5.5 0 01-.5-.5v-5.19l-1.841 1.841A.75.75 0 104.28 9.72l3.5-3.5a.75.75 0 011.06 0l3.5 3.5a.75.75 0 11-1.06 1.061L8.75 10.31V16a.5.5 0 01-.5.5z" clip-rule="evenodd"/>
                    </svg>
                    <div class="flex-1">
                        <p class="text-sm text-blue-900 font-medium">{{ $file->getClientOriginalName() }}</p>
                        <p class="text-xs text-blue-700">{{ number_format($file->getSize() / 1024, 2) }} KB</p>
                    </div>
                    <button
                        type="button"
                        wire:click="$set('file', null)"
                        class="text-blue-600 hover:text-blue-800 font-semibold"
                    >
                        Buang
                    </button>
                </div>
            @endif

            @error('file')
                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        {{-- Progress Bar --}}
        @if ($isProcessing)
            <div>
                <div class="flex justify-between text-sm text-gray-600 mb-2">
                    <span>Memproses...</span>
                    <span>{{ $uploadProgress }}%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div
                        class="bg-blue-600 h-2 rounded-full transition-all duration-300"
                        style="width: {{ $uploadProgress }}%"
                    ></div>
                </div>
            </div>
        @endif

        {{-- Messages --}}
        @if ($successMessage)
            <x-alert type="success" dismissible>
                {{ $successMessage }}
            </x-alert>
        @endif

        @if ($errorMessage)
            <x-alert type="danger" dismissible>
                {{ $errorMessage }}
            </x-alert>
        @endif

        {{-- Buttons --}}
        <div class="flex gap-3 pt-4">
            <button
                type="submit"
                :disabled="!$file || $isProcessing"
                class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 disabled:opacity-50 disabled:cursor-not-allowed"
                wire:loading.attr="disabled"
            >
                <span wire:loading.remove>Hantar</span>
                <span wire:loading>Memproses...</span>
            </button>

            <button
                type="button"
                wire:click="resetForm"
                :disabled="$isProcessing"
                class="px-6 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 disabled:opacity-50"
            >
                Batal
            </button>
        </div>
    </form>
</div>
```

### 5.3 Livewire Best Practices

```php
<?php
// ✅ Use #[Computed] for derived data
use Livewire\Attributes\Computed;

class DashboardMetrics extends Component
{
    public $selectedState = null;
    public $startDate = null;
    public $endDate = null;

    #[Computed]
    public function metrics()
    {
        return $this->getFilteredMetrics();
    }

    public function render()
    {
        return view('livewire.dashboard-metrics', [
            'metrics' => $this->metrics,
        ]);
    }
}

// ✅ Use event listeners for component communication
use Livewire\Attributes\On;

class DashboardMetrics extends Component
{
    #[On('data-imported')]
    public function refreshMetrics($count)
    {
        // Refresh metrics after data import
    }
}

// ✅ Use #[Validate] attribute for validation
#[Validate('required|email|max:255|unique:users')]
public $email = '';

// ✅ Use wire:loading for loading states
<button wire:click="submit" wire:loading.attr="disabled">
    <span wire:loading.remove>Submit</span>
    <span wire:loading>Loading...</span>
</button>

// ✅ Use reactive properties correctly
wire:model="searchQuery"           {{-- Auto-debounced --}}
wire:model.debounce-500="search"   {{-- 500ms debounce --}}
wire:model.lazy="email"            {{-- Update on blur --}}

// ❌ Avoid N+1 queries
public function render()
{
    // ❌ WRONG - causes N+1
    return view('component', [
        'homestays' => Homestay::all()
    ]);
}

// ✅ CORRECT - use eager loading
public function render()
{
    return view('component', [
        'homestays' => Homestay::with('cooperative')->paginate(20)
    ]);
}
```

## 6. Volt Component Style

### 6.1 Volt Single-File Component

```php
<?php
// resources/views/components/user-profile.blade.php

use Livewire\Attributes\Validate;
use Livewire\Volt\Component;
use App\Models\User;

new class extends Component {
    /**
     * Public properties
     */
    #[Validate('required|string|max:255')]
    public string $name = '';

    #[Validate('required|email|unique:users,email')]
    public string $email = '';

    public User $user;

    /**
     * Mount component
     */
    public function mount(User $user): void
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    /**
     * Update user profile
     */
    public function update(): void
    {
        $this->validate();

        $this->user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        session()->flash('success', 'Profil dikemas kini');
        $this->reset(['name', 'email']);
    }

    /**
     * Delete user
     */
    public function delete(): void
    {
        if (auth()->id() === $this->user->id) {
            session()->flash('error', 'Tidak boleh padam akun sendiri');
            return;
        }

        $this->user->delete();
        redirect()->route('users.index')->with('success', 'Pengguna dipadam');
    }
}; ?>

<div class="space-y-6">
    <div>
        <h2 class="text-2xl font-bold">Kemaskini Profil</h2>
    </div>

    <form wire:submit="update" class="space-y-4">
        <x-form-input
            name="name"
            label="Nama Penuh"
            wire:model="name"
            :error="$errors->first('name')"
            required
        />

        <x-form-input
            name="email"
            type="email"
            label="Email"
            wire:model="email"
            :error="$errors->first('email')"
            required
        />

        <div class="flex gap-3 pt-4">
            <button type="submit" class="btn btn-primary">
                Simpan Perubahan
            </button>

            <button
                type="button"
                wire:click="delete"
                onclick="confirm('Adakah anda pasti ingin memadam?') || event.preventDefault()"
                class="btn btn-danger"
            >
                Padam Akaun
            </button>
        </div>
    </form>
</div>
```

### 6.2 Volt Best Practices

```php
<?php
// ✅ Keep components focused and single-responsibility
// resources/views/components/dashboard-card.blade.php
new class extends Component {
    public $title;
    public $value;
    public $icon;
    public $trend;

    public function mount($title, $value, $icon = null, $trend = null)
    {
        $this->title = $title;
        $this->value = $value;
        $this->icon = $icon;
        $this->trend = $trend;
    }
};

// ✅ Use computed properties
#[Computed]
public function formattedValue()
{
    return number_format($this->value, 2);
}

// ✅ Dispatch events for inter-component communication
$this->dispatch('user-updated', userId: $this->user->id);
```

- ❌ **Elakkan logik kompleks dalam komponen Volt:** Pindahkan logik berat ke dalam service atau model.
- ✅ **Gunakan pewarisan layout** apabila komponen Volt memerlukan susun atur asas:

```blade
@extends('layouts.app')

@section('content')
    <!-- Component content -->
@endsection
```
```

## 7. Tailwind CSS & Responsive Design

### 7.1 Tailwind Class Organization

```html
<!-- ✅ Class ordering: position → sizing → spacing → color → typography → effects -->
<div class="absolute top-4 right-0 w-full md:w-1/2 h-screen px-4 py-6 bg-white text-gray-900 text-lg font-semibold rounded-lg shadow-lg">
    Content
</div>

<!-- ✅ Responsive design: mobile-first -->
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
    <!-- Items automatically stack on mobile -->
</div>

<!-- ✅ Flexbox alignment -->
<div class="flex flex-col gap-4">
    <div class="flex items-center justify-between">
        <span>Label</span>
        <span class="font-bold">Value</span>
    </div>
</div>

<!-- ✅ Conditional classes -->
<button @class([
    'px-4 py-2 rounded-lg',
    'bg-blue-600 text-white hover:bg-blue-700' => $isPrimary,
    'bg-gray-200 text-gray-800 hover:bg-gray-300' => !$isPrimary,
    'opacity-50 cursor-not-allowed' => $isDisabled,
])>
    Action
</button>

<!-- ✅ Hover and focus states -->
<a href="#" class="text-blue-600 hover:text-blue-800 hover:underline focus:outline-2 focus:outline-blue-600">
    Link
</a>

<!-- ✅ Dark mode support (if enabled) -->
<div class="bg-white dark:bg-gray-900 text-gray-900 dark:text-white">
    Content
</div>

<!-- ✅ Animation utilities -->
<div class="animate-spin h-5 w-5"></div>
<div class="transition-all duration-300 ease-in-out"></div>

<!-- ✅ Accessibility: sufficient contrast -->
<p class="text-gray-900">Dark text on light background (4.5:1 contrast)</p>
<p class="text-gray-600">Medium text on light background (7:1 contrast)</p>
```

### 7.2 Responsive Breakpoints

```css
/* Tailwind default breakpoints */
sm  → 640px    (Smartphone landscape)
md  → 768px    (Tablet)
lg  → 1024px   (Desktop)
xl  → 1280px   (Large desktop)
2xl → 1536px   (Ultra-wide)
```

```html
<!-- ✅ Mobile-first responsive design -->

<!-- Navigation: hidden hamburger on mobile, horizontal on desktop -->
<nav class="hidden md:flex gap-4">
    <a href="#">Home</a>
    <a href="#">About</a>
    <a href="#">Contact</a>
</nav>

<button class="md:hidden">
    <svg><!-- Hamburger icon --></svg>
</button>

<!-- Sidebar: full-width on mobile, side-by-side on desktop -->
<div class="flex flex-col md:flex-row gap-6">
    <aside class="w-full md:w-64 bg-gray-100 p-4">
        Sidebar
    </aside>
    <main class="flex-1">
        Main content
    </main>
</div>

<!-- Grid: 1 column on mobile, 2 on tablet, 3 on desktop -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    <x-card/>
    <x-card/>
    <x-card/>
</div>

<!-- Touch-friendly buttons on mobile -->
<button class="px-3 py-2 md:px-4 md:py-2 text-sm md:text-base">
    Action
</button>
```

### 7.3 Custom Tailwind Configuration

```javascript
// tailwind.config.js
module.exports = {
    content: [
        './resources/views/**/*.blade.php',
        './app/Livewire/**/*.php',
    ],

    theme: {
        extend: {
            colors: {
                motac: {
                    50: '#F0F9FF',
                    600: '#0284C7',
                    900: '#0C3C66',
                },
                homestay: {
                    500: '#F59E0B',
                    900: '#78350F',
                },
            },
            spacing: {
                '128': '32rem',
            },
            fontSize: {
                'xxs': ['10px', { lineHeight: '14px' }],
            },
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('@tailwindcss/aspect-ratio'),
    ],
};
```

## 8. Alpine.js & Client-Side Interactivity

### 8.1 Alpine.js Patterns

```html
<!-- ✅ Basic component with data -->
<div x-data="{ open: false, count: 0 }" @click.outside="open = false">
    <button @click="open = !open" :aria-expanded="open">
        Menu ({{ count }})
    </button>

    <div x-show="open" x-transition>
        <!-- Menu items -->
    </div>
</div>

<!-- ✅ Form handling -->
<form x-data="{ 
    email: '', 
    submitted: false,
    errors: {}
}" 
@submit.prevent="submitForm">
    <input x-model="email" type="email" placeholder="Email">

    <div x-show="errors.email" class="text-red-600">
        {{ errors.email }}
    </div>

    <button type="submit" :disabled="submitted">
        Submit
    </button>
</form>

<!-- ✅ Conditional rendering -->
<div x-data="{ tab: 'overview' }">
    <button :class="{ 'active': tab === 'overview' }" @click="tab = 'overview'">
        Overview
    </button>

    <div x-show="tab === 'overview'">
        Overview content
    </div>
</div>

<!-- ✅ List manipulation -->
<div x-data="{ items: ['Item 1', 'Item 2'], newItem: '' }">
    <input x-model="newItem" @keydown.enter="items.push(newItem); newItem = ''">

    <ul>
        <template x-for="item in items" :key="item">
            <li x-text="item"></li>
        </template>
    </ul>
</div>

<!-- ✅ API calls -->
<div x-data="{ 
    data: null, 
    loading: false,
    error: null 
}"
@load="loading = true; fetch('/api/data').then(r => r.json()).then(d => { data = d; loading = false; }).catch(e => { error = e; loading = false; })">

    <div x-show="loading">Loading...</div>
    <div x-show="error" class="text-red-600" x-text="error"></div>
    <div x-show="data" x-text="data.name"></div>
</div>

<!-- ✅ Debouncing -->
<input
    x-data
    @input.debounce-500="searchQuery = $el.value; search()"
    type="text"
    placeholder="Search..."
>

<!-- ✅ Event delegation -->
<div x-data="{ selected: null }">
    <template x-for="item in items">
        <button @click="selected = item.id" :class="{ 'active': selected === item.id }">
            {{ item.name }}
        </button>
    </template>
</div>
```

### 8.2 Alpine.js + Livewire Integration

```blade
<!-- ✅ Combining Alpine.js with Livewire -->
<div x-data="{ 
    filtersOpen: false, 
    selectedFilters: @entangle('selectedFilters')
}">
    <button @click="filtersOpen = !filtersOpen">
        Filters
    </button>

    <div x-show="filtersOpen" x-transition>
        <input 
            type="checkbox" 
            wire:model="selectedFilters" 
            value="active"
            @change="$wire.filterByStatus('active')"
        >
        Active
    </div>

    <div>
        @livewire('homestay-table', ['filters' => $selectedFilters])
    </div>
</div>

<!-- ✅ Auto-hide alerts after timeout -->
<div 
    x-data="{ show: true }"
    x-init="setTimeout(() => show = false, 3000)"
    x-show="show"
    x-transition
    class="alert alert-success"
>
    {{ session('success') }}
</div>

<!-- ✅ Modal with focus trap -->
<div
    x-data="{ open: false }"
    x-init="$watch('open', value => value && $nextTick(() => $el.querySelector('[autofocus]')?.focus()))"
>
    <button @click="open = true">Open Modal</button>

    <div 
        x-show="open" 
        @click.outside="open = false"
        @keydown.escape="open = false"
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center"
    >
        <div class="bg-white rounded-lg p-6">
            <input autofocus type="text" placeholder="Enter value">
            <button @click="open = false">Close</button>
        </div>
    </div>
</div>
```

## 9. PHP & Laravel Code Style

### 9.1 PHP Coding Standards

```php
<?php
// ✅ Class definition
class HomestayService
{
    private $repository;

    public function __construct(HomestayRepository $repository)
    {
        $this->repository = $repository;
    }

    // ✅ Method formatting
    public function createHomestay(array $data): Homestay
    {
        $validated = $this->validateData($data);

        $homestay = $this->repository->create($validated);

        event(new HomestayCreatedEvent($homestay));

        return $homestay;
    }

    // ✅ Private methods
    private function validateData(array $data): array
    {
        return [
            'nama' => $data['nama'] ?? '',
            'kapasiti' => (int) ($data['kapasiti'] ?? 0),
            'status' => $data['status'] ?? 'Aktif',
        ];
    }

    // ✅ Type hints and return types
    public function getHomestaysByState(string $state): Collection
    {
        return $this->repository
            ->whereState($state)
            ->orderByName()
            ->get();
    }

    // ✅ Arrow function for simple operations
    public function filterActive(Collection $homestays): Collection
    {
        return $homestays->filter(fn ($h) => $h->isActive());
    }

    // ✅ Null coalescing
    public function getDescription(): string
    {
        return $this->description ?? 'No description provided';
    }

    // ✅ Null safe operator
    public function getOwnerEmail(): ?string
    {
        return $this->owner?->email;
    }
}

// ✅ Constants
class HomestayStatus
{
    const ACTIVE = 'Aktif';
    const INACTIVE = 'Tidak Aktif';
    const SUSPENDED = 'Digantung';

    public static function all(): array
    {
        return [self::ACTIVE, self::INACTIVE, self::SUSPENDED];
    }
}

// ❌ DON'Ts
// ❌ Multiple statements on one line
$a = 1; $b = 2; $c = $a + $b;

// ✅ DO - One statement per line
$a = 1;
$b = 2;
$c = $a + $b;

// ❌ Complex inline conditions
$result = ($x > 5) ? (($x < 10) ? 'medium' : 'high') : 'low';

// ✅ DO - Clear conditional logic
if ($x > 10) {
    $result = 'high';
} elseif ($x > 5) {
    $result = 'medium';
} else {
    $result = 'low';
}

// ❌ Avoid magic numbers
$discount = $price * 0.15;

// ✅ DO - Use named constants
const DISCOUNT_RATE = 0.15;
$discount = $price * self::DISCOUNT_RATE;
```

### 9.2 Laravel-Specific Patterns

```php
<?php
// ✅ Model scopes for reusable queries
class Homestay extends Model
{
    // Query scope
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', 'Aktif');
    }

    public function scopeByState(Builder $query, string $state): Builder
    {
        return $query->where('negeri', $state);
    }

    // Usage
    // Homestay::active()->byState('Johor')->get();
}

// ✅ Relationships
class Homestay extends Model
{
    public function cooperative()
    {
        return $this->belongsTo(Cooperative::class, 'id_koperasi');
    }

    public function performances()
    {
        return $this->hasMany(Performance::class, 'homestay_id');
    }

    public function cluster()
    {
        return $this->belongsToMany(Cluster::class);
    }
}

// ✅ Eloquent queries with eager loading
$homestays = Homestay::with('cooperative', 'cluster')
    ->where('status', 'Aktif')
    ->orderBy('nama')
    ->paginate(20);

// ✅ Use collections instead of arrays
$homestays->map(fn ($h) => $h->nama)->unique();
$homestays->filter(fn ($h) => $h->kapasiti > 10)->sum('kapasiti');
$homestays->groupBy('negeri');

// ✅ Use request() helper
public function store(StoreHomestayRequest $request)
{
    $data = $request->validated();

    $homestay = Homestay::create($data);

    return redirect()->route('homestays.show', $homestay);
}

// ✅ Middleware
public function handle(Request $request, Closure $next)
{
    if (!auth()->user()->isAdmin()) {
        abort(403, 'Unauthorized access');
    }

    return $next($request);
}

// ✅ Policy authorization
if (auth()->user()->can('edit', $homestay)) {
    // User can edit
}

// ✅ Exception handling
try {
    $result = $this->importService->process($file);
} catch (InvalidFileException $e) {
    return back()->withError('Invalid file format');
} catch (Exception $e) {
    Log::error('Import failed', ['error' => $e->getMessage()]);
    return back()->withError('An unexpected error occurred');
}
```

## 10. Aksesibiliti & WCAG 2.1 AA

### 10.1 Semantic HTML

```html
<!-- ✅ Semantic HTML5 elements -->
<header role="banner">
    <nav aria-label="Main navigation">
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/about">About</a></li>
        </ul>
    </nav>
</header>

<main role="main" id="main-content">
    <article>
        <header>
            <h1>Tajuk Halaman</h1>
        </header>
        <section>
            Kandungan artikel
        </section>
    </article>
</main>

<aside role="complementary" aria-label="Sidebar">
    Kandungan sampingan
</aside>

<footer role="contentinfo">
    Maklumat footer
</footer>

<!-- ✅ Form accessibility -->
<form method="post" action="/submit">
    <fieldset>
        <legend>Maklumat Peribadi</legend>

        <div class="form-group">
            <label for="fullname">Nama Penuh <span aria-label="wajib">*</span></label>
            <input
                type="text"
                id="fullname"
                name="fullname"
                required
                aria-required="true"
                aria-describedby="fullname-help fullname-error"
            />
            <p id="fullname-help" class="help-text">
                Masukkan nama penuh anda seperti yang tercatat
            </p>
        </div>

        <div class="form-group">
            <label for="email">Email <span aria-label="wajib">*</span></label>
            <input
                type="email"
                id="email"
                name="email"
                required
                aria-required="true"
                aria-invalid="false"
            />
        </div>

        <div class="form-group">
            <legend>Pilihan Tujuan Kunjungan</legend>
            <div role="group" aria-labelledby="purpose-legend">
                <div>
                    <input type="checkbox" id="leisure" name="purpose" value="leisure"/>
                    <label for="leisure">Rekreasi</label>
                </div>
                <div>
                    <input type="checkbox" id="business" name="purpose" value="business"/>
                    <label for="business">Perniagaan</label>
                </div>
                <div>
                    <input type="checkbox" id="other" name="purpose" value="other"/>
                    <label for="other">Lain-lain</label>
                </div>
            </div>
        </div>
    </fieldset>

    <button type="submit" class="btn btn-primary">Hantar</button>
    <button type="reset" class="btn btn-secondary">Ulang Semula</button>
</form>

<!-- ✅ Table with proper headers -->
<table>
    <caption>Prestasi Homestay Bulanan</caption>
    <thead>
        <tr>
            <th scope="col">Bulan</th>
            <th scope="col">Pelawat Domestik</th>
            <th scope="col">Pelawat Asing</th>
            <th scope="col">Pendapatan (RM)</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">Januari 2025</th>
            <td>150</td>
            <td>25</td>
            <td>15,000</td>
        </tr>
        <tr>
            <th scope="row">Februari 2025</th>
            <td>180</td>
            <td>30</td>
            <td>18,000</td>
        </tr>
    </tbody>
</table>

<!-- ✅ List structures -->
<ul>
    <li>Item pertama</li>
    <li>Item kedua</li>
    <li>Item ketiga</li>
</ul>

<ol>
    <li>Langkah satu</li>
    <li>Langkah dua</li>
    <li>Langkah tiga</li>
</ol>

<dl>
    <dt>Istilah</dt>
    <dd>Definisi istilah tersebut</dd>
    <dt>Istilah lain</dt>
    <dd>Definisi istilah yang lain</dd>
</dl>
```

### 10.2 Keyboard Navigation (Sambungan)

```html
<!-- ✅ Tab order management -->
<div class="form-container">
    <!-- First focusable element -->
    <input type="text" placeholder="Nama" tabindex="0"/>

    <!-- Second focusable element -->
    <input type="email" placeholder="Email" tabindex="0"/>

    <!-- Third focusable element -->
    <button type="submit" tabindex="0">Hantar</button>

    <!-- Skip link -->
    <a href="#main-content" class="sr-only focus:not-sr-only">
        Lompat ke kandungan utama
    </a>
</div>
```

```css
/* ✅ Focus visible indicator with CSS */
/* Ensure visible focus indicators */
*:focus-visible {
    outline: 3px solid #2563EB;
    outline-offset: 2px;
}

/* Remove default outline only if custom outline exists */
button:focus-visible {
    outline: 3px dashed #2563EB;
}

/* High contrast mode support -->
@media (prefers-contrast: more) {
    *:focus-visible {
        outline: 4px solid currentColor;
        outline-offset: 3px;
    }
}
```

```html
<!-- ✅ Modal with focus trap -->
<div id="modal" role="dialog" aria-modal="true" aria-labelledby="modal-title">
    <div class="modal-content">
        <h2 id="modal-title">Konfirmasi Penghapusan</h2>

        <p>Adakah anda pasti ingin memadam rekod ini?</p>

        <div class="modal-actions">
            <button class="btn btn-danger" id="confirm-delete">
                Ya, Padam
            </button>
            <button class="btn btn-secondary" id="cancel-delete">
                Batal
            </button>
        </div>
    </div>
</div>
```

```javascript
// ✅ Focus management script
class AccessibleModal {
    constructor(modalId) {
        this.modal = document.getElementById(modalId);
        this.focusableElements = this.modal.querySelectorAll(
            'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'
        );
        this.firstFocusable = this.focusableElements[0];
        this.lastFocusable = this.focusableElements[this.focusableElements.length - 1];
        this.previousActiveElement = null;
    }

    open() {
        this.previousActiveElement = document.activeElement;
        this.modal.setAttribute('aria-hidden', 'false');
        this.modal.classList.add('visible');

        // Focus first element
        this.firstFocusable.focus();

        // Add event listeners
        this.modal.addEventListener('keydown', this.handleKeyDown.bind(this));
        document.addEventListener('keydown', this.handleEscape.bind(this));
    }

    close() {
        this.modal.setAttribute('aria-hidden', 'true');
        this.modal.classList.remove('visible');

        // Return focus to trigger element
        this.previousActiveElement?.focus();

        // Remove event listeners
        this.modal.removeEventListener('keydown', this.handleKeyDown);
        document.removeEventListener('keydown', this.handleEscape);
    }

    handleKeyDown(e) {
        if (e.key !== 'Tab') return;

        if (e.shiftKey) {
            // Shift + Tab
            if (document.activeElement === this.firstFocusable) {
                e.preventDefault();
                this.lastFocusable.focus();
            }
        } else {
            // Tab
            if (document.activeElement === this.lastFocusable) {
                e.preventDefault();
                this.firstFocusable.focus();
            }
        }
    }

    handleEscape(e) {
        if (e.key === 'Escape') {
            this.close();
        }
    }
}
```

### 10.3 Screen Reader Support

```blade
<!-- ✅ Live regions for dynamic content -->
<div
    role="status"
    aria-live="polite"
    aria-atomic="true"
    class="sr-only"
    id="form-status"
>
</div>

<!-- ✅ Loading announcement -->
<div
    wire:loading
    role="status"
    aria-live="polite"
    aria-atomic="true"
    class="sr-only"
>
    Data sedang dimuat, sila tunggu sebentar...
</div>

<!-- ✅ Screen reader only content -->
<div class="sr-only">
    Anda berada di halaman Dashboard Analitik Homestay.
    Gunakan Tab untuk menavigasi elemen interaktif atau tekan H untuk melihat panduan kekunci.
</div>

<!-- ✅ Accessible data table summary -->
<table class="data-table">
    <caption>
        Prestasi Homestay Bulan Ini
        <p class="sr-only">
            Jadual ini menunjukkan prestasi 150 Homestay aktif
            dengan purata penghunian 65% dan jumlah pendapatan RM 2.3 juta.
        </p>
    </caption>

    <thead>
        <tr>
            <th scope="col">Nama Homestay</th>
            <th scope="col">Negeri</th>
            <th scope="col">Pelawat</th>
            <th scope="col">Pendapatan (RM)</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td data-label="Nama Homestay">Seri Indah</td>
            <td data-label="Negeri">Selangor</td>
            <td data-label="Pelawat">25</td>
            <td data-label="Pendapatan (RM)">2,500</td>
        </tr>
    </tbody>
</table>

<!-- ✅ Accessible chart with alternative description -->
<div class="chart-container">
    <canvas id="performanceChart" role="img" aria-label="Carta prestasi"></canvas>

    <!-- Alternative text description for screen readers -->
    <div class="sr-only" id="chart-description">
        Carta garis menunjukkan trend pelawat dari Januari hingga Desember 2025.
        Nilai tertinggi adalah 200 pelawat pada Ogos dan terendah adalah 120 pelawat pada Januari.
        Purata sepanjang tahun adalah 160 pelawat per bulan.
    </div>

    <!-- Data table alternative -->
    <details class="chart-data-alternative">
        <summary>Lihat data dalam jadual</summary>
        <table>
            <thead>
                <tr>
                    <th>Bulan</th>
                    <th>Jumlah Pelawat</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Januari</td>
                    <td>120</td>
                </tr>
                <tr>
                    <td>Februari</td>
                    <td>135</td>
                </tr>
                <!-- more months -->
            </tbody>
        </table>
    </details>
</div>

<!-- ✅ Accessible date picker -->
<div class="date-picker-group">
    <label for="start-date">Tarikh Mula:</label>
    <input
        type="date"
        id="start-date"
        aria-describedby="date-help"
    />

    <p id="date-help" class="help-text">
        Format: YYYY-MM-DD (cth: 2025-10-16)
    </p>
</div>

<!-- ✅ Accessible dropdown/select -->
<div class="dropdown-group">
    <label for="state-select">Pilih Negeri:</label>
    <select
        id="state-select"
        aria-label="Pemilihan negeri untuk penapis"
        aria-describedby="state-help"
    >
        <option value="">-- Semua Negeri --</option>
        <option value="MY-01">Johor</option>
        <option value="MY-02">Kedah</option>
        <option value="MY-03">Kelantan</option>
        <!-- more options -->
    </select>

    <p id="state-help" class="help-text">
        Pilih negeri untuk melihat Homestay di negeri tersebut
    </p>
</div>
```

### 10.4 Color & Contrast

```css
/* ✅ WCAG AA compliant color combinations */

/* Primary color combinations */
.text-primary {
    color: #2563EB;  /* 4.51:1 on white - WCAG AA ✓ */
}

.bg-primary {
    background-color: #2563EB;
}

.text-on-primary {
    color: #ffffff;  /* White on primary blue: 6.77:1 - WCAG AAA ✓ */
}

/* Secondary color combinations */
.text-success {
    color: #10B981;  /* 4.54:1 on white - WCAG AA ✓ */
}

.text-error {
    color: #DC2626;  /* 5.1:1 on white - WCAG AA ✓ */
}

.text-warning {
    color: #D97706;  /* 4.4:1 on white - WCAG AA ✓ */
}

/* Neutral color combinations */
.text-primary-content {
    color: #111827;  /* 21:1 on white - WCAG AAA ✓ */
}

.text-secondary-content {
    color: #6B7280;  /* 7.05:1 on white - WCAG AA ✓ */
}

/* Text on colored backgrounds */
.badge-primary {
    background-color: #DBEAFE;
    color: #1E40AF;  /* 7.8:1 - WCAG AAA ✓ */
}

.badge-success {
    background-color: #DCFCE7;
    color: #166534;  /* 8.2:1 - WCAG AAA ✓ */
}

/* ✅ High contrast mode support -->
@media (prefers-contrast: more) {
    .text-primary {
        color: #001080;  /* Even darker for high contrast */
    }

    .text-secondary-content {
        color: #333333;  /* Darker gray */
    }
}

/* ✅ Forced colors mode (Windows High Contrast) -->
@media (forced-colors: active) {
    .text-primary {
        color: linkText;
    }

    .btn-primary {
        border: 2px solid buttonBorder;
        color: buttonText;
    }
}

/* ✅ Reduced motion support -->
@media (prefers-reduced-motion: reduce) {
    * {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
        scroll-behavior: auto !important;
    }
}
```

### 10.5 Testing for Accessibility

```php
// Laravel accessibility testing
class AccessibilityTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that dashboard is keyboard accessible
     */
    public function test_dashboard_keyboard_accessible(): void
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('/dashboard');

        // Check for skip link
        $response->assertSee('Lompat ke kandungan utama');

        // Check for main content ID
        $response->assertSee('id="main-content"');

        // Check all interactive elements are focusable
        $response->assertDontSee('tabindex="-1"'); // No unfocusable elements hidden
    }

    /**
     * Test form labels are properly associated
     */
    public function test_form_labels_associated(): void
    {
        $response = $this->get('/homestays/create');

        // Check labels have for attribute
        $response->assertSee('for="nama"');
        $response->assertSee('for="alamat"');

        // Check inputs have corresponding ID
        $response->assertSee('id="nama"');
        $response->assertSee('id="alamat"');
    }

    /**
     * Test color contrast ratios
     */
    public function test_color_contrast_wcag_aa(): void
    {
        $contrastChecker = new ContrastChecker();

        // Primary on white
        $ratio = $contrastChecker->getContrastRatio('#2563EB', '#FFFFFF');
        $this->assertGreaterThanOrEqual(4.5, $ratio, 'Primary color has insufficient contrast');

        // Text on light background
        $ratio = $contrastChecker->getContrastRatio('#111827', '#FFFFFF');
        $this->assertGreaterThanOrEqual(4.5, $ratio, 'Text color has insufficient contrast');
    }
}
```

## 11. Praktik Terbaik & Antipattern | Best Practices & Antipatterns

### 11.1 Blade Component Best Practices

```blade
{{-- ✅ GOOD: Reusable, well-documented component --}}
@props([
    'title' => null,
    'subtitle' => null,
    'elevated' => true,
    'class' => '',
])

<div @class([
    'card',
    'card--elevated' => $elevated,
    'card--flat' => !$elevated,
    $class,
])>
    @if ($title)
        <div class="card__header">
            <h3 class="card__title">{{ $title }}</h3>
            @if ($subtitle)
                <p class="card__subtitle">{{ $subtitle }}</p>
            @endif
        </div>
    @endif

    <div class="card__body">
        {{ $slot }}
    </div>

    @isset($footer)
        <div class="card__footer">
            {{ $footer }}
        </div>
    @endisset
</div>

{{-- ✅ GOOD: Using component with slots --}}
<x-card title="Dashboard Ringkasan" elevated>
    <p>Kandungan utama di sini</p>

    <x-slot name="footer">
        <button class="btn btn-primary">Lihat Lebih Lanjut</button>
    </x-slot>
</x-card>

{{-- ❌ BAD: Hardcoded styles and structure --}}
<div style="padding: 20px; border: 1px solid #ccc; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
    <h3 style="font-size: 18px; font-weight: bold; color: #333;">Title</h3>
    <p style="font-size: 14px; color: #666;">Content here</p>
</div>

{{-- ✅ GOOD: Conditional rendering with @if/@unless --}}
@if ($user->isAdmin())
    <a href="/admin/users">Pengurusan Pengguna</a>
@elseif ($user->isAnalyst())
    <a href="/dashboard/analytics">Analitik</a>
@else
    <a href="/dashboard">Dashboard</a>
@endif

{{-- ❌ BAD: Nested ternary operators --}}
{{ $user->isAdmin() ? 'Admin' : ($user->isAnalyst() ? 'Analyst' : 'User') }}

{{-- ✅ GOOD: Escaping user output (automatic with {{ }}) --}}
<p>{{ $userComment }}</p>  {{-- Auto-escaped --}}

{{-- ❌ BAD: Rendering user output without escaping --}}
<p>{!! $userComment !!}</p>  {{-- Dangerous! --}}

{{-- ✅ GOOD: Using Blade directives for loops --}}
@forelse ($homestays as $homestay)
    <div class="homestay-card">
        <h3>{{ $homestay->nama }}</h3>
    </div>
@empty
    <p>Tiada Homestay ditemui</p>
@endforelse

{{-- ❌ BAD: Complex logic in view --}}
@foreach ($homestays as $h)
    @if ($h->is_active && $h->cooperative && $h->cooperative->status === 'verified' && $h->last_updated > now()->subDays(7))
        <div>{{ $h->nama }}</div>
    @endif
@endforeach

{{-- ✅ GOOD: Move logic to controller/service --}}
@foreach ($activeVerifiedHomestays as $homestay)
    <div>{{ $homestay->nama }}</div>
@endforeach
```

### 11.2 Livewire Component Best Practices

```php
<?php
// ✅ GOOD: Focused component with clear responsibilities
namespace App\Livewire;

use Livewire\Component;
use App\Models\Homestay;

class HomestayTable extends Component
{
    public $search = '';
    public $sortBy = 'nama';
    public $sortAsc = true;

    #[Computed]
    public function homestays()
    {
        return Homestay::query()
            ->when($this->search, fn($q) => $q->whereLike('nama', "%{$this->search}%"))
            ->orderBy($this->sortBy, $this->sortAsc ? 'asc' : 'desc')
            ->paginate(20);
    }

    public function toggleSort($column)
    {
        if ($this->sortBy === $column) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortBy = $column;
            $this->sortAsc = true;
        }
    }

    public function render()
    {
        return view('livewire.homestay-table');
    }
}

// ❌ BAD: Component doing too much
class AdminDashboard extends Component
{
    public function render()
    {
        // Query data directly in component
        $homestays = Homestay::all();
        $cooperatives = Cooperative::all();
        $users = User::all();
        $stats = DB::select('SELECT ...');

        // Multiple responsibilities mixed
        return view('dashboard', compact('homestays', 'cooperatives', 'users', 'stats'));
    }
}

// ✅ GOOD: Using Livewire lifecycle properly
public function mount()
{
    // Initialize once
    $this->loadInitialData();
}

public function updated($property, $value)
{
    // React to property changes
    if ($property === 'search') {
        $this->resetPage();  // Reset pagination on search
    }
}

// ✅ GOOD: Validate early with attributes
#[Validate('required|email|max:255')]
public $email = '';

#[Validate('required|min:8|confirmed')]
public $password = '';

// ❌ BAD: Validate in event handler
public function submit()
{
    $this->validate([
        'email' => 'required|email|max:255',
        'password' => 'required|min:8|confirmed',
    ]);
    // ...
}

// ✅ GOOD: Dispatch events for inter-component communication
public function deleteHomestay($id)
{
    Homestay::destroy($id);
    $this->dispatch('homestay-deleted', id: $id);
    $this->dispatch('notify', message: 'Homestay deleted successfully', type: 'success');
}

// ✅ GOOD: Use event listeners
#[On('homestay-created')]
public function refreshTable()
{
    $this->resetPage();
    // Refresh computed property by accessing it
    $this->homestays;
}

// ❌ BAD: Calling database in render()
public function render()
{
    // This runs every time the component updates!
    $data = DB::select('SELECT COUNT(*) ...');
    return view('component', ['data' => $data]);
}
```

### 11.3 Tailwind CSS Best Practices

```html
<!-- ✅ GOOD: Utility-first approach with BEM-inspired naming -->
<div class="card card--elevated card--hover">
    <div class="card__header border-b border-gray-200 pb-4">
        <h3 class="card__title text-lg font-semibold text-gray-900">
            Dashboard Ringkasan
        </h3>
    </div>

    <div class="card__body p-6 space-y-4">
        <div class="metric metric--primary">
            <span class="metric__label text-sm text-gray-600">Total Homestay</span>
            <span class="metric__value text-4xl font-bold text-blue-600">1,234</span>
        </div>
    </div>
</div>

<!-- ❌ BAD: Mixing inline styles with Tailwind -->
<div style="padding: 20px; margin: 10px;" class="bg-white rounded-lg">
    <h3 style="font-size: 18px; font-weight: bold;">
        Title
    </h3>
</div>

<!-- ✅ GOOD: Responsive design mobile-first -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
    <div class="card">Item 1</div>
    <div class="card">Item 2</div>
    <div class="card">Item 3</div>
    <div class="card">Item 4</div>
</div>
```

```css
/* ✅ GOOD: Using @apply for repeated patterns */
@layer components {
    .btn-base {
        @apply px-4 py-2 rounded-lg font-medium transition-colors;
    }

    .btn-primary {
        @apply btn-base bg-blue-600 text-white hover:bg-blue-700;
    }

    .btn-secondary {
        @apply btn-base bg-gray-200 text-gray-800 hover:bg-gray-300;
    }
}
```

```html
<!-- ✅ GOOD: Conditional classes with @class directive -->
<div @class([
    'card',
    'card--elevated' => $isElevated,
    'card--flat' => !$isElevated,
    'card--error' => $hasError,
    'opacity-50' => $isDisabled,
    $customClass,
])>
    <!-- Content -->
</div>

<!-- ✅ GOOD: Dark mode support -->
<div class="bg-white dark:bg-gray-900 text-gray-900 dark:text-white">
    <!-- Content adjusts for dark mode -->
</div>

<!-- ✅ GOOD: Using color palette consistently -->
<div class="bg-blue-50 border-l-4 border-blue-500 text-blue-800 p-4">
    <p class="font-semibold">Maklumat Penting</p>
</div>

<!-- ❌ BAD: Using arbitrary colors instead of palette -->
<div style="background-color: #a3d5e4; border-left: 4px solid #12a4f2;">
    Tidak konsisten dengan palet warna
</div>
```

### 11.4 Alpine.js Best Practices

```javascript
// ✅ GOOD: Encapsulated Alpine component
function tableComponent() {
    return {
        search: '',
        items: [],

        get filteredItems() {
            return this.items.filter(item =>
                item.nama.toLowerCase().includes(this.search.toLowerCase())
            );
        },

        filterTable() {
            // Debounce if needed
        },

        editItem(item) {
            // Handle edit
        },

        init() {
            // Load initial data
            this.loadItems();
        },

        async loadItems() {
            const response = await fetch('/api/homestays');
            this.items = await response.json();
        }
    }
}
```

```html
<div x-data="tableComponent()" class="table-wrapper">
    <input
        type="search"
        x-model="search"
        @input="filterTable"
        placeholder="Cari Homestay..."
        class="search-input"
    />

    <table class="data-table">
        <tbody>
            <template x-for="item in filteredItems" :key="item.id">
                <tr>
                    <td x-text="item.nama"></td>
                    <td x-text="item.negeri"></td>
                    <td>
                        <button
                            @click="editItem(item)"
                            class="btn btn-sm"
                        >
                            Edit
                        </button>
                    </td>
                </tr>
            </template>
        </tbody>
    </table>
</div>

<!-- ✅ GOOD: Event listening with Alpine -->
<div x-data="{ showModal: false }">
    <button @click="showModal = true">Buka Modal</button>

    <div
        x-show="showModal"
        @click.outside="showModal = false"
        @keydown.escape="showModal = false"
        x-transition
        class="modal"
    >
        <!-- Modal content -->
    </div>
</div>

<!-- ✅ GOOD: Using x-cloak to prevent flash -->
<div x-cloak x-data="{ loading: true }">
    <!-- Content is hidden until Alpine initializes -->
</div>
```

```css
[x-cloak] { display: none; }
```

```html
<!-- ❌ BAD: Heavy DOM manipulation -->
<div x-data>
    <button @click="document.getElementById('form').style.display = 'block'">
        Show Form
    </button>
</div>

<!-- ✅ GOOD: Use x-show for visibility toggling -->
<div x-data="{ showForm: false }">
    <button @click="showForm = !showForm">
        Show Form
    </button>

    <form x-show="showForm" @submit.prevent="submitForm">
        <!-- Form fields -->
    </form>
</div>
```

## 12. Integrasi i18n & Lokalisasi | i18n & Localization Integration

### 12.1 Struktur Fail Bahasa | Language File Structure

```php
// resources/lang/ms/messages.php
return [
    'common' => [
        'welcome' => 'Selamat datang',
        'logout' => 'Keluar',
        'settings' => 'Tetapan',
        'language' => 'Bahasa',
    ],

    'dashboard' => [
        'title' => 'Dashboard',
        'total_homestays' => 'Jumlah Homestay',
        'active_homestays' => 'Homestay Aktif',
        'monthly_visitors' => 'Pelawat Bulanan',
        'total_revenue' => 'Jumlah Hasil',
    ],

    'validation' => [
        'required' => 'Medan :attribute diperlukan.',
        'email' => 'Medan :attribute mesti berupa alamat email yang sah.',
        'unique' => 'Nilai :attribute sudah digunakan.',
        'min' => 'Medan :attribute mesti minimal :min aksara.',
    ],

    'errors' => [
        'import_failed' => 'Kegagalan import: :error',
        'sync_failed' => 'Kegagalan sinkronisasi data dengan MOTAC HQ',
        'not_found' => 'Rekod tidak ditemui',
        'unauthorized' => 'Anda tidak dibenarkan mengakses resource ini',
    ],

    'success' => [
        'data_saved' => 'Data tersimpan dengan berjaya',
        'data_deleted' => 'Data dipadam dengan berjaya',
        'import_completed' => 'Import berjaya: :count baris diproses',
    ],
];

// resources/lang/en/messages.php
return [
    'common' => [
        'welcome' => 'Welcome',
        'logout' => 'Logout',
        'settings' => 'Settings',
        'language' => 'Language',
    ],

    'dashboard' => [
        'title' => 'Dashboard',
        'total_homestays' => 'Total Homestays',
        'active_homestays' => 'Active Homestays',
        'monthly_visitors' => 'Monthly Visitors',
        'total_revenue' => 'Total Revenue',
    ],

    'validation' => [
        'required' => 'The :attribute field is required.',
        'email' => 'The :attribute must be a valid email address.',
        'unique' => 'The :attribute has already been taken.',
        'min' => 'The :attribute must be at least :min characters.',
    ],

    'errors' => [
        'import_failed' => 'Import failed: :error',
        'sync_failed' => 'Data synchronization with MOTAC HQ failed',
        'not_found' => 'Record not found',
        'unauthorized' => 'You are not authorized to access this resource',
    ],

    'success' => [
        'data_saved' => 'Data saved successfully',
        'data_deleted' => 'Data deleted successfully',
        'import_completed' => 'Import successful: :count rows processed',
    ],
];
```

### 12.2 Penggunaan i18n dalam Blade | i18n Usage in Blade

```blade
{{-- Simple translation --}}
<h1>{{ __('messages.dashboard.title') }}</h1>

{{-- With parameters --}}
<p>{{ __('messages.success.import_completed', ['count' => $importedRows]) }}</p>

{{-- Short syntax --}}
<p>@lang('messages.common.welcome')</p>

{{-- Pluralization --}}
{{ trans_choice('messages.visitor', $count) }}

{{-- Language toggle link --}}
<a href="{{ route('language.switch', 'ms') }}">Bahasa Melayu</a>
<a href="{{ route('language.switch', 'en') }}">English</a>

{{-- Conditional based on locale --}}
@if (app()->getLocale() === 'ms')
    <p>Ini adalah teks Bahasa Melayu</p>
@else
    <p>This is English text</p>
@endif

{{-- Format currency by locale --}}
<p>
    @if (app()->getLocale() === 'ms')
        RM {{ number_format($amount, 2) }}
    @else
        MYR {{ number_format($amount, 2) }}
    @endif
</p>

{{-- Date formatting by locale --}}
<p>{{ $date->format('d M Y') }}</p>  {{-- English: 16 Oct 2025 --}}
@if (app()->getLocale() === 'ms')
    <p>{{ $date->isoFormat('D MMMM Y') }}</p>  {{-- Malay: 16 Oktober 2025 --}}
@endif
```

### 12.3 Language Switching Controller

```php
// app/Http/Controllers/LanguageController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Switch application language
     */
    public function switch($lang)
    {
        // Validate language
        if (!in_array($lang, ['ms', 'en'])) {
            abort(400, 'Invalid language');
        }

        // Store in session
        session(['locale' => $lang]);

        // Store in cookie for persistence
        cookie()->queue('language', $lang, 60 * 24 * 365);  // 1 year

        // Update app locale
        app()->setLocale($lang);

        // Set locale in database if user is authenticated
        if (auth()->check()) {
            auth()->user()->update(['language_preference' => $lang]);
        }

        return back();
    }
}

// routes/web.php
Route::get('/language/{lang}', [LanguageController::class, 'switch'])->name('language.switch');
```

```php
// app/Http/Middleware/SetLocale.php
namespace App\Http\Middleware;

use Closure;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        // Priority: User preference → Cookie → Session → Browser → Default

        $locale = 'ms';  // Default

        // Check browser Accept-Language header
        if ($request->header('Accept-Language')) {
            $browserLocale = substr($request->header('Accept-Language'), 0, 2);
            if (in_array($browserLocale, ['ms', 'en'])) {
                $locale = $browserLocale;
            }
        }

        // Check cookie
        if ($request->cookie('language')) {
            $locale = $request->cookie('language');
        }

        // Check session
        if (session('locale')) {
            $locale = session('locale');
        }

        // Check authenticated user preference
        if (auth()->check() && auth()->user()->language_preference) {
            $locale = auth()->user()->language_preference;
        }

        app()->setLocale($locale);

        return $next($request);
    }
}
```

## 13. Strategi Testing UI | UI Testing Strategy

### 13.1 Unit Testing dengan Pest/PHPUnit

```php
// tests/Feature/DashboardTest.php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Homestay;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test unauthenticated user redirected to login
     */
    public function test_unauthenticated_user_redirected_to_login(): void
    {
        $response = $this->get('/dashboard');

        $response->assertRedirectToRoute('login');
    }

    /**
     * Test authenticated user can view dashboard
     */
    public function test_authenticated_user_can_view_dashboard(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertStatus(200);
        $response->assertViewIs('dashboard');
    }

    /**
     * Test dashboard displays correct metrics
     */
    public function test_dashboard_displays_correct_metrics(): void
    {
        $user = User::factory()->create();
        Homestay::factory()->count(10)->create();

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertViewHas('totalHomestays', 10);
    }

    /**
     * Test dashboard respects user permissions
     */
    public function test_dashboard_respects_user_permissions(): void
    {
        $adminUser = User::factory()->admin()->create();
        $analyticsUser = User::factory()->analytics()->create();

        // Admin can see all data
        $adminResponse = $this->actingAs($adminUser)->get('/dashboard');
        $adminResponse->assertViewHas('showAdminPanel', true);

        // Analytics user cannot see admin panel
        $analyticsResponse = $this->actingAs($analyticsUser)->get('/dashboard');
        $analyticsResponse->assertViewHas('showAdminPanel', false);
    }
}
```

### 13.2 Component Testing dengan Livewire

```php
// tests/Feature/HomestayTableTest.php

namespace Tests\Feature;

use App\Livewire\HomestayTable;
use App\Models\Homestay;
use Livewire\Livewire;
use Tests\TestCase;

class HomestayTableTest extends TestCase
{
    /**
     * Test table displays all homestays
     */
    public function test_table_displays_all_homestays(): void
    {
        $homestays = Homestay::factory()->count(5)->create();

        Livewire::test(HomestayTable::class)
            ->assertSee($homestays[0]->nama)
            ->assertSee($homestays[4]->nama);
    }

    /**
     * Test search filters homestays
     */
    public function test_search_filters_homestays(): void
    {
        Homestay::factory()->create(['nama' => 'Rumah Indah']);
        Homestay::factory()->create(['nama' => 'Homestay Cantik']);

        Livewire::test(HomestayTable::class)
            ->set('search', 'Indah')
            ->assertSee('Rumah Indah')
            ->assertDontSee('Homestay Cantik');
    }

    /**
     * Test sorting functionality
     */
    public function test_sorting_functionality(): void
    {
        Homestay::factory()->create(['nama' => 'A Homestay']);
        Homestay::factory()->create(['nama' => 'Z Homestay']);

        Livewire::test(HomestayTable::class)
            ->call('toggleSort', 'nama')
            ->assertSee('A Homestay')  // First in ascending order
            ->call('toggleSort', 'nama')
            ->assertSee('Z Homestay'); // First in descending order (after toggle)
    }
}
```

### 13.3 Browser Testing dengan Dusk

```php
// tests/Browser/DashboardTest.php

namespace Tests\Browser;

use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DashboardTest extends DuskTestCase
{
    /**
     * Test user can login and view dashboard
     */
    public function test_user_can_login_and_view_dashboard(): void
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt($password = 'password123'),
        ]);

        $this->browse(function (Browser $browser) use ($user, $password) {
            $browser->visit('/login')
                ->type('email', 'test@example.com')
                ->type('password', $password)
                ->press('Login')
                ->assertPathIs('/dashboard')
                ->assertSee('Dashboard')
                ->assertPresent('[data-testid="metrics-card"]');
        });
    }

    /**
     * Test keyboard navigation
     */
    public function test_keyboard_navigation(): void
    {
        $user = User::factory()->create();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                ->visit('/dashboard')
                ->press('Tab')  // Focus on first element
                ->keys('Tab')   // Move to next
                ->assertFocused('[data-testid="search-input"]')
                ->keys('Tab')   // Move to next
                ->assertFocused('[data-testid="filter-button"]');
        });
    }

    /**
     * Test responsive design
     */
    public function test_responsive_design(): void
    {
        $user = User::factory()->create();

        $this->browse(function (Browser $browser) use ($user) {
            // Test mobile view
            $browser->resize(375, 812)
                ->loginAs($user)
                ->visit('/dashboard')
                ->assertPresent('.mobile-menu')
                ->assertDontSee('.desktop-sidebar');

            // Test desktop view
            $browser->maximize()
                ->visit('/dashboard')
                ->assertDontSee('.mobile-menu')
                ->assertPresent('.desktop-sidebar');
        });
    }
}
```

### 13.4 Accessibility Testing

```php
// tests/Feature/AccessibilityTest.php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class AccessibilityTest extends TestCase
{
    /**
     * Test form is keyboard accessible
     */
    public function test_form_keyboard_accessible(): void
    {
        $response = $this->get('/homestays/create');

        // Check for skip link
        $response->assertSee('skip-to-main');

        // Check main content ID
        $response->assertSee('id="main-content"');

        // Check all form labels are associated
        $response->assertSeeInOrder(['for="nama"', 'id="nama"']);
    }

    /**
     * Test color contrast compliance
     */
    public function test_color_contrast_compliance(): void
    {
        $response = $this->get('/dashboard');

        // This would use external service or local checker
        $this->assertContrastRatio('#2563EB', '#FFFFFF', '>=', 4.5);
    }

    /**
     * Test ARIA labels present
     */
    public function test_aria_labels_present(): void
    {
        $response = $this->get('/dashboard');

        $response->assertSee('aria-label="Navigation');
        $response->assertSee('aria-label="Search');
        $response->assertSee('role="status"');
    }
}
```

## Penutup | Conclusion

Style Guide ini menyediakan piawaian komprehensif untuk pembangunan `Sistem Pengurusan & Analitik Homestay Malaysia` menggunakan `Laravel Blade`, `Livewire`, dan `Volt`.

**Poin-Poin Utama:**

-   ✅ **Konsistensi:** Gunakan konvensyen penamaan dan struktur yang sama di seluruh projek
-   ✅ **Aksesibiliti:** `WCAG 2.1 AA` adalah piawaian minimum untuk semua komponen
-   ✅ **Prestasi:** Optimisasi untuk kecepatan dan responsiviti pengguna
-   ✅ **Keselamatan:** Lindungi data dengan enkripsi dan validasi
-   ✅ **Kebolehselenggaraan:** Tulis kod yang mudah dibaca dan didokumenkan

**Rujukan Penting:**

-   [Laravel Documentation](https://laravel.com/docs)
-   [Livewire Documentation](https://livewire.laravel.com/docs)
-   [Tailwind CSS Documentation](https://tailwindcss.com/docs)
-   [WCAG 2.1 Guidelines](https://www.w3.org/TR/WCAG21/)
-   [Alpine.js Documentation](https://alpinejs.dev/)

- **Versi Dokumen:** 1.0
- **Tarikh Akhir Kemaskini:** 16 Oktober 2025
- **Status:** Sedia Untuk Implementasi | Ready for Implementation

---

## Akhir Dokumen | End of Document
