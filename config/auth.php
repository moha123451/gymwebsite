<?php

return [
    'defaults' => [
        'guard' => 'member',  // تغيير من 'web' إلى 'member'
        'passwords' => 'members',  // تصحيح من 'membars' إلى 'members'
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'member' => [
            'driver' => 'session',
            'provider' => 'members',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
        'members' => [
            'driver' => 'eloquent',
            'model' => App\Models\Member::class,
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
        'members' => [  // إضافة قسم members هنا
            'provider' => 'members',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,
];
