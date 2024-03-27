<?php
declare(strict_types = 1);

/*
 * This file is part of the package MbFosbos\Bfbn.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace MbFosbos\Bfbn\Factory;

use MbFosbos\Bfbn\DataTransferObject\InstitutionSpracheDemand;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class InstitutionSpracheDemandFactory
{
	
	public function createDemandObjectForSprache($sprache) : InstitutionSpracheDemand
	{
		$demand = new InstitutionSpracheDemand();
        /** $demand = $this->objectManager->get('MbFosbos\\Bfbn\\Domain\\Model\\InstitutionSpracheDemand'); // Neuer Inhalt ist der Dateiname vom Domain Modell -> Classes -> Domain -> Model */
        $demand->setSprache($sprache);
		/** print \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($demand); */	
        return $demand;
    }	

}
