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
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_bfbn_domain_model_institution', 'EXT:bfbn/Resources/Private/Language/locallang_csh_tx_bfbn_domain_model_institution.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bfbn_domain_model_institution');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_bfbn_domain_model_person', 'EXT:bfbn/Resources/Private/Language/locallang_csh_tx_bfbn_domain_model_person.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bfbn_domain_model_person');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_bfbn_domain_model_funktion', 'EXT:bfbn/Resources/Private/Language/locallang_csh_tx_bfbn_domain_model_funktion.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bfbn_domain_model_funktion');
		
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_bfbn_domain_model_funktionart', 'EXT:bfbn/Resources/Private/Language/locallang_csh_tx_bfbn_domain_model_funktionart.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bfbn_domain_model_funktionart');		

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_bfbn_domain_model_fach', 'EXT:bfbn/Resources/Private/Language/locallang_csh_tx_bfbn_domain_model_fach.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bfbn_domain_model_fach');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_bfbn_domain_model_regierungsbezirk', 'EXT:bfbn/Resources/Private/Language/locallang_csh_tx_bfbn_domain_model_regierungsbezirk.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bfbn_domain_model_regierungsbezirk');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_bfbn_domain_model_mbbezirk', 'EXT:bfbn/Resources/Private/Language/locallang_csh_tx_bfbn_domain_model_mbbezirk.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bfbn_domain_model_mbbezirk');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_bfbn_domain_model_institutionstatus', 'EXT:bfbn/Resources/Private/Language/locallang_csh_tx_bfbn_domain_model_institutionstatus.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bfbn_domain_model_institutionstatus');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_bfbn_domain_model_institutionart', 'EXT:bfbn/Resources/Private/Language/locallang_csh_tx_bfbn_domain_model_institutionart.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bfbn_domain_model_institutionart');
		
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_bfbn_domain_model_sprache', 'EXT:bfbn/Resources/Private/Language/locallang_csh_tx_bfbn_domain_model_sprache.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bfbn_domain_model_sprache');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_bfbn_domain_model_jahrgangsstufe', 'EXT:bfbn/Resources/Private/Language/locallang_csh_tx_bfbn_domain_model_jahrgangsstufe.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bfbn_domain_model_jahrgangsstufe');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_bfbn_domain_model_ausbildungsrichtung', 'EXT:bfbn/Resources/Private/Language/locallang_csh_tx_bfbn_domain_model_ausbildungsrichtung.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bfbn_domain_model_ausbildungsrichtung');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_bfbn_domain_model_schulart', 'EXT:bfbn/Resources/Private/Language/locallang_csh_tx_bfbn_domain_model_schulart.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bfbn_domain_model_schulart');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_bfbn_domain_model_institutionsprache', 'EXT:bfbn/Resources/Private/Language/locallang_csh_tx_bfbn_domain_model_institutionsprache.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bfbn_domain_model_institutionsprache');
		
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_bfbn_domain_model_institutionausbildungsrichtung', 'EXT:bfbn/Resources/Private/Language/locallang_csh_tx_bfbn_domain_model_institutionausbildungsrichtung.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bfbn_domain_model_institutionausbildungsrichtung');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_bfbn_domain_model_vorkursart', 'EXT:bfbn/Resources/Private/Language/locallang_csh_tx_bfbn_domain_model_vorkursart.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bfbn_domain_model_vorkursart');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_bfbn_domain_model_abschluss', 'EXT:bfbn/Resources/Private/Language/locallang_csh_tx_bfbn_domain_model_abschluss.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bfbn_domain_model_abschluss');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_bfbn_domain_model_auswahljanein', 'EXT:bfbn/Resources/Private/Language/locallang_csh_tx_bfbn_domain_model_auswahljanein.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bfbn_domain_model_auswahljanein');		

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_bfbn_domain_model_ergaenzungspruefung', 'EXT:bfbn/Resources/Private/Language/locallang_csh_tx_bfbn_domain_model_ergaenzungspruefung.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bfbn_domain_model_ergaenzungspruefung');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_bfbn_domain_model_schulfremdepruefer', 'EXT:bfbn/Resources/Private/Language/locallang_csh_tx_bfbn_domain_model_schulfremdepruefer.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bfbn_domain_model_schulfremdepruefer');
		
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_bfbn_domain_model_aufgabenauswahl', 'EXT:bfbn/Resources/Private/Language/locallang_csh_tx_bfbn_domain_model_aufgabenauswahl.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bfbn_domain_model_aufgabenauswahl');		
		
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_bfbn_domain_model_elitepruefung', 'EXT:bfbn/Resources/Private/Language/locallang_csh_tx_bfbn_domain_model_elitepruefung.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bfbn_domain_model_elitepruefung');		

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_bfbn_domain_model_pdftemplate', 'EXT:bfbn/Resources/Private/Language/locallang_csh_tx_bfbn_domain_model_pdftemplate.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bfbn_domain_model_pdftemplate');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_bfbn_domain_model_htmltemplate', 'EXT:bfbn/Resources/Private/Language/locallang_csh_tx_bfbn_domain_model_htmltemplate.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bfbn_domain_model_htmltemplate');
		
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_bfbn_domain_model_fachkurz', 'EXT:bfbn/Resources/Private/Language/locallang_csh_tx_bfbn_domain_model_fachkurz.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bfbn_domain_model_fachkurz');
		
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_bfbn_domain_model_meldung', 'EXT:bfbn/Resources/Private/Language/locallang_csh_tx_bfbn_domain_model_meldung.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bfbn_domain_model_meldung');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_bfbn_domain_model_meldungart', 'EXT:bfbn/Resources/Private/Language/locallang_csh_tx_bfbn_domain_model_meldungart.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bfbn_domain_model_meldungart');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_bfbn_domain_model_neubestellung', 'EXT:bfbn/Resources/Private/Language/locallang_csh_tx_bfbn_domain_model_neubestellung.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bfbn_domain_model_neubestellung');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_bfbn_domain_model_neubestellungart', 'EXT:bfbn/Resources/Private/Language/locallang_csh_tx_bfbn_domain_model_neubestellungart.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bfbn_domain_model_neubestellungart');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_bfbn_domain_model_unfallstatistik', 'EXT:bfbn/Resources/Private/Language/locallang_csh_tx_bfbn_domain_model_unfallstatistik.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bfbn_domain_model_unfallstatistik');		
    }
);
