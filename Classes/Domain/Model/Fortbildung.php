<?php
namespace MbFosbos\Bfbn\Domain\Model;

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
/**
 * Fortbildung
 */
class fortbildung extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * art
     * 
     * @var \MbFosbos\Bfbn\Domain\Model\Fortbildungart
     */
    protected $art = null;
	
    /**
     * thema
     * 
     * @var string
     */
    protected $thema = '';
	
    /**
     * fach
     * 
     * @var string
     */
    protected $fach = '';
	
    /**
     * zielgruppe
     * 
     * @var string
     */
    protected $zielgruppe = '';

    /**
     * inhalt
     * 
     * @var string
     */
    protected $inhalt = '';

    /**
     * referent
     * 
     * @var string
     */
    protected $referent = '';
				
    /**
     * institution
     * 
     * @var \MbFosbos\Bfbn\Domain\Model\Institution
     */
    protected $institution = null;
	
    /**
	 * tstamp
	 * 
     * @var \MbFosbos\Bfbn\Domain\Model\DateTime
     */
    protected $tstamp;

    /**
	 * crdate
	 *	
     * @var \MbFosbos\Bfbn\Domain\Model\DateTime
     */
    protected $crdate;
	
	
    /**
     * Returns the art
     * 
     * @return \MbFosbos\Bfbn\Domain\Model\Fortbildungart $art
     */
    public function getArt()
    {
        return $this->art;
    }

    /**
     * Sets the art
     * 
     * @param \MbFosbos\Bfbn\Domain\Model\Fortbildungart $art
     * @return void
     */
    public function setArt(\MbFosbos\Bfbn\Domain\Model\Fortbildungart $art)
    {
        $this->art = $art;
    }

    /**
     * @return string
     */
    public function getThema(): string
    {
        return $this->thema;
    }

    /**
     * @param string $thema
	 *
     */
    public function setThema(string $thema)
    {
        $this->thema = $thema;
    }

    /**
     * @return string
     */
    public function getFach(): string
    {
        return $this->fach;
    }

    /**
     * @param string $fach
	 *
     */
    public function setFach(string $fach)
    {
        $this->fach = $fach;
    }

    /**
     * @return string
     */
    public function getZielgruppe(): string
    {
        return $this->zielgruppe;
    }

    /**
     * @param string $zielgruppe
	 *
     */
    public function setZielgruppe(string $zielgruppe)
    {
        $this->zielgruppe = $zielgruppe;
    }

    /**
     * @return string
     */
    public function getInhalt(): string
    {
        return $this->inhalt;
    }

    /**
     * @param string $inhalt
	 *
     */
    public function setInhalt(string $inhalt)
    {
        $this->inhalt = $inhalt;
    }

    /**
     * @return string
     */
    public function getReferent(): string
    {
        return $this->referent;
    }

    /**
     * @param string $referent
	 *
     */
    public function setReferent(string $referent)
    {
        $this->referent = $referent;
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

    /**
     * Get timestamp
     *
     * @return \MbFosbos\Bfbn\Domain\Model\DateTime
     */
    public function getTstamp()
    {
        return $this->tstamp;
    }

    /**
     * Set timestamp
     *
     * @param \MbFosbos\Bfbn\Domain\Model\DateTime $tstamp 
     *
     * @return void
     */
    public function setTstamp($tstamp)
    {
        $this->tstamp = $tstamp;
    }

    /**
     * Get crdate
     *
     * @return \MbFosbos\Bfbn\Domain\Model\DateTime
     */
    public function getCrdate()
    {
        return $this->crdate;
    }

    /**
     * Set crdate
     *
     * @param \MbFosbos\Bfbn\Domain\Model\DateTime $crdate 
     *
     * @return void
     */
    public function setCrdate($crdate)
    {
        $this->crdate = $crdate;
    }		
}
