<?php

return [
    'paths' => [
        'packages' => base_path('DDD'),
        'generator' => [
            'migration' => ['path' => 'Database/Migrations', 'generate' => true]
        ]
    ],
    'aggregates' => [
        'User' => true,
    ]
];
