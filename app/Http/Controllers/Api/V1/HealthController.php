<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
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
}
