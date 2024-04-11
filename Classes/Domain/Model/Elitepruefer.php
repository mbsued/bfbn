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
 * Elitepruefer
 */
class Elitepruefer extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
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
     * amtsbezeichnung
     * 
     * @var string
     */
    protected $amtsbezeichnung = '';

     /**
     * geschlecht
     * 
     * @var \MbFosbos\Bfbn\Domain\Model\Geschlecht
     */
    protected $geschlecht = null;

    /**
     * email
     * 
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("EmailAddress")
     */
    protected $email = '';

    /**
     * bemerkung
     * 
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate ("StringLength", options={"minimum": 3, "maximum": 200})
     */
    protected $bemerkung = '';

    /**
     * fach1
     * 
     * @var \MbFosbos\Bfbn\Domain\Model\Fachelite
     */
    protected $fach1 = null;
	
    /**
     * fach2
     * 
     * @var \MbFosbos\Bfbn\Domain\Model\Fachelite
     */
    protected $fach2 = null;

    /**
     * fach3
     * 
     * @var \MbFosbos\Bfbn\Domain\Model\Fachelite
     */
    protected $fach3 = null;	

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
     * Returns the amtsbezeichnung
     * 
     * @return string $amtsbezeichnung
     */
    public function getAmtsbezeichnung()
    {
        return $this->amtsbezeichnung;
    }

    /**
     * Sets the amtsbezeichnung
     * 
     * @param string $amtsbezeichnung
     * @return void
     */
    public function setAmtsbezeichnung($amtsbezeichnung)
    {
        $this->amtsbezeichnung = $amtsbezeichnung;
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
     * Returns the email
     * 
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the email
     * 
     * @param string $email
     * @return void
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
	
    /**
     * Returns the bemerkung
     * 
     * @return string $bemerkung
     */
    public function getBemerkung()
    {
        return $this->bemerkung;
    }

    /**
     * Sets the bemerkung
     * 
     * @param string $bemerkung
     * @return void
     */
    public function setBemerkung($bemerkung)
    {
        $this->bemerkung = $bemerkung;
    }

    /**
     * Returns the fach1
     * 
     * @return \MbFosbos\Bfbn\Domain\Model\Fachelite $fach1
     */
    public function getFach1()
    {
        return $this->fach1;
    }

    /**
     * Sets the fach1
     * 
     * @param \MbFosbos\Bfbn\Domain\Model\Fachelite $fach1
     * @return void
     */
    public function setFach1(\MbFosbos\Bfbn\Domain\Model\Fachelite $fach1)
    {
        $this->fach1 = $fach1;
    }

    /**
     * Returns the fach2
     * 
     * @return \MbFosbos\Bfbn\Domain\Model\Fachelite $fach2
     */
    public function getFach2()
    {
        return $this->fach2;
    }

    /**
     * Sets the fach2
     * 
     * @param \MbFosbos\Bfbn\Domain\Model\Fachelite $fach2
     * @return void
     */
    public function setFach2(\MbFosbos\Bfbn\Domain\Model\Fachelite $fach2 = NULL)
    {
        $this->fach2 = $fach2;
    }

    /**
     * Returns the fach3
     * 
     * @return \MbFosbos\Bfbn\Domain\Model\Fachelite $fach3
     */
    public function getFach3()
    {
        return $this->fach3;
    }

    /**
     * Sets the fach3
     * 
     * @param \MbFosbos\Bfbn\Domain\Model\Fachelite $fach3
     * @return void
     */
    public function setFach3(\MbFosbos\Bfbn\Domain\Model\Fachelite $fach3 = NULL)
    {
        $this->fach3 = $fach3;
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
