<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
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
    </div>
</x-app-layout>
