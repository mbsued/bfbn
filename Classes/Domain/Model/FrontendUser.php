<?php
declare(strict_types=1);

namespace MbFosbos\Bfbn\Domain\Model;


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
 * FrontendUser
 */
class FrontendUser extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
	/**
     * @var string
     */
    protected $company = '';
	
    /**
     * Sets the company value
     *
     * @param string $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }

    /**
     * Returns the company value
     *
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }	
}