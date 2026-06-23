<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Observability
    |--------------------------------------------------------------------------
    |
    | Interruttore globale del livello di Observability (middleware RED +
    | log strutturati JSON). Permette di disattivarlo senza rimuovere
    | codice, ad esempio in ambienti di test.
    |
    */

    'enabled' => env('OBSERVABILITY_ENABLED', true),

];
