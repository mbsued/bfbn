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
 * Funktion
 */
class Funktion extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * bezeichnung
     * 
     * @var string
     */
    protected $bezeichnung = '';
	
    /**
     * art
     * 
     * @var \MbFosbos\Bfbn\Domain\Model\Funktionart
     */
    protected $art = null;	

    /**
     * anzahl
     * 
     * @var integer
     */
    protected $anzahl = 0;

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
     * Returns the art
     * 
     * @return \MbFosbos\Bfbn\Domain\Model\Funktionart $art
     */
    public function getArt()
    {
        return $this->art;
    }

    /**
     * Sets the art
     * 
     * @param \MbFosbos\Bfbn\Domain\Model\Funktionart $art
     * @return void
     */
    public function setArt(\MbFosbos\Bfbn\Domain\Model\Funktionart $art)
    {
        $this->art = $art;
    }
	
    /**
     * Returns the anzahl
     * 
     * @return integer $anzahl
     */
    public function getAnzahl()
    {
        return $this->anzahl;
    }

    /**
     * Sets the anzahl
     * 
     * @param integer $anzahl
     * @return void
     */
    public function setAnzahl($anzahl)
    {
        $this->anzahl = $anzahl;
    }	
}
