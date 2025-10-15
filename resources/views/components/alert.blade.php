<div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="alert alert-{{ $type }} alert-dismissible fade show" role="alert">
    {{ $message }}
    <button type="button" class="btn-close" @click="show = false"></button>
</div>
