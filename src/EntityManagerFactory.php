<?php
/**
 * @link https://github.com/old-town/workflow-doctrine-zf2
 * @author  Malofeykin Andrey  <and-rey2@yandex.ru>
 */
namespace OldTown\Workflow\Doctrine\ZF2;

use Doctrine\ORM\EntityManagerInterface;
use OldTown\Workflow\Spi\Doctrine\EntityManagerFactory\EntityManagerFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;


/**
 * Class EntityManagerFactory
 *
 * @package OldTown\Workflow\Doctrine\ZF2
 */
class EntityManagerFactory implements EntityManagerFactoryInterface
{
    /**
     * @var string
     */
    const ENTITY_MANAGER_NAME = 'entityManagerName';

    /**
     * Сервис локатор по умолчанию
     *
     * @var ServiceLocatorInterface
     */
    protected static $defaultServiceLocator;

    /**
     * Сервис локатор
     *
     * @var ServiceLocatorInterface
     */
    protected $serviceLocator;

    /**
     * Создает менеджер сущностей доктрины
     *
     * @param array $options
     *
     * @return EntityManagerInterface
     *
     * @throws Exception\InvalidArgumentException
     * @throws \Zend\ServiceManager\Exception\ServiceNotFoundException
     * @throws Exception\RuntimeException
     */
    public function factory(array $options = [])
    {
        if (!array_key_exists(static::ENTITY_MANAGER_NAME, $options)) {
            $errMsg = sprintf('Option %s not found', static::ENTITY_MANAGER_NAME);
            throw new Exception\InvalidArgumentException($errMsg);
        }
        $emName = $options[static::ENTITY_MANAGER_NAME];

        $em = $this->getServiceLocator()->get($emName);

        return $em;
    }

    /**
     * @return ServiceLocatorInterface
     *
     * @throws \OldTown\Workflow\Doctrine\ZF2\Exception\RuntimeException
     */
    public function getServiceLocator()
    {
        if ($this->serviceLocator) {
            return $this->serviceLocator;
        }

        $this->serviceLocator = static::getDefaultServiceLocator();

        return $this->serviceLocator;
    }

    /**
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return $this
     */
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;

        return $this;
    }

    /**
     * @return ServiceLocatorInterface
     *
     * @throws Exception\RuntimeException
     */
    public static function getDefaultServiceLocator()
    {
        if (!static::$defaultServiceLocator instanceof ServiceLocatorInterface) {
            $errMsg = 'Service locator not found';
            throw new Exception\RuntimeException($errMsg);
        }
        return static::$defaultServiceLocator;
    }

    /**
     * @param ServiceLocatorInterface $defaultServiceLocator
     */
    public static function setDefaultServiceLocator(ServiceLocatorInterface $defaultServiceLocator)
    {
        static::$defaultServiceLocator = $defaultServiceLocator;
    }
}
