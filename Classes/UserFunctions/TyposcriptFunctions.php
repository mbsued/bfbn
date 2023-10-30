<?php
namespace MbFosbos\Bfbn\UserFunctions;

use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Method in a PHP class to be called from TypoScript
 */
final class TyposcriptFunctions
{
   /*
    * Reference to the parent (calling) cObject set from TypoScript
    *
    * @var ContentObjectRenderer
    */
   private $cObj;

   public function setContentObjectRenderer(ContentObjectRenderer $cObj): void
   {
       $this->cObj = $cObj;
   }

   /**
    * Custom method for data processing. Also demonstrates how this gives us the
    * ability to use methods in the parent object.
    *
    * @param  string When custom methods are used for data processing (like in stdWrap functions), the $content variable will hold the value to be processed. When methods are meant to return some generated content (like in USER and USER_INT objects), this variable is empty.
    * @param  array  TypoScript properties passed to this method.
    * @return string The input string changed
    */
   public function stripFilename(string $content, array $conf): string
   {

	if (strpos($content,"/") == 0) {
		$content = mb_substr($content,1);
	} 
					
	return $content;

   }
}