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
    public function findByCatUids($uids, $limit = null, $number = null) {
        $uidArray = explode(",", $uids);
        $query = $this->createQuery();
        
	if($number)
                $query->setOffset($limit*$number);
		
        if($limit)
            $query->setLimit($limit);
        
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
    
     /**
     * Find limited events
     *
     * @return array
     */
    public function findLimited($param = null, $xID = null, $cat00 = null, $cat01 = null, $cat02 = null, $number = null, $limit = null)
    {
		
        $uidCat00 = explode(",", $cat00);
        $uidCat01 = explode(",", $cat01);
        $uidCat02 = explode(",", $cat02);

        $query = $this->createQuery();
        //$query->execute();

        if($number)
                $query->setOffset($limit*$number);

        if($limit)
                $query->setLimit($limit);

        foreach ($uidCat00 as $key => $value) {
                $constraints00[] =  $query->equals('maincategory', $value);
        }	

        if($cat01 != null || $cat01 != ''){
                foreach ($uidCat01 as $key => $value) {
                        $constraints01[] =  $query->equals('subcategory1', $value);
                }
        }

        if($cat02 != null || $cat02 != ''){
                foreach ($uidCat02 as $key => $value) {
                        $constraints01[] =  $query->equals('subcategory2', $value);
                }
        }

        $query->matching(
                $query->logicalAnd(
                        $query->logicalOr(
                                $constraints00
                        ),
                        $query->logicalAnd(
                                $constraints01
                        ),
                        $query->equals('hidden', 0),
                        $query->equals('deleted', 0)
                )
        );

        return $query->execute();
		
    }
    
}
