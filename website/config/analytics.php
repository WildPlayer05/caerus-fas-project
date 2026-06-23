<?php

return [

    'enabled' => env('ANALYTICS_ENABLED', true),

    'posthog_key' => env('POSTHOG_KEY'),

    'posthog_host' => env('POSTHOG_HOST', 'https://eu.i.posthog.com'),

];
