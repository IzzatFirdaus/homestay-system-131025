<?php

declare(strict_types=1);

namespace App\Http\Controllers\Homestays;

use App\Data\HomestayData;
use App\Http\Requests\UpdateHomestayRequest;
use App\Models\Homestay;
use App\Services\HomestayService;
use Illuminate\Http\RedirectResponse;

class UpdateController
{
    public function __invoke(UpdateHomestayRequest $request, Homestay $homestay, HomestayService $homestayService): RedirectResponse
    {
        $homestayData = HomestayData::from($request->validated());
        $homestayService->updateHomestay($homestay, $homestayData);

        return redirect()->route('homestays.index')->with('success', __('Homestay berjaya dikemaskini.'));
    }
}
