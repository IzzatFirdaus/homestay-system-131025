<x-app-layout>
    <x-slot name="header">
        <h2 class="fw-semibold fs-4 text-dark lh-base mb-0">
            {{ __('common.auth.dashboard') }}
        </h2>
    </x-slot>

    <div class="container py-4">
        <div class="card shadow-sm">
            <div class="card-body">
                {{-- KPI Stats --}}
                @livewire('dashboard.stats')

                <div class="row mt-4">
                    {{-- Visitors Chart --}}
                    <div class="col-lg-8 mb-4">
                        @livewire('dashboard.visitors-chart')
                    </div>

                    {{-- Revenue by State Chart --}}
                    <div class="col-lg-4 mb-4">
                        @livewire('dashboard.revenue-by-state-chart')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
