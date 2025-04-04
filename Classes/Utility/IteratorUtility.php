<?php
declare(strict_types=1);

/***
 *
 * This file is part of the "BFBN" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2024 
 *
 ***/

namespace MbFosbos\Bfbn\Utility;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;

class IteratorUtility
{
    /**
     * Based on method from  EXT:vhs ArrayConsumingViewHelperTrait
     *
     * @param mixed $candidate
     */
    public static function arrayFromArrayOrTraversableOrCSV($candidate, bool $useKeys = true): array
    {
        if ($candidate instanceof QueryResultInterface) {
            return $candidate->toArray();
        }

        if ($candidate instanceof \Traversable) {
            return iterator_to_array($candidate, $useKeys);
        }

        if (is_string($candidate)) {
            return GeneralUtility::trimExplode(',', $candidate, true);
        }

        if (is_array($candidate)) {
            return $candidate;
        }
        return [];
    }
}
