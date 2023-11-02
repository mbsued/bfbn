<?php
namespace MbFosbos\Bfbn\Domain\Model;

/***
 *
 * This file is part of the "BFBN" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2023 
 *
 ***/
/**
 * Nachricht
 */
class nachricht extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * sender_email
     * 
     * @var string
	 * 
     */
	 
    protected $sender_email = '';

    /**
     * sender_name
     * 
     * @var string
     */
	 
    protected $sender_name = '';

    /**
     * empfaenger_email
     * 
     * @var string
     * 
     */
	 
    protected $empfaenger_email = '';

    /**
     * betreff
     * 
     * @var string
     * 
     */
	 
    protected $betreff = '';
	
	 /**
	 * mailtext
	 *
     * @var string
     */
	 
    protected $mailtext = '';
    
    /**
     * @var \MbFosbos\Bfbn\Domain\Model\DateTime
     */
    protected $tstamp;

    /**
     * @var \MbFosbos\Bfbn\Domain\Model\DateTime
     */
    protected $crdate;
	
    /**
     * @return string
     */
    public function getSenderemail(): string
    {
        return $this->sender_email;
    }

    /**
     * @param string $sender_email
	 *
     */
    public function setSenderemail(string $sender_email)
    {
        $this->sender_email = $sender_email;
    }
	
    /**
     * @return string
     */
    public function getSendername(): string
    {
        return $this->sender_name;
    }

    /**
     * @param string $sender_name
	 *
     */
    public function setSendername(string $sender_name)
    {
        $this->sender_name = $sender_name;
    }
	
    /**
     * @return string
     */
    public function getEmpfaengeremail(): string
    {
        return $this->empfaenger_email;
    }

    /**
     * @param string $empfaenger_email
	 *
     */
    public function setEmpfaengeremail(string $empfaenger_email)
    {
        $this->empfaenger_email = $empfaenger_email;
    }
	
    /**
     * @return string
     */
    public function getBetreff(): string
    {
        return $this->betreff;
    }

    /**
     * @param string $betreff
	 *
     */
    public function setBetreff(string $betreff)
    {
        $this->betreff = $betreff;
    }

    /**
     * @return string
     */
    public function getMailtext(): string
    {
        return $this->mailtext;
    }

    /**
     * @param string $mailtext
	 *
     */
    public function setMailtext(string $mailtext)
    {
        $this->mailtext = $mailtext;
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
