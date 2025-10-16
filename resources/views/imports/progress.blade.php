<x-app-layout>
    <x-slot name="header">
        <h2 class="fw-semibold fs-4 text-dark lh-base mb-0">
            {{ __('Import Progress') }}
        </h2>
    </x-slot>

    <div class="container py-4">
        <div class="row">
            <div class="col-12 col-lg-10 col-xl-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        @livewire('imports.progress-status', ['import' => $import])
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
