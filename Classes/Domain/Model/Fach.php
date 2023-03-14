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
 * Fach
 */
class Fach extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * bezeichnung
     * 
     * @var string
     */
    protected $bezeichnung = '';
	
    /**
	 * sorting
	 *
     * @var int
     */
    protected $sorting;
	
    /**
	 * pageuidfach
	 *
     * @var int
     */
    protected $pageuidfach;

    /**
     * personen
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\OliverBauer\Bfbn\Domain\Model\Person>
     */
    protected $personen = null;

    /**
	 * anzeigefachberatung
	 *
     * @var int
     */
    protected $anzeigefachberatung;


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
        $this->personen = $this->personen ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();	
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
     * Returns the sorting
     * 
     * @return int $sorting
     */
    public function getSorting()
    {
        return $this->sorting;
    }

    /**
     * Sets the sorting
     * 
     * @param int $sorting
     * @return void
     */
    public function setSorting($sorting)
    {
        $this->sorting = $sorting;
    }

    /**
     * Returns the pageuidfach
     * 
     * @return int $pageuidfach
     */
    public function getPageuidfach()
    {
        return $this->pageuidfach;
    }

    /**
     * Sets the pageuidfach
     * 
     * @param int $pageuidfach
     * @return void
     */
    public function setpageuidfach($pageuidfach)
    {
        $this->pageuidfach = $pageuidfach;
    }

    /**
     * Adds a Person
     * 
     * @param \OliverBauer\Bfbn\Domain\Model\Person $personen
     * @return void
     */
    public function addPersonen(\OliverBauer\Bfbn\Domain\Model\Person $personen)
    {
        $this->personen->attach($personen);
    }

    /**
     * Removes a Person
     * 
     * @param \OliverBauer\Bfbn\Domain\Model\Person $personenToRemove The Person to be removed
     * @return void
     */
    public function removePersonen(\OliverBauer\Bfbn\Domain\Model\Person $personenToRemove)
    {
        $this->personen->detach($personenToRemove);
    }

    /**
     * Returns the personen
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\OliverBauer\Bfbn\Domain\Model\Person> personen
     */
    public function getPersonen()
    {
        return $this->personen;
    }

    /**
     * Sets the personen
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\OliverBauer\Bfbn\Domain\Model\Person> $personen
     * @return void
     */
    public function setPersonen(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $personen)
    {
        $this->personen = $personen;
    }
	
    /**
     * Returns the anzeigefachberatung
     * 
     * @return int $anzeigefachberatung
     */
    public function getAnzeigefachberatung()
    {
        return $this->anzeigefachberatung;
    }

    /**
     * Sets the anzeigefachberatung
     * 
     * @param int $anzeigefachberatung
     * @return void
     */
    public function setAnzeigefachberatung($anzeigefachberatung)
    {
        $this->anzeigefachberatung = $anzeigefachberatung;
    }
	
}
