<?php
declare(strict_types=1);

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
 * Institution
 */
class Institution extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * bezeichnung
     * 
     * @var string
     */
    protected $bezeichnung = '';

    /**
     * kurzbezeichnung
     * 
     * @var string
     */
    protected $kurzbezeichnung = '';

    /**
     * nummer
     * 
     * @var string
     */
    protected $nummer = '';

    /**
     * strasse
     * 
     * @var string
     */
    protected $strasse = '';

    /**
     * plz
     * 
     * @var string
     */
    protected $plz = '';

    /**
     * ort
     * 
     * @var string
     */
    protected $ort = '';

    /**
     * bezeichnungfos
     * 
     * @var string
     */
    protected $bezeichnungfos = '';

    /**
     * kurzbezeichnungfos
     * 
     * @var string
     */
    protected $kurzbezeichnungfos = '';

    /**
     * nummerfos
     * 
     * @var string
     */
    protected $nummerfos = '';

    /**
     * bezeichnungbos
     * 
     * @var string
     */
    protected $bezeichnungbos = '';

    /**
     * kurzbezeichnungbos
     * 
     * @var string
     */
    protected $kurzbezeichnungbos = '';

    /**
     * nummerbos
     * 
     * @var string
     */
    protected $nummerbos = '';

    /**
     * telefon
     * 
     * @var string
     */
    protected $telefon = '';

    /**
     * fax
     * 
     * @var string
     */
    protected $fax = '';

    /**
     * email
     * 
     * @var string
	 * @TYPO3\CMS\Extbase\Annotation\Validate("EmailAddress")
     */
    protected $email = '';

    /**
     * homepage
     * 
     * @var string
     */
    protected $homepage = '';

     /**
     * laengengrad
     * 
     * @var string
     */
    protected $laengengrad = '';

    /**
     * breitengrad
     * 
     * @var string
     */
    protected $breitengrad = '';

 /**
     * regierungsbezirk
     * 
     * @var \MbFosbos\Bfbn\Domain\Model\Regierungsbezirk
     */
    protected $regierungsbezirk = null;

    /**
     * mbbezirk
     * 
     * @var \MbFosbos\Bfbn\Domain\Model\MBbezirk
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $mbbezirk = null;

    /**
     * mbbezirk2
     * 
     * @var \MbFosbos\Bfbn\Domain\Model\MBbezirk
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $mbbezirk2 = null;


    /**
     * status
     * 
     * @var \MbFosbos\Bfbn\Domain\Model\Institutionstatus
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $status = null;

    /**
     * art
     * 
     * @var \MbFosbos\Bfbn\Domain\Model\Institutionart
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $art = null;
	
    /**
     * vorklassefos
     * 
     * @var integer
     */
    protected $vorklassefos = false;

    /**
     * vorklassebos
     * 
     * @var integer
     */
    protected $vorklassebos = false;

    /**
     * vorkursfos
     * 
     * @var integer 
     */
    protected $vorkursfos = false;

    /**
     * vorkursbos
     * 
     * @var integer 
     */
    protected $vorkursbos = false;

    /**
     * vorkursartbos
     * 
     * @var \MbFosbos\Bfbn\Domain\Model\Vorkursart
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $vorkursartbos = null;

    /**
     * vorkurstagbos
     * 
     * @var \MbFosbos\Bfbn\Domain\Model\Vorkurstag
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $vorkurstagbos = null;

    /**
     * vorkursartfos
	 *
     * 
     * @var \MbFosbos\Bfbn\Domain\Model\Vorkursart
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $vorkursartfos = null;

    /**
     * vorkurstagfos
     * 
     * @var \MbFosbos\Bfbn\Domain\Model\Vorkurstag
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy	 
     */
    protected $vorkurstagfos = null;

    /**
     * bosteilzeit
     * 
     * @var integer
     */
    protected $bosteilzeit = false;

    /**
     * dbfh
     * 
     * @var integer
     */
    protected $dbfh = false;

    /**
     * profilinklusion
     * 
     * @var integer
     */	 
    protected $profilinklusion = false;
	
    /**
     * ivk
     * 
     * @var integer
     */
    protected $ivk = false;
	
    /**
     * hinweis
     * 
     * @var string
     */
    protected $hinweis = '';
	
	/**
     * ausbildungsrichtungen
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\MbFosbos\Bfbn\Domain\Model\InstitutionAusbildungsrichtung>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy	 
     */
    protected $ausbildungsrichtungen = null;

    /**
     * sprachen
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\MbFosbos\Bfbn\Domain\Model\InstitutionSprache>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy	 
     */
	 
    protected $sprachen = null;
	
    /**
     * sprachen int w
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\MbFosbos\Bfbn\Domain\Model\Spracheintw>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $sprachenintw = null;
	
	/**
	* personen
	*
	* @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\MbFosbos\Bfbn\Domain\Model\Person>
    * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
	*/
	protected $personen = null;	

	/**
	* bearbeiter
	*
	* @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\MbFosbos\Bfbn\Domain\Model\Bearbeiter>
    * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy	
	*/
	protected $bearbeiter = null;	
		
	/**
     * Kategorien
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
	 *
     */
    protected $categories = null;

	/**
	* @var string
	*/
	protected $startingpoint;
	
    /**
     * __construct
     */
    public function __construct()
    {

        //Do not remove the next line: It would break the functionality
        $this->initializeObject();
    }

    /**
     * Initializes all ObjectStorage properties when model is reconstructed from DB (where __construct is not called)
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     * 
     * @return void
     */
    protected function initializeObject()	
    {
        $this->ausbildungsrichtungen = $this->ausbildungsrichtungen ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->sprachen = $this->sprachen ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->sprachenintw = $this->sprachenintw ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->personen = $this->personen ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();	
        $this->categories = $this->categories ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->usergroup = $this->usergroup ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }	

    /**
     * Returns the bezeichnung
     * 
     * @return string $bezeichnung
     */
    public function getBezeichnung()
    {
        return $this->bezeichnung;
    }

    /**
     * Sets the bezeichnung
     * 
     * @param string $bezeichnung
     * @return void
     */
    public function setBezeichnung($bezeichnung)
    {
        $this->bezeichnung = $bezeichnung;
    }

    /**
     * Returns the kurzbezeichnung
     * 
     * @return string $kurzbezeichnung
     */
    public function getKurzbezeichnung()
    {
        return $this->kurzbezeichnung;
    }

    /**
     * Sets the kurzbezeichnung
     * 
     * @param string $kurzbezeichnung
     * @return void
     */
    public function setKurzbezeichnung($kurzbezeichnung)
    {
        $this->kurzbezeichnung = $kurzbezeichnung;
    }

    /**
     * Returns the nummer
     * 
     * @return string $nummer
     */
    public function getNummer()
    {
        return $this->nummer;
    }

    /**
     * Sets the nummer
     * 
     * @param string $nummer
     * @return void
     */
    public function setNummer($nummer)
    {
        $this->nummer = $nummer;
    }

    /**
     * Returns the strasse
     * 
     * @return string $strasse
     */
    public function getStrasse()
    {
        return $this->strasse;
    }

    /**
     * Sets the strasse
     * 
     * @param string $strasse
     * @return void
     */
    public function setStrasse($strasse)
    {
        $this->strasse = $strasse;
    }

    /**
     * Returns the plz
     * 
     * @return string $plz
     */
    public function getPlz()
    {
        return $this->plz;
    }

    /**
     * Sets the plz
     * 
     * @param string $plz
     * @return void
     */
    public function setPlz($plz)
    {
        $this->plz = $plz;
    }

    /**
     * Returns the ort
     * 
     * @return string $ort
     */
    public function getOrt()
    {
        return $this->ort;
    }

    /**
     * Sets the ort
     * 
     * @param string $ort
     * @return void
     */
    public function setOrt($ort)
    {
        $this->ort = $ort;
    }

    /**
     * Returns the bezeichnungfos
     * 
     * @return string $bezeichnungfos
     */
    public function getBezeichnungfos()
    {
        return $this->bezeichnungfos;
    }

    /**
     * Sets the bezeichnungfos
     * 
     * @param string $bezeichnungfos
     * @return void
     */
    public function setBezeichnungfos($bezeichnungfos)
    {
        $this->bezeichnungfos = $bezeichnungfos;
    }

    /**
     * Returns the kurzbezeichnungfos
     * 
     * @return string $kurzbezeichnungfos
     */
    public function getKurzbezeichnungfos()
    {
        return $this->kurzbezeichnungfos;
    }

    /**
     * Sets the kurzbezeichnungfos
     * 
     * @param string $kurzbezeichnungfos
     * @return void
     */
    public function setKurzbezeichnungfos($kurzbezeichnungfos)
    {
        $this->kurzbezeichnungfos = $kurzbezeichnungfos;
    }

    /**
     * Returns the nummerfos
     * 
     * @return string $nummerfos
     */
    public function getNummerfos()
    {
        return $this->nummerfos;
    }

    /**
     * Sets the nummerfos
     * 
     * @param string $nummerfos
     * @return void
     */
    public function setNummerfos($nummerfos)
    {
        $this->nummerfos = $nummerfos;
    }

    /**
     * Returns the bezeichnungbos
     * 
     * @return string $bezeichnungbos
     */
    public function getBezeichnungbos()
    {
        return $this->bezeichnungbos;
    }

    /**
     * Sets the bezeichnungbos
     * 
     * @param string $bezeichnungbos
     * @return void
     */
    public function setBezeichnungbos($bezeichnungbos)
    {
        $this->bezeichnungbos = $bezeichnungbos;
    }

    /**
     * Returns the kurzbezeichnungbos
     * 
     * @return string $kurzbezeichnungbos
     */
    public function getKurzbezeichnungbos()
    {
        return $this->kurzbezeichnungbos;
    }

    /**
     * Sets the kurzbezeichnungbos
     * 
     * @param string $kurzbezeichnungbos
     * @return void
     */
    public function setKurzbezeichnungbos($kurzbezeichnungbos)
    {
        $this->kurzbezeichnungbos = $kurzbezeichnungbos;
    }

    /**
     * Returns the nummerbos
     * 
     * @return string $nummerbos
     */
    public function getNummerbos()
    {
        return $this->nummerbos;
    }

    /**
     * Sets the nummerbos
     * 
     * @param string $nummerbos
     * @return void
     */
    public function setNummerbos($nummerbos)
    {
        $this->nummerbos = $nummerbos;
    }

    /**
     * Returns the telefon
     * 
     * @return string $telefon
     */
    public function getTelefon()
    {
        return $this->telefon;
    }

    /**
     * Sets the telefon
     * 
     * @param string $telefon
     * @return void
     */
    public function setTelefon($telefon)
    {
        $this->telefon = $telefon;
    }

    /**
     * Returns the fax
     * 
     * @return string $fax
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Sets the fax
     * 
     * @param string $fax
     * @return void
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
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
     * Returns the homepage
     * 
     * @return string $homepage
     */
    public function getHomepage()
    {
        return $this->homepage;
    }

    /**
     * Sets the homepage
     * 
     * @param string $homepage
     * @return void
     */
    public function setHomepage($homepage)
    {
        $this->homepage = $homepage;
    }
	
    /**
     * Returns the laengengrad
     * 
     * @return string $laengengrad
     */
    public function getLaengengrad()
    {
        return $this->laengengrad;
    }

    /**
     * Sets the laengengrad
     * 
     * @param string $laengengrad
     * @return void
     */
    public function setLaengengrad($laengengrad)
    {
        $this->laengengrad = $laengengrad;
    }

    /**
     * Returns the breitengrad
     * 
     * @return string $breitengrad
     */
    public function getBreitengrad()
    {
        return $this->breitengrad;
    }

    /**
     * Sets the breitengrad
     * 
     * @param string $breitengrad
     * @return void
     */
    public function setBreitengrad($breitengrad)
    {
        $this->breitengrad = $breitengrad;
    }

    /**
     * Returns the regierungsbezirk
     * 
     * @return \MbFosbos\Bfbn\Domain\Model\Regierungsbezirk $regierungsbezirk
     */
    public function getRegierungsbezirk()
    {
        return $this->regierungsbezirk;
    }

    /**
     * Sets the regierungsbezirk
     * 
     * @param \MbFosbos\Bfbn\Domain\Model\Regierungsbezirk $regierungsbezirk
     * @return void
     */
    public function setRegierungsbezirk(\MbFosbos\Bfbn\Domain\Model\Regierungsbezirk $regierungsbezirk)
    {
        $this->regierungsbezirk = $regierungsbezirk;
    }

    /**
     * Returns the mbbezirk
     * 
     * @return \MbFosbos\Bfbn\Domain\Model\MBbezirk $mbbezirk
     */
    public function getMbbezirk()
    {
        return $this->mbbezirk;
    }

    /**
     * Sets the mbbezirk
     * 
     * @param \MbFosbos\Bfbn\Domain\Model\MBbezirk $mbbezirk
     * @return void
     */
    public function setMbbezirk(\MbFosbos\Bfbn\Domain\Model\MBbezirk $mbbezirk)
    {
        $this->mbbezirk = $mbbezirk;
    }

    /**
     * Returns the mbbezirk2
     * 
     * @return \MbFosbos\Bfbn\Domain\Model\MBbezirk $mbbezirk2
     */
    public function getMbbezirk2()
    {
        return $this->mbbezirk2;
    }

    /**
     * Sets the mbbezirk2
     * 
     * @param \MbFosbos\Bfbn\Domain\Model\MBbezirk $mbbezirk2
     * @return void
     */
    public function setMbbezirk2(\MbFosbos\Bfbn\Domain\Model\MBbezirk $mbbezirk2)
    {
        $this->mbbezirk2 = $mbbezirk2;
    }

    /**
     * Returns the status
     * 
     * @return \MbFosbos\Bfbn\Domain\Model\Institutionstatus $status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets the status
     * 
     * @param \MbFosbos\Bfbn\Domain\Model\Institutionstatus $status
     * @return void
     */
    public function setStatus(\MbFosbos\Bfbn\Domain\Model\Institutionstatus $status)
    {
        $this->status = $status;
    }

    /**
     * Returns the art
     * 
     * @return \MbFosbos\Bfbn\Domain\Model\Institutionart $art
     */
    public function getArt()
    {
        return $this->art;
    }

    /**
     * Sets the art
     * 
     * @param \MbFosbos\Bfbn\Domain\Model\Institutionart $art
     * @return void
     */
    public function setArt(\MbFosbos\Bfbn\Domain\Model\Institutionart $art)
    {
        $this->art = $art;
    }
	
    /**
     * Returns the vorklassefos
     * 
     * @return integer $vorklassefos
     */
    public function getVorklassefos()
    {
        return $this->vorklassefos;
    }

    /**
     * Sets the vorklassefos
     * 
     * @param integer $vorklassefos
     * @return void
     */
    public function setVorklassefos($vorklassefos)
    {
        $this->vorklassefos = $vorklassefos;
    }

    /**
     * Returns the vorklassebos
     * 
     * @return integer $vorklassebos
     */
    public function getVorklassebos()
    {
        return $this->vorklassebos;
    }

    /**
     * Sets the vorklassebos
     * 
     * @param integer $vorklassebos
     * @return void
     */
    public function setVorklassebos($vorklassebos)
    {
        $this->vorklassebos = $vorklassebos;
    }

    /**
     * Returns the vorkursfos
     * 
     * @return integer $vorkursfos
     */
    public function getVorkursfos()
    {
        return $this->vorkursfos;
    }

    /**
     * Sets the vorkursfos
     * 
     * @param integer $vorkursfos
     * @return void
     */
    public function setVorkursfos($vorkursfos)
    {
        $this->vorkursfos = $vorkursfos;
    }

    /**
     * Returns the vorkursbos
     * 
     * @return integer $vorkursbos
     */
    public function getVorkursbos()
    {
        return $this->vorkursbos;
    }

    /**
     * Sets the vorkursbos
     * 
     * @param integer $vorkursbos
     * @return void
     */
    public function setVorkursbos($vorkursbos)
    {
        $this->vorkursbos = $vorkursbos;
    }

    /**
     * Returns the vorkursartbos
     * 
     * @return \MbFosbos\Bfbn\Domain\Model\Vorkursart $vorkursartbos
     */
    public function getVorkursartbos()
    {
        return $this->vorkursartbos;
    }

    /**
     * Sets the vorkursartbos
     * 
     * @param \MbFosbos\Bfbn\Domain\Model\Vorkursart $vorkursartbos
     * @return void
     */
    public function setVorkursartbos(\MbFosbos\Bfbn\Domain\Model\Vorkursart $vorkursartbos = NULL)
    {
        $this->vorkursartbos = $vorkursartbos;
    }

    /**
     * Returns the vorkurstagbos
     * 
     * @return \MbFosbos\Bfbn\Domain\Model\Vorkurstag $vorkurstagbos
     */
    public function getVorkurstagbos()
    {
        return $this->vorkurstagbos;
    }

    /**
     * Sets the vorkurstagbos
     * 
     * @param \MbFosbos\Bfbn\Domain\Model\Vorkurstag $vorkurstagbos
     * @return void
     */
    public function setVorkurstagbos(\MbFosbos\Bfbn\Domain\Model\Vorkurstag $vorkurstagbos = NULL)
    {
        $this->vorkurstagbos = $vorkurstagbos;
    }

    /**
     * Returns the vorkursartfos
     * 
     * @return \MbFosbos\Bfbn\Domain\Model\Vorkursart $vorkursartfos
     */
    public function getVorkursartfos()
    {
        return $this->vorkursartfos;
    }

    /**
     * Sets the vorkursartfos
     * 
     * @param \MbFosbos\Bfbn\Domain\Model\Vorkursart $vorkursartfos
     * @return void
     */
    public function setVorkursartfos(\MbFosbos\Bfbn\Domain\Model\Vorkursart $vorkursartfos = NULL)
    {
        $this->vorkursartfos = $vorkursartfos;
    }

    /**
     * Returns the vorkurstagfos
     * 
     * @return \MbFosbos\Bfbn\Domain\Model\Vorkurstag $vorkurstagfos
     */
    public function getVorkurstagfos()
    {
        return $this->vorkurstagfos;
    }

    /**
     * Sets the vorkurstagfos
     * 
     * @param \MbFosbos\Bfbn\Domain\Model\Vorkurstag $vorkurstagfos
     * @return void
     */
    public function setVorkurstagfos(\MbFosbos\Bfbn\Domain\Model\Vorkurstag $vorkurstagfos = NULL)
    {
        $this->vorkurstagfos = $vorkurstagfos;
    }

    /**
     * Returns the bosteilzeit
     * 
     * @return integer $bosteilzeit
     */
    public function getBosteilzeit()
    {
        return $this->bosteilzeit;
    }

    /**
     * Sets the bosteilzeit
     * 
     * @param integer $bosteilzeit
     * @return void
     */
    public function setBosteilzeit($bosteilzeit)
    {
        $this->bosteilzeit = $bosteilzeit;
    }

    /**
     * Returns the dbfh
     * 
     * @return integer $dbfh
     */
    public function getDbfh()
    {
        return $this->dbfh;
    }

    /**
     * Sets the dbfh
     * 
     * @param integer $dbfh
     * @return void
     */
    public function setDbfh($dbfh)
    {
        $this->dbfh = $dbfh;
    }

    /**
     * Returns the profilinklusion
     * 
     * @return integer $profilinklusion
     */
    public function getProfilinklusion()
    {
        return $this->profilinklusion;
    }

    /**
     * Sets the profilinklusion
     * 
     * @param integer $profilinklusion
     * @return void
     */
    public function setProfilinklusion($profilinklusion)
    {
        $this->profilinklusion = $profilinklusion;
    }

    /**
     * Returns the ivk
     * 
     * @return integer $ivk
     */
    public function getIvk()
    {
        return $this->ivk;
    }

    /**
     * Sets the ivk
     * 
     * @param integer $ivk
     * @return void
     */
    public function setIvk($ivk)
    {
        $this->ivk = $ivk;
    }
		
    /**
     * Returns the hinweis
     * 
     * @return string $hinweis
     */
    public function getHinweis()
    {
        return $this->hinweis;
    }

    /**
     * Sets the hinweis
     * 
     * @param string $hinweis
     * @return void
     */
    public function setHinweis($hinweis)
    {
        $this->hinweis = $hinweis;
    }

    /**
     * Adds a InstitutionAusbildungsrichtung
     * 
     * @param \MbFosbos\Bfbn\Domain\Model\InstitutionAusbildungsrichtung $ausbildungsrichtungen
     * @return void
     */
    public function addAusbildungsrichtungen(\MbFosbos\Bfbn\Domain\Model\InstitutionAusbildungsrichtung $ausbildungsrichtungen)
    {
        $this->ausbildungsrichtungen->attach($ausbildungsrichtungen);
    }

    /**
     * Removes a InstitutionAusbildungsrichtung
     * 
     * @param \MbFosbos\Bfbn\Domain\Model\InstitutionAusbildungsrichtung $ausbildungsrichtungenToRemove The InstitutionAusbildungsrichtung to be removed
     * @return void
     */
    public function removeAusbildungsrichtungen(\MbFosbos\Bfbn\Domain\Model\InstitutionAusbildungsrichtung $ausbildungsrichtungenToRemove)
    {
        $this->ausbildungsrichtungen->detach($ausbildungsrichtungenToRemove);
    }

    /**
     * Returns the ausbildungsrichtungen
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\MbFosbos\Bfbn\Domain\Model\InstitutionAusbildungsrichtung> $ausbildungsrichtungen
     */
    public function getAusbildungsrichtungen()
    {
        return $this->ausbildungsrichtungen;
    }

    /**
     * Sets the ausbildungsrichtungen
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\MbFosbos\Bfbn\Domain\Model\InstitutionAusbildungsrichtung> $ausbildungsrichtungen
     * @return void
     */
    public function setAusbildungsrichtungen(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $ausbildungsrichtungen)
    {
        $this->ausbildungsrichtungen = $ausbildungsrichtungen;
    }

    /**
     * Adds a InstitutionSprache
     * 
     * @param \MbFosbos\Bfbn\Domain\Model\InstitutionSprache $sprachen
     * @return void
     */
    public function addSprachen(\MbFosbos\Bfbn\Domain\Model\InstitutionSprache $sprachen)
    {
        $this->sprachen->attach($sprachen);
    }

    /**
     * Removes a InstitutionSprache
     * 
     * @param \MbFosbos\Bfbn\Domain\Model\InstitutionSprache $sprachenToRemove The InstitutionSprache to be removed
     * @return void
     */
    public function removeSprachen(\MbFosbos\Bfbn\Domain\Model\InstitutionSprache $sprachenToRemove)
    {
        $this->sprachen->detach($sprachenToRemove);
    }

    /**
     * Returns the sprachen
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\MbFosbos\Bfbn\Domain\Model\InstitutionSprache> $sprachen
     */
    public function getSprachen()
    {
        return $this->sprachen;
    }

    /**
     * Sets the sprachen
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\MbFosbos\Bfbn\Domain\Model\InstitutionSprache> $sprachen
     * @return void
     */
    public function setSprachen(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $sprachen)
    {
        $this->sprachen = $sprachen;
    }	

    /**
     * Adds a Spracheintw
     * 
     * @param \MbFosbos\Bfbn\Domain\Model\Spracheintw $sprachenintw
     * @return void
     */
    public function addSprachenintw(\MbFosbos\Bfbn\Domain\Model\Spracheintw $sprachenintw)
    {
        $this->sprachenintw->attach($sprachenintw);
    }

    /**
     * Removes a Spracheintw
     * 
     * @param \MbFosbos\Bfbn\Domain\Model\Spracheintw $sprachenintwToRemove The Spracheintw to be removed
     * @return void
     */
    public function removeSprachenintw(\MbFosbos\Bfbn\Domain\Model\Spracheintw $sprachenintwToRemove)
    {
        $this->sprachenintw->detach($sprachenintwToRemove);
    }

    /**
     * Returns the sprachenintw
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\MbFosbos\Bfbn\Domain\Model\Spracheintw> $sprachenintw
     */
    public function getSprachenintw()
    {
        return $this->sprachenintw;
    }

    /**
     * Sets the sprachenintw
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\MbFosbos\Bfbn\Domain\Model\Spracheintw> $sprachenintw
     * @return void
     */
    public function setSprachenintw(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $sprachenintw)
    {
        $this->sprachenintw = $sprachenintw;
    }	

    /**
     * Adds a Person
     * 
     * @param \MbFosbos\Bfbn\Domain\Model\Person $personen
     * @return void
     */
    public function addPersonen(\MbFosbos\Bfbn\Domain\Model\Person $personen)
    {
        $this->personen->attach($personen);
    }

    /**
     * Removes a Person
     * 
     * @param \MbFosbos\Bfbn\Domain\Model\Person $personenToRemove The Person to be removed
     * @return void
     */
    public function removePersonen(\MbFosbos\Bfbn\Domain\Model\Person $personenToRemove)
    {
        $this->personen->detach($personenToRemove);
    }

    /**
     * Returns the Personen
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\MbFosbos\Bfbn\Domain\Model\Person> $personen
     */
    public function getPersonen()
    {
        return $this->personen;
    }

    /**
     * Sets the personen
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\MbFosbos\Bfbn\Domain\Model\Person> $personen
     * @return void
     */
    public function setPersonen(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $personen)
    {
        $this->personen = $personen;
    }
	
    /**
     * Adds a Bearbeiter
     * 
     * @param \MbFosbos\Bfbn\Domain\Model\Bearbeiter $bearbeiter
     * @return void
     */
    public function addBearbeiter(\MbFosbos\Bfbn\Domain\Model\Bearbeiter $bearbeiter)
    {
        $this->bearbeiter->attach($bearbeiter);
    }

    /**
     * Removes a Bearbeiter
     * 
     * @param \MbFosbos\Bfbn\Domain\Model\Bearbeiter $bearbeiterToRemove The Bearbeiter to be removed
     * @return void
     */
    public function removeBearbeiter(\MbFosbos\Bfbn\Domain\Model\Bearbeiter $bearbeiterToRemove)
    {
        $this->bearbeiter->detach($bearbeiterToRemove);
    }

    /**
     * Returns the Bearbeiter
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\MbFosbos\Bfbn\Domain\Model\Bearbeiter> $bearbeiter
     */
    public function getBearbeiter()
    {
        return $this->bearbeiter;
    }

    /**
     * Sets the Bearbeiter
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\MbFosbos\Bfbn\Domain\Model\Bearbeiter> $bearbeiter
     * @return void
     */
    public function setBearbeiter(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $bearbeiter)
    {
        $this->bearbeiter = $bearbeiter;
    }	
	
    /**
     * Adds a Category
     * 
     * @param \TYPO3\CMS\Extbase\Domain\Model\Category $category
     * @return void
     */
    public function addCategory(\TYPO3\CMS\Extbase\Domain\Model\Category $category)
    {
        $this->categories->attach($category);
    }

    /**
     * Removes a Category
     * 
     * @param \TYPO3\CMS\Extbase\Domain\Model\Category $categoryToRemove The Category to be removed
     * @return void
     */
    public function removeCategory(\TYPO3\CMS\Extbase\Domain\Model\Category $categoryToRemove)
    {
        $this->categories->detach($categoryToRemove);
    }

    /**
     * Returns the categories
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category> $categories
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Sets the categories
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category> $categories
     * @return void
     */
    public function setCategories(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $categories)
    {
        $this->categories = $categories;
    }

	/**
	* Sets the startingpoint
	*
	* @param string $startingpoint
	* @return void
	*/
	public function setStartingpoint($startingpoint) 
	{
		$this->startingpoint = $startingpoint;
	}

	/**
	* @return string $startingpoint
	*/
	public function getStartingpoint() 
	{
		return $this->startingpoint;
	}
}

