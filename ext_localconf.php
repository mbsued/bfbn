<?php

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') || die('Access denied.');

if(!class_exists('\Mpdf\Mpdf')){
    $composerAutoloadFile = ExtensionManagementUtility::extPath('bfbn').'Resources/Private/PHP/autoload.php';
    require_once($composerAutoloadFile);
}

call_user_func(
    function()
    {
        ExtensionUtility::configurePlugin(
            'Bfbn',
            'InstitutionList',
			[\MbFosbos\Bfbn\Controller\InstitutionController::class => 'list,show'],
			[\MbFosbos\Bfbn\Controller\InstitutionController::class => 'list,show'],
			ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
        );
        ExtensionUtility::configurePlugin(
            'Bfbn',
            'InstitutionDetail',
			[\MbFosbos\Bfbn\Controller\InstitutionController::class => 'show'],
			[\MbFosbos\Bfbn\Controller\InstitutionController::class => 'show'],
			ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
        );
        ExtensionUtility::configurePlugin(
            'Bfbn',
            'InstitutionAbfrage',
			[\MbFosbos\Bfbn\Controller\InstitutionController::class => 'listForAbfrage'],
			[\MbFosbos\Bfbn\Controller\InstitutionController::class => 'listForAbfrage'],
			ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
        );		
        ExtensionUtility::configurePlugin(
            'Bfbn',
            'InstitutionEdit',
			[\MbFosbos\Bfbn\Controller\InstitutionController::class => 'showforedit,edit,update', \MbFosbos\Bfbn\Controller\PersonController::class => 'new,create,delete'],
			[\MbFosbos\Bfbn\Controller\InstitutionController::class => 'showforedit,edit,update', \MbFosbos\Bfbn\Controller\PersonController::class => 'new,create,delete'],
			ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
        );
        ExtensionUtility::configurePlugin(
            'Bfbn',
            'PersonList',
			[\MbFosbos\Bfbn\Controller\PersonController::class => 'list,show,edit,update,newft,createft,deleteft'],
			[\MbFosbos\Bfbn\Controller\PersonController::class => 'list,show,edit,update,newft,createft,deleteft'],
			ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
        );
        ExtensionUtility::configurePlugin(
            'Bfbn',
            'PersonSearch',
			[\MbFosbos\Bfbn\Controller\PersonController::class => 'searchform,search,searchshow,export'],
			[\MbFosbos\Bfbn\Controller\PersonController::class => 'searchform,search'],
			ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
        );		
		ExtensionUtility::configurePlugin(
            'Bfbn',
            'InstitutionSearch',
			[\MbFosbos\Bfbn\Controller\InstitutionController::class => 'searchform,search,searchshow'],
			[\MbFosbos\Bfbn\Controller\InstitutionController::class => 'searchform,search'],
			ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
        );
        ExtensionUtility::configurePlugin(
            'Bfbn',
            'ErgaenzungspruefungList',
			[\MbFosbos\Bfbn\Controller\ErgaenzungspruefungController::class => 'list,show,edit,update,new,create,delete'],
			[\MbFosbos\Bfbn\Controller\ErgaenzungspruefungController::class => 'list,show,edit,update,new,create,delete'],
			ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
        );
        ExtensionUtility::configurePlugin(
            'Bfbn',
            'SchulfremdeprueferList',
			[\MbFosbos\Bfbn\Controller\SchulfremdeprueferController::class => 'list,show,edit,update,new,create,delete'],
			[\MbFosbos\Bfbn\Controller\SchulfremdeprueferController::class => 'list,show,edit,update,new,create,delete'],
			ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
        );
        ExtensionUtility::configurePlugin(
            'Bfbn',
            'AufgabenauswahlList',
			[\MbFosbos\Bfbn\Controller\AufgabenauswahlController::class => 'list,show,edit,update,new,create,delete'],
			[\MbFosbos\Bfbn\Controller\AufgabenauswahlController::class => 'list,show,edit,update,new,create,delete'],
			ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
        );
        ExtensionUtility::configurePlugin(
            'Bfbn',
            'MeldungList',
			[\MbFosbos\Bfbn\Controller\MeldungController::class => 'list,show,perform'],
			[\MbFosbos\Bfbn\Controller\MeldungController::class => 'list,show,perform'],
			ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
        );
        ExtensionUtility::configurePlugin(
            'Bfbn',
            'UnfallstatistikList',
			[\MbFosbos\Bfbn\Controller\UnfallstatistikController::class => 'list,show,edit,update,new,create,delete'],
			[\MbFosbos\Bfbn\Controller\UnfallstatistikController::class => 'list,show,edit,update,new,create,delete'],
			ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
        );
        ExtensionUtility::configurePlugin(
            'Bfbn',
            'FortbildungList',
			[\MbFosbos\Bfbn\Controller\FortbildungController::class => 'list,show,edit,update,new,create,delete'],
			[\MbFosbos\Bfbn\Controller\FortbildungController::class => 'list,show,edit,update,new,create,delete'],
			ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
        );
        ExtensionUtility::configurePlugin(
            'Bfbn',
            'FortbildungFma',
			[\MbFosbos\Bfbn\Controller\FortbildungController::class => 'listfma,showfma,export'],
			[\MbFosbos\Bfbn\Controller\FortbildungController::class => 'listfma,showfma,export'],
			ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
        );		
        ExtensionUtility::configurePlugin(
            'Bfbn',
            'EliteprueferList',
			[\MbFosbos\Bfbn\Controller\EliteprueferController::class => 'list,show,edit,update,new,create,delete'],
			[\MbFosbos\Bfbn\Controller\EliteprueferController::class => 'list,show,edit,update,new,create,delete'],
			ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
        );
        ExtensionUtility::configurePlugin(
            'Bfbn',
            'NachterminList',
			[\MbFosbos\Bfbn\Controller\NachterminController::class => 'list,statusfehlanzeige,show,edit,update,new,create,delete'],
			[\MbFosbos\Bfbn\Controller\NachterminController::class => 'list,statusfehlanzeige,show,edit,update,new,create,delete'],
			ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
        );
        ExtensionUtility::configurePlugin(
            'Bfbn',
            'NachterminStatus',
			[\MbFosbos\Bfbn\Controller\NachterminStatusController::class => 'liststatus'],
			[\MbFosbos\Bfbn\Controller\NachterminStatusController::class => 'liststatus'],
			ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
        );		
    }
);

$boot = function () {

    $GLOBALS['TYPO3_CONF_VARS']['FE']['eID_include']['bfbn'] = \MbFosbos\Bfbn\Ajax\PdfResponse::class . '::processRequest';
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/form']['afterBuildingFinished'][1676311200] = \MbFosbos\Bfbn\Utility\FormHook::class;
	$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['bfbn'] = 'EXT:bfbn/Configuration/RTE/Default.yaml';

	/***************
     * Extension configuration
     */
    $extconf = GeneralUtility::makeInstance(ExtensionConfiguration::class)->get('bfbn');
	
	// kartenApi
    if (array_key_exists('kartenApi', $extconf) && !empty($extconf['kartenApi'])) {
        ExtensionManagementUtility::addTypoScriptConstants('plugin.tx_bfbn.apikey = ' . $extconf['kartenApi']);
	} 
};

$boot();
unset($boot);

