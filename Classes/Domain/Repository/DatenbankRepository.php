<?php
namespace MbFosbos\Bfbn\Domain\Repository;

use TYPO3\CMS\Core\Database\Connection;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Database\Query\QueryBuilder;

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
/**
 * The repository for Datebankzugriffe mit QueryBuilder
 */
class DatenbankRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

	private ConnectionPool $connectionPool;
	
	public function __construct(ConnectionPool $connectionPool)
	{
		$this->connectionPool = $connectionPool;
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
		/** $queryBuilder = GeneralUtility::makeInstance(\TYPO3\CMS\Core\Database\ConnectionPool::class)
			->getQueryBuilderForTable('tx_bfbn_domain_model_institution'); */
		$queryBuilder = $this->connectionPool->getQueryBuilderForTable('tx_bfbn_domain_model_institution');
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

    /**
     * @param int $fehlanzeige
     * @param int $meldung
     * @param int $institution
	 */	
	public function updateStatusNachtermin(int $institution, int $fehlanzeige, int $meldung)
	{
		$timestamp = time();
		$queryBuilder = $this->connectionPool->getQueryBuilderForTable('tx_bfbn_domain_model_statusnachtermin');
		$queryBuilder	
			->update('tx_bfbn_domain_model_statusnachtermin','t')
			->where($queryBuilder->expr()->eq('t.institution', $queryBuilder->createNamedParameter($institution, \PDO::PARAM_INT)))
			->set('t.fehlanzeige', $fehlanzeige)
			->set('t.meldung', $meldung)
			->set('t.tstamp', $timestamp)
			->executeStatement();
	}
	
    /**
     * @param int $institution
	 */		
	
	public function countNachtermin(int $institution)
	{
		$queryBuilder = $this->connectionPool->getQueryBuilderForTable('tx_bfbn_domain_model_nachtermin');
		$count = $queryBuilder
			->count('uid')
			->from('tx_bfbn_domain_model_nachtermin')
			->where(
				$queryBuilder->expr()->eq('institution', $queryBuilder->createNamedParameter($institution, \PDO::PARAM_INT))
				)
			->executeQuery()
			->fetchOne();
					
		return $count;
	}
	
    /**
     * @param int $art
     * @param int $bezirk	 
	 */		
	
	public function findNachterminStatus(int $art,int $bezirk)
	{
		$queryBuilder = $this->connectionPool->getQueryBuilderForTable('tx_bfbn_domain_model_statusnachtermin');
		$whereExpressions = [
			$queryBuilder->expr()->eq('tx_bfbn_domain_model_institution.mbbezirk', $queryBuilder->createNamedParameter($bezirk, Connection::PARAM_INT)),
			$queryBuilder->expr()->lt('tx_bfbn_domain_model_institution.status', $queryBuilder->createNamedParameter(4, Connection::PARAM_INT))
		];
		if ($art == 1) {
			$andwhereExpressions = [
				$queryBuilder->expr()->eq('tx_bfbn_domain_model_statusnachtermin.meldung', $queryBuilder->createNamedParameter(0, Connection::PARAM_INT)),
				$queryBuilder->expr()->eq('tx_bfbn_domain_model_statusnachtermin.fehlanzeige', $queryBuilder->createNamedParameter(0, Connection::PARAM_INT))		
			];
		}
		if ($art == 2) {
			$andwhereExpressions = [
				$queryBuilder->expr()->eq('tx_bfbn_domain_model_statusnachtermin.meldung', $queryBuilder->createNamedParameter(1, Connection::PARAM_INT))		
			];
		}
		if ($art == 3) {
			$andwhereExpressions = [
				$queryBuilder->expr()->eq('tx_bfbn_domain_model_statusnachtermin.fehlanzeige', $queryBuilder->createNamedParameter(1, Connection::PARAM_INT))		
			];
		}		
		$result = $queryBuilder
			->select('tx_bfbn_domain_model_institution.nummer','tx_bfbn_domain_model_institution.kurzbezeichnung','tx_bfbn_domain_model_statusnachtermin.tstamp')
			->from('tx_bfbn_domain_model_statusnachtermin')
			->join(
				'tx_bfbn_domain_model_statusnachtermin',
				'tx_bfbn_domain_model_institution',
				'tx_bfbn_domain_model_institution',
				$queryBuilder->expr()->eq('tx_bfbn_domain_model_institution.uid', $queryBuilder->quoteIdentifier('tx_bfbn_domain_model_statusnachtermin.institution'))
			)
			->where(...$whereExpressions)
			->andWhere(...$andwhereExpressions)
			->orderBy('tx_bfbn_domain_model_institution.nummer')
			->executeQuery();
					
		return $result->fetchAllAssociative();
	}		
}
