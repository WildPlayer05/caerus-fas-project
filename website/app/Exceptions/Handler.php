<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            // Catch + Enrich + Aggregate: ogni eccezione non gestita arriva
            // a Sentry con stack trace, contesto richiesta e grouping
            // automatico. Se SENTRY_LARAVEL_DSN non è impostato, l'SDK non
            // invia nulla: questa riga è quindi sicura anche in locale/CI.
            if (app()->bound('sentry')) {
                app('sentry')->captureException($e);
            }
        });
    }
}
