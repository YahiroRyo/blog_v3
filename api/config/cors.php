<?php

switch(env('APP_ENV')) {
    case 'local':
        return [
            'paths' => ['api/*', 'users/login', 'users/create', 'sanctum/csrf-cookie'],

            'allowed_methods'          => ['*'],
            'allowed_origins'          => ['http://localhost:3000'],
            'allowed_origins_patterns' => [],
            'allowed_headers'          => ['*'],

            'exposed_headers' => [],

            'max_age' => 0,

            'supports_credentials' => true,
        ];
        break;

    case 'production':
        return [
            'paths' => ['api/*', 'users/login', 'users/create', 'sanctum/csrf-cookie'],

            'allowed_methods'          => ['*'],
            'allowed_origins'          => ['https://yappi.jp'],
            'allowed_origins_patterns' => [],
            'allowed_headers'          => ['*'],

            'exposed_headers' => [],

            'max_age' => 0,

            'supports_credentials' => true,
        ];
        break;
}
