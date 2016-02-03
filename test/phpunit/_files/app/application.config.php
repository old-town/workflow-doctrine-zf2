<?php

use OldTown\Workflow\Doctrine\ZF2\PhpUnit\Test\Paths;

return [
    'modules' => [
        'OldTown\\Workflow\\ZF2',
        'OldTown\\Workflow\\Doctrine\\ZF2',
    ],
    'module_listener_options' => [
        'module_paths' => [
            'OldTown\\Workflow\\ZF2\\View' => Paths::getPathToModule(),
        ],
        'config_glob_paths' => []
    ]
];
