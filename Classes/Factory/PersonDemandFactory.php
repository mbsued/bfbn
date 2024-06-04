<?php
declare(strict_types = 1);

/*
 * This file is part of the package MbFosbos\Bfbn.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace MbFosbos\Bfbn\Factory;

use MbFosbos\Bfbn\DataTransferObject\PersonDemand;
use MbFosbos\Bfbn\DataTransferObject\InstitutionDemand;
use MbFosbos\Bfbn\DataTransferObject\FunktionDemand;
use MbFosbos\Bfbn\Utility\Page;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class PersonDemandFactory
{
	public function createDemandObject($institution,$settings): PersonDemand
	{
		$demand = new PersonDemand;
        /** $demand = $this->objectManager->get('MbFosbos\\Bfbn\\Domain\\Model\\PersonDemand'); // Neuer Inhalt ist der Dateiname vom Domain Modell -> Classes -> Domain -> Model  */
        $demand->setCategories(GeneralUtility::trimExplode(',', $settings['categories'], true));
		$demand->setStartingpoint(Page::extendPidListByChildren(
            (string)($settings['startingpoint'] ?? ''),
            (int)($settings['recursive'] ?? 0)
        ));
		$demand->setFunktionen(GeneralUtility::trimExplode(',', $settings['funktionen'], true));
		$demand->setInstitution($institution);
		 		
        return $demand;
    }

	public function createDemandObjectFromSearch($suche,$settings): PersonDemand
	{
		$demand = new PersonDemand;
        /** $demand = $this->objectManager->get('MbFosbos\\Bfbn\\Domain\\Model\\PersonDemand'); // Neuer Inhalt ist der Dateiname vom Domain Modell -> Classes -> Domain -> Model  */
        $demand->setCategories(GeneralUtility::trimExplode(',', $settings['categories'], true));
		$demand->setStartingpoint(Page::extendPidListByChildren(
            (string)($settings['startingpoint'] ?? ''),
            (int)($settings['recursive'] ?? 0)
        ));
        if ($settings['art']==1) {
			$demand->setInstitution($suche->getInstitution());
		}
        if ($settings['art']==2) {
			$funktionen = $suche->getFunktionen();
			if (!is_array($funktionen)) {
				$funktionen = \TYPO3\CMS\Core\Utility\GeneralUtility::intExplode(',', $funktionen, TRUE);
			}						
			$demand->setFunktionen($funktionen);
		}
        if ($settings['art']==3) {
			$demand->setInstitution($suche->getInstitution());			
			$funktionen = $suche->getFunktionen();
			if (!is_array($funktionen)) {
				$funktionen = \TYPO3\CMS\Core\Utility\GeneralUtility::intExplode(',', $funktionen, TRUE);
			}						
			$demand->setFunktionen($funktionen);
		}
	
        return $demand;
    }
	
	public function createDemandObjectForExport($institution = NULL, $funktionen = NULL, $settings): PersonDemand
	{
		$demand = new PersonDemand;
        /** $demand = $this->objectManager->get('MbFosbos\\Bfbn\\Domain\\Model\\PersonDemand'); // Neuer Inhalt ist der Dateiname vom Domain Modell -> Classes -> Domain -> Model  */
        $demand->setCategories(GeneralUtility::trimExplode(',', $settings['categories'], true));
		$demand->setStartingpoint(Page::extendPidListByChildren(
            (string)($settings['startingpoint'] ?? ''),
            (int)($settings['recursive'] ?? 0)
        ));
        if ($settings['art']==1) {
			$demand->setInstitution($institution);
		}
        if ($settings['art']==2) {			
			if (!is_array($funktionen)) {
				$funktionen = \TYPO3\CMS\Core\Utility\GeneralUtility::intExplode(',', $funktionen, TRUE);
			}						
			$demand->setFunktionen($funktionen);
		}
        if ($settings['art']==3) {
			$demand->setInstitution($institution);
			if (!is_array($funktionen)) {
				$funktionen = \TYPO3\CMS\Core\Utility\GeneralUtility::intExplode(',', $funktionen, TRUE);
			}						
			$demand->setFunktionen($funktionen);
		}
	
        return $demand;
    }
	
	public function createDemandObjectForInstitution($settings): InstitutionDemand
	{
		$demand = new InstitutionDemand();
		/** $demand = $this->objectManager->get('MbFosbos\\Bfbn\\Domain\\Model\\InstitutionDemand'); // Neuer Inhalt ist der Dateiname vom Domain Modell -> Classes -> Domain -> Model */
		$demand->setStartingpoint(Page::extendPidListByChildren(
			(string)($settings['schulen'] ?? ''),
            (int)($settings['recursive'] ?? 0)
        ));		
		$demand->setBezirk(GeneralUtility::trimExplode(',', $settings['bezirke'], true));
		/** print \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($demand); */	
        return $demand;
    }
	
	public function createDemandObjectForFunktionen($settings): FunktionDemand
	{
		$demand = new FunktionDemand();
		/** $demand = $this->objectManager->get('MbFosbos\\Bfbn\\Domain\\Model\\FunktionDemand'); // Neuer Inhalt ist der Dateiname vom Domain Modell -> Classes -> Domain -> Model */
        $demand->setArt($settings['funktionart']);
		/** print \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($demand); */	
        return $demand;
    }	
	
}