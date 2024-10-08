<?php
defined('TYPO3') or die();
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
	'InstitutionAbfrage',
	'Abfrageliste der Institutionen',
	'bfbnsvgicon'
);
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['bfbn_institutionabfrage'] = 'layout,recursive,select_key,pages';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['bfbn_institutionabfrage'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
	'bfbn_institutionabfrage', 
	'FILE:EXT:' . 'bfbn' . '/Configuration/FlexForms/flexform_instabfragelist.xml'	
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
	'PersonList',
	'Listansicht der Personen einer Institution',
	'bfbnsvgicon'
);
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['bfbn_personlist'] = 'layout,recursive,select_key,pages';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['bfbn_personlist'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
	'bfbn_personlist', 
	'FILE:EXT:' . 'bfbn' . '/Configuration/FlexForms/flexform_personlist.xml'	
);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Bfbn',
	'PersonSearch',
	'Suchansicht der Personen einer Institution',
	'bfbnsvgicon'
);
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['bfbn_personsearch'] = 'layout,recursive,select_key,pages';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['bfbn_personsearch'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
	'bfbn_personsearch', 
	'FILE:EXT:' . 'bfbn' . '/Configuration/FlexForms/flexform_personsearch.xml'	
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
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Bfbn',
	'FortbildungList',
	'Fortbildung',
	'bfbnsvgicon'
);
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['bfbn_fortbildunglist'] = 'layout,recursive,select_key,pages';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['bfbn_fortbildunglist'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
	'bfbn_fortbildunglist', 
	'FILE:EXT:' . 'bfbn' . '/Configuration/FlexForms/flexform_fortbildunglist.xml'
);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Bfbn',
	'FortbildungFMA',
	'Fortbildung FMA',
	'bfbnsvgicon'
);
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['bfbn_fortbildungfma'] = 'layout,recursive,select_key,pages';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['bfbn_fortbildungfma'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
	'bfbn_fortbildungfma', 
	'FILE:EXT:' . 'bfbn' . '/Configuration/FlexForms/flexform_fortbildungfma.xml'
);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Bfbn',
	'EliteprueferList',
	'Elitepruefer',
	'bfbnsvgicon'
);
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['bfbn_eliteprueferlist'] = 'layout,recursive,select_key,pages';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['bfbn_eliteprueferlist'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
	'bfbn_eliteprueferlist', 
	'FILE:EXT:' . 'bfbn' . '/Configuration/FlexForms/flexform_eliteprueferlist.xml'	
);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Bfbn',
	'NachterminList',
	'Nachtermin',
	'bfbnsvgicon'
);
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['bfbn_nachterminlist'] = 'layout,recursive,select_key,pages';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['bfbn_nachterminlist'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
	'bfbn_nachterminlist', 
	'FILE:EXT:' . 'bfbn' . '/Configuration/FlexForms/flexform_nachterminlist.xml'	
);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Bfbn',
	'NachterminStatus',
	'Nachtermin Status',
	'bfbnsvgicon'
);
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['bfbn_nachterminstatus'] = 'layout,recursive,select_key,pages';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['bfbn_nachterminstatus'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
	'bfbn_nachterminstatus', 
	'FILE:EXT:' . 'bfbn' . '/Configuration/FlexForms/flexform_nachterminstatus.xml'	
);