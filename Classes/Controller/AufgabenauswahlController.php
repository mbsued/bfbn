<?php
namespace OliverBauer\Bfbn\Controller;

use OliverBauer\Bfbn\Domain\Repository\InstitutionRepository;
use OliverBauer\Bfbn\Domain\Repository\AufgabenauswahlRepository;
use OliverBauer\Bfbn\Domain\Repository\SchulartRepository;
use OliverBauer\Bfbn\Domain\Repository\JahrgangsstufeRepository;
use OliverBauer\Bfbn\Domain\Repository\FrontendUserRepository;
use OliverBauer\Bfbn\Service\AccessControlService;
use Psr\Http\Message\ResponseInterface;

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
 * AufgabenauswahlController
 */
class AufgabenauswahlController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * InstitutionRepository
     * 
     * @var \OliverBauer\Bfbn\Domain\Repository\InstitutionRepository
     */
    private $InstitutionRepository = null;
	
    /**
     * AufgabenauswahlRepository
     * 
     * @var \OliverBauer\Bfbn\Domain\Repository\AufgabenauswahlRepository
     */
    private $AufgabenauswahlRepository = null;
	
    /**
     * SchulartRepository
     * 
     * @var \OliverBauer\Bfbn\Domain\Repository\SchulartRepository
     */
	private $SchulartRepository = null;
	
	/**
     * JahrgangsstufeRepository
     * 
     * @var \OliverBauer\Bfbn\Domain\Repository\JahrgangsstufeRepository
     */
    private $JahrgangsstufeRepository = null;	

	/**
     * UserRepository
     * 
     * @var \OliverBauer\Bfbn\Domain\Repository\FrontendUserRepository
     */
    private $FrontendUserRepository = null;	
	
	/**
	 * @var \OliverBauer\Bfbn\Service\AccessControlService
	 */
	private $AccessControlService;

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
     * Inject the Aufgabenauswahl repository
     *
     * @param \OliverBauer\Bfbn\Domain\Repository\AufgabenauswahlRepository $AufgabenauswahlRepository
     */
    public function injectAufgabenauswahlRepository(AufgabenauswahlRepository $AufgabenauswahlRepository)
    {
        $this->AufgabenauswahlRepository = $AufgabenauswahlRepository;
    }	

    /**
     * Inject the schulart repository
     *
     * @param \OliverBauer\Bfbn\Domain\Repository\SchulartRepository $SchulartRepository
     */
    public function injectSchulartRepository(SchulartRepository $SchulartRepository)
    {
        $this->SchulartRepository = $SchulartRepository;
    }
	
    /**
     * Inject the jahrgangsstufe repository
     *
     * @param \OliverBauer\Bfbn\Domain\Repository\JahrgangsstufeRepository $JahrgangsstufeRepository
     */
    public function injectJahrgangsstufeRepository(JahrgangsstufeRepository $JahrgangsstufeRepository)
    {
        $this->JahrgangsstufeRepository = $JahrgangsstufeRepository;
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
     * @param \OliverBauer\Bfbn\Domain\Model\Aufgabenauswahl $Aufgabenauswahl
     * @return void
     */
    public function showAction(\OliverBauer\Bfbn\Domain\Model\Aufgabenauswahl $Aufgabenauswahl): ResponseInterface
    {
        $this->view->assign('Aufgabenauswahl', $Aufgabenauswahl);
		return $this->htmlResponse($this->view->render());	
    }
	
	/**
     * action list
     * 
     * @return void
     */
    public function listAction(\OliverBauer\Bfbn\Domain\Model\Aufgabenauswahl $aufgabenauswahl=null): ResponseInterface
	{
        if (is_null($aufgabenauswahl)) {
			if ($this->AccessControlService->hasLoggedInFrontendUser()) {
				$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
				$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
				if (!is_null($gesuchteinstitution)) {					
					if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
						$demand = $this -> createDemandObject($gesuchteinstitution);
						$aufgabenauswahlen = $this->AufgabenauswahlRepository->findDemanded($demand);
						$this->view->assign('institution',$gesuchteinstitution);
						$this->view->assign('aufgabenauswahlen', $aufgabenauswahlen);
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
    /**
     * action edit
     * 
     * @param \OliverBauer\Bfbn\Domain\Model\Aufgabenauswahl $aufgabenauswahl
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation $aufgabenauswahl
     * @return void
     */
    public function editAction(\OliverBauer\Bfbn\Domain\Model\Aufgabenauswahl $aufgabenauswahl): ResponseInterface	
	{
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$this->view->assign('aufgabenauswahl', $aufgabenauswahl);
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
		return $this->htmlResponse();		
	}	
    /**
     * action new
	 *
	 * @param int $schulartuid
	 * @param int $jahrgangsstufeuid	
     * @param \OliverBauer\Bfbn\Domain\Model\Aufgabenauswahl $aufgabenauswahl
	 * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation $aufgabenauswahl
	 *	
     * @return string
     */
    public function newAction($schulartuid,$jahrgangsstufeuid,\OliverBauer\Bfbn\Domain\Model\Aufgabenauswahl $aufgabenauswahl = NULL): ResponseInterface
    {
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$schulart = $this->SchulartRepository->findByUid($schulartuid);
					$jahrgangsstufe = $this->JahrgangsstufeRepository->findByUid($jahrgangsstufeuid);
					$this->view->assign('aufgabenauswahl', $aufgabenauswahl ?? NULL);
					$this->view->assign('institution', $gesuchteinstitution);
					$this->view->assign('schulart',$schulart);
					$this->view->assign('jahrgangsstufe',$jahrgangsstufe);
				} else {
					$this->addFlashMessage('Sie haben keine Berechtigung die Aktion auszuführen.');
				}
			} else {
				$this->addFlashMessage('Schule nicht gefunden.');	
			}
		} else {
			$this->addFlashMessage('Benutzer nicht eingeloggt.');
		}
		return $this->htmlResponse();		
	}

    /**
     * action create
     * 
     * @param \OliverBauer\Bfbn\Domain\Model\Aufgabenauswahl $aufgabenauswahl
	 * 
     * @return void
     */
    public function createAction(\OliverBauer\Bfbn\Domain\Model\Aufgabenauswahl $aufgabenauswahl): ResponseInterface
    {
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$this->addFlashMessage('Die Daten wurden gespeichert');
	
					$this->AufgabenauswahlRepository->add($aufgabenauswahl);
					/** print \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($aufgabenauswahl); */
					return $this->redirect('list','Aufgabenauswahl',NULL);
				} else {
					$this->addFlashMessage('Sie haben keine Berechtigung die Aktion auszuführen.');
					return $this->htmlResponse();
				}
			} else {
				$this->addFlashMessage('Schule nicht gefunden.');
				return $this->htmlResponse();
			}
		} else {
			$this->addFlashMessage('Benutzer nicht eingeloggt.');
			return $this->htmlResponse();
		}  		
    }

    /**
     * action update
     * 
     * @param \OliverBauer\Bfbn\Domain\Model\Aufgabenauswahl $aufgabenauswahl
     * @return void
     */
    public function updateAction(\OliverBauer\Bfbn\Domain\Model\Aufgabenauswahl $aufgabenauswahl): ResponseInterface
    {
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$this->AufgabenauswahlRepository->update($aufgabenauswahl);
					return $this->redirect('list','Aufgabenauswahl', NULL);
				} else {
					$this->addFlashMessage('Sie haben keine Berechtigung die Aktion auszuführen.');
					return $this->htmlResponse();
				}
			} else {
				$this->addFlashMessage('Schule nicht gefunden.');
				return $this->htmlResponse();
			}
		} else {
			$this->addFlashMessage('Benutzer nicht eingeloggt.');
			return $this->htmlResponse();
		}        
    }

    /**
     * action delete
     * 
     * @param \OliverBauer\Bfbn\Domain\Model\Aufgabenauswahl $aufgabenauswahl
     * @return void
     */
    public function deleteAction(\OliverBauer\Bfbn\Domain\Model\Aufgabenauswahl $aufgabenauswahl): ResponseInterface
    {
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$this->addFlashMessage('Die Aufgabenauswahl wurde gelöscht');
					$this->AufgabenauswahlRepository->remove($aufgabenauswahl);
					return $this->redirect('list','Aufgabenauswahl', NULL);
				} else {
					$this->addFlashMessage('Sie haben keine Berechtigung die Aktion auszuführen.');
					return $this->htmlResponse();
				}
			} else {
				$this->addFlashMessage('Schule nicht gefunden.');
				return $this->htmlResponse();		
			}
		} else {
			$this->addFlashMessage('Benutzer nicht eingeloggt.');
			return $this->htmlResponse();
		} 	
    }
	
	protected function createDemandObject($institution) {

        $demand = $this->objectManager->get('OliverBauer\\Bfbn\\Domain\\Model\\AbfrageDemand'); // Neuer Inhalt ist der Dateiname vom Domain Modell -> Classes -> Domain -> Model
		$demand->setInstitution($institution);
		/** print \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($demand); 	*/	
        return $demand;
    }
}
