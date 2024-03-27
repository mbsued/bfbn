<?php
namespace MbFosbos\Bfbn\Controller;

use MbFosbos\Bfbn\Factory\AbfrageDemandFactory;
use MbFosbos\Bfbn\Domain\Repository\InstitutionRepository;
use MbFosbos\Bfbn\Domain\Repository\FortbildungRepository;
use MbFosbos\Bfbn\Domain\Repository\FortbildungartRepository;
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
 * FortbildungController
 */
class FortbildungController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
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
     * FortbildungRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\FortbildungRepository
     */
    private $FortbildungRepository = null;

	
    /**
     * FortbildungartRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\FortbildungartRepository
     */    
	private $FortbildungartRepository = null;

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
     * Inject the Fortbildung repository
     *
     * @param \MbFosbos\Bfbn\Domain\Repository\FortbildungRepository $FortbildungRepository
     */
    public function injectFortbildungRepository(FortbildungRepository $FortbildungRepository)
    {
        $this->FortbildungRepository = $FortbildungRepository;
    }	

    /**
     * Inject the Fortbildungart repository
     *
     * @param \MbFosbos\Bfbn\Domain\Repository\FortbildungartRepository $FortbildungartRepository
     */
    public function injectFortbildungartRepository(FortbildungartRepository $FortbildungartRepository)
    {
        $this->FortbildungartRepository = $FortbildungartRepository;
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
     * @param \MbFosbos\Bfbn\Domain\Model\Fortbildung $Fortbildung
     * @return void
     */
    public function showAction(\MbFosbos\Bfbn\Domain\Model\Fortbildung $Fortbildung): ResponseInterface
    {
        $this->view->assign('Fortbildungg', $Fortbildung);
		return $this->htmlResponse($this->view->render());		
    }
	
	/**
     * action list
     * 
     * @return void
     */
    public function listAction(\MbFosbos\Bfbn\Domain\Model\Fortbildung $fortbildung=null): ResponseInterface
	{
        if (is_null($fortbildung)) {
			if ($this->AccessControlService->hasLoggedInFrontendUser()) {
				$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
				$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
				if (!is_null($gesuchteinstitution)) {					
					if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
						$demand = $this->AbfrageDemandFactory->createDemandObject($gesuchteinstitution);
						$fortbildungen = $this->FortbildungRepository->findDemanded($demand);
						$this->view->assign('fortbildungen', $fortbildungen);						
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
     * @param \MbFosbos\Bfbn\Domain\Model\Fortbildung $fortbildung
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation ("fortbildung")
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation ("gesuchteinstitution")	 
     * @return void
     */
    public function editAction(\MbFosbos\Bfbn\Domain\Model\Fortbildung $fortbildung): ResponseInterface	
	{
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$auswahlart = $this->FortbildungartRepository->findAll();
					$this->view->assign('fortbildung', $fortbildung);
					$this->view->assign('institution', $gesuchteinstitution);
					$this->view->assign('auswahlart', $auswahlart);
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
     * @param \MbFosbos\Bfbn\Domain\Model\Fortbildung $fortbildung
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation ("fortbildung")
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation ("gesuchteinstitution")
	 *	
     * @return string
     */
    public function newAction(\MbFosbos\Bfbn\Domain\Model\Fortbildung $fortbildung = NULL): ResponseInterface
    {
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$auswahlart = $this->FortbildungartRepository->findAll();
					$this->view->assign('fortbildung', $fortbildung ?? NULL);
					$this->view->assign('institution', $gesuchteinstitution);
					$this->view->assign('auswahlart', $auswahlart);
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
     * @param \MbFosbos\Bfbn\Domain\Model\Fortbildung $fortbildung
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation ("fortbildung")
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation ("gesuchteinstitution")	 
	 * 
     * @return void
     */
    public function createAction(\MbFosbos\Bfbn\Domain\Model\Fortbildung $fortbildung): ResponseInterface
    {
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$this->addFlashMessage('Der Fortbildungsvorschlag wurde erfolgreich angelegt'); 					
					$this->FortbildungRepository->add($fortbildung);
					return $this->redirect('list','Fortbildung',NULL);
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
     * @param \MbFosbos\Bfbn\Domain\Model\Fortbildung $fortbildung
     * @return void
     */
    public function updateAction(\MbFosbos\Bfbn\Domain\Model\Fortbildung $fortbildung): ResponseInterface
    {
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$this->FortbildungRepository->update($fortbildung);
					return $this->redirect('list','Fortbildung', NULL);
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
     * @param \MbFosbos\Bfbn\Domain\Model\Fortbildung $fortbildung
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation ("fortbildung")
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation ("gesuchteinstitution")
	 *
     * @return void
     */
    public function deleteAction(\MbFosbos\Bfbn\Domain\Model\Fortbildung $fortbildung): ResponseInterface
    {
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$this->addFlashMessage('Der Fortbildungsvorschlag wurde gelöscht');
					$this->FortbildungRepository->remove($fortbildung);
					return $this->redirect('list','Fortbildung', NULL);
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
}
