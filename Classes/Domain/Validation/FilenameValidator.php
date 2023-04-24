<?php

declare(strict_types=1);

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

namespace OliverBauer\Bfbn\Domain\Validation;

use TYPO3\CMS\Core\Resource\File;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Form\Mvc\Property\TypeConverter\PseudoFile;
use TYPO3\CMS\Extbase\Validation\Validator\AbstractValidator;
use TYPO3\CMS\Form\Mvc\Validation\Exception\InvalidValidationOptionsException;

/**
 * Validator for filename
 *
 * Scope: frontend
 */
class FilenameValidator extends AbstractValidator
{

    /**
     * @var array
     */
    protected $supportedOptions = [
        'teil1' => [null, 'Teil1 des Dateinamens', 'string', true],
        'teil2' => [null, 'Teil2 des Dateinamens', 'string', true],
        'teil3' => [null, 'Teil3 des Dateinamens', 'string', true],
        'teil4' => [null, 'Teil4 des Dateinamens', 'string', true],
        'fileext' => [null, 'Extension der Datei', 'string', true],		
    ];

    /**
     * The given $value is valid the File matches the given filename
     *
     * Note: a value of NULL or empty string ('') is considered valid
     *
     * @param FileReference|File|PseudoFile $resource The resource that should be validated
     */
    public function isValid($resource)
    {
        $this->validateOptions();

        if ($resource instanceof FileReference) {
            $fileName = $resource->getOriginalResource()->getName();
            $fileExtension = $resource->getOriginalResource()->getExtension();
        } elseif ($resource instanceof File) {
            $fileName = $resource->getMimeType();
            $fileExtension = $resource->getExtension();
        } elseif ($resource instanceof PseudoFile) {
            $fileName = $resource->getName();
			/** print \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($fileName);	*/		
            $fileExtension = $resource->getExtension();
        } else {
            $this->addError(
                $this->translateErrorMessage(
                    'validation.error.1471708997',
                    'form'
                ) ?? '',
                1471708997
            );
            return;
        }

        $teil1 = $this->options['teil1'];
		$teil2 = $this->options['teil2'];
		$teil3 = $this->options['teil3'];
		$teil4 = $this->options['teil4'];
		$fileext = $this->options['fileext'];

		$givenFilename = $teil1.'_'.$teil2.'_'.$teil3.'_'.$teil4.'.'.$fileext;
		/** print \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($givenFilename);		*/
        if ($givenFilename != $fileName) {
            $this->addError(
                $this->translateErrorMessage(
                    'validation.error.1642678564',
                    'bfbn',
                    [$fileName]
                ) ?? '',
                1642678564,
                [$fileName]
            ); 
        }
    }

    /**
     * Checks if this validator is correctly configured
     *
     * @throws InvalidValidationOptionsException if the configured validation options are incorrect
     */
    protected function validateOptions()
    {
		if ($this->options['teil1']==NULL || $this->options['teil2']==NULL || $this->options['teil3']==NULL || $this->options['teil4']==NULL || $this->options['fileext']==NULL) {
			throw new InvalidValidationOptionsException('Die Optionen müssen gefüllt sein', 1471713296);	
		}
    }
}
