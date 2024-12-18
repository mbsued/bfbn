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
namespace MbFosbos\Bfbn\ViewHelpers\Iterator;

use MbFosbos\Bfbn\Utility\IteratorUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\Generic\LazyObjectStorage;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\CMS\Extbase\Reflection\ObjectAccess;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\ViewHelper\Exception;

/**
 * Copied from EXT:vhs
 *
 * Sorts an instance of ObjectStorage, an Iterator implementation,
 * an Array or a QueryResult (including Lazy counterparts).
 *
 * Can be used inline, i.e.:
 *
 * ```
 * <f:for each="{dataset -> v:iterator.sort(sortBy: 'name')}" as="item">
 *     // iterating data which is ONLY sorted while rendering this particular loop
 * </f:for>
 * ```
 */
 
class SortViewHelper extends AbstractViewHelper

{

    /**
     * @var boolean
     */
    protected $escapeChildren = false;

    /**
     * @var boolean
     */
    protected $escapeOutput = false;

    /**
     * Contains all flags that are allowed to be used
     * with the sorting functions
     *
     * @var array
     */
    protected static $allowedSortFlags = [
        'SORT_REGULAR',
        'SORT_STRING',
        'SORT_NUMERIC',
        'SORT_NATURAL',
        'SORT_LOCALE_STRING',
        'SORT_FLAG_CASE'
    ];

    public function initializeArguments(): void
    {
        $this->registerArgument('subject', 'mixed', 'The array/Traversable instance to sort');
        $this->registerArgument(
            'sortBy',
            'string',
            'Which property/field to sort by - leave out for numeric sorting based on indexes(keys)'
        );
        $this->registerArgument(
            'order',
            'string',
            'ASC, DESC, RAND or SHUFFLE. RAND preserves keys, SHUFFLE does not - but SHUFFLE is faster',
            false,
            'ASC'
        );
        $this->registerArgument(
            'sortFlags',
            'string',
            'Constant name from PHP for `SORT_FLAGS`: `SORT_REGULAR`, `SORT_STRING`, `SORT_NUMERIC`, ' .
            '`SORT_NATURAL`, `SORT_LOCALE_STRING` or `SORT_FLAG_CASE`. You can provide a comma seperated list or ' .
            'array to use a combination of flags.',
            false,
            'SORT_REGULAR'
        );
        $this->registerArgument(
            'as',
            'string',
            'Template variable name to assign; if not specified the ViewHelper returns the variable instead.'
        );
    }
    /**
     * "Render" method - sorts a target list-type target. Either $array or
     * $objectStorage must be specified. If both are, ObjectStorage takes precedence.
     *
     * Returns the same type as $subject. Ignores NULL values which would be
     * OK to use in an f:for (empty loop as result)
     *
     * @return mixed
     */
    public function render()
	{
		$arguments = $this->arguments;

        $candidate = $arguments['subject'] ?? $this->renderChildren();;
        if ($candidate instanceof ObjectStorage) {
            $sorted = $this->sortObjectStorage($candidate, $arguments);
        } elseif (!is_iterable($candidate)) {
            throw new Exception(
                'v:iterator.sort requires an "iterable" object or array, as "subject" argument or as child node.',
                1690469444
            );
        } else {
            $subject = IteratorUtility::arrayFromArrayOrTraversableOrCSV($candidate);
            $sorted = $this->sortArray($subject, $arguments);
        }
        if (!empty($arguments['as'])) {
            $variableProvider = $this->renderingContext->getVariableProvider();
            $variableProvider->add($arguments['as'], $sorted);
            return '';
        }
        return $sorted;
    }

    /**
     * Sort an array
     *
     * @param array|\Iterator $array
     * @param array $arguments
     * @return array
     */
    protected function sortArray($array, $arguments)
    {
        $sorted = [];
        foreach ($array as $index => $object) {
            if (isset($arguments['sortBy'])) {
                $index = $this->getSortValue($object, $arguments);
            }
            while (isset($sorted[$index])) {
                $index .= '.1';
            }
            $sorted[$index] = $object;
        }
        if ('ASC' === $arguments['order']) {
            ksort($sorted, $this->getSortFlags($arguments));
        } elseif ('RAND' === $arguments['order']) {
            $sortedKeys = array_keys($sorted);
            shuffle($sortedKeys);
            $backup = $sorted;
            $sorted = [];
            foreach ($sortedKeys as $sortedKey) {
                $sorted[$sortedKey] = $backup[$sortedKey];
            }
        } elseif ('SHUFFLE' === $arguments['order']) {
            shuffle($sorted);
        } else {
            krsort($sorted, $this->getSortFlags($arguments));
        }
        return $sorted;
    }
	
    /**
     * Sort an ObjectStorage instance
     *
     * @param ObjectStorage<object> $storage
     * @param array $arguments
     * @return ObjectStorage
     */
    protected function sortObjectStorage($storage, $arguments)
    {
        /** @var ObjectStorage $temp */
        $temp = GeneralUtility::makeInstance(ObjectStorage::class);
        foreach ($storage as $item) {
            $temp->attach($item);
        }
        $sorted = $this->sortArray($storage, $arguments);
        /** @var ObjectStorage $storage */
        $storage = GeneralUtility::makeInstance(ObjectStorage::class);
        foreach ($sorted as $item) {
            $storage->attach($item);
        }
        return $storage;
    }

    /**
     * Gets the value to use as sorting value from $object
     *
     * @param mixed $object
     * @param array $arguments
     * @return mixed
     */
    protected function getSortValue($object, $arguments)
    {
        $field = $arguments['sortBy'];
        $value = ObjectAccess::getPropertyPath($object, $field);
        if ($value instanceof \DateTimeInterface) {
            $value = (integer) $value->format('U');
        } elseif ($value instanceof ObjectStorage || $value instanceof LazyObjectStorage) {
            $value = $value->count();
        } elseif (is_array($value)) {
            $value = count($value);
        }
        return $value;
    }

    /**
     * Parses the supplied flags into the proper value for the sorting
     * function.
     *
     * @param array $arguments
     * @return int
     * @throws Exception
     */
    protected function getSortFlags($arguments)
    {
        $constants = IteratorUtility::arrayFromArrayOrTraversableOrCSV($arguments['sortFlags']);
        $flags = 0;
        foreach ($constants as $constant) {
            if (!in_array($constant, static::$allowedSortFlags)) {
                throw new Exception(
                    'The constant "' . $constant . '" you\'re trying to use as a sortFlag is not allowed. Allowed ' .
                    'constants are: ' . implode(', ', static::$allowedSortFlags) . '.',
                    1404220538
                );
            }
            $flags = $flags | constant(trim($constant));
        }
        return $flags;
    }	
}