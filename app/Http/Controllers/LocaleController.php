<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LocaleController extends Controller
{
    /**
     * Switch the application locale
     */
    public function switch(Request $request, string $locale): RedirectResponse
    {
        // Validate locale
        if (! in_array($locale, ['ms', 'en'])) {
            abort(400);
        }

        // Store locale in session
        Session::put('locale', $locale);

        // Redirect back
        return redirect()->back();
    }
}
