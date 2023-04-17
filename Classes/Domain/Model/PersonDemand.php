<?php
namespace OliverBauer\Bfbn\Domain\Model;


/***
 *
 * This file is part of the "BFBN" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2023 BFBN-Team <info@bfbn.de>, MB-Dienststellen FOSBOS
 *
 ***/
/**
 * Person Demand
 */
class PersonDemand extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * @var array
     */
    protected $categories;

    /** @var int */
    protected $storagePage;

    /**
    * @var array
    **/
    protected $funktionen;

	/**
    * @var \OliverBauer\Bfbn\Domain\Model\Institution
    **/
    protected $institution;
	
		
    /**
     * List of allowed categories
     *
     * @param array $categories categories
     * 
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;
        
    }

    /**
     * Get allowed categories
     *
     * @return array
     */
    public function getCategories()
    {
        return $this->categories;
    }

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
     * @return  institution
     */
    public function getInstitution() {
		return $this->institution;
    }
	
    /**
     * List of funktionen
     *
     * @param array $funktionen
     * 
     */
    public function setFunktionen($funktionen)
    {
        $this->funktionen = $funktionen;
        
    }

    /**
     * Get funktionen
     *
     * @return array
     */
    public function getFunktionen()
    {
        return $this->funktionen;
    }

}
