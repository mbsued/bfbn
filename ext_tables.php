<?php
defined('TYPO3') || die('Access denied.');

use TYPO3\CMS\Core\Information\Typo3Version;
use TYPO3\CMS\Core\Utility\GeneralUtility;

if(!class_exists('\Mpdf\Mpdf')){
    $composerAutoloadFile = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('bfbn')
        . 'Resources/Private/PHP/autoload.php';
    require_once($composerAutoloadFile);
}

$boot = static function (): void {
	$versionInformation = GeneralUtility::makeInstance(Typo3Version::class);
	if ($versionInformation->getMajorVersion() < 12) {
		// CSH - context sensitive help
        foreach (['institution', 'person', 'funktion', 'funktionart', 'fach','regierungsbezirk', 'mbbezirk', 'institutionstatus', 'institutionart', 'sprache', 'jahrgangsstufe', 'ausbildungsrichtung', 'schulart', 'institutionsprache', 
					'institutionausbildungsrichtung', 'vorkursart', 'abschluss', 'auswahljanein', 'ergaenzungspruefung', 'schulfremdepruefer', 'aufgabenauswahl', 'elitepruefung', 'pdftemplate', 'htmltemplate',
					'fachkurz', 'meldung', 'meldungart', 'unfallstatistik', 'nachricht','fortbildung'] as $table) {
            // @extensionScannerIgnoreLine
            \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bfbn_domain_model_' . $table);

            // @extensionScannerIgnoreLine
            \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
                'tx_bfbn_domain_model_' . $table,
                'EXT:bfbn/Resources/Private/Language/locallang_csh_tx_bfbn_domain_model_' . $table . '.xlf'
            );
        }
	}
};

$boot();
unset($boot);
