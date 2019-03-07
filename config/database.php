<?php

$connection = getenv('DATABASE_URL') ? 'pgsql' : 'sqlite';

$dbopts = parse_url(getenv('DATABASE_URL'));

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => $connection,

   
    'connections' => [

        'testing' => [
            'driver' => 'sqlite',
            'database' => ':memory:',
        ],

        'sqlite' => [
            'driver' => 'sqlite',
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => env('DB_PREFIX', ''),
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'host' => $dbopts["host"] ?? '',
            'port' => $dbopts["port"] ?? '',
            'database' => ltrim($dbopts["path"] ?? '', '/'),
            'username' => $dbopts["user"] ?? '',
            'password' => $dbopts["pass"] ?? '',
            'charset' => env('DB_CHARSET', 'utf8'),
            'prefix' => env('DB_PREFIX', ''),
            'schema' => env('DB_SCHEMA', 'public'),
            'sslmode' => env('DB_SSL_MODE', 'prefer'),
        ],

    ],

    'migrations' => 'migrations',
];
