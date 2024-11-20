<?php

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') or die();
/***************
 * Plugins
 */
 
$plugins = ['InstitutionList', 'InstitutionAbfrage', 'InstitutionDetail', 'InstitutionEdit', 'InstitutionSearch', 'PersonList', 'PersonSearch','ErgaenzungspruefungList','SchulfremdeprueferList',
			'AufgabenauswahlList','MeldungList','UnfallstatistikList','FortbildungList','FortbildungFma','EliteprueferList','NachterminList','NachterminStatus']; 

foreach ($plugins as $plugin) {
    $CType = 'bfbn_' . strtolower($plugin);
    ExtensionUtility::registerPlugin(
        'Bfbn',
        $plugin,
        'LLL:EXT:bfbn/Resources/Private/Language/locallang_mod.xlf:' . $CType . '.title',
        'bfbnsvgicon',
        'bfbn'
    );	
}

// Configure FlexForm fields
$pluginFlexFormConfigs = [
    'bfbn_institutionlist' => 'FILE:EXT:bfbn/Configuration/FlexForms/flexform_list.xml',
    'bfbn_institutionabfrage' => 'FILE:EXT:bfbn/Configuration/FlexForms/flexform_instabfragelist.xml',
    'bfbn_institutiondetail' => 'FILE:EXT:bfbn/Configuration/FlexForms/flexform_detail.xml',
    'bfbn_institutionedit' => 'FILE:EXT:bfbn/Configuration/FlexForms/flexform_showedit.xml',
    'bfbn_institutionsearch' => 'FILE:EXT:bfbn/Configuration/FlexForms/flexform_search.xml',
	'bfbn_personlist' => 'FILE:EXT:bfbn/Configuration/FlexForms/flexform_personlist.xml',
	'bfbn_personsearch' => 'FILE:EXT:bfbn/Configuration/FlexForms/flexform_personsearch.xml',
	'bfbn_ergaenzungspruefunglist' => 'FILE:EXT:bfbn/Configuration/FlexForms/flexform_erglist.xml',
	'bfbn_schulfremdeprueferlist' => 'FILE:EXT:bfbn/Configuration/FlexForms/flexform_schulfremdlist.xml',
	'bfbn_aufgabenauswahllist' => 'FILE:EXT:bfbn/Configuration/FlexForms/flexform_aufgauswlist.xml',
	'bfbn_meldunglist' => 'FILE:EXT:bfbn/Configuration/FlexForms/flexform_meldunglist.xml',
	'bfbn_unfallstatistiklist' => 'FILE:EXT:bfbn/Configuration/FlexForms/flexform_unfallstatistiklist.xml',
	'bfbn_fortbildunglist' => 'FILE:EXT:bfbn/Configuration/FlexForms/flexform_fortbildunglist.xml',
	'bfbn_fortbildungfma' => 'FILE:EXT:bfbn/Configuration/FlexForms/flexform_fortbildungfma.xml',
	'bfbn_eliteprueferlist' => 'FILE:EXT:bfbn/Configuration/FlexForms/flexform_eliteprueferlist.xml',
	'bfbn_nachterminlist' => 'FILE:EXT:bfbn/Configuration/FlexForms/flexform_nachterminlist.xml',
	'bfbn_nachterminstatus' => 'FILE:EXT:bfbn/Configuration/FlexForms/flexform_nachterminstatus.xml',	
];
foreach ($pluginFlexFormConfigs as $pluginName => $flexFormFile) {
    ExtensionManagementUtility::addPiFlexFormValue('*', $flexFormFile, $pluginName);
    $GLOBALS['TCA']['tt_content']['types'][$pluginName]['showitem'] = '
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
            --palette--;;general,
            --palette--;;headers,
        --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.plugin,
            pi_flexform,
            pages, recursive,
        --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
            --palette--;;frames,
            --palette--;;appearanceLinks,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
            --palette--;;language,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
            --palette--;;hidden,
            --palette--;;access,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
            categories,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
            rowDescription,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,
    ';
}