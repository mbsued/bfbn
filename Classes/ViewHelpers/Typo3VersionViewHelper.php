<?php

namespace MbFosbos\Bfbn\ViewHelpers;

use TYPO3\CMS\Core\Information\Typo3Version;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class Typo3VersionViewHelper extends AbstractViewHelper
{
	/**
	* Render ViewHelper
	* @param array $arguments
	* @param \Closure $renderChildrenClosure
	* @param RenderingContextInterface $renderingContext
	*/
	
	public static function renderStatic(array $arguments, \Closure $renderChildrenClosure, RenderingContextInterface $renderingContext)
	{
		$versionInformation = GeneralUtility::makeInstance(Typo3Version::class);
		return $versionInformation->getMajorVersion();
	}
}