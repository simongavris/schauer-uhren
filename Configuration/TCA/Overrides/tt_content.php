<?php
// Einbindung Flexform für Plugin Bloglisting der Extension Simpleblog
#$pluginSignature = 'rmgrafproducts_proben';

$extensionName = strtolower(\TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToUpperCamelCase($_EXTKEY));
 $pluginName = strtolower('Produkte');
 $pluginSignature = "rmmattigschauer_msproducts";//$extensionName.'_'.$pluginName;

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,select_key,pages,recursive';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
	$pluginSignature,
	'FILE:EXT:rm_mattigschauer/Configuration/FlexForms/flexform_produkte.xml'
);

