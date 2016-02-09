<?php
/**
 * @link https://github.com/old-town/workflow-doctrine-zf2
 * @author  Malofeykin Andrey  <and-rey2@yandex.ru>
 */
namespace OldTown\Workflow\Doctrine\ZF2\PhpUnit\Test;

/**
 * Class Paths
 *
 * @package OldTown\Workflow\Doctrine\ZF2\PhpUnit\Test
 */
class Paths
{
    /**
     * Путь до конфига приложения
     *
     * @var string|null
     */
    protected static $pathToAppConfig;

    /**
     * Возвращает путь до директории с данными для тестов
     *
     * @return string
     */
    public static function getPathToAppConfig()
    {
        if (static::$pathToAppConfig) {
            return static::$pathToAppConfig;
        }

        static::$pathToAppConfig =   realpath(__DIR__ . '/_files/app/application.config.php');

        return static::$pathToAppConfig;
    }


    /**
     * Возвращает путь путь до директории в которой создаются прокси классы для сущностей доктрины
     *
     * @return string
     */
    public static function getPathToDoctrineProxyDir()
    {
        return __DIR__ . '/../../data/test/Proxies/';
    }

    /**
     * Путь до директории где находится файл инициирующий приложение
     *
     * @return string
     */
    public static function getPathToModule()
    {
        return __DIR__ . '/../../';
    }
}
