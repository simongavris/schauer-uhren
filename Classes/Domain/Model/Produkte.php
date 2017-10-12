<?php
namespace Rawk\RmMattigschauer\Domain\Model;

/***
 *
 * This file is part of the "Mattig Schauer Produkte" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2017 Chris Rawk <ce@rawk.at>, rawk
 *
 ***/

/**
 * Produkte
 */
class Produkte extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * title
     *
     * @var string
     */
    protected $title = '';

    /**
     * type
     *
     * @var string
     */
    protected $type = '';

    /**
     * category
     *
     * @var int
     */
    protected $category = 0;

    /**
     * techdata
     *
     * @var string
     */
    protected $techdata = '';

    /**
     * description
     *
     * @var string
     */
    protected $description = '';

    /**
     * productfile
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @cascade remove
     */
    protected $productfile = null;

    /**
     * diagramfile
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @cascade remove
     */
    protected $diagramfile = null;

    /**
     * image
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @cascade remove
     */
    protected $image = null;

    /**
     * maincategory
     *
     * @var \Rawk\RmMattigschauer\Domain\Model\Maincategory
     */
    protected $maincategory = null;

    /**
     * subcategory1
     *
     * @var \Rawk\RmMattigschauer\Domain\Model\Subcategory1
     */
    protected $subcategory1 = null;

    /**
     * subcategory2
     *
     * @var \Rawk\RmMattigschauer\Domain\Model\Subcategory2
     */
    protected $subcategory2 = null;

    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Returns the type
     *
     * @return string $type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets the type
     *
     * @param string $type
     * @return void
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * Returns the techdata
     *
     * @return string $techdata
     */
    public function getTechdata()
    {
        return $this->techdata;
    }

    /**
     * Sets the techdata
     *
     * @param string $techdata
     * @return void
     */
    public function setTechdata($techdata)
    {
        $this->techdata = $techdata;
    }

    /**
     * Returns the description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Returns the productfile
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $productfile
     */
    public function getProductfile()
    {
        return $this->productfile;
    }

    /**
     * Sets the productfile
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $productfile
     * @return void
     */
    public function setProductfile(\TYPO3\CMS\Extbase\Domain\Model\FileReference $productfile)
    {
        $this->productfile = $productfile;
    }

    /**
     * Returns the diagramfile
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $diagramfile
     */
    public function getDiagramfile()
    {
        return $this->diagramfile;
    }

    /**
     * Sets the diagramfile
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $diagramfile
     * @return void
     */
    public function setDiagramfile(\TYPO3\CMS\Extbase\Domain\Model\FileReference $diagramfile)
    {
        $this->diagramfile = $diagramfile;
    }

    /**
     * Returns the image
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Sets the image
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     * @return void
     */
    public function setImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image)
    {
        $this->image = $image;
    }

    /**
     * Returns the category
     *
     * @return int category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Sets the category
     *
     * @param int $category
     * @return void
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * Returns the maincategory
     *
     * @return \Rawk\RmMattigschauer\Domain\Model\Maincategory $maincategory
     */
    public function getMaincategory()
    {
        return $this->maincategory;
    }

    /**
     * Sets the maincategory
     *
     * @param \Rawk\RmMattigschauer\Domain\Model\Maincategory $maincategory
     * @return void
     */
    public function setMaincategory(\Rawk\RmMattigschauer\Domain\Model\Maincategory $maincategory)
    {
        $this->maincategory = $maincategory;
    }

    /**
     * Returns the subcategory1
     *
     * @return \Rawk\RmMattigschauer\Domain\Model\Subcategory1 $subcategory1
     */
    public function getSubcategory1()
    {
        return $this->subcategory1;
    }

    /**
     * Sets the subcategory1
     *
     * @param \Rawk\RmMattigschauer\Domain\Model\Subcategory1 $subcategory1
     * @return void
     */
    public function setSubcategory1(\Rawk\RmMattigschauer\Domain\Model\Subcategory1 $subcategory1)
    {
        $this->subcategory1 = $subcategory1;
    }

    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects()
    {

    }

    /**
     * Returns the subcategory2
     *
     * @return \Rawk\RmMattigschauer\Domain\Model\Subcategory2 $subcategory2
     */
    public function getSubcategory2()
    {
        return $this->subcategory2;
    }

    /**
     * Sets the subcategory2
     *
     * @param \Rawk\RmMattigschauer\Domain\Model\Subcategory2 $subcategory2
     * @return void
     */
    public function setSubcategory2(\Rawk\RmMattigschauer\Domain\Model\Subcategory2 $subcategory2)
    {
        $this->subcategory2 = $subcategory2;
    }
}
