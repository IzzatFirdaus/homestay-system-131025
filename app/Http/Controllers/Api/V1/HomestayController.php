<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Data\HomestayData;
use App\Data\HomestayFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\HomestayCollection;
use App\Http\Resources\HomestayResource;
use App\Models\Homestay;
use App\Services\HomestayService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Homestay API Controller
 *
 * RESTful API endpoint for homestay management.
 * All actions are protected by policies and require authentication.
 */
final class HomestayController extends Controller
{
    public function __construct(
        private readonly HomestayService $homestayService,
    ) {}

    /**
     * Display a listing of homestays.
     *
     * Supports filtering by negeri, status, cooperative, cluster, and search term.
     * Returns paginated results with metadata.
     */
    public function index(Request $request): HomestayCollection
    {
        $this->authorize('viewAny', Homestay::class);

        $filter = new HomestayFilter(
            negeri: $request->query('negeri') !== null ? (string) $request->query('negeri') : null,
            status: $request->query('status') !== null ? (string) $request->query('status') : null,
            cooperativeId: $request->query('cooperative_id') !== null ? (int) $request->query('cooperative_id') : null,
            clusterId: $request->query('cluster_id') !== null ? (int) $request->query('cluster_id') : null,
            modelPengurusan: $request->query('model_pengurusan') !== null ? (string) $request->query('model_pengurusan') : null,
            searchTerm: $request->query('search') !== null ? (string) $request->query('search') : null,
        );

        $homestays = $this->homestayService->getHomestaysByFilter($filter);

        // Paginate results
        $perPageParam = $request->query('per_page');
        $perPage = min($perPageParam !== null ? (int) $perPageParam : 20, 100);

        $pageParam = $request->query('page');
        $currentPage = $pageParam !== null ? (int) $pageParam : 1;

        $paginator = new \Illuminate\Pagination\LengthAwarePaginator(
            $homestays->forPage($currentPage, $perPage),
            $homestays->count(),
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return new HomestayCollection($paginator);
    }

    /**
     * Display the specified homestay.
     *
     * @param  Homestay  $homestay  Route model binding
     */
    public function show(Homestay $homestay): HomestayResource
    {
        $this->authorize('view', $homestay);
        $homestay->load(['cooperative', 'cluster']);

        return new HomestayResource($homestay);
    }

    /**
     * Store a newly created homestay.
     */
    public function store(Request $request): JsonResponse
    {
        $this->authorize('create', Homestay::class);
        // Validation
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'negeri' => 'required|string|max:100',
            'alamat' => 'nullable|string|max:500',
            'kapasiti' => 'required|integer|min:0|max:1000',
            'fasiliti' => 'nullable|string',
            'model_pengurusan' => 'required|in:koperasi,individu',
            'id_koperasi' => 'nullable|exists:cooperatives,id',
            'status' => 'required|in:Aktif,Tidak Aktif',
            'cluster_id' => 'nullable|exists:clusters,id',
        ]);

        $data = new HomestayData(
            nama: $validated['nama'],
            negeri: $validated['negeri'],
            alamat: $validated['alamat'] ?? null,
            kapasiti: $validated['kapasiti'],
            fasiliti: $validated['fasiliti'] ?? null,
            modelPengurusan: $validated['model_pengurusan'],
            cooperativeId: $validated['id_koperasi'] ?? null,
            status: $validated['status'],
            clusterId: $validated['cluster_id'] ?? null,
        );

        $homestay = $this->homestayService->createHomestay($data);

        return response()->json([
            'data' => new HomestayResource($homestay),
            'message' => 'Homestay created successfully.',
        ], Response::HTTP_CREATED);
    }

    /**
     * Update the specified homestay.
     *
     * @param  Homestay  $homestay  Route model binding
     */
    public function update(Request $request, Homestay $homestay): JsonResponse
    {
        $this->authorize('update', $homestay);
        // Validation
        $validated = $request->validate([
            'nama' => 'sometimes|required|string|max:255',
            'negeri' => 'sometimes|required|string|max:100',
            'alamat' => 'nullable|string|max:500',
            'kapasiti' => 'sometimes|required|integer|min:0|max:1000',
            'fasiliti' => 'nullable|string',
            'model_pengurusan' => 'sometimes|required|in:koperasi,individu',
            'id_koperasi' => 'nullable|exists:cooperatives,id',
            'status' => 'sometimes|required|in:Aktif,Tidak Aktif',
            'cluster_id' => 'nullable|exists:clusters,id',
        ]);

        $data = new HomestayData(
            nama: $validated['nama'] ?? $homestay->nama,
            negeri: $validated['negeri'] ?? $homestay->negeri,
            alamat: $validated['alamat'] ?? $homestay->alamat,
            kapasiti: $validated['kapasiti'] ?? $homestay->kapasiti,
            fasiliti: $validated['fasiliti'] ?? $homestay->fasiliti,
            modelPengurusan: $validated['model_pengurusan'] ?? $homestay->model_pengurusan,
            cooperativeId: $validated['id_koperasi'] ?? $homestay->id_koperasi,
            status: $validated['status'] ?? $homestay->status,
            clusterId: $validated['cluster_id'] ?? $homestay->cluster_id,
        );

        $updatedHomestay = $this->homestayService->updateHomestay($homestay, $data);

        return response()->json([
            'data' => new HomestayResource($updatedHomestay),
            'message' => 'Homestay updated successfully.',
        ]);
    }

    /**
     * Remove the specified homestay (soft delete).
     *
     * @param  Homestay  $homestay  Route model binding
     */
    public function destroy(Homestay $homestay): JsonResponse
    {
        $this->authorize('delete', $homestay);
        $this->homestayService->deleteHomestay($homestay);

        return response()->json([
            'message' => 'Homestay deleted successfully.',
        ], Response::HTTP_NO_CONTENT);
    }
}
