<?php
namespace MbFosbos\Bfbn\Domain\Repository;


/***
 *
 * This file is part of the "BFBN" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2021 
 *
 ***/
/**
 * The repository for Jahrgangsstufe
 */
class JahrgangsstufeRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    /**
     * Override default findByUid function to enable also the option to turn of
     * the enableField setting
     *
     * @param int $uid id of record
     * @param bool $respectEnableFields if set to false, hidden records are shown
     * @return \GeorgRinger\News\Domain\Model\News
     */
    public function findByUid($uid, $respectEnableFields = true)
    {
        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);
        $query->getQuerySettings()->setRespectSysLanguage(false);
        $query->getQuerySettings()->setIgnoreEnableFields(!$respectEnableFields);

        return $query->matching(
            $query->logicalAnd(
                $query->equals('uid', $uid),
                $query->equals('deleted', 0)
            )
        )->execute()->getFirst();
    }	
	
	public function findAll()
    {
		$query = $this->createQuery();
		$query->getQuerySettings()->setRespectStoragePage(false);

		/** $queryParser = $this->objectManager->get(\TYPO3\CMS\Extbase\Persistence\Generic\Storage\Typo3DbQueryParser::class);

		\TYPO3\CMS\Core\Utility\DebugUtility::debug($queryParser->convertQueryToDoctrineQueryBuilder($query)->getSQL());	**/
		
        return $query->execute();		
    }
	
	public function findSprachensuche()
    {
		$uidlist = array(2,3);
		$query = $this->createQuery();
		$query->getQuerySettings()->setRespectStoragePage(false);
		$query -> matching(
			$query -> in('uid',$uidlist)
        );

		/** $queryParser = $this->objectManager->get(\TYPO3\CMS\Extbase\Persistence\Generic\Storage\Typo3DbQueryParser::class);

		\TYPO3\CMS\Core\Utility\DebugUtility::debug($queryParser->convertQueryToDoctrineQueryBuilder($query)->getSQL()); **/	
        
		return $query->execute();		
    }
	
	public function findNachtermin()
    {
		$uidlist = array(2,3,4);
		$query = $this->createQuery();
		$query->getQuerySettings()->setRespectStoragePage(false);
		$query -> matching(
			$query -> in('uid',$uidlist)
        );

		/** $queryParser = $this->objectManager->get(\TYPO3\CMS\Extbase\Persistence\Generic\Storage\Typo3DbQueryParser::class);

		\TYPO3\CMS\Core\Utility\DebugUtility::debug($queryParser->convertQueryToDoctrineQueryBuilder($query)->getSQL()); **/	
        
		return $query->execute();		
    }	
}
