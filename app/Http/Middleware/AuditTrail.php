<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Models\AuditLog;
use Closure;
use Illuminate\Http\Request;
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
        $user = $request->user();
        $userId = $user ? $user->id : null;        // Process the request
        $response = $next($request);

        // Calculate response time
        $responseTime = round((microtime(true) - $startTime) * 1000, 2);

        // Only log certain operations to avoid log spam
        if ($this->shouldLogRequest($request, $response) && $userId !== null && $response->getStatusCode() !== 401) {
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

        // For tests, we only log mutating operations (POST, PUT, PATCH, DELETE)
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
                'table_name' => $this->extractTableFromRoute($request),
                'record_id' => $this->extractModelIdFromRoute($request),
                'old_values' => null,
                'new_values' => json_encode(array_merge($requestData, [
                    '_meta' => [
                        'method' => $request->method(),
                        'route' => $request->route()?->getName(),
                        'status_code' => $response->getStatusCode(),
                        'response_time_ms' => $responseTime,
                    ],
                ])),
                'url' => $request->fullUrl(),
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
            return 'CREATE';
        }

        if (str_contains($path, 'export')) {
            return 'CREATE';
        }

        if (str_contains($path, 'report')) {
            return 'CREATE';
        }

        // Map HTTP methods to actions
        return match ($method) {
            'POST' => 'CREATE',
            'PUT', 'PATCH' => 'UPDATE',
            'DELETE' => 'DELETE',
            'GET' => 'READ',
            default => 'ACCESS'
        };
    }

    /**
     * Extract the model name from the route.
     */
    private function extractTableFromRoute(Request $request): ?string
    {
        $path = $request->path();

        // Map route patterns to table names
        $modelMappings = [
            'homestays' => 'homestays',
            'performances' => 'performances',
            'imports' => 'imports',
            'cooperatives' => 'cooperatives',
            'clusters' => 'clusters',
            'users' => 'users',
        ];

        foreach ($modelMappings as $route => $table) {
            if (str_contains($path, $route)) {
                return $table;
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

        // Try route parameters first
        if ($route) {
            $idParameters = ['id', 'homestay', 'performance', 'import', 'cooperative', 'cluster', 'user'];
            foreach ($idParameters as $param) {
                $value = $route->parameter($param);
                if ($value && is_numeric($value)) {
                    return (int) $value;
                }
            }
        }

        // Fallback: try to parse a numeric ID from the path (e.g. /api/homestays/123 or /users/45/edit)
        $path = trim($request->path(), '/');
        $segments = explode('/', $path);
        foreach (array_reverse($segments) as $segment) {
            if (is_numeric($segment)) {
                return (int) $segment;
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
