<?php

/**
 * Hashing Configuration — AC-9.2 Security Requirement
 *
 * Password hashing uses bcrypt with cost factor ≥ 10.
 * A cost factor of 12 provides strong security while
 * remaining performant on modern hardware.
 */
return [

    /*
    |--------------------------------------------------------------------------
    | Default Hash Driver
    |--------------------------------------------------------------------------
    |
    | This option controls the default hash driver used by Laravel's Hash
    | facade. Bcrypt is the required algorithm per security spec AC-9.2.
    |
    */
    'driver' => 'bcrypt',

    /*
    |--------------------------------------------------------------------------
    | Bcrypt Options
    |--------------------------------------------------------------------------
    |
    | Here you may specify the configuration options that should be used when
    | passwords are hashed using the Bcrypt algorithm. The "rounds" value
    | must be ≥ 10 per security requirement AC-9.2.
    |
    */
    'bcrypt' => [
        'rounds' => env('BCRYPT_ROUNDS', 12),
        'verify' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Argon Options
    |--------------------------------------------------------------------------
    | Defined for completeness; bcrypt is the active driver above.
    */
    'argon' => [
        'memory' => 65536,
        'threads' => 1,
        'time' => 4,
        'verify' => true,
    ],

];
