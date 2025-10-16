declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

final class SecurityHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): Response  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /** @var Response $response */
        $response = $next($request);

        // Strict-Transport-Security: Enforce HTTPS for 1 year
        $response->header('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');

        // X-Content-Type-Options: Prevent MIME type sniffing
        $response->header('X-Content-Type-Options', 'nosniff');

        // X-Frame-Options: Prevent clickjacking
        $response->header('X-Frame-Options', 'SAMEORIGIN');

        // Content-Security-Policy: Restrict script sources and prevent XSS
        $response->header(
            'Content-Security-Policy',
            "default-src 'self'; script-src 'self' 'unsafe-inline' 'unsafe-eval' cdnjs.cloudflare.com; style-src 'self' 'unsafe-inline' cdnjs.cloudflare.com; img-src 'self' data: https:; font-src 'self' cdnjs.cloudflare.com; connect-src 'self'; frame-ancestors 'self';"
        );

        // X-XSS-Protection: Enable built-in XSS filters (legacy, but still useful)
        $response->header('X-XSS-Protection', '1; mode=block');

        // Referrer-Policy: Control referrer information
        $response->header('Referrer-Policy', 'strict-origin-when-cross-origin');

        // Permissions-Policy: Control feature access
        $response->header(
            'Permissions-Policy',
            'geolocation=(), microphone=(), camera=(), payment=()'
        );

        return $response;
    }
}
