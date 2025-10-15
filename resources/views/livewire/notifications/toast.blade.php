<div
    x-data="{ show: @entangle('show') }"
    x-show="show"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform translate-y-2"
    x-transition:enter-end="opacity-100 transform translate-y-0"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 transform translate-y-0"
    x-transition:leave-end="opacity-0 transform translate-y-2"
    class="position-fixed bottom-0 end-0 p-3"
    style="z-index: 11">
    <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-{{ $type }} text-white">
            <strong class="me-auto">{{ ucfirst($type) }}</strong>
            <button type="button" class="btn-close" @click="show = false"></button>
        </div>
        <div class="toast-body">
            {{ $message }}
        </div>
    </div>
</div>
