# Component Library Quick Reference

**Version:** 1.0  
**Date:** October 16, 2025  
**Framework:** Bootstrap 5 + Laravel Blade

---

## 🎯 Quick Links

- **Demo Page:** `/components-demo` (development only, requires login)
- **Full Documentation:** `PHASE12_CORE_COMPONENTS_IMPLEMENTATION.md`
- **Component Files:** `resources/views/components/`

---

## 📦 Available Components

| Component | File | Purpose |
|-----------|------|---------|
| Button | `button.blade.php` | Interactive buttons with variants |
| Card | `card.blade.php` | Content containers |
| Alert | `alert.blade.php` | Feedback messages |
| Modal | `modal.blade.php` | Dialog windows |
| Form Input | `form-input.blade.php` | Text inputs with validation |
| Data Table | `data-table.blade.php` | Tabular data display |
| Toast | `toast.blade.php` | Notification popups |

---

## 🔧 Usage Examples

### Button

```blade
{{-- Primary button --}}
<x-button variant="primary">Save</x-button>

{{-- With icon --}}
<x-button variant="success" icon="bi-check-circle">Approve</x-button>

{{-- Loading state --}}
<x-button :loading="$isProcessing">Processing...</x-button>

{{-- Outline variant --}}
<x-button variant="danger" outline size="sm">Delete</x-button>
```

**Props:**

- `variant`: primary, secondary, success, danger, warning, info, light, dark, link
- `size`: sm, md, lg
- `outline`: boolean
- `loading`: boolean
- `disabled`: boolean
- `type`: button, submit, reset
- `icon`: Bootstrap Icon class (e.g., 'bi-plus-circle')
- `iconPosition`: start, end

---

### Card

```blade
{{-- Basic card --}}
<x-card title="Dashboard" subtitle="Overview">
    <p>Content here</p>
</x-card>

{{-- With footer --}}
<x-card title="Report" elevated>
    <p>Report content</p>
    <x-slot:footer>
        <x-button>Download</x-button>
    </x-slot:footer>
</x-card>

{{-- Custom header --}}
<x-card>
    <x-slot:header>
        <div class="d-flex justify-content-between">
            <h5>Custom Header</h5>
            <span>Badge</span>
        </div>
    </x-slot:header>
    <p>Body content</p>
</x-card>
```

**Props:**

- `title`: string
- `subtitle`: string
- `elevated`: boolean (adds shadow)
- `bordered`: boolean (default: true)
- `headerClass`: additional CSS classes
- `bodyClass`: additional CSS classes
- `footerClass`: additional CSS classes

---

### Alert

```blade
{{-- Success alert --}}
<x-alert type="success" dismissible title="Success!">
    Operation completed successfully.
</x-alert>

{{-- Warning with auto-dismiss --}}
<x-alert type="warning" :autoDismiss="5000">
    This will disappear in 5 seconds.
</x-alert>

{{-- Custom icon --}}
<x-alert type="info" icon="bi-lightbulb-fill">
    Helpful tip here.
</x-alert>
```

**Props:**

- `type`: success, danger, warning, info, primary, secondary, light, dark
- `dismissible`: boolean
- `title`: string
- `icon`: Bootstrap Icon class (uses default if not provided)
- `autoDismiss`: milliseconds (optional)

---

### Modal

```blade
{{-- Modal definition --}}
<x-modal id="confirmModal" title="Confirm Delete" size="sm" centered static>
    <p>Are you sure you want to delete this item?</p>
    <x-slot:footer>
        <x-button variant="secondary" data-bs-dismiss="modal">Cancel</x-button>
        <x-button variant="danger">Delete</x-button>
    </x-slot:footer>
</x-modal>

{{-- Trigger button --}}
<x-button data-bs-toggle="modal" data-bs-target="#confirmModal">
    Delete Item
</x-button>

{{-- Large scrollable modal --}}
<x-modal id="detailsModal" title="Details" size="lg" scrollable>
    <p>Long content that scrolls...</p>
</x-modal>
```

**Props:**

- `id`: unique identifier (REQUIRED)
- `title`: modal title
- `size`: sm, md, lg, xl
- `centered`: boolean (vertically center)
- `scrollable`: boolean (scrollable body)
- `static`: boolean (prevent dismiss on backdrop click)
- `closeButton`: boolean (default: true)

---

### Form Input

```blade
{{-- Basic input --}}
<x-form-input
    name="name"
    label="Full Name"
    placeholder="Enter your name"
    required
/>

{{-- With validation error --}}
<x-form-input
    name="email"
    label="Email"
    type="email"
    :error="$errors->first('email')"
    :value="old('email')"
/>

{{-- With help text --}}
<x-form-input
    name="phone"
    label="Phone Number"
    helpText="Include country code"
    placeholder="+60123456789"
/>

{{-- Password with maxlength --}}
<x-form-input
    name="password"
    label="Password"
    type="password"
    required
    maxlength="50"
/>
```

**Props:**

- `name`: input name (REQUIRED)
- `label`: label text
- `type`: text, email, password, tel, number, url, etc.
- `required`: boolean
- `disabled`: boolean
- `readonly`: boolean
- `error`: error message string
- `placeholder`: placeholder text
- `helpText`: help text below input
- `value`: input value
- `maxlength`: max character length
- `pattern`: regex pattern
- `autocomplete`: autocomplete attribute

---

### Data Table

```blade
@php
    $columns = [
        ['key' => 'name', 'label' => 'Name', 'sortable' => true],
        ['key' => 'email', 'label' => 'Email', 'sortable' => true],
        ['key' => 'role', 'label' => 'Role'],
        ['key' => 'status', 'label' => 'Status'],
    ];
    
    $rows = [
        ['name' => 'John Doe', 'email' => 'john@example.com', 'role' => 'Admin', 'status' => 'Aktif'],
        ['name' => 'Jane Smith', 'email' => 'jane@example.com', 'role' => 'User', 'status' => 'Aktif'],
    ];
@endphp

{{-- Basic table --}}
<x-data-table :columns="$columns" :rows="$rows" striped hover />

{{-- With actions column --}}
<x-data-table :columns="$columns" :rows="$rows" striped hover sortable>
    <x-slot:actions="{ $row }">
        <div class="btn-group btn-group-sm">
            <x-button size="sm" variant="primary" icon="bi-eye"></x-button>
            <x-button size="sm" variant="secondary" icon="bi-pencil"></x-button>
            <x-button size="sm" variant="danger" icon="bi-trash"></x-button>
        </div>
    </x-slot:actions>
</x-data-table>

{{-- Empty state --}}
<x-data-table :columns="$columns" :rows="[]" emptyText="No users found" />
```

**Props:**

- `columns`: array of column definitions (REQUIRED)
- `rows`: array of data rows (REQUIRED)
- `striped`: boolean (zebra striping)
- `hover`: boolean (row hover)
- `bordered`: boolean (table borders)
- `small`: boolean (compact size)
- `responsive`: boolean (default: true)
- `sortable`: boolean (show sort indicators)
- `emptyText`: custom empty state text

---

### Toast

```blade
{{-- Include in layout (once) --}}
<x-toast />

{{-- Trigger from JavaScript --}}
<x-button
    @click="window.dispatchEvent(new CustomEvent('toast', {
        detail: { message: 'Success!', type: 'success' }
    }))"
>
    Show Toast
</x-button>

{{-- Trigger from Livewire --}}
<x-button wire:click="$dispatch('toast', {
    message: 'Saved successfully!',
    type: 'success'
})">
    Save
</x-button>
```

**Event Detail:**

- `message`: string (REQUIRED)
- `type`: success, error, warning, info (default: success)

---

## 🎨 Bootstrap 5 Variants

All components use Bootstrap 5 color variants:

- `primary` - #0EA5E9 (MOTAC brand blue)
- `secondary` - Gray
- `success` - Green (#10B981)
- `danger` - Red (#EF4444)
- `warning` - Yellow (#F59E0B)
- `info` - Cyan
- `light` - Light gray
- `dark` - Dark gray (#0C3C66 MOTAC dark)

---

## ♿ Accessibility Features

All components include:

- ✅ Keyboard navigation (Tab, Enter, Escape)
- ✅ ARIA attributes (role, aria-label, aria-describedby, etc.)
- ✅ Semantic HTML elements
- ✅ Focus indicators
- ✅ Screen reader support
- ✅ Error announcements

**Test with:**

- Keyboard only navigation
- Screen reader (NVDA/VoiceOver)
- Axe DevTools browser extension

---

## 🚀 Best Practices

1. **Always use translation keys** for user-facing text:

   ```blade
   <x-button>{{ __('common.buttons.save') }}</x-button>
   ```

2. **Provide accessible labels** for all form inputs:

   ```blade
   <x-form-input name="email" label="{{ __('auth.email') }}" />
   ```

3. **Use semantic variants** (not just colors):

   ```blade
   {{-- Good: Semantic meaning --}}
   <x-button variant="danger">Delete</x-button>
   
   {{-- Avoid: Arbitrary color choice --}}
   <x-button variant="warning">Delete</x-button>
   ```

4. **Include error handling** in forms:

   ```blade
   <x-form-input
       name="email"
       :error="$errors->first('email')"
       :value="old('email')"
   />
   ```

5. **Use loading states** for async operations:

   ```blade
   <x-button :loading="$isProcessing">
       {{ __('common.buttons.save') }}
   </x-button>
   ```

---

## 📚 Further Reading

- **Full Implementation Guide:** `PHASE12_CORE_COMPONENTS_IMPLEMENTATION.md`
- **Bootstrap 5 Docs:** <https://getbootstrap.com/docs/5.3/>
- **WCAG 2.1 Guidelines:** <https://www.w3.org/WAI/WCAG21/quickref/>
- **Bootstrap Icons:** <https://icons.getbootstrap.com/>

---

**Last Updated:** October 16, 2025  
**Maintained By:** MOTAC Frontend Team
