<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Data\HomestayData;
use App\Data\HomestayFilter;
use App\Http\Requests\StoreHomestayRequest;
use App\Http\Requests\UpdateHomestayRequest;
use App\Models\Homestay;
use App\Services\HomestayService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Web controller for homestay CRUD operations.
 */
final class HomestayController extends Controller
{
    public function __construct(
        private readonly HomestayService $homestayService,
    ) {}

    /**
     * Display a listing of homestays.
     */
    public function index(Request $request): View
    {
        $this->authorize('viewAny', Homestay::class);

        $filter = HomestayFilter::fromRequest($request);
        $homestays = $this->homestayService->listHomestays($filter);
        /** @var view-string $view */
        $view = 'homestays.index';

        return view($view, [
            'homestays' => $homestays,
            'filter' => $filter,
        ]);
    }

    /**
     * Show the form for creating a new homestay.
     */
    public function create(): View
    {
        $this->authorize('create', Homestay::class);
        /** @var view-string $view */
        $view = 'homestays.create';

        return view($view);
    }

    /**
     * Store a newly created homestay.
     */
    public function store(StoreHomestayRequest $request): RedirectResponse
    {
        // Authorization handled in FormRequest
        $data = HomestayData::fromArray($request->validated());
        $homestay = $this->homestayService->createHomestay($data);

        return redirect()
            ->route('homestays.show', $homestay)
            ->with('success', __('homestay.created_successfully'));
    }

    /**
     * Display the specified homestay.
     */
    public function show(Homestay $homestay): View
    {
        $this->authorize('view', $homestay);

        $homestay->load(['cooperative', 'cluster', 'performances']);
        /** @var view-string $view */
        $view = 'homestays.show';

        return view($view, [
            'homestay' => $homestay,
        ]);
    }

    /**
     * Show the form for editing the specified homestay.
     */
    public function edit(Homestay $homestay): View
    {
        $this->authorize('update', $homestay);
        /** @var view-string $view */
        $view = 'homestays.edit';

        return view($view, [
            'homestay' => $homestay,
        ]);
    }

    /**
     * Update the specified homestay.
     */
    public function update(UpdateHomestayRequest $request, Homestay $homestay): RedirectResponse
    {
        // Authorization handled in FormRequest
        $data = HomestayData::fromArray($request->validated());
        $updated = $this->homestayService->updateHomestay($homestay, $data);

        return redirect()
            ->route('homestays.show', $updated)
            ->with('success', __('homestay.updated_successfully'));
    }

    /**
     * Remove the specified homestay.
     */
    public function destroy(Homestay $homestay): RedirectResponse
    {
        $this->authorize('delete', $homestay);

        $this->homestayService->deleteHomestay($homestay);

        return redirect()
            ->route('homestays.index')
            ->with('success', __('homestay.deleted_successfully'));
    }
}
