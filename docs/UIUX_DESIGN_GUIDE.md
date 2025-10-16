# UI Design Guide - Homestay Management & Analytics System

- **Sistem:** Sistem Pengurusan & Analitik Homestay Malaysia
- **Pemilik Sistem:** MOTAC, Tourism Malaysia
- **Versi:** 1.1
- **Tarikh:** 16 Oktober 2025
- **Stack Teknologi:** `Laravel Blade` + `Livewire` + `Volt` + `Bootstrap 5` + `Alpine.js`

---

## Metadata Dokumen & Kawalan Versi | Document Metadata & Version Control

| Versi | Tarikh      | Perubahan | Disemak Oleh | Diluluskan Oleh |
|-------|-------------|-----------|--------------|-----------------|
| 1.0   | 16 Okt 2025 | Draf awal | BPM MOTAC    | JPK MOTAC       |
| 1.1   | 16 Okt 2025 | Updated to Bootstrap 5 (from Tailwind) | BPM MOTAC    | JPK MOTAC       |

- **Status:** Draft Awal | Initial Draft
- **Penulis:** Pasukan Frontend & UX MOTAC
- **Penyemak:** BPM MOTAC
- **Kelulusan:** Ketua Bahagian JPK MOTAC

---

## Rujukan Dokumen Berkaitan | Related Document References

| Kod  | Nama Dokumen                                      | Versi |
|------|---------------------------------------------------|-------|
| D01  | System Development Plan (SDP)                     | 1.0   |
| D02  | Business Requirements Specification (BRS)         | 1.0   |
| D03  | Software Requirements Specification (SRS)         | 1.2   |
| D04  | System Design Document (SDD)                      | 1.2   |
| D09  | Database Documentation (DBD)                      | 1.0   |
| D10  | Source Code Documentation                         | 1.0   |
| TECH | Technical Design Documentation                    | 1.1   |

---

## Daftar Kandungan | Table of Contents

1. [Pengenalan](#1-pengenalan--introduction)
2. [Prinsip & Nilai Reka Bentuk](#2-prinsip--nilai-reka-bentuk--design-principles--values)
3. [Struktur Hierarki UI](#3-struktur-hierarki-ui--ui-hierarchy-structure)
4. [Sistem Warna & Tipografi](#4-sistem-warna--tipografi--color--typography-system)
5. [Komponen & Pola Reka Bentuk](#5-komponen--pola-reka-bentuk--components--design-patterns)
6. [Blade Templating Standards](#6-blade-templating-standards)
7. [Livewire Component Architecture](#7-livewire-component-architecture)
8. [Volt & Responsive Design](#8-volt--responsive-design)
9. [Aksesibiliti (WCAG 2.1 AA)](#9-aksesibiliti--wcag-21-aa)
10. [Praktik Terbaik & Antipattern](#10-praktik-terbaik--antipattern--best-practices--antipatterns)
11. [Panduan Gaya & Konvensi](#11-panduan-gaya--konvensi--style-guide--conventions)

---

## 1. Pengenalan | Introduction

### 1.1 Tujuan Dokumen | Document Purpose

Dokumen ini menetapkan piawaian reka bentuk antara muka pengguna (UI) untuk `Sistem Pengurusan & Analitik Homestay Malaysia`. Ia berfungsi sebagai panduan bagi pembangun frontend, desainer UX, dan QA untuk memastikan konsistensi visual, kebolehgunaan, dan kepatuhan aksesibiliti di seluruh aplikasi.

### 1.2 Audiens Sasaran | Target Audience

- **Pembangun Frontend:** Implementasi komponen dan template
- **Desainer UX/UI:** Rancangan wireframe dan mockup
- **QA/Tester:** Pengesahan antara muka pengguna
- **Pemegang Taruh Bisnis:** Pemahaman maklumat dan aliran pengguna

### 1.3 Teknologi & Tools | Technology Stack

**Backend & Templating:**

- `Laravel 12+` dengan `PHP 8.2+`
- `Blade` templating engine
- `Livewire 3.x` untuk komponen reaktif server-side
- `Volt` (Livewire single-file components) untuk komponen ringkas

**Frontend & Styling:**

- `Bootstrap 5.3+` untuk responsive component framework
- `SCSS` untuk Bootstrap customization dan styling
- `Alpine.js` untuk interaktiviti klien ringan
- `Chart.js` untuk visualisasi data
- `Bootstrap Icons` untuk icon library
- `DomPDF` untuk penjanaan laporan

**Build & Assets:**

- `Vite` untuk bundling aset (CSS, JavaScript)
- `NPM` untuk pengurusan pakej

**Aksesibiliti & Validasi:**

- `axe-core` untuk scanning aksesibiliti automatik
- `Lighthouse` untuk auditi prestasi
- `WAVE` untuk penilaian kontras warna

**Note:** This project uses **Bootstrap 5** as the primary CSS framework. A `tailwind.config.js` file exists from initial scaffolding but is not actively used in the codebase.

---

## 2. Prinsip & Nilai Reka Bentuk | Design Principles & Values

### 2.1 Prinsip Utama | Core Principles

#### 1. Kejelasan & Kesederhanaan (Clarity & Simplicity)

- Maklumat yang jelas dan mudah dipahami
- Peringatan visual yang jelas untuk tindakan
- Penghapusan elemen yang tidak perlu
- Hierarki visual yang kuat

**Contoh:**

```blade
<!-- ✅ BAIK: Butang dengan label yang jelas -->
<button class="btn btn-primary">Muat Naik Data</button>

<!-- ❌ BURUK: Label yang samar -->
<button class="btn btn-primary">Proses</button>
```

#### 2. Konsistensi (Consistency)

- Pola UI yang konsisten di seluruh aplikasi
- Skema warna dan tipografi yang sama
- Tingkah laku komponen yang dapat dijangka
- Pemetaan tindakan/hasil yang seragam

#### 3. Kebolehcapaian (Accessibility)

- Semua elemen boleh digunakan tanpa tetikus (keyboard-only)
- Kontras warna memenuhi `WCAG AA` (4.5:1 untuk teks normal)
- Pembaca skrin dapat menavigasi dan memahami konten
- Maklumat tidak bergantung pada warna sahaja

#### 4. Berorientasi Pengguna (User-Centric)

- Tugas-tugas yang kerap mudah diakses
- Aliran kerja yang intuitif dan terstruktur
- Maklum balas segera untuk setiap tindakan
- Paparan data yang relevan untuk setiap peranan

#### 5. Prestasi (Performance)

- Muat halaman <2 saat untuk dashboard utama
- Interaksi responsif (<150ms untuk tindakan pengguna)
- Imej dioptimalkan dan dimampatkan
- Kod yang bersih dan tidak mubazir

### 2.2 Nilai Desain | Design Values

| Nilai        | Deskripsi                             | Implikasi UI                           |
|--------------|---------------------------------------|----------------------------------------|
| **Terpercaya** | Data akurat dan prosesnya jelas       | Paparan status, notifikasi yang jelas  |
| **Cekap**      | Pengguna berjaya dengan usaha minimal | Aliran kerja singkat, automation       |
| **Inklusif**   | Semua pengguna dapat digunakan        | WCAG AA, berbilang bahasa              |
| **Responsif**  | Cepat dan bereaksi terhadap tindakan  | Feedback real-time, loading state      |
| **Profesional**| Persembahan yang matang dan serius   | Tipografi bersih, warna kerajaan      |

---

## 3. Struktur Hierarki UI | UI Hierarchy Structure

### 3.1 Tingkatan Halaman | Page Levels

```text
┌─────────────────────────────────────────────────────────────┐
│                      LAYOUT MASTER (app.blade.php)          │
├─────────────────────────────────────────────────────────────┤
│  HEADER: Logo | Navigation | User Menu                      │
├─────────────────────────────────────────────────────────────┤
│  MAIN CONTENT AREA (Slot)                                   │
│  ┌─────────────────────────────────────────────────────────┐│
│  │  BREADCRUMB / PAGE TITLE                                ││
│  ├─────────────────────────────────────────────────────────┤│
│  │  SIDEBAR / FILTER (Optional) | PRIMARY CONTENT          ││
│  │  ┌──────────────┐  ┌──────────────────────────────────┐││
│  │  │ Filter Panel │  │ Dashboard / Table / Form          │││
│  │  │              │  │ • Cards / Metrics               │││
│  │  │              │  │ • Charts / Graphs               │││
│  │  │              │  │ • Data Tables                   │││
│  │  └──────────────┘  └──────────────────────────────────┘││
│  └─────────────────────────────────────────────────────────┘│
├─────────────────────────────────────────────────────────────┤
│  FOOTER: Links | Copyright                                  │
└─────────────────────────────────────────────────────────────┘
```

### 3.2 Zona Halaman Kunci | Key Page Zones

#### Header (Navigation Bar)

- **Fungsi:** Logo, navigasi utama, pencarian, notifikasi, profil pengguna
- **Ketinggian:** `64px` (`h-16`)
- **Z-index:** `50` (tetap atas)
- **Responsif:** Collapse ke hamburger menu di bawah `768px`

#### Sidebar (Lateral Navigation)

- **Fungsi:** Navigasi sekunder, filter, perkaitan
- **Lebar:** `256px` (`w-64`) — collapsible ke `64px`
- **Posisi:** `Fixed` atau `sticky` bergantung konteks
- **Mobile:** Drawer/modal di bawah `768px`

#### Main Content Area

- **Lebar Maksimum:** `1280px` (`container` or `container-xl`)
- **Padding:** `24px` (`p-3` or `p-4`) di desktop, `16px` (`p-3`) di mobile
- **Kolom:** 12-column grid (Bootstrap default)
- **Breakpoints:** `sm` (≥576px), `md` (≥768px), `lg` (≥992px), `xl` (≥1200px), `xxl` (≥1400px)

#### Footer

- **Fungsi:** Link tambahan, copyright, support
- **Ketinggian:** `64px` (Bootstrap auto-height with padding)
- **Latar Belakang:** Abu-abu gelap (Bootstrap `bg-dark` or custom)

### 3.3 Aliran Hierarki Komponen | Component Hierarchy Flow

```text
App Layout
├── Header
│   ├── Logo
│   ├── Navigation Menu
│   ├── Search Bar
│   ├── Notifications
│   └── User Dropdown
├── Sidebar (optional)
│   ├── Filter Sections
│   ├── Navigation Links
│   └── Quick Actions
├── Main Content
│   ├── Breadcrumb
│   ├── Page Title + Actions
│   ├── Alert/Notification
│   ├── Dashboard/Table/Form
│   │   ├── Card Component
│   │   ├── Chart Component
│   │   ├── Table Component
│   │   └── Modal/Drawer
│   └── Pagination
└── Footer
```

---

## 4. Sistem Warna & Tipografi | Color & Typography System

### 4.1 Palet Warna | Color Palette

#### Warna Utama (Primary Colors)

| Warna          | Hex     | RGB         | Penggunaan              | Kontras WCAG |
|----------------|---------|-------------|-------------------------|--------------|
| **Primary Blue** | #2563EB | 37, 99, 235 | Butang utama, link, fokus | ✅ AA          |
| **Primary Dark** | #1E40AF | 30, 64, 175 | Hover, active state     | ✅ AAA         |
| **Primary Light**| #DBEAFE | 219, 238, 254| Background, badge       | N/A          |

#### Warna Sekunder (Semantic Colors)

| Warna             | Hex     | Penggunaan                      | WCAG AA |
|-------------------|---------|---------------------------------|---------|
| **Hijau (Berjaya)** | #10B981 | Success notifications, approved status | ✅       |
| **Merah (Ralat)**   | #EF4444 | Error messages, danger actions  | ✅       |
| **Kuning (Amaran)** | #F59E0B | Warning messages, attention     | ✅       |
| **Biru Info**       | #3B82F6 | Info messages, help text        | ✅       |

#### Warna Neutral (Grayscale)

| Level | Hex     | Kegunaan                |
|-------|---------|-------------------------|
| **50**  | #F9FAFB | Background (very light) |
| **100** | #F3F4F6 | Subtle background       |
| **200** | #E5E7EB | Border, divider         |
| **500** | #6B7280 | Secondary text          |
| **700** | #374151 | Primary text            |
| **900** | #111827 | Heading, strong text    |

#### Warna Kustomisasi MOTAC (Bootstrap SCSS)

```scss
// resources/scss/_variables.scss
// Bootstrap color customization

// Primary colors (MOTAC branding)
$primary: #0EA5E9;  // MOTAC blue
$secondary: #6B7280;
$success: #10B981;
$danger: #EF4444;
$warning: #F59E0B;  // Homestay gold
$info: #3B82F6;

// Additional semantic colors
$light: #F9FAFB;
$dark: #0C3C66;  // MOTAC dark blue

// Grayscale
$gray-50: #F9FAFB;
$gray-100: #F3F4F6;
$gray-200: #E5E7EB;
$gray-500: #6B7280;
$gray-700: #374151;
$gray-900: #111827;

// Custom theme colors (optional)
$theme-colors: (
  "motac-light": #E0F2FE,
  "motac-dark": #075985,
  "homestay-gold": #F59E0B,
);

// Import Bootstrap with custom variables
@import 'bootstrap/scss/bootstrap';
```

**Usage in HTML:**

```blade
<!-- Using Bootstrap color utilities -->
<div class="bg-primary text-white p-3">Primary background</div>
<div class="bg-success text-white p-3">Success background</div>
<button class="btn btn-primary">Primary Button</button>
<p class="text-secondary">Secondary text</p>
<div class="bg-motac-light p-3">Custom MOTAC light background</div>
```

### 4.2 Tipografi | Typography System

#### Jenis Fon | Font Families

```scss
// resources/scss/_variables.scss
// Bootstrap font family customization

$font-family-sans-serif: 'Figtree', 'Segoe UI', 'Roboto', -apple-system, BlinkMacSystemFont, sans-serif;
$font-family-monospace: 'Fira Code', 'Courier New', monospace;

// Import Bootstrap with custom fonts
@import 'bootstrap/scss/bootstrap';
```

**Font Loading (in HTML):**

```blade
<!-- In layout head -->
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
```

**Pilihan Fon:**

- **Primary:** Figtree (modern, boleh dibaca, aksesibel) - **Actual project font**
- **Backup:** Segoe UI (Windows), -apple-system (macOS)
- **Fallback:** Sans-serif
- **Monospace:** Fira Code, Courier New

#### Saiz & Berat Fon | Font Sizes & Weights

| Nama         | Saiz           | Berat | Line Height | Kegunaan              |
|--------------|----------------|-------|-------------|-----------------------|
| **H1**       | 32px (2rem)    | 700   | 1.2         | Tajuk halaman utama   |
| **H2**       | 28px (1.75rem) | 700   | 1.3         | Subjudul halaman      |
| **H3**       | 24px (1.5rem)  | 600   | 1.4         | Judul bahagian        |
| **H4**       | 20px (1.25rem) | 600   | 1.5         | Judul subheading      |
| **H5**       | 18px (1.125rem)| 600   | 1.5         | Label, subheading     |
| **Body Base**| 16px (1rem)    | 400   | 1.6         | Teks utama, paragraf  |
| **Body Small**| 14px (0.875rem)| 400   | 1.5         | Teks sekunder, hint   |
| **Caption**  | 12px (0.75rem) | 500   | 1.4         | Label, caption        |
| **Code**     | 14px (0.875rem)| 400   | 1.5         | Monospace, error messages |

#### Kombinasi Bootstrap

```html
<!-- Bootstrap Typography Classes -->
<h1 class="display-4 fw-bold lh-sm">Tajuk Halaman</h1>
<h2 class="display-6 fw-bold">Subjudul</h2>
<h3 class="h3 fw-semibold">Judul Bahagian</h3>
<p class="lead">Teks utama yang lebih besar</p>
<p class="fw-normal lh-base">Teks tubuh standard</p>
<small class="text-muted small">Teks kecil</small>
<code class="font-monospace bg-light px-2 py-1">code example</code>
```

**Bootstrap Font Weight Classes:**

- `fw-light` (300), `fw-normal` (400), `fw-medium` (500), `fw-semibold` (600), `fw-bold` (700)

**Bootstrap Text Size Classes:**

- `fs-1` to `fs-6` for heading sizes
- `small` for smaller text
- `lead` for emphasized paragraph text

### 4.3 Sistem Spacing | Spacing System

Bootstrap default `1rem` (16px) base unit (`$spacer`):

| Nilai | Pixel | Bootstrap | Kegunaan               |
|-------|-------|-----------|------------------------|
| **0**   | 0px   | `p-0`, `m-0` | No padding/margin   |
| **1**   | 4px   | `p-1`, `m-1` | Minimal spacing     |
| **2**   | 8px   | `p-2`, `m-2` | Small spacing       |
| **3**   | 16px  | `p-3`, `m-3` | Normal spacing (default) |
| **4**   | 24px  | `p-4`, `m-4` | Large spacing       |
| **5**   | 48px  | `p-5`, `m-5` | Extra large spacing |

**Directional Spacing:**

- `t` (top), `b` (bottom), `s` (start/left), `e` (end/right)
- `x` (horizontal), `y` (vertical)

```blade
<!-- Bootstrap Spacing Examples -->
<div class="p-3 mb-4">Padding 16px all sides, margin-bottom 24px</div>
<button class="px-3 py-2">Padding 16px horizontal, 8px vertical</button>
<div class="mt-5 mx-auto">Margin-top 48px, centered horizontally</div>
<div class="g-3">Gap 16px (for grid/flex)</div>
```

### 4.4 Bayangan & Kedalaman | Shadows & Depth

Bootstrap provides built-in shadow utilities:

```blade
<!-- Bootstrap Shadow Examples -->
<div class="shadow-none">No shadow</div>
<div class="shadow-sm">Small shadow - subtle elevation</div>
<div class="shadow">Normal shadow - standard cards</div>
<div class="shadow-lg">Large shadow - modals, dropdowns</div>
```

| Kedalaman       | Bootstrap Class | Kegunaan                |
|-----------------|-----------------|-------------------------|
| **None**        | `shadow-none`   | Flat, no elevation      |
| **Small**       | `shadow-sm`     | Subtle, inline elements |
| **Normal**      | `shadow`        | Cards, elevated content |
| **Large**       | `shadow-lg`     | Modals, dropdowns, popovers |

**Custom Shadows (SCSS):**

```scss
// resources/scss/_variables.scss
$box-shadow-sm: 0 .125rem .25rem rgba(0, 0, 0, .075);
$box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15);
$box-shadow-lg: 0 1rem 3rem rgba(0, 0, 0, .175);
```

---

## 5. Komponen & Pola Reka Bentuk | Components & Design Patterns

### 5.1 Komponen Utama | Core Components

#### A. Button Component

**Varian:**

```blade
{{-- Primary (Main action) --}}
<button class="btn btn-primary">Simpan</button>

{{-- Secondary (Alternative) --}}
<button class="btn btn-secondary">Batal</button>

{{-- Danger (Destructive) --}}
<button class="btn btn-danger">Padam</button>

{{-- Ghost/Link Style --}}
<button class="btn btn-link">Link-style</button>

{{-- Outline Variants --}}
<button class="btn btn-outline-primary">Outline Primary</button>

{{-- Disabled --}}
<button class="btn btn-primary" disabled>Dimusnahkan</button>

{{-- Loading (with Livewire) --}}
<button class="btn btn-primary" wire:loading.attr="disabled">
    <span wire:loading.remove>Simpan</span>
    <span wire:loading>
        <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
        Loading...
    </span>
</button>
```

**Size Variants:**

```blade
<button class="btn btn-primary btn-sm">Kecil</button>
<button class="btn btn-primary">Normal (default)</button>
<button class="btn btn-primary btn-lg">Besar</button>
<button class="btn btn-primary w-100">Full Width</button>
```

**Reusable Component (Blade/Volt):**

```blade
{{-- resources/views/components/button.blade.php --}}
@props([
    'variant' => 'primary',
    'size' => '',  // empty for default, 'sm' or 'lg'
    'disabled' => false,
    'type' => 'button',
    'loading' => false,
    'outline' => false,
])

@php
    $classes = 'btn';
    $classes .= $outline ? ' btn-outline-' . $variant : ' btn-' . $variant;
    $classes .= $size ? ' btn-' . $size : '';
@endphp

<button 
    type="{{ $type }}" 
    {{ $disabled || $loading ? 'disabled' : '' }}
    class="{{ $classes }}"
    {{ $attributes }}
>
    @if ($loading)
        <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
    @endif
    {{ $slot }}
</button>
```

**Usage:**

```blade
<x-button variant="primary" size="lg" wire:click="submitForm">
    Hantar Data
</x-button>

<x-button variant="danger" :outline="true" size="sm">
    Padam
</x-button>
```

#### B. Form Input Component

```blade
{{-- resources/views/components/form-input.blade.php --}}
@props([
    'name',
    'label' => null,
    'type' => 'text',
    'required' => false,
    'error' => null,
    'placeholder' => '',
    'helpText' => null,
])

<div class="mb-3">
    @if ($label)
        <label for="{{ $name }}" class="form-label">
            {{ $label }}
            @if ($required)
                <span class="text-danger" aria-label="diperlukan">*</span>
            @endif
        </label>
    @endif

    <input 
        type="{{ $type }}"
        id="{{ $name }}"
        name="{{ $name }}"
        class="form-control {{ $error ? 'is-invalid' : '' }}"
        placeholder="{{ $placeholder }}"
        {{ $required ? 'required' : '' }}
        {{ $attributes }}
    />

    @if ($error)
        <div class="invalid-feedback d-block" id="{{ $name }}-error">
            {{ $error }}
        </div>
    @endif

    @if ($helpText)
        <small class="form-text text-muted d-block">{{ $helpText }}</small>
    @endif
</div>
```

#### C. Card Component

```blade
{{-- resources/views/components/card.blade.php --}}
@props([
    'title' => null,
    'subtitle' => null,
    'header' => null,
    'footer' => null,
    'elevated' => true,
])

<div class="card {{ $elevated ? '' : 'border-0' }}">
    @if ($header)
        <div class="card-header">
            {{ $header }}
        </div>
    @elseif ($title)
        <div class="card-header">
            <h3 class="card-title mb-0">{{ $title }}</h3>
            @if ($subtitle)
                <p class="text-muted small mb-0 mt-1">{{ $subtitle }}</p>
            @endif
        </div>
    @endif

    <div class="card-body">
        {{ $slot }}
    </div>

    @if ($footer)
        <div class="card-footer">
            {{ $footer }}
        </div>
    @endif
</div>
```

#### D. Alert Component

```blade
{{-- resources/views/components/alert.blade.php --}}
@props([
    'type' => 'info', // info, success, warning, danger
    'dismissible' => true,
    'title' => null,
])

@php
    $alertClass = match($type) {
        'info' => 'alert-info',
        'success' => 'alert-success',
        'warning' => 'alert-warning',
        'danger' => 'alert-danger',
    };
@endphp

<div class="alert {{ $alertClass }} {{ $dismissible ? 'alert-dismissible fade show' : '' }} d-flex align-items-start" role="alert">
    <div class="me-3">
        {{-- Icon placement --}}
    </div>
    <div>
        @if ($title)
            <h4 class="alert-heading">{{ $title }}</h4>
        @endif
        <div>
            {{ $slot }}
        </div>
    </div>
    @if ($dismissible)
        <button 
            type="button" 
            class="btn-close" 
            data-bs-dismiss="alert" 
            aria-label="Tutup amaran"
        ></button>
    @endif
</div>
```

#### E. Modal/Dialog Component

```blade
{{-- resources/views/components/modal.blade.php --}}
@props([
    'id',
    'title' => null,
    'size' => 'md', // sm, md, lg, xl
    'footer' => null,
    'centered' => true,
])

@php
    $sizeClass = match($size) {
        'sm' => 'modal-sm',
        'md' => '',
        'lg' => 'modal-lg',
        'xl' => 'modal-xl',
    };
@endphp

<div 
    id="{{ $id }}" 
    class="modal fade" 
    tabindex="-1" 
    role="dialog"
    aria-labelledby="{{ $id }}-label"
    aria-hidden="true"
>
    <div class="modal-dialog {{ $sizeClass }} {{ $centered ? 'modal-dialog-centered' : '' }}" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="{{ $id }}-label">{{ $title }}</h5>
                <button 
                    type="button" 
                    class="btn-close" 
                    data-bs-dismiss="modal" 
                    aria-label="Tutup"
                ></button>
            </div>

            <div class="modal-body">
                {{ $slot }}
            </div>

            @if ($footer)
                <div class="modal-footer">
                    {{ $footer }}
                </div>
            @endif
        </div>
    </div>
</div>

{{-- Usage Example: --}}
{{--
<x-modal id="importModal" title="Muat Naik Data" size="lg">
    <form>
        <input type="file" class="form-control mb-3">
    </form>
    @slot('footer')
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary">Hantar</button>
    @endslot
</x-modal>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#importModal">
    Buka Modal
</button>
--}}
```

#### F. Table Component

```blade
{{-- resources/views/components/data-table.blade.php --}}
@props([
    'columns', // Array of column definitions
    'rows',    // Array of data rows
    'striped' => true,
    'hover' => true,
    'sortable' => true,
])

<div class="table-responsive">
    <table class="table {{ $striped ? 'table-striped' : '' }} {{ $hover ? 'table-hover' : '' }}">
        <thead class="table-light">
            <tr>
                @foreach ($columns as $column)
                    <th scope="col">
                        @if ($sortable && ($column['sortable'] ?? true))
                            <button class="btn btn-link btn-sm p-0">
                                {{ $column['label'] }}
                                <i class="bi bi-arrow-down" style="font-size: 0.75rem;"></i>
                            </button>
                        @else
                            {{ $column['label'] }}
                        @endif
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @forelse ($rows as $row)
                <tr>
                    @foreach ($columns as $column)
                        <td>
                            {{ $row[$column['key']] ?? '-' }}
                        </td>
                    @endforeach
                </tr>
            @empty
                <tr>
                    <td colspan="{{ count($columns) }}" class="text-center text-muted py-4">
                        Tiada data ditemui
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if (method_exists($rows, 'links'))
    <div class="mt-3">
        {{ $rows->links() }}
    </div>
@endif
```

### 5.2 Pola Reka Bentuk | Design Patterns

#### Pattern 1: Loading State

```blade
{{-- Blade Implementation with Livewire --}}
<div wire:loading wire:target="submitData">
    <div class="spinner-border" role="status">
        <span class="visually-hidden">Memuatkan...</span>
    </div>
</div>

<div wire:loading.remove wire:target="submitData">
    {{-- Content --}}
</div>
```

#### Pattern 2: Empty State

```blade
{{-- Empty state component --}}
<div class="py-5 text-center text-muted">
    <i class="bi bi-inbox" style="font-size: 3rem;"></i>
    <h3 class="mt-3 mb-2">Tiada data ditemui</h3>
    <p class="mb-3">Mula dengan membuat entri pertama anda</p>
    <x-button href="{{ route('create') }}" variant="primary">Buat Baru</x-button>
</div>
```

#### Pattern 3: Error Boundary

```blade
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <div class="d-flex">
        <div class="flex-shrink-0">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
        </div>
        <div>
            <h4 class="alert-heading">Ralat memuatkan data</h4>
            <p class="mb-0">
                {{ $error->getMessage() }}
            </p>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
    </div>
</div>

<button type="button" class="btn btn-primary" onclick="location.reload()">
    Cuba Semula
</button>
```

#### Pattern 4: Breadcrumb Navigation

```blade
{{-- Breadcrumb Component --}}
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        @foreach ($breadcrumbs as $breadcrumb)
            <li class="breadcrumb-item {{ $loop->last ? 'active' : '' }}">
                @if (!$loop->last)
                    <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['label'] }}</a>
                @else
                    {{ $breadcrumb['label'] }}
                @endif
            </li>
        @endforeach
    </ol>
</nav>
```

#### Pattern 5: Toast Notification

```blade
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto">Pemberitahuan</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Tutup"></button>
        </div>
        <div class="toast-body">
            {{ $message }}
        </div>
    </div>
</div>
```

---

## 6. Blade Templating Standards

### 6.1 Struktur Fail Blade | Blade File Structure

```bash
resources/
├── views/
│   ├── layouts/
│   │   ├── app.blade.php              # Master layout
│   │   ├── guest.blade.php            # Guest layout (login)
│   │   └── admin.blade.php            # Admin layout
│   ├── components/
│   │   ├── button.blade.php           # Reusable button
│   │   ├── card.blade.php             # Reusable card
│   │   ├── form-input.blade.php       # Form input
│   │   └── navbar.blade.php           # Navigation
│   ├── pages/
│   │   ├── dashboard.blade.php        # Dashboard
│   │   ├── homestays/
│   │   │   ├── index.blade.php
│   │   │   ├── show.blade.php
│   │   │   ├── create.blade.php
│   │   │   └── edit.blade.php
│   │   └── reports/
│   ├── emails/
│   │   ├── welcome.blade.php          # Email templates
│   │   └── report-ready.blade.php
│   └── errors/
│       ├── 404.blade.php
│       └── 500.blade.php
```

### 6.2 Master Layout Template | Master Layout Template

```blade
{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ms' ? 'ltr' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'MOTAC Homestay Management System')</title>

    {{-- Styles --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Custom styles --}}
    @stack('styles')

    {{-- Accessibility Meta Tags --}}
    <meta name="theme-color" content="#2563EB">
    <meta name="apple-mobile-web-app-capable" content="yes">
</head>
<body class="bg-light">
    {{-- Navigation --}}
    <header class="bg-white shadow-sm sticky-top" style="z-index: 1020;">
        @include('components.navbar')
    </header>

    <div class="d-flex">
        {{-- Sidebar (optional) --}}
        @auth
            <aside class="d-none d-md-flex" style="width: 16rem; background-color: #f8f9fa;">
                @include('components.sidebar')
            </aside>
        @endauth

        {{-- Main Content --}}
        <main class="flex-grow-1" style="min-height: 100vh;">
            {{-- Alert Messages --}}
            @if ($errors->any())
                <div class="alert alert-danger border-start ps-3 mb-3">
                    <h5 class="alert-heading">Ralat Pengesahan</h5>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Session Success --}}
            @if (session('success'))
                <x-alert type="success" dismissible>
                    {{ session('success') }}
                </x-alert>
            @endif

            {{-- Content Slot --}}
            <div class="container-lg px-3 py-5">
                @yield('content')
            </div>
        </main>
    </div>

    {{-- Footer --}}
    <footer class="bg-dark text-light border-top">
        @include('components.footer')
    </footer>

    {{-- Scripts --}}
    @stack('scripts')
</body>
</html>
```

### 6.3 Konvensi Penamaan | Naming Conventions

```blade
{{-- Variables: camelCase --}}
@php
    $userCount = 100;
    $isAdmin = auth()->user()->isAdmin();
@endphp

{{-- Slots: kebab-case --}}
<x-card title="Peraturan Umum">
    <x-slot name="header">
        Header content
    </x-slot>

    <x-slot name="footer">
        Footer content
    </x-slot>
</x-card>

{{-- Methods: camelCase --}}
{{ $user->getFullName() }}

{{-- Component attributes: camelCase in PHP, kebab-case in HTML --}}
<x-button :disabled="!$isValid" @click="handleClick">
    Simpan
</x-button>
```

### 6.4 Best Practices | Best Practices

#### ✅ DO's

```blade
{{-- ✅ Extract repeated code to components --}}
@foreach ($users as $user)
    <x-user-card :user="$user" />
@endforeach

{{-- ✅ Use Blade's built-in directives --}}
@auth
    <p>Authenticated user</p>
@endauth

{{-- ✅ Use nullable/optional operators --}}
<p>{{ $user?->email ?? 'No email' }}</p>

{{-- ✅ Use slot for flexible content --}}
<x-card>
    <x-slot name="title">Dynamic Title</x-slot>
    Card content
</x-card>

{{-- ✅ Escape user input --}}
<p>{{ $userInput }}</p>  {{-- Blade auto-escapes --}}

{{-- ✅ Use wire:loading for async operations --}}
<button wire:click="submit" wire:loading.attr="disabled">
    <span wire:loading.remove>Hantar</span>
    <span wire:loading>Memproses...</span>
</button>
```

#### ❌ DON'Ts

```blade
{{-- ❌ Avoid raw HTML output without escaping --}}
<p>{!! $userInput !!}</p>  {{-- Dangerous! --}}

{{-- ❌ Don't mix too much logic in views --}}
@foreach ($users as $user)
    @if ($user->isActive && $user->role === 'admin' && $user->lastLogin > now()->subDays(7))
        {{-- Complex logic here --}}
    @endif
@endforeach

{{-- ✅ Instead, move to controller --}}
@foreach ($activeAdminUsers as $user)
    {{-- Use pre-processed data --}}
@endforeach

{{-- ❌ Avoid inline styles --}}
<div style="padding: 1rem; color: blue;">Content</div>

{{-- ✅ Use Bootstrap classes --}}
<div class="p-4 text-primary">Content</div>

{{-- ❌ Don't hardcode URLs --}}
<a href="/users/{{ $user->id }}">View Profile</a>

{{-- ✅ Use route() helper --}}
<a href="{{ route('users.show', $user) }}">View Profile</a>
```

---

## 7. Livewire Component Architecture

### 7.1 Struktur Komponen Livewire | Livewire Component Structure

```php
<?php
// app/Livewire/ImportDataForm.php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class ImportDataForm extends Component
{
    use WithFileUploads;

    // Properties with validation
    #[Validate('required|file|mimes:xlsx,csv|max:10240')]
    public $file;

    #[Validate('required|string')]
    public $importType = 'homestay';

    // Reactive properties
    public $isProcessing = false;
    public $uploadProgress = 0;
    public $successMessage = '';
    public $errorMessage = '';

    /**
     * Handle file upload and processing
     */
    public function submitImport()
    {
        // Validate form data
        $this->validate();

        $this->isProcessing = true;

        try {
            // Process the file
            $result = app('ImportDataService')->process(
                $this->file,
                $this->importType
            );

            $this->successMessage = "Data berhasil diimport: {$result['count']} baris";
            $this->resetForm();

            // Emit event to update dashboard
            $this->dispatch('data-imported', ['count' => $result['count']]);

        } catch (\Exception $e) {
            $this->errorMessage = $e->getMessage();

        } finally {
            $this->isProcessing = false;
        }
    }

    /**
     * Reset form
     */
    public function resetForm()
    {
        $this->reset(['file', 'importType']);
    }

    /**
     * Render the component
     */
    public function render()
    {
        return view('livewire.import-data-form');
    }
}
```

### 7.2 Templat Livewire | Livewire Template

```blade
{{-- resources/views/livewire/import-data-form.blade.php --}}
<div class="mb-4">
    {{-- Header --}}
    <div class="mb-4">
        <h2 class="h4 fw-bold text-dark">Muat Naik Data</h2>
        <p class="text-muted small">
            Muat naik fail Excel atau CSV untuk memproses data homestay
        </p>
    </div>

    {{-- Form --}}
    <form wire:submit="submitImport" class="mb-4">
        {{-- Import Type Selection --}}
        <div class="mb-3">
            <label class="form-label">
                Jenis Data
            </label>
            <select 
                wire:model="importType"
                class="form-select"
            >
                <option value="homestay">Data Homestay</option>
                <option value="performance">Data Prestasi</option>
                <option value="capacity">Data Kapasiti</option>
            </select>
        </div>

        {{-- File Input --}}
        <div class="mb-3">
            <label class="form-label">
                Pilih Fail
                <span class="text-danger">*</span>
            </label>
            <div class="border border-2 border-dashed rounded p-4 
                        {{ $errors->has('file') ? 'border-danger' : 'border-secondary' }}">
                <input 
                    type="file"
                    wire:model="file"
                    accept=".xlsx,.csv"
                    class="d-none"
                    id="file-upload"
                />
                <label for="file-upload" class="cursor-pointer">
                    <div class="text-center">
                        <i class="bi bi-cloud-arrow-up text-muted" style="font-size: 3rem;"></i>
                        <p class="mt-3 text-dark fw-bold">
                            Klik untuk memilih atau seret fail ke sini
                        </p>
                        <p class="text-muted small mt-1">
                            Format: XLSX, CSV (Max 10MB)
                        </p>
                    </div>
                </label>
            </div>

            {{-- File preview --}}
            @if ($file)
                <div class="mt-2 d-flex align-items-center gap-2 p-2 bg-light rounded">
                    <i class="bi bi-file-earmark-spreadsheet text-primary"></i>
                    <span class="text-sm">{{ $file->getClientOriginalName() }}</span>
                    <button 
                        type="button"
                        wire:click="$set('file', null)"
                        class="ms-auto btn btn-sm btn-link"
                    >
                        Padam
                    </button>
                </div>
            @endif

            @error('file')
                <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
            @enderror
        </div>

        {{-- Progress Bar --}}
        @if ($isProcessing)
            <div class="mb-3">
                <div class="d-flex justify-content-between text-muted small mb-2">
                    <span>Memproses...</span>
                    <span>{{ $uploadProgress }}%</span>
                </div>
                <div class="progress">
                    <div 
                        class="progress-bar progress-bar-striped progress-bar-animated"
                        role="progressbar" 
                        style="width: {{ $uploadProgress }}%"
                        aria-valuenow="{{ $uploadProgress }}" 
                        aria-valuemin="0" 
                        aria-valuemax="100"
                    ></div>
                </div>
            </div>
        @endif

        {{-- Alert Messages --}}
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

        {{-- Submit Button --}}
        <div class="d-flex gap-3 pt-2">
            <x-button 
                type="submit"
                variant="primary"
                :loading="$isProcessing"
                :disabled="!$file || $isProcessing"
            >
                {{ $isProcessing ? 'Memproses...' : 'Hantar' }}
            </x-button>
            <x-button 
                type="button"
                variant="secondary"
                wire:click="resetForm"
                :disabled="$isProcessing"
            >
                Batal
            </x-button>
        </div>
    </form>
</div>
```

### 7.3 Real-time Dashboard dengan Livewire | Real-time Dashboard

```php
<?php
// app/Livewire/DashboardMetrics.php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Homestay;
use App\Models\Performance;

class DashboardMetrics extends Component
{
    // Auto-refresh every 30 seconds
    public $refreshInterval = 30000;

    // Data properties
    public $totalHomestays = 0;
    public $totalVisitors = 0;
    public $totalRevenue = 0;
    public $occupancyRate = 0;

    /**
     * Mount component
     */
    public function mount()
    {
        $this->refreshMetrics();
    }

    /**
     * Refresh metrics from database
     */
    public function refreshMetrics()
    {
        $this->totalHomestays = Homestay::where('status', 'active')->count();

        // Get current month metrics
        $currentMonth = now();
        $performances = Performance::where('tahun', $currentMonth->year)
            ->where('bulan', $currentMonth->month)
            ->get();

        $this->totalVisitors = $performances->sum(function($p) {
            return $p->pelawat_domestik + $p->pelawat_asing;
        });

        $this->totalRevenue = $performances->sum('pendapatan');

        // Calculate occupancy rate
        $totalCapacity = Homestay::where('status', 'active')->sum('kapasiti') * 30;
        $this->occupancyRate = $totalCapacity > 0 
            ? round(($this->totalVisitors / $totalCapacity) * 100, 2)
            : 0;
    }

    /**
     * Listen for data-imported event
     */
    #[On('data-imported')]
    public function onDataImported($data)
    {
        $this->refreshMetrics();
    }

    /**
     * Render the component
     */
    public function render()
    {
        return view('livewire.dashboard-metrics');
    }
}
```

```blade
{{-- resources/views/livewire/dashboard-metrics.blade.php --}}
<div class="row g-4" wire:poll.{{ $refreshInterval }}ms>
    {{-- Card 1: Total Homestays --}}
    <div class="col-12 col-md-6 col-lg-3">
        <x-card title="Jumlah Homestay">
            <div class="h2 text-primary fw-bold">{{ $totalHomestays }}</div>
            <p class="text-muted small mb-0 mt-2">Berdaftar dan aktif</p>
        </x-card>
    </div>

    {{-- Card 2: Total Visitors --}}
    <div class="col-12 col-md-6 col-lg-3">
        <x-card title="Pelawat (Bulan Ini)">
            <div class="h2 text-success fw-bold">{{ number_format($totalVisitors) }}</div>
            <p class="text-muted small mb-0 mt-2">Domestik + Asing</p>
        </x-card>
    </div>

    {{-- Card 3: Total Revenue --}}
    <div class="col-12 col-md-6 col-lg-3">
        <x-card title="Hasil (Bulan Ini)">
            <div class="h2 fw-bold" style="color: #9333ea;">
                RM {{ number_format($totalRevenue, 2) }}
            </div>
            <p class="text-muted small mb-0 mt-2">Jumlah keseluruhan</p>
        </x-card>
    </div>

    {{-- Card 4: Occupancy Rate --}}
    <div class="col-12 col-md-6 col-lg-3">
        <x-card title="Kadar Penghunian">
            <div class="h2 text-warning fw-bold">{{ $occupancyRate }}%</div>
            <div class="progress mt-3" style="height: 0.5rem;">
                <div 
                    class="progress-bar bg-warning"
                    role="progressbar"
                    style="width: {{ $occupancyRate }}%"
                ></div>
            </div>
        </x-card>
    </div>
</div>
```

### 7.4 Livewire Best Practices

```php
// ✅ GOOD: Use array for related properties
public array $user = [
    'firstName' => '',
    'lastName' => '',
    'email' => '',
    'phone' => '',
];

// ❌ BAD: Multiple properties for one entity
public $firstName;
public $lastName;
public $email;
public $phone;
```

---

## 8. Volt & Responsive Design

### 8.1 Volt Component (Single-File)

```php
<?php
// resources/views/components/user-profile.php

use Livewire\Attributes\Validate;
use Livewire\Volt\Component;
use App\Models\User;

new class extends Component {
    #[Validate('required|string|max:255')]
    public string $name = '';

    #[Validate('required|email|unique:users,email')]
    public string $email = '';

    public User $user;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function update()
    {
        $this->validate();

        $this->user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        session()->flash('success', 'Profil dikemas kini');
    }
}; ?>

<div class="mb-4">
    <h2 class="h4 fw-bold">Kemaskini Profil</h2>

    <form wire:submit="update" class="mt-3">
        <x-form-input
            name="name"
            label="Nama"
            wire:model="name"
            :error="$errors->first('name')"
        />

        <x-form-input
            name="email"
            type="email"
            label="Email"
            wire:model="email"
            :error="$errors->first('email')"
        />

        <div class="d-flex gap-2 mt-3">
            <x-button type="submit" variant="primary">Simpan Perubahan</x-button>
            <x-button type="button" variant="secondary" wire:click="$refresh">Batal</x-button>
        </div>
    </form>
</div>
```

### 8.2 Responsive Breakpoints | Responsive Breakpoints

```text
/* Bootstrap 5 Breakpoints */
xs  → <576px   (Mobile phones, default)
sm  → ≥576px   (Small devices)
md  → ≥768px   (Tablets)
lg  → ≥992px   (Desktops)
xl  → ≥1200px  (Large desktops)
xxl → ≥1400px  (Ultra-wide screens)
```

**Usage:**

```blade
{{-- Hidden on mobile, visible on tablet+ --}}
<div class="d-none d-md-block">Desktop content</div>

{{-- Mobile-first responsive grid --}}
<div class="row g-4">
    <div class="col-12 col-md-6 col-lg-4">
        <x-card>Item 1</x-card>
    </div>
    <div class="col-12 col-md-6 col-lg-4">
        <x-card>Item 2</x-card>
    </div>
    <div class="col-12 col-md-6 col-lg-4">
        <x-card>Item 3</x-card>
    </div>
</div>

{{-- Responsive padding --}}
<div class="px-3 px-md-4 px-lg-5">Content</div>

{{-- Responsive text size --}}
<h1 class="fs-5 fs-md-4 fs-lg-3 fw-bold">Tajuk</h1>
```

### 8.3 Mobile-First Design Principles {#mobile-first-design}

```blade
{{-- ✅ Always start with mobile design --}}

{{-- Navigation: Hidden hamburger on mobile, horizontal on desktop --}}
<nav class="d-none d-md-flex gap-3">
    <a href="#" class="nav-link">Home</a>
    <a href="#" class="nav-link">About</a>
</nav>

<button class="d-md-none btn btn-link" @click="mobileMenuOpen = !mobileMenuOpen">
    <i class="bi bi-list"></i>
</button>

{{-- Sidebar: Full-width on mobile, side-by-side on desktop --}}
<div class="row g-4">
    <aside class="col-12 col-md-3 col-lg-3">
        <div class="bg-light p-3">
            Sidebar content
        </div>
    </aside>
    <main class="col-12 col-md-9 col-lg-9">
        Main content
    </main>
</div>

{{-- Touch-friendly buttons on mobile --}}
<button class="btn btn-primary py-2 py-md-2">
    Padding for comfortable touch on mobile
</button>
```

---

## 9. Aksesibiliti | Accessibility (WCAG 2.1 AA)

### 9.1 Semantic HTML & ARIA

```blade
{{-- ✅ Semantic HTML --}}
<nav aria-label="Main navigation">
    <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/about">About</a></li>
    </ul>
</nav>

<main role="main">
    <article>
        <header>
            <h1>Article Title</h1>
        </header>
        <section>
            Content
        </section>
    </article>
</main>

<footer role="contentinfo">
    Footer content
</footer>

{{-- ✅ ARIA attributes for dynamic content --}}
<button 
    @click="open = !open"
    :aria-expanded="open"
    aria-controls="menu"
>
    Menu
</button>

<div id="menu" :hidden="!open" role="navigation">
    Menu items
</div>

{{-- ✅ Form accessibility --}}
<label for="email" class="d-block small fw-medium">
    Email Address
    <span class="text-danger" aria-label="required">*</span>
</label>

<input 
    id="email"
    type="email"
    required
    aria-describedby="email-help"
    class="form-control"
/>

<p id="email-help" class="small text-muted mt-2">
    We'll never share your email address
</p>

{{-- ✅ Alerts and error messages --}}
<div role="alert" class="alert alert-danger">
    <strong>Error:</strong> Please correct the following fields
    <ul class="list-unstyled mt-2 ps-3">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>

{{-- ✅ Loading states for assistive technology --}}
<button 
    wire:click="submit" 
    wire:loading.attr="disabled"
    aria-busy="$isLoading"
    class="btn btn-primary"
>
    <span wire:loading.remove>Submit</span>
    <span wire:loading aria-live="polite">
        Loading...
    </span>
</button>

{{-- ✅ Skip to main content link --}}
<a href="#main-content" class="visually-hidden-focusable d-block">
    Skip to main content
</a>

<main id="main-content">
    Page content
</main>
```

### 9.2 Keyboard Navigation {#keyboard-navigation}

```blade
{{-- ✅ Logical tab order --}}
<div class="flex flex-col gap-4">
    <input type="text" placeholder="First" tabindex="1">
    <input type="email" placeholder="Second" tabindex="2">
    <button tabindex="3">Submit</button>
</div>
```

```css
/* ✅ Focus visible indicator */
input:focus,
button:focus,
a:focus {
    outline: 3px solid #2563EB;
    outline-offset: 2px;
}
```

```blade
{{-- ✅ Skip to main content link --}}
<a href="#main-content" class="visually-hidden-focusable d-block position-fixed top-0 start-0 bg-primary text-white p-3" style="z-index: 100000;">
    Skip to main content
</a>

{{-- ✅ Modal dialog with focus trap (using Bootstrap modal) --}}
<div id="importModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="modalTitle" class="modal-title">Import Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form>
                    <input type="file" id="fileInput" accept=".xlsx,.csv" class="form-control mb-3" autofocus>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Import</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#importModal">
    Open Modal
</button>

{{-- ❌ DON'T: Use tabindex > 0 --}}
<button tabindex="5">Button with high tabindex</button> {{-- ❌ Avoid --}}

{{-- ❌ DON'T: Remove focus outline without replacement --}}
<button style="outline: none;">No outline</button> {{-- ❌ Bad --}}

{{-- ❌ DON'T: Use div/span for interactive content --}}
<div onclick="handleClick()" class="cursor-pointer">Clickable text</div> {{-- ❌ Not keyboard accessible --}}

{{-- ✅ Use semantic buttons/links instead --}}
<button onclick="handleClick()">Clickable action</button> {{-- ✅ Good --}}
```

### 9.2.1 Focus Management dengan Alpine.js

```javascript
// Alpine component with focus management
document.addEventListener('alpine:init', () => {
    Alpine.data('importDialog', () => ({
        open: false,
        firstFocusableElement: null,
        lastFocusableElement: null,

        openDialog() {
            this.open = true;
            this.$nextTick(() => {
                this.firstFocusableElement = this.$el.querySelector('input[type="file"]');
                this.lastFocusableElement = this.$el.querySelector('button:last-of-type');

                // Focus first element
                this.firstFocusableElement?.focus();

                // Trap focus within dialog
                this.$el.addEventListener('keydown', this.handleTabKey.bind(this));
            });
        },

        closeDialog() {
            this.open = false;
            this.$el.removeEventListener('keydown', this.handleTabKey);
            // Return focus to trigger button
            document.querySelector('[data-open-import]')?.focus();
        },

        handleTabKey(event) {
            if (event.key === 'Tab') {
                if (event.shiftKey) {
                    // Shift+Tab on first element → focus last
                    if (document.activeElement === this.firstFocusableElement) {
                        event.preventDefault();
                        this.lastFocusableElement?.focus();
                    }
                } else {
                    // Tab on last element → focus first
                    if (document.activeElement === this.lastFocusableElement) {
                        event.preventDefault();
                        this.firstFocusableElement?.focus();
                    }
                }
            }

            // Esc key closes dialog
            if (event.key === 'Escape') {
                this.closeDialog();
            }
        }
    }));
});
```

### 9.2.2 Keyboard Shortcut Patterns

```blade
{{-- Keyboard shortcuts help text --}}
<div class="alert alert-info rounded p-3 mb-4">
    <h5 class="alert-heading small">Keyboard Shortcuts</h5>
    <dl class="mb-0 small">
        <div class="d-flex justify-content-between">
            <dt class="fw-semibold">Ctrl+S / Cmd+S</dt>
            <dd class="text-muted mb-1">Save data</dd>
        </div>
        <div class="d-flex justify-content-between">
            <dt class="fw-semibold">Ctrl+E / Cmd+E</dt>
            <dd class="text-muted mb-1">Export results</dd>
        </div>
        <div class="d-flex justify-content-between">
            <dt class="fw-semibold">Escape</dt>
            <dd class="text-muted">Close dialog</dd>
        </div>
    </dl>
</div>

{{-- Implement keyboard shortcuts --}}
<div x-data @keydown.window="
    if ($event.ctrlKey || $event.metaKey) {
        if ($event.key === 's') {
            $event.preventDefault();
            submitForm();
        }
        if ($event.key === 'e') {
            $event.preventDefault();
            exportData();
        }
    }
">
    {{-- Form content --}}
</div>
```

### 9.2.3 Accessible Dropdown Navigation

```blade
{{-- Keyboard accessible dropdown menu --}}
<div class="dropdown" x-data="{ open: false }">
    <button 
        @click="open = !open"
        @keydown.enter="open = true"
        @keydown.space="open = true"
        @keydown.escape="open = false"
        aria-haspopup="menu"
        :aria-expanded="open"
        class="btn btn-primary"
    >
        Menu
        <i class="bi bi-chevron-down ms-2" :class="{ 'rotate-180': open }"></i>
    </button>

    <div 
        x-show="open"
        @click.away="open = false"
        role="menu"
        class="dropdown-menu show position-absolute mt-2"
        style="width: 200px;"
    >
        <a 
            href="/dashboard"
            role="menuitem"
            @keydown.enter="open = false"
            @keydown.escape="open = false"
            @keydown.arrow-down="$el.nextElementSibling?.focus()"
            class="dropdown-item text-start"
        >
            Dashboard
        </a>

        <a 
            href="/reports"
            role="menuitem"
            @keydown.enter="open = false"
            @keydown.escape="open = false"
            @keydown.arrow-up="$el.previousElementSibling?.focus()"
            @keydown.arrow-down="$el.nextElementSibling?.focus()"
            class="dropdown-item text-start"
        >
            Reports
        </a>

        <a 
            href="/settings"
            role="menuitem"
            @keydown.enter="open = false"
            @keydown.escape="open = false"
            @keydown.arrow-up="$el.previousElementSibling?.focus()"
            class="dropdown-item text-start"
        >
            Settings
        </a>
    </div>
</div>
```

---

### 9.3 Screen Reader Support

#### 9.3.1 Live Regions untuk Dynamic Content

```blade
{{-- Alert yang diumumkan oleh screen reader --}}
<div 
    role="status" 
    aria-live="polite" 
    aria-atomic="true"
    id="form-status"
    class="sr-only"
>
</div>

{{-- Livewire component dengan live region update --}}
<div 
    wire:loading
    role="status"
    aria-live="polite"
    class="flex items-center gap-2 text-blue-600"
>
    <svg class="animate-spin h-5 w-5"></svg>
    <span>Data sedang dimuat...</span>
</div>

{{-- Success notification (diumumkan segera) --}}
<div 
    wire:loading.remove
    x-data="{ show: @entangle('success').defer }"
    @if ($success)
        x-init="
            $dispatch('announce', 'Data berhasil disimpan');
            setTimeout(() => show = false, 5000);
        "
    @endif
    role="alert"
    aria-live="assertive"
    aria-atomic="true"
    class="alert alert-success"
    x-show="show"
>
    <p class="alert-heading small fw-semibold">✓ Berjaya</p>
    <p class="small mb-0">{{ $successMessage ?? 'Data tersimpan dengan berjaya' }}</p>
</div>
```

#### 9.3.2 Accessible Tables dengan Screen Readers

```blade
{{-- Semantic table untuk pembaca skrin --}}
<div class="table-responsive">
    <table class="table table-bordered">
        <caption class="visually-hidden">Senarai Homestay aktif mengikut negeri</caption>

        <thead class="table-light">
            <tr>
                <th scope="col">Nama Homestay</th>
                <th scope="col">Negeri</th>
                <th scope="col" class="text-end">Kapasiti</th>
                <th scope="col" class="text-end">Penghunian (%)</th>
                <th scope="col" class="text-center">Tindakan</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($homestays as $homestay)
                <tr>
                    <td>
                        <a href="{{ route('homestays.show', $homestay) }}" class="link-primary text-decoration-none">
                            {{ $homestay->nama }}
                        </a>
                    </td>
                    <td>{{ $homestay->negeri }}</td>
                    <td class="text-end">{{ $homestay->kapasiti }}</td>
                    <td class="text-end">
                        <span aria-label="Penghunian: {{ $homestay->occupancy_rate }}%">
                            {{ $homestay->occupancy_rate }}%
                        </span>
                    </td>
                    <td class="text-center">
                        <a 
                            href="{{ route('homestays.edit', $homestay) }}"
                            aria-label="Edit {{ $homestay->nama }}"
                            class="link-primary text-decoration-none"
                        >
                            Edit
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center py-4 text-muted">
                        Tiada Homestay ditemui
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- Alternative: Data table summary untuk pembaca skrin --}}
<div class="visually-hidden" aria-live="polite">
    Senarai Homestay: Total {{ count($homestays) }},
    Rata-rata penghunian {{ round($homestays->avg('occupancy_rate')) }}%,
    Kapasiti keseluruhan {{ $homestays->sum('kapasiti') }} tamu
</div>
```

#### 9.3.3 Form Labels & Descriptions

```blade
{{-- ✅ Proper form labeling --}}
<div class="mb-4">
    <label for="homestay_name" class="d-block small fw-medium text-dark mb-2">
        Nama Homestay
        <span class="text-danger" aria-label="diperlukan">*</span>
    </label>

    <input 
        type="text"
        id="homestay_name"
        name="homestay_name"
        aria-required="true"
        aria-describedby="homestay_name_help"
        class="form-control"
        @error('homestay_name')
            aria-invalid="true"
            aria-describedby="homestay_name_error"
        @enderror
    />

    @error('homestay_name')
        <p id="homestay_name_error" class="mt-2 small text-danger" role="alert">
            {{ $message }}
        </p>
    @else
        <p id="homestay_name_help" class="mt-2 text-muted" style="font-size: 0.875rem;">
            Masukkan nama Homestay seperti yang terdaftar dengan MOTAC
        </p>
    @enderror
</div>

{{-- ✅ Checkbox group labeling --}}
<fieldset class="mb-4">
    <legend class="d-block small fw-medium text-dark mb-2">Fasiliti Tersedia</legend>

    <div class="mb-0">
        @foreach (['wifi' => 'WiFi', 'ac' => 'Air Conditioning', 'parking' => 'Parking'] as $value => $label)
            <div class="form-check mb-2">
                <input 
                    type="checkbox" 
                    id="facility_{{ $value }}" 
                    name="facilities[]" 
                    value="{{ $value }}"
                    class="form-check-input"
                />
                <label for="facility_{{ $value }}" class="form-check-label small text-dark">
                    {{ $label }}
                </label>
            </div>
        @endforeach
    </div>
</fieldset>

{{-- ❌ DON'T: Unlabeled inputs --}}
<input type="text" placeholder="Nama">  {{-- ❌ No label --}}

{{-- ✅ Visible + hidden labels if needed --}}
<label for="email" class="visually-hidden">Emel</label>
<input type="email" id="email" placeholder="nama@example.com" class="form-control">
```

---

### 9.4 Color Contrast & Visual Accessibility

#### 9.4.1 Contrast Validation

```html
<!-- WCAG AA Contrast Ratios (Minimum) -->
<!-- Normal text: 4.5:1 -->
<!-- Large text (18pt+ or 14pt+ bold): 3:1 -->
<!-- UI components & graphical elements: 3:1 -->

<!-- ✅ Examples of compliant color pairs -->
<div class="bg-white text-dark">4.5:1 Normal text ✓</div>
<div class="bg-primary text-white">4.5:1 Button text ✓</div>
<div class="bg-light text-dark">4.5:1 Secondary text ✓</div>

<!-- ❌ Examples of non-compliant pairs -->
<div class="bg-light text-muted">2.3:1 Insufficient contrast ✗</div>
<div class="bg-light-blue text-light-gray">Insufficient contrast ✗</div>
```

#### 9.4.2 Contrast Testing with Bootstrap SCSS

```scss
/* Bootstrap SCSS variables with validated contrast ratios */
$primary: #0d6efd;           // 4.5:1 with white text
$secondary: #6c757d;         // 4.5:1 with white text
$dark: #212529;              // 21:1 on white bg (primary text)
$body-color: #495057;        // 7:1 on white bg (secondary text)
$text-muted: #6c757d;        // 5.5:1 on white bg (tertiary text)
```

Use Bootstrap text utilities for accessible contrast:

- `.text-dark` - Primary text (21:1 contrast)
- `.text-body` - Secondary text (7:1 contrast)
- `.text-muted` - Tertiary text (5.5:1 contrast)

#### 9.4.3 Accessible Icon Usage

```blade
{{-- ✅ Icons with text labels --}}
<button class="d-flex align-items-center gap-2 px-3 py-2 btn btn-success">
    <i class="bi bi-save" aria-hidden="true"></i>
    <span>Simpan</span>
</button>
    <span>Simpan</span>
</button>

{{-- ✅ Icon-only buttons with aria-label --}}
<button 
    aria-label="Tutup dialog"
    class="btn btn-link p-2 text-muted"
>
    <i class="bi bi-x-lg" aria-hidden="true"></i>
</button>

{{-- ✅ Inline icons with aria-label --}}
<span class="d-flex align-items-center gap-1">
    <i class="bi bi-check-circle text-success" aria-hidden="true"></i>
    <span>Berjaya</span>
</span>

{{-- ❌ DON'T: Icon-only without label --}}
<button class="p-2">
    <i class="bi bi-x-lg"></i> {{-- Missing aria-label --}}
</button>

{{-- ❌ DON'T: Rely on color alone --}}
<span class="text-danger">Error</span> {{-- ❌ Color only, should have icon/text --}}
<span class="d-flex align-items-center gap-1">
    <i class="bi bi-exclamation-circle text-danger" aria-hidden="true"></i>
    <span class="text-danger">Error</span>
</span> {{-- ✅ Better --}}
```

---

## 10. Praktik Terbaik & Antipattern | Best Practices & Antipatterns

### 10.1 Best Practices

#### ✅ DO's

```blade
{{-- ✅ Use semantic HTML --}}
<button @click="submit">Submit</button>
<a href="/dashboard">Dashboard</a>
<form @submit.prevent="save">...</form>

{{-- ✅ Provide meaningful error messages --}}
<div class="alert alert-danger small">
    Emel tidak sah. Sila masukkan emel yang betul (contoh: nama@example.com)
</div>

{{-- ✅ Use aria-label for context --}}
<a href="/profile" aria-label="Profil pengguna ({{ $user->name }})">Profil</a>

{{-- ✅ Manage focus properly --}}
<button @click="openModal(); $nextTick(() => firstInput.focus())">
    Buka Dialog
</button>

{{-- ✅ Provide loading states --}}
<button wire:loading.attr="disabled" wire:click="submit">
    <span wire:loading.remove>Hantar</span>
    <span wire:loading>Memproses...</span>
</button>

{{-- ✅ Use responsive design --}}
<div class="row g-3">
    <div class="col-12 col-md-6 col-lg-4"><!-- Item 1 --></div>
    <div class="col-12 col-md-6 col-lg-4"><!-- Item 2 --></div>
    <div class="col-12 col-md-6 col-lg-4"><!-- Item 3 --></div>
</div>

{{-- ✅ Cache computed properties --}}
@php
    $total = collect($items)->sum('price');
@endphp
```

#### ❌ DON'Ts

```blade
{{-- ❌ Avoid divs for buttons --}}
<div @click="submit" class="cursor-pointer">Submit</div> {{-- Not keyboard accessible --}}

{{-- ❌ Avoid vague error messages --}}
<div class="text-red-600">Error</div> {{-- What error? --}}

{{-- ❌ Avoid inline styles --}}
<div style="color: red; font-size: 14px;">Error</div>

{{-- ❌ Avoid removing focus indicators --}}
<input style="outline: none;">

{{-- ❌ Avoid nested buttons --}}
<button>
    <button>Nested button</button>
</button>

{{-- ❌ Avoid huge images without optimization --}}
<img src="large-unoptimized-image.jpg" class="w-full">

{{-- ❌ Avoid hardcoded content --}}
<p>Jumlah Homestay: 1234</p> {{-- Hardcoded --}}
<p>Jumlah Homestay: {{ $homestayCount }}</p> {{-- ✅ Dynamic --}}
```

### 10.2 Common Antipatterns

```blade
{{-- ❌ ANTIPATTERN 1: Mixing logic in view --}}
@php
    $total = 0;
    foreach ($homestays as $h) {
        if ($h->status === 'active' && $h->occupancy > 50) {
            $total += $h->revenue;
        }
    }
@endphp

{{-- ✅ BETTER: Move to controller/service --}}
<!-- In controller -->
$totalRevenue = $homestays->where('status', 'active')
    ->where('occupancy', '>', 50)
    ->sum('revenue');

<!-- In view -->
Jumlah Hasil: RM {{ number_format($totalRevenue, 2) }}

{{-- ❌ ANTIPATTERN 2: N+1 query problem --}}
@foreach ($homestays as $h)
    <p>{{ $h->name }} - Koperasi: {{ $h->cooperative->name }}</p>
@endforeach

{{-- ✅ BETTER: Use eager loading --}}
$homestays = Homestay::with('cooperative')->get();

{{-- ❌ ANTIPATTERN 3: Inline validation message --}}
@if (!$email || !str_contains($email, '@'))
    <p>Email tidak sah</p>
@endif

{{-- ✅ BETTER: Use validation rules --}}
<!-- In Form Request -->
public function rules() {
    return ['email' => 'required|email'];
}

<!-- In view -->
@error('email')
    <p class="text-red-600">{{ $message }}</p>
@enderror

{{-- ❌ ANTIPATTERN 4: Direct DOM manipulation --}}
<button @click="document.getElementById('form').style.display = 'block'">
    Show Form
</button>

{{-- ✅ BETTER: Use Alpine.js or Livewire --}}
<button @click="showForm = true">Show Form</button>
<form x-show="showForm">...</form>

{{-- ❌ ANTIPATTERN 5: Missing accessibility labels --}}
<select name="state">
    <option>Select state</option>
    <option value="MY-01">Johor</option>
</select>

{{-- ✅ BETTER: Add label --}}
<label for="state">Negeri</label>
<select id="state" name="state" aria-required="true">
    <option value="">Sila pilih negeri</option>
    <option value="MY-01">Johor</option>
</select>
```

---

## 11. Panduan Gaya & Konvensi | Style Guide & Conventions

### 11.1 Penamaan Konvensi | Naming Conventions

```php
// ✅ File & folder naming
// resources/views/components/button.blade.php          // Component (kebab-case)
// resources/views/pages/homestay-index.blade.php       // Page (kebab-case)
// app/Livewire/DashboardMetrics.php                    // Class (PascalCase)
// app/Services/HomestayService.php                     // Service (PascalCase)
// app/Http/Controllers/HomestayController.php          // Controller (PascalCase)

// ✅ Variable naming
$homestayCount = 0;                                  // Variable (camelCase)
$HOMESTAY_LIMIT = 10000;                             // Constant (UPPER_SNAKE_CASE)
const DEFAULT_PAGINATION = 20;                       // Const (UPPER_SNAKE_CASE)

// ✅ Component names
<x-button />                                         // Component (kebab-case)
<x-form-input />                                     // Component (kebab-case)
<x-card title="Title" />                             // Slot attribute (camelCase)

// ✅ CSS class naming (BEM methodology optional)
.btn                                                 // Block
.btn--primary                                        // Modifier
.btn__icon                                           // Element

// ✅ Livewire property naming
public $homestayCount = 0;                           // Property (camelCase)
public function handleImport() {}                    // Method (camelCase)
```

### 11.2 Struktur Folder Terstruktur | Folder Structure

```bash
resources/views/
├── layouts/
│   ├── app.blade.php                 # Master layout
│   ├── guest.blade.php               # Guest layout
│   └── admin.blade.php               # Admin layout
│
├── components/
│   ├── button.blade.php              # Reusable components
│   ├── card.blade.php
│   ├── form-input.blade.php
│   ├── alert.blade.php
│   ├── modal.blade.php
│   ├── data-table.blade.php
│   └── navigation/
│       ├── navbar.blade.php
│       ├── sidebar.blade.php
│       └── breadcrumb.blade.php
│
├── pages/
│   ├── dashboard.blade.php           # Page templates
│   ├── homestays/
│   │   ├── index.blade.php
│   │   ├── show.blade.php
│   │   ├── create.blade.php
│   │   └── edit.blade.php
│   ├── reports/
│   ├── import/
│   └── users/
│
├── emails/
│   ├── welcome.blade.php             # Email templates
│   └── import-complete.blade.php
│
└── errors/
    ├── 404.blade.php                 # Error pages
    ├── 500.blade.php
    └── maintenance.blade.php
```

### 11.3 Bootstrap CSS Konvensi | Bootstrap CSS Conventions

```html
<!-- ✅ Class ordering: display → sizing → spacing → color → typography → effects -->
<div class="position-absolute top-0 start-0 w-100" style="height: 100vh; padding: 1.5rem;">
    <div class="bg-white text-dark fs-5 fw-semibold rounded shadow-lg p-4">
        Content
    </div>
</div>

<!-- ✅ Responsive grid: col-* col-md-* col-lg-* col-xl-* col-xxl-* -->
<div class="row g-3">
    <div class="col-12 col-sm-6 col-md-4 col-lg-3"><!-- Item 1 --></div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3"><!-- Item 2 --></div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3"><!-- Item 3 --></div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3"><!-- Item 4 --></div>
</div>

<!-- ✅ State utilities: hover visible, :disabled, :focus -->
<button class="btn btn-primary px-4 py-2">
    Button
</button>
```

```scss
/* ✅ Use Bootstrap SCSS variables for repeated patterns */
$primary: #0d6efd;
$secondary: #6c757d;
$success: #198754;
$danger: #dc3545;

.btn-custom {
    padding: $btn-padding-y $btn-padding-x;
    border-radius: $btn-border-radius;
    font-weight: $btn-font-weight;
}
```

### 11.4 Vue/Livewire Konvensi | Component Conventions

```blade
<!-- File: resources/views/components/user-profile.blade.php -->

<div class="mb-5">
    <!-- Header section -->
    <div class="border-bottom pb-3 mb-4">
        <h2 class="h2 fw-bold">Profil Pengguna</h2>
    </div>

    <!-- Main content -->
    <form @submit.prevent="save" class="mb-3">
        <!-- Form fields -->
        <x-form-input 
            name="name"
            label="Nama Pengguna"
            :value="$user->name"
            wire:model="name"
            :error="$errors->first('name')"
        />

        <!-- Action buttons -->
        <div class="flex gap-3 pt-6 border-t">
            <x-button type="submit" variant="primary">Simpan</x-button>
            <x-button type="button" variant="secondary" @click="resetForm">Batal</x-button>
        </div>
    </form>
</div>

<!-- Props documentation -->
@props([
    'title' => 'Default Title',      // Props dengan default
    'disabled' => false,
    'error' => null,
])

<!-- Slot documentation -->
<!-- Main content goes in default slot -->
<!-- Footer content goes in 'footer' slot -->
```

---

## 12. Integrasi i18n & Lokalisasi | i18n & Localization Integration

### 12.1 Struktur Bahasa | Language Structure

```bash
resources/lang/
├── ms/
│   ├── messages.php                  # Pesan umum
│   ├── validation.php                # Pesan validasi
│   ├── auth.php                      # Pesan autentikasi
│   ├── dashboard.php                 # Dashboard strings
│   └── reports.php                   # Report strings
│
└── en/
    ├── messages.php
    ├── validation.php
    ├── auth.php
    ├── dashboard.php
    └── reports.php
```

### 12.2 Penggunaan Dalam Template | Usage in Templates

```blade
{{-- ✅ Simple translation --}}
<h1>{{ __('messages.welcome') }}</h1>

{{-- ✅ Translation with parameters --}}
<p>{{ __('messages.homestays_count', ['count' => $homestayCount]) }}</p>

{{-- ✅ Pluralization --}}
<p>{{ trans_choice('messages.visitor', $count) }}</p>

{{-- ✅ Language switching --}}
<a href="{{ route('language.switch', 'en') }}">English</a>
<a href="{{ route('language.switch', 'ms') }}">Bahasa Melayu</a>

{{-- ✅ Livewire component translation --}}
@php
    $breadcrumbs = [
        __('breadcrumbs.home') => route('home'),
        __('breadcrumbs.homestays') => route('homestays.index'),
        __('breadcrumbs.edit') => null,
    ];
@endphp
```

### 12.3 Fail Bahasa Contoh | Language Files Example

```php
// resources/lang/ms/messages.php
return [
    'welcome' => 'Selamat datang ke Sistem Pengurusan Homestay',
    'homestays_count' => 'Jumlah Homestay: :count',
    'visitor' => '{0} Tiada pelawat|{1} Seorang pelawat|[2,*] :count pelawat',
    'success' => [
        'import_complete' => 'Data berjaya diimport: :count baris',
        'data_saved' => 'Data tersimpan dengan berjaya',
    ],
    'error' => [
        'import_failed' => 'Kegagalan import: :error',
        'validation_error' => 'Sila semak semula data input anda',
    ],
];

// resources/lang/en/messages.php
return [
    'welcome' => 'Welcome to the Homestay Management System',
    'homestays_count' => 'Total Homestays: :count',
    'visitor' => '{0} No visitors|{1} One visitor|[2,*] :count visitors',
    'success' => [
        'import_complete' => 'Data imported successfully: :count rows',
        'data_saved' => 'Data saved successfully',
    ],
    'error' => [
        'import_failed' => 'Import failed: :error',
        'validation_error' => 'Please check your input data again',
    ],
];
```

---

## 13. Strategi Testing UI | UI Testing Strategy

### 13.1 Jenis Ujian UI | UI Testing Types

```php
// Feature Tests (Laravel Dusk)
class ImportDataTest extends DuskTestCase
{
    public function test_user_can_import_valid_excel_file()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/import')
                ->attach('@file-input', __DIR__.'/fixtures/homestay-valid.xlsx')
                ->waitFor('@preview-table')
                ->assertSee('10 baris akan diimport')
                ->click('@submit-import')
                ->waitFor('@success-message')
                ->assertSee('Data berjaya diimport');
        });
    }

    public function test_validation_errors_displayed_on_invalid_file()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/import')
                ->attach('@file-input', __DIR__.'/fixtures/homestay-invalid.xlsx')
                ->click('@preview-import')
                ->waitFor('@error-list')
                ->assertSee('Baris 2: Nilai tidak sah untuk negeri');
        });
    }
}

// Component Tests
class ButtonComponentTest extends TestCase
{
    public function test_button_renders_with_correct_variant()
    {
        $component = Blade::render(
            '<x-button variant="primary">Click me</x-button>'
        );

        $this->assertStringContainsString('btn-primary', $component);
    }

    public function test_button_disabled_state()
    {
        $component = Blade::render(
            '<x-button disabled>Disabled</x-button>'
        );

        $this->assertStringContainsString('disabled', $component);
    }
}
```

### 13.2 Accessibility Testing | Accessibility Testing

```bash
# Automated accessibility testing dengan axe-core
npm install --save-dev @axe-core/cli

# Test command
npx axe https://homestay.motac.gov.my --standard wcag21aa
```

```php
// In tests: Laravel Dusk with accessibility checks
// Accessibility test example
class AccessibilityTest extends DuskTestCase
{
    public function test_dashboard_is_wcag_compliant()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/dashboard')
                ->waitForLocation('/dashboard')
                // Check keyboard accessibility
                ->press('Tab')
                ->assertFocused('input, button, a')
                // Check color contrast
                ->assertColorContrast('.btn-primary')
                // Check aria labels
                ->assertAttribute('button[aria-label]', 'aria-label', '@notnull');
        });
    }
}
```

### 13.3 Visual Regression Testing | Visual Regression Testing

```javascript
// Percy integration for visual regression
describe('UI Components', () => {
    it('Button component visual regression', () => {
        cy.visit('/components/button');
        cy.percySnapshot('Button - Primary');
    });

    it('Dashboard layout regression', () => {
        cy.login();
        cy.visit('/dashboard');
        cy.percySnapshot('Dashboard - Overview');
    });
});
```

---

## Penutup | Conclusion

Panduan UI Design ini menyediakan piawaian lengkap untuk pembangunan antara muka `Sistem Pengurusan & Analitik Homestay Malaysia`. Dengan mematuhi prinsip desain, pola komponen, dan praktik terbaik yang digariskan di atas, pasukan pembangunan dapat memastikan sistem yang konsisten, mudah digunakan, dan dapat diakses oleh semua pengguna.

**Key Takeaways:**

1. **Konsistensi:** Gunakan sistem warna, tipografi, dan komponen standard di seluruh aplikasi.
2. **Aksesibiliti:** Pastikan semua elemen memenuhi `WCAG 2.1 AA` untuk keyboard, screen reader, dan visual accessibility.
3. **Prestasi:** Optimumkan beban halaman, caching, dan rendering untuk pengalaman pengguna yang cepat.
4. **Keselamatan:** Lindungi data pengguna dengan enkripsi, validasi input, dan kontrol akses yang ketat.
5. **Pemeliharaan:** Tulis kod yang jelas, modular, dan didokumenkan dengan baik untuk kemudahan pemeliharaan masa depan.

Dokumen ini harus dirujuk secara berkala dan dikemas kini seiring dengan evolusi sistem dan pembelajaran dari pengalaman pengguna.

---

- **Versi:** 1.1
- **Tarikh Akhir Kemaskini:** 15 Oktober 2025
- **Status:** Siap untuk Implementasi | Ready for Implementation
- **Persetujuan:** BPM MOTAC | MOTAC BPM Approval

---

## Akhir Dokumen | End of Document
