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
 * Meldung
 */
class meldung extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * datei
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $datei = '';


    /**
     * art
     * 
     * @var \OliverBauer\Bfbn\Domain\Model\Meldungart
     */
    protected $art = null;

    /**
     * institution
     * 
     * @var \OliverBauer\Bfbn\Domain\Model\Institution
     */
    protected $institution = null;

    /**
     * @var \OliverBauer\Bfbn\Domain\Model\DateTime
     */
    protected $tstamp;

    /**
     * @var \OliverBauer\Bfbn\Domain\Model\DateTime
     */
    protected $crdate;
	
    /**
     * __construct
     */
    
	public function __construct()
    {

        //Do not remove the next line: It would break the functionality
        $this->initializeObject();
    }

    /**
     * Initializes all ObjectStorage properties when model is reconstructed from DB (where __construct is not called)
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     * 
     * @return void
     */
    protected function initializeObject()	
    {
        $this->datei = $this->datei ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }
	
    /**
     * Returns the Datei
     * 
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $datei
     */
    public function getDatei()
    {
        return $this->datei;
    }

    /**
     * Sets the datei
     * 
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $datei
     * @return void
     */
    public function setDatei(\TYPO3\CMS\Extbase\Domain\Model\FileReference $datei)
    {
        $this->datei = $datei;
    }
	
    /**
     * Returns the art
     * 
     * @return \OliverBauer\Bfbn\Domain\Model\Meldungart $art
     */
    public function getArt()
    {
        return $this->art;
    }

    /**
     * Sets the art
     * 
     * @param \OliverBauer\Bfbn\Domain\Model\Meldungart $art
     * @return void
     */
    public function setArt(\OliverBauer\Bfbn\Domain\Model\Meldungart $art)
    {
        $this->art = $art;
    }
	
    /**
     * Returns the institution
     * 
     * @return @return \OliverBauer\Bfbn\Domain\Model\Institution $institution
     */
    public function getInstitution()
    {
        return $this->institution;
    }

    /**
     * Sets the institution
     * 
     * @param \OliverBauer\Bfbn\Domain\Model\Institution $institution
     * @return void
     */
    public function setInstitution(\OliverBauer\Bfbn\Domain\Model\Institution $institution)
    {
        $this->institution = $institution;
    }

    /**
     * Get timestamp
     *
     * @return \OliverBauer\Bfbn\Domain\Model\DateTime
     */
    public function getTstamp()
    {
        return $this->tstamp;
    }

    /**
     * Set timestamp
     *
     * @param \OliverBauer\Bfbn\Domain\Model\DateTime $tstamp 
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
     * @return \OliverBauer\Bfbn\Domain\Model\DateTime
     */
    public function getCrdate()
    {
        return $this->crdate;
    }

    /**
     * Set crdate
     *
     * @param \OliverBauer\Bfbn\Domain\Model\DateTime $crdate 
     *
     * @return void
     */
    public function setCrdate($crdate)
    {
        $this->crdate = $crdate;
    }		
}
