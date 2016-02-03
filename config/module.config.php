<?php
/**
 * @link https://github.com/old-town/workflow-doctrine-zf2
 * @author  Malofeykin Andrey  <and-rey2@yandex.ru>
 */
namespace OldTown\Workflow\Doctrine\ZF2;

$config = [
];


return array_merge_recursive(
    include __DIR__ . '/doctrine.config.php',
    $config
);