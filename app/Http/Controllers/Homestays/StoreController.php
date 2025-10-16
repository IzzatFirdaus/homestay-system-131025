<?php

declare(strict_types=1);

namespace App\Http\Controllers\Homestays;

use App\Data\HomestayData;
use App\Http\Requests\StoreHomestayRequest;
use App\Services\HomestayService;
use Illuminate\Http\RedirectResponse;

class StoreController
{
    public function __invoke(StoreHomestayRequest $request, HomestayService $homestayService): RedirectResponse
    {
        $homestayData = HomestayData::from($request->validated());
        $homestayService->createHomestay($homestayData);

        return redirect()->route('homestays.index')->with('success', __('Homestay berjaya dicipta.'));
    }
}
