<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<nav x-data="{ open: false }" class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm">
    <!-- Primary Navigation Menu -->
    <div class="container-fluid px-3 px-lg-4">
        <div class="d-flex justify-content-between align-items-center" style="height: 4rem;">
            <div class="d-flex align-items-center">
                <!-- Logo -->
                <div class="d-flex align-items-center">
                    <a href="{{ route('dashboard') }}" wire:navigate>
                        <x-application-logo class="me-2" style="height: 36px; width: auto;" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="d-none d-sm-flex ms-4 gap-3 align-items-center">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="d-none d-sm-flex align-items-center ms-3">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="btn btn-sm btn-outline-secondary d-inline-flex align-items-center">
                            <div x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>

                            <div class="ms-2">
                                <svg class="" width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile')" wire:navigate>
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <button wire:click="logout" class="w-full text-start">
                            <x-dropdown-link>
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </button>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="d-sm-none">
                <button @click="open = ! open" class="btn btn-outline-secondary btn-sm" aria-expanded="false" aria-controls="mobileNav">
                    <i class="bi bi-list"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'d-block': open, 'd-none': ! open}" id="mobileNav" class="d-none d-sm-none">
        <div class="py-2">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-3 pb-1 border-top">
            <div class="px-3">
                <div class="fw-medium" x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>
                <div class="text-muted small">{{ auth()->user()->email }}</div>
            </div>

            <div class="mt-3">
                <x-responsive-nav-link :href="route('profile')" wire:navigate>
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <button wire:click="logout" class="w-100 text-start btn btn-link p-0">
                    <x-responsive-nav-link>
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </button>
            </div>
        </div>
    </div>
</nav>
