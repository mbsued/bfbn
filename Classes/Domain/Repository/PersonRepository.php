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
 * The repository for Person
 */
class PersonRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

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
		/** $queryParser = $this->objectManager->get(\TYPO3\CMS\Extbase\Persistence\Generic\Storage\Typo3DbQueryParser::class);

		\TYPO3\CMS\Core\Utility\DebugUtility::debug($queryParser->convertQueryToDoctrineQueryBuilder($query)->getSQL()); */	
        return $query -> execute();
    }
        
        
    protected function createConstraintsFromDemand(\TYPO3\CMS\Extbase\Persistence\QueryInterface $query, $demand)
	{
        $constraints = array();
		
		$startingpoint = $demand -> getStartingpoint();
		if ((!empty($startingpoint))) 
		{
			$pidList = \TYPO3\CMS\Core\Utility\GeneralUtility::intExplode(',', $startingpoint, TRUE);
			$constraints[] = $query -> in('pid', $pidList);
		}
        
        $categories = $demand -> getCategories();
        if ((!empty($categories))) 
		{
            $categoryConstraints = array();
			if (!is_array($categories)) {
				$categories = \TYPO3\CMS\Core\Utility\GeneralUtility::intExplode(',', $categories, TRUE);
			}           
            foreach ($categories as $category) 
			{
                $categoryConstraints[] = $query -> contains('categories', $category);
            }
            $constraints[] = $query -> logicalOr($categoryConstraints);
        }
		
        $funktionen = $demand -> getFunktionen();
        if ((!empty($funktionen))) 
		{
            $funktionConstraints = array();
			if (!is_array($funktionen)) {
				$funktionen = \TYPO3\CMS\Core\Utility\GeneralUtility::intExplode(',', $funktionen, TRUE);
			}           
            foreach ($funktionen as $funktion) 
			{
                $funktionConstraints[] = $query -> contains('funktionen', $funktion);
            }
            $constraints[] = $query -> logicalOr($funktionConstraints);
        }
		
		$institution = $demand -> getInstitution();
        if ((!empty($institution))) 
		{
			$constraints[] = $query -> contains('institutionen',$institution);
        }
		
        return $constraints;
    }
	
	protected function createOrdering() 
	{
        $orderings = array('nachname' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,'vorname' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING);
        return $orderings;
    }
}
