<?php
namespace MbFosbos\Bfbn\DataTransferObject;


/***
 *
 * This file is part of the "BFBN" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2024 BFBN-Team <info@bfbn.de>, MB-Dienststellen FOSBOS
 *
 ***/
/**
 * Fortbildung Demand
 */
class FortbildungDemand
{


    /** @var int */
    protected $storagePage;

    /**
    * @var array
    **/
    protected $bezirk;



    /**
     * Set list of storage pages
     *
     * @param string $storagePage storage page list
     * 
     */
    public function setStartingPoint($storagePage)
    {
        $this->storagePage = $storagePage;
        
    }

    /**
     * Get list of storage pages
     *
     * @return string
     */
    public function getStartingPoint()
    {
        return $this->storagePage;
    }


    /**
     * Sets den Bezirk
     * 
     * @param array $bezirk
     * @return void
     */
    public function setBezirk($bezirk) {
		$this->bezirk = $bezirk;
    }

    /**
     * Returns Bezirk
     * 
     * @return array
     */
    public function getBezirk() {
		return $this->bezirk;
    }
	
}
