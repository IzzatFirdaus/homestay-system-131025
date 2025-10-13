<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Models\AuditLog;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

/**
 * AuditTrail Middleware
 *
 * Logs all CUD (Create, Update, Delete) operations and important API calls
 * to the audit_logs table for compliance and security purposes.
 *
 * This middleware captures:
 * - User ID and authentication details
 * - Request method, URL, and parameters
 * - IP address and User Agent
 * - Response status and timing
 * - Before/after state for model changes
 */
class AuditTrail
{
    /**
     * Handle an incoming request and log the audit trail.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $startTime = microtime(true);

        // Get user information before processing
        $user = Auth::user();
        $userId = $user ? $user->id : null;

        // Process the request
        $response = $next($request);

        // Calculate response time
        $responseTime = round((microtime(true) - $startTime) * 1000, 2);

        // Only log certain operations to avoid log spam
        if ($this->shouldLogRequest($request, $response)) {
            $this->logAuditTrail($request, $response, $userId, $responseTime);
        }

        return $response;
    }

    /**
     * Determine if the request should be logged based on method and route.
     */
    private function shouldLogRequest(Request $request, Response $response): bool
    {
        $method = $request->method();
        $path = $request->path();
        $statusCode = $response->getStatusCode();

        // Always log CUD operations
        if (in_array($method, ['POST', 'PUT', 'PATCH', 'DELETE'])) {
            return true;
        }

        // Log important GET operations
        $importantPaths = [
            'api/',           // All API calls
            'homestays/export',
            'performances/export',
            'imports/',
            'reports/generate',
            'admin/',
        ];

        foreach ($importantPaths as $importantPath) {
            if (str_starts_with($path, $importantPath)) {
                return true;
            }
        }

        // Log failed requests (4xx, 5xx)
        if ($statusCode >= 400) {
            return true;
        }

        return false;
    }

    /**
     * Log the audit trail to the database.
     */
    private function logAuditTrail(
        Request $request,
        Response $response,
        ?int $userId,
        float $responseTime
    ): void {
        try {
            $action = $this->determineAction($request);
            $requestData = $this->sanitizeRequestData($request);

            AuditLog::create([
                'user_id' => $userId,
                'action' => $action,
                'model' => $this->extractModelFromRoute($request),
                'model_id' => $this->extractModelIdFromRoute($request),
                'before' => null, // Will be populated by observers for model changes
                'after' => [
                    'method' => $request->method(),
                    'url' => $request->fullUrl(),
                    'route' => $request->route()?->getName(),
                    'parameters' => $requestData,
                    'status_code' => $response->getStatusCode(),
                    'response_time_ms' => $responseTime,
                ],
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);
        } catch (\Exception $e) {
            // Log the error but don't interrupt the request
            Log::error('Failed to log audit trail', [
                'error' => $e->getMessage(),
                'request_path' => $request->path(),
                'user_id' => $userId,
            ]);
        }
    }

    /**
     * Determine the action being performed based on the request.
     */
    private function determineAction(Request $request): string
    {
        $method = $request->method();
        $path = $request->path();

        // Check for specific actions first
        if (str_contains($path, 'import')) {
            return 'import_data';
        }

        if (str_contains($path, 'export')) {
            return 'export_data';
        }

        if (str_contains($path, 'report')) {
            return 'generate_report';
        }

        // Map HTTP methods to actions
        return match ($method) {
            'POST' => 'created',
            'PUT', 'PATCH' => 'updated',
            'DELETE' => 'deleted',
            'GET' => 'viewed',
            default => 'accessed'
        };
    }

    /**
     * Extract the model name from the route.
     */
    private function extractModelFromRoute(Request $request): ?string
    {
        $path = $request->path();

        // Map route patterns to model names
        $modelMappings = [
            'homestays' => 'App\\Models\\Homestay',
            'performances' => 'App\\Models\\Performance',
            'imports' => 'App\\Models\\Import',
            'cooperatives' => 'App\\Models\\Cooperative',
            'clusters' => 'App\\Models\\Cluster',
            'users' => 'App\\Models\\User',
        ];

        foreach ($modelMappings as $route => $model) {
            if (str_contains($path, $route)) {
                return $model;
            }
        }

        return null;
    }

    /**
     * Extract the model ID from the route parameters.
     */
    private function extractModelIdFromRoute(Request $request): ?int
    {
        $route = $request->route();

        if (! $route) {
            return null;
        }

        // Common parameter names for model IDs
        $idParameters = ['id', 'homestay', 'performance', 'import', 'cooperative', 'cluster', 'user'];

        foreach ($idParameters as $param) {
            $value = $route->parameter($param);
            if ($value && is_numeric($value)) {
                return (int) $value;
            }
        }

        return null;
    }

    /**
     * Sanitize request data to remove sensitive information.
     *
     * @return array<string, mixed>
     */
    private function sanitizeRequestData(Request $request): array
    {
        $data = $request->except([
            'password',
            'password_confirmation',
            'current_password',
            'remember_token',
            '_token',
            '_method',
        ]);

        // Limit the size of request data to prevent large audit logs
        $serialized = serialize($data);

        if (strlen($serialized) > 65000) { // Leave room for other fields
            return [
                'data_truncated' => true,
                'original_size' => strlen($serialized),
                'summary' => 'Large request data was truncated',
            ];
        }

        return $data;
    }
}
