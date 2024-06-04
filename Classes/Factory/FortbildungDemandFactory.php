<?php
declare(strict_types = 1);

/*
 * This file is part of the package MbFosbos\Bfbn.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace MbFosbos\Bfbn\Factory;

use MbFosbos\Bfbn\DataTransferObject\FortbildungDemand;
use MbFosbos\Bfbn\Utility\Page;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class FortbildungDemandFactory
{

	public function createDemandObjectFromSettings($settings) : FortbildungDemand
	{
		$demand = new FortbildungDemand();

		$demand->setStartingpoint(Page::extendPidListByChildren(
			(string)($settings['startingpoint'] ?? ''),
            (int)($settings['recursive'] ?? 0)
        ));
		$demand->setBezirk(GeneralUtility::trimExplode(',', $settings['bezirke'], true));
		
        return $demand;
    }	
}
