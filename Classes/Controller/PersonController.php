<?php
namespace OliverBauer\Bfbn\Controller;

use OliverBauer\Bfbn\Domain\Repository\InstitutionRepository;
use OliverBauer\Bfbn\Domain\Repository\PersonRepository;
use OliverBauer\Bfbn\Domain\Repository\GeschlechtRepository;
use OliverBauer\Bfbn\Domain\Repository\FunktionRepository;
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
 * PersonController
 */
class PersonController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * InstitutionRepository
     * 
     * @var \OliverBauer\Bfbn\Domain\Repository\InstitutionRepository
     * @TYPO3\CMS\Extbase\Annotation\Inject
     */
    protected $InstitutionRepository = null;
	
    /**
     * PersonRepository
     * 
     * @var \OliverBauer\Bfbn\Domain\Repository\PersonRepository
     * @TYPO3\CMS\Extbase\Annotation\Inject
     */
    protected $PersonRepository = null;

	/**
     * UserRepository
     * 
     * @var \OliverBauer\Bfbn\Domain\Repository\FrontendUserRepository
     * @TYPO3\CMS\Extbase\Annotation\Inject
     */
    protected $FrontendUserRepository = null;
	
    /**
     * GeschlechtRepository
     * 
     * @var \OliverBauer\Bfbn\Domain\Repository\GeschlechtRepository
     * @TYPO3\CMS\Extbase\Annotation\Inject
     */
    
	protected $GeschlechtRepository = null;
	
	/**
     * FunktionRepository
     * 
     * @var \OliverBauer\Bfbn\Domain\Repository\FunktionRepository
     * @TYPO3\CMS\Extbase\Annotation\Inject
     */
    protected $FunktionRepository = null;	
	
	
	/**
	 * @var \OliverBauer\Bfbn\Service\AccessControlService
	 * @TYPO3\CMS\Extbase\Annotation\Inject
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
     * Inject the person repository
     *
     * @param \OliverBauer\Bfbn\Domain\Repository\PersonRepository $PersonRepository
     */
    public function injectPersonRepository(PersonRepository $PersonRepository)
    {
        $this->PersonRepository = $PersonRepository;
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
     * Inject the funktion repository
     *
     * @param \OliverBauer\Bfbn\Domain\Repository\FunktionRepository $FunktionRepository
     */
    public function injectFunktionRepository(FunktionRepository $FunktionRepository)
    {
        $this->FunktionRepository = $FunktionRepository;
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
     * @param \OliverBauer\Bfbn\Domain\Model\Person $Person
     * @return void
     */
    public function showAction(\OliverBauer\Bfbn\Domain\Model\Person $Person)
    {
        $this->view->assign('Person', $Person);
    }

    /**
     * action new
	 *
	 * @param int $funktionuid		 
     * @param \OliverBauer\Bfbn\Domain\Model\Person $person
 	 * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation $person
	 *	
     * @return string
     */
    public function newAction($funktionuid,\OliverBauer\Bfbn\Domain\Model\Person $person = NULL)
    {
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$auswahlgeschlecht = $this->GeschlechtRepository->findAll();
					$funktion = $this->FunktionRepository->findByUid($funktionuid);
					$this->view->assign('person', $Person);
					$this->view->assign('institution', $gesuchteinstitution);
					$this->view->assign('funktion', $funktion);
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
     * @param \OliverBauer\Bfbn\Domain\Model\Person $person
	 * @param \OliverBauer\Bfbn\Domain\Model\Funktion $funktion
     * @return void
     */
    public function createAction(\OliverBauer\Bfbn\Domain\Model\Person $person, \OliverBauer\Bfbn\Domain\Model\Funktion $funktion)
    {
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$person->addInstitutionen($gesuchteinstitution);
					$person->addFunktionen($funktion);
					$this->addFlashMessage('Die Person wurde erfolgreich angelegt'); 					
					$this->PersonRepository->add($person);
					$this->InstitutionRepository->update($gesuchteinstitution);
					$this->redirect('edit','Institution',NULL, Array('institution' => $gesuchteinstitution));
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
     * @param \OliverBauer\Bfbn\Domain\Model\Person $person
     * @return void
     */
    public function deleteAction(\OliverBauer\Bfbn\Domain\Model\Person $person)
    {
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$this->addFlashMessage('Die Person wurde gelöscht');
					$this->PersonRepository->remove($person);
					$this->redirect('edit','Institution', NULL, Array('institution'=> $gesuchteinstitution));
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
