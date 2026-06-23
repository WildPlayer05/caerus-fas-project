<?php

namespace App\Http\Middleware;

use App\Support\Metrics\RedMetricsCollector;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

/**
 * Middleware "infrastrutturale" di Observability.
 *
 * Misura ogni richiesta HTTP secondo il metodo RED (Rate, Errors, Duration)
 * e produce un log strutturato in JSON con request-id di correlazione.
 * Non modifica in alcun modo la risposta prodotta dai controller: si limita
 * a osservare richiesta/risposta che attraversano il pipeline.
 */
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
        $request->attributes->set('request_id', $requestId);

        /** @var Response $response */
        $response = $next($request);

        $durationMs = round((microtime(true) - $start) * 1000, 2);
        $route = $request->route()?->getName() ?? $request->path();
        $statusCode = $response->getStatusCode();

        $this->metrics->record($request->method(), $route, $statusCode, $durationMs);

        Log::channel('observability')->info('http_request', [
            'request_id' => $requestId,
            'method' => $request->method(),
            'route' => $route,
            'status_code' => $statusCode,
            'duration_ms' => $durationMs,
            'is_error' => $statusCode >= 500,
            'ip' => $request->ip(),
            'timestamp' => now()->toIso8601String(),
        ]);

        $response->headers->set('X-Request-Id', $requestId);

        return $response;
    }
}
