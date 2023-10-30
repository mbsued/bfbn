<?php
namespace MbFosbos\Bfbn\Domain\Model;


/***
 *
 * This file is part of the "BFBN" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2022 
 *
 ***/
/**
 * Unfallstatistik
 */
class Unfallstatistik extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * schueler
     * 
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 9999})
	 * 
     */
    protected $schueler = 0;

    /**
     * unterricht
     * 
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})
     */
    protected $unterricht = 0;

    /**
     * sport
     * 
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})
     */
    protected $sport = 0;

     /**
     * pause
     * 
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})
     */
    protected $pause = 0;

    /**
	 * schulweg
	 *
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})
     */
    protected $schulweg = 0;

    /**
	 * schulwegpolizei
	 *
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})
     */
    protected $schulwegpolizei = 0;

    /**
     * sonstige
     * 
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})
     */
    protected $sonstige = 0;	

    /**
     * institution
     * 
     * @var \MbFosbos\Bfbn\Domain\Model\Institution
     */
    protected $institution = null;
	

    /**
     * Returns the schueler
     * 
     * @return int $schueler
     */
    public function getSchueler()
    {
        return $this->schueler;
    }

    /**
     * Sets the schueler
     * 
     * @param int $schueler
     * @return void
     */
    public function setSchueler($schueler)
    {
        $this->schueler = $schueler;
    }
	
    /**
     * Returns the unterricht
     * 
     * @return int $unterricht
     */
    public function getUnterricht()
    {
        return $this->unterricht;
    }

    /**
     * Sets the unterricht
     * 
     * @param int $unterricht
     * @return void
     */
    public function setUnterricht($unterricht)
    {
        $this->unterricht = $unterricht;
    }
	
    /**
     * Returns the sport
     * 
     * @return int $sport
     */
    public function getSport()
    {
        return $this->sport;
    }

    /**
     * Sets the sport
     * 
     * @param int $sport
     * @return void
     */
    public function setSport($sport)
    {
        $this->sport = $sport	;
    }

    /**
     * Returns the pause
     * 
     * @return int $pause
     */
    public function getPause()
    {
        return $this->pause;
    }

    /**
     * Sets the pause
     * 
     * @param int $pause
     * @return void
     */
    public function setPause($pause)
    {
        $this->pause = $pause;
    }
	
    /**
     * Get schulweg
     *
     * @return int $schulweg
     */
    public function getSchulweg()
    {
        return $this->schulweg;
    }

    /**
     * Set schulweg
     *
     * @param int $schulweg
     *
     * @return void
     */
    public function setSchulweg($schulweg)
    {
        $this->schulweg = $schulweg;
    }

    /**
     * Get schulwegpolizei
     *
     * @return int $schulwegpolizei
     */
    public function getSchulwegpolizei()
    {
        return $this->schulwegpolizei;
    }

    /**
     * Set schulwegpolizei
     *
     * @param int $schulwegpolizei
     *
     * @return void
     */
    public function setSchulwegpolizei($schulwegpolizei)
    {
        $this->schulwegpolizei = $schulwegpolizei;
    }

    /**
     * Returns the sonstige
     * 
     * @return int $sonstige
     */
    public function getSonstige()
    {
        return $this->sonstige;
    }

    /**
     * Sets the sonstige
     * 
     * @param int  $sonstige
     * @return void
     */
    public function setSonstige($sonstige)
    {
        $this->sonstige = $sonstige;
    }
	
    /**
     * Returns the institution
     * 
     * @return @return \MbFosbos\Bfbn\Domain\Model\Institution $institution
     */
    public function getInstitution()
    {
        return $this->institution;
    }

    /**
     * Sets the institution
     * 
     * @param \MbFosbos\Bfbn\Domain\Model\Institution $institution
     * @return void
     */
    public function setInstitution(\MbFosbos\Bfbn\Domain\Model\Institution $institution)
    {
        $this->institution = $institution;
    }	
}
