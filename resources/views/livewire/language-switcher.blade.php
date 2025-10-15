<div class="d-flex gap-2 {{ $extraClass ?? '' }}">
    <button
        wire:click="setLocale('ms')"
        class="btn {{ app()->getLocale() === 'ms' ? 'btn-primary' : 'btn-outline-secondary' }} btn-sm"
        aria-label="{{ __('layout.language_ms') }}"
        {{ app()->getLocale() === 'ms' ? 'aria-current="true"' : '' }}
    >
        BM
    </button>
    <button
        wire:click="setLocale('en')"
        class="btn {{ app()->getLocale() === 'en' ? 'btn-primary' : 'btn-outline-secondary' }} btn-sm"
        aria-label="{{ __('layout.language_en') }}"
        {{ app()->getLocale() === 'en' ? 'aria-current="true"' : '' }}
    >
        EN
    </button>
</div>
