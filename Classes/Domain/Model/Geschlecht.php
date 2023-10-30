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
 * Geschlecht
 */
class Geschlecht extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
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
     * email
     * 
     * @var string
     */
    protected $email = '';

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
}
