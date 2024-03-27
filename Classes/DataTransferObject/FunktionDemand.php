<?php
namespace MbFosbos\Bfbn\DataTransferObject;


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
 * FunktionDemand
 */
class FunktionDemand
{

	
    /**
     * art
     * 
     * @var array
     */
    protected $art = null;	


    /**
     * Returns the art
     * 
     * @return array $art
     */
    public function getArt()
    {
        return $this->art;
    }

    /**
     * Sets the art
     * 
     * @param array $art
     * @return void
     */
    public function setArt($art)
    {
        $this->art = $art;
    }
}
