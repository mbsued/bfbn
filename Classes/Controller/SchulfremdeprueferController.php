<?php
namespace MbFosbos\Bfbn\Controller;

use MbFosbos\Bfbn\Factory\AbfrageDemandFactory;
use MbFosbos\Bfbn\Domain\Repository\InstitutionRepository;
use MbFosbos\Bfbn\Domain\Repository\SchulfremdeprueferRepository;
use MbFosbos\Bfbn\Domain\Repository\GeschlechtRepository;
use MbFosbos\Bfbn\Domain\Repository\AbschlussRepository;
use MbFosbos\Bfbn\Domain\Repository\FachkurzRepository;
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
 *  (c) 2024 
 *
 ***/
/**
 * SchulfremdeprueferController
 */
class SchulfremdeprueferController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

	/**
     * AbfrageDemandFactory
     * 
     * @var \MbFosbos\Bfbn\Factory\AbfrageDemandFactory 	 
     */
    private $AbfrageDemandFactory = null;

    /**
     * InstitutionRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\InstitutionRepository
     */
    private $InstitutionRepository = null;
	
    /**
     * SchulfremdeprueferRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\SchulfremdeprueferRepository
     */
    private $SchulfremdeprueferRepository = null;

	
    /**
     * GeschlechtRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\GeschlechtRepository
     */    
	private $GeschlechtRepository = null;

	/**
     * AbschlussRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\AbschlussRepository
     */
    private $AbschlussRepository = null;
	
	/**
     * FachkurzRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\FachkurzRepository
     */
    private $FachkurzRepository = null;	

	/**
     * UserRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\FrontendUserRepository
     */
    private $FrontendUserRepository = null;	
	
	/**
	 * @var \MbFosbos\Bfbn\Service\AccessControlService
	 */
	protected $AccessControlService;

    /**
     * Inject the Abfrage Demand Factory
     *
     * @param \MbFosbos\Bfbn\Factory\AbfrageDemandFactory $AbfrageDemandFactory
     */
    public function injectAbfrageDemandFactory(AbfrageDemandFactory $AbfrageDemandFactory)
    {
        $this->AbfrageDemandFactory = $AbfrageDemandFactory;
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
     * Inject the schulfremdepruefer repository
     *
     * @param \MbFosbos\Bfbn\Domain\Repository\SchulfremdeprueferRepository $SchulfremdeprueferRepository
     */
    public function injectSchulfremdeprueferRepository(SchulfremdeprueferRepository $SchulfremdeprueferRepository)
    {
        $this->SchulfremdeprueferRepository = $SchulfremdeprueferRepository;
    }	

    /**
     * Inject the geschlecht repository
     *
     * @param \MbFosbos\Bfbn\Domain\Repository\GeschlechtRepository $GeschlechtRepository
     */
    public function injectGeschlechtRepository(GeschlechtRepository $GeschlechtRepository)
    {
        $this->GeschlechtRepository = $GeschlechtRepository;
    }

    /**
     * Inject the abschluss repository
     *
     * @param \MbFosbos\Bfbn\Domain\Repository\AbschlussRepository $AbschlussRepository
     */
    public function injectAbschlussRepository(AbschlussRepository $AbschlussRepository)
    {
        $this->AbschlussRepository = $AbschlussRepository;
    }	

    /**
     * Inject the fachkurz repository
     *
     * @param \MbFosbos\Bfbn\Domain\Repository\FachkurzRepository $FachkurzRepository
     */
    public function injectFachkurzRepository(FachkurzRepository $FachkurzRepository)
    {
        $this->FachkurzRepository = $FachkurzRepository;
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
     * @param \MbFosbos\Bfbn\Domain\Model\Schulfremdepruefer $schulfremdepruefer
     * @return void
     */
    public function showAction(\MbFosbos\Bfbn\Domain\Model\Schulfremdepruefer $schulfremdepruefer): ResponseInterface
    {
        $this->view->assign('Schulfremdepruefer', $schulfremdepruefer);
		return $this->htmlResponse($this->view->render());
    }
	
	/**
     * action list
     * 
     * @return void
     */
    public function listAction(\MbFosbos\Bfbn\Domain\Model\Schulfremdepruefer $schulfremdepruefer=null): ResponseInterface
	{
        if (is_null($schulfremdepruefer)) {
			if ($this->AccessControlService->hasLoggedInFrontendUser()) {
				$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
				$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
				if (!is_null($gesuchteinstitution)) {					
					if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
						$demand = $this->AbfrageDemandFactory->createDemandObject($gesuchteinstitution);
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
	
    public function editAction(\MbFosbos\Bfbn\Domain\Model\Schulfremdepruefer $schulfremderpruefer): ResponseInterface	
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
     * @param \MbFosbos\Bfbn\Domain\Model\Schulfremdepruefer $schulfremderpruefer
 	 * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation $schulfremderpruefer
	 *	
     * @return string
     */
    public function newAction(\MbFosbos\Bfbn\Domain\Model\Schulfremdepruefer $schulfremderpruefer = NULL): ResponseInterface
    {
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$auswahlgeschlecht = $this->GeschlechtRepository->findAll();
					$auswahlabschluss = $this->AbschlussRepository->findAll();					
					$auswahlfach = $this->FachkurzRepository->findAll();
					$this->view->assign('schulfremderpruefer', $schulfremderpruefer ?? NULL);
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
     * @param \MbFosbos\Bfbn\Domain\Model\Schulfremdepruefer $schulfremderpruefer
	 * 
     * @return void
     */
    public function createAction(\MbFosbos\Bfbn\Domain\Model\Schulfremdepruefer $schulfremderpruefer): ResponseInterface
    {
		
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());			
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());			
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$this->addFlashMessage('Die Person wurde erfolgreich angelegt'); 					 						
					$this->SchulfremdeprueferRepository->add($schulfremderpruefer);
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
     * @param \MbFosbos\Bfbn\Domain\Model\Schulfremdepruefer $schulfremderpruefer
     * @return void
     */
    public function updateAction(\MbFosbos\Bfbn\Domain\Model\Schulfremdepruefer $schulfremderpruefer): ResponseInterface
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
     * @param \MbFosbos\Bfbn\Domain\Model\Schulfremdepruefer $schulfremderpruefer
     * @return void
     */
    public function deleteAction(\MbFosbos\Bfbn\Domain\Model\Schulfremdepruefer $schulfremderpruefer): ResponseInterface
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
		if ($this->arguments->hasArgument('schulfremderpruefer')) {			

			$postData = $this->request->getArgument('schulfremderpruefer') ;
			/** print \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($postData); */
			if (isset($postData['schulfremderpruefer'])) {
				if(is_null($postData['schulfremderpruefer']['fach2'])) {
					$this->arguments->getArgument('schulfremderpruefer')->getPropertyMappingConfiguration()->skipProperties('fach2');
				}
				if(is_null($postData['schulfremderpruefer']['fach3'])) {
					$this->arguments->getArgument('schulfremderpruefer')->getPropertyMappingConfiguration()->skipProperties('fach3');
				}
			}
		}
	}	
}
