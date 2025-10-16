# Bootstrap 5 Theme Quick Reference

**Project:** Homestay Malaysia Management & Analytics System  
**Updated:** October 16, 2025

---

## Color Palette

### Primary Colors

```scss
$primary: #0EA5E9;    // MOTAC blue
$secondary: #6B7280;  // Neutral gray
$success: #10B981;    // Green
$danger: #EF4444;     // Red
$warning: #F59E0B;    // Homestay gold
$info: #3B82F6;       // Blue
$light: #F9FAFB;      // Very light
$dark: #0C3C66;       // MOTAC dark blue
```

### Custom Theme Colors

```scss
bg-motac-light    // #E0F2FE
bg-motac-dark     // #075985
bg-homestay-gold  // #F59E0B
```

---

## Typography

### Font Family

```scss
font-family: 'Figtree', 'Segoe UI', 'Roboto', sans-serif;
```

### Font Weights

```html
<span class="fw-light">Light (300)</span>
<span class="fw-normal">Normal (400)</span>
<span class="fw-medium">Medium (500)</span>
<span class="fw-semibold">Semi-bold (600)</span>
<span class="fw-bold">Bold (700)</span>
```

### Font Sizes

```html
<span class="fs-1">Largest</span>
<span class="fs-2">...</span>
<span class="fs-6">Smallest</span>
<small>Small text</small>
<p class="lead">Emphasized paragraph</p>
```

---

## Spacing (0-5 Scale)

| Class | Value | Pixels |
|-------|-------|--------|
| `p-0` / `m-0` | 0 | 0px |
| `p-1` / `m-1` | 0.25rem | 4px |
| `p-2` / `m-2` | 0.5rem | 8px |
| `p-3` / `m-3` | 1rem | 16px |
| `p-4` / `m-4` | 1.5rem | 24px |
| `p-5` / `m-5` | 3rem | 48px |

### Directional Spacing

```html
<div class="p-3">Padding all sides (1rem)</div>
<div class="px-3">Padding x-axis (left/right)</div>
<div class="py-2">Padding y-axis (top/bottom)</div>
<div class="pt-4">Padding top only</div>
<div class="mt-5 mx-auto">Margin top 3rem, x-axis auto (center)</div>
```

---

## Components

### Buttons

```html
<!-- Solid variants -->
<button class="btn btn-primary">Primary</button>
<button class="btn btn-secondary">Secondary</button>
<button class="btn btn-success">Success</button>
<button class="btn btn-danger">Danger</button>
<button class="btn btn-warning">Warning</button>

<!-- Outline variants -->
<button class="btn btn-outline-primary">Outline Primary</button>

<!-- Sizes -->
<button class="btn btn-primary btn-sm">Small</button>
<button class="btn btn-primary">Normal</button>
<button class="btn btn-primary btn-lg">Large</button>
<button class="btn btn-primary w-100">Full Width</button>
```

### Form Inputs

```html
<!-- Text Input -->
<div class="mb-3">
  <label for="name" class="form-label">Name</label>
  <input type="text" class="form-control" id="name" name="name">
</div>

<!-- Select -->
<div class="mb-3">
  <label for="state" class="form-label">State</label>
  <select class="form-select" id="state" name="state">
    <option selected>Choose...</option>
    <option value="1">Johor</option>
  </select>
</div>

<!-- Textarea -->
<div class="mb-3">
  <label for="notes" class="form-label">Notes</label>
  <textarea class="form-control" id="notes" rows="3"></textarea>
</div>

<!-- Checkbox -->
<div class="form-check">
  <input class="form-check-input" type="checkbox" id="agree">
  <label class="form-check-label" for="agree">I agree</label>
</div>

<!-- Validation States -->
<input type="text" class="form-control is-invalid" id="error">
<div class="invalid-feedback">This field is required</div>

<input type="text" class="form-control is-valid" id="success">
<div class="valid-feedback">Looks good!</div>
```

### Cards

```html
<div class="card">
  <div class="card-header">
    <h5 class="mb-0">Card Title</h5>
  </div>
  <div class="card-body">
    <p class="card-text">Card content goes here.</p>
    <button class="btn btn-primary">Action</button>
  </div>
  <div class="card-footer text-muted">
    Footer content
  </div>
</div>
```

### Alerts

```html
<!-- Success Alert -->
<div class="alert alert-success" role="alert">
  <i class="bi bi-check-circle me-2"></i>
  Success message!
</div>

<!-- Dismissible Alert -->
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <i class="bi bi-exclamation-triangle me-2"></i>
  Warning message!
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
```

### Modals

```html
<!-- Trigger Button -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Open Modal
</button>

<!-- Modal Structure -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Modal content goes here.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
```

---

## Grid System

### Basic Grid

```html
<div class="container">
  <div class="row">
    <div class="col-12 col-md-6 col-lg-4">Column 1</div>
    <div class="col-12 col-md-6 col-lg-4">Column 2</div>
    <div class="col-12 col-md-12 col-lg-4">Column 3</div>
  </div>
</div>
```

### Breakpoints

| Prefix | Min Width | Device |
|--------|-----------|--------|
| `xs` | <576px | Phone (default) |
| `sm` | ≥576px | Phone (landscape) |
| `md` | ≥768px | Tablet |
| `lg` | ≥992px | Desktop |
| `xl` | ≥1200px | Large Desktop |
| `xxl` | ≥1400px | Extra Large |

---

## Icons (Bootstrap Icons)

```html
<!-- Basic Icon -->
<i class="bi bi-house-door"></i>

<!-- With sizing -->
<i class="bi bi-check fs-1"></i> <!-- Largest -->
<i class="bi bi-check fs-6"></i> <!-- Smallest -->

<!-- With color -->
<i class="bi bi-check text-success"></i>
<i class="bi bi-x text-danger"></i>

<!-- Common Icons -->
<i class="bi bi-house-door"></i> <!-- Homestay -->
<i class="bi bi-graph-up"></i> <!-- Performance -->
<i class="bi bi-upload"></i> <!-- Import -->
<i class="bi bi-file-earmark-text"></i> <!-- Reports -->
<i class="bi bi-people"></i> <!-- Users -->
<i class="bi bi-gear"></i> <!-- Settings -->
<i class="bi bi-box-arrow-right"></i> <!-- Logout -->
```

Full icon list: <https://icons.getbootstrap.com/>

---

## Utilities

### Display

```html
<div class="d-none">Hidden</div>
<div class="d-block">Block</div>
<div class="d-flex">Flexbox</div>
<div class="d-grid">Grid</div>

<!-- Responsive Display -->
<div class="d-none d-md-block">Hidden on mobile, visible tablet+</div>
<div class="d-md-none">Visible on mobile, hidden tablet+</div>
```

### Flexbox

```html
<div class="d-flex justify-content-between align-items-center">
  <span>Left</span>
  <span>Right</span>
</div>

<div class="d-flex flex-column">Vertical stack</div>
<div class="d-flex flex-row">Horizontal row</div>
<div class="d-flex flex-wrap">Wrap items</div>
```

### Text Utilities

```html
<p class="text-start">Left aligned</p>
<p class="text-center">Center aligned</p>
<p class="text-end">Right aligned</p>

<p class="text-lowercase">lowercase</p>
<p class="text-uppercase">UPPERCASE</p>
<p class="text-capitalize">Capitalize Each Word</p>

<p class="text-truncate">Long text will be truncated...</p>
```

### Background & Borders

```html
<div class="bg-primary text-white p-3">Background primary</div>
<div class="bg-light border rounded p-3">Light background with border</div>

<!-- Border Radius -->
<div class="rounded">Default radius (6px)</div>
<div class="rounded-pill">Pill shape</div>
<div class="rounded-circle">Circle (requires square)</div>
```

### Shadows

```html
<div class="shadow-none">No shadow</div>
<div class="shadow-sm">Small shadow</div>
<div class="shadow">Default shadow</div>
<div class="shadow-lg">Large shadow</div>
```

---

## Accessibility

### Skip to Content

```blade
<a href="#main-content" class="visually-hidden-focusable">
  {{ __('layout.skip_to_content') }}
</a>

<main id="main-content" tabindex="-1">
  @yield('content')
</main>
```

### Screen Reader Only Text

```html
<span class="visually-hidden">For screen readers only</span>
```

### ARIA Attributes

```html
<!-- Live Regions -->
<div aria-live="polite" role="status">
  <span wire:loading>{{ __('common.general.loading') }}</span>
</div>

<!-- Labels -->
<button aria-label="Close" class="btn-close"></button>

<!-- Expanded State -->
<button aria-expanded="false" aria-controls="menu">Toggle Menu</button>
```

---

## Livewire Integration

### Loading States

```blade
<button class="btn btn-primary" wire:loading.attr="disabled">
  <span wire:loading.remove>Save</span>
  <span wire:loading>
    <span class="spinner-border spinner-border-sm me-1"></span>
    Saving...
  </span>
</button>
```

### Data Binding

```blade
<input type="text" class="form-control" wire:model.live="search" placeholder="Search...">
```

### Confirmation Dialogs

```blade
<button wire:click="delete" wire:confirm="Are you sure?">
  Delete
</button>
```

---

## Common Patterns

### Page Header

```blade
<div class="d-flex justify-content-between align-items-center mb-4">
  <h1 class="h3 mb-0">{{ __('homestays.index.title') }}</h1>
  <button class="btn btn-primary">
    <i class="bi bi-plus-circle me-1"></i>
    {{ __('homestays.index.actions.create') }}
  </button>
</div>
```

### Data Table

```blade
<div class="table-responsive">
  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">State</th>
        <th scope="col" class="text-end">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($homestays as $homestay)
      <tr>
        <td>{{ $homestay->nama }}</td>
        <td>{{ $homestay->negeri }}</td>
        <td class="text-end">
          <button class="btn btn-sm btn-outline-primary">Edit</button>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
```

### Empty State

```blade
<div class="text-center py-5">
  <i class="bi bi-inbox fs-1 text-muted"></i>
  <h5 class="mt-3">{{ __('homestays.index.table.empty') }}</h5>
  <p class="text-muted">{{ __('homestays.index.table.empty_description') }}</p>
  <button class="btn btn-primary mt-2">
    {{ __('homestays.index.actions.create') }}
  </button>
</div>
```

---

## Resources

- [Bootstrap 5.3 Docs](https://getbootstrap.com/docs/5.3/)
- [Bootstrap Icons](https://icons.getbootstrap.com/)
- [WCAG 2.1 Guidelines](https://www.w3.org/WAI/WCAG21/quickref/)
- [Project UI Design Guide](./UIUX_DESIGN_GUIDE.md)
- [Project Style Guide](./UIUX_STYLE_GUIDE.md)

---

**Last Updated:** October 16, 2025
