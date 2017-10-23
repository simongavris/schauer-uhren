<?php
namespace Rawk\RmMattigschauer\Controller;

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
 * ProdukteController
 */
class ProdukteController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * produkteRepository
     *
     * @var \Rawk\RmMattigschauer\Domain\Repository\ProdukteRepository
     * @inject
     */
    protected $produkteRepository = null;

    /**
     * @var \TYPO3\CMS\Extbase\Domain\Repository\CategoryRepository
     * @inject
     */
    protected $categoryRepository = NULL;
	
	
	 /**
	 *	maincategoryRepository
	 *
     * @var \Rawk\RmMattigschauer\Domain\Repository\MaincategoryRepository
     * @inject
     */
    protected $maincategoryRepository = NULL;
	
	 /**
	 *	subcategory1Repository
	 *
     * @var \Rawk\RmMattigschauer\Domain\Repository\Subcategory1Repository
     * @inject
     */
    protected $subcategory1Repository = NULL;
	
	 /**
	 *	subcategory2Repository
	 *
     * @var \Rawk\RmMattigschauer\Domain\Repository\Subcategory2Repository
     * @inject
     */
    protected $subcategory2Repository = NULL;
	

    public function initializeAction()
    {
        $querySettings = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Typo3QuerySettings');
        $querySettings->setRespectStoragePage(FALSE);
        #$querySettings->setIgnoreEnableFields(TRUE);
        #$querySettings->setIncludeDeleted(TRUE);
        $this->produkteRepository->setDefaultQuerySettings($querySettings);
        $this->maincategoryRepository->setDefaultQuerySettings($querySettings);
        $this->subcategory1Repository->setDefaultQuerySettings($querySettings);
        $this->subcategory2Repository->setDefaultQuerySettings($querySettings);
    }

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        #$allCategories = $this->categoryRepository->findAll();
        #$this->view->assign('allCategories', $allCategories);
		
		$getCat = $this->settings['category'];
        #print_r($this->settings['category']);
		
		
		/* new Categories */
		
		#$mainCategory = $this->maincategoryRepository->findAll();
        #$this->view->assign('mainCategory', $mainCategory);
		
		#$sub1Categories = $this->subcategory1Repository->findAll();
		$sub1Categories = $this->subcategory1Repository->findByMaincategoryUID($getCat);
        $this->view->assign('sub1Categories', $sub1Categories);
		
		#$sub2Categories = $this->subcategory2Repository->findAll();
		$sub2Categories = $this->subcategory2Repository->findByMaincategoryUID($getCat);
        $this->view->assign('sub2Categories', $sub2Categories);
		
		
		
		
        #$categoriesWithContacts = [];
        /** @var \TYPO3\CMS\Extbase\Domain\Model\Category $category */
        /*foreach($allCategories as $category) {
          $contactsInCategory= $this->produkteRepository->findByCategory($category);
          if($contactsInCategory->count()>0) {
          $categoriesWithContacts[] = [
          'category' => $category,
          'contacts' => $contactsInCategory
          ];
          }
          }
          $this->view->assignMultiple([
          'categoriesWithContacts' => $categoriesWithContacts
          ]);*/

        #$query->getQuerySettings()->setRespectStoragePage(false);
        #$data = $this->configurationManager->getContentObject()->data;
        #$storagePids = Array();
        #$storagePids = explode(',',$data['pages']);
        #print_r($data);

        #$produkte = $this->produkteRepository->findAll();
        #$produkte = $this->produkteRepository->findByMaincategory($getCat);
        $produkte = $this->produkteRepository->findByCatUids($getCat);
        $this->view->assign('produkte', $produkte);
    }
    
    public function indexlistAction()
    {
   	
        /*$getCat = $this->settings['category'];

        #$mainCategory = $this->maincategoryRepository->findAll();
        #$this->view->assign('mainCategory', $mainCategory);
		
        #$sub1Categories = $this->subcategory1Repository->findAll();
        $sub1Categories = $this->subcategory1Repository->findByMaincategoryUID($getCat);
        $this->view->assign('sub1Categories', $sub1Categories);
		
        #$sub2Categories = $this->subcategory2Repository->findAll();
        $sub2Categories = $this->subcategory2Repository->findByMaincategoryUID($getCat);
        $this->view->assign('sub2Categories', $sub2Categories);

        $produkte = $this->produkteRepository->findByCatUids($getCat);*/
        $this->view->assign('produkte', $produkte);
    }

    /**
     * action show
     *
     * @param \Rawk\RmMattigschauer\Domain\Model\Produkte $produkte
     * @return void
     */
    public function showAction(\Rawk\RmMattigschauer\Domain\Model\Produkte $produkte = null)
    {
        #$param = $this->request->getArgument('tx_rmmattigschauer_msproducts');
        $param = (int)$this->request->getArgument('produkt');

        #print_r($param);

        $produkt = $this->produkteRepository->findByUid($param);

        if(!$produkt){
       return "nix";
        }else{

        #$produkt = $this->produktRepository->findById($this->request->getArgument('produktkate'));
        $this->view->assign('produkte', $produkt);

        }
    }
}
