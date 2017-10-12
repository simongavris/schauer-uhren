<?php
namespace Rawk\RmMattigschauer\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Chris Rawk <ce@rawk.at>
 */
class ProdukteControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Rawk\RmMattigschauer\Controller\ProdukteController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Rawk\RmMattigschauer\Controller\ProdukteController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllProduktesFromRepositoryAndAssignsThemToView()
    {

        $allProduktes = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $produkteRepository = $this->getMockBuilder(\Rawk\RmMattigschauer\Domain\Repository\ProdukteRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $produkteRepository->expects(self::once())->method('findAll')->will(self::returnValue($allProduktes));
        $this->inject($this->subject, 'produkteRepository', $produkteRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('produktes', $allProduktes);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenProdukteToView()
    {
        $produkte = new \Rawk\RmMattigschauer\Domain\Model\Produkte();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('produkte', $produkte);

        $this->subject->showAction($produkte);
    }
}
