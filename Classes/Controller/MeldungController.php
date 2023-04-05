<?php
namespace OliverBauer\Bfbn\Controller;

use OliverBauer\Bfbn\Domain\Repository\InstitutionRepository;
use OliverBauer\Bfbn\Domain\Repository\MeldungRepository;
use OliverBauer\Bfbn\Service\AccessControlService;
use OliverBauer\Bfbn\Domain\Repository\FrontendUserRepository;

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
 *  (c) 2022 
 *
 ***/
/**
 * MeldungController
 */
class MeldungController extends ActionController
{

    /**
     * InstitutionRepository
     * 
     * @var \OliverBauer\Bfbn\Domain\Repository\InstitutionRepository
     */
    private $InstitutionRepository = null;
	
    /**
     * MeldungRepository
     * 
     * @var \OliverBauer\Bfbn\Domain\Repository\MeldungRepository
     */
    private $MeldungRepository = null;
	
	/**
     * UserRepository
     * 
     * @var \OliverBauer\Bfbn\Domain\Repository\FrontendUserRepository
     */
    private $FrontendUserRepository = null;	
	
	/**
	 * @var \OliverBauer\Bfbn\Service\AccessControlService
	 */
	private $accessControlService;

    /**
     * Inject the Institution repository
     *
     * @param \OliverBauer\Bfbn\Domain\Repository\InstitutionRepository $InstitutionRepository
     */
    public function injectInstitutionRepository(InstitutionRepository $InstitutionRepository)
    {
        $this->InstitutionRepository = $InstitutionRepository;
    }

    /**
     * Inject the meldung repository
     *
     * @param \OliverBauer\Bfbn\Domain\Repository\MeldungRepository $MeldungRepository
     */
    public function injectMeldungRepository(MeldungRepository $MeldungRepository)
    {
        $this->MeldungRepository = $MeldungRepository;
    }

    /**
     * Inject the frontenduser repository
     *
     * @param \OliverBauer\Bfbn\Domain\Repository\FrontendUserRepository $FrontendUserRepository
     */
    public function injectFrontendUserRepository(FrontendUserRepository $FrontendUserRepository)
    {
        $this->FrontendUserRepository = $FrontendUserRepository;
    }

    /**
     * Inject the access service
     *
     * @param \OliverBauer\Bfbn\Service\AccessControlService $AccessControlService
     */
    public function injectAccessControlService(AccessControlService $AccessControlService)
    {
        $this->AccessControlService = $AccessControlService;
    }

    /**
     * action show
     * 
     * @param \OliverBauer\Bfbn\Domain\Model\Meldung $Meldung
     * @return void
     */
    public function showAction(\OliverBauer\Bfbn\Domain\Model\Meldung $Meldung)
    {
        $this->view->assign('Meldung', $Meldung);
    }

    /**
     * action perform
     * 
     * 
     * @return void
     */
    public function performAction(\OliverBauer\Bfbn\Domain\Model\Meldung $Meldung=null): ResponseInterface
    {
        return new ForwardResponse('list');
    }
	
	/**
     * action list
     * 
     * @return void
     */
    public function listAction(\OliverBauer\Bfbn\Domain\Model\Meldung $Meldung=null)
	{
        if (is_null($meldung ?? NULL)) {
			if ($this->AccessControlService->hasLoggedInFrontendUser()) {
				$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
				$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
				if (!is_null($gesuchteinstitution)) {					
					if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
						$whichArt = $this->settings['art'];
						$demand = $this -> createDemandObject($gesuchteinstitution,$this->settings['art']);
						$meldungen = $this->MeldungRepository->findDemanded($demand);
						$this->view->assign('art', $whichArt);
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
    }	

	protected function createDemandObject($institution,$art) {

        $demand = $this->objectManager->get('OliverBauer\\Bfbn\\Domain\\Model\\MeldungDemand'); // Neuer Inhalt ist der Dateiname vom Domain Modell -> Classes -> Domain -> Model
		$demand->setInstitution($institution);
		$demand->setArt($art);
		/** print \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($demand); 	*/	
        return $demand;
    }	
}
