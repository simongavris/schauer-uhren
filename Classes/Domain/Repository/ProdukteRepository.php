<?php
namespace Rawk\RmMattigschauer\Domain\Repository;

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
 * The repository for Produktes
 */
class ProdukteRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    /**
     * @var array
     */
    protected $defaultOrderings = [
        'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
    ];

    public function initializeObject()
    {

    }
	
	/**
	 * Find by multiple Cat-Uids using, seperated string. 
	 * 
	 * @param string String containing uids
	 * @return \Rawk\RmMattigschauer\Domain\Model\Produkte Matching model records
	 */
	public function findByCatUids($uids) {
		$uidArray = explode(",", $uids);
		$query = $this->createQuery();
		foreach ($uidArray as $key => $value) {
			$constraints[] =  $query->equals('maincategory', $value);
		}
		return $query->matching(
			$query->logicalAnd(
				$query->logicalOr(
					$constraints
				),
				$query->equals('hidden', 0),
				$query->equals('deleted', 0)
			)
		)->execute();
	}

    /**
     * Find all events (limited to a amount of years)
     *
     * @param int $years
     * @param bool $showStartedEvents
     * @param string $categories
     * @return array
     */
    public function findAllxy($categories = null)
    {

    }
}
