<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Rawk.RmMattigschauer',
            'Msproducts',
            'Mattig Schauer Produkte'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('rm_mattigschauer', 'Configuration/TypoScript', 'Mattig Schauer Produkte');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_rmmattigschauer_domain_model_produkte', 'EXT:rm_mattigschauer/Resources/Private/Language/locallang_csh_tx_rmmattigschauer_domain_model_produkte.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_rmmattigschauer_domain_model_produkte');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_rmmattigschauer_domain_model_maincategory', 'EXT:rm_mattigschauer/Resources/Private/Language/locallang_csh_tx_rmmattigschauer_domain_model_maincategory.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_rmmattigschauer_domain_model_maincategory');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_rmmattigschauer_domain_model_subcategory1', 'EXT:rm_mattigschauer/Resources/Private/Language/locallang_csh_tx_rmmattigschauer_domain_model_subcategory1.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_rmmattigschauer_domain_model_subcategory1');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_rmmattigschauer_domain_model_subcategory2', 'EXT:rm_mattigschauer/Resources/Private/Language/locallang_csh_tx_rmmattigschauer_domain_model_subcategory2.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_rmmattigschauer_domain_model_subcategory2');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
            'rm_mattigschauer',
            'tx_rmmattigschauer_domain_model_produkte'
        );

    }
);
