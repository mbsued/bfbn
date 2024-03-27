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
 * The repository for InstitutionSprache
 */
class InstitutionSpracheRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    public function findAll()
    {
		$query = $this->createQuery();
		$query->getQuerySettings()->setRespectStoragePage(false);

		/** $queryParser = $this->objectManager->get(\TYPO3\CMS\Extbase\Persistence\Generic\Storage\Typo3DbQueryParser::class);

		\TYPO3\CMS\Core\Utility\DebugUtility::debug($queryParser->convertQueryToDoctrineQueryBuilder($query)->getSQL());	**/
		
        return $query->execute();		
    }
	
	public function findDemanded($demand)
	{
        $query = $this -> createQuery();
        $query -> getQuerySettings() -> setRespectStoragePage(FALSE);
        $query -> setOrderings($this -> createOrdering());
        $constraints = $this -> createConstraintsFromDemand($query, $demand);
        if (!empty($constraints)) 
		{
            $query -> matching(
            $query -> logicalAnd(...$constraints)
        );
        }
		
        return $query -> execute();
    }
	
    protected function createConstraintsFromDemand(\TYPO3\CMS\Extbase\Persistence\QueryInterface $query, $demand)
	{
        $constraints = array();		

		$sprache = $demand -> getSprache();
	
        if ((!empty($sprache))) 
		{
			$constraints[] = $query -> equals('sprache',$sprache);
        }
 		
        return $constraints;
    }	
	
    protected function createOrdering() 
	{
        $orderings = array('uid' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING);
        return $orderings;
    }	
}
