<?php

namespace MbFosbos\Bfbn\ViewHelpers;

use TYPO3\CMS\Core\Database\Connection;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Database\Query\QueryBuilder;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithRenderStatic;

class UnfallstatistikDaViewHelper extends AbstractViewHelper
{
	use CompileWithRenderStatic;
	/**
	* Render ViewHelper
	* @param array $arguments
	* @param \Closure $renderChildrenClosure
	* @param RenderingContextInterface $renderingContext
	*/
    public function initializeArguments(): void
    {
        // registerArgument($name, $type, $description, $required, $defaultValue, $escape)
        $this->registerArgument('institution', 'int', 'Uid der Institution', true);
    }
	
	public static function renderStatic(array $arguments, \Closure $renderChildrenClosure, RenderingContextInterface $renderingContext)
	{
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