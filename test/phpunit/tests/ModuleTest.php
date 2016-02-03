<?php
/**
 * @link https://github.com/old-town/workflow-doctrine-zf2
 * @author  Malofeykin Andrey  <and-rey2@yandex.ru>
 */
namespace OldTown\Workflow\Doctrine\ZF2\PhpUnit\Test;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

/**
 * Class ModuleTest
 *
 * @package OldTown\Workflow\Doctrine\ZF2\PhpUnit\Test
 */
class ModuleTest extends AbstractHttpControllerTestCase
{
    public function testLoadModule()
    {
        /** @noinspection PhpIncludeInspection */
        $this->setApplicationConfig(
            include Paths::getPathToAppConfig()
        );
        $this->assertModulesLoaded(['OldTown\Workflow\Doctrine\ZF2']);
    }
}
