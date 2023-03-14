<?php
namespace OliverBauer\Bfbn\Domain\Model;


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
 * Neubestellung
 */
class Neubestellung extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * nachname
     * 
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate ("StringLength", options={"minimum": 3, "maximum": 50})
	 * 
     */
    protected $nachname = '';

    /**
     * vorname
     * 
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate ("StringLength", options={"minimum": 3, "maximum": 50})
     */
    protected $vorname = '';

    /**
     * titel
     * 
     * @var string
     */
    protected $titel = '';

     /**
     * geschlecht
     * 
     * @var \OliverBauer\Bfbn\Domain\Model\Geschlecht
     */
    protected $geschlecht = null;

    /**
	 * erwerb
	 *
     * @var \OliverBauer\Bfbn\Domain\Model\DateTime
     */
    protected $erwerb;

    /**
	 * aktualisierung
	 *
     * @var \OliverBauer\Bfbn\Domain\Model\DateTime
     */
    protected $aktualisierung;

    /**
     * art
     * 
     * @var \OliverBauer\Bfbn\Domain\Model\Neubestellungart
     */
    protected $art = null;	

    /**
     * institution
     * 
     * @var \OliverBauer\Bfbn\Domain\Model\Institution
     */
    protected $institution = null;
	

    /**
     * Returns the nachname
     * 
     * @return string $nachname
     */
    public function getNachname()
    {
        return $this->nachname;
    }

    /**
     * Sets the nachname
     * 
     * @param string $nachname
     * @return void
     */
    public function setNachname($nachname)
    {
        $this->nachname = $nachname;
    }
	
    /**
     * Returns the vorname
     * 
     * @return string $vorname
     */
    public function getVorname()
    {
        return $this->vorname;
    }

    /**
     * Sets the vorname
     * 
     * @param string $vorname
     * @return void
     */
    public function setVorname($vorname)
    {
        $this->vorname = $vorname;
    }
	
    /**
     * Returns the titel
     * 
     * @return string $titel
     */
    public function getTitel()
    {
        return $this->titel;
    }

    /**
     * Sets the titel
     * 
     * @param string $titel
     * @return void
     */
    public function setTitel($titel)
    {
        $this->titel = $titel;
    }

    /**
     * Returns the geschlecht
     * 
     * @return \OliverBauer\Bfbn\Domain\Model\Geschlecht $geschlecht
     */
    public function getGeschlecht()
    {
        return $this->geschlecht;
    }

    /**
     * Sets the geschlecht
     * 
     * @param \OliverBauer\Bfbn\Domain\Model\Geschlecht $geschlecht
     * @return void
     */
    public function setGeschlecht(\OliverBauer\Bfbn\Domain\Model\Geschlecht $geschlecht)
    {
        $this->geschlecht = $geschlecht;
    }
	
    /**
     * Get erwerb
     *
     * @return \OliverBauer\Bfbn\Domain\Model\DateTime
     */
    public function getErwerb()
    {
        return $this->erwerb;
    }

    /**
     * Set erwerb
     *
     * @param \OliverBauer\Bfbn\Domain\Model\DateTime $erwerb
     *
     * @return void
     */
    public function setErwerb($erwerb)
    {
        $this->erwerb = $erwerb;
    }

    /**
     * Get aktualisierung
     *
     * @return \OliverBauer\Bfbn\Domain\Model\DateTime
     */
    public function getAktualisierung()
    {
        return $this->aktualisierung;
    }

    /**
     * Set aktualisierung
     *
     * @param \OliverBauer\Bfbn\Domain\Model\DateTime $aktualisierung
     *
     * @return void
     */
    public function setAktualisierung($aktualisierung)
    {
        $this->aktualisierung = $aktualisierung;
    }

    /**
     * Returns the art
     * 
     * @return \OliverBauer\Bfbn\Domain\Model\Neubestellungart $art
     */
    public function getArt()
    {
        return $this->art;
    }

    /**
     * Sets the art
     * 
     * @param \OliverBauer\Bfbn\Domain\Model\Neubestellungart  $art
     * @return void
     */
    public function setArt(\OliverBauer\Bfbn\Domain\Model\Neubestellungart $art = NULL)
    {
        $this->art = $art;
    }
	
    /**
     * Returns the institution
     * 
     * @return @return \OliverBauer\Bfbn\Domain\Model\Institution $institution
     */
    public function getInstitution()
    {
        return $this->institution;
    }

    /**
     * Sets the institution
     * 
     * @param \OliverBauer\Bfbn\Domain\Model\Institution $institution
     * @return void
     */
    public function setInstitution(\OliverBauer\Bfbn\Domain\Model\Institution $institution)
    {
        $this->institution = $institution;
    }	
}
