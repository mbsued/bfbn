<?php

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') || die('Access denied.');

if(!class_exists('\Mpdf\Mpdf')){
    $composerAutoloadFile = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('bfbn')
        . 'Resources/Private/PHP/autoload.php';

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
		// wizards
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
			'mod {
				wizards.newContentElement.wizardItems.bfbn {
					header = BFBN
					after = common
					elements {
						institutionlist {
							iconIdentifier = bfbnsvgicon
							title = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_institution_list.name
							description = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_institution_list.description
							tt_content_defValues {
								CType = bfbn_institutionlist
							}
						}
						institutiondetail {
							iconIdentifier = bfbnsvgicon
							title = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_institution_detail.name
							description = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_institution_detail.description
							tt_content_defValues {
								CType = bfbn_institutiondetail
							}
						}						
						institutionabfrage {
							iconIdentifier = bfbnsvgicon
							title = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_institution_abfragelist.name
							description = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_institution_abfragelist.description
							tt_content_defValues {
								CType = bfbn_institutionabfrage
							}
						}						
						institutionedit {
							iconIdentifier = bfbnsvgicon
							title = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_institution_edit.name
							description = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_institution_edit.description
							tt_content_defValues {
								CType = bfbn_institutionedit
							}
						}
						personlist {
							iconIdentifier = bfbnsvgicon
							title = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_person_list.name
							description = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_person_list.description
							tt_content_defValues {
								CType = bfbn_personlist
							}
						}
						personsearch {
							iconIdentifier = bfbnsvgicon
							title = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_person_search.name
							description = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_person_search.description
							tt_content_defValues {
								CType = bfbn_personsearch
							}
						}						
						institutionsearch {
							iconIdentifier = bfbnsvgicon
							title = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_institution_search.name
							description = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_institution_search.description
							tt_content_defValues {
								CType = bfbn_institutionsearch
							}
						}
						ergaenzungspruefunglist {
							iconIdentifier = bfbnsvgicon
							title = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_ergprf_list.name
							description = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_ergprf_list.description
							tt_content_defValues {
								CType = bfbn_ergaenzungspruefunglist
							}
						}
						schulfremdeprueferlist {
							iconIdentifier = bfbnsvgicon
							title = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_schulfremd_list.name
							description = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_schulfremd_list.description
							tt_content_defValues {
								CType = bfbn_schulfremdeprueferlist
							}
						}
						aufgabenauswahllist {
							iconIdentifier = bfbnsvgicon
							title = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_aufgabenauswahl_list.name
							description = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_aufgabenauswahl_list.description
							tt_content_defValues {
								CType = bfbn_aufgabenauswahllist
							}
						}
						unfallstatistiklist {
							iconIdentifier = bfbnsvgicon
							title = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_unfallstatistik_list.name
							description = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_unfallstatistik_list.description
							tt_content_defValues {
								CType = bfbn_unfallstatistiklist
							}
						}
						meldunglist {
							iconIdentifier = bfbnsvgicon
							title = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_meldung_list.name
							description = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_meldung_list.description
							tt_content_defValues {
								CType = bfbn_meldunglist
							}
						}
						fortbildunglist {
							iconIdentifier = bfbnsvgicon
							title = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_fortbildung_list.name
							description = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_fortbildung_list.description
							tt_content_defValues {
								CType = bfbn_fortbildunglist
							}
						}
						fortbildungfma {
							iconIdentifier = bfbnsvgicon
							title = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_fortbildung_fma.name
							description = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_fortbildung_fma.description
							tt_content_defValues {
								CType = bfbn_fortbildungfma
							}
						}						
						eliteprueferlist {
							iconIdentifier = bfbnsvgicon
							title = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_elitepruefer_list.name
							description = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_elitepruefer_list.description
							tt_content_defValues {
								CType = bfbn_eliteprueferlist
							}
						}
						nachterminlist {
							iconIdentifier = bfbnsvgicon
							title = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_nachtermin_list.name
							description = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_nachtermin_list.description
							tt_content_defValues {
								CType = bfbn_nachterminlist
							}
						}
						nachterminstatus {
							iconIdentifier = bfbnsvgicon
							title = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_nachtermin_status.name
							description = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_nachtermin_status.description
							tt_content_defValues {
								CType = bfbn_nachterminstatus
							}
						}
						bfbn_fma_header {
							iconIdentifier = bfbnsvgicon
							title = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:bfbn_fma_header.name
							description = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:bfbn_fma_header.description
							tt_content_defValues {
								CType = bfbn_fma_header
							}
						}
						bfbn_smv_header {
							iconIdentifier = bfbnsvgicon
							title = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:bfbn_smv_header.name
							description = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:bfbn_smv_header.description
							tt_content_defValues {
								CType = bfbn_smv_header
							}
						}
						bfbn_fma_uebersicht {
							iconIdentifier = bfbnsvgicon
							title = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:bfbn_fma_uebersicht.name
							description = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:bfbn_fma_uebersicht.description
							tt_content_defValues {
								CType = bfbn_fma_uebersicht
							}
						}
						bfbn_ueberschrift_jumbotron {
							iconIdentifier = content-text
							title = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:bfbn_ueberschrift_jumbotron.name
							description = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:bfbn_ueberschrift_jumbotron.description
							tt_content_defValues {
								CType = bfbn_ueberschrift_jumbotron
							}
						}
						bfbn_faecher_uebersicht {
							iconIdentifier = bfbnsvgicon
							title = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:bfbn_faecher_uebersicht.name
							description = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:bfbn_faecher_uebersicht.description
							tt_content_defValues {
								CType = bfbn_faecher_uebersicht
							}
						}
						bfbn_nav_mb {
							iconIdentifier = bfbnsvgicon
							title = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:bfbn_nav_mb.name
							description = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:bfbn_nav_mb.description
							tt_content_defValues {
								CType = bfbn_nav_mb
							}
						}						
					}
					show = *
				}
		   }'
		);		
    }
);

$boot = function () {

    $GLOBALS['TYPO3_CONF_VARS']['FE']['eID_include']['bfbn'] = \MbFosbos\Bfbn\Ajax\PdfResponse::class . '::processRequest';
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/form']['afterBuildingFinished'][1676311200] = \MbFosbos\Bfbn\Utility\FormHook::class;
	$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['bfbn'] = 'EXT:bfbn/Configuration/RTE/Default.yaml';	
};

$boot();
unset($boot);

