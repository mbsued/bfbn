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
     * @var \OliverBauer\Bfbn\Domain\Model\Funktionart
     */
    protected $art = null;	

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
     * @return \OliverBauer\Bfbn\Domain\Model\Funktionart $art
     */
    public function getArt()
    {
        return $this->art;
    }

    /**
     * Sets the art
     * 
     * @param \OliverBauer\Bfbn\Domain\Model\Funktionart $art
     * @return void
     */
    public function setArt(\OliverBauer\Bfbn\Domain\Model\Funktionart $art)
    {
        $this->art = $art;
    }
}
