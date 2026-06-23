<?php

namespace App\Support\Analytics;

use PostHog\PostHog;

class AnalyticsTracker
{
    private static bool $initialized = false;

    public static function track(string $event, string $distinctId, array $properties = []): void
    {
        if (! config('analytics.enabled') || ! config('analytics.posthog_key')) {
            return;
        }

        self::init();

        PostHog::capture([
            'distinctId' => $distinctId,
            'event' => $event,
            'properties' => $properties,
        ]);
    }

    private static function init(): void
    {
        if (self::$initialized) {
            return;
        }

        PostHog::init(config('analytics.posthog_key'), [
            'host' => config('analytics.posthog_host'),
        ]);

        self::$initialized = true;
    }
}
