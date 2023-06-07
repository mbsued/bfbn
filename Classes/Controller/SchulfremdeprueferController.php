<?php
namespace OliverBauer\Bfbn\Controller;

use OliverBauer\Bfbn\Domain\Repository\InstitutionRepository;
use OliverBauer\Bfbn\Domain\Repository\SchulfremdeprueferRepository;
use OliverBauer\Bfbn\Domain\Repository\GeschlechtRepository;
use OliverBauer\Bfbn\Domain\Repository\AbschlussRepository;
use OliverBauer\Bfbn\Domain\Repository\FachkurzRepository;
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
 * SchulfremdeprueferController
 */
class SchulfremdeprueferController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * InstitutionRepository
     * 
     * @var \OliverBauer\Bfbn\Domain\Repository\InstitutionRepository
     */
    private $InstitutionRepository = null;
	
    /**
     * SchulfremdeprueferRepository
     * 
     * @var \OliverBauer\Bfbn\Domain\Repository\SchulfremdeprueferRepository
     */
    private $SchulfremdeprueferRepository = null;

	
    /**
     * GeschlechtRepository
     * 
     * @var \OliverBauer\Bfbn\Domain\Repository\GeschlechtRepository
     */    
	private $GeschlechtRepository = null;

	/**
     * AbschlussRepository
     * 
     * @var \OliverBauer\Bfbn\Domain\Repository\AbschlussRepository
     */
    private $AbschlussRepository = null;
	
	/**
     * FachkurzRepository
     * 
     * @var \OliverBauer\Bfbn\Domain\Repository\FachkurzRepository
     */
    private $FachkurzRepository = null;	

	/**
     * UserRepository
     * 
     * @var \OliverBauer\Bfbn\Domain\Repository\FrontendUserRepository
     */
    private $FrontendUserRepository = null;	
	
	/**
	 * @var \OliverBauer\Bfbn\Service\AccessControlService
	 */
	protected $AccessControlService;

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
     * Inject the schulfremdepruefer repository
     *
     * @param \OliverBauer\Bfbn\Domain\Repository\SchulfremdeprueferRepository $SchulfremdeprueferRepository
     */
    public function injectSchulfremdeprueferRepository(SchulfremdeprueferRepository $SchulfremdeprueferRepository)
    {
        $this->SchulfremdeprueferRepository = $SchulfremdeprueferRepository;
    }	

    /**
     * Inject the geschlecht repository
     *
     * @param \OliverBauer\Bfbn\Domain\Repository\GeschlechtRepository $GeschlechtRepository
     */
    public function injectGeschlechtRepository(GeschlechtRepository $GeschlechtRepository)
    {
        $this->GeschlechtRepository = $GeschlechtRepository;
    }

    /**
     * Inject the abschluss repository
     *
     * @param \OliverBauer\Bfbn\Domain\Repository\AbschlussRepository $AbschlussRepository
     */
    public function injectAbschlussRepository(AbschlussRepository $AbschlussRepository)
    {
        $this->AbschlussRepository = $AbschlussRepository;
    }	

    /**
     * Inject the fachkurz repository
     *
     * @param \OliverBauer\Bfbn\Domain\Repository\FachkurzRepository $FachkurzRepository
     */
    public function injectFachkurzRepository(FachkurzRepository $FachkurzRepository)
    {
        $this->FachkurzRepository = $FachkurzRepository;
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
     * @param \OliverBauer\Bfbn\Domain\Model\Schulfremdepruefer $schulfremdepruefer
     * @return void
     */
    public function showAction(\OliverBauer\Bfbn\Domain\Model\Schulfremdepruefer $schulfremdepruefer): ResponseInterface
    {
        $this->view->assign('Schulfremdepruefer', $schulfremdepruefer);
		return $this->htmlResponse($this->view->render());
    }
	
	/**
     * action list
     * 
     * @return void
     */
    public function listAction(\OliverBauer\Bfbn\Domain\Model\Schulfremdepruefer $schulfremdepruefer=null): ResponseInterface
	{
        if (is_null($schulfremdepruefer)) {
			if ($this->AccessControlService->hasLoggedInFrontendUser()) {
				$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
				$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
				if (!is_null($gesuchteinstitution)) {					
					if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
						$demand = $this -> createDemandObject($gesuchteinstitution);
						$alleschulfremdenpruefer = $this->SchulfremdeprueferRepository->findDemanded($demand);
						$whichTermin = $this->settings['termin'];
						$this->view->assign('termin', $whichtermin ?? 0);						
						$this->view->assign('alleschulfremdenpruefer', $alleschulfremdenpruefer);
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
    }
	
    public function editAction(\OliverBauer\Bfbn\Domain\Model\Schulfremdepruefer $schulfremderpruefer): ResponseInterface	
	{
		
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$auswahlgeschlecht = $this->GeschlechtRepository->findAll();
					$auswahlabschluss = $this->AbschlussRepository->findAll();
					$auswahlfach = $this->FachkurzRepository->findAll();
					$this->view->assign('schulfremderpruefer', $schulfremderpruefer);
					$this->view->assign('institution', $gesuchteinstitution);
					$this->view->assign('auswahlgeschlecht', $auswahlgeschlecht);
					$this->view->assign('auswahlabschluss', $auswahlabschluss);
					$this->view->assign('auswahlfach', $auswahlfach);
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
	 * @param int $funktionuid		 
     * @param \OliverBauer\Bfbn\Domain\Model\Schulfremdepruefer $schulfremdepruefer
 	 * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation $schulfremdepruefer
	 *	
     * @return string
     */
    public function newAction(\OliverBauer\Bfbn\Domain\Model\Schulfremdepruefer $schulfremdepruefer = NULL): ResponseInterface
    {
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$auswahlgeschlecht = $this->GeschlechtRepository->findAll();
					$auswahlabschluss = $this->AbschlussRepository->findAll();					
					$auswahlfach = $this->FachkurzRepository->findAll();
					$this->view->assign('schulfremdepruefer', $schulfremdepruefer ?? NULL);
					$this->view->assign('institution', $gesuchteinstitution);
					$this->view->assign('auswahlfach', $auswahlfach);
					$this->view->assign('auswahlabschluss', $auswahlabschluss);					
					$this->view->assign('auswahlgeschlecht', $auswahlgeschlecht);
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
     * @param \OliverBauer\Bfbn\Domain\Model\Schulfremdepruefer $schulfremdepruefer
	 * 
     * @return void
     */
    public function createAction(\OliverBauer\Bfbn\Domain\Model\Schulfremdepruefer $schulfremdepruefer): ResponseInterface
    {
		
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());			
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());			
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$this->addFlashMessage('Die Person wurde erfolgreich angelegt'); 					 						
					$this->SchulfremdeprueferRepository->add($schulfremdepruefer);
					return $this->redirect('list','Schulfremdepruefer',NULL);
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
     * @param \OliverBauer\Bfbn\Domain\Model\Schulfremdepruefer $schulfremderpruefer
     * @return void
     */
    public function updateAction(\OliverBauer\Bfbn\Domain\Model\Schulfremdepruefer $schulfremderpruefer): ResponseInterface
    {
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$this->SchulfremdeprueferRepository->update($schulfremderpruefer);
					return $this->redirect('list','Schulfremdepruefer', NULL);
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
     * @param \OliverBauer\Bfbn\Domain\Model\Schulfremdepruefer $schulfremderpruefer
     * @return void
     */
    public function deleteAction(\OliverBauer\Bfbn\Domain\Model\Schulfremdepruefer $schulfremderpruefer): ResponseInterface
    {
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$this->addFlashMessage('Die Person wurde gelöscht');
					$this->SchulfremdeprueferRepository->remove($schulfremderpruefer);
					return $this->redirect('list','Schulfremdepruefer', NULL);
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
	* initializeCreateAction
	* 
	* @return void
	*/
	public function initializeCreateAction() 
	{
		if ($this->arguments->hasArgument('schulfremdepruefer')) {			

			$postData = $this->request->getArgument('schulfremdepruefer') ;
			/** print \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($postData); */
			if (isset($postData['schulfremdepruefer'])) {
				if(is_null($postData['schulfremdepruefer']['fach2'])) {
					$this->arguments->getArgument('schulfremdepruefer')->getPropertyMappingConfiguration()->skipProperties('fach2');
				}
				if(is_null($postData['schulfremdepruefer']['fach3'])) {
					$this->arguments->getArgument('schulfremdepruefer')->getPropertyMappingConfiguration()->skipProperties('fach3');
				}
			}
		}
	}	
	
	protected function createDemandObject($institution) {

        $demand = $this->objectManager->get('OliverBauer\\Bfbn\\Domain\\Model\\AbfrageDemand'); // Neuer Inhalt ist der Dateiname vom Domain Modell -> Classes -> Domain -> Model
		$demand->setInstitution($institution);
		/** print \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($demand); 	*/	
        return $demand;
    }	
}
