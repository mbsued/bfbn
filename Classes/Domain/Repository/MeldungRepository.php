<?php
namespace OliverBauer\Bfbn\Domain\Repository;


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
 * The repository for Meldung
 */
class MeldungRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
	
    public function findDemanded($demand)
	{
		/** print \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($demand); 	*/	
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
		/** $queryParser = $this->objectManager->get(\TYPO3\CMS\Extbase\Persistence\Generic\Storage\Typo3DbQueryParser::class);

		\TYPO3\CMS\Core\Utility\DebugUtility::debug($queryParser->convertQueryToDoctrineQueryBuilder($query)->getSQL()); */	
        return $query -> execute();
    }
        
        
    protected function createConstraintsFromDemand(\TYPO3\CMS\Extbase\Persistence\QueryInterface $query, $demand)
	{
        $constraints = array();    
		
		$institution = $demand -> getInstitution();
        if ((!empty($institution))) 
		{
			$constraints[] = $query -> equals('institution',$institution);
        }
		
		$art = $demand -> getArt();
        if ((!empty($art))) 
		{
			$constraints[] = $query -> equals('art',$art);
        }		
        return $constraints;
    }
        
    protected function createOrdering() 
	{
        $orderings = array('uid' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING);
        return $orderings;
    }	
}
