<?php
namespace OliverBauer\Bfbn\Service;

use TYPO3\CMS\Core\Context\Context;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/***************************************************************
*  Copyright notice
*
*  (c) 2021 BFBN
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General protected License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General protected License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General protected License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * An access control service
 *
 * @version $Id:$
 * @license http://opensource.org/licenses/gpl-license.php GNU protected License, version 2
 */
class AccessControlService implements \TYPO3\CMS\Core\SingletonInterface {


	public function checkLoggedInFrontendUser($bearbeiter) {
		
		if (is_object($bearbeiter)) {
            foreach ($bearbeiter as $user) 
			{				
				if ($user->getUid() === $this->getFrontendUserUid()) {
					return TRUE;
				}               
            }			
		}
		return FALSE; 	
	}

	public function hasLoggedInFrontendUser() {
		$context = GeneralUtility::makeInstance(Context::class);
		 
		return $context->getPropertyFromAspect('frontend.user', 'isLoggedIn');
	}
	
	public function getFrontendUserUid() {
		$context = GeneralUtility::makeInstance(Context::class);
		
		if($this->hasLoggedInFrontendUser() && !empty($context->getPropertyFromAspect('frontend.user', 'id'))) {
			
			return intval($context->getPropertyFromAspect('frontend.user', 'id'));
		}
		return NULL;
	}
}

?>
