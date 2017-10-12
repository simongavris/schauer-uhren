<?php
namespace Rawk\RmMattigschauer\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Chris Rawk <ce@rawk.at>
 */
class ProdukteTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Rawk\RmMattigschauer\Domain\Model\Produkte
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Rawk\RmMattigschauer\Domain\Model\Produkte();
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
    public function getTypeReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getType()
        );
    }

    /**
     * @test
     */
    public function setTypeForStringSetsType()
    {
        $this->subject->setType('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'type',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getCategoryReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getCategory()
        );
    }

    /**
     * @test
     */
    public function setCategoryForIntSetsCategory()
    {
        $this->subject->setCategory(12);

        self::assertAttributeEquals(
            12,
            'category',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getTechdataReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTechdata()
        );
    }

    /**
     * @test
     */
    public function setTechdataForStringSetsTechdata()
    {
        $this->subject->setTechdata('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'techdata',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDescriptionReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getDescription()
        );
    }

    /**
     * @test
     */
    public function setDescriptionForStringSetsDescription()
    {
        $this->subject->setDescription('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'description',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getProductfileReturnsInitialValueForFileReference()
    {
        self::assertEquals(
            null,
            $this->subject->getProductfile()
        );
    }

    /**
     * @test
     */
    public function setProductfileForFileReferenceSetsProductfile()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setProductfile($fileReferenceFixture);

        self::assertAttributeEquals(
            $fileReferenceFixture,
            'productfile',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDiagramfileReturnsInitialValueForFileReference()
    {
        self::assertEquals(
            null,
            $this->subject->getDiagramfile()
        );
    }

    /**
     * @test
     */
    public function setDiagramfileForFileReferenceSetsDiagramfile()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setDiagramfile($fileReferenceFixture);

        self::assertAttributeEquals(
            $fileReferenceFixture,
            'diagramfile',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getImageReturnsInitialValueForFileReference()
    {
        self::assertEquals(
            null,
            $this->subject->getImage()
        );
    }

    /**
     * @test
     */
    public function setImageForFileReferenceSetsImage()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setImage($fileReferenceFixture);

        self::assertAttributeEquals(
            $fileReferenceFixture,
            'image',
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

    /**
     * @test
     */
    public function getSubcategory1ReturnsInitialValueForSubcategory1()
    {
        self::assertEquals(
            null,
            $this->subject->getSubcategory1()
        );
    }

    /**
     * @test
     */
    public function setSubcategory1ForSubcategory1SetsSubcategory1()
    {
        $subcategory1Fixture = new \Rawk\RmMattigschauer\Domain\Model\Subcategory1();
        $this->subject->setSubcategory1($subcategory1Fixture);

        self::assertAttributeEquals(
            $subcategory1Fixture,
            'subcategory1',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getSubcategory2ReturnsInitialValueForSubcategory2()
    {
        self::assertEquals(
            null,
            $this->subject->getSubcategory2()
        );
    }

    /**
     * @test
     */
    public function setSubcategory2ForSubcategory2SetsSubcategory2()
    {
        $subcategory2Fixture = new \Rawk\RmMattigschauer\Domain\Model\Subcategory2();
        $this->subject->setSubcategory2($subcategory2Fixture);

        self::assertAttributeEquals(
            $subcategory2Fixture,
            'subcategory2',
            $this->subject
        );
    }
}
