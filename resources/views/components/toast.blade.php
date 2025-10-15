{{-- Toast Notification Component with Alpine.js --}}
<div
    x-data="{
        show: false,
        message: '',
        type: 'success',
        timeout: null,
        showToast(msg, msgType = 'success') {
            this.message = msg;
            this.type = msgType;
            this.show = true;

            clearTimeout(this.timeout);
            this.timeout = setTimeout(() => {
                this.show = false;
            }, 5000);
        }
    }"
    @toast.window="showToast($event.detail.message, $event.detail.type)"
    x-show="show"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform translate-y-2"
    x-transition:enter-end="opacity-100 transform translate-y-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    x-cloak
    class="position-fixed top-0 end-0 p-3"
    style="z-index: 11000;"
    role="alert"
    aria-live="assertive"
    aria-atomic="true"
>
    <div
        class="toast show border-0"
        :class="{
            'bg-success text-white': type === 'success',
            'bg-danger text-white': type === 'error',
            'bg-warning text-dark': type === 'warning',
            'bg-info text-white': type === 'info'
        }"
    >
        <div class="d-flex align-items-center p-3">
            <div class="me-2">
                <i
                    class="bi"
                    :class="{
                        'bi-check-circle-fill': type === 'success',
                        'bi-x-circle-fill': type === 'error',
                        'bi-exclamation-triangle-fill': type === 'warning',
                        'bi-info-circle-fill': type === 'info'
                    }"
                ></i>
            </div>
            <div class="flex-grow-1" x-text="message"></div>
            <button
                type="button"
                @click="show = false"
                class="btn-close btn-close-white ms-2"
                :class="{ 'btn-close-white': type !== 'warning' }"
                aria-label="Close"
            ></button>
        </div>
    </div>
</div>
