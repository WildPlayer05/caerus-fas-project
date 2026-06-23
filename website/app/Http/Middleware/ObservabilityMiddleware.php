<?php

namespace App\Http\Middleware;

use App\Support\Metrics\RedMetricsCollector;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Sentry\State\Scope;
use Symfony\Component\HttpFoundation\Response;

use function Sentry\configureScope;

class ObservabilityMiddleware
{
    public function __construct(private RedMetricsCollector $metrics)
    {
    }

    public function handle(Request $request, Closure $next): Response
    {
        if (! config('observability.enabled')) {
            return $next($request);
        }

        $start = microtime(true);
        $requestId = (string) Str::uuid();
        $container = gethostname() ?: 'unknown';
        $request->attributes->set('request_id', $requestId);

        configureScope(function (Scope $scope) use ($requestId): void {
            $scope->setTag('request_id', $requestId);
        });

        /** @var Response $response */
        $response = $next($request);

        $durationMs = round((microtime(true) - $start) * 1000, 2);
        $route = $request->route()?->getName() ?? $request->path();
        $statusCode = $response->getStatusCode();

        $this->metrics->record($request->method(), $route, $statusCode, $durationMs);
        $this->metrics->recordContainer($container);

        Log::channel('observability')->info('http_request', [
            'request_id' => $requestId,
            'method' => $request->method(),
            'route' => $route,
            'status_code' => $statusCode,
            'duration_ms' => $durationMs,
            'is_error' => $statusCode >= 500,
            'ip' => $request->ip(),
            'container' => $container,
            'timestamp' => now()->toIso8601String(),
        ]);

        $response->headers->set('X-Request-Id', $requestId);
        $response->headers->set('X-Served-By', $container);

        return $response;
    }
}
