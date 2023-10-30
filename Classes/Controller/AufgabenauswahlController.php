<?php
namespace MbFosbos\Bfbn\Controller;

use MbFosbos\Bfbn\Domain\Repository\InstitutionRepository;
use MbFosbos\Bfbn\Domain\Repository\AufgabenauswahlRepository;
use MbFosbos\Bfbn\Domain\Repository\SchulartRepository;
use MbFosbos\Bfbn\Domain\Repository\JahrgangsstufeRepository;
use MbFosbos\Bfbn\Domain\Repository\FrontendUserRepository;
use MbFosbos\Bfbn\Service\AccessControlService;
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
     * @var \MbFosbos\Bfbn\Domain\Repository\InstitutionRepository
     */
    private $InstitutionRepository = null;
	
    /**
     * AufgabenauswahlRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\AufgabenauswahlRepository
     */
    private $AufgabenauswahlRepository = null;
	
    /**
     * SchulartRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\SchulartRepository
     */
	private $SchulartRepository = null;
	
	/**
     * JahrgangsstufeRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\JahrgangsstufeRepository
     */
    private $JahrgangsstufeRepository = null;	

	/**
     * UserRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\FrontendUserRepository
     */
    private $FrontendUserRepository = null;	
	
	/**
	 * @var \MbFosbos\Bfbn\Service\AccessControlService
	 */
	private $AccessControlService;

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
     * Inject the Aufgabenauswahl repository
     *
     * @param \MbFosbos\Bfbn\Domain\Repository\AufgabenauswahlRepository $AufgabenauswahlRepository
     */
    public function injectAufgabenauswahlRepository(AufgabenauswahlRepository $AufgabenauswahlRepository)
    {
        $this->AufgabenauswahlRepository = $AufgabenauswahlRepository;
    }	

    /**
     * Inject the schulart repository
     *
     * @param \MbFosbos\Bfbn\Domain\Repository\SchulartRepository $SchulartRepository
     */
    public function injectSchulartRepository(SchulartRepository $SchulartRepository)
    {
        $this->SchulartRepository = $SchulartRepository;
    }
	
    /**
     * Inject the jahrgangsstufe repository
     *
     * @param \MbFosbos\Bfbn\Domain\Repository\JahrgangsstufeRepository $JahrgangsstufeRepository
     */
    public function injectJahrgangsstufeRepository(JahrgangsstufeRepository $JahrgangsstufeRepository)
    {
        $this->JahrgangsstufeRepository = $JahrgangsstufeRepository;
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
     * @param \MbFosbos\Bfbn\Domain\Model\Aufgabenauswahl $Aufgabenauswahl
     * @return void
     */
    public function showAction(\MbFosbos\Bfbn\Domain\Model\Aufgabenauswahl $Aufgabenauswahl): ResponseInterface
    {
        $this->view->assign('Aufgabenauswahl', $Aufgabenauswahl);
		return $this->htmlResponse($this->view->render());	
    }
	
	/**
     * action list
     * 
     * @return void
     */
    public function listAction(\MbFosbos\Bfbn\Domain\Model\Aufgabenauswahl $aufgabenauswahl=null): ResponseInterface
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
     * @param \MbFosbos\Bfbn\Domain\Model\Aufgabenauswahl $aufgabenauswahl
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation ("aufgabenauswahl")
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation ("gesuchteinstitution")	 
     * @return void
     */
    public function editAction(\MbFosbos\Bfbn\Domain\Model\Aufgabenauswahl $aufgabenauswahl): ResponseInterface	
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
     * @param \MbFosbos\Bfbn\Domain\Model\Aufgabenauswahl $aufgabenauswahl
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation ("aufgabenauswahl")
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation ("gesuchteinstitution")
	 *	
     * @return string
     */
    public function newAction($schulartuid,$jahrgangsstufeuid,\MbFosbos\Bfbn\Domain\Model\Aufgabenauswahl $aufgabenauswahl = NULL): ResponseInterface
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
     * @param \MbFosbos\Bfbn\Domain\Model\Aufgabenauswahl $aufgabenauswahl
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation ("aufgabenauswahl")
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation ("gesuchteinstitution")
	 * 
     * @return void
     */
    public function createAction(\MbFosbos\Bfbn\Domain\Model\Aufgabenauswahl $aufgabenauswahl): ResponseInterface
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
     * @param \MbFosbos\Bfbn\Domain\Model\Aufgabenauswahl $aufgabenauswahl
     * @return void
     */
    public function updateAction(\MbFosbos\Bfbn\Domain\Model\Aufgabenauswahl $aufgabenauswahl): ResponseInterface
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
     * @param \MbFosbos\Bfbn\Domain\Model\Aufgabenauswahl $aufgabenauswahl
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation ("aufgabenauswahl")
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation ("gesuchteinstitution")
	 *	
     * @return void
     */
    public function deleteAction(\MbFosbos\Bfbn\Domain\Model\Aufgabenauswahl $aufgabenauswahl): ResponseInterface
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

        $demand = $this->objectManager->get('MbFosbos\\Bfbn\\Domain\\Model\\AbfrageDemand'); // Neuer Inhalt ist der Dateiname vom Domain Modell -> Classes -> Domain -> Model
		$demand->setInstitution($institution);
		/** print \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($demand); 	*/	
        return $demand;
    }
}
