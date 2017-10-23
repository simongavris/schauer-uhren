<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Rawk.RmMattigschauer',
            'Msproducts',
            [
                'Produkte' => 'list, show'
            ],
            // non-cacheable actions
            [
                'Produkte' => 'list, show'
            ]
        );
		
		
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Rawk.RmMattigschauer',
            'ajaxfunc',
            [
                'Ajax' => 'list'
            ],
            // non-cacheable actions
            [
                'Ajax' => 'list'
            ]
        );
		

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    msproducts {
                        icon = ' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('rm_mattigschauer') . 'Resources/Public/Icons/user_plugin_msproducts.svg
                        title = LLL:EXT:rm_mattigschauer/Resources/Private/Language/locallang_db.xlf:tx_rm_mattigschauer_domain_model_msproducts
                        description = LLL:EXT:rm_mattigschauer/Resources/Private/Language/locallang_db.xlf:tx_rm_mattigschauer_domain_model_msproducts.description
                        tt_content_defValues {
                            CType = list
                            list_type = rmmattigschauer_msproducts
                        }
                    }
                }
                show = *
            }
       }'
    );
    }
);
