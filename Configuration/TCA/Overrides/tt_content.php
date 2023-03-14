<?php
defined('TYPO3_MODE') or die();
/***************
 * Plugins
 */
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Bfbn',
	'InstitutionList',
	'Liste der Institutionen',
	'bfbnsvgicon'
);
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['bfbn_institutionlist'] = 'layout,recursive,select_key,pages';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['bfbn_institutionlist'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
	'bfbn_institutionlist', 
	'FILE:EXT:' . 'bfbn' . '/Configuration/FlexForms/flexform_list.xml'	
);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Bfbn',
	'InstitutionDetail',
	'Detailansicht der Institutionen',
	'bfbnsvgicon'
);
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['bfbn_institutiondetail'] = 'layout,recursive,select_key,pages';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['bfbn_institutiondetail'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
	'bfbn_institutiondetail', 
	'FILE:EXT:' . 'bfbn' . '/Configuration/FlexForms/flexform_detail.xml'	
);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Bfbn',
	'InstitutionEdit',
	'Editansicht der Institutionen',
	'bfbnsvgicon'
);
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['bfbn_institutionedit'] = 'layout,recursive,select_key,pages';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['bfbn_institutionedit'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
	'bfbn_institutionedit', 
	'FILE:EXT:' . 'bfbn' . '/Configuration/FlexForms/flexform_showedit.xml'	
);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Bfbn',
	'InstitutionSearch',
	'Suche nach Institutionen',
	'bfbnsvgicon'
);
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['bfbn_institutionsearch'] = 'layout,recursive,select_key,pages';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['bfbn_institutionsearch'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
	'bfbn_institutionsearch', 
	'FILE:EXT:' . 'bfbn' . '/Configuration/FlexForms/flexform_search.xml'	
);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Bfbn',
	'ErgaenzungspruefungList',
	'Ergaenzungspruefung',
	'bfbnsvgicon'
);
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['bfbn_ergaenzungspruefunglist'] = 'layout,recursive,select_key,pages';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['bfbn_ergaenzungspruefunglist'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
	'bfbn_ergaenzungspruefunglist', 
	'FILE:EXT:' . 'bfbn' . '/Configuration/FlexForms/flexform_erglist.xml'	
);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Bfbn',
	'SchulfremdeprueferList',
	'Schulfremdepruefer',
	'bfbnsvgicon'
);
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['bfbn_schulfremdeprueferlist'] = 'layout,recursive,select_key,pages';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['bfbn_schulfremdeprueferlist'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
	'bfbn_schulfremdeprueferlist', 
	'FILE:EXT:' . 'bfbn' . '/Configuration/FlexForms/flexform_schulfremdlist.xml'	
);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Bfbn',
	'AufgabenauswahlList',
	'Aufgabenauswahl',
	'bfbnsvgicon'
);
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['bfbn_aufgabenauswahllist'] = 'layout,recursive,select_key,pages';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['bfbn_aufgabenauswahllist'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
	'bfbn_aufgabenauswahllist', 
	'FILE:EXT:' . 'bfbn' . '/Configuration/FlexForms/flexform_aufgauswlist.xml'	
);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Bfbn',
	'MeldungList',
	'Meldung',
	'bfbnsvgicon'
);
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['bfbn_meldunglist'] = 'layout,recursive,select_key,pages';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['bfbn_meldunglist'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
	'bfbn_meldunglist', 
	'FILE:EXT:' . 'bfbn' . '/Configuration/FlexForms/flexform_meldunglist.xml'
	
);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Bfbn',
	'NeubestellungList',
	'Neubestellung',
	'bfbnsvgicon'
);
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['bfbn_neubestellunglist'] = 'layout,recursive,select_key,pages';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['bfbn_neubestellunglist'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
	'bfbn_neubestellunglist', 
	'FILE:EXT:' . 'bfbn' . '/Configuration/FlexForms/flexform_neubestellunglist.xml'
);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Bfbn',
	'UnfallstatistikList',
	'Unfallstatistik',
	'bfbnsvgicon'
);
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['bfbn_unfallstatistiklist'] = 'layout,recursive,select_key,pages';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['bfbn_unfallstatistiklist'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
	'bfbn_unfallstatistiklist', 
	'FILE:EXT:' . 'bfbn' . '/Configuration/FlexForms/flexform_unfallstatistiklist.xml'
);