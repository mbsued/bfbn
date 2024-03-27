<?php
declare(strict_types=1);

namespace MbFosbos\Bfbn\DataTransferObject;


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
 * InstitutionSpracheDemand
 */
class InstitutionSpracheDemand
{

    /**
    * @var int search Sprache
    **/
    protected $sprache;

    /**
     * Returns the Sprache
     * 
     * @return string $sprache
     */
    public function getSprache()
    {
        return $this->sprache;
    }

    /**
     * Sets the Sprache
     * 
     * @param string $sprache
     * @return void
     */
    public function setSprache($sprache)
    {
        $this->sprache = $sprache;
    }

}
