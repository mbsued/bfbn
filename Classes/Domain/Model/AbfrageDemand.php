<?php
namespace MbFosbos\Bfbn\Domain\Model;


/***
 *
 * This file is part of the "BFBN" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2022 BFBN-Team <info@bfbn.de>, MB-Dienststellen FOSBOS
 *
 ***/
/**
 * Abfrage Demand
 */
class AbfrageDemand extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
    * @var int institution uid
    **/
    protected $institution;

    /**
     * Sets die gesuchte institution
     * 
     * @param int $institution
     * @return void
     */
    public function setInstitution($institution) {
		$this->institution = $institution;
    }

    /**
     * Returns die gesuchte institution
     * 
     * @return int $institution
     */
    public function getInstitution() {
		return $this->institution;
    }
}