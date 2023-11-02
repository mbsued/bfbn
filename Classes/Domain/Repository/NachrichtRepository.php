<?php
namespace MbFosbos\Bfbn\Domain\Repository;


/***
 *
 * This file is part of the "BFBN" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2023
 *
 ***/
/**
 * The repository for Nachricht
 */
class NachrichtRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
	public function findAll()
    {
		$query = $this->createQuery();
		$query->getQuerySettings()->setRespectStoragePage(false);

		/** $queryParser = $this->objectManager->get(\TYPO3\CMS\Extbase\Persistence\Generic\Storage\Typo3DbQueryParser::class);

		\TYPO3\CMS\Core\Utility\DebugUtility::debug($queryParser->convertQueryToDoctrineQueryBuilder($query)->getSQL());	**/
		
        return $query->execute();		
    }
}