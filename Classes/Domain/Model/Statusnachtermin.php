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
 * Statusnachtermin
 */
class Statusnachtermin extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * fehlanzeige
     * 
     * @var integer
     */
    protected $fehlanzeige = false;

    /**
     * meldung
     * 
     * @var integer
     */
    protected $meldung = false;

    /**
     * institution
     * 
     * @var \MbFosbos\Bfbn\Domain\Model\Institution
     */
    protected $institution = null;

    /**
     * @var \MbFosbos\Bfbn\Domain\Model\DateTime
     */
    protected $tstamp;

    /**
     * @var \MbFosbos\Bfbn\Domain\Model\DateTime
     */
    protected $crdate;
	
    /**
     * Returns the fehlanzeige
     * 
     * @return integer $fehlanzeige
     */
    public function getFehlanzeige()
    {
        return $this->fehlanzeige;
    }

    /**
     * Sets the fehlzeige
     * 
     * @param integer $fehlanzeige
     * @return void
     */
    public function setFehlanzeige(int $fehlanzeige)
    {
        $this->fehlanzeige = $fehlanzeige;
    }
	
    /**
     * Returns the meldung
     * 
     * @return integer $meldung
     */
    public function getMeldung()
    {
        return $this->meldung;
    }

    /**
     * Sets the meldung
     * 
     * @param integer $meldung
     * @return void
     */
    public function setMeldung(int $meldung)
    {
        $this->meldung = $meldung;
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
