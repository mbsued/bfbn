<?php
namespace MbFosbos\Bfbn\Controller;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3\CMS\Extbase\Http\ForwardResponse;
use MbFosbos\Bfbn\Domain\Repository\DatenbankRepository;
use Psr\Http\Message\ResponseInterface;

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
/**
 * NachterminStatusController
 */
class NachterminStatusController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * DatenbankRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\DatenbankRepository 	 
     */
	 
    private $DatenbankRepository = null;
	
    /**
     * Inject the Datenbank repository
     *
     * @param \MbFosbos\Bfbn\Domain\Repository\DatenbankRepository $DatenbankRepository
     */
    public function injectDatenbankRepository(DatenbankRepository $DatenbankRepository)
    {
        $this->DatenbankRepository = $DatenbankRepository;
    }
	
    /**
     * action liststatus
     * 
     * @return void
     */
    public function liststatusAction(): ResponseInterface
	{
		$institutionen = $this->DatenbankRepository->findNachterminStatus($this->settings['art'],$this->settings['bezirke']);
        $this->view->assign('institutionen', $institutionen);
		return $this->htmlResponse($this->view->render());
    }
		
}