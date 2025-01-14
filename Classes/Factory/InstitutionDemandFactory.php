<?php
declare(strict_types = 1);

/*
 * This file is part of the package MbFosbos\Bfbn.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace MbFosbos\Bfbn\Factory;

use MbFosbos\Bfbn\DataTransferObject\InstitutionDemand;
use MbFosbos\Bfbn\Utility\Page;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class InstitutionDemandFactory
{

	public function createDemandObjectFromAbfrageSettings($settings) : InstitutionDemand
	{
		$demand = new InstitutionDemand();
        /** $demand = $this->objectManager->get('MbFosbos\\Bfbn\\Domain\\Model\\InstitutionDemand'); // Neuer Inhalt ist der Dateiname vom Domain Modell -> Classes -> Domain -> Model */
        $demand->setCategories(GeneralUtility::trimExplode(',', $settings['categories'], true));
		$demand->setStartingpoint(Page::extendPidListByChildren(
			(string)($settings['startingpoint'] ?? ''),
            (int)($settings['recursive'] ?? 0)
        ));
		$demand->setBezirk(GeneralUtility::trimExplode(',', $settings['bezirke'], true));
		$demand->setStatus(GeneralUtility::trimExplode(',', $settings['status'], true));		
        return $demand;
    }
	
	public function createDemandObjectFromSettings($settings) : InstitutionDemand
	{
		$demand = new InstitutionDemand();
        /** $demand = $this->objectManager->get('MbFosbos\\Bfbn\\Domain\\Model\\InstitutionDemand'); // Neuer Inhalt ist der Dateiname vom Domain Modell -> Classes -> Domain -> Model */
        $demand->setCategories(GeneralUtility::trimExplode(',', $settings['categories'], true));
		$demand->setStartingpoint(Page::extendPidListByChildren(
			(string)($settings['startingpoint'] ?? ''),
            (int)($settings['recursive'] ?? 0)
        ));
		$demand->setBezirk(GeneralUtility::trimExplode(',', $settings['bezirke'], true));
		$demand->setAusbildungsrichtungen(GeneralUtility::trimExplode(',', $settings['ausbildungsrichtungen'], true));
		$demand->setSprachen(GeneralUtility::trimExplode(',', $settings['sprachen'], true));
		$demand->setProfilinklusion($settings['inklusion']);
		$demand->setIvk($settings['ivk']);		
        return $demand;
    }

	
	public function createDemandObjectFromSearch($suche,$settings) : InstitutionDemand
	{
		$demand = new InstitutionDemand();
        /** $demand = $this->objectManager->get('MbFosbos\\Bfbn\\Domain\\Model\\InstitutionDemand'); // Neuer Inhalt ist der Dateiname vom Domain Modell -> Classes -> Domain -> Model */
        if ($settings['art']==1) {
			$demand->setBezeichnung($suche->getBezeichnung());
		}
		if ($settings['art']==2) {
			$ausbildungsrichtungenarray = array();			
			$demand->setSchulart($suche->getSchulart());
			$demand->setJahrgangsstufe($suche->getJahrgangsstufe());
			$demand->setAusbildungsrichtung($suche->getAusbildungsrichtung());
			$demand->setRegierungsbezirk($suche->getRegierungsbezirk());
			$demand->setStatus($suche->getStatus());
			$ausbildungsrichtungen = $suche->getAusbildungsrichtung();
			if (!is_array($ausbildungsrichtungen)) {
				$ausbildungsrichtungen = \TYPO3\CMS\Core\Utility\GeneralUtility::intExplode(',', $ausbildungsrichtungen, TRUE);
			}			
			foreach ($ausbildungsrichtungen as $ausb)
			{
				if ($suche->getSchulart() == 1) {
					switch ($ausb)
					{
						case 1:
							$ausbildungsrichtungenarray[] = (1);
							$ausbildungsrichtungenarray[] = (2);
							$ausbildungsrichtungenarray[] = (3);
							$ausbildungsrichtungenarray[] = (34);
							$ausbildungsrichtungenarray[] = (35);
							$ausbildungsrichtungenarray[] = (36);							
							break;
						case 2:
							$ausbildungsrichtungenarray[] = (6);
							$ausbildungsrichtungenarray[] = (7);
							$ausbildungsrichtungenarray[] = (8);
							$ausbildungsrichtungenarray[] = (39);
							$ausbildungsrichtungenarray[] = (40);
							$ausbildungsrichtungenarray[] = (41);							
							break;						
						case 3:
							$ausbildungsrichtungenarray[] = (9);
							$ausbildungsrichtungenarray[] = (10);
							$ausbildungsrichtungenarray[] = (11);
							$ausbildungsrichtungenarray[] = (42);
							$ausbildungsrichtungenarray[] = (43);
							$ausbildungsrichtungenarray[] = (44);							
							break;					
						case 4:
							$ausbildungsrichtungenarray[] = (14);
							$ausbildungsrichtungenarray[] = (15);
							$ausbildungsrichtungenarray[] = (16);
							$ausbildungsrichtungenarray[] = (47);
							$ausbildungsrichtungenarray[] = (48);
							$ausbildungsrichtungenarray[] = (49);							
							break;						
						case 5:
							$ausbildungsrichtungenarray[] = (19);
							$ausbildungsrichtungenarray[] = (20);
							$ausbildungsrichtungenarray[] = (21);
							$ausbildungsrichtungenarray[] = (52);
							$ausbildungsrichtungenarray[] = (53);
							$ausbildungsrichtungenarray[] = (54);							
							break;						
						case 6:
							$ausbildungsrichtungenarray[] = (24);
							$ausbildungsrichtungenarray[] = (25);
							$ausbildungsrichtungenarray[] = (26);
							$ausbildungsrichtungenarray[] = (57);
							$ausbildungsrichtungenarray[] = (58);
							$ausbildungsrichtungenarray[] = (59);							
							break;							
						case 7:
							$ausbildungsrichtungenarray[] = (29);
							$ausbildungsrichtungenarray[] = (30);
							$ausbildungsrichtungenarray[] = (31);
							$ausbildungsrichtungenarray[] = (62);
							$ausbildungsrichtungenarray[] = (63);
							$ausbildungsrichtungenarray[] = (64);							
							break;						
					}
				} else {
					
					switch ($ausb)
					{
						case 1:
							$ausbildungsrichtungenarray[] = (4);
							$ausbildungsrichtungenarray[] = (5);
							$ausbildungsrichtungenarray[] = (37);
							$ausbildungsrichtungenarray[] = (38);							
							break;
						case 3:
							$ausbildungsrichtungenarray[] = (12);
							$ausbildungsrichtungenarray[] = (13);
							$ausbildungsrichtungenarray[] = (45);
							$ausbildungsrichtungenarray[] = (46);							
							break;					
						case 4:
							$ausbildungsrichtungenarray[] = (17);
							$ausbildungsrichtungenarray[] = (18);
							$ausbildungsrichtungenarray[] = (50);
							$ausbildungsrichtungenarray[] = (51);							
							break;						
						case 5:
							$ausbildungsrichtungenarray[] = (22);
							$ausbildungsrichtungenarray[] = (23);
							$ausbildungsrichtungenarray[] = (55);
							$ausbildungsrichtungenarray[] = (56);							
							break;						
						case 6:
							$ausbildungsrichtungenarray[] = (27);
							$ausbildungsrichtungenarray[] = (28);
							$ausbildungsrichtungenarray[] = (60);
							$ausbildungsrichtungenarray[] = (61);							
							break;							
						case 7:
							$ausbildungsrichtungenarray[] = (32);
							$ausbildungsrichtungenarray[] = (33);
							$ausbildungsrichtungenarray[] = (65);
							$ausbildungsrichtungenarray[] = (66);							
							break;							
					}					
				}
			}
			$demand->setAusbildungsrichtungen($ausbildungsrichtungenarray);
			
		}
		if ($settings['art']==3) {	
			$demand->setSprache($suche->getSprache());
			$demand->setJahrgangsstufe($suche->getJahrgangsstufe());			
			$demand->setRegierungsbezirk($suche->getRegierungsbezirk());
			$demand->setStatus($suche->getStatus());			
			$switchsuche = $suche->getSprache().$suche->getJahrgangsstufe();
					
			switch ($switchsuche)
			{
			case 12:
				$demand->setSprachen(1);
				break;
			case 13:
				$demand->setSprachen(2);
				break;				
			case 22:
				$demand->setSprachen(3);
				break;
			case 23:
				$demand->setSprachen(4);
				break;				
			case 32:
				$demand->setSprachen(5);
				break;
			case 33:
				$demand->setSprachen(6);
				break;				
			case 42:
				$demand->setSprachen(7);
				break;
			case 43:
				$demand->setSprachen(8);
				break;				
			case 52:
				$demand->setSprachen(9);
				break;
			case 53:
				$demand->setSprachen(10);
				break;				
			}
		}
		
		if ($settings['art']==4) {			
			$demand->setSchulart($suche->getSchulart());
			$demand->setVorart($suche->getVorart());
			$demand->setRegierungsbezirk($suche->getRegierungsbezirk());
			$demand->setStatus($suche->getStatus());
		}
		
		$demand->setArt($settings['art']);
        $demand->setCategories(GeneralUtility::trimExplode(',', $settings['categories'], true));
		$demand->setStartingpoint(Page::extendPidListByChildren(
			(string)($settings['startingpoint'] ?? ''),
            (int)($settings['recursive'] ?? 0)
        ));
 				
        return $demand;
    }
}
