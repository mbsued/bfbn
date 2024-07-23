<?php

namespace MbFosbos\Bfbn\ViewHelpers;

use TYPO3\CMS\Core\Database\Connection;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Database\Query\QueryBuilder;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithRenderStatic;

class AufgabenauswahlDaViewHelper extends AbstractViewHelper
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
		$this->registerArgument('schulart', 'int', 'Uid der Schulart', true);
		$this->registerArgument('jahrgangsstufe', 'int', 'Uid der Jahrgangsstufe', true);
    }
	
	public static function renderStatic(array $arguments, \Closure $renderChildrenClosure, RenderingContextInterface $renderingContext)
	{
		$queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tx_bfbn_domain_model_aufgabenauswahl');
		$whereExpressions = [
			$queryBuilder->expr()->eq('institution', $queryBuilder->createNamedParameter($arguments['institution'], Connection::PARAM_INT)),
			$queryBuilder->expr()->eq('schulart', $queryBuilder->createNamedParameter($arguments['schulart'], Connection::PARAM_INT)),
			$queryBuilder->expr()->eq('jahrgangsstufe', $queryBuilder->createNamedParameter($arguments['jahrgangsstufe'], Connection::PARAM_INT))
		];		
		$count = $queryBuilder
			->count('uid')
			->from('tx_bfbn_domain_model_aufgabenauswahl')
			->where(...$whereExpressions)
			->executeQuery()
			->fetchOne();
					
		return $count;

	}
}