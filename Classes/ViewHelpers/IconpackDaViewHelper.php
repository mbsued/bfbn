<?php

declare(strict_types=1);

namespace MbFosbos\Bfbn\ViewHelpers;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

/**
 * This file is part of the TYPO3 extension bfbn.
 *
 */
class IconpackDaViewHelper extends AbstractViewHelper
{
	public function render()
 {
	$extkey = 't3sbootstrap';
	$versioninformation = ExtensionManagementUtility::getExtensionVersion($extkey); 

	$versionteile = explode('.',$versioninformation);

	if ($versionteile[0] == 5) {
		if ($versionteile[1] == 3) {
			if ($versionteile[2] > 18) {
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			if ($versionteile[1] > 3) {
				return true;
			}
			else
			{
				return false;
			}
		}		
	}
	else
	{
		if ($versionteile[0] > 5) {
			return true;
		}
		else
		{
			return false;
		}
	}
 }
}