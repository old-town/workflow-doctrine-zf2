<?php

use OldTown\Workflow\Doctrine\ZF2\PhpUnit\Test\Paths;
use OldTown\Workflow\Doctrine\ZF2\PhpUnit\Utils\InitTestAppListener;

return [
    'modules'                 => [
        'DoctrineModule',
        'DoctrineORMModule',
        'OldTown\\Workflow\\ZF2',
        'OldTown\\Workflow\\Doctrine\\ZF2',
    ],
    'module_listener_options' => [
        'module_paths'      => [
            'OldTown\\Workflow\\Doctrine\\ZF2' => Paths::getPathToModule(),
        ],
        'config_glob_paths' => [
            __DIR__ . '/config/autoload/{{,*.}global,{,*.}local}.php',
        ],
    ],
    'service_manager'         => [
        'invokables' => [
            InitTestAppListener::class => InitTestAppListener::class
        ]
    ],
    'listeners'               => [
        InitTestAppListener::class
    ]
];
