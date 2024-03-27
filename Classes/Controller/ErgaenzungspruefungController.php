<?php
namespace MbFosbos\Bfbn\Controller;

use MbFosbos\Bfbn\Factory\AbfrageDemandFactory;
use MbFosbos\Bfbn\Domain\Repository\InstitutionRepository;
use MbFosbos\Bfbn\Domain\Repository\ErgaenzungspruefungRepository;
use MbFosbos\Bfbn\Domain\Repository\GeschlechtRepository;
use MbFosbos\Bfbn\Domain\Repository\SpracheRepository;
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
 * ErgaenzungspruefungController
 */
class ErgaenzungspruefungController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
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
     * PersonRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\ErgaenzungspruefungRepository
     */
    private $ErgaenzungspruefungRepository = null;

	
    /**
     * GeschlechtRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\GeschlechtRepository
     */    
	private $GeschlechtRepository = null;
	
	/**
     * SpracheRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\SpracheRepository
     */
    private $SpracheRepository = null;	

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
     * Inject the Ergaenzungspruefung repository
     *
     * @param \MbFosbos\Bfbn\Domain\Repository\ErgaenzungspruefungRepository $ErgaenzungspruefungRepository
     */
    public function injectErgaenzungspruefungRepository(ErgaenzungspruefungRepository $ErgaenzungspruefungRepository)
    {
        $this->ErgaenzungspruefungRepository = $ErgaenzungspruefungRepository;
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
     * Inject the sprache repository
     *
     * @param \MbFosbos\Bfbn\Domain\Repository\SpracheRepository $SpracheRepository
     */
    public function injectSpracheRepository(SpracheRepository $SpracheRepository)
    {
        $this->SpracheRepository = $SpracheRepository;
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
     * @param \MbFosbos\Bfbn\Domain\Model\Ergaenzungspruefung $Ergaenzungspruefung
     * @return void
     */
    public function showAction(\MbFosbos\Bfbn\Domain\Model\Ergaenzungspruefung $Ergaenzungspruefung): ResponseInterface
    {
        $this->view->assign('Ergaenzungspruefung', $Ergaenzungspruefung);
		return $this->htmlResponse($this->view->render());		
    }
	
	/**
     * action list
     * 
     * @return void
     */
    public function listAction(\MbFosbos\Bfbn\Domain\Model\Ergaenzungspruefung $ergaenzungspruefung=null): ResponseInterface
	{
        if (is_null($ergaenzungspruefung)) {
			if ($this->AccessControlService->hasLoggedInFrontendUser()) {
				$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
				$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
				if (!is_null($gesuchteinstitution)) {					
					if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
						$demand = $this->AbfrageDemandFactory->createDemandObject($gesuchteinstitution);
						$ergaenzungspruefungen = $this->ErgaenzungspruefungRepository->findDemanded($demand);
						$whichTermin = $this->settings['termin'];
						$this->view->assign('termin', $whichtermin ?? 0);
						$this->view->assign('ergaenzungspruefungen', $ergaenzungspruefungen);						
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
     * @param \MbFosbos\Bfbn\Domain\Model\Ergaenzungspruefung $ergaenzungspruefung
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation ("ergaenzungspruefung")
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation ("gesuchteinstitution")	 
     * @return void
     */
    public function editAction(\MbFosbos\Bfbn\Domain\Model\Ergaenzungspruefung $ergaenzungspruefung): ResponseInterface	
	{
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$auswahlgeschlecht = $this->GeschlechtRepository->findAll();
					$auswahlsprache = $this->SpracheRepository->findAll();
					$this->view->assign('ergaenzungspruefung', $ergaenzungspruefung);
					$this->view->assign('institution', $gesuchteinstitution);
					$this->view->assign('auswahlsprache', $auswahlsprache);
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
     * action new
	 *
	 * @param int $funktionuid		 
     * @param \MbFosbos\Bfbn\Domain\Model\Ergaenzungspruefung $ergaenzungspruefung
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation ("ergaenzungspruefung")
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation ("gesuchteinstitution")
	 *	
     * @return string
     */
    public function newAction(\MbFosbos\Bfbn\Domain\Model\Ergaenzungspruefung $ergaenzungspruefung = NULL): ResponseInterface
    {
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$auswahlgeschlecht = $this->GeschlechtRepository->findAll();
					$auswahlsprache = $this->SpracheRepository->findAll();
					$this->view->assign('ergaenzungspruefung', $ergaenzungspruefung ?? NULL);
					$this->view->assign('institution', $gesuchteinstitution);
					$this->view->assign('auswahlsprache', $auswahlsprache);
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
     * @param \MbFosbos\Bfbn\Domain\Model\Ergaenzungspruefung $ergaenzungspruefung
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation ("ergaenzungspruefung")
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation ("gesuchteinstitution")	 
	 * 
     * @return void
     */
    public function createAction(\MbFosbos\Bfbn\Domain\Model\Ergaenzungspruefung $ergaenzungspruefung): ResponseInterface
    {
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$this->addFlashMessage('Die Person wurde erfolgreich angelegt'); 					
					$this->ErgaenzungspruefungRepository->add($ergaenzungspruefung);
					return $this->redirect('list','Ergaenzungspruefung',NULL);
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
     * @param \MbFosbos\Bfbn\Domain\Model\Ergaenzungspruefung $ergaenzungspruefung
     * @return void
     */
    public function updateAction(\MbFosbos\Bfbn\Domain\Model\Ergaenzungspruefung $ergaenzungspruefung): ResponseInterface
    {
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$this->ErgaenzungspruefungRepository->update($ergaenzungspruefung);
					return $this->redirect('list','Ergaenzungspruefung', NULL);
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
     * @param \MbFosbos\Bfbn\Domain\Model\Ergaenzungspruefung $ergaenzungspruefung
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation ("ergaenzungspruefung")
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation ("gesuchteinstitution")
	 *
     * @return void
     */
    public function deleteAction(\MbFosbos\Bfbn\Domain\Model\Ergaenzungspruefung $ergaenzungspruefung): ResponseInterface
    {
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$this->addFlashMessage('Die Person wurde gelöscht');
					$this->ErgaenzungspruefungRepository->remove($ergaenzungspruefung);
					return $this->redirect('list','Ergaenzungspruefung', NULL);
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
