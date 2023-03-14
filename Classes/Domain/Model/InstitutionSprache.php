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
 * InstitutionSprache
 */
class InstitutionSprache extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * bezeichnung
     * 
     * @var string
     */
    protected $bezeichnung = '';

    /**
     * sprache
     * 
     *  @var \OliverBauer\Bfbn\Domain\Model\Sparche
     * 
     */
    protected $sprache = null;

    /**
     * jahrgangsstufe
     * 
     * @var \OliverBauer\Bfbn\Domain\Model\Jahrgangsstufe
     * 
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
     * Returns the sprache
     * 
     * @return @return \OliverBauer\Bfbn\Domain\Model\Sprache $sprache
     */
    public function getSprache()
    {
        return $this->sprache;
    }

    /**
     * Sets the sprache
     * 
     * @param \OliverBauer\Bfbn\Domain\Model\Sprache $sprache
     * @return void
     */
    public function setSprache(\OliverBauer\Bfbn\Domain\Model\Sprache $sprache)
    {
        $this->sprache = $sprache;
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
