<?php

namespace Rawk\RmMattigschauer\Controller;

/**
 * AjaxController
 */
class AjaxController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
  
    /**
     * produkteRepository
     *
     * @var \Rawk\RmMattigschauer\Domain\Repository\ProdukteRepository
     * @inject
     */
    protected $ProdukteRepository = NULL;
  
    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
		
		return "List";
        #$optionRecords = $this->optionRecordRepository->findAll();
        #$this->view->assign('optionRecords', $optionRecords);
    }
  
    /**
     * action ajax
     *
     * @param \Sebkln\Ajaxselectlist\Domain\Model\OptionRecord $optionRecord
     * @return void
     */
    public function ajaxAction()
    {
		
		return "AJAX";
        #$this->view->assign('optionRecord', $optionRecord);
    }
}