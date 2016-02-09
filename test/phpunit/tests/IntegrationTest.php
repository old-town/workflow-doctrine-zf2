<?php
/**
 * @link https://github.com/old-town/workflow-doctrine-zf2
 * @author  Malofeykin Andrey  <and-rey2@yandex.ru>
 */
namespace OldTown\Workflow\Doctrine\ZF2\PhpUnit\Test;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;
use OldTown\Workflow\Basic\BasicWorkflow;


/**
 * Class ModuleTest
 *
 * @package OldTown\Workflow\Doctrine\ZF2\PhpUnit\Test
 */
class IntegrationTest extends AbstractHttpControllerTestCase
{
    public function testIntegrationWorkflowDoctrineZF2()
    {
        /** @noinspection PhpIncludeInspection */
        $this->setApplicationConfig(
            include Paths::getPathToAppConfig()
        );
        /** @var BasicWorkflow $wfManager */
        $wfManager = $this->getApplicationServiceLocator()->get('workflow.manager.testWorkflowManager');
        $wfManager->initialize('test', 1);
    }
}
