<?php

namespace App\Http\Controllers;

use App\Data\HomestayData;
use App\Http\Requests\StoreHomestayRequest;
use App\Http\Requests\UpdateHomestayRequest;
use App\Models\Cooperative;
use App\Models\Homestay;
use App\Services\HomestayService;

class HomestayController extends Controller
{
    public function __construct(private readonly HomestayService $homestayService) {}

    public function index()
    {
        return view('homestays.index');
    }

    public function create()
    {
        $this->authorize('create', Homestay::class);

        return view('homestays.create', [
            'cooperatives' => Cooperative::pluck('nama', 'id'),
            'negeriOptions' => config('app.negeri'),
        ]);
    }

    public function store(StoreHomestayRequest $request)
    {
        $homestayData = HomestayData::from($request->validated());
        $this->homestayService->createHomestay($homestayData);

        return redirect()->route('homestays.index')->with('success', __('Homestay berjaya dicipta.'));
    }

    public function edit(Homestay $homestay)
    {
        $this->authorize('update', $homestay);

        return view('homestays.edit', [
            'homestay' => $homestay,
            'cooperatives' => Cooperative::pluck('nama', 'id'),
            'negeriOptions' => config('app.negeri'),
        ]);
    }

    public function update(UpdateHomestayRequest $request, Homestay $homestay)
    {
        $homestayData = HomestayData::from($request->validated());
        $this->homestayService->updateHomestay($homestay, $homestayData);

        return redirect()->route('homestays.index')->with('success', __('Homestay berjaya dikemaskini.'));
    }

    public function destroy(Homestay $homestay)
    {
        $this->authorize('delete', $homestay);
        $this->homestayService->deleteHomestay($homestay);

        return redirect()->route('homestays.index')->with('success', __('Homestay berjaya dipadam.'));
    }
}
