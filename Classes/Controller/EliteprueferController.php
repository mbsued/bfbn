<?php
namespace MbFosbos\Bfbn\Controller;

use MbFosbos\Bfbn\Factory\AbfrageDemandFactory;
use MbFosbos\Bfbn\Domain\Repository\InstitutionRepository;
use MbFosbos\Bfbn\Domain\Repository\EliteprueferRepository;
use MbFosbos\Bfbn\Domain\Repository\GeschlechtRepository;
use MbFosbos\Bfbn\Domain\Repository\FacheliteRepository;
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
 * EliteprueferController
 */
class EliteprueferController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
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
     * EliteprueferRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\EliteprueferRepository
     */
    private $EliteprueferRepository = null;
	
    /**
     * GeschlechtRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\GeschlechtRepository
     */    
	private $GeschlechtRepository = null;

	/**
     * FacheliteRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\FacheliteRepository
     */
    private $FacheliteRepository = null;	

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
     * Inject the Elitepruefer repository
     *
     * @param \MbFosbos\Bfbn\Domain\Repository\EliteprueferRepository $EliteprueferRepository
     */
    public function injectEliteprueferRepository(EliteprueferRepository $EliteprueferRepository)
    {
        $this->EliteprueferRepository = $EliteprueferRepository;
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
     * Inject the fachelite repository
     *
     * @param \MbFosbos\Bfbn\Domain\Repository\FacheliteRepository $FacheliteRepository
     */
    public function injectFacheliteRepository(FacheliteRepository $FacheliteRepository)
    {
        $this->FacheliteRepository = $FacheliteRepository;
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
     * @param \MbFosbos\Bfbn\Domain\Model\Elitepruefer $Elitepruefer
     * @return void
     */
    public function showAction(\MbFosbos\Bfbn\Domain\Model\Elitepruefer $elitepruefer): ResponseInterface
    {
        $this->view->assign('Elitepruefer', $elitepruefer);
		return $this->htmlResponse($this->view->render());
    }
	
	/**
     * action list
     * 
     * @return void
     */
    public function listAction(\MbFosbos\Bfbn\Domain\Model\Elitepruefer $elitepruefer=null): ResponseInterface
	{
        if (is_null($elitepruefer)) {
			if ($this->AccessControlService->hasLoggedInFrontendUser()) {
				$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
				$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
				if (!is_null($gesuchteinstitution)) {					
					if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {

						$demand = $this->AbfrageDemandFactory->createDemandObject($gesuchteinstitution);
						$alleelitepruefer = $this->EliteprueferRepository->findDemanded($demand);
						$whichTermin = $this->settings['termin'];
						$this->view->assign('termin', $whichtermin ?? 0);						
						$this->view->assign('alleelitepruefer', $alleelitepruefer);
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
	
    public function editAction(\MbFosbos\Bfbn\Domain\Model\Elitepruefer $elitepruefer): ResponseInterface	
	{
		
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$auswahlgeschlecht = $this->GeschlechtRepository->findAll();
					$auswahlfach = $this->FacheliteRepository->findAll();
					$this->view->assign('elitepruefer', $elitepruefer);
					$this->view->assign('institution', $gesuchteinstitution);
					$this->view->assign('auswahlgeschlecht', $auswahlgeschlecht);
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
     * @param \MbFosbos\Bfbn\Domain\Model\Elitepruefer $elitepruefer
 	 * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation $elitepruefer
	 *	
     * @return string
     */
    public function newAction(\MbFosbos\Bfbn\Domain\Model\Elitepruefer $elitepruefer = NULL): ResponseInterface
    {
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$auswahlgeschlecht = $this->GeschlechtRepository->findAll();				
					$auswahlfach = $this->FacheliteRepository->findAll();
					$this->view->assign('elitepruefer', $elitepruefer ?? NULL);
					$this->view->assign('institution', $gesuchteinstitution);
					$this->view->assign('auswahlfach', $auswahlfach);				
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
     * @param \MbFosbos\Bfbn\Domain\Model\Elitepruefer $elitepruefer
	 * 
     * @return void
     */
    public function createAction(\MbFosbos\Bfbn\Domain\Model\Elitepruefer $elitepruefer): ResponseInterface
    {
		
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());			
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());			
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$this->addFlashMessage('Die Person wurde erfolgreich angelegt'); 					 						
					$this->EliteprueferRepository->add($elitepruefer);
					return $this->redirect('list','Elitepruefer',NULL);
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
     * @param \MbFosbos\Bfbn\Domain\Model\Elitepruefer $elitepruefer
     * @return void
     */
    public function updateAction(\MbFosbos\Bfbn\Domain\Model\Elitepruefer $elitepruefer): ResponseInterface
    {
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) { 					
					$this->EliteprueferRepository->update($elitepruefer);
					return $this->redirect('list','Elitepruefer', NULL);
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
     * @param \MbFosbos\Bfbn\Domain\Model\Elitepruefer $elitepruefer
     * @return void
     */
    public function deleteAction(\MbFosbos\Bfbn\Domain\Model\Elitepruefer $elitepruefer): ResponseInterface
    {
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$this->addFlashMessage('Die Person wurde gelöscht');
					$this->EliteprueferRepository->remove($elitepruefer);
					return $this->redirect('list','Elitepruefer', NULL);
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
		if ($this->arguments->hasArgument('elitepruefer')) {			

			$postData = $this->request->getArgument('elitepruefer') ;

			if (isset($postData['elitepruefer'])) {
				if(is_null($postData['elitepruefer']['fach2'])) {
					$this->arguments->getArgument('elitepruefer')->getPropertyMappingConfiguration()->skipProperties('fach2');
				}
				if(is_null($postData['elitepruefer']['fach3'])) {
					$this->arguments->getArgument('elitepruefer')->getPropertyMappingConfiguration()->skipProperties('fach3');
				}
			}
		}
	}
	
}
