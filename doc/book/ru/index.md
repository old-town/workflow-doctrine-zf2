# workflow-doctrine-zf2

Интеграция workflow, doctrine и zf2

Модуль old-town/workflow-doctrine-zf2 является прослойкой между модулем old-town/workflow-doctrine и ZendFramework2.

Для использования модуля необходимо:

* Подключить его в виде зависимости в composer.json
```php
"require": {
    "old-town/workflow-doctrine-zf2": "dev-dev"
}
```
* Подключить модуль в application.config.php
```php
return [
    'modules' => [
        'OldTown\\Workflow\\Doctrine\\ZF2'
    ]
]
```

* *Добавить драйвер для метаданных*
```php
return [
    'doctrine' => [
        'entitymanager' => [
            'test' => [
                'configuration' => 'test',
                'connection'    => 'test',
            ]
        ],
        'connection' => [
            'test' => [
                'configuration' => 'test'
            ]
        ],
        'configuration' => [
            'test' => [
                'driver'            => 'test'
            ]
        ],
        'driver' => [
            'test' => [
                'class'   => 'Doctrine\ORM\Mapping\Driver\DriverChain',
                'drivers' => [
                    'OldTown\\Workflow\\Spi\\Doctrine\\Entity' => 'WorkflowDoctrineEntity'
                ]
            ]
        ]
    ],
];
```

# Крактое описание структуры модуля.

Модуль предоставляет фабрику \OldTown\Workflow\Doctrine\ZF2\EntityManagerFactory, котора может быть использована в 
модуле old-town/workflow-doctrine для получения менеджера сущностей Doctrine2.

Также в модуле реализована регистрация сущностей используемых Doctrine2 используемых для сохранения состояния процесса
workflow.