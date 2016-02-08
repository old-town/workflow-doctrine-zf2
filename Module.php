<?php
/**
 * @link https://github.com/old-town/workflow-doctrine-zf2
 * @author  Malofeykin Andrey  <and-rey2@yandex.ru>
 */
namespace OldTown\Workflow\Doctrine\ZF2;


use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\EventManager\EventInterface;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;


/**
 * Class Module
 *
 * @package OldTown\Workflow\Doctrine\ZF2
 */
class Module implements
    BootstrapListenerInterface,
    ConfigProviderInterface,
    AutoloaderProviderInterface
{
    /**
     * @param EventInterface $e
     *
     * @return array|void
     * @throws \Zend\ServiceManager\Exception\ServiceNotFoundException
     */
    public function onBootstrap(EventInterface $e)
    {
        /** @var MvcEvent $e */
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

        $sl = $e->getApplication()->getServiceManager();
        EntityManagerFactory::setDefaultServiceLocator($sl);
    }

    /**
     * @return array
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    /**
     * @return array
     */
    public function getAutoloaderConfig()
    {
        $config = [];
        $autoloadFile = __DIR__ . '/autoload_classmap.php';
        if (file_exists($autoloadFile)) {
            $config['Zend\Loader\ClassMapAutoloader'] = [
                    $autoloadFile,
                ];
        }
        $config['Zend\Loader\StandardAutoloader'] = [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src',
                ],
        ];
        return $config;
    }
}