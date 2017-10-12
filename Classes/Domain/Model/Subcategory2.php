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
 * Subcategory2
 */
class Subcategory2 extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * title
     *
     * @var string
     */
    protected $title = '';

    /**
     * maincategory
     *
     * @var \Rawk\RmMattigschauer\Domain\Model\Maincategory
     */
    protected $maincategory = null;

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
}
