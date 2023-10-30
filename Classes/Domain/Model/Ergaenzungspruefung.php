<?php
namespace MbFosbos\Bfbn\Domain\Model;


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
 * Ergaenzungspruefung
 */
class Ergaenzungspruefung extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
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
     * sprache
     * 
     * @var \MbFosbos\Bfbn\Domain\Model\Sprache
     */
    protected $sprache = null;

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
    public function setSprache(\MbFosbos\Bfbn\Domain\Model\Sprache $sprache)
    {
        $this->sprache = $sprache;
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
