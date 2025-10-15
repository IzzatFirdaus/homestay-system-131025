<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

/**
 * Health check controller for monitoring system status.
 */
final class HealthController extends Controller
{
    /**
     * Perform a basic health check.
     *
     * Returns system status, timestamp, and version information.
     * This endpoint is publicly accessible for monitoring purposes.
     */
    public function check(): JsonResponse
    {
        $health = [
            'status' => 'healthy',
            'timestamp' => now()->format('Y-m-d H:i:s'),
            'version' => config('app.version', '1.0.0'),
            'environment' => config('app.env'),
        ];

        // Check database connectivity
        try {
            DB::connection()->getPdo();
            $health['database'] = 'connected';
        } catch (\Exception $e) {
            $health['database'] = 'disconnected';
            $health['status'] = 'unhealthy';
        }

        $statusCode = $health['status'] === 'healthy' ? 200 : 503;

        return response()->json($health, $statusCode);
    }

    /**
     * Comprehensive readiness check.
     *
     * Checks database, cache, and other critical services.
     * Returns 200 if ready, 503 if not ready.
     */
    public function ready(): JsonResponse
    {
        $checks = [
            'database' => $this->checkDatabase(),
            'cache' => $this->checkCache(),
        ];

        $allHealthy = collect($checks)->every(fn ($check) => $check['status'] === 'ok');

        return response()->json([
            'status' => $allHealthy ? 'ready' : 'unavailable',
            'timestamp' => now()->toIso8601String(),
            'checks' => $checks,
        ], $allHealthy ? 200 : 503);
    }

    /**
     * Check database connectivity
     *
     * @return array{status: string, message?: string}
     */
    private function checkDatabase(): array
    {
        try {
            DB::connection()->getPdo();

            return ['status' => 'ok'];
        } catch (\Exception $e) {
            return [
                'status' => 'error',
                'message' => 'Database connection failed',
            ];
        }
    }

    /**
     * Check cache availability
     *
     * @return array{status: string, message?: string}
     */
    private function checkCache(): array
    {
        try {
            $testKey = 'health_check_' . now()->timestamp;
            Cache::put($testKey, 'test', 1);
            $value = Cache::get($testKey);
            Cache::forget($testKey);

            if ($value === 'test') {
                return ['status' => 'ok'];
            }

            return [
                'status' => 'error',
                'message' => 'Cache write/read failed',
            ];
        } catch (\Exception $e) {
            return [
                'status' => 'error',
                'message' => 'Cache connection failed',
            ];
        }
    }
}
