<?php
namespace MbFosbos\Bfbn\Controller;

use MbFosbos\Bfbn\Domain\Repository\InstitutionRepository;
use MbFosbos\Bfbn\Domain\Repository\UnfallstatistikRepository;
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
 *  (c) 2022 
 *
 ***/
/**
 * UnfallstatistikController
 */
class UnfallstatistikController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * InstitutionRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\InstitutionRepository
     */
    private $InstitutionRepository = null;
	
    /**
     * UnfallstatistikRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\UnfallstatistikRepository
     */
    private $UnfallstatistikRepository = null;

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
     * Inject the Unfallstatistik repository
     *
     * @param \MbFosbos\Bfbn\Domain\Repository\UnfallstatistikRepository $UnfallstatistikRepository
     */
    public function injectUnfallstatistikRepository(UnfallstatistikRepository $UnfallstatistikRepository)
    {
        $this->UnfallstatistikRepository = $UnfallstatistikRepository;
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
     * @param \MbFosbos\Bfbn\Domain\Model\Unfallstatistik $unfallstatistik
     * @return void
     */
    public function showAction(\MbFosbos\Bfbn\Domain\Model\Unfallstatistik $unfallstatistik): ResponseInterface
    {
        $this->view->assign('Unfallstatistik', $unfallstatistik);
		return $this->htmlResponse($this->view->render());
    }
	
	/**
     * action list
     * 
     * @return void
     */
    public function listAction(\MbFosbos\Bfbn\Domain\Model\Unfallstatistik $unfallstatistik=null): ResponseInterface
	{
        if (is_null($unfallstatistik)) {
			if ($this->AccessControlService->hasLoggedInFrontendUser()) {
				$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
				$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
				if (!is_null($gesuchteinstitution)) {					
					if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
						$demand = $this -> createDemandObject($gesuchteinstitution);
						$unfallstatistiken = $this->UnfallstatistikRepository->findDemanded($demand);
						$whichTermin = $this->settings['termin'];
						$this->view->assign('termin', $whichtermin ?? 0);						
						$this->view->assign('unfallstatistiken', $unfallstatistiken);
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
    /**
     * action edit
	 *
     * @param \MbFosbos\Bfbn\Domain\Model\Unfallstatistik $unfallstatistik
 	 * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation("unfallstatistik")
 	 * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation("gesuchteinstitution")	 
	 *	
     * @return string
     */
    public function editAction(\MbFosbos\Bfbn\Domain\Model\Unfallstatistik $unfallstatistik): ResponseInterface	
	{
		
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$this->view->assign('unfallstatistik', $unfallstatistik);
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
     * @param \MbFosbos\Bfbn\Domain\Model\Unfallstatistik $unfallstatistik
 	 * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation("unfallstatistik")
	 *	
     * @return string
     */
    public function newAction(\MbFosbos\Bfbn\Domain\Model\Unfallstatistik $unfallstatistik = NULL): ResponseInterface
    {
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$this->view->assign('unfallstatistik', $unfallstatistik ?? NULL);
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
     * action create
     * 
     * @param \MbFosbos\Bfbn\Domain\Model\Unfallstatistik $unfallstatistik
 	 * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation("unfallstatistik")
 	 * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation("gesuchteinstitution")	 
	 * 
     * @return void
     */
    public function createAction(\MbFosbos\Bfbn\Domain\Model\Unfallstatistik $unfallstatistik): ResponseInterface
    {
		
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());			
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());			
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$meldungerfolgreich='Die Unfallstatistik wurde erfolgreich angelegt';
					$this->addFlashMessage($meldungerfolgreich); 					 						
					$this->UnfallstatistikRepository->add($unfallstatistik);
					return $this->redirect('list','Unfallstatistik',NULL);
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
     * @param \MbFosbos\Bfbn\Domain\Model\Unfallstatistik $unfallstatistik
     * @return void
     */
    public function updateAction(\MbFosbos\Bfbn\Domain\Model\Unfallstatistik $unfallstatistik): ResponseInterface
    {
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$this->UnfallstatistikRepository->update($unfallstatistik);
					return $this->redirect('list','Unfallstatistik', NULL);
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
     * @param \MbFosbos\Bfbn\Domain\Model\Unfallstatistik $unfallstatistik
 	 * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation("gesuchteinstitution")	 
     * @return void
     */
    public function deleteAction(\MbFosbos\Bfbn\Domain\Model\Unfallstatistik $unfallstatistik): ResponseInterface
    {
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$this->addFlashMessage('Die Unfallstatistik wurde gelöscht');
					$this->UnfallstatistikRepository->remove($unfallstatistik);
					return $this->redirect('list','Unfallstatistik', NULL);
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