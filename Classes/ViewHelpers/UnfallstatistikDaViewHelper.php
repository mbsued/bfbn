<?php

namespace MbFosbos\Bfbn\ViewHelpers;

use TYPO3\CMS\Core\Database\Connection;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Database\Query\QueryBuilder;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

final class UnfallstatistikDaViewHelper extends AbstractViewHelper
{

    public function initializeArguments(): void
    {
        // registerArgument($name, $type, $description, $required, $defaultValue, $escape)
        $this->registerArgument('institution', 'int', 'Uid der Institution', true);
    }
	
	public function render(): string
	{
		$arguments = $this->arguments;
		$queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tx_bfbn_domain_model_unfallstatistik');
		$whereExpressions = [
			$queryBuilder->expr()->eq('institution', $queryBuilder->createNamedParameter($arguments['institution'], Connection::PARAM_INT))
		];		
		$count = $queryBuilder
			->count('uid')
			->from('tx_bfbn_domain_model_unfallstatistik')
			->where(...$whereExpressions)
			->executeQuery()
			->fetchOne();
					
		return $count;

	}
}