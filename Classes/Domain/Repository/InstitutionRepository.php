<?php
namespace OliverBauer\Bfbn\Domain\Repository;

use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Database\Query\QueryBuilder;
use TYPO3\CMS\Extbase\Persistence\Generic\Query;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;

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
 * The repository for Dienststellen und Schulen
 */
class InstitutionRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
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

        $query->matching(
            $query->logicalAnd(
                $query->equals('uid', $uid),
                $query->equals('deleted', 0)
            )
        );	
		
		return $query->execute()->getFirst();
    }

    /**
     * @param float $latitude
     * @param float $longitude
     * @param int $distance
     * @return QueryResultInterface|array of the locations
     * @throws \Doctrine\DBAL\Exception
     */
    public function findByRadius(float $latitude, float $longitude, int $distance, $storagePid)
    {

		$arrayOfPids = \TYPO3\CMS\Core\Utility\GeneralUtility::intExplode(',', $storagePid, TRUE);
		
		$distance = intval($distance)*10;
		$queryBuilder = GeneralUtility::makeInstance(\TYPO3\CMS\Core\Database\ConnectionPool::class)
			->getQueryBuilderForTable('tx_bfbn_domain_model_institution');

		$queryBuilder->from('tx_bfbn_domain_model_institution', 'a');
		$queryBuilder->selectLiteral(
					'distinct a.*', '(acos(sin(' . floatval($latitude * M_PI / 180) . ') * sin(breitengrad * ' . floatval(M_PI / 180) . ') + cos(' . floatval($latitude * M_PI / 180) . ') *
					cos(breitengrad * ' . floatval(M_PI / 180) . ') * cos((' . floatval($longitude) . ' - laengengrad) * ' . floatval(M_PI / 180) . '))) * 6370 as `distance`');		
		$queryBuilder->having('`distance` <= ' . $queryBuilder->createNamedParameter($distance, \PDO::PARAM_INT));
		$queryBuilder->where(
			$queryBuilder->expr()->in(
				'a.pid',
				$queryBuilder->createNamedParameter(
				$arrayOfPids,
				\Doctrine\DBAL\Connection::PARAM_INT_ARRAY
				)
			)
		);
		$queryBuilder->orderBy('distance');
		$result =  $queryBuilder->execute()->fetchAll();
		return $result;
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
		/** $queryParser = $this->objectManager->get(\TYPO3\CMS\Extbase\Persistence\Generic\Storage\Typo3DbQueryParser::class);

		\TYPO3\CMS\Core\Utility\DebugUtility::debug($queryParser->convertQueryToDoctrineQueryBuilder($query)->getSQL()); 	**/
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
		
        $ausbildungsrichtungen = $demand -> getAusbildungsrichtungen();
        if ((!empty($ausbildungsrichtungen))) 
		{
            $ausbildungsrichtungConstraints = array();
			if (!is_array($ausbildungsrichtungen)) {
				$ausbildungsrichtungen = \TYPO3\CMS\Core\Utility\GeneralUtility::intExplode(',', $ausbildungsrichtungen, TRUE);
			}           
            foreach ($ausbildungsrichtungen as $ausbildungsrichtung) 
			{
                $ausbildungsrichtungConstraints[] = $query -> contains('ausbildungsrichtungen', $ausbildungsrichtung);
            }
            $constraints[] = $query -> logicalOr($ausbildungsrichtungConstraints);
        }
		
        $sprachen = $demand -> getSprachen();
        if ((!empty($sprachen))) 
		{
            $sprachenConstraints = array();
			if (!is_array($sprachen)) {
				$sprachen = \TYPO3\CMS\Core\Utility\GeneralUtility::intExplode(',', $sprachen, TRUE);
			}           
            foreach ($sprachen as $sprache) 
			{
                $spracheConstraints[] = $query -> contains('sprachen', $sprache);
            }
            $constraints[] = $query -> logicalOr($spracheConstraints);
        }
		
		if ($demand -> isProfilinklusion()) {
			$constraints[] = $query -> equals('profilinklusion',TRUE);
		}
		
		if ($demand -> isIvk()) {
			$constraints[] = $query -> equals('ivk',TRUE);
		}
		
        $regierungsbezirke = $demand -> getRegierungsbezirk();
        if ((!empty($regierungsbezirke))) 
		{
			if (!is_array($regierungsbezirke)) {
				$regierungsbezirke = \TYPO3\CMS\Core\Utility\GeneralUtility::intExplode(',', $regierungsbezirke, TRUE);
			}           

            $constraints[] = $query -> in('regierungsbezirk',$regierungsbezirke);
        }

        $status = $demand -> getStatus();
        if ((!empty($status))) 
		{
			if (!is_array($status)) {
				$status = \TYPO3\CMS\Core\Utility\GeneralUtility::intExplode(',', $status, TRUE);
			}           

            $constraints[] = $query -> in('status',$status);
        }
		
        $bezirke = $demand -> getBezirk();
        if ((!empty($bezirke))) 
		{      
			if (!is_array($bezirke)) {
				$bezirke = \TYPO3\CMS\Core\Utility\GeneralUtility::intExplode(',', $bezirke, TRUE);
			}    
            $constraints[] = $query -> in('mbbezirk',$bezirke);
        }
		
		$bezeichnung = $demand -> getBezeichnung();
        if ((!empty($bezeichnung))) 
		{
			$constraints[] = $query->like('ort','%'.$bezeichnung.'%');

        }
		
		$vorart = $demand -> getVorart();
        if ((!empty($vorart))) 
		{
			if ($vorart == 1 && $demand->getSchulart() == 1){
				$constraints[] = $query -> equals('vorkursfos','1');
			}
			
			if ($vorart == 2 && $demand->getSchulart() == 1){
				$constraints[] = $query -> equals('vorklassefos','1');
			}
			
			if ($vorart == 1 && $demand->getSchulart() == 2){
				$constraints[] = $query -> equals('vorkursbos','1');
			}
			if ($vorart == 2 && $demand->getSchulart() == 2){
				$constraints[] = $query -> equals('vorklassebos','1');
			}
        }
		
		$institution = $demand -> getInstitution();
        if ((!empty($institution))) 
		{
			$constraints[] = $query -> equals('uid',$institution);
        }		
        return $constraints;
    }
        
    protected function createOrdering() 
	{
        $orderings = array('ort' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,'status' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING);
        return $orderings;
    }
	
    protected function createOrderingbyUid() 
	{
        $orderings = array('uid' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING);
        return $orderings;
    }

}
