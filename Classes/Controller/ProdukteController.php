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
		
        $getCat = $this->settings['category'];
        $pageUid = (int)$this->settings['detailPid'];
        
        $limit = 5;
	$page = 0;
                
        /* new Categories */

        $sub1Categories = $this->subcategory1Repository->findByMaincategoryUID($getCat);
        $this->view->assign('sub1Categories', $sub1Categories);
		
        $sub2Categories = $this->subcategory2Repository->findByMaincategoryUID($getCat);
        $this->view->assign('sub2Categories', $sub2Categories);

        $all = $this->produkteRepository->findByCatUids($getCat);
	
        $produkte = $this->produkteRepository->findByCatUids($getCat, $limit);
        
        $nprodukte = count($all);
        $nperpage = intval(ceil($nprodukte / $limit));
	
        $this->view->assign('counter', $counter);
        $this->view->assign('elements', $nprodukte);
	$this->view->assign('pages',$nperpage);
        $this->view->assign('page',$page);
        $this->view->assign('getCat', $getCat);
        $this->view->assign('limit', $limit);
        $this->view->assign('pageUid', $pageUid);
        $this->view->assign('produkte', $produkte);
    }
    
     /**
     * action ajax
     *
     * @return void
     */
    public function ajaxAction()
    {

        $parameters = $this->request->getArguments();

        //if(isset($parameters['product'])){

            $cat00 = (int)$parameters['cat00'];
            $cat01 = (int)$parameters['cat01'];
            $cat02 = (int)$parameters['cat02'];
            $number = (int)$parameters['number'];
            $limit = (int)$parameters['limit'];

           if(($cat01 != null && $cat01 != 'Alle') || ($cat02 != null && $cat02 != 'Alle')){
                $produkt = $this->produkteRepository->findLimited($cat00, $cat01, $cat02, $number, $limit);
		   
		$all = $this->produkteRepository->findLimited($cat00, $cat01, $cat02);
		$nprodukte = count($all);			
		// round up and make integer
		$nperpage = intval(ceil($nprodukte / $limit));
            
	   }else{
                $produkt = $this->produkteRepository->findByCatUids($cat00, $limit, $number);
		
		$all = $this->produkteRepository->findByCatUids($cat00);
		$nprodukte = count($all);			
		// round up and make integer
		$nperpage = intval(ceil($nprodukte / $limit));
		   
            }

            //$x = count($produkt);
            //$y = "Seite: ".$number." - Anzahl pro Seite: ".$limit." - Seitenanzahl: "." - ";

            //$counter = "Anzahl: ".$nprodukte." von ".$nall." - Seite: 1 von ".$nperpage;

            if(!$produkt){
                return "keine Produkte";
            }else{
				
		if($nperpage==0)
			$nperpage = 1;    

                //$this->view->assign('x', $x);
                //$this->view->assign('y', $y);
                $this->view->assign('parameters', $parameters);
                $this->view->assign('produkte', $produkt);
		$this->view->assign('elements', $nprodukte);
		$this->view->assign('pages',$nperpage);
		$this->view->assign('page',$number+1);

            }

        //}else{
            //echo "empty";	
        //}
		
    }
    
    
    public function indexlistAction()
    {
   	
        $getCat = $this->settings['category'];
        $pageUid = (int)$this->settings['detailPid'];
		
        #$sub1Categories = $this->subcategory1Repository->findAll();
        $sub1Categories = $this->subcategory1Repository->findByMaincategoryUID($getCat);
        $this->view->assign('sub1Categories', $sub1Categories);
		
        #$sub2Categories = $this->subcategory2Repository->findAll();
        $sub2Categories = $this->subcategory2Repository->findByMaincategoryUID($getCat);
        $this->view->assign('sub2Categories', $sub2Categories);

        $produkte = $this->produkteRepository->findByCatUids($getCat);
        
        $this->view->assign('pageUid', $pageUid);
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

        $produkt = $this->produkteRepository->findByUid($param);

        if(!$produkt){
            return "keine Produkte";
        }else{

            $this->objectManager->get(\TYPO3\CMS\Core\Page\PageRenderer::class)->setTitle($produkt->getTitle());
            // For the search
            $GLOBALS['TSFE']->indexedDocTitle = $produkt->getTitle();

            #$produkt = $this->produktRepository->findById($this->request->getArgument('produktkate'));
            $this->view->assign('produkte', $produkt);

        }
    }
}
