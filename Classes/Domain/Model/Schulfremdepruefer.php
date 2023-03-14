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
 * Schulfremdepruefer
 */
class Schulfremdepruefer extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
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
     * schule
     * 
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate ("StringLength", options={"minimum": 3, "maximum": 100})
     */
    protected $schule = '';

    /**
     * lehrbefaehigung
     * 
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate ("StringLength", options={"minimum": 3, "maximum": 50})
     */
    protected $lehrbefaehigung = '';

    /**
     * abschluss
     * 
     * @var \OliverBauer\Bfbn\Domain\Model\Abschluss
     */
    protected $abschluss = null;

    /**
     * fach1
     * 
     * @var \OliverBauer\Bfbn\Domain\Model\Fachkurz
     */
    protected $fach1 = null;
	
    /**
     * fach2
     * 
     * @var \OliverBauer\Bfbn\Domain\Model\Fachkurz
     */
    protected $fach2 = null;

    /**
     * fach3
     * 
     * @var \OliverBauer\Bfbn\Domain\Model\Fachkurz
     */
    protected $fach3 = null;	

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
     * Returns the schule
     * 
     * @return string $schule
     */
    public function getSchule()
    {
        return $this->schule;
    }

    /**
     * Sets the schule
     * 
     * @param string $schule
     * @return void
     */
    public function setSchule($schule)
    {
        $this->schule = $schule;
    }
	
    /**
     * Returns the lehrbefaehigung
     * 
     * @return string $lehrbefaehigung
     */
    public function getLehrbefaehigung()
    {
        return $this->lehrbefaehigung;
    }

    /**
     * Sets the lehrbefaehigung
     * 
     * @param string $lehrbefaehigung
     * @return void
     */
    public function setLehrbefaehigung($lehrbefaehigung)
    {
        $this->lehrbefaehigung = $lehrbefaehigung;
    }

    /**
     * Returns the abschluss
     * 
     * @return \OliverBauer\Bfbn\Domain\Model\Abschluss $abschluss
     */
    public function getAbschluss()
    {
        return $this->abschluss;
    }

    /**
     * Sets the abschluss
     * 
     * @param \OliverBauer\Bfbn\Domain\Model\Abschluss $abschluss
     * @return void
     */
    public function setAbschluss(\OliverBauer\Bfbn\Domain\Model\Abschluss $abschluss)
    {
        $this->abschluss = $abschluss;
    }

    /**
     * Returns the fach1
     * 
     * @return \OliverBauer\Bfbn\Domain\Model\Fachkurz $fach1
     */
    public function getFach1()
    {
        return $this->fach1;
    }

    /**
     * Sets the fach1
     * 
     * @param \OliverBauer\Bfbn\Domain\Model\Fachkurz $fach1
     * @return void
     */
    public function setFach1(\OliverBauer\Bfbn\Domain\Model\Fachkurz $fach1)
    {
        $this->fach1 = $fach1;
    }

    /**
     * Returns the fach2
     * 
     * @return \OliverBauer\Bfbn\Domain\Model\Fachkurz $fach2
     */
    public function getFach2()
    {
        return $this->fach2;
    }

    /**
     * Sets the fach2
     * 
     * @param \OliverBauer\Bfbn\Domain\Model\Fachkurz $fach2
     * @return void
     */
    public function setFach2(\OliverBauer\Bfbn\Domain\Model\Fachkurz $fach2 = NULL)
    {
        $this->fach2 = $fach2;
    }

    /**
     * Returns the fach3
     * 
     * @return \OliverBauer\Bfbn\Domain\Model\Fachkurz $fach3
     */
    public function getFach3()
    {
        return $this->fach3;
    }

    /**
     * Sets the fach3
     * 
     * @param \OliverBauer\Bfbn\Domain\Model\Fachkurz $fach3
     * @return void
     */
    public function setFach3(\OliverBauer\Bfbn\Domain\Model\Fachkurz $fach3 = NULL)
    {
        $this->fach3 = $fach3;
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
