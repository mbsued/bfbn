<?php
namespace MbFosbos\Bfbn\Domain\Model;


/***
 *
 * This file is part of the "BFBN" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2021 BFBN-Team <info@bfbn.de>, MB-Dienststellen FOSBOS
 *
 ***/
/**
 * Institution Demand
 */
class InstitutionDemand extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * @var array
     */
    protected $categories;

    /** @var int */
    protected $storagePage;

    /**
    * @var string search Bezeichnung
    **/
    protected $bezeichnung;

    /**
    * @var array
    **/
    protected $bezirk;

    /**
    * @var int
    **/
    protected $art;

    /**
    * @var int
    **/
    protected $schulart;
	
    /**
    * @var int
    **/
    protected $jahrgangsstufe;
	
    /**
    * @var array
    **/
    protected $ausbildungsrichtung;

    /**
    * @var array
    **/
    protected $ausbildungsrichtungen;

    /**
    * @var int
    **/
    protected $sprache;

    /**
    * @var array
    **/
    protected $sprachen;

	/**
    * @var int 
    **/
    protected $vorart;
	 
	/**
    * @var int search uid
    **/
    protected $institution;
	
    /**
     * @var array
     */
    protected $regierungsbezirk;

    /**
     * @var array
     */
    protected $status;
	
    /**
     * @var bool
     */
    protected $profilinklusion;
	
    /**
     * @var bool
     */
    protected $ivk;

	
    /**
    * @var int
    **/
    protected $plz;

    /**
    * @var int
    **/
    protected $umkreis;		
		
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
     * Sets die gesuchte Bezeichnung
     * 
     * @param string $bezeichnung
     * @return void
     */
    public function setBezeichnung($bezeichnung) {
		$this->bezeichnung = $bezeichnung;
    }

    /**
     * Returns die gesuchte Bezeichnung
     * 
     * @return string $bezeichnung
     */
    public function getBezeichnung() {
		return $this->bezeichnung;
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
     * @return int $institution
     */
    public function getInstitution() {
		return $this->institution;
    }

    /**
     * Sets die gesuchte art
     * 
     * @param int $art
     * @return void
     */
    public function setArt($art) {
		$this->art = $art;
    }

    /**
     * Returns die gesuchte art
     * 
     * @return int $art
     */
    public function getArt() {
		return $this->art;
    }

    /**
     * Sets die gesuchte jahrgangsstufe
     * 
     * @param int $jahrgangsstufe
     * @return void
     */
    public function setJahrgangsstufe($jahrgangsstufe) {
		$this->jahrgangsstufe = $jahrgangsstufe;
    }

    /**
     * Returns die gesuchte jahrgangsstufe
     * 
     * @return int $jahrgangsstufe
     */
    public function getJahrgangsstufe() {
		return $this->jahrgangsstufe;
    }

    /**
     * Sets die gesuchte schulart
     * 
     * @param int $schulart
     * @return void
     */
    public function setSchulart($schulart) {
		$this->schulart = $schulart;
    }

    /**
     * Returns die gesuchte schulart
     * 
     * @return int $schulart
     */
    public function getSchulart() {
		return $this->schulart;
    }

    /**
     * Sets die gesuchte ausbildungsrichtung
     * 
     * @param array $ausbildungsrichtung
     * @return void
     */
    public function setAusbildungsrichtung($ausbildungsrichtung) {
		$this->ausbildungsrichtung = $ausbildungsrichtung;
    }

    /**
     * Returns die gesuchte ausbildungsrichtung
     * 
     * @return array $ausbildungsrichtung
     */
    public function getAusbildungsrichtung() {
		return $this->ausbildungsrichtung;
    }

    /**
     * Sets die gesuchte sprache
     * 
     * @param int $sprache
     * @return void
     */
    public function setSprache($sprache) {
		$this->sprache = $sprache;
    }

    /**
     * Returns die gesuchte sprache
     * 
     * @return int $sprache
     */
    public function getSprache() {
		return $this->sprache;
    }

    /**
     * Sets die vorart
     * 
     * @param int $vorart
     * @return void
     */
    public function setVorart($vorart) {
		$this->vorart = $vorart;
    }

    /**
     * Returns die vorart
     * 
     * @return int $vorart
     */
    public function getVorart() {
		return $this->vorart;
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
	
    /**
     * List of ausbildungsrichtungen
     *
     * @param array $ausbildungsrichtungen
     * 
     */
    public function setAusbildungsrichtungen($ausbildungsrichtungen)
    {
        $this->ausbildungsrichtungen = $ausbildungsrichtungen;
        
    }

    /**
     * Get ausbildungsrichtungen
     *
     * @return array
     */
    public function getAusbildungsrichtungen()
    {
        return $this->ausbildungsrichtungen;
    }

    /**
     * List of sprachen
     *
     * @param array $sprachen
     * 
     */
    public function setSprachen($sprachen)
    {
        $this->sprachen = $sprachen;
        
    }

    /**
     * Get sprachen
     *
     * @return array
     */
    public function getSprachen()
    {
        return $this->sprachen;
    }

    /**
     * List of regierungsbezirk
     *
     * @param array $regierungsbezirk
     * 
     */
    public function setRegierungsbezirk($regierungsbezirk)
    {
        $this->regierungsbezirk = $regierungsbezirk;
        
    }

    /**
     * Get regierungsbezirk
     *
     * @return array
     */
    public function getRegierungsbezirk()
    {
        return $this->regierungsbezirk;
    }
	
    /**
     * List of status
     *
     * @param array $status
     * 
     */
    public function setStatus($status)
    {
        $this->status = $status;
        
    }

    /**
     * Get status
     *
     * @return array
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Returns the profilinklusion
     * 
     * @return bool $profilinklusion
     */
    public function getProfilinklusion()
    {
        return $this->profilinklusion;
    }

    /**
     * Sets the profilinklusion
     * 
     * @param bool $profilinklusion
     * @return void
     */
    public function setProfilinklusion($profilinklusion)
    {
        $this->profilinklusion = $profilinklusion;
    }

    /**
     * Returns the boolean state of profilinklusion
     * 
     * @return bool
     */
    public function isProfilinklusion()
    {
        return $this->profilinklusion;
    }

    /**
     * Returns the ivk
     * 
     * @return bool $ivk
     */
    public function getIvk()
    {
        return $this->ivk;
    }

    /**
     * Sets the ivk
     * 
     * @param bool $ivk
     * @return void
     */
    public function setIvk($ivk)
    {
        $this->ivk = $ivk;
    }

    /**
     * Returns the boolean state of ivk
     * 
     * @return bool
     */
    public function isIvk()
    {
        return $this->ivk;
    }

    /**
     * Returns the plz
     * 
     * @return int $plz
     */
    public function getPlz()
    {
        return $this->plz;
    }

    /**
     * Sets the plz
     * 
     * @param int $plz
     * @return void
     */
    public function setPlz($plz)
    {
        $this->plz = $plz;
    }

    /**
     * Returns the umkreis
     * 
     * @return int $umkreis
     */
    public function getUmkreis()
    {
        return $this->umkreis;
    }

    /**
     * Sets the umkreis
     * 
     * @param int $umkreis
     * @return void
     */
    public function setUmkreis($umkreis)
    {
        $this->umkreis = $umkreis;
    }	
}
