<?php

namespace MbFosbos\Bfbn\ViewHelpers;

use TYPO3\CMS\Core\Information\Typo3Version;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class Typo3VersionViewHelper extends AbstractViewHelper
{
	
	public function render()
	{
		$versionInformation = GeneralUtility::makeInstance(Typo3Version::class);
		return $versionInformation->getMajorVersion();
	}
}