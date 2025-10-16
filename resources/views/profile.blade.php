<x-app-layout>
    <x-slot name="header">
        <h2 class="fw-semibold fs-4 text-dark lh-base mb-0">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="container py-4">
        <div class="row g-4">
            <div class="col-12 col-lg-8 col-xl-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <livewire:profile.update-profile-information-form />
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-8 col-xl-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <livewire:profile.update-password-form />
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-8 col-xl-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <livewire:profile.delete-user-form />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
