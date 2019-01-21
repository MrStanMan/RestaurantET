<?php

return [
    'role_structure' => [
        'administrator' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u',
            'reservation' => 'c,r,u,d'
        ],
        'employee' => [
            'order' => 'c,r,u,d',
            'reservation' => 'r,u'
        ],
        'user' => [
            'profile' => 'r,u,d',
            'reservation' => 'c,r,d'
        ],
    ],
    'permission_structure' => [
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
