<?php
namespace MbFosbos\Bfbn\Controller;

use MbFosbos\Bfbn\Factory\MeldungDemandFactory;
use MbFosbos\Bfbn\Domain\Repository\InstitutionRepository;
use MbFosbos\Bfbn\Domain\Repository\MeldungRepository;
use MbFosbos\Bfbn\Service\AccessControlService;
use MbFosbos\Bfbn\Domain\Repository\FrontendUserRepository;

use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Http\ForwardResponse;

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
 * MeldungController
 */
class MeldungController extends ActionController
{

	/**
     * MeldungDemandFactory
     * 
     * @var \MbFosbos\Bfbn\Factory\MeldungDemandFactory 	 
     */
    private $MeldungDemandFactory = null;

    /**
     * InstitutionRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\InstitutionRepository
     */
    private $InstitutionRepository = null;
	
    /**
     * MeldungRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\MeldungRepository
     */
    private $MeldungRepository = null;
	
	/**
     * UserRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\FrontendUserRepository
     */
    private $FrontendUserRepository = null;	
	
	/**
	 * @var \MbFosbos\Bfbn\Service\AccessControlService
	 */
	private $accessControlService;

    /**
     * Inject the Meldung Demand Factory
     *
     * @param \MbFosbos\Bfbn\Factory\MeldungDemandFactory $MeldungDemandFactory
     */
    public function injectMeldungDemandFactory(MeldungDemandFactory $MeldungDemandFactory)
    {
        $this->MeldungDemandFactory = $MeldungDemandFactory;
    }

    /**
     * Inject the Institution repository
     *
     * @param \MbFosbos\Bfbn\Domain\Repository\InstitutionRepository $InstitutionRepository
     */
    public function injectInstitutionRepository(InstitutionRepository $InstitutionRepository)
    {
        $this->InstitutionRepository = $InstitutionRepository;
    }

    /**
     * Inject the meldung repository
     *
     * @param \MbFosbos\Bfbn\Domain\Repository\MeldungRepository $MeldungRepository
     */
    public function injectMeldungRepository(MeldungRepository $MeldungRepository)
    {
        $this->MeldungRepository = $MeldungRepository;
    }

    /**
     * Inject the frontenduser repository
     *
     * @param \MbFosbos\Bfbn\Domain\Repository\FrontendUserRepository $FrontendUserRepository
     */
    public function injectFrontendUserRepository(FrontendUserRepository $FrontendUserRepository)
    {
        $this->FrontendUserRepository = $FrontendUserRepository;
    }

    /**
     * Inject the access service
     *
     * @param \MbFosbos\Bfbn\Service\AccessControlService $AccessControlService
     */
    public function injectAccessControlService(AccessControlService $AccessControlService)
    {
        $this->AccessControlService = $AccessControlService;
    }

    /**
     * action show
     * 
     * @param \MbFosbos\Bfbn\Domain\Model\Meldung $Meldung
     * @return void
     */
    public function showAction(\MbFosbos\Bfbn\Domain\Model\Meldung $Meldung)
    {
        $this->view->assign('Meldung', $Meldung);
    }

    /**
     * action perform
     * 
     * 
     * @return void
     */
    public function performAction(\MbFosbos\Bfbn\Domain\Model\Meldung $Meldung=null): ResponseInterface
    {
        return new ForwardResponse('list');
    }
	
	/**
     * action list
     * 
     * @return void
     */
    public function listAction(\MbFosbos\Bfbn\Domain\Model\Meldung $Meldung=null): ResponseInterface
	{
        if (is_null($meldung ?? NULL)) {
			if ($this->AccessControlService->hasLoggedInFrontendUser()) {
				$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
				$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
				if (!is_null($gesuchteinstitution)) {					
					if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
						$demand = $this->MeldungDemandFactory->createDemandObject($gesuchteinstitution,$this->settings['art']);
						$meldungen = $this->MeldungRepository->findDemanded($demand);
						$this->view->assign('meldungen', $meldungen);
						$this->view->assign('institution', $gesuchteinstitution);
					} else {
						$this->addFlashMessage('Sie haben keine Berechtigung die Aktion auszuführen.');
					}
				} else {
					$this->addFlashMessage('Schule nicht gefunden.');	
				}
			} else {
				$this->addFlashMessage('Benutzer nicht eingeloggt.');
			}		
        }
		return $this->htmlResponse();
    }	
}
