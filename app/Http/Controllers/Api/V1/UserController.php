<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

/**
 * User API Controller
 */
final class UserController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $this->authorize('viewAny', User::class);

        $query = User::query()->with(['roles']);

        if ($request->query('role') !== null) {
            $query->whereHas('roles', function ($q) use ($request): void {
                $q->where('name', (string) $request->query('role'));
            });
        }

        if ($request->query('negeri') !== null) {
            $query->where('negeri', (string) $request->query('negeri'));
        }

        $perPageParam = $request->query('per_page');
        $perPage = min($perPageParam !== null ? (int) $perPageParam : 20, 100);

        $paginated = $query->paginate($perPage);

        return response()->json([
            'data' => UserResource::collection($paginated->items()),
            'meta' => [
                'total' => $paginated->total(),
                'per_page' => $paginated->perPage(),
                'current_page' => $paginated->currentPage(),
                'last_page' => $paginated->lastPage(),
            ],
        ]);
    }

    public function show(User $user): UserResource
    {
        $this->authorize('view', $user);

        $user->load(['roles']);

        return new UserResource($user);
    }

    public function store(Request $request): JsonResponse
    {
        $this->authorize('create', User::class);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:8|max:255',
            'negeri' => 'nullable|string|max:100',
            'cooperative_id' => 'nullable|exists:cooperatives,id',
            'roles' => 'required|array',
            'roles.*' => 'required|string|exists:roles,name',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'negeri' => $validated['negeri'] ?? null,
            'cooperative_id' => $validated['cooperative_id'] ?? null,
        ]);

        $user->assignRole($validated['roles']);

        return response()->json([
            'data' => new UserResource($user->load(['roles'])),
            'message' => 'User created successfully.',
        ], Response::HTTP_CREATED);
    }

    public function update(Request $request, User $user): JsonResponse
    {
        $this->authorize('update', $user);

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|max:255|unique:users,email,'.$user->id,
            'password' => 'sometimes|required|string|min:8|max:255',
            'negeri' => 'nullable|string|max:100',
            'cooperative_id' => 'nullable|exists:cooperatives,id',
            'roles' => 'sometimes|required|array',
            'roles.*' => 'required|string|exists:roles,name',
        ]);

        $updateData = [
            'name' => $validated['name'] ?? $user->name,
            'email' => $validated['email'] ?? $user->email,
            'negeri' => $validated['negeri'] ?? $user->negeri,
            'cooperative_id' => $validated['cooperative_id'] ?? $user->cooperative_id,
        ];

        if (isset($validated['password'])) {
            $updateData['password'] = Hash::make($validated['password']);
        }

        $user->update($updateData);

        if (isset($validated['roles'])) {
            $user->syncRoles($validated['roles']);
        }

        return response()->json([
            'data' => new UserResource($user->load(['roles'])),
            'message' => 'User updated successfully.',
        ]);
    }

    public function destroy(User $user): JsonResponse
    {
        $this->authorize('delete', $user);

        $user->delete();

        return response()->json([
            'message' => 'User deleted successfully.',
        ], Response::HTTP_NO_CONTENT);
    }
}
