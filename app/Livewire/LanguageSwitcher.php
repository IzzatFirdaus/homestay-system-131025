<?php

declare(strict_types=1);

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class LanguageSwitcher extends Component
{
    /**
     * Extra CSS classes passed from the Blade wrapper component.
     */
    public string $extraClass = '';

    /**
     * Set the application locale and redirect.
     */
    public function setLocale(string $locale): void
    {
        session(['locale' => $locale]);
        app()->setLocale($locale);

        // Dispatch a browser event to refresh or navigate
        $this->dispatch('locale-changed', locale: $locale);

        // Optional: navigate to the current URL to ensure translations update everywhere
        // In Livewire v3, redirect()->to(url()->current()) supports SPA via navigate()
        $this->redirect(url()->current(), navigate: true);
    }

    public function render(): View
    {
        return view('livewire.language-switcher');
    }
}
