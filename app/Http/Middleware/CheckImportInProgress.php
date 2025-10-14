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
        // Prefer $request->user() so tests that use setUserResolver() work correctly
        $user = $request->user();

        // Require authentication for import endpoints - middleware should enforce auth for import operations
        if (! $user) {
            return response()->json([
                'error' => [
                    'message' => 'Authentication required',
                    'code' => 'AUTH_REQUIRED',
                ],
            ], 401);
        }

        // Only check for POST requests to import endpoints
        if ($request->method() !== 'POST' || ! $this->isImportRequest($request)) {
            return $next($request);
        }

        // Check if user has any imports in progress (only processing/in_progress block new imports)
        if ($this->hasImportInProgress($user)) {
            $active = $this->getFirstActiveImport($user);

            $details = [];
            if ($active) {
                $details = [
                    'import_id' => $active->id,
                    'import_type' => $active->type,
                    'started_at' => $active->created_at->toISOString(),
                ];
            }

            return response()->json([
                'error' => [
                    'message' => 'import already in progress',
                    'code' => 'IMPORT_IN_PROGRESS',
                    'details' => $details,
                ],
            ], 409);
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
        // Only consider actively processing imports as blocking; queued imports are allowed to be retried
        return Import::where('user_id', $user->id)
            ->whereIn('status', ['in_progress', 'processing'])
            ->exists();
    }

    /**
     * Get active imports for the user.
     *
     * @return array<int, array<string, mixed>>
     */
    private function getActiveImports(\App\Models\User $user): array
    {
        $imports = Import::where('user_id', $user->id)
            ->whereIn('status', ['in_progress', 'processing'])
            ->select(['id', 'filename', 'type', 'status', 'created_at'])
            ->get()
            ->map(function ($import) {
                return [
                    'id' => $import->id,
                    'file_name' => $import->filename,
                    'import_type' => $import->type,
                    'status' => $import->status,
                    'started_at' => $import->created_at->toISOString(),
                ];
            })
            ->toArray();

        /** @var array<int, array<string, mixed>> */
        return $imports;
    }

    /**
     * Get the first active (processing/in_progress) import for user
     */
    private function getFirstActiveImport(\App\Models\User $user): ?Import
    {
        return Import::where('user_id', $user->id)
            ->whereIn('status', ['in_progress', 'processing'])
            ->orderBy('created_at')
            ->first();
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
        $maxImports = config('homestay.max_concurrent_imports', 10);

        return is_int($maxImports) ? $maxImports : 10;
    }
}
