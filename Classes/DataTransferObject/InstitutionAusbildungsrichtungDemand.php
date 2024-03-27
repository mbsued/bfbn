<?php
namespace MbFosbos\Bfbn\DataTransferObject;

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
 * InstitutionAusbildungsrichtung Demand
 */
class InstitutionAusbildungsrichtungDemand
{

    /**
    * @var int search Schulart
    **/
    protected $schulart;

    /**
    * @var int search Ausbildungsrichtung
    **/
    protected $ausbildungsrichtung;
	

    /**
     * Sets die gesuchte Schulart
     * 
     * @param string $schulart
     * @return void
     */
    public function setSchulart($schulart) {
		$this->schulart = $schulart;
    }

    /**
     * Returns die gesuchte Schulart
     * 
     * @return string $schulart
     */
    public function getSchulart() {
		return $this->schulart;
    }
	
    /**
     * Sets die gesuchte ausbildungsrichtung
     * 
     * @param int $ausbildungsrichtung
     * @return void
     */
    public function setAusbildungsrichtung($ausbildungsrichtung) {
		$this->ausbildungsrichtung = $ausbildungsrichtung;
    }

    /**
     * Returns die gesuchte ausbildungsrichtung
     * 
     * @return int $ausbildungsrichtung
     */
    public function getAusbildungsrichtung() {
		return $this->ausbildungsrichtung;
    }	
}
