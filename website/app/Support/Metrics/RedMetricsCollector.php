<?php

namespace App\Support\Metrics;

use Illuminate\Support\Facades\Redis;


class RedMetricsCollector
{
   
    private const BUCKETS = [10, 25, 50, 100, 250, 500, 1000, 2500, 5000];

    private const KEY_PREFIX = 'metrics:red:';

    private const INDEX_KEY = self::KEY_PREFIX.'index';

    private const CONTAINER_KEY = self::KEY_PREFIX.'containers';

    
    private const TTL_SECONDS = 86400;

    public function record(string $method, string $route, int $statusCode, float $durationMs): void
    {
        $key = self::KEY_PREFIX.$method.':'.$route;

        Redis::pipeline(function ($pipe) use ($key, $statusCode, $durationMs) {
            $pipe->sadd(self::INDEX_KEY, $key);
            $pipe->hincrby($key, 'count', 1);

            if ($statusCode >= 500) {
                $pipe->hincrby($key, 'errors', 1);
            }

            foreach (self::BUCKETS as $bucket) {
                if ($durationMs <= $bucket) {
                    $pipe->hincrby($key, 'bucket_'.$bucket, 1);
                }
            }

            $pipe->expire($key, self::TTL_SECONDS);
        });
    }

    public function recordContainer(string $container): void
    {
        Redis::pipeline(function ($pipe) use ($container) {
            $pipe->hincrby(self::CONTAINER_KEY, $container, 1);
            $pipe->expire(self::CONTAINER_KEY, self::TTL_SECONDS);
        });
    }

    /**
     *
     * @return array<string, int>
     */
    public function containerSummary(): array
    {
        return array_map('intval', Redis::hgetall(self::CONTAINER_KEY));
    }

    /**
     *
     * @return array<int, array<string, mixed>>
     */
    public function summary(): array
    {
        $summary = [];

        foreach (Redis::smembers(self::INDEX_KEY) as $key) {
            $data = Redis::hgetall($key);

            if (empty($data)) {
                // La chiave è scaduta (TTL) ma è rimasta nell'indice: la rimuoviamo.
                Redis::srem(self::INDEX_KEY, $key);

                continue;
            }

            $count = (int) ($data['count'] ?? 0);
            $errors = (int) ($data['errors'] ?? 0);

            [$method, $route] = array_pad(
                explode(':', substr($key, strlen(self::KEY_PREFIX)), 2),
                2,
                ''
            );

            $summary[] = [
                'method' => $method,
                'route' => $route,
                'requests_total' => $count,
                'errors_total' => $errors,
                'error_ratio' => $count > 0 ? round($errors / $count, 4) : 0.0,
                'p95_ms' => $this->percentile($data, $count, 0.95),
                'p99_ms' => $this->percentile($data, $count, 0.99),
            ];
        }

        return $summary;
    }


    private function percentile(array $data, int $count, float $quantile): ?float
    {
        if ($count === 0) {
            return null;
        }

        $target = $count * $quantile;
        $previousBucket = 0;
        $previousCumulative = 0;

        foreach (self::BUCKETS as $bucket) {
            $cumulative = (int) ($data['bucket_'.$bucket] ?? $previousCumulative);

            if ($cumulative >= $target) {
                if ($cumulative === $previousCumulative) {
                    return (float) $bucket;
                }

                $fraction = ($target - $previousCumulative) / ($cumulative - $previousCumulative);

                return round($previousBucket + $fraction * ($bucket - $previousBucket), 2);
            }

            $previousBucket = $bucket;
            $previousCumulative = $cumulative;
        }

        return (float) end(self::BUCKETS);
    }
}
