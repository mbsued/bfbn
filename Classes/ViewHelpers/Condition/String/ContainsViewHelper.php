<?php
declare(strict_types=1);

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

namespace MbFosbos\Bfbn\ViewHelpers\Condition\String;

use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractConditionViewHelper;

/**
 * Based on EXT:vhs
 *
 * ### Condition: String contains substring
 *
 * Condition ViewHelper which renders the `then` child if provided
 * string $haystack contains provided string $needle.
 */
class ContainsViewHelper extends AbstractConditionViewHelper
{
    public function initializeArguments(): void
    {
        parent::initializeArguments();
        $this->registerArgument('haystack', 'string', 'haystack', true);
        $this->registerArgument('needle', 'string', 'need', true);
    }

    /**
     * @param ?array $arguments
     * @return bool
     */
    public static function verdict($arguments, RenderingContextInterface $renderingContext)
    {
        return is_array($arguments) && false !== strpos((string) $arguments['haystack'], (string) $arguments['needle']);
    }
}
