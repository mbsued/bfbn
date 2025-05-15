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
 * nachtermin
 */
class Nachtermin extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
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
     * geschlecht
     * 
     * @var \MbFosbos\Bfbn\Domain\Model\Geschlecht
     */
    protected $geschlecht = null;

    /**
     * geburtsdatum
     * 
     * @var @var \MbFosbos\Bfbn\Domain\Model\DateTime
     */
    protected $geburtsdatum;

    /**
     * jahrgangsstufe
     * 
     * @var \MbFosbos\Bfbn\Domain\Model\Jahrgangsstufe
      */
    protected $jahrgangsstufe = null;

    /**
     * ausbildungsrichtung
     * 
     * @var \MbFosbos\Bfbn\Domain\Model\Ausbildungsrichtung
     */
    protected $ausbildungsrichtung = null;
	
    /**
     * deutsch
     * 
     * @var integer
     */
    protected $deutsch = false;

    /**
     * englisch
     * 
     * @var integer
     */
    protected $englisch = false;	

    /**
     * mathemathik
     * 
     * @var integer
     */
    protected $mathematik = false;
	
    /**
     * cas
     * 
     * @var integer
     */
    protected $cas = false;

    /**
     * fach4
     * 
     * @var integer
     */
    protected $fach4 = false;

    /**
     * gruppenpruefung
     * 
     * @var integer
     */
    protected $gruppenpruefung = false;

    /**
     * ergaenzungspruefung
     * 
     * @var integer
     */
    protected $ergaenzungspruefung = false;

    /**
     * sprache
     * 
     * @var \MbFosbos\Bfbn\Domain\Model\Sprache
     */
    protected $sprache = null;

    /**
     * nachweis
     * 
     * @var integer
     */
    protected $nachweis = false;

    /**
     * ersatzschule
     * 
     * @var integer
     */
    protected $ersatzschule = false;
	
    /**
     * institution
     * 
     * @var \MbFosbos\Bfbn\Domain\Model\Institution
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
     * Returns the geschlecht
     * 
     * @return \MbFosbos\Bfbn\Domain\Model\Geschlecht $geschlecht
     */
    public function getGeschlecht()
    {
        return $this->geschlecht;
    }

    /**
     * Sets the geschlecht
     * 
     * @param \MbFosbos\Bfbn\Domain\Model\Geschlecht $geschlecht
     * @return void
     */
    public function setGeschlecht(\MbFosbos\Bfbn\Domain\Model\Geschlecht $geschlecht)
    {
        $this->geschlecht = $geschlecht;
    }

    /**
     * Get geburtsdatum
     *
     * @return \MbFosbos\Bfbn\Domain\Model\DateTime
     */
    public function getGeburtsdatum()
    {
        return $this->geburtsdatum;
    }

    /**
     * Set geburtsdatum
     *
     * @param \MbFosbos\Bfbn\Domain\Model\DateTime $geburtsdatum
     *
     * @return void
     */
    public function setGeburtsdatum($geburtsdatum)
    {
        $this->geburtsdatum = $geburtsdatum;
    }		

    /**
     * Returns the jahrgangsstufe
     * 
     * @return \MbFosbos\Bfbn\Domain\Model\Jahrgangsstufe $jahrgangsstufe
     */
    public function getJahrgangsstufe()
    {
        return $this->jahrgangsstufe;
    }

    /**
     * Sets the jahrgangsstufe
     * 
     * @param \MbFosbos\Bfbn\Domain\Model\Jahrgangsstufe $jahrgangsstufe
     * @return void
     */
    public function setJahrgangsstufe(\MbFosbos\Bfbn\Domain\Model\Jahrgangsstufe $jahrgangsstufe)
    {
        $this->jahrgangsstufe = $jahrgangsstufe;
    }

    /**
     * Returns the ausbildungsrichtung
     * 
     * @return \MbFosbos\Bfbn\Domain\Model\Ausbildungsrichtung $ausbildungsrichtung
     */
    public function getAusbildungsrichtung()
    {
        return $this->ausbildungsrichtung;
    }

    /**
     * Sets the ausbildungsrichtung
     * 
     * @param \MbFosbos\Bfbn\Domain\Model\Ausbildungsrichtung $ausbildungsrichtung
     * @return void
     */
    public function setAusbildungsrichtung(\MbFosbos\Bfbn\Domain\Model\Ausbildungsrichtung $ausbildungsrichtung)
    {
        $this->ausbildungsrichtung = $ausbildungsrichtung;
    }

    /**
     * Returns deutsch
     * 
     * @return integer $deutsch
     */
    public function getDeutsch()
    {
        return $this->deutsch;
    }

    /**
     * Sets deutsch
     * 
     * @param integer $deutsch
     * @return void
     */
    public function setDeutsch(int $deutsch)
    {
        $this->deutsch = $deutsch;
    }

    /**
     * Returns englisch
     * 
     * @return integer $englisch
     */
    public function getEnglisch()
    {
        return $this->englisch;
    }

    /**
     * Sets englisch
     * 
     * @param integer $englisch
     * @return void
     */
    public function setEnglisch(int $englisch)
    {
        $this->englisch = $englisch;
    }

    /**
     * Returns mathematik
     * 
     * @return integer $mathematik
     */
    public function getMathematik()
    {
        return $this->mathematik;
    }

    /**
     * Sets mathematik
     * 
     * @param integer $mathematik
     * @return void
     */
    public function setMathematik(int $mathematik)
    {
        $this->mathematik = $mathematik;
    }

    /**
     * Returns cas
     * 
     * @return integer $cas
     */
    public function getCas()
    {
        return $this->cas;
    }

    /**
     * Sets cas
     * 
     * @param integer $cas
     * @return void
     */
    public function setCas(int $cas)
    {
        $this->cas = $cas;
    }

    /**
     * Returns fach4
     * 
     * @return integer $fach4
     */
    public function getFach4()
    {
        return $this->fach4;
    }

    /**
     * Sets fach4
     * 
     * @param integer $fach4
     * @return void
     */
    public function setFach4(int $fach4)
    {
        $this->fach4 = $fach4;
    }

    /**
     * Returns gruppenpruefung
     * 
     * @return integer $gruppenpruefung
     */
    public function getGruppenpruefung()
    {
        return $this->gruppenpruefung;
    }

    /**
     * Sets gruppenpruefung
     * 
     * @param integer $gruppenpruefung
     * @return void
     */
    public function setGruppenpruefung(int $gruppenpruefung)
    {
        $this->gruppenpruefung = $gruppenpruefung;
    }

    /**
     * Returns ergaenzungspruefung
     * 
     * @return integer $ergaenzungspruefung
     */
    public function getErgaenzungspruefung()
    {
        return $this->ergaenzungspruefung;
    }

    /**
     * Sets ergaenzungspruefung
     * 
     * @param integer $ergaenzungspruefung
     * @return void
     */
    public function setErgaenzungspruefung(int $ergaenzungspruefung)
    {
        $this->ergaenzungspruefung = $ergaenzungspruefung;
    }
	
    /**
     * Returns the sprache
     * 
     * @return @return \MbFosbos\Bfbn\Domain\Model\Sprache $sprache
     */
    public function getSprache()
    {
        return $this->sprache;
    }

    /**
     * Sets the sprache
     * 
     * @param \MbFosbos\Bfbn\Domain\Model\Sprache $sprache
     * @return void
     */
    public function setSprache(\MbFosbos\Bfbn\Domain\Model\Sprache $sprache = Null)
    {
        $this->sprache = $sprache;
    }

    /**
     * Returns nachweis
     * 
     * @return integer $nachweis
     */
    public function getNachweis()
    {
        return $this->nachweis;
    }
	
    /**
     * Sets nachweis
     * 
     * @param integer $nachweis
     * @return void
     */
    public function setNachweis(int $nachweis)
    {
        $this->nachweis = $nachweis;
    }

    /**
     * Returns ersatzschule
     * 
     * @return integer $ersatzschule
     */
    public function getErsatzschule()
    {
        return $this->ersatzschule;
    }
	
    /**
     * Sets ersatzchule
     * 
     * @param integer $ersatzschule
     * @return void
     */
    public function setErsatzschule(int $ersatzschule)
    {
        $this->ersatzschule = $ersatzschule;
    }
	
    /**
     * Returns the institution
     * 
     * @return \MbFosbos\Bfbn\Domain\Model\Institution $institution
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
