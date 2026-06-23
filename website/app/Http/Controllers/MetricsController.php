<?php

namespace App\Http\Controllers;

use App\Support\Metrics\RedMetricsCollector;
use Illuminate\Http\Response;

class MetricsController extends Controller
{
    public function __construct(private RedMetricsCollector $metrics)
    {
    }

    public function index(): Response
    {
        $lines = [];

        foreach ($this->metrics->summary() as $row) {
            $labels = sprintf('method="%s",route="%s"', $row['method'], $row['route']);

            $lines[] = "http_requests_total{{$labels}} {$row['requests_total']}";
            $lines[] = "http_errors_total{{$labels}} {$row['errors_total']}";
            $lines[] = "http_error_ratio{{$labels}} {$row['error_ratio']}";

            if ($row['p95_ms'] !== null) {
                $lines[] = "http_request_duration_p95_ms{{$labels}} {$row['p95_ms']}";
            }

            if ($row['p99_ms'] !== null) {
                $lines[] = "http_request_duration_p99_ms{{$labels}} {$row['p99_ms']}";
            }
        }

        foreach ($this->metrics->containerSummary() as $container => $count) {
            $lines[] = "http_requests_by_container_total{container=\"{$container}\"} {$count}";
        }

        return response(implode("\n", $lines)."\n")
            ->header('Content-Type', 'text/plain; version=0.0.4');
    }
}
