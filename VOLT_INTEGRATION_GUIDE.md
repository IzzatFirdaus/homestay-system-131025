# Laravel Volt Integration Guide

**Project:** Homestay Malaysia Management & Analytics System  
**Date:** October 15, 2025  
**Phase:** 8.1 (Volt Integration)

---

## 1. Overview

This document outlines the integration of **Laravel Volt** (Livewire Volt v1.7.0) into the existing Laravel 12 + Livewire 3 codebase. Volt enables concise, file-based reactive components with reduced boilerplate while maintaining full compatibility with traditional Blade/Livewire components.

---

## 2. Installation Status

✅ **Volt is already installed** via Composer:

```json
"livewire/volt": "^1.7.0"
```

No additional installation required.

---

## 3. Directory Structure

Volt components are stored in:

```
resources/views/pages/          # Page-level Volt components (routable)
resources/views/pages/dashboard/
resources/views/pages/homestays/
resources/views/pages/performances/
resources/views/pages/imports/
resources/views/pages/reports/
```

---

## 4. Created Volt Components

### a. **Dashboard Stats (Functional API)**

**File:** `resources/views/pages/dashboard/stats.blade.php`

**Features:**

- Uses Volt's functional API (`state`, `mount`, `computed`)
- Integrates with `ReportService`
- Redis caching with 15-minute TTL
- Role-based filtering (pemerhati scope)
- Displays 4 KPI cards: Total Visitors, Revenue, Homestays, Occupancy Rate

**Usage:**

```blade
@livewire('pages.dashboard.stats')
```

### b. **Homestay Index (Class-based API)**

**File:** `resources/views/pages/homestays/index.blade.php`

**Features:**

- Uses Volt's class-based API (anonymous class extending `Volt\Component`)
- Real-time search with debouncing (300ms)
- Filters: negeri, status
- Pagination with `WithPagination` trait
- Policy-based authorization (`@can`)
- Loading states with `wire:loading`
- Integrates with existing Blade components (`<x-card>`, `<x-empty-state>`)

**Usage:**

```blade
@livewire('pages.homestays.index')
```

---

## 5. Routing Options

### Option 1: Manual Routing (Recommended for Control)

Add to `routes/web.php`:

```php
use Livewire\Volt\Volt;

Route::middleware(['auth', 'verified'])->group(function () {
    // Volt-powered dashboard stats
    Route::get('/dashboard/stats', Volt::page('dashboard.stats'))->name('dashboard.stats');
    
    // Volt-powered homestay listing
    Route::get('/homestays/volt', Volt::page('homestays.index'))->name('homestays.volt.index');
});
```

### Option 2: Automatic Routing (Experimental)

Add at the top of `routes/web.php`:

```php
if (class_exists(\Livewire\Volt\Volt::class)) {
    \Livewire\Volt\Volt::routes();
}
```

This will auto-register all `.blade.php` files in `resources/views/pages/` as routes.

---

## 6. Coexistence Strategy

### Hybrid Approach

- **Existing components:** Keep traditional Livewire components (`app/Livewire/`) unchanged
- **New features:** Write using Volt for rapid development
- **Gradual migration:** Convert existing components to Volt incrementally

### Calling Volt from Blade

```blade
<!-- In traditional Blade view -->
<div>
    <h1>Dashboard</h1>
    
    <!-- Embed Volt component -->
    @livewire('pages.dashboard.stats')
    
    <!-- Traditional Livewire component -->
    @livewire('dashboard.visitors-chart')
</div>
```

### Using Blade Components in Volt

```php
<!-- In Volt component -->
<div>
    <!-- Reuse existing Blade components -->
    <x-card>
        <x-alert type="success" :message="$successMessage" />
    </x-card>
</div>
```

---

## 7. Volt API Patterns

### Functional API (Simple Components)

```php
<?php

use function Livewire\Volt\{state, computed, mount};

state(['count' => 0]);

$increment = fn() => $this->count++;
$decrement = fn() => $this->count--;

?>

<div>
    <h1>{{ $count }}</h1>
    <button wire:click="increment">+</button>
    <button wire:click="decrement">-</button>
</div>
```

### Class-based API (Complex Components)

```php
<?php

use function Livewire\Volt\Component;
use Livewire\WithPagination;

new class extends Component {
    use WithPagination;
    
    public string $search = '';
    
    public function updatedSearch(): void
    {
        $this->resetPage();
    }
    
    public function posts()
    {
        return Post::where('title', 'like', "%{$this->search}%")
            ->paginate(10);
    }
}

?>

<div>
    <input wire:model.live="search" />
    @foreach($this->posts as $post)
        <div>{{ $post->title }}</div>
    @endforeach
    {{ $this->posts->links() }}
</div>
```

---

## 8. Service Layer Integration

Volt components can inject services via:

### Method Injection

```php
public function save(HomestayService $service): void
{
    $service->createHomestay($this->form);
}
```

### Direct Resolution

```php
$stats = computed(function () {
    $service = app(ReportService::class);
    return $service->getDashboardStats();
});
```

---

## 9. Authorization & Policies

### Using Gates

```php
use function Livewire\Volt\{state, mount};

mount(function () {
    $this->authorize('viewAny', Homestay::class);
});
```

### In Templates

```blade
@can('create', App\Models\Homestay::class)
    <button wire:click="create">Create</button>
@endcan
```

---

## 10. Testing Volt Components

Volt components are tested like standard Livewire components:

```php
use Livewire\Volt\Volt;

test('homestay index displays data', function () {
    $homestay = Homestay::factory()->create(['nama_homestay' => 'Test Home']);
    
    Volt::test('pages.homestays.index')
        ->assertSee('Test Home');
});

test('search filters homestays', function () {
    Homestay::factory()->create(['nama_homestay' => 'Alpha']);
    Homestay::factory()->create(['nama_homestay' => 'Beta']);
    
    Volt::test('pages.homestays.index')
        ->set('search', 'Alpha')
        ->assertSee('Alpha')
        ->assertDontSee('Beta');
});
```

---

## 11. Comparison: Traditional vs Volt

### Traditional Livewire Component

**PHP Class:** `app/Livewire/Homestays/IndexTable.php` (50+ lines)

```php
<?php
namespace App\Livewire\Homestays;

use Livewire\Component;
use Livewire\WithPagination;

class IndexTable extends Component
{
    use WithPagination;
    
    public $search = '';
    
    public function updatedSearch() { $this->resetPage(); }
    
    public function render()
    {
        return view('livewire.homestays.index-table', [
            'homestays' => Homestay::where('nama_homestay', 'like', "%{$this->search}%")
                ->paginate(15)
        ]);
    }
}
```

**Blade View:** `resources/views/livewire/homestays/index-table.blade.php` (100+ lines)

**Total:** 2 files, 150+ lines

---

### Volt Component

**Single File:** `resources/views/pages/homestays/index.blade.php` (120 lines)

```php
<?php
use Livewire\WithPagination;

new class extends \Livewire\Volt\Component {
    use WithPagination;
    public string $search = '';
    public function updatedSearch(): void { $this->resetPage(); }
    public function homestays() { return Homestay::where(...)->paginate(15); }
}
?>
<!-- Inline Blade template here -->
```

**Total:** 1 file, 120 lines

---

## 12. Migration Checklist

### Phase 1: New Components (Immediate)

- [ ] Write all new dashboard widgets using Volt
- [ ] Use Volt for simple CRUD forms
- [ ] Create Volt-based reports display

### Phase 2: Gradual Migration (Optional)

- [ ] Migrate `Dashboard\StatsOverview` → Volt (✅ Done)
- [ ] Migrate `Homestays\IndexTable` → Volt (✅ Done)
- [ ] Migrate `Performances\IndexTable` → Volt
- [ ] Migrate `Imports\UploadForm` → Volt
- [ ] Migrate `Reports\GenerateForm` → Volt

### Phase 3: Advanced Features

- [ ] Create Volt-based modal components
- [ ] Implement inline editing with Volt
- [ ] Build real-time notifications with Volt

---

## 13. Best Practices

### When to Use Volt

✅ **Use Volt for:**

- Simple CRUD interfaces
- Data tables with filters
- Dashboard widgets
- Forms with basic validation
- Read-only displays

❌ **Avoid Volt for:**

- Complex multi-step wizards (use traditional Livewire)
- Components requiring heavy JavaScript interop (use Alpine.js components)
- File uploads with preview (use traditional Livewire with traits)

### Code Organization

- **One concern per file:** Each Volt component should have a single responsibility
- **Reuse Blade components:** Leverage existing `<x-card>`, `<x-input>`, etc.
- **Keep logic in services:** Volt components should delegate to service layer
- **Test everything:** Write tests for Volt components like traditional Livewire

---

## 14. Performance Considerations

### Caching

Volt components can use Laravel caching:

```php
$stats = computed(function () {
    return Cache::remember('dashboard.stats', 900, fn() => 
        app(ReportService::class)->getDashboardStats()
    );
});
```

### Lazy Loading

```php
#[Lazy]
new class extends Component {
    // Component loads on-demand
}
```

### Polling Optimization

```blade
<div wire:poll.5s="refreshData">
    <!-- Only updates every 5 seconds -->
</div>
```

---

## 15. Troubleshooting

### Issue: "Class Volt not found"

**Solution:** Ensure Volt is in `composer.json` and run `composer install`

### Issue: Component not rendering

**Solution:** Clear Livewire cache:

```bash
php artisan livewire:clear
php artisan view:clear
```

### Issue: State not persisting

**Solution:** Check property visibility (must be `public`)

### Issue: Pagination not working

**Solution:** Ensure `use WithPagination;` trait is added

---

## 16. Resources

- **Official Docs:** <https://livewire.laravel.com/docs/volt>
- **GitHub Repo:** <https://github.com/livewire/volt>
- **Livewire 3 Docs:** <https://livewire.laravel.com/docs>
- **Project Docs:** `/docs/D10_SOURCE_CODE_DOCUMENTATION.md`

---

## 17. Summary

| Aspect | Status | Notes |
|--------|--------|-------|
| **Installation** | ✅ Complete | Volt v1.7.0 installed via Composer |
| **Directory Structure** | ✅ Created | `resources/views/pages/` |
| **Demo Components** | ✅ 2 created | Dashboard Stats, Homestay Index |
| **Routing** | ⚠️ Manual needed | Add `Volt::page()` routes |
| **Testing** | ⚠️ Pending | Write tests for Volt components |
| **Documentation** | ✅ Complete | This guide |

---

**Next Steps:**

1. Add Volt routes to `routes/web.php`
2. Test Volt components in browser
3. Write feature tests for Volt components
4. Migrate additional components incrementally
5. Update team training materials

---

**Maintained by:** Development Team  
**Last Updated:** October 15, 2025  
**Version:** 1.0
