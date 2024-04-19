<?php
defined('TYPO3') || die('Access denied.');


if(!class_exists('\Mpdf\Mpdf')){
    $composerAutoloadFile = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('bfbn')
        . 'Resources/Private/PHP/autoload.php';
    require_once($composerAutoloadFile);
}
