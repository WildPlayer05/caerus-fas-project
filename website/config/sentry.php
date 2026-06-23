<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Sentry - Error Tracking
    |--------------------------------------------------------------------------
    |
    | Catch (eccezioni non gestite, automatico via app/Exceptions/Handler.php)
    | + Enrich (stack trace, request, release) + Aggregate (grouping/dedupe),
    | gestiti dal servizio SaaS Sentry. Senza DSN l'SDK non invia nulla: è
    | sicuro lasciare questa variabile vuota in locale/CI.
    |
    */

    'dsn' => env('SENTRY_LARAVEL_DSN'),

    // Ambiente mostrato in Sentry, utile per distinguere gli errori di
    // produzione da quelli generati durante lo sviluppo/test.
    'environment' => env('APP_ENV', 'production'),

    // Percentuale di richieste tracciate per le performance traces.
    // Bassa di default: l'obiettivo qui è l'error tracking, non l'APM.
    'traces_sample_rate' => (float) env('SENTRY_TRACES_SAMPLE_RATE', 0.0),

];
