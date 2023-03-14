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
 * The repository for Person
 */
class PersonRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
	
    public function findAll()
    {
		$query = $this->createQuery();
		$query -> setOrderings($this -> createOrdering());		
        return $query->execute();
    }

    /**
     * 
     */
    public function findName($nachname)
    {
        $query = $this->createQuery();
        $query->matching($query->like('nachname', $nachname));
        return $query->execute();
    }
	
	protected function createOrdering() 
	{
        $orderings = array('nachname' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,'vorname' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING);
        return $orderings;
    }
}
