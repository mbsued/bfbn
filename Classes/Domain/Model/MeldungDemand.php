<?php
namespace MbFosbos\Bfbn\Domain\Model;


/***
 *
 * This file is part of the "BFBN" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2021 BFBN-Team <info@bfbn.de>, MB-Dienststellen FOSBOS
 *
 ***/
/**
 * Meldung Demand
 */
class MeldungDemand extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
    * @var int institution uid
    **/
    protected $institution;

    /**
    * @var int art uid
    **/
    protected $art;

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
	
    /**
     * Sets die gesuchte art
     * 
     * @param int $art
     * @return void
     */
    public function setArt($art) {
		$this->art = $art;
    }

    /**
     * Returns die gesuchte art
     * 
     * @return int $art
     */
    public function getArt() {
		return $this->art;
    }	
}
