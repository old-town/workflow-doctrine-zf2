<?php
/**
 * @link https://github.com/old-town/workflow-doctrine-zf2
 * @author  Malofeykin Andrey  <and-rey2@yandex.ru>
 */
namespace OldTown\Workflow\Doctrine\ZF2;

use OldTown\Workflow\Spi\Doctrine\Entity\DefaultEntry;
use ReflectionClass;

return [
    'doctrine' => [
        'driver' => [
            'WorkflowDoctrineEntity' => [
                'paths' => call_user_func(function(){
                    $r = new ReflectionClass(DefaultEntry::class);
                    return dirname($r->getFileName());
                }),
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
            ],
        ],
    ],
];
