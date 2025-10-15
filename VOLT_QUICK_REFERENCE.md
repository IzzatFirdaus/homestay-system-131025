# Laravel Volt Quick Reference Card

**Project:** Homestay Malaysia Management & Analytics System  
**Volt Version:** 1.7.0  
**Last Updated:** October 15, 2025

---

## Quick Start

### 1. Create a New Volt Component

```bash
# Functional API (simple components)
resources/views/pages/my-component.blade.php

# Class-based API (complex components)
resources/views/pages/my-feature/index.blade.php
```

### 2. Basic Syntax

**Functional API:**

```php
<?php
use function Livewire\Volt\{state, computed};

state(['count' => 0]);
$increment = fn() => $this->count++;
?>

<div>
    <h1>{{ $count }}</h1>
    <button wire:click="increment">+</button>
</div>
```

**Class-based API:**

```php
<?php
use Livewire\WithPagination;

new class extends \Livewire\Volt\Component {
    use WithPagination;
    
    public string $search = '';
    
    public function items() {
        return Item::where('name', 'like', "%{$this->search}%")
            ->paginate(10);
    }
}
?>

<div>
    <!-- Your template -->
</div>
```

---

## Common Patterns

### State Management

```php
// Define state
state(['name' => '', 'email' => '']);

// Or
public string $name = '';
public string $email = '';
```

### Computed Properties

```php
$fullName = computed(fn() => $this->firstName . ' ' . $this->lastName);

// Or
public function fullName(): string {
    return $this->firstName . ' ' . $this->lastName;
}
```

### Lifecycle Hooks

```php
mount(function () {
    $this->loadData();
});

// Or
public function mount(): void {
    $this->loadData();
}
```

### Actions

```php
$save = function () {
    $this->validate();
    // Save logic
};

// Or
public function save(): void {
    $this->validate();
    // Save logic
}
```

---

## Real-World Examples

### Dashboard Widget

```php
<?php
use App\Services\ReportService;
use Illuminate\Support\Facades\Cache;

$stats = computed(fn() => Cache::remember(
    'stats',
    900,
    fn() => app(ReportService::class)->getDashboardStats()
));
?>

<div class="row">
    @foreach($this->stats as $key => $value)
        <div class="col-md-3">
            <x-card>
                <h3>{{ $value }}</h3>
                <p>{{ __(ucfirst($key)) }}</p>
            </x-card>
        </div>
    @endforeach
</div>
```

### Search & Filter Table

```php
<?php
use App\Models\Homestay;
use Livewire\WithPagination;

new class extends \Livewire\Volt\Component {
    use WithPagination;
    
    public string $search = '';
    public string $filter = '';
    
    public function updatedSearch(): void { $this->resetPage(); }
    public function updatedFilter(): void { $this->resetPage(); }
    
    public function items() {
        return Homestay::query()
            ->when($this->search, fn($q) => $q->where('name', 'like', "%{$this->search}%"))
            ->when($this->filter, fn($q) => $q->where('status', $this->filter))
            ->paginate(15);
    }
}
?>

<div>
    <input wire:model.live.debounce.300ms="search" placeholder="Search...">
    <select wire:model.live="filter">
        <option value="">All</option>
        <option value="active">Active</option>
        <option value="inactive">Inactive</option>
    </select>
    
    @foreach($this->items as $item)
        <div>{{ $item->name }}</div>
    @endforeach
    
    {{ $this->items->links() }}
</div>
```

### Form with Validation

```php
<?php
use App\Services\HomestayService;

new class extends \Livewire\Volt\Component {
    public string $name = '';
    public string $location = '';
    
    public function rules(): array {
        return [
            'name' => 'required|min:3',
            'location' => 'required',
        ];
    }
    
    public function save(HomestayService $service): void {
        $this->validate();
        
        $this->authorize('create', Homestay::class);
        
        $service->create([
            'name' => $this->name,
            'location' => $this->location,
        ]);
        
        session()->flash('success', 'Homestay created!');
        $this->redirect(route('homestays.index'));
    }
}
?>

<form wire:submit="save">
    <input wire:model="name" placeholder="Name">
    @error('name') <span>{{ $message }}</span> @enderror
    
    <input wire:model="location" placeholder="Location">
    @error('location') <span>{{ $message }}</span> @enderror
    
    <button type="submit">Save</button>
</form>
```

---

## Routing

### Register Volt Page Route

```php
// In routes/web.php
use Livewire\Volt\Volt;

Route::get('/dashboard/stats', Volt::page('dashboard.stats'))->name('dashboard.stats');
```

### With Middleware & Authorization

```php
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/settings', Volt::page('admin.settings'))
        ->middleware('can:manage-settings')
        ->name('admin.settings');
});
```

---

## Testing

```php
use Livewire\Volt\Volt;

test('displays homestays', function () {
    $homestay = Homestay::factory()->create(['name' => 'Test']);
    
    Volt::test('pages.homestays.index')
        ->assertSee('Test');
});

test('search filters data', function () {
    Homestay::factory()->create(['name' => 'Alpha']);
    Homestay::factory()->create(['name' => 'Beta']);
    
    Volt::test('pages.homestays.index')
        ->set('search', 'Alpha')
        ->assertSee('Alpha')
        ->assertDontSee('Beta');
});

test('calls action', function () {
    Volt::test('pages.homestays.create')
        ->set('name', 'New Homestay')
        ->call('save')
        ->assertRedirect(route('homestays.index'));
});
```

---

## Tips & Best Practices

### 1. Choose the Right API

- **Functional:** Simple displays, widgets, read-only components
- **Class-based:** Forms, CRUD, pagination, complex logic

### 2. Keep Logic in Services

```php
// ❌ Bad
public function save() {
    Homestay::create($this->all());
}

// ✅ Good
public function save(HomestayService $service) {
    $service->createHomestay($this->toData());
}
```

### 3. Use Computed Properties for Heavy Queries

```php
// ✅ Good - cached between renders
$stats = computed(fn() => $this->calculateStats());

// ❌ Bad - recalculates every render
public $stats;
public function render() {
    $this->stats = $this->calculateStats();
}
```

### 4. Reset Pagination on Filter Changes

```php
public function updatedSearch(): void {
    $this->resetPage(); // Important!
}
```

### 5. Use Debouncing for Search

```blade
<input wire:model.live.debounce.300ms="search">
```

### 6. Authorization

```php
public function mount(): void {
    $this->authorize('viewAny', Homestay::class);
}

public function delete($id): void {
    $homestay = Homestay::findOrFail($id);
    $this->authorize('delete', $homestay);
    $homestay->delete();
}
```

---

## Debugging

### View Component Name

```php
dump($this->getName()); // e.g., "pages.homestays.index"
```

### Clear Cache

```bash
php artisan livewire:clear
php artisan view:clear
```

### Enable Query Logging

```php
\DB::enableQueryLog();
// ... your code
dd(\DB::getQueryLog());
```

---

## Resources

- **Volt Docs:** <https://livewire.laravel.com/docs/volt>
- **Livewire Docs:** <https://livewire.laravel.com/docs>
- **Project Docs:** `/docs/VOLT_INTEGRATION_GUIDE.md`
- **Examples:** `/resources/views/pages/`

---

**Quick Links:**

- [Volt Integration Guide](./VOLT_INTEGRATION_GUIDE.md)
- [Phase 8 Summary](../PHASE_8_IMPLEMENTATION_SUMMARY.md)
- [System Overview](./SYSTEM_OVERVIEW_Version4.md)
