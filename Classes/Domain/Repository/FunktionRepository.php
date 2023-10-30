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
 * The repository for Funktion
 */
class FunktionRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
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
	
	public function findSchulfunktionen()
    {
		$query = $this->createQuery();
		$query->getQuerySettings()->setRespectStoragePage(false);
        $query->setOrderings($this->createOrdering());
		$query -> matching(
            $query -> logicalAnd($query -> equals('art',3))
        );		
		
		/** $queryParser = $this->objectManager->get(\TYPO3\CMS\Extbase\Persistence\Generic\Storage\Typo3DbQueryParser::class);

		\TYPO3\CMS\Core\Utility\DebugUtility::debug($queryParser->convertQueryToDoctrineQueryBuilder($query)->getSQL());	*/
		
        return $query->execute();		
    }
	
    public function findDemanded($demand)
	{
        $query = $this -> createQuery();
        $query -> getQuerySettings() -> setRespectStoragePage(false);
        $query -> setOrderings($this -> createOrdering());
        $constraints = $this -> createConstraintsFromDemand($query, $demand);
        if (!empty($constraints)) 
		{
            $query -> matching(
            $query -> logicalAnd($constraints)
        );
        }
/**		$queryParser = $this->objectManager->get(\TYPO3\CMS\Extbase\Persistence\Generic\Storage\Typo3DbQueryParser::class);

		\TYPO3\CMS\Core\Utility\DebugUtility::debug($queryParser->convertQueryToDoctrineQueryBuilder($query)->getSQL()); **/	
        return $query -> execute();
    }        
        
    protected function createConstraintsFromDemand(\TYPO3\CMS\Extbase\Persistence\QueryInterface $query, $demand)
	{
        $constraints = array();

        $arten = $demand -> getArt();
        if ((!empty($arten))) 
		{
            $artConstraints = array();
			if (!is_array($arten)) {
				$arten = \TYPO3\CMS\Core\Utility\GeneralUtility::intExplode(',', $arten, TRUE);
			}           
            foreach ($arten as $art) 
			{
                $artConstraints[] = $query -> equals('art', $art);
            }
            $constraints[] = $query -> logicalOr($artConstraints);
        }
		
        return $constraints;
    }	
    protected function createOrdering() 
	{
        $orderings = array('uid' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING);
        return $orderings;
    }			
}
