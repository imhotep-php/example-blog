<?php

return [

    'defaults' => [
        'guard' => 'web',
    ],

    // Supported guard drivers: "session", "token"

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users'
        ]
    ],

    // Supported providers drivers: "database"

    'providers' => [
        'users' => [
            'driver' => 'database',
            'table' => 'users'
        ]
    ],


];