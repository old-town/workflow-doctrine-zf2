<?php
/**
 * @link https://github.com/old-town/workflow-doctrine-zf2
 * @author  Malofeykin Andrey  <and-rey2@yandex.ru>
 */
namespace OldTown\Workflow\Doctrine\ZF2\PhpUnit\Test;

use Doctrine\ORM\Tools\SchemaTool;
use OldTown\Workflow\Spi\Doctrine\Entity\CurrentStep;
use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;
use OldTown\Workflow\Basic\BasicWorkflow;


/**
 * Class ModuleTest
 *
 * @package OldTown\Workflow\Doctrine\ZF2\PhpUnit\Test
 */
class IntegrationTest extends AbstractHttpControllerTestCase
{
    /**
     * Подготавливаем базу
     *
     */
    protected function setUp()
    {
        /** @noinspection PhpIncludeInspection */
        $this->setApplicationConfig(
            include Paths::getPathToAppConfig()
        );
        /** @var \Doctrine\ORM\EntityManager $em */
        $em = $this->getApplication()->getServiceManager()->get('doctrine.entitymanager.test');

        $tool = new SchemaTool($em);
        $tool->dropDatabase();

        $metadata = $em->getMetadataFactory()->getAllMetadata();
        $tool->createSchema($metadata);


        parent::setUp();
    }


    /**
     * Интеграционный тест. Берется простой workflow. Запускается процесс. Проверяется что произошел переход в нужный шаг.
     * В качестве хранилища используется база данных.
     *
     * @return array
     */
    public function testIntegrationWorkflowDoctrineZF2()
    {
        /** @noinspection PhpIncludeInspection */
        $this->setApplicationConfig(
            include Paths::getPathToAppConfig()
        );
        /** @var BasicWorkflow $wfManager */
        $wfManager = $this->getApplicationServiceLocator()->get('workflow.manager.testWorkflowManager');
        $entryId = $wfManager->initialize('test', 1);
        $currentSteps = $wfManager->getCurrentSteps($entryId);

        static::assertCount(1, $currentSteps);
        /** @var CurrentStep $step */
        $step = current($currentSteps);
        static::assertInstanceOf(CurrentStep::class, $step);
        static::assertEquals(2, $step->getStepId());
    }
}
