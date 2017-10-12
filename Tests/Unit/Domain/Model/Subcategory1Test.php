<?php
namespace Rawk\RmMattigschauer\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Chris Rawk <ce@rawk.at>
 */
class Subcategory1Test extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Rawk\RmMattigschauer\Domain\Model\Subcategory1
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Rawk\RmMattigschauer\Domain\Model\Subcategory1();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getTitleReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleForStringSetsTitle()
    {
        $this->subject->setTitle('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'title',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getMaincategoryReturnsInitialValueForMaincategory()
    {
        self::assertEquals(
            null,
            $this->subject->getMaincategory()
        );
    }

    /**
     * @test
     */
    public function setMaincategoryForMaincategorySetsMaincategory()
    {
        $maincategoryFixture = new \Rawk\RmMattigschauer\Domain\Model\Maincategory();
        $this->subject->setMaincategory($maincategoryFixture);

        self::assertAttributeEquals(
            $maincategoryFixture,
            'maincategory',
            $this->subject
        );
    }
}
