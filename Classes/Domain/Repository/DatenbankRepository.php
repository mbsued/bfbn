<?php
namespace MbFosbos\Bfbn\Domain\Repository;

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
}
