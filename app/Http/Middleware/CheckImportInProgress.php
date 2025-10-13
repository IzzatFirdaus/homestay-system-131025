<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Models\Import;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

/**
 * CheckImportInProgress Middleware
 *
 * Prevents users from starting new imports if they already have
 * an import in progress. This helps prevent resource conflicts
 * and ensures data integrity during import operations.
 */
class CheckImportInProgress
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        // Allow requests for non-authenticated users (other middleware will handle)
        if (! $user) {
            return $next($request);
        }

        // Only check for POST requests to import endpoints
        if ($request->method() !== 'POST' || ! $this->isImportRequest($request)) {
            return $next($request);
        }

        // Check if user has any imports in progress
        if ($this->hasImportInProgress($user)) {
            return response()->json([
                'error' => [
                    'message' => 'You already have an import in progress. Please wait for it to complete before starting a new import.',
                    'code' => 'IMPORT_IN_PROGRESS',
                    'details' => [
                        'active_imports' => $this->getActiveImports($user),
                    ],
                ],
            ], 429); // Too Many Requests
        }

        // Check system-wide import limits for admins
        if ($this->exceedsSystemImportLimit($user)) {
            return response()->json([
                'error' => [
                    'message' => 'System import limit reached. Please wait for some imports to complete.',
                    'code' => 'SYSTEM_IMPORT_LIMIT_EXCEEDED',
                    'details' => [
                        'system_active_imports' => $this->getSystemActiveImports(),
                        'max_concurrent_imports' => $this->getMaxConcurrentImports(),
                    ],
                ],
            ], 429);
        }

        return $next($request);
    }

    /**
     * Check if the request is for an import operation.
     */
    private function isImportRequest(Request $request): bool
    {
        $path = $request->path();

        // Check for import-related paths
        $importPaths = [
            'api/imports',
            'imports/homestays',
            'imports/performances',
            'imports/cooperatives',
            'homestays/import',
            'performances/import',
        ];

        foreach ($importPaths as $importPath) {
            if (str_contains($path, $importPath)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Check if user has any imports currently in progress.
     */
    private function hasImportInProgress(\App\Models\User $user): bool
    {
        return Import::where('user_id', $user->id)
            ->whereIn('status', ['in_progress', 'processing', 'queued'])
            ->exists();
    }

    /**
     * Get active imports for the user.
     *
     * @return array<int, array<string, mixed>>
     */
    private function getActiveImports(\App\Models\User $user): array
    {
        return Import::where('user_id', $user->id)
            ->whereIn('status', ['in_progress', 'processing', 'queued'])
            ->select(['id', 'nama_fail', 'jenis_import', 'status', 'created_at'])
            ->get()
            ->map(function ($import) {
                return [
                    'id' => $import->id,
                    'file_name' => $import->nama_fail,
                    'import_type' => $import->jenis_import,
                    'status' => $import->status,
                    'started_at' => $import->created_at?->toISOString(),
                ];
            })
            ->toArray();
    }

    /**
     * Check if system-wide concurrent import limit is exceeded.
     */
    private function exceedsSystemImportLimit(\App\Models\User $user): bool
    {
        // Super Admin has no system limits
        if ($user->hasRole('Super Admin')) {
            return false;
        }

        $activeImports = $this->getSystemActiveImports();
        $maxConcurrentImports = $this->getMaxConcurrentImports();

        return $activeImports >= $maxConcurrentImports;
    }

    /**
     * Get the number of system-wide active imports.
     */
    private function getSystemActiveImports(): int
    {
        return Import::whereIn('status', ['in_progress', 'processing', 'queued'])
            ->count();
    }

    /**
     * Get the maximum allowed concurrent imports.
     */
    private function getMaxConcurrentImports(): int
    {
        // This could be configured in a settings table or config file
        return (int) config('homestay.max_concurrent_imports', 10);
    }
}
