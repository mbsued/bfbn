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
 * Person
 */
class Person extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
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
     * 
     */
    protected $titel = '';

    /**
     * amtsbezeichnung
     * 
     * @var string
     * 
     */
	 
    protected $amtsbezeichnung = '';
    
	/**
     * emailfach
     * 
     * @var string
     * 
     */
	 
    protected $emailfach = '';	

    /**
     * arbeitetfuer
     * 
     * @var \OliverBauer\Bfbn\Domain\Model\MBbezirk
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $arbeitetfuer = null;

    /**
     * arbeitetfuer2
     * 
     * @var \OliverBauer\Bfbn\Domain\Model\MBbezirk
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $arbeitetfuer2 = null;

    
	/**
     * geschlecht
     * 
     * @var \OliverBauer\Bfbn\Domain\Model\Geschlecht
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy	 
     */
    protected $geschlecht = null;

    /**
	 * bestelltab
	 *
     * @var \OliverBauer\Bfbn\Domain\Model\DateTime
     */
    protected $bestelltab;	

    /**
     * funktionen
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\OliverBauer\Bfbn\Domain\Model\Funktion>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy	 
     */
    protected $funktionen = null;

    /**
     * institutionen
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\OliverBauer\Bfbn\Domain\Model\Institution>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy	 
     */
    protected $institutionen = null;
	
    /**
     * faecher
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\OliverBauer\Bfbn\Domain\Model\Fach>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy	 
     */
    protected $faecher = null;	

    /**
     * __construct
     */
    public function __construct()
    {

        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     * 
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->funktionen = $this->funktionen ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->institutionen = $this->institutionen ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->faecher = $this->faecher ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();		
    }

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
     * Returns the emailfach
     * 
     * @return string $emailfach
     */
    public function getEmailfach()
    {
        return $this->emailfach;
    }

    /**
     * Sets the emailfach
     * 
     * @param string $emailfach
     * @return void
     */
    public function setEmailfach($emailfach)
    {
        $this->emailfach = $emailfach;
    }

    /**
     * Returns the arbeitetfuer
     * 
     * @return \OliverBauer\Bfbn\Domain\Model\MBbezirk $arbeitetfuer
     */
    public function getArbeitetfuer()
    {
        return $this->arbeitetfuer;
    }

    /**
     * Sets the arbeitetfuer
     * 
     * @param \OliverBauer\Bfbn\Domain\Model\MBbezirk $arbeitetfuer
     * @return void
     */
    public function setArbeitetfuer(\OliverBauer\Bfbn\Domain\Model\MBbezirk $arbeitetfuer)
    {
        $this->arbeitetfuer = $arbeitetfuer;
    }

    /**
     * Returns the arbeitetfuer2
     * 
     * @return \OliverBauer\Bfbn\Domain\Model\MBbezirk $arbeitetfuer2
     */
    public function getArbeitetfuer2()
    {
        return $this->arbeitetfuer2;
    }

    /**
     * Sets the arbeitetfuer2
     * 
     * @param \OliverBauer\Bfbn\Domain\Model\MBbezirk $arbeitetfuer2
     * @return void
     */
    public function setArbeitetfuer2(\OliverBauer\Bfbn\Domain\Model\MBbezirk $arbeitetfuer2)
    {
        $this->arbeitetfuer2 = $arbeitetfuer2;
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
     * Get bestelltab
     *
     * @return \OliverBauer\Bfbn\Domain\Model\DateTime
     */
    public function getBestelltab()
    {
        return $this->bestelltab;
    }

    /**
     * Set bestelltab
     *
     * @param \OliverBauer\Bfbn\Domain\Model\DateTime $bestelltab
     *
     * @return void
     */
    public function setBestelltab($bestelltab)
    {
        $this->bestelltab = $bestelltab;
    }
	
    /**
     * Adds a Funktion
     * 
     * @param \OliverBauer\Bfbn\Domain\Model\Funktion $funktionen
     * @return void
     */
    public function addFunktionen(\OliverBauer\Bfbn\Domain\Model\Funktion $funktionen)
    {
        $this->funktionen->attach($funktionen);
    }

    /**
     * Removes a Funktion
     * 
     * @param \OliverBauer\Bfbn\Domain\Model\Funktion $funktionenToRemove The Funktion to be removed
     * @return void
     */
    public function removeFunktionen(\OliverBauer\Bfbn\Domain\Model\Funktion $funktionenToRemove)
    {
        $this->funktionen->detach($funktionenToRemove);
    }

    /**
     * Returns the funktionen
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\OliverBauer\Bfbn\Domain\Model\Funktion> funktionen
     */
    public function getFunktionen()
    {
        return $this->funktionen;
    }

    /**
     * Sets the funktionen
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\OliverBauer\Bfbn\Domain\Model\Funktion> $funktionen
     * @return void
     */
    public function setFunktionen(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $funktionen)
    {
        $this->funktionen = $funktionen;
    }
	
    /**
     * Adds a Institution
     * 
     * @param \OliverBauer\Bfbn\Domain\Model\Institution $institutionen
     * @return void
     */
    public function addInstitutionen(\OliverBauer\Bfbn\Domain\Model\Institution $institutionen)
    {
        $this->institutionen->attach($institutionen);
    }

    /**
     * Removes a Institution
     * 
     * @param \OliverBauer\Bfbn\Domain\Model\Institution $institutionenToRemove The Institution to be removed
     * @return void
     */
    public function removeInstitutionen(\OliverBauer\Bfbn\Domain\Model\Institution $institutionenToRemove)
    {
        $this->institutionen->detach($institutionenToRemove);
    }

    /**
     * Returns the institutionen
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\OliverBauer\Bfbn\Domain\Model\Institution> institutionen
     */
    public function getInstitutionen()
    {
        return $this->institutionen;
    }

    /**
     * Sets the institutionen
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\OliverBauer\Bfbn\Domain\Model\Institution> $institutionen
     * @return void
     */
    public function setInstitutionen(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $institutionen)
    {
        $this->institutionen = $institutionen;
    }

    /**
     * Adds a Fach
     * 
     * @param \OliverBauer\Bfbn\Domain\Model\Fach $faecher
     * @return void
     */
    public function addFaecher(\OliverBauer\Bfbn\Domain\Model\Fach $faecher)
    {
        $this->faecher->attach($faecher);
    }

    /**
     * Removes a Fach
     * 
     * @param \OliverBauer\Bfbn\Domain\Model\Fach $faecherToRemove The Fach to be removed
     * @return void
     */
    public function removeFaecher(\OliverBauer\Bfbn\Domain\Model\Person $faecherToRemove)
    {
        $this->faecher->detach($faecherToRemove);
    }

    /**
     * Returns the faecher
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\OliverBauer\Bfbn\Domain\Model\Fach> faecher
     */
    public function getFaecher()
    {
        return $this->faecher;
    }

    /**
     * Sets the faecher
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\OliverBauer\Bfbn\Domain\Model\fach> $faecher
     * @return void
     */
    public function setFaecher(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $faecher)
    {
        $this->faecher = $faecher;
    }		
}
