<?php
defined('TYPO3') || die('Access denied.');

if(!class_exists('\Mpdf\Mpdf')){
    $composerAutoloadFile = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('bfbn')
        . 'Resources/Private/PHP/autoload.php';

    require_once($composerAutoloadFile);
}

call_user_func(
    function()
    {
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Bfbn',
            'InstitutionList',
			[\MbFosbos\Bfbn\Controller\InstitutionController::class => 'list,show'],
			[\MbFosbos\Bfbn\Controller\InstitutionController::class => 'list,show']			
        );
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Bfbn',
            'InstitutionDetail',
			[\MbFosbos\Bfbn\Controller\InstitutionController::class => 'show'],
			[\MbFosbos\Bfbn\Controller\InstitutionController::class => 'show']			
        );
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Bfbn',
            'InstitutionEdit',
			[\MbFosbos\Bfbn\Controller\InstitutionController::class => 'showforedit,edit,update', \MbFosbos\Bfbn\Controller\PersonController::class => 'new,create,delete'],
			[\MbFosbos\Bfbn\Controller\InstitutionController::class => 'showforedit,edit,update', \MbFosbos\Bfbn\Controller\PersonController::class => 'new,create,delete']			
        );
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Bfbn',
            'PersonList',
			[\MbFosbos\Bfbn\Controller\PersonController::class => 'list,show,edit,update,newft,createft,deleteft'],
			[\MbFosbos\Bfbn\Controller\PersonController::class => 'list,show,edit,update,newft,createft,deleteft']			
        );
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Bfbn',
            'PersonSearch',
			[\MbFosbos\Bfbn\Controller\PersonController::class => 'searchform,search,searchshow,export'],
			[\MbFosbos\Bfbn\Controller\PersonController::class => 'searchform,search']			
        );		
		\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Bfbn',
            'InstitutionSearch',
			[\MbFosbos\Bfbn\Controller\InstitutionController::class => 'searchform,search,searchshow'],
			[\MbFosbos\Bfbn\Controller\InstitutionController::class => 'searchform,search']
        );
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Bfbn',
            'ErgaenzungspruefungList',
			[\MbFosbos\Bfbn\Controller\ErgaenzungspruefungController::class => 'list,show,edit,update,new,create,delete'],
			[\MbFosbos\Bfbn\Controller\ErgaenzungspruefungController::class => 'list,show,edit,update,new,create,delete']			
        );
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Bfbn',
            'SchulfremdeprueferList',
			[\MbFosbos\Bfbn\Controller\SchulfremdeprueferController::class => 'list,show,edit,update,new,create,delete'],
			[\MbFosbos\Bfbn\Controller\SchulfremdeprueferController::class => 'list,show,edit,update,new,create,delete']			
        );
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Bfbn',
            'AufgabenauswahlList',
			[\MbFosbos\Bfbn\Controller\AufgabenauswahlController::class => 'list,show,edit,update,new,create,delete'],
			[\MbFosbos\Bfbn\Controller\AufgabenauswahlController::class => 'list,show,edit,update,new,create,delete']			
        );
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Bfbn',
            'MeldungList',
			[\MbFosbos\Bfbn\Controller\MeldungController::class => 'list,show,perform'],
			[\MbFosbos\Bfbn\Controller\MeldungController::class => 'list,show,perform']			
        );
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Bfbn',
            'UnfallstatistikList',
			[\MbFosbos\Bfbn\Controller\UnfallstatistikController::class => 'list,show,edit,update,new,create,delete'],
			[\MbFosbos\Bfbn\Controller\UnfallstatistikController::class => 'list,show,edit,update,new,create,delete']			
        );
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Bfbn',
            'FortbildungList',
			[\MbFosbos\Bfbn\Controller\FortbildungController::class => 'list,show,edit,update,new,create,delete'],
			[\MbFosbos\Bfbn\Controller\FortbildungController::class => 'list,show,edit,update,new,create,delete']			
        );		
		// wizards
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
			'mod {
				wizards.newContentElement.wizardItems.plugins {
					elements {
						institutionlist {
							iconIdentifier = bfbnsvgicon
							title = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_institution_list.name
							description = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_institution_list.description
							tt_content_defValues {
								CType = list
								list_type = bfbn_institutionlist
							}
						}
						institutionedit {
							iconIdentifier = bfbnsvgicon
							title = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_institution_edit.name
							description = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_institution_edit.description
							tt_content_defValues {
								CType = list
								list_type = bfbn_institutionedit
							}
						}
						personlist {
							iconIdentifier = bfbnsvgicon
							title = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_person_list.name
							description = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_person_list.description
							tt_content_defValues {
								CType = list
								list_type = bfbn_personlist
							}
						}
						personsearch {
							iconIdentifier = bfbnsvgicon
							title = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_person_search.name
							description = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_person_search.description
							tt_content_defValues {
								CType = list
								list_type = bfbn_personsearch
							}
						}						
						institutionsearch {
							iconIdentifier = bfbnsvgicon
							title = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_institution_search.name
							description = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_institution_search.description
							tt_content_defValues {
								CType = list
								list_type = bfbn_institutionsearch
							}
						}
						ergaenzungspruefunglist {
							iconIdentifier = bfbnsvgicon
							title = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_ergprf_list.name
							description = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_ergprf_list.description
							tt_content_defValues {
								CType = list
								list_type = bfbn_ergaenzungspruefunglist
							}
						}
						schulfremdeprueferlist {
							iconIdentifier = bfbnsvgicon
							title = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_schulfremd_list.name
							description = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_schulfremd_list.description
							tt_content_defValues {
								CType = list
								list_type = bfbn_schulfremdeprueferlist
							}
						}
						aufgabenauswahllist {
							iconIdentifier = bfbnsvgicon
							title = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_aufgabenauswahl_list.name
							description = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_aufgabenauswahl_list.description
							tt_content_defValues {
								CType = list
								list_type = bfbn_aufgabenauswahllist
							}
						}
						unfallstatistiklist {
							iconIdentifier = bfbnsvgicon
							title = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_unfallstatistik_list.name
							description = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_unfallstatistik_list.description
							tt_content_defValues {
								CType = list
								list_type = bfbn_unfallstatistiklist
							}
						}
						meldunglist {
							iconIdentifier = bfbnsvgicon
							title = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_meldung_list.name
							description = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_meldung_list.description
							tt_content_defValues {
								CType = list
								list_type = bfbn_meldunglist
							}
						}
						fortbildunglist {
							iconIdentifier = bfbnsvgicon
							title = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_fortbildung_list.name
							description = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_fortbildung_list.description
							tt_content_defValues {
								CType = list
								list_type = bfbn_fortbildunglist
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
	
};

$boot();
unset($boot);

