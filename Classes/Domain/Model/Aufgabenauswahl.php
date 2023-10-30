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
 * Aufgabenauswahl
 */
class Aufgabenauswahl extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
	/**
	* deutsch1a
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})
	*/
	protected $deutsch1a = 0;

	/**
	* deutsch1l
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $deutsch1l = 0;

	/**
	* deutsch1e
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $deutsch1e = 0;
	
	/**
	* deutsch1d
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $deutsch1d = 0;
	
	/**
	* deutsch2a
	*
	* @var int
		* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})
	*/
	protected $deutsch2a = 0;

	/**
	* deutsch2l
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})
	*/
	protected $deutsch2l = 0;

	/**
	* deutsch2e
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $deutsch2e = 0;
	
	/**
	* deutsch2d
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $deutsch2d = 0;
	
	/**
	* deutsch3a
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $deutsch3a = 0;

	/**
	* deutsch3l
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $deutsch3l = 0;

	/**
	* deutsch3e
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $deutsch3e = 0;
	
	/**
	* deutsch3d
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $deutsch3d = 0;
	
	/**
	* deutsch4a
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $deutsch4a = 0;

	/**
	* deutsch4l
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $deutsch4l = 0;

	/**
	* deutsch4e
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $deutsch4e = 0;
	
	/**
	* deutsch4d
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $deutsch4d = 0;
	
	/**
	* deutsch5a
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $deutsch5a = 0;

	/**
	* deutsch5l
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $deutsch5l = 0;

	/**
	* deutsch5e
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $deutsch5e = 0;
	
	/**
	* deutsch5d
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $deutsch5d = 0;
	
	/**
	* deutsch6a
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $deutsch6a = 0;

	/**
	* deutsch6l
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $deutsch6l = 0;

	/**
	* deutsch6e
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $deutsch6e = 0;
	
	/**
	* deutsch6d
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $deutsch6d = 0;

	/**
	* deutsch7a
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $deutsch7a = 0;

	/**
	* deutsch7l
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $deutsch7l = 0;

	/**
	* deutsch7e
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $deutsch7e = 0;
	
	/**
	* deutsch7d
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $deutsch7d = 0;

	/**
	* mathe1a1
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $mathe1a1 = 0;

	/**
	* mathe1a2
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $mathe1a2 = 0;

	/**
	* mathe1b1
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $mathe1b1 = 0;
	
	/**
	* mathe1b2
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $mathe1b2 = 0;

	/**
	* mathe2a1
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $mathe2a1 = 0;

	/**
	* mathe2a2
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $mathe2a2 = 0;

	/**
	* mathe2b1
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $mathe2b1 = 0;
	
	/**
	* mathe2b2
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $mathe2b2 = 0;

	/**
	* mathe3a1
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $mathe3a1 = 0;

	/**
	* mathe3a2
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $mathe3a2 = 0;

	/**
	* mathe3b1
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $mathe3b1 = 0;
	
	/**
	* mathe3b2
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $mathe3b2 = 0;

	/**
	* mathe4a1
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $mathe4a1 = 0;

	/**
	* mathe4a2
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $mathe4a2 = 0;

	/**
	* mathe4b1
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $mathe4b1 = 0;
	
	/**
	* mathe4b2
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $mathe4b2 = 0;

	/**
	* mathe5a1
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $mathe5a1 = 0;

	/**
	* mathe5a2
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $mathe5a2 = 0;

	/**
	* mathe5b1
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $mathe5b1 = 0;
	
	/**
	* mathe5b2
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $mathe5b2 = 0;

	/**
	* mathe6a1
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $mathe6a1 = 0;

	/**
	* mathe6a2
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $mathe6a2 = 0;

	/**
	* mathe6b1
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $mathe6b1 = 0;
	
	/**
	* mathe6b2
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $mathe6b2 = 0;

	/**
	* mathe7a1
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $mathe7a1 = 0;

	/**
	* mathe7a2
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $mathe7a2 = 0;

	/**
	* mathe7b1
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $mathe7b1 = 0;
	
	/**
	* mathe7b2
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $mathe7b2 = 0;

	/**
	* physik1
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $physik1 = 0;

	/**
	* physik2
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $physik2 = 0;

	/**
	* physik3
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $physik3 = 0;
	
	/**
	* paepsy1
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $paepsy1 = 0;

	/**
	* paepsy2
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $paepsy2 = 0;

	/**
	* gesuwi1
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $gesuwi1 = 0;

	/**
	* gesuwi2
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $gesuwi2 = 0;

	/**
	* gest1
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $gest1 = 0;

	/**
	* gest2
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $gest2 = 0;

	/**
	* gest3
	*
	* @var int
	* @TYPO3\CMS\Extbase\Annotation\Validate("NumberRange", options={"minimum": 0, "maximum": 999})	
	*/
	protected $gest3 = 0;
	
     /**
     * schulart
     * 
     * @var \MbFosbos\Bfbn\Domain\Model\Schulart
     */
    protected $schulart = null;

    /**
     * jahrgangsstufe
     * 
     * @var \MbFosbos\Bfbn\Domain\Model\Jahrgangsstufe
     */
    protected $jahrgangsstufe = null;

    /**
     * institution
     * 
     * @var \MbFosbos\Bfbn\Domain\Model\Institution
     */
    protected $institution = null;

    /**
     * Returns the deutsch1a
     * 
     * @return int $deutsch1a
     */
    public function getDeutsch1a()
    {
        return $this->deutsch1a;
    }

    /**
     * Sets the deutsch1a
     * 
     * @param int $deutsch1a
     * @return void
     */
    public function setDeutsch1a($deutsch1a)
    {
        $this->deutsch1a = $deutsch1a;
    }

    /**
     * Returns the deutsch1l
     * 
     * @return int $deutsch1l
     */
    public function getDeutsch1l()
    {
        return $this->deutsch1l;
    }

    /**
     * Sets the deutsch1l
     * 
     * @param int $deutsch1l
     * @return void
     */
    public function setDeutsch1l($deutsch1l)
    {
        $this->deutsch1l = $deutsch1l;
    }

    /**
     * Returns the deutsch1e
     * 
     * @return int $deutsch1e
     */
    public function getDeutsch1e()
    {
        return $this->deutsch1e;
    }

    /**
     * Sets the deutsch1e
     * 
     * @param int $deutsch1e
     * @return void
     */
    public function setDeutsch1e($deutsch1e)
    {
        $this->deutsch1e = $deutsch1e;
    }

    /**
     * Returns the deutsch1d
     * 
     * @return int $deutsch1d
     */
    public function getDeutsch1d()
    {
        return $this->deutsch1d;
    }

    /**
     * Sets the deutsch1d
     * 
     * @param int $deutsch1d
     * @return void
     */
    public function setDeutsch1d($deutsch1d)
    {
        $this->deutsch1d = $deutsch1d;
    }

    /**
     * Returns the deutsch2a
     * 
     * @return int $deutsch2a
     */
    public function getDeutsch2a()
    {
        return $this->deutsch2a;
    }

    /**
     * Sets the deutsch2a
     * 
     * @param int $deutsch2a
     * @return void
     */
    public function setDeutsch2a($deutsch2a)
    {
        $this->deutsch2a = $deutsch2a;
    }

    /**
     * Returns the deutsch2l
     * 
     * @return int $deutsch2l
     */
    public function getDeutsch2l()
    {
        return $this->deutsch2l;
    }

    /**
     * Sets the deutsch2l
     * 
     * @param int $deutsch2l
     * @return void
     */
    public function setDeutsch2l($deutsch2l)
    {
        $this->deutsch2l = $deutsch2l;
    }

    /**
     * Returns the deutsch2e
     * 
     * @return int $deutsch2e
     */
    public function getDeutsch2e()
    {
        return $this->deutsch2e;
    }

    /**
     * Sets the deutsch2e
     * 
     * @param int $deutsch2e
     * @return void
     */
    public function setDeutsch2e($deutsch2e)
    {
        $this->deutsch2e = $deutsch2e;
    }

    /**
     * Returns the deutsch2d
     * 
     * @return int $deutsch2d
     */
    public function getDeutsch2d()
    {
        return $this->deutsch2d;
    }

    /**
     * Sets the deutsch2d
     * 
     * @param int $deutsch2d
     * @return void
     */
    public function setDeutsch2d($deutsch2d)
    {
        $this->deutsch2d = $deutsch2d;
    }

    /**
     * Returns the deutsch3a
     * 
     * @return int $deutsch3a
     */
    public function getDeutsch3a()
    {
        return $this->deutsch3a;
    }

    /**
     * Sets the deutsch3a
     * 
     * @param int $deutsch3a
     * @return void
     */
    public function setDeutsch3a($deutsch3a)
    {
        $this->deutsch3a = $deutsch3a;
    }

    /**
     * Returns the deutsch3l
     * 
     * @return int $deutsch3l
     */
    public function getDeutsch3l()
    {
        return $this->deutsch3l;
    }

    /**
     * Sets the deutsch3l
     * 
     * @param int $deutsch3l
     * @return void
     */
    public function setDeutsch3l($deutsch3l)
    {
        $this->deutsch3l = $deutsch3l;
    }

    /**
     * Returns the deutsch3e
     * 
     * @return int $deutsch3e
     */
    public function getDeutsch3e()
    {
        return $this->deutsch3e;
    }

    /**
     * Sets the deutsch3e
     * 
     * @param int $deutsch3e
     * @return void
     */
    public function setDeutsch3e($deutsch3e)
    {
        $this->deutsch3e = $deutsch3e;
    }

    /**
     * Returns the deutsch3d
     * 
     * @return int $deutsch3d
     */
    public function getDeutsch3d()
    {
        return $this->deutsch3d;
    }

    /**
     * Sets the deutsch3d
     * 
     * @param int $deutsch3d
     * @return void
     */
    public function setDeutsch3d($deutsch3d)
    {
        $this->deutsch3d = $deutsch3d;
    }


    /**
     * Returns the deutsch4a
     * 
     * @return int $deutsch4a
     */
    public function getDeutsch4a()
    {
        return $this->deutsch4a;
    }

    /**
     * Sets the deutsch4a
     * 
     * @param int $deutsch4a
     * @return void
     */
    public function setDeutsch4a($deutsch4a)
    {
        $this->deutsch4a = $deutsch4a;
    }

    /**
     * Returns the deutsch4l
     * 
     * @return int $deutsch4l
     */
    public function getDeutsch4l()
    {
        return $this->deutsch4l;
    }

    /**
     * Sets the deutsch4l
     * 
     * @param int $deutsch4l
     * @return void
     */
    public function setDeutsch4l($deutsch4l)
    {
        $this->deutsch4l = $deutsch4l;
    }

    /**
     * Returns the deutsch4e
     * 
     * @return int $deutsch4e
     */
    public function getDeutsch4e()
    {
        return $this->deutsch4e;
    }

    /**
     * Sets the deutsch4e
     * 
     * @param int $deutsch4e
     * @return void
     */
    public function setDeutsch4e($deutsch4e)
    {
        $this->deutsch4e = $deutsch4e;
    }

    /**
     * Returns the deutsch4d
     * 
     * @return int $deutsch4d
     */
    public function getDeutsch4d()
    {
        return $this->deutsch4d;
    }

    /**
     * Sets the deutsch4d
     * 
     * @param int $deutsch4d
     * @return void
     */
    public function setDeutsch4d($deutsch4d)
    {
        $this->deutsch4d = $deutsch4d;
    }

    /**
     * Returns the deutsch5a
     * 
     * @return int $deutsch5a
     */
    public function getDeutsch5a()
    {
        return $this->deutsch5a;
    }

    /**
     * Sets the deutsch5a
     * 
     * @param int $deutsch5a
     * @return void
     */
    public function setDeutsch5a($deutsch5a)
    {
        $this->deutsch5a = $deutsch5a;
    }

    /**
     * Returns the deutsch5l
     * 
     * @return int $deutsch5l
     */
    public function getDeutsch5l()
    {
        return $this->deutsch5l;
    }

    /**
     * Sets the deutsch5l
     * 
     * @param int $deutsch5l
     * @return void
     */
    public function setDeutsch5l($deutsch5l)
    {
        $this->deutsch5l = $deutsch5l;
    }

    /**
     * Returns the deutsch5e
     * 
     * @return int $deutsch5e
     */
    public function getDeutsch5e()
    {
        return $this->deutsch5e;
    }

    /**
     * Sets the deutsch5e
     * 
     * @param int $deutsch5e
     * @return void
     */
    public function setDeutsch5e($deutsch5e)
    {
        $this->deutsch5e = $deutsch5e;
    }

    /**
     * Returns the deutsch5d
     * 
     * @return int $deutsch5d
     */
    public function getDeutsch5d()
    {
        return $this->deutsch5d;
    }

    /**
     * Sets the deutsch5d
     * 
     * @param int $deutsch5d
     * @return void
     */
    public function setDeutsch5d($deutsch5d)
    {
        $this->deutsch5d = $deutsch5d;
    }

    /**
     * Returns the deutsch6a
     * 
     * @return int $deutsch6a
     */
    public function getDeutsch6a()
    {
        return $this->deutsch6a;
    }

    /**
     * Sets the deutsch6a
     * 
     * @param int $deutsch6a
     * @return void
     */
    public function setDeutsch6a($deutsch6a)
    {
        $this->deutsch6a = $deutsch6a;
    }

    /**
     * Returns the deutsch6l
     * 
     * @return int $deutsch6l
     */
    public function getDeutsch6l()
    {
        return $this->deutsch6l;
    }

    /**
     * Sets the deutsch6l
     * 
     * @param int $deutsch6l
     * @return void
     */
    public function setDeutsch6l($deutsch6l)
    {
        $this->deutsch6l = $deutsch6l;
    }

    /**
     * Returns the deutsch6e
     * 
     * @return int $deutsch6e
     */
    public function getDeutsch6e()
    {
        return $this->deutsch6e;
    }

    /**
     * Sets the deutsch6e
     * 
     * @param int $deutsch6e
     * @return void
     */
    public function setDeutsch6e($deutsch6e)
    {
        $this->deutsch6e = $deutsch6e;
    }

    /**
     * Returns the deutsch6d
     * 
     * @return int $deutsch6d
     */
    public function getDeutsch6d()
    {
        return $this->deutsch6d;
    }

    /**
     * Sets the deutsch6d
     * 
     * @param int $deutsch6d
     * @return void
     */
    public function setDeutsch6d($deutsch6d)
    {
        $this->deutsch6d = $deutsch6d;
    }

    /**
     * Returns the deutsch7a
     * 
     * @return int $deutsch7a
     */
    public function getDeutsch7a()
    {
        return $this->deutsch7a;
    }

    /**
     * Sets the deutsch7a
     * 
     * @param int $deutsch7a
     * @return void
     */
    public function setDeutsch7a($deutsch7a)
    {
        $this->deutsch7a = $deutsch7a;
    }

    /**
     * Returns the deutsch7l
     * 
     * @return int $deutsch7l
     */
    public function getDeutsch7l()
    {
        return $this->deutsch7l;
    }

    /**
     * Sets the deutsch7l
     * 
     * @param int $deutsch7l
     * @return void
     */
    public function setDeutsch7l($deutsch7l)
    {
        $this->deutsch7l = $deutsch7l;
    }

    /**
     * Returns the deutsch7e
     * 
     * @return int $deutsch7e
     */
    public function getDeutsch7e()
    {
        return $this->deutsch7e;
    }

    /**
     * Sets the deutsch7e
     * 
     * @param int $deutsch7e
     * @return void
     */
    public function setDeutsch7e($deutsch7e)
    {
        $this->deutsch7e = $deutsch7e;
    }

    /**
     * Returns the deutsch7d
     * 
     * @return int $deutsch7d
     */
    public function getDeutsch7d()
    {
        return $this->deutsch7d;
    }

    /**
     * Sets the deutsch7d
     * 
     * @param int $deutsch7d
     * @return void
     */
    public function setDeutsch7d($deutsch7d)
    {
        $this->deutsch7d = $deutsch7d;
    }

    /**
     * Returns the mathe1a1
     * 
     * @return int $mathe1a1
     */
    public function getMathe1a1()
    {
        return $this->mathe1a1;
    }

    /**
     * Sets the mathe1a1
     * 
     * @param int $mathe1a1
     * @return void
     */
    public function setMathe1a1($mathe1a1)
    {
        $this->mathe1a1 = $mathe1a1;
    }

    /**
     * Returns the mathe1a2
     * 
     * @return int $mathe1a2
     */
    public function getMathe1a2()
    {
        return $this->mathe1a2;
    }

    /**
     * Sets the mathe1a2
     * 
     * @param int $mathe1a2
     * @return void
     */
    public function setMathe1a2($mathe1a2)
    {
        $this->mathe1a2 = $mathe1a2;
    }

    /**
     * Returns the mathe1b1
     * 
     * @return int $mathe1b1
     */
    public function getMathe1b1()
    {
        return $this->mathe1b1;
    }

    /**
     * Sets the mathe1b1
     * 
     * @param int $mathe1b1
     * @return void
     */
    public function setMathe1b1($mathe1b1)
    {
        $this->mathe1b1 = $mathe1b1;
    }

    /**
     * Returns the mathe1b2
     * 
     * @return int $mathe1b2
     */
    public function getMathe1b2()
    {
        return $this->mathe1b2;
    }

    /**
     * Sets the mathe1b2
     * 
     * @param int $mathe1b2
     * @return void
     */
    public function setMathe1b2($mathe1b2)
    {
        $this->mathe1b2 = $mathe1b2;
    }

    /**
     * Returns the mathe2a1
     * 
     * @return int $mathe2a1
     */
    public function getMathe2a1()
    {
        return $this->mathe2a1;
    }

    /**
     * Sets the mathe2a1
     * 
     * @param int $mathe2a1
     * @return void
     */
    public function setMathe2a1($mathe2a1)
    {
        $this->mathe2a1 = $mathe2a1;
    }

    /**
     * Returns the mathe2a2
     * 
     * @return int $mathe2a2
     */
    public function getMathe2a2()
    {
        return $this->mathe2a2;
    }

    /**
     * Sets the mathe2a2
     * 
     * @param int $mathe2a2
     * @return void
     */
    public function setMathe2a2($mathe2a2)
    {
        $this->mathe2a2 = $mathe2a2;
    }

    /**
     * Returns the mathe2b1
     * 
     * @return int $mathe2b1
     */
    public function getMathe2b1()
    {
        return $this->mathe2b1;
    }

    /**
     * Sets the mathe2b1
     * 
     * @param int $mathe2b1
     * @return void
     */
    public function setMathe2b1($mathe2b1)
    {
        $this->mathe2b1 = $mathe2b1;
    }

    /**
     * Returns the mathe2b2
     * 
     * @return int $mathe2b2
     */
    public function getMathe2b2()
    {
        return $this->mathe2b2;
    }

    /**
     * Sets the mathe2b2
     * 
     * @param int $mathe2b2
     * @return void
     */
    public function setMathe2b2($mathe2b2)
    {
        $this->mathe2b2 = $mathe2b2;
    }

    /**
     * Returns the mathe3a1
     * 
     * @return int $mathe3a1
     */
    public function getMathe3a1()
    {
        return $this->mathe3a1;
    }

    /**
     * Sets the mathe3a1
     * 
     * @param int $mathe3a1
     * @return void
     */
    public function setMathe3a1($mathe3a1)
    {
        $this->mathe3a1 = $mathe3a1;
    }

    /**
     * Returns the mathe3a2
     * 
     * @return int $mathe3a2
     */
    public function getMathe3a2()
    {
        return $this->mathe3a2;
    }

    /**
     * Sets the mathe3a2
     * 
     * @param int $mathe3a2
     * @return void
     */
    public function setMathe3a2($mathe3a2)
    {
        $this->mathe3a2 = $mathe3a2;
    }

    /**
     * Returns the mathe3b1
     * 
     * @return int $mathe3b1
     */
    public function getMathe3b1()
    {
        return $this->mathe3b1;
    }

    /**
     * Sets the mathe3b1
     * 
     * @param int $mathe3b1
     * @return void
     */
    public function setMathe3b1($mathe3b1)
    {
        $this->mathe3b1 = $mathe3b1;
    }

    /**
     * Returns the mathe3b2
     * 
     * @return int $mathe3b2
     */
    public function getMathe3b2()
    {
        return $this->mathe3b2;
    }

    /**
     * Sets the mathe3b2
     * 
     * @param int $mathe3b2
     * @return void
     */
    public function setMathe3b2($mathe3b2)
    {
        $this->mathe3b2 = $mathe3b2;
    }

    /**
     * Returns the mathe4a1
     * 
     * @return int $mathe4a1
     */
    public function getMathe4a1()
    {
        return $this->mathe4a1;
    }

    /**
     * Sets the mathe4a1
     * 
     * @param int $mathe4a1
     * @return void
     */
    public function setMathe4a1($mathe4a1)
    {
        $this->mathe4a1 = $mathe4a1;
    }

    /**
     * Returns the mathe4a2
     * 
     * @return int $mathe4a2
     */
    public function getMathe4a2()
    {
        return $this->mathe4a2;
    }

    /**
     * Sets the mathe4a2
     * 
     * @param int $mathe4a2
     * @return void
     */
    public function setMathe4a2($mathe4a2)
    {
        $this->mathe4a2 = $mathe4a2;
    }

    /**
     * Returns the mathe4b1
     * 
     * @return int $mathe4b1
     */
    public function getMathe4b1()
    {
        return $this->mathe4b1;
    }

    /**
     * Sets the mathe4b1
     * 
     * @param int $mathe4b1
     * @return void
     */
    public function setMathe4b1($mathe4b1)
    {
        $this->mathe4b1 = $mathe4b1;
    }

    /**
     * Returns the mathe4b2
     * 
     * @return int $mathe4b2
     */
    public function getMathe4b2()
    {
        return $this->mathe4b2;
    }

    /**
     * Sets the mathe4b2
     * 
     * @param int $mathe4b2
     * @return void
     */
    public function setMathe4b2($mathe4b2)
    {
        $this->mathe4b2 = $mathe4b2;
    }

    /**
     * Returns the mathe5a1
     * 
     * @return int $mathe5a1
     */
    public function getMathe5a1()
    {
        return $this->mathe5a1;
    }

    /**
     * Sets the mathe5a1
     * 
     * @param int $mathe5a1
     * @return void
     */
    public function setMathe5a1($mathe5a1)
    {
        $this->mathe5a1 = $mathe5a1;
    }

    /**
     * Returns the mathe5a2
     * 
     * @return int $mathe5a2
     */
    public function getMathe5a2()
    {
        return $this->mathe5a2;
    }

    /**
     * Sets the mathe5a2
     * 
     * @param int $mathe5a2
     * @return void
     */
    public function setMathe5a2($mathe5a2)
    {
        $this->mathe5a2 = $mathe5a2;
    }

    /**
     * Returns the mathe5b1
     * 
     * @return int $mathe5b1
     */
    public function getMathe5b1()
    {
        return $this->mathe5b1;
    }

    /**
     * Sets the mathe5b1
     * 
     * @param int $mathe5b1
     * @return void
     */
    public function setMathe5b1($mathe5b1)
    {
        $this->mathe5b1 = $mathe5b1;
    }

    /**
     * Returns the mathe5b2
     * 
     * @return int $mathe5b2
     */
    public function getMathe5b2()
    {
        return $this->mathe5b2;
    }

    /**
     * Sets the mathe5b2
     * 
     * @param int $mathe5b2
     * @return void
     */
    public function setMathe5b2($mathe5b2)
    {
        $this->mathe5b2 = $mathe5b2;
    }

    /**
     * Returns the mathe6a1
     * 
     * @return int $mathe6a1
     */
    public function getMathe6a1()
    {
        return $this->mathe6a1;
    }

    /**
     * Sets the mathe6a1
     * 
     * @param int $mathe6a1
     * @return void
     */
    public function setMathe6a1($mathe6a1)
    {
        $this->mathe6a1 = $mathe6a1;
    }

    /**
     * Returns the mathe6a2
     * 
     * @return int $mathe6a2
     */
    public function getMathe6a2()
    {
        return $this->mathe6a2;
    }

    /**
     * Sets the mathe6a2
     * 
     * @param int $mathe6a2
     * @return void
     */
    public function setMathe6a2($mathe6a2)
    {
        $this->mathe6a2 = $mathe6a2;
    }

    /**
     * Returns the mathe6b1
     * 
     * @return int $mathe6b1
     */
    public function getMathe6b1()
    {
        return $this->mathe6b1;
    }

    /**
     * Sets the mathe6b1
     * 
     * @param int $mathe6b1
     * @return void
     */
    public function setMathe6b1($mathe6b1)
    {
        $this->mathe6b1 = $mathe6b1;
    }

    /**
     * Returns the mathe6b2
     * 
     * @return int $mathe6b2
     */
    public function getMathe6b2()
    {
        return $this->mathe6b2;
    }

    /**
     * Sets the mathe6b2
     * 
     * @param int $mathe6b2
     * @return void
     */
    public function setMathe6b2($mathe6b2)
    {
        $this->mathe6b2 = $mathe6b2;
    }

    /**
     * Returns the mathe7a1
     * 
     * @return int $mathe7a1
     */
    public function getMathe7a1()
    {
        return $this->mathe7a1;
    }

    /**
     * Sets the mathe7a1
     * 
     * @param int $mathe7a1
     * @return void
     */
    public function setMathe7a1($mathe7a1)
    {
        $this->mathe7a1 = $mathe7a1;
    }

    /**
     * Returns the mathe7a2
     * 
     * @return int $mathe7a2
     */
    public function getMathe7a2()
    {
        return $this->mathe7a2;
    }

    /**
     * Sets the mathe7a2
     * 
     * @param int $mathe7a2
     * @return void
     */
    public function setMathe7a2($mathe7a2)
    {
        $this->mathe7a2 = $mathe7a2;
    }

    /**
     * Returns the mathe7b1
     * 
     * @return int $mathe7b1
     */
    public function getMathe7b1()
    {
        return $this->mathe7b1;
    }

    /**
     * Sets the mathe7b1
     * 
     * @param int $mathe7b1
     * @return void
     */
    public function setMathe7b1($mathe7b1)
    {
        $this->mathe7b1 = $mathe7b1;
    }

    /**
     * Returns the mathe7b2
     * 
     * @return int $mathe7b2
     */
    public function getMathe7b2()
    {
        return $this->mathe7b2;
    }

    /**
     * Sets the mathe7b2
     * 
     * @param int $mathe7b2
     * @return void
     */
    public function setMathe7b2($mathe7b2)
    {
        $this->mathe7b2 = $mathe7b2;
    }

    /**
     * Returns the physik1
     * 
     * @return int $physik1
     */
    public function getPhysik1()
    {
        return $this->physik1;
    }

    /**
     * Sets the physik1
     * 
     * @param int $physik1
     * @return void
     */
    public function setPhysik1($physik1)
    {
        $this->physik1 = $physik1;
    }

    /**
     * Returns the physik2
     * 
     * @return int $physik2
     */
    public function getPhysik2()
    {
        return $this->physik2;
    }

    /**
     * Sets the physik2
     * 
     * @param int $physik2
     * @return void
     */
    public function setPhysik2($physik2)
    {
        $this->physik2 = $physik2;
    }

    /**
     * Returns the physik3
     * 
     * @return int $physik3
     */
    public function getPhysik3()
    {
        return $this->physik3;
    }

    /**
     * Sets the physik3
     * 
     * @param int $physik3
     * @return void
     */
    public function setPhysik3($physik3)
    {
        $this->physik3 = $physik3;
    }

    /**
     * Returns the paepsy1
     * 
     * @return int $paepsy1
     */
    public function getPaepsy1()
    {
        return $this->paepsy1;
    }

    /**
     * Sets the paepsy1
     * 
     * @param int $paepsy1
     * @return void
     */
    public function setPaepsy1($paepsy1)
    {
        $this->paepsy1 = $paepsy1;
    }

    /**
     * Returns the paepsy2
     * 
     * @return int $paepsy2
     */
    public function getPaepsy2()
    {
        return $this->paepsy2;
    }

    /**
     * Sets the paepsy2
     * 
     * @param int $paepsy2
     * @return void
     */
    public function setPaepsy2($paepsy2)
    {
        $this->paepsy2 = $paepsy2;
    }
	
    /**
     * Returns the gesuwi1
     * 
     * @return int $gesuwi1
     */
    public function getGesuwi1()
    {
        return $this->gesuwi1;
    }

    /**
     * Sets the gesuwi1
     * 
     * @param int $gesuwi1
     * @return void
     */
    public function setGesuwi1($gesuwi1)
    {
        $this->gesuwi1 = $gesuwi1;
    }

    /**
     * Returns the gesuwi2
     * 
     * @return int $gesuwi2
     */
    public function getGesuwi2()
    {
        return $this->gesuwi2;
    }

    /**
     * Sets the gesuwi2
     * 
     * @param int $gesuwi2
     * @return void
     */
    public function setGesuwi2($gesuwi2)
    {
        $this->gesuwi2 = $gesuwi2;
    }

    /**
     * Returns the gest1
     * 
     * @return int $gest1
     */
    public function getGest1()
    {
        return $this->gest1;
    }

    /**
     * Sets the gest1
     * 
     * @param int $gest1
     * @return void
     */
    public function setGest1($gest1)
    {
        $this->gest1 = $gest1;
    }

    /**
     * Returns the gest2
     * 
     * @return int $gest2
     */
    public function getGest2()
    {
        return $this->gest2;
    }

    /**
     * Sets the gest2
     * 
     * @param int $gest2
     * @return void
     */
    public function setGest2($gest2)
    {
        $this->gest2 = $gest2;
    }

    /**
     * Returns the gest3
     * 
     * @return int $gest3
     */
    public function getGest3()
    {
        return $this->gest3;
    }

    /**
     * Sets the gest3
     * 
     * @param int $gest3
     * @return void
     */
    public function setGest3($gest3)
    {
        $this->gest3 = $gest3;
    }

    /**
     * Returns the schulart
     * 
     * @return \MbFosbos\Bfbn\Domain\Model\Schulart $schulart
     */
    public function getSchulart()
    {
        return $this->schulart;
    }

    /**
     * Sets the schulart
     * 
     * @param \MbFosbos\Bfbn\Domain\Model\Schulart $schulart
     * @return void
     */
    public function setSchulart(\MbFosbos\Bfbn\Domain\Model\Schulart $schulart)
    {
        $this->schulart = $schulart;
    }

    /**
     * Returns the jahrgangsstufe
     * 
     * @return \MbFosbos\Bfbn\Domain\Model\Jahrgangsstufe $jahrgangsstufe
     */
    public function getJahrgangsstufe()
    {
        return $this->jahrgangsstufe;
    }

    /**
     * Sets the jahrgangsstufe
     * 
     * @param \MbFosbos\Bfbn\Domain\Model\Jahrgangsstufe $jahrgangsstufe
     * @return void
     */
    public function setJahrgangsstufe(\MbFosbos\Bfbn\Domain\Model\Jahrgangsstufe $jahrgangsstufe)
    {
        $this->jahrgangsstufe = $jahrgangsstufe;
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
