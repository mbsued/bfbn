<?php
namespace OliverBauer\Bfbn\Controller;

use OliverBauer\Bfbn\Domain\Repository\InstitutionRepository;
use OliverBauer\Bfbn\Domain\Repository\NeubestellungRepository;
use OliverBauer\Bfbn\Domain\Repository\GeschlechtRepository;
use OliverBauer\Bfbn\Domain\Repository\NeubestellungartRepository;
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
 * NeubestellungController
 */
class NeubestellungController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * InstitutionRepository
     * 
     * @var \OliverBauer\Bfbn\Domain\Repository\InstitutionRepository
     */
    private $InstitutionRepository = null;
	
    /**
     * NeubestellungRepository
     * 
     * @var \OliverBauer\Bfbn\Domain\Repository\NeubestellungRepository
     */
    private $NeubestellungRepository = null;
	
    /**
     * GeschlechtRepository
     * 
     * @var \OliverBauer\Bfbn\Domain\Repository\GeschlechtRepository
     */    
	private $GeschlechtRepository = null;

	/**
     * NeubestellungartRepository
     * 
     * @var \OliverBauer\Bfbn\Domain\Repository\NeubestellungartRepository
     */
    private $NeubestellungartRepository = null;	

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
     * Inject the Neubestellung repository
     *
     * @param \OliverBauer\Bfbn\Domain\Repository\NeubestellungRepository $NeubestellungRepository
     */
    public function injectNeubestellungRepository(NeubestellungRepository $NeubestellungRepository)
    {
        $this->NeubestellungRepository = $NeubestellungRepository;
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
     * Inject the neubestellungart repository
     *
     * @param \OliverBauer\Bfbn\Domain\Repository\NeubestellungartRepository $NeubestellungartRepository
     */
    public function injectNeubestellungartRepository(NeubestellungartRepository $NeubestellungartRepository)
    {
        $this->NeubestellungartRepository = $NeubestellungartRepository;
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
     * @param \OliverBauer\Bfbn\Domain\Model\Neubestellung $neubestellung
     * @return void
     */
    public function showAction(\OliverBauer\Bfbn\Domain\Model\Neubestellung $neubestellung)
    {
        $this->view->assign('Neubestellung', $neubestellung);
    }
	
	/**
     * action list
     * 
     * @return void
     */
    public function listAction(\OliverBauer\Bfbn\Domain\Model\Neubestellung $neubestellung=null)
	{
        if (is_null($neubestellung)) {
			if ($this->AccessControlService->hasLoggedInFrontendUser()) {
				$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
				$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
				if (!is_null($gesuchteinstitution)) {					
					if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
						$demand = $this -> createDemandObject($gesuchteinstitution);
						$neubestellungen = $this->NeubestellungRepository->findDemanded($demand);
						$whichTermin = $this->settings['termin'];
						$this->view->assign('termin', $whichtermin ?? 0);						
						$this->view->assign('neubestellungen', $neubestellungen);
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

    public function editAction(\OliverBauer\Bfbn\Domain\Model\Neubestellung $neubestellung)	
	{
		
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$auswahlgeschlecht = $this->GeschlechtRepository->findAll();
					$this->view->assign('neubestellung', $neubestellung);
					$this->view->assign('institution', $gesuchteinstitution);
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
	 * @param int $artuid		 
     * @param \OliverBauer\Bfbn\Domain\Model\Neubestellung $neubestellung
 	 * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation $neubestellung
	 *	
     * @return string
     */
    public function newAction($artuid,\OliverBauer\Bfbn\Domain\Model\Neubestellung $neubestellung = NULL)
    {
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$auswahlgeschlecht = $this->GeschlechtRepository->findAll();
					$art = $this->NeubestellungartRepository->findByUid($artuid);
					$this->view->assign('neubestellung', $neubestellung ?? NULL);
					$this->view->assign('institution', $gesuchteinstitution);
					$this->view->assign('art', $art);
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
     * @param \OliverBauer\Bfbn\Domain\Model\Neubestellung $neubestellung
	 * 
     * @return void
     */
    public function createAction(\OliverBauer\Bfbn\Domain\Model\Neubestellung $neubestellung)
    {
		
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());			
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());			
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$meldungerfolgreich='Die Person '.($neubestellung->getVorname ?? '').' '.($neubestellung->getNachname ?? '').' wurde erfolgreich angelegt';
					$this->addFlashMessage($meldungerfolgreich); 					 						
					$this->NeubestellungRepository->add($neubestellung);
					$this->redirect('list','Neubestellung',NULL);
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
     * @param \OliverBauer\Bfbn\Domain\Model\Neubestellung $neubestellung
     * @return void
     */
    public function updateAction(\OliverBauer\Bfbn\Domain\Model\Neubestellung $neubestellung)
    {
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$this->NeubestellungRepository->update($neubestellung);
					$this->redirect('list','Neubestellung', NULL);
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
     * @param \OliverBauer\Bfbn\Domain\Model\Neubestellung $neubestellung
     * @return void
     */
    public function deleteAction(\OliverBauer\Bfbn\Domain\Model\Neubestellung $neubestellung)
    {
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$this->addFlashMessage('Die Person wurde gelöscht');
					$this->NeubestellungRepository->remove($neubestellung);
					$this->redirect('list','Neubestellung', NULL);
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
	
	public function initializeCreateAction() {
        if ($this->arguments->hasArgument('neubestellung')) {
            $this->arguments->getArgument('neubestellung')->getPropertyMappingConfiguration()->forProperty('erwerb')->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter',\TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT,'Y-m-d');
            $this->arguments->getArgument('neubestellung')->getPropertyMappingConfiguration()->forProperty('aktualisierung')->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter',\TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT,'Y-m-d');
        }	
    }	
	
	public function initializeUpdateAction() {
        if ($this->arguments->hasArgument('neubestellung')) {
            $this->arguments->getArgument('neubestellung')->getPropertyMappingConfiguration()->forProperty('erwerb')->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter',\TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT,'Y-m-d');
            $this->arguments->getArgument('neubestellung')->getPropertyMappingConfiguration()->forProperty('aktualisierung')->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter',\TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT,'Y-m-d');
        }	
    }	
	
	protected function createDemandObject($institution) {

        $demand = $this->objectManager->get('OliverBauer\\Bfbn\\Domain\\Model\\AbfrageDemand'); // Neuer Inhalt ist der Dateiname vom Domain Modell -> Classes -> Domain -> Model
		$demand->setInstitution($institution);
		/** print \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($demand); 	*/	
        return $demand;
    }	
}	