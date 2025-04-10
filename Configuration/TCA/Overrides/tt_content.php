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

/**
 * Include Flexforms
 */
ExtensionManagementUtility::addPiFlexFormValue(
    '*',
    'FILE:EXT:bfbn/Configuration/FlexForms/ContentElements/bfbn_fma_header.xml',
    'bfbn_fma_header'
);


ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_mod.xlf:bfbn_fma_header.title',
        'value' => 'bfbn_fma_header',
        'icon' => 'mimetypes-x-content-table',
    ],
);

$GLOBALS['TCA']['tt_content']['types']['bfbn_fma_header'] = [
    'showitem' => '
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
            --palette--;;general,
            --palette--;;headers,
            pages,
            recursive,
			pi_flexform,
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
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,'
];

/**
 * Include Flexforms
 */
ExtensionManagementUtility::addPiFlexFormValue(
    '*',
    'FILE:EXT:bfbn/Configuration/FlexForms/ContentElements/bfbn_smv_header.xml',
    'bfbn_smv_header'
);

ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_mod.xlf:bfbn_smv_header.title',
        'value' => 'bfbn_smv_header',
        'icon' => 'mimetypes-x-content-table',
    ],
);

$GLOBALS['TCA']['tt_content']['types']['bfbn_smv_header'] = [
    'showitem' => '
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
            --palette--;;general,
            --palette--;;headers,
            pages,
            recursive,
			pi_flexform,
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
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,'
];

/**
 * Include Flexforms
 */
ExtensionManagementUtility::addPiFlexFormValue(
    '*',
    'FILE:EXT:bfbn/Configuration/FlexForms/ContentElements/bfbn_fma_uebersicht.xml',
    'bfbn_fma_uebersicht'
);

ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_mod.xlf:bfbn_fma_uebersicht.title',
        'value' => 'bfbn_fma_uebersicht',
        'icon' => 'mimetypes-x-content-table',
    ],
);

$GLOBALS['TCA']['tt_content']['types']['bfbn_fma_uebersicht'] = [
    'showitem' => '
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
            --palette--;;general,
            --palette--;;headers,
            pages,
            recursive,
			pi_flexform,
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
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,'
];

ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_mod.xlf:bfbn_ueberschrift_jumbotron.title',
        'value' => 'bfbn_ueberschrift_jumbotron',
        'icon' => 'mimetypes-x-content-table',
    ],
);

$GLOBALS['TCA']['tt_content']['types']['bfbn_ueberschrift_jumbotron'] = [
    'showitem' => '
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
            --palette--;;general,
            --palette--;;headers,
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
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,'
];

/**
 * Include Flexforms
 */
ExtensionManagementUtility::addPiFlexFormValue(
    '*',
    'FILE:EXT:bfbn/Configuration/FlexForms/ContentElements/bfbn_faecher_uebersicht.xml',
    'bfbn_faecher_uebersicht'
);

ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_mod.xlf:bfbn_faecher_uebersicht.title',
        'value' => 'bfbn_faecher_uebersicht',
        'icon' => 'mimetypes-x-content-table',
    ],
);

$GLOBALS['TCA']['tt_content']['types']['bfbn_faecher_uebersicht'] = [
    'showitem' => '
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
            --palette--;;general,
            --palette--;;headers,
            pages,
			pi_flexform,
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
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,'
];

ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_mod.xlf:bfbn_nav_mb.title',
        'value' => 'bfbn_nav_mb',
        'icon' => 'mimetypes-x-content-table',
    ],
);

$GLOBALS['TCA']['tt_content']['types']['bfbn_nav_mb'] = [
    'showitem' => '
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
            --palette--;;general,
            --palette--;;headers,
            pages,
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
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,'
];

ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_mod.xlf:bfbn_abfrage_uebersicht.title',
        'value' => 'bfbn_abfrage_uebersicht',
        'icon' => 'mimetypes-x-content-table',
    ],
);

$GLOBALS['TCA']['tt_content']['types']['bfbn_abfrage_uebersicht'] = [
    'showitem' => '
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
            --palette--;;general,
            --palette--;;headers,
            pages,
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
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,'
];

ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_mod.xlf:bfbn_zitat_text.title',
        'value' => 'bfbn_zitat_text',
        'icon' => 'mimetypes-x-content-table',
    ],
);

$GLOBALS['TCA']['tt_content']['types']['bfbn_zitat_text'] = [
    'showitem' => '
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
            --palette--;;general,
            --palette--;;headers,
			bodytext,
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
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,',
	'columnsOverrides' => [
        'bodytext' => [
            'config' => [
                'enableRichtext' => true,
                'richtextConfiguration' => 'bfbn',
            ],
        ],
    ],		
];