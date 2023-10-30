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
 *  (c) 2021 
 *
 ***/
/**
 * Institutionstatus
 */
class Institutionstatus extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * bezeichnung
     * 
     * @var string
     */
    protected $bezeichnung = '';

    /**
     * langbezeichnung
     * 
     * @var string
     */
    protected $langbezeichnung = '';

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
     * Returns the langbezeichnung
     * 
     * @return string $langbezeichnung
     */
    public function getLangbezeichnung()
    {
        return $this->langbezeichnung;
    }

    /**
     * Sets the langbezeichnung
     * 
     * @param string $langbezeichnung
     * @return void
     */
    public function setLangbezeichnung($langbezeichnung)
    {
        $this->langbezeichnung = $langbezeichnung;
    }	
}
