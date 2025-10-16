# UI Design Guide - Homestay Management & Analytics System

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

1.  [Pengenalan](#1-pengenalan--introduction)
2.  [Prinsip & Nilai Reka Bentuk](#2-prinsip--nilai-reka-bentuk--design-principles--values)
3.  [Struktur Hierarki UI](#3-struktur-hierarki-ui--ui-hierarchy-structure)
4.  [Sistem Warna & Tipografi](#4-sistem-warna--tipografi--color--typography-system)
5.  [Komponen & Pola Reka Bentuk](#5-komponen--pola-reka-bentuk--components--design-patterns)
6.  [Blade Templating Standards](#6-blade-templating-standards)
7.  [Livewire Component Architecture](#7-livewire-component-architecture)
8.  [Volt & Responsive Design](#8-volt--responsive-design)
9.  [Aksesibiliti (WCAG 2.1 AA)](#9-aksesibiliti--wcag-21-aa)
10. [Praktik Terbaik & Antipattern](#10-praktik-terbaik--antipattern--best-practices--antipatterns)
11. [Panduan Gaya & Konvensi](#11-panduan-gaya--konvensi--style-guide--conventions)

---

## 1. Pengenalan | Introduction

### 1.1 Tujuan Dokumen | Document Purpose

Dokumen ini menetapkan piawaian reka bentuk antara muka pengguna (UI) untuk `Sistem Pengurusan & Analitik Homestay Malaysia`. Ia berfungsi sebagai panduan bagi pembangun frontend, desainer UX, dan QA untuk memastikan konsistensi visual, kebolehgunaan, dan kepatuhan aksesibiliti di seluruh aplikasi.

### 1.2 Audiens Sasaran | Target Audience

-   **Pembangun Frontend:** Implementasi komponen dan template
-   **Desainer UX/UI:** Rancangan wireframe dan mockup
-   **QA/Tester:** Pengesahan antara muka pengguna
-   **Pemegang Taruh Bisnis:** Pemahaman maklumat dan aliran pengguna

### 1.3 Teknologi & Tools | Technology Stack

**Backend & Templating:**

-   `Laravel 12+` dengan `PHP 8.3+`
-   `Blade` templating engine
-   `Livewire 3.x` untuk komponen reaktif server-side
-   `Volt` (Livewire single-file components) untuk komponen ringkas

**Frontend & Styling:**

-   `Tailwind CSS 3.x` untuk utility-first styling
-   `Alpine.js` untuk interaktiviti klien ringan
-   `Chart.js` untuk visualisasi data
-   `DomPDF` untuk penjanaan laporan

**Build & Assets:**

-   `Vite` untuk bundling aset (CSS, JavaScript)
-   `NPM` untuk pengurusan pakej

**Aksesibiliti & Validasi:**

-   `axe-core` untuk scanning aksesibiliti automatik
-   `Lighthouse` untuk auditi prestasi
-   `WAVE` untuk penilaian kontras warna

---

## 2. Prinsip & Nilai Reka Bentuk | Design Principles & Values

### 2.1 Prinsip Utama | Core Principles

#### 1. Kejelasan & Kesederhanaan (Clarity & Simplicity)

-   Maklumat yang jelas dan mudah dipahami
-   Peringatan visual yang jelas untuk tindakan
-   Penghapusan elemen yang tidak perlu
-   Hierarki visual yang kuat

**Contoh:**

```blade
<!-- ✅ BAIK: Butang dengan label yang jelas -->
<button class="btn btn-primary">Muat Naik Data</button>

<!-- ❌ BURUK: Label yang samar -->
<button class="btn btn-primary">Proses</button>
```

#### 2. Konsistensi (Consistency)

-   Pola UI yang konsisten di seluruh aplikasi
-   Skema warna dan tipografi yang sama
-   Tingkah laku komponen yang dapat dijangka
-   Pemetaan tindakan/hasil yang seragam

#### 3. Kebolehcapaian (Accessibility)

-   Semua elemen boleh digunakan tanpa tetikus (keyboard-only)
-   Kontras warna memenuhi `WCAG AA` (4.5:1 untuk teks normal)
-   Pembaca skrin dapat menavigasi dan memahami konten
-   Maklumat tidak bergantung pada warna sahaja

#### 4. Berorientasi Pengguna (User-Centric)

-   Tugas-tugas yang kerap mudah diakses
-   Aliran kerja yang intuitif dan terstruktur
-   Maklum balas segera untuk setiap tindakan
-   Paparan data yang relevan untuk setiap peranan

#### 5. Prestasi (Performance)

-   Muat halaman <2 saat untuk dashboard utama
-   Interaksi responsif (<150ms untuk tindakan pengguna)
-   Imej dioptimalkan dan dimampatkan
-   Kod yang bersih dan tidak mubazir

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

-   **Fungsi:** Logo, navigasi utama, pencarian, notifikasi, profil pengguna
-   **Ketinggian:** `64px` (`h-16`)
-   **Z-index:** `50` (tetap atas)
-   **Responsif:** Collapse ke hamburger menu di bawah `768px`

#### Sidebar (Lateral Navigation)

-   **Fungsi:** Navigasi sekunder, filter, perkaitan
-   **Lebar:** `256px` (`w-64`) — collapsible ke `64px`
-   **Posisi:** `Fixed` atau `sticky` bergantung konteks
-   **Mobile:** Drawer/modal di bawah `768px`

#### Main Content Area

-   **Lebar Maksimum:** `1280px` (container)
-   **Padding:** `24px` di desktop, `16px` di mobile
-   **Kolom:** 12-column grid (Tailwind default)

#### Footer

-   **Fungsi:** Link tambahan, copyright, support
-   **Ketinggian:** `64px` (`h-16`)
-   **Latar Belakang:** Abu-abu gelap (`#1F2937`)

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

#### Warna Kustomisasi MOTAC

```javascript
// tailwind.config.js
module.exports = {
  theme: {
    extend: {
      colors: {
        motac: {
          50: '#F0F9FF',
          100: '#E0F2FE',
          200: '#BAE6FD',
          500: '#0EA5E9',
          600: '#0284C7',
          700: '#0369A1',
          800: '#075985',
          900: '#0C3C66', // Dark blue - kerajaan
        },
        homestay: {
          50: '#FFFBEB',
          100: '#FEF3C7',
          500: '#F59E0B',  // Emas - kehangatan
          600: '#D97706',
          900: '#78350F',
        },
      },
    },
  },
};
```

### 4.2 Tipografi | Typography System

#### Jenis Fon | Font Families

```css
/* CSS Variables */
:root {
  --font-sans: 'Inter', 'Segoe UI', 'Roboto', sans-serif;
  --font-mono: 'Fira Code', 'Courier New', monospace;
}
```

```javascript
// Tailwind Config
module.exports = {
  theme: {
    fontFamily: {
      sans: ['Inter', { features: { 'cv04': 1 } }],
      mono: ['Fira Code'],
    },
  },
};
```

**Pilihan Fon:**

-   **Khas:** Inter (modern, boleh dibaca, aksesibel)
-   **Backup:** Segoe UI (Windows), -apple-system (macOS)
-   **Fallback:** Sans-serif

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

#### Kombinasi Tailwind

```html
<!-- Tailwind Typography Classes -->
<h1 class="text-4xl font-bold leading-tight">Tajuk Halaman</h1>
<h2 class="text-3xl font-bold leading-snug">Subjudul</h2>
<p class="text-base font-normal leading-relaxed">Teks tubuh</p>
<small class="text-sm font-medium leading-snug">Teks kecil</small>
<code class="text-sm font-mono bg-gray-100 px-2 py-1">code</code>
```

### 4.3 Sistem Spacing | Spacing System

Tailwind default `4px` base unit:

| Nilai | Pixel | Tailwind | Kegunaan               |
|-------|-------|----------|------------------------|
| **xs**  | 4px   | `p-1`    | Padding internal kecil |
| **sm**  | 8px   | `p-2`    | Padding standard       |
| **md**  | 16px  | `p-4`    | Padding normal         |
| **lg**  | 24px  | `p-6`    | Padding besar          |
| **xl**  | 32px  | `p-8`    | Padding section        |
| **2xl** | 40px  | `p-10`   | Padding major          |

```html
<!-- Spacing Examples -->
<div class="p-4 mb-6">Padding 16px, margin-bottom 24px</div>
<button class="px-4 py-2 gap-2">Padding 16px horizontal, 8px vertical</button>
```

### 4.4 Bayangan & Kedalaman | Shadows & Depth

```javascript
// tailwind.config.js
module.exports = {
  theme: {
    extend: {
      boxShadow: {
        sm: '0 1px 2px 0 rgb(0 0 0 / 0.05)',
        base: '0 1px 3px 0 rgb(0 0 0 / 0.1)',
        md: '0 4px 6px -1px rgb(0 0 0 / 0.1)',
        lg: '0 10px 15px -3px rgb(0 0 0 / 0.1)',
        xl: '0 20px 25px -5px rgb(0 0 0 / 0.1)',
      },
    },
  },
};
```

| Kedalaman       | Shadow        | Kegunaan                |
|-----------------|---------------|-------------------------|
| **Rendah**      | `shadow-sm`   | Border halus, separator |
| **Normal**      | `shadow-base` | Card, elevated surface  |
| **Tinggi**      | `shadow-lg`   | Modal, dropdown         |
| **Sangat Tinggi**| `shadow-xl`   | Tooltip, floating panel |

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

{{-- Ghost (Minimal) --}}
<button class="btn btn-ghost">Link-style</button>

{{-- Disabled --}}
<button class="btn btn-primary" disabled>Dimusnahkan</button>

{{-- Loading --}}
<button class="btn btn-primary" wire:loading disabled>
    <span wire:loading.remove>Simpan</span>
    <span wire:loading>
        <svg class="animate-spin h-5 w-5" ...></svg>
    </span>
</button>
```

**Size Variants:**

```blade
<button class="btn btn-sm">Kecil</button>
<button class="btn btn-base">Normal</button>
<button class="btn btn-lg">Besar</button>
<button class="btn btn-block">Full Width</button>
```

**Reusable Component (Blade/Volt):**

```blade
{{-- resources/views/components/button.blade.php --}}
@props([
    'variant' => 'primary',
    'size' => 'base',
    'disabled' => false,
    'type' => 'button',
    'loading' => false,
])

<button 
    type="{{ $type }}" 
    {{ $disabled || $loading ? 'disabled' : '' }}
    class="btn btn-{{ $variant }} btn-{{ $size }} 
           {{ $disabled || $loading ? 'opacity-50 cursor-not-allowed' : '' }}"
    {{ $attributes }}
>
    @if ($loading)
        <svg class="animate-spin h-5 w-5 mr-2"></svg>
    @endif
    {{ $slot }}
</button>
```

**Usage:**

```blade
<x-button variant="primary" size="lg" @click="submitForm">
    Hantar Data
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

<div class="mb-4">
    @if ($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 mb-2">
            {{ $label }}
            @if ($required)
                <span class="text-red-600" aria-label="diperlukan">*</span>
            @endif
        </label>
    @endif

    <input 
        type="{{ $type }}"
        id="{{ $name }}"
        name="{{ $name }}"
        class="w-full px-3 py-2 border rounded-md shadow-sm
               {{ $error ? 'border-red-500' : 'border-gray-300' }}
               focus:outline-none focus:ring-2 focus:ring-blue-500
               focus:border-transparent"
        placeholder="{{ $placeholder }}"
        {{ $required ? 'required' : '' }}
        {{ $attributes }}
    />

    @if ($error)
        <p class="mt-1 text-sm text-red-600" id="{{ $name }}-error">
            {{ $error }}
        </p>
    @endif

    @if ($helpText)
        <p class="mt-1 text-sm text-gray-500">{{ $helpText }}</p>
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

<div class="bg-white rounded-lg {{ $elevated ? 'shadow-md' : 'border border-gray-200' }} p-6">
    @if ($header)
        <div class="mb-4 pb-4 border-b border-gray-200">
            {{ $header }}
        </div>
    @elseif ($title)
        <div class="mb-4 pb-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">{{ $title }}</h3>
            @if ($subtitle)
                <p class="text-sm text-gray-600 mt-1">{{ $subtitle }}</p>
            @endif
        </div>
    @endif

    <div class="card-body">
        {{ $slot }}
    </div>

    @if ($footer)
        <div class="mt-4 pt-4 border-t border-gray-200">
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
    $bgColor = match($type) {
        'info' => 'bg-blue-50 border-blue-200 text-blue-800',
        'success' => 'bg-green-50 border-green-200 text-green-800',
        'warning' => 'bg-yellow-50 border-yellow-200 text-yellow-800',
        'danger' => 'bg-red-50 border-red-200 text-red-800',
    };

    $iconColor = match($type) {
        'info' => 'text-blue-500',
        'success' => 'text-green-500',
        'warning' => 'text-yellow-500',
        'danger' => 'text-red-500',
    };
@endphp

<div class="alert {{ $bgColor }} border rounded-lg p-4" role="alert">
    <div class="flex">
        <div class="flex-shrink-0">
            {{-- Icon SVG here --}}
        </div>
        <div class="ml-3">
            @if ($title)
                <h3 class="font-medium">{{ $title }}</h3>
            @endif
            <div class="text-sm mt-1">
                {{ $slot }}
            </div>
        </div>
        @if ($dismissible)
            <button 
                @click="$el.parentElement.remove()" 
                class="ml-auto text-gray-400 hover:text-gray-600"
                aria-label="Tutup amaran"
            >
                <svg class="h-5 w-5" ...><!-- close icon --></svg>
            </button>
        @endif
    </div>
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
])

@php
    $sizeClass = match($size) {
        'sm' => 'max-w-sm',
        'md' => 'max-w-md',
        'lg' => 'max-w-lg',
        'xl' => 'max-w-xl',
    };
@endphp

<div 
    id="{{ $id }}" 
    class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center"
    @keydown.escape="$el.classList.add('hidden')"
>
    <div class="bg-white rounded-lg {{ $sizeClass }} max-h-screen overflow-y-auto">
        <div class="flex items-center justify-between p-6 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-900">{{ $title }}</h2>
            <button 
                @click="$el.closest('.fixed').classList.add('hidden')"
                class="text-gray-400 hover:text-gray-600"
                aria-label="Tutup dialog"
            >
                <svg class="h-6 w-6" ...><!-- close icon --></svg>
            </button>
        </div>

        <div class="p-6">
            {{ $slot }}
        </div>

        @if ($footer)
            <div class="flex justify-end gap-3 p-6 border-t border-gray-200">
                {{ $footer }}
            </div>
        @endif
    </div>
</div>

<style>
    #{{ $id }}.hidden { display: none; }
    #{{ $id }}:not(.hidden) { display: flex; }
</style>
```

#### F. Table Component

```blade
{{-- resources/views/components/data-table.blade.php --}}
@props([
    'columns', // Array of column definitions
    'rows',    // Array of data rows
    'sortable' => true,
    'paginate' => true,
])

<div class="overflow-x-auto">
    <table class="w-full border-collapse text-sm">
        <thead class="bg-gray-50 border-b border-gray-200">
            <tr>
                @foreach ($columns as $column)
                    <th class="px-6 py-3 text-left font-semibold text-gray-700">
                        @if ($sortable && ($column['sortable'] ?? true))
                            <button class="flex items-center gap-2 hover:text-gray-900">
                                {{ $column['label'] }}
                                <svg class="h-4 w-4 text-gray-400"><!-- sort icon --></svg>
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
                <tr class="border-b border-gray-200 hover:bg-gray-50">
                    @foreach ($columns as $column)
                        <td class="px-6 py-4 text-gray-900">
                            {{ $row[$column['key']] ?? '-' }}
                        </td>
                    @endforeach
                </tr>
            @empty
                <tr>
                    <td colspan="{{ count($columns) }}" class="px-6 py-8 text-center text-gray-500">
                        Tiada data ditemui
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if ($paginate && method_exists($rows, 'links'))
    <div class="mt-4">
        {{ $rows->links() }}
    </div>
@endif
```

### 5.2 Pola Reka Bentuk | Design Patterns

#### Pattern 1: Loading State

```blade
{{-- Blade Implementation --}}
<div wire:loading wire:target="submitData" class="space-y-4">
    <div class="h-4 bg-gray-200 rounded animate-pulse"></div>
    <div class="h-4 bg-gray-200 rounded animate-pulse w-5/6"></div>
</div>

<div wire:loading.remove wire:target="submitData">
    {{-- Content --}}
</div>
```

#### Pattern 2: Empty State

```blade
{{-- Empty state component --}}
<div class="py-12 text-center">
    <svg class="h-12 w-12 text-gray-300 mx-auto mb-4"><!-- empty icon --></svg>
    <h3 class="text-lg font-medium text-gray-900 mb-2">Tiada data ditemui</h3>
    <p class="text-gray-500 mb-4">Mula dengan membuat entri pertama anda</p>
    <x-button href="{{ route('create') }}">Buat Baru</x-button>
</div>
```

#### Pattern 3: Error Boundary

```blade
<div class="bg-red-50 border border-red-200 rounded-lg p-4">
    <div class="flex">
        <div class="flex-shrink-0">
            <svg class="h-5 w-5 text-red-500"><!-- error icon --></svg>
        </div>
        <div class="ml-3">
            <h3 class="text-sm font-medium text-red-800">
                Ralat memuatkan data
            </h3>
            <p class="text-sm text-red-700 mt-1">
                {{ $error->getMessage() }}
            </p>
            <button @click="location.reload()" class="text-sm font-medium text-red-600 hover:text-red-700 mt-2">
                Cuba Semula
            </button>
        </div>
    </div>
</div>
```

#### Pattern 4: Breadcrumb Navigation

```blade
{{-- Breadcrumb Component --}}
<nav class="flex text-sm" aria-label="Breadcrumb">
    <ol class="flex items-center gap-1">
        @foreach ($breadcrumbs as $breadcrumb)
            <li>
                @if ($loop->last)
                    <span class="text-gray-600">{{ $breadcrumb['label'] }}</span>
                @else
                    <a href="{{ $breadcrumb['url'] }}" class="text-blue-600 hover:text-blue-800">
                        {{ $breadcrumb['label'] }}
                    </a>
                @endif
            </li>
            @if (!$loop->last)
                <li class="text-gray-400">/</li>
            @endif
        @endforeach
    </ol>
</nav>
```

#### Pattern 5: Toast Notification

```blade
<div class="fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg animate-fade-in" 
     x-data 
     x-init="setTimeout(() => $el.remove(), 3000)"
     role="alert">
    <div class="flex items-center gap-3">
        <svg class="h-5 w-5"><!-- success icon --></svg>
        <span>{{ $message }}</span>
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
<body class="bg-gray-50">
    {{-- Navigation --}}
    <header class="bg-white shadow-sm sticky top-0 z-50">
        @include('components.navbar')
    </header>

    <div class="flex">
        {{-- Sidebar (optional) --}}
        @auth
            <aside class="hidden md:flex w-64 bg-white border-r border-gray-200" role="navigation">
                @include('components.sidebar')
            </aside>
        @endauth

        {{-- Main Content --}}
        <main class="flex-1 min-h-screen">
            {{-- Alert Messages --}}
            @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-4">
                    <h2 class="font-semibold text-red-800">Ralat Pengesahan</h2>
                    <ul class="list-disc list-inside text-sm text-red-700 mt-2">
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
            <div class="container mx-auto px-4 py-8">
                @yield('content')
            </div>
        </main>
    </div>

    {{-- Footer --}}
    <footer class="bg-gray-900 text-gray-100 border-t border-gray-200">
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

{{-- ✅ Use Tailwind classes --}}
<div class="p-4 text-blue-600">Content</div>

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
<div class="space-y-6">
    {{-- Header --}}
    <div>
        <h2 class="text-2xl font-bold text-gray-900">Muat Naik Data</h2>
        <p class="text-sm text-gray-600 mt-1">
            Muat naik fail Excel atau CSV untuk memproses data homestay
        </p>
    </div>

    {{-- Form --}}
    <form wire:submit="submitImport" class="space-y-4">
        {{-- Import Type Selection --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
                Jenis Data
            </label>
            <select 
                wire:model="importType"
                class="w-full px-3 py-2 border border-gray-300 rounded-md 
                       focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
                <option value="homestay">Data Homestay</option>
                <option value="performance">Data Prestasi</option>
                <option value="capacity">Data Kapasiti</option>
            </select>
        </div>

        {{-- File Input --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
                Pilih Fail
                <span class="text-red-600">*</span>
            </label>
            <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 
                        hover:border-blue-500 transition
                        {{ $errors->has('file') ? 'border-red-500' : '' }}">
                <input 
                    type="file"
                    wire:model="file"
                    accept=".xlsx,.csv"
                    class="hidden"
                    id="file-upload"
                />
                <label for="file-upload" class="cursor-pointer">
                    <div class="text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" 
                             stroke="currentColor" fill="none" viewBox="0 0 48 48">
                            <path d="M28 8H12a4 4 0 00-4 4v20a4 4 0 004 4h24a4 4 0 004-4V20m-8-12l8 8m-8-8v8"/>
                        </svg>
                        <p class="mt-2 text-sm text-gray-900">
                            <strong>Klik untuk memilih</strong> atau seret fail ke sini
                        </p>
                        <p class="text-xs text-gray-500 mt-1">
                            Format: XLSX, CSV (Max 10MB)
                        </p>
                    </div>
                </label>
            </div>

            {{-- File preview --}}
            @if ($file)
                <div class="mt-3 flex items-center gap-2 p-2 bg-blue-50 rounded">
                    <svg class="h-5 w-5 text-blue-600"><!-- file icon --></svg>
                    <span class="text-sm text-blue-900">{{ $file->getClientOriginalName() }}</span>
                    <button 
                        type="button"
                        wire:click="$set('file', null)"
                        class="ml-auto text-blue-600 hover:text-blue-800"
                    >
                        Padam
                    </button>
                </div>
            @endif

            @error('file')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
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
        <div class="flex gap-3 pt-4">
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
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" wire:poll.{{ $refreshInterval }}ms>
    {{-- Card 1: Total Homestays --}}
    <x-card title="Jumlah Homestay">
        <div class="text-4xl font-bold text-blue-600">{{ $totalHomestays }}</div>
        <p class="text-sm text-gray-600 mt-2">Berdaftar dan aktif</p>
    </x-card>

    {{-- Card 2: Total Visitors --}}
    <x-card title="Pelawat (Bulan Ini)">
        <div class="text-4xl font-bold text-green-600">{{ number_format($totalVisitors) }}</div>
        <p class="text-sm text-gray-600 mt-2">Domestik + Asing</p>
    </x-card>

    {{-- Card 3: Total Revenue --}}
    <x-card title="Hasil (Bulan Ini)">
        <div class="text-4xl font-bold text-purple-600">
            RM {{ number_format($totalRevenue, 2) }}
        </div>
        <p class="text-sm text-gray-600 mt-2">Jumlah keseluruhan</p>
    </x-card>

    {{-- Card 4: Occupancy Rate --}}
    <x-card title="Kadar Penghunian">
        <div class="text-4xl font-bold text-orange-600">{{ $occupancyRate }}%</div>
        <div class="w-full bg-gray-200 rounded-full h-2 mt-3">
            <div 
                class="bg-orange-600 h-2 rounded-full"
                style="width: {{ $occupancyRate }}%"
            ></div>
        </div>
    </x-card>
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

<div class="space-y-4">
    <h2 class="text-2xl font-bold">Kemaskini Profil</h2>

    <form wire:submit="update" class="space-y-4">
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

        <div class="flex gap-3">
            <x-button type="submit" variant="primary">Simpan Perubahan</x-button>
            <x-button type="button" variant="secondary" wire:click="$refresh">Batal</x-button>
        </div>
    </form>
</div>
```

### 8.2 Responsive Breakpoints | Responsive Breakpoints

```text
/* Tailwind Default Breakpoints */
sm  → 640px   (Mobile phones)
md  → 768px   (Tablets)
lg  → 1024px  (Desktops)
xl  → 1280px  (Large desktops)
2xl → 1536px  (Ultra-wide screens)
```

**Usage:**

```blade
{{-- Hidden on mobile, visible on tablet+ --}}
<div class="hidden md:block">Desktop content</div>

{{-- Mobile-first responsive grid --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    <x-card>Item 1</x-card>
    <x-card>Item 2</x-card>
    <x-card>Item 3</x-card>
</div>

{{-- Responsive padding --}}
<div class="px-4 md:px-6 lg:px-8">Content</div>

{{-- Responsive text size --}}
<h1 class="text-xl md:text-2xl lg:text-4xl font-bold">Tajuk</h1>
```

### 8.3 Mobile-First Design Principles {#mobile-first-design}

```blade
{{-- ✅ Always start with mobile design --}}

{{-- Navigation: Hidden hamburger on mobile, horizontal on desktop --}}
<nav class="hidden md:flex gap-4">
    <a href="#" class="hover:text-blue-600">Home</a>
    <a href="#" class="hover:text-blue-600">About</a>
</nav>

<button class="md:hidden" @click="mobileMenuOpen = !mobileMenuOpen">
    <svg class="h-6 w-6"><!-- hamburger menu --></svg>
</button>

{{-- Sidebar: Full-width on mobile, side-by-side on desktop --}}
<div class="flex flex-col md:flex-row gap-4">
    <aside class="w-full md:w-64 bg-gray-100 p-4">
        Sidebar content
    </aside>
    <main class="flex-1">
        Main content
    </main>
</div>

{{-- Touch-friendly buttons on mobile --}}
<button class="px-3 py-2 md:px-4 md:py-2 text-sm md:text-base">
    Minimal padding on mobile, comfortable spacing on desktop
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
<label for="email" class="block text-sm font-medium">
    Email Address
    <span class="text-red-600" aria-label="required">*</span>
</label>

<input 
    id="email"
    type="email"
    required
    aria-describedby="email-help"
    class="w-full px-3 py-2 border rounded"
/>

<p id="email-help" class="text-sm text-gray-600 mt-1">
    We'll never share your email address
</p>

{{-- ✅ Alerts and error messages --}}
<div role="alert" class="bg-red-50 border border-red-200 rounded p-4">
    <strong>Error:</strong> Please correct the following fields
    <ul class="list-disc list-inside mt-2">
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
>
    <span wire:loading.remove>Submit</span>
    <span wire:loading aria-live="polite">
        Loading...
    </span>
</button>

{{-- ✅ Skip to main content link --}}
<a href="#main-content" class="sr-only focus:not-sr-only">
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
<a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:top-0 focus:left-0 focus:bg-blue-600 focus:text-white focus:p-4 focus:z-50">
    Skip to main content
</a>

{{-- ✅ Modal dialog with focus trap --}}
<div id="importModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50" role="dialog" aria-modal="true" aria-labelledby="modalTitle" @show="$el.classList.add('flex'); $el.classList.remove('hidden')" @hide="$el.classList.add('hidden'); $el.classList.remove('flex')">
    <div class="flex items-center justify-center w-full h-full">
        <div class="bg-white rounded-lg p-6 max-w-md">
            <h2 id="modalTitle" class="text-lg font-semibold mb-4">Import Data</h2>

        <form @submit.prevent="handleImport">
            <input type="file" id="fileInput" accept=".xlsx,.csv" class="mb-4" autofocus>

            <div class="flex gap-2">
                <button type="submit" class="btn btn-primary">Import</button>
                <button type="button" @click="closeModal()" class="btn btn-secondary">Cancel</button>
            </div>
        </form>
    </div>
</div>
</div>

{{-- ❌ DON'T: Use tabindex > 0 --}}
<button tabindex="5">Button with high tabindex</button> {{-- ❌ Avoid --}}

{{-- ❌ DON'T: Remove focus outline without replacement --}}
<button style="outline: none;">No outline</button> {{-- ❌ Bad --}}

{{-- ❌ DON'T: Use div/span for interactive content --}}
<div @click="handleClick" class="cursor-pointer">Clickable text</div> {{-- ❌ Not keyboard accessible --}}

{{-- ✅ Use semantic buttons/links instead --}}
<button @click="handleClick">Clickable action</button> {{-- ✅ Good --}}
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
<div class="bg-blue-50 border border-blue-200 rounded p-4 mb-6">
    <h3 class="font-semibold text-sm mb-2">Keyboard Shortcuts</h3>
    <dl class="text-sm space-y-1">
        <div class="flex justify-between">
            <dt class="font-medium">Ctrl+S / Cmd+S</dt>
            <dd class="text-gray-600">Save data</dd>
        </div>
        <div class="flex justify-between">
            <dt class="font-medium">Ctrl+E / Cmd+E</dt>
            <dd class="text-gray-600">Export results</dd>
        </div>
        <div class="flex justify-between">
            <dt class="font-medium">Escape</dt>
            <dd class="text-gray-600">Close dialog</dd>
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
<div class="relative" x-data="{ open: false }">
    <button 
        @click="open = !open"
        @keydown.enter="open = true"
        @keydown.space="open = true"
        @keydown.escape="open = false"
        aria-haspopup="menu"
        :aria-expanded="open"
        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-2 focus:outline-blue-900"
    >
        Menu
        <svg class="inline ml-2 h-4 w-4" :class="{ 'rotate-180': open }"><!-- chevron --></svg>
    </button>

    <div 
        x-show="open"
        @click.away="open = false"
        role="menu"
        class="absolute top-full mt-2 w-48 bg-white border border-gray-200 rounded shadow-lg z-10"
    >
        <a 
            href="/dashboard"
            role="menuitem"
            @keydown.enter="open = false"
            @keydown.escape="open = false"
            @keydown.arrow-down="$el.nextElementSibling?.focus()"
            class="block w-full text-left px-4 py-2 hover:bg-gray-100 focus:bg-blue-100 outline-none"
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
            class="block w-full text-left px-4 py-2 hover:bg-gray-100 focus:bg-blue-100 outline-none"
        >
            Reports
        </a>

        <a 
            href="/settings"
            role="menuitem"
            @keydown.enter="open = false"
            @keydown.escape="open = false"
            @keydown.arrow-up="$el.previousElementSibling?.focus()"
            class="block w-full text-left px-4 py-2 hover:bg-gray-100 focus:bg-blue-100 outline-none"
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
    class="bg-green-50 border border-green-200 rounded p-4"
    x-show="show"
>
    <p class="text-green-800 font-semibold">✓ Berjaya</p>
    <p class="text-sm text-green-700">{{ $successMessage ?? 'Data tersimpan dengan berjaya' }}</p>
</div>
```

#### 9.3.2 Accessible Tables dengan Screen Readers

```blade
{{-- Semantic table untuk pembaca skrin --}}
<table class="w-full border-collapse">
    <caption class="sr-only">Senarai Homestay aktif mengikut negeri</caption>

    <thead class="bg-gray-100 border-b-2 border-gray-300">
        <tr>
            <th scope="col" class="text-left px-4 py-2">Nama Homestay</th>
            <th scope="col" class="text-left px-4 py-2">Negeri</th>
            <th scope="col" class="text-right px-4 py-2">Kapasiti</th>
            <th scope="col" class="text-right px-4 py-2">Penghunian (%)</th>
            <th scope="col" class="text-center px-4 py-2">Tindakan</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($homestays as $homestay)
            <tr class="border-b border-gray-200 hover:bg-gray-50">
                <td class="px-4 py-2">
                    <a href="{{ route('homestays.show', $homestay) }}" class="text-blue-600 hover:underline">
                        {{ $homestay->nama }}
                    </a>
                </td>
                <td class="px-4 py-2">{{ $homestay->negeri }}</td>
                <td class="text-right px-4 py-2">{{ $homestay->kapasiti }}</td>
                <td class="text-right px-4 py-2">
                    <span aria-label="Penghunian: {{ $homestay->occupancy_rate }}%">
                        {{ $homestay->occupancy_rate }}%
                    </span>
                </td>
                <td class="text-center px-4 py-2">
                    <a 
                        href="{{ route('homestays.edit', $homestay) }}"
                        aria-label="Edit {{ $homestay->nama }}"
                        class="text-blue-600 hover:underline"
                    >
                        Edit
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center px-4 py-8 text-gray-500">
                    Tiada Homestay ditemui
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

{{-- Alternative: Data table summary untuk pembaca skrin --}}
<div class="sr-only" aria-live="polite">
    Senarai Homestay: Total {{ count($homestays) }},
    Rata-rata penghunian {{ round($homestays->avg('occupancy_rate')) }}%,
    Kapasiti keseluruhan {{ $homestays->sum('kapasiti') }} tamu
</div>
```

#### 9.3.3 Form Labels & Descriptions

```blade
{{-- ✅ Proper form labeling --}}
<div class="mb-4">
    <label for="homestay_name" class="block text-sm font-medium text-gray-700 mb-1">
        Nama Homestay
        <span class="text-red-600" aria-label="diperlukan">*</span>
    </label>

    <input 
        type="text"
        id="homestay_name"
        name="homestay_name"
        aria-required="true"
        aria-describedby="homestay_name_help"
        class="w-full px-3 py-2 border border-gray-300 rounded"
        @error('homestay_name')
            aria-invalid="true"
            aria-describedby="homestay_name_error"
        @enderror
    />

    @error('homestay_name')
        <p id="homestay_name_error" class="mt-1 text-sm text-red-600" role="alert">
            {{ $message }}
        </p>
    @else
        <p id="homestay_name_help" class="mt-1 text-xs text-gray-500">
            Masukkan nama Homestay seperti yang terdaftar dengan MOTAC
        </p>
    @enderror
</div>

{{-- ✅ Checkbox group labeling --}}
<fieldset class="mb-4">
    <legend class="block text-sm font-medium text-gray-700 mb-2">Fasiliti Tersedia</legend>

    <div class="space-y-2">
        @foreach (['wifi' => 'WiFi', 'ac' => 'Air Conditioning', 'parking' => 'Parking'] as $value => $label)
            <div class="flex items-center">
                <input 
                    type="checkbox" 
                    id="facility_{{ $value }}" 
                    name="facilities[]" 
                    value="{{ $value }}"
                    class="mr-2"
                />
                <label for="facility_{{ $value }}" class="text-sm text-gray-700">
                    {{ $label }}
                </label>
            </div>
        @endforeach
    </div>
</fieldset>

{{-- ❌ DON'T: Unlabeled inputs --}}
<input type="text" placeholder="Nama">  {{-- ❌ No label --}}

{{-- ✅ Visible + hidden labels if needed --}}
<label for="email" class="sr-only">Emel</label>
<input type="email" id="email" placeholder="nama@example.com" class="w-full px-3 py-2 border rounded">
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
<div class="bg-white text-gray-900">4.5:1 Normal text ✓</div>
<div class="bg-blue-600 text-white">4.5:1 Button text ✓</div>
<div class="bg-gray-100 text-gray-700">4.5:1 Secondary text ✓</div>

<!-- ❌ Examples of non-compliant pairs -->
<div class="bg-gray-100 text-gray-400">2.3:1 Insufficient contrast ✗</div>
<div class="bg-light-blue text-light-gray">Insufficient contrast ✗</div>
```

#### 9.4.2 Contrast Test in Tailwind

```css
/* Custom Tailwind colors validated for contrast */
@layer components {
    .text-accessible-primary {
        @apply text-gray-900; /* 21:1 on white bg */
    }

    .text-accessible-secondary {
        @apply text-gray-700; /* 7:1 on white bg */
    }

    .text-accessible-tertiary {
        @apply text-gray-600; /* 5.5:1 on white bg */
    }

    .bg-button-primary {
        @apply bg-blue-600; /* 4.5:1 with white text */
    }

    .bg-button-secondary {
        @apply bg-gray-600; /* 4.5:1 with white text */
    }
}
```

#### 9.4.3 Accessible Icon Usage

```blade
{{-- ✅ Icons with text labels --}}
<button class="flex items-center gap-2 px-4 py-2 bg-green-600 text-white rounded">
    <svg class="h-5 w-5" aria-hidden="true"><!-- save icon --></svg>
    <span>Simpan</span>
</button>

{{-- ✅ Icon-only buttons with aria-label --}}
<button 
    aria-label="Tutup dialog"
    class="p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded"
>
    <svg class="h-6 w-6" aria-hidden="true"><!-- close icon --></svg>
</button>

{{-- ✅ Inline icons with aria-label --}}
<span class="flex items-center gap-1">
    <svg class="h-4 w-4 text-green-600" aria-hidden="true"><!-- success checkmark --></svg>
    <span>Berjaya</span>
</span>

{{-- ❌ DON'T: Icon-only without label --}}
<button class="p-2">
    <svg class="h-6 w-6"><!-- Close icon without aria-label --></svg>
</button>

{{-- ❌ DON'T: Rely on color alone --}}
<span class="text-red-600">Error</span> {{-- ❌ Color only, should have icon/text --}}
<span class="flex items-center gap-1">
    <svg class="h-4 w-4 text-red-600"><!-- error icon --></svg>
    <span class="text-red-600">Error</span>
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
<div class="text-red-600">
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
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    <!-- Responsive grid -->
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

### 11.3 Tailwind CSS Konvensi | Tailwind CSS Conventions

```html
<!-- ✅ Class ordering: position → sizing → spacing → color → typography → effects -->
<div class="absolute top-4 left-0 w-full h-screen px-4 py-6 bg-white text-gray-900 text-lg font-semibold rounded shadow-lg">
    Content
</div>

<!-- ✅ Responsive prefixes: sm: md: lg: xl: 2xl: -->
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
    <!-- Responsive grid -->
</div>

<!-- ✅ State variants: hover: focus: active: disabled: -->
<button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-2 focus:outline-blue-900 disabled:opacity-50 disabled:cursor-not-allowed">
    Button
</button>
```

```css
/* ✅ Use Tailwind @apply for repeated patterns */
@layer components {
    .btn {
        @apply px-4 py-2 rounded-lg font-semibold;
    }
}
```

### 11.4 Vue/Livewire Konvensi | Component Conventions

```blade
<!-- File: resources/views/components/user-profile.blade.php -->

<div class="space-y-6">
    <!-- Header section -->
    <div class="border-b pb-4">
        <h2 class="text-2xl font-bold">Profil Pengguna</h2>
    </div>

    <!-- Main content -->
    <form @submit.prevent="save" class="space-y-4">
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

1.  **Konsistensi:** Gunakan sistem warna, tipografi, dan komponen standard di seluruh aplikasi.
2.  **Aksesibiliti:** Pastikan semua elemen memenuhi `WCAG 2.1 AA` untuk keyboard, screen reader, dan visual accessibility.
3.  **Prestasi:** Optimumkan beban halaman, caching, dan rendering untuk pengalaman pengguna yang cepat.
4.  **Keselamatan:** Lindungi data pengguna dengan enkripsi, validasi input, dan kontrol akses yang ketat.
5.  **Pemeliharaan:** Tulis kod yang jelas, modular, dan didokumenkan dengan baik untuk kemudahan pemeliharaan masa depan.

Dokumen ini harus dirujuk secara berkala dan dikemas kini seiring dengan evolusi sistem dan pembelajaran dari pengalaman pengguna.

---

- **Versi:** 1.1
- **Tarikh Akhir Kemaskini:** 15 Oktober 2025
- **Status:** Siap untuk Implementasi | Ready for Implementation
- **Persetujuan:** BPM MOTAC | MOTAC BPM Approval

---

## Akhir Dokumen | End of Document
