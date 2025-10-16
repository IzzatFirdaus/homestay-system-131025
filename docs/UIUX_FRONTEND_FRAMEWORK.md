# UI/UX Frontend Framework

- **Sistem:** Sistem Pengurusan & Analitik Homestay Malaysia
- **Pemilik Sistem:** MOTAC, Tourism Malaysia
- **Versi:** 1.0
- **Tarikh:** 16 Oktober 2025
- **Stack Teknologi:** `Laravel 12` + `Blade` + `Livewire` + `AlpineJS` + `Bootstrap 5`

---

## Overview

This document provides a frontend skeleton framework for the `Sistem Pengurusan & Analitik Homestay Malaysia`, fully aligned with the architectural decisions and conventions described in the project documentation set.

---

## Framework Principles

- **Laravel 12** with `Blade` and `Livewire` (core UI engine)
- **AlpineJS** for lightweight client-side interactivity
- **Bootstrap 5** for CSS framework and components (SCSS customization via `resources/scss/app.scss`)
  - **Note:** `tailwind.config.js` exists from scaffolding but is not actively used in this project
- **Bootstrap Icons** for icon library (via `bi` classes, e.g., `bi-check`, `bi-x`)
- **i18n:** Bahasa Malaysia (default) & English toggle
- **WCAG 2.1 AA** accessibility built-in (semantic HTML, ARIA where needed)
- **Modular structure:** Component-based (reusable `Blade` and `Livewire` components)
- **Asset pipeline:** `Vite` (JS/CSS build/versioning)

---

## Directory Structure

Below is a concise, maintainable, and extensible skeleton structure for the frontend:

```bash
resources/
├── views/
│   ├── layouts/
│   │   ├── app.blade.php          # Main layout (header, nav, footer, slots)
│   │   └── guest.blade.php        # For login/reset, minimal layout
│   ├── components/
│   │   ├── alert.blade.php        # Reusable alert/message component
│   │   ├── modal.blade.php        # Accessible modal
│   │   ├── datatable.blade.php    # Accessible, paginated table base
│   │   └── ...                    # Other UI primitives
│   ├── dashboard/
│   │   ├── index.blade.php        # Dashboard main page, includes Livewire metrics
│   │   └── partials/
│   │       ├── kpi-cards.blade.php
│   │       ├── chart-summary.blade.php
│   │       └── filters.blade.php
│   ├── homestays/
│   │   ├── index.blade.php        # Homestay list/search
│   │   ├── show.blade.php         # Homestay detail profile
│   │   └── edit.blade.php         # Homestay edit form
│   ├── import/
│   │   ├── upload.blade.php       # Excel/CSV upload + progress
│   │   ├── preview.blade.php      # Preview data, show validation errors
│   │   └── result.blade.php       # Import result log
│   ├── reports/
│   │   ├── index.blade.php        # Laporan list/export
│   │   └── show.blade.php         # Laporan detail
│   ├── users/
│   │   ├── index.blade.php        # User management, RBAC controls
│   │   └── form.blade.php         # Create/edit user form
│   ├── auth/
│   │   ├── login.blade.php
│   │   ├── forgot-password.blade.php
│   │   └── reset-password.blade.php
│   └── welcome.blade.php          # Landing page
│
├── lang/
│   ├── ms/
│   │   └── ...                    # BM translations
│   └── en/
│       └── ...                    # EN translations
│
├── livewire/
│   ├── Dashboard/                 # Livewire: Dashboard logic & metrics
│   ├── Homestay/                  # Livewire: Homestay CRUD
│   ├── Import/                    # Livewire: Import workflow
│   ├── Report/                    # Livewire: Reporting & export
│   └── ...                        # Other modules as needed
│
└── js/
    ├── app.js                     # Vite entry, bootstraps AlpineJS, events
    └── components/                # Alpine components, e.g., dropdowns, modals
public/
├── assets/
│   ├── css/                       # Bootstrap 5 (or Tailwind), app.css
│   └── js/                        # Compiled app.js, vendor
└── images/                        # Logos, icons, illustrative assets
```

### Example: Main Layout (`resources/views/layouts/app.blade.php`)

```blade
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Homestay Malaysia')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body class="bg-light text-dark">
    <header>
        @include('components.navbar')
    </header>
    <main id="main-content" tabindex="-1" class="container py-4">
        @include('components.alert')
        @yield('content')
    </main>
    <footer class="mt-auto py-3 bg-white border-top text-center small">
        &copy; {{ date('Y') }} MOTAC / Tourism Malaysia
    </footer>
    @stack('scripts')
</body>
</html>
```

### Example: Accessible, Modular Livewire Component Structure

- `app/Livewire/Dashboard/Overview.php` (for summary metrics)
- `resources/views/livewire/dashboard/overview.blade.php` (for rendering)

### Accessibility & i18n

- All navigation, forms, and tables use semantic `HTML5` with `ARIA` attributes where necessary.
- Language switcher in navbar; text labels/strings use `@lang('key')`.
- Focus management, high-contrast color classes, and keyboard navigation for all modals/dialogs.

### Responsive Design

- **Bootstrap 5 Grid System** for responsive layouts:
  - Breakpoints: `xs` (<576px), `sm` (≥576px), `md` (≥768px), `lg` (≥992px), `xl` (≥1200px), `xxl` (≥1400px)
  - Grid: `row` + `col-{breakpoint}-{width}` (e.g., `col-12 col-md-6 col-lg-4`)
  - Utilities: `d-none d-md-block`, `flex-column flex-md-row`, `px-3 px-md-4`
- All inputs, buttons, and components designed to work on desktop, tablet, and mobile.
- Mobile-first approach: style for mobile first, then use Bootstrap breakpoint utilities to override for larger screens.

### Testing

- `Blade` views/components are unit tested (via Laravel's test suite).
- `Livewire` components have feature tests for logic/interaction.

---

### To Extend

- Add `Livewire` components for each key module as per `D03` (import, dashboard, report, user).
- Integrate `Chart.js` via `Livewire`/`Blade` for interactive analytics (see `TECHNICAL_DESIGN_DOCUMENTATION.md`).
- Use `.env` for API endpoints/config where frontend needs to fetch via `AJAX`.

---

### Key Benefits

- Modular, scalable structure for all major flows (import, dashboard, management, reporting)
- Built-in accessibility and i18n
- Ready for CI/CD, automated testing, and future module expansion
