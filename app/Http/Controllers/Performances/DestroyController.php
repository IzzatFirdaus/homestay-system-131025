<?php

declare(strict_types=1);

namespace App\Http\Controllers\Performances;

use App\Http\Controllers\Controller;
use App\Models\Performance;
use Illuminate\Http\RedirectResponse;

/**
 * Single-action controller: soft-delete Performance record.
 */
class DestroyController extends Controller
{
    /**
     * Soft delete performance record and redirect to index.
     */
    public function __invoke(Performance $performance): RedirectResponse
    {
        $this->authorize('delete', $performance);

        $performance->delete();

        return redirect()->route('performances.index')
            ->with('success', __('Rekod prestasi berjaya dipadam.'));
    }
}
