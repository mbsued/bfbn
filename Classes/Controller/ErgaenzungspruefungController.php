<?php
namespace OliverBauer\Bfbn\Controller;

use OliverBauer\Bfbn\Domain\Repository\InstitutionRepository;
use OliverBauer\Bfbn\Domain\Repository\ErgaenzungspruefungRepository;
use OliverBauer\Bfbn\Domain\Repository\GeschlechtRepository;
use OliverBauer\Bfbn\Domain\Repository\SpracheRepository;
use OliverBauer\Bfbn\Domain\Repository\FrontendUserRepository;
use OliverBauer\Bfbn\Service\AccessControlService;

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
 * ErgaenzungspruefungController
 */
class ErgaenzungspruefungController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * InstitutionRepository
     * 
     * @var \OliverBauer\Bfbn\Domain\Repository\InstitutionRepository
     */
    private $InstitutionRepository = null;
	
    /**
     * PersonRepository
     * 
     * @var \OliverBauer\Bfbn\Domain\Repository\ErgaenzungspruefungRepository
     */
    private $ErgaenzungspruefungRepository = null;

	
    /**
     * GeschlechtRepository
     * 
     * @var \OliverBauer\Bfbn\Domain\Repository\GeschlechtRepository
     */    
	private $GeschlechtRepository = null;
	
	/**
     * SpracheRepository
     * 
     * @var \OliverBauer\Bfbn\Domain\Repository\SpracheRepository
     */
    private $SpracheRepository = null;	

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
     * Inject the Ergaenzungspruefung repository
     *
     * @param \OliverBauer\Bfbn\Domain\Repository\ErgaenzungspruefungRepository $ErgaenzungspruefungRepository
     */
    public function injectErgaenzungspruefungRepository(ErgaenzungspruefungRepository $ErgaenzungspruefungRepository)
    {
        $this->ErgaenzungspruefungRepository = $ErgaenzungspruefungRepository;
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
     * Inject the sprache repository
     *
     * @param \OliverBauer\Bfbn\Domain\Repository\SpracheRepository $SpracheRepository
     */
    public function injectSpracheRepository(SpracheRepository $SpracheRepository)
    {
        $this->SpracheRepository = $SpracheRepository;
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
     * @param \OliverBauer\Bfbn\Domain\Model\Ergaenzungspruefung $Ergaenzungspruefung
     * @return void
     */
    public function showAction(\OliverBauer\Bfbn\Domain\Model\Ergaenzungspruefung $Ergaenzungspruefung)
    {
        $this->view->assign('Ergaenzungspruefung', $Ergaenzungspruefung);
    }
	
	/**
     * action list
     * 
     * @return void
     */
    public function listAction(\OliverBauer\Bfbn\Domain\Model\Ergaenzungspruefung $ergaenzungspruefung=null)
	{
        if (is_null($ergaenzungspruefung)) {
			if ($this->AccessControlService->hasLoggedInFrontendUser()) {
				$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
				$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
				if (!is_null($gesuchteinstitution)) {					
					if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
						$demand = $this -> createDemandObject($gesuchteinstitution);
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
    }	
    /**
     * action edit
     * 
     * @param \OliverBauer\Bfbn\Domain\Model\Ergaenzungspruefung $ergaenzungspruefung
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation $ergaenzungspruefung
     * @return void
     */
    public function editAction(\OliverBauer\Bfbn\Domain\Model\Ergaenzungspruefung $ergaenzungspruefung)	
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
	}	
    /**
     * action new
	 *
	 * @param int $funktionuid		 
     * @param \OliverBauer\Bfbn\Domain\Model\Ergaenzungspruefung $ergaenzungspruefung
 	 * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation $ergaenzungspruefung
	 *	
     * @return string
     */
    public function newAction(\OliverBauer\Bfbn\Domain\Model\Ergaenzungspruefung $ergaenzungspruefung = NULL)
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
       
    }

    /**
     * action create
     * 
     * @param \OliverBauer\Bfbn\Domain\Model\Ergaenzungspruefung $ergaenzungspruefung
	 * 
     * @return void
     */
    public function createAction(\OliverBauer\Bfbn\Domain\Model\Ergaenzungspruefung $ergaenzungspruefung)
    {
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$this->addFlashMessage('Die Person wurde erfolgreich angelegt'); 					
					$this->ErgaenzungspruefungRepository->add($ergaenzungspruefung);
					$this->redirect('list','Ergaenzungspruefung',NULL);
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

    /**
     * action update
     * 
     * @param \OliverBauer\Bfbn\Domain\Model\Ergaenzungspruefung $ergaenzungspruefung
     * @return void
     */
    public function updateAction(\OliverBauer\Bfbn\Domain\Model\Ergaenzungspruefung $ergaenzungspruefung)
    {
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$this->ErgaenzungspruefungRepository->update($ergaenzungspruefung);
					$this->redirect('list','Ergaenzungspruefung', NULL);
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

    /**
     * action delete
     * 
     * @param \OliverBauer\Bfbn\Domain\Model\Ergaenzungspruefung $ergaenzungspruefung
     * @return void
     */
    public function deleteAction(\OliverBauer\Bfbn\Domain\Model\Ergaenzungspruefung $ergaenzungspruefung)
    {
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$this->addFlashMessage('Die Person wurde gelöscht');
					$this->ErgaenzungspruefungRepository->remove($ergaenzungspruefung);
					$this->redirect('list','Ergaenzungspruefung', NULL);
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
	
	protected function createDemandObject($institution) {

        $demand = $this->objectManager->get('OliverBauer\\Bfbn\\Domain\\Model\\AbfrageDemand'); // Neuer Inhalt ist der Dateiname vom Domain Modell -> Classes -> Domain -> Model
		$demand->setInstitution($institution);
		/** print \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($demand); 	*/	
        return $demand;
    }	
}
