<?php
return [
    'adminka' => [
        'type' => 2,
        'description' => 'Админка',
    ],
    'user' => [
        'type' => 1,
        'description' => 'Пользователь',
        'ruleName' => 'userRole',
    ],
    'teacher' => [
        'type' => 1,
        'description' => 'Классный руководитель',
        'ruleName' => 'userRole',
        'children' => [
            'user',
            'adminka',
        ],
    ],
    'moder' => [
        'type' => 1,
        'description' => 'Модератор',
        'ruleName' => 'userRole',
        'children' => [
            'teacher',
        ],
    ],
    'admin' => [
        'type' => 1,
        'description' => 'Администратор',
        'ruleName' => 'userRole',
        'children' => [
            'moder',
        ],
    ],
];
