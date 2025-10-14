<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

/**
 * API health check controller.
 */
final class HealthController extends ApiController
{
    /**
     * Health check endpoint.
     */
    public function index(): JsonResponse
    {
        $status = 'healthy';
        $checks = [];

        // Database check
        try {
            DB::connection()->getPdo();
            $checks['database'] = 'ok';
        } catch (\Exception $e) {
            $checks['database'] = 'error';
            $status = 'unhealthy';
        }

        // Cache check
        try {
            cache()->put('health_check', true, 10);
            $checks['cache'] = cache()->get('health_check') ? 'ok' : 'error';
        } catch (\Exception $e) {
            $checks['cache'] = 'error';
            $status = 'unhealthy';
        }

        $statusCode = $status === 'healthy' ? 200 : 503;

        return $this->successResponse([
            'status' => $status,
            'checks' => $checks,
            'timestamp' => now()->toIso8601String(),
        ], [], $statusCode);
    }
}
