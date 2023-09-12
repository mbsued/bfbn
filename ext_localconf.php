<?php
defined('TYPO3_MODE') || die('Access denied.');

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
			[\OliverBauer\Bfbn\Controller\InstitutionController::class => 'list,show'],
			[\OliverBauer\Bfbn\Controller\InstitutionController::class => 'list,show']			
        );
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Bfbn',
            'InstitutionDetail',
			[\OliverBauer\Bfbn\Controller\InstitutionController::class => 'show'],
			[\OliverBauer\Bfbn\Controller\InstitutionController::class => 'show']			
        );
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Bfbn',
            'InstitutionEdit',
			[\OliverBauer\Bfbn\Controller\InstitutionController::class => 'showforedit,edit,update', \OliverBauer\Bfbn\Controller\PersonController::class => 'new,create,delete'],
			[\OliverBauer\Bfbn\Controller\InstitutionController::class => 'showforedit,edit,update', \OliverBauer\Bfbn\Controller\PersonController::class => 'new,create,delete']			
        );
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Bfbn',
            'PersonList',
			[\OliverBauer\Bfbn\Controller\PersonController::class => 'list,show,edit,update,newft,createft,deleteft'],
			[\OliverBauer\Bfbn\Controller\PersonController::class => 'list,show,edit,update,newft,createft,deleteft']			
        );
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Bfbn',
            'PersonSearch',
			[\OliverBauer\Bfbn\Controller\PersonController::class => 'searchform,search,searchshow,export'],
			[\OliverBauer\Bfbn\Controller\PersonController::class => 'searchform,search']			
        );		
		\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Bfbn',
            'InstitutionSearch',
			[\OliverBauer\Bfbn\Controller\InstitutionController::class => 'searchform,search,searchshow'],
			[\OliverBauer\Bfbn\Controller\InstitutionController::class => 'searchform,search']
        );
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Bfbn',
            'ErgaenzungspruefungList',
			[\OliverBauer\Bfbn\Controller\ErgaenzungspruefungController::class => 'list,show,edit,update,new,create,delete'],
			[\OliverBauer\Bfbn\Controller\ErgaenzungspruefungController::class => 'list,show,edit,update,new,create,delete']			
        );
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Bfbn',
            'SchulfremdeprueferList',
			[\OliverBauer\Bfbn\Controller\SchulfremdeprueferController::class => 'list,show,edit,update,new,create,delete'],
			[\OliverBauer\Bfbn\Controller\SchulfremdeprueferController::class => 'list,show,edit,update,new,create,delete']			
        );
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Bfbn',
            'AufgabenauswahlList',
			[\OliverBauer\Bfbn\Controller\AufgabenauswahlController::class => 'list,show,edit,update,new,create,delete'],
			[\OliverBauer\Bfbn\Controller\AufgabenauswahlController::class => 'list,show,edit,update,new,create,delete']			
        );
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Bfbn',
            'MeldungList',
			[\OliverBauer\Bfbn\Controller\MeldungController::class => 'list,show,perform'],
			[\OliverBauer\Bfbn\Controller\MeldungController::class => 'list,show,perform']			
        );
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Bfbn',
            'NeubestellungList',
			[\OliverBauer\Bfbn\Controller\NeubestellungController::class => 'list,show,edit,update,new,create,delete'],
			[\OliverBauer\Bfbn\Controller\NeubestellungController::class => 'list,show,edit,update,new,create,delete']			
        );
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Bfbn',
            'UnfallstatistikList',
			[\OliverBauer\Bfbn\Controller\UnfallstatistikController::class => 'list,show,edit,update,new,create,delete'],
			[\OliverBauer\Bfbn\Controller\UnfallstatistikController::class => 'list,show,edit,update,new,create,delete']			
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
						neubestellunglist {
							iconIdentifier = bfbnsvgicon
							title = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_neubestellung_list.name
							description = LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_neubestellung_list.description
							tt_content_defValues {
								CType = list
								list_type = bfbn_neubestellunglist
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
					}
					show = *
				}
		   }'
		);		
    }
);

$boot = function () {

    $GLOBALS['TYPO3_CONF_VARS']['FE']['eID_include']['bfbn'] = \OliverBauer\Bfbn\Ajax\PdfResponse::class . '::processRequest';
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/form']['afterBuildingFinished'][1676311200] = \OliverBauer\Bfbn\Utility\FormHook::class;
	
};

$boot();
unset($boot);

