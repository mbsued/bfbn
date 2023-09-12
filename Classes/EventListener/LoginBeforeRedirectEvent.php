<?php
namespace OliverBauer\Bfbn\EventListener;

use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\FrontendLogin\Event\BeforeRedirectEvent;

final class LoginBeforeRedirectEvent
{
    public function __invoke(BeforeRedirectEvent $event): void
    {
		$request= $this->getRequest();
		$normalizedParams = $request->getAttribute('normalizedParams');
		$requestUrl = $normalizedParams->getRequestUrl();
		$requestUrlParts = explode("?",$requestUrl);
        
		$event->setRedirectUrl($requestUrlParts[0]);
       
    }
	
	private function getRequest(): ServerRequestInterface
	{
		return $GLOBALS['TYPO3_REQUEST'];
	}	
}