<?php
declare(strict_types = 1);

/*
 * This file is part of the package MbFosbos\Bfbn.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace MbFosbos\Bfbn\Factory;

use MbFosbos\Bfbn\DataTransferObject\AbfrageDemand;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class AbfrageDemandFactory
{
	public function createDemandObject($institution) : AbfrageDemand
	{
		$demand = new AbfrageDemand();
        /** $demand = $this->objectManager->get('MbFosbos\\Bfbn\\Domain\\Model\\AbfrageDemand'); // Neuer Inhalt ist der Dateiname vom Domain Modell -> Classes -> Domain -> Model */
		$demand->setInstitution($institution);
		/** print \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($demand); 	*/	
        return $demand;
    }
}