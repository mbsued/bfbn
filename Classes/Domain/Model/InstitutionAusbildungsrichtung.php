<?php
declare(strict_types=1);

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
 * InstitutionAusbildungsrichtung
 */
class InstitutionAusbildungsrichtung extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * bezeichnung
     * 
     * @var string
     */
    protected $bezeichnung = '';

    /**
     * ausbildungsrichtung
     * 
     * @var \OliverBauer\Bfbn\Domain\Model\Ausbildungsrichtung
     */
    protected $ausbildungsrichtung = null;

    /**
     * schulart
     * 
     * @var \OliverBauer\Bfbn\Domain\Model\Schulart
     */
    protected $schulart = null;

    /**
     * jahrgangsstufe
     * 
     * @var \OliverBauer\Bfbn\Domain\Model\Jahrgangsstufe
     */
    protected $jahrgangsstufe = null;

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
     * Returns the ausbildungsrichtung
     * 
     * @return \OliverBauer\Bfbn\Domain\Model\Ausbildungsrichtung $ausbildungsrichtung
     */
    public function getAusbildungsrichtung()
    {
        return $this->ausbildungsrichtung;
    }

    /**
     * Sets the ausbildungsrichtung
     * 
     * @param \OliverBauer\Bfbn\Domain\Model\Ausbildungsrichtung $ausbildungsrichtung
     * @return void
     */
    public function setAusbildungsrichtung(\OliverBauer\Bfbn\Domain\Model\Ausbildungsrichtung $ausbildungsrichtung)
    {
        $this->ausbildungsrichtung = $ausbildungsrichtung;
    }

    /**
     * Returns the schulart
     * 
     * @return \OliverBauer\Bfbn\Domain\Model\Schulart $schulart
     */
    public function getSchulart()
    {
        return $this->schulart;
    }

    /**
     * Sets the schulart
     * 
     * @param \OliverBauer\Bfbn\Domain\Model\Schulart $schulart
     * @return void
     */
    public function setSchulart(\OliverBauer\Bfbn\Domain\Model\Schulart $schulart)
    {
        $this->schulart = $schulart;
    }

    /**
     * Returns the jahrgangsstufe
     * 
     * @return \OliverBauer\Bfbn\Domain\Model\Jahrgangsstufe $jahrgangsstufe
     */
    public function getJahrgangsstufe()
    {
        return $this->jahrgangsstufe;
    }

    /**
     * Sets the jahrgangsstufe
     * 
     * @param \OliverBauer\Bfbn\Domain\Model\Jahrgangsstufe $jahrgangsstufe
     * @return void
     */
    public function setJahrgangsstufe(\OliverBauer\Bfbn\Domain\Model\Jahrgangsstufe $jahrgangsstufe)
    {
        $this->jahrgangsstufe = $jahrgangsstufe;
    }
}
