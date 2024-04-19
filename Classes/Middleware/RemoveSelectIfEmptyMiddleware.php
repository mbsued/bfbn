<?php

declare(strict_types=1);

namespace MbFosbos\Bfbn\Middleware;

/***
 *
 * This file is part of the "BFBN" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2024
 *
 ***/
 
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RemoveSelectIfEmptyMiddleware implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
		$requestBody = $request->getParsedBody();

        if (!is_null($requestBody) && array_key_exists('tx_bfbn_eliteprueferlist',$requestBody)) {
			if (!is_string($requestBody['tx_bfbn_eliteprueferlist']['elitepruefer']['fach2'])) {
				if ($requestBody['tx_bfbn_eliteprueferlist']['elitepruefer']['fach2']['__identity'] === '') {
					$requestBody = $request->getParsedBody();
					unset($requestBody['tx_bfbn_eliteprueferlist']['elitepruefer']['fach2']);
					$requestBody['tx_bfbn_eliteprueferlist']['elitepruefer']['fach2'] ='';	
					$request = $request->withParsedBody($requestBody);
				}
			}
			if (!is_string($requestBody['tx_bfbn_eliteprueferlist']['elitepruefer']['fach3'])) {
				if ($requestBody['tx_bfbn_eliteprueferlist']['elitepruefer']['fach3']['__identity'] === '') {
					$requestBody = $request->getParsedBody();
					unset($requestBody['tx_bfbn_eliteprueferlist']['elitepruefer']['fach3']);
					$requestBody['tx_bfbn_eliteprueferlist']['elitepruefer']['fach3'] ='';	
					$request = $request->withParsedBody($requestBody);
				}
			}			
        }
        if (!is_null($requestBody) && array_key_exists('tx_bfbn_schulfremdeprueferlist',$requestBody)) {
			if (!is_string($requestBody['tx_bfbn_schulfremdeprueferlist']['schulfremderpruefer']['fach2'])) {
				if ($requestBody['tx_bfbn_schulfremdeprueferlist']['schulfremderpruefer']['fach2']['__identity'] === '') {
					$requestBody = $request->getParsedBody();
					unset($requestBody['tx_bfbn_schulfremdeprueferlist']['schulfremderpruefer']['fach2']);
					$requestBody['tx_bfbn_schulfremdeprueferlist']['schulfremderpruefer']['fach2'] ='';	
					$request = $request->withParsedBody($requestBody);
				}
			}
			if (!is_string($requestBody['tx_bfbn_schulfremdeprueferlist']['schulfremderpruefer']['fach3'])) {
				if ($requestBody['tx_bfbn_schulfremdeprueferlist']['schulfremderpruefer']['fach3']['__identity'] === '') {
					$requestBody = $request->getParsedBody();
					unset($requestBody['tx_bfbn_schulfremdeprueferlist']['schulfremderpruefer']['fach3']);
					$requestBody['tx_bfbn_schulfremdeprueferlist']['schulfremderpruefer']['fach3'] ='';	
					$request = $request->withParsedBody($requestBody);
				}
			}			
        }
		if (!is_null($requestBody) && array_key_exists('tx_bfbn_institutionedit',$requestBody)) {
			/** print \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($requestBody['tx_bfbn_institutionedit']['institution']); */
			 if ($requestBody['tx_bfbn_institutionedit']['institution']['art']['__identity'] === '2' || $requestBody['tx_bfbn_institutionedit']['institution']['art']['__identity'] === '3') { 
				if (!is_string($requestBody['tx_bfbn_institutionedit']['institution']['vorkursartfos'])) {
					if ($requestBody['tx_bfbn_institutionedit']['institution']['vorkursartfos']['__identity'] === '') {
						$requestBody = $request->getParsedBody();
						unset($requestBody['tx_bfbn_institutionedit']['institution']['vorkursartfos']);
						$requestBody['tx_bfbn_institutionedit']['institution']['vorkursartfos'] ='';	
						$request = $request->withParsedBody($requestBody);
					}
				}
				if (!is_string($requestBody['tx_bfbn_institutionedit']['institution']['vorkurstagfos'])) {
					if ($requestBody['tx_bfbn_institutionedit']['institution']['vorkurstagfos']['__identity'] === '') {
						$requestBody = $request->getParsedBody();
						unset($requestBody['tx_bfbn_institutionedit']['institution']['vorkurstagfos']);
						$requestBody['tx_bfbn_institutionedit']['institution']['vorkurstagfos'] ='';	
						$request = $request->withParsedBody($requestBody);
					}
				}
			} 
			if ($requestBody['tx_bfbn_institutionedit']['institution']['art']['__identity'] === '2' || $requestBody['tx_bfbn_institutionedit']['institution']['art']['__identity'] === '4') { 
				if (!is_string($requestBody['tx_bfbn_institutionedit']['institution']['vorkursartbos'])) { 
					if ($requestBody['tx_bfbn_institutionedit']['institution']['vorkursartbos']['__identity'] === '') {
						$requestBody = $request->getParsedBody();
						unset($requestBody['tx_bfbn_institutionedit']['institution']['vorkursartbos']);
						$requestBody['tx_bfbn_institutionedit']['institution']['vorkursartbos'] ='';	
						$request = $request->withParsedBody($requestBody);
					}
				}
				if (!is_string($requestBody['tx_bfbn_institutionedit']['institution']['vorkurstagbos'])) {
					if ($requestBody['tx_bfbn_institutionedit']['institution']['vorkurstagbos']['__identity'] === '') {
						$requestBody = $request->getParsedBody();
						unset($requestBody['tx_bfbn_institutionedit']['institution']['vorkurstagbos']);
						$requestBody['tx_bfbn_institutionedit']['institution']['vorkurstagbos'] ='';	
						$request = $request->withParsedBody($requestBody);
					}
				}
			}  	
        }
        if (!is_null($requestBody) && array_key_exists('tx_bfbn_nachterminlist',$requestBody)) {
			if (!is_string($requestBody['tx_bfbn_nachterminlist']['nachtermin']['sprache'])) {
				if ($requestBody['tx_bfbn_nachterminlist']['nachtermin']['sprache']['__identity'] === '') {
					$requestBody = $request->getParsedBody();
					unset($requestBody['tx_bfbn_nachterminlist']['nachtermin']['sprache']);
					$requestBody['tx_bfbn_nachterminlist']['nachtermin']['sprache'] ='';	
					$request = $request->withParsedBody($requestBody);
				}
			}			
        }		
        return $handler->handle($request);
    }
}
