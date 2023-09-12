<?php
namespace OliverBauer\Bfbn\Controller;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3\CMS\Extbase\Http\ForwardResponse;
use OliverBauer\Bfbn\Utility\Page;
use OliverBauer\Bfbn\Domain\Repository\InstitutionRepository;
use OliverBauer\Bfbn\Domain\Repository\PersonRepository;
use OliverBauer\Bfbn\Domain\Repository\GeschlechtRepository;
use OliverBauer\Bfbn\Domain\Repository\FunktionRepository;
use OliverBauer\Bfbn\Domain\Repository\FrontendUserRepository;
use OliverBauer\Bfbn\Service\AccessControlService;
use OliverBauer\Bfbn\Service\CsvService;
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
     * Inject the csv service
     *
     * @param \OliverBauer\Bfbn\Service\CsvService $CsvService
     */
    public function injectCsvService(CsvService $CsvService)
    {
        $this->CsvService = $CsvService;
    }
	
    /**
     * action show
     * 
     * @param \OliverBauer\Bfbn\Domain\Model\Person $Person
     * @return void
     */
    public function showAction(\OliverBauer\Bfbn\Domain\Model\Person $Person): ResponseInterface
    {
        $this->view->assign('Person', $Person);
    }

	/**
     * action list
     * 
     * @return void
     */
    public function listAction(\OliverBauer\Bfbn\Domain\Model\Person $person=null): ResponseInterface
	{
        if (is_null($person)) {
			if ($this->AccessControlService->hasLoggedInFrontendUser()) {
				$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
				$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
				if (!is_null($gesuchteinstitution)) {					
					if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {												
						$demand = $this -> createDemandObject($gesuchteinstitution,$this->settings);
						$personen = $this->PersonRepository->findDemanded($demand);
						$this->view->assign('personen', $personen);
						$this->view->assign('institution',$gesuchteinstitution);
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
	 * @param int $funktionuid	 
     * @param \OliverBauer\Bfbn\Domain\Model\Person $person
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation $person
     * @return void
     */
    public function editAction($funktionuid,\OliverBauer\Bfbn\Domain\Model\Person $person): ResponseInterface	
	{
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$auswahlgeschlecht = $this->GeschlechtRepository->findAll();
					$funktion = $this->FunktionRepository->findByUid($funktionuid);
					$this->view->assign('person', $person);
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
		return $this->htmlResponse();
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
    public function newAction($funktionuid,\OliverBauer\Bfbn\Domain\Model\Person $person = NULL): ResponseInterface
    {
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$auswahlgeschlecht = $this->GeschlechtRepository->findAll();
					$funktion = $this->FunktionRepository->findByUid($funktionuid);
					$this->view->assign('person', $Person ?? NULL);
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
		return $this->htmlResponse();   
    }
	
    /**
     * action newft
	 *
	 * @param int $funktionuid		 
     * @param \OliverBauer\Bfbn\Domain\Model\Person $person
 	 * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation $person
	 *	
     * @return string
     */
    public function newftAction($funktionuid,\OliverBauer\Bfbn\Domain\Model\Person $person = NULL): ResponseInterface
    {
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$auswahlgeschlecht = $this->GeschlechtRepository->findAll();
					$funktion = $this->FunktionRepository->findByUid($funktionuid);
					$this->view->assign('person', $Person ?? NULL);
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
		return $this->htmlResponse();       
    }
    /**
     * action create
     * 
     * @param \OliverBauer\Bfbn\Domain\Model\Person $person
	 * @param \OliverBauer\Bfbn\Domain\Model\Funktion $funktion
     * @return void
     */
    public function createAction(\OliverBauer\Bfbn\Domain\Model\Person $person, \OliverBauer\Bfbn\Domain\Model\Funktion $funktion): ResponseInterface
    {
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$person->addInstitutionen($gesuchteinstitution);
					$person->addFunktionen($funktion);					
					$this->PersonRepository->add($person);
					$this->InstitutionRepository->update($gesuchteinstitution);
					$this->addFlashMessage('Die Person wurde erfolgreich angelegt'); 					
					return $this->redirect('edit','Institution',NULL, Array('institution' => $gesuchteinstitution)); 
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
     * action createft
     * 
     * @param \OliverBauer\Bfbn\Domain\Model\Person $person
	 * @param \OliverBauer\Bfbn\Domain\Model\Funktion $funktion
     * @return void
     */
    public function createftAction(\OliverBauer\Bfbn\Domain\Model\Person $person, \OliverBauer\Bfbn\Domain\Model\Funktion $funktion): ResponseInterface
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
					return $this->redirect('list'); 
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
     * @param \OliverBauer\Bfbn\Domain\Model\Person $person
     * @return void
     */
    public function deleteAction(\OliverBauer\Bfbn\Domain\Model\Person $person): ResponseInterface
    {
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$this->addFlashMessage('Die Person wurde gelöscht');
					$this->PersonRepository->remove($person);					
					return $this->redirect('edit','Institution', NULL, Array('institution'=> $gesuchteinstitution)); 
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
     * action deleteft
     * 
     * @param \OliverBauer\Bfbn\Domain\Model\Person $person
     * @return void
     */
    public function deleteftAction(\OliverBauer\Bfbn\Domain\Model\Person $person): ResponseInterface
    {
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$this->addFlashMessage('Die Person wurde gelöscht');
					$this->PersonRepository->remove($person);					
					return $this->redirect('list'); 
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
     * @param \OliverBauer\Bfbn\Domain\Model\Person $person
     * @return void
     */
    public function updateAction(\OliverBauer\Bfbn\Domain\Model\Person $person): ResponseInterface
    {
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$this->PersonRepository->update($person);					
					return $this->redirect('list'); 
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
     * action searchform
     * @return void
     */
	
	public function searchformAction(): ResponseInterface
    {
		$whichArt = $this->settings['art'];
		$this->view->assign('art', $whichArt);
		if ($whichArt == 1) {
			$demand = $this -> createDemandObjectForInstitution($this->settings);
			$auswahlinstitution = $this->InstitutionRepository->findDemanded($demand);		
			$this->view->assign('auswahlinstitution', $auswahlinstitution);	
		}
		if ($whichArt == 2) {
			$demand = $this -> createDemandObjectForFunktionen($this->settings);
			$auswahlfunktionen = $this->FunktionRepository->findDemanded($demand);		
			$this->view->assign('auswahlfunktionen', $auswahlfunktionen);
		}
		if ($whichArt == 3) {
			$demand = $this -> createDemandObjectForInstitution($this->settings);
			$auswahlinstitution = $this->InstitutionRepository->findDemanded($demand);		
			$this->view->assign('auswahlinstitution', $auswahlinstitution);			
			$demand = $this -> createDemandObjectForFunktionen($this->settings);
			$auswahlfunktionen = $this->FunktionRepository->findDemanded($demand);		
			$this->view->assign('auswahlfunktionen', $auswahlfunktionen);
		}		
		return $this->htmlResponse($this->view->render());
    }
	
	/**
     * action search
	 * 
     * @return void
     */
	
	public function searchAction(\OliverBauer\Bfbn\Domain\Model\PersonDemand $suche): ResponseInterface
    {
		$whichart = $this->settings['art'];
		$demand = $this -> createDemandObjectFromSearch($suche,$this->settings);
		$personen = $this->PersonRepository->findDemanded($demand);		
		$this->view->assign('personen', $personen);
		if ($whichart == 1) {
			$this->view->assign('institution', $suche->getInstitution());	
		}		
		if ($whichart == 2) {
			$funktionen = $suche->getFunktionen();
			foreach ($funktionen as $funktion)
			{
				$gesuchtefunktion = $this->FunktionRepository->findByUid($funktion);
				$gesuchtefunktionen[] = $gesuchtefunktion;
			}		
			$this->view->assign('gesuchtefunktionen', $gesuchtefunktionen);	
		}
		if ($whichart == 3) {
			$this->view->assign('institution', $suche->getInstitution());			
			$funktionen = $suche->getFunktionen();
			foreach ($funktionen as $funktion)
			{
				$gesuchtefunktion = $this->FunktionRepository->findByUid($funktion);
				$gesuchtefunktionen[] = $gesuchtefunktion;
			}		
			$this->view->assign('gesuchtefunktionen', $gesuchtefunktionen);	
		}		
		$this->view->assign('art',$whichart);
		$this->view->assign('suche',$suche);
		$this->view->assign('settings',$this->settings);		 	

		return $this->htmlResponse($this->view->render());
    }
 
 /**
     * action export
     * 
	 * @param array $personen
	 * @param array $settings
     * @return void
     */
    public function exportAction(array $personen, array $settings): ResponseInterface	
	{

		if (!is_null($personen)) {
			$fieldsstack[] = 'Titel';
			$fieldsstack[] = 'Vorname';
			$fieldsstack[] = 'Nachname';
			$fieldsstack[] = 'Geschlecht';
			$fieldsstack[] = 'Funktion';
			$fieldsstack[] = 'Schule';
			$fieldsstack[] = 'bestellt ab';
			$fieldsstack[] = 'letzte Änderung';			
			$recordsstack[] = $fieldsstack;			
			foreach ($personen as $person)
			{
				$personzubearbeiten = $this->PersonRepository->findByUid($person);
				$personfunktionen = $personzubearbeiten->getFunktionen();
				foreach ($personfunktionen as $personfunktion)
				{
					$funktion = $personfunktion->getBezeichnung();
				}
				$personinstitutionen = $personzubearbeiten->getInstitutionen();
				foreach ($personinstitutionen as $personinstitution)
				{
					$institution = $personinstitution->getKurzbezeichnung();
				}
				$fieldsstack=[];
				$fieldsstack[] = $personzubearbeiten->getTitel();
				$fieldsstack[] = $personzubearbeiten->getVorname();
				$fieldsstack[] = $personzubearbeiten->getNachname();
				$fieldsstack[] = $personzubearbeiten->getGeschlecht()->getBezeichnung();
				$fieldsstack[] = $funktion;
				$fieldsstack[] = $institution;
				if (!is_null($personzubearbeiten->getBestelltab())) {
					$fieldsstack[] = $personzubearbeiten->getBestelltab()->format("d.m.Y");
				} else
				{
					$fieldsstack[] = '';
				}
				$fieldsstack[] = $personzubearbeiten->getTstamp()->format("d.m.Y");				
				$recordsstack[] = $fieldsstack; 				
			}
 
			$this->CsvService->setData($recordsstack);
		
			$this->CsvService->saveToOutput('export_funktionstraeger');			
		}

		return (new ForwardResponse('searchform'))
			->withControllerName(('Person'))
			->withExtensionName('bfbn'); 
	}

	public function initializeCreateftAction() {
        if ($this->arguments->hasArgument('person')) {
            $this->arguments->getArgument('person')->getPropertyMappingConfiguration()->forProperty('bestelltab')->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter',\TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT,'Y-m-d');
        }	
    }

	public function initializeUpdateAction() {
        if ($this->arguments->hasArgument('person')) {
            $this->arguments->getArgument('person')->getPropertyMappingConfiguration()->forProperty('bestelltab')->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter',\TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT,'Y-m-d');
        }	
    }
	
	protected function createDemandObject($institution,$settings) {

        $demand = $this->objectManager->get('OliverBauer\\Bfbn\\Domain\\Model\\PersonDemand'); // Neuer Inhalt ist der Dateiname vom Domain Modell -> Classes -> Domain -> Model 
        $demand->setCategories(GeneralUtility::trimExplode(',', $settings['categories'], true));
		$demand->setStartingpoint(Page::extendPidListByChildren(
            (string)($settings['startingpoint'] ?? ''),
            (int)($settings['recursive'] ?? 0)
        ));
		$demand->setFunktionen(GeneralUtility::trimExplode(',', $settings['funktionen'], true));
		$demand->setInstitution($institution);
		 		
        return $demand;
    }

	protected function createDemandObjectFromSearch($suche,$settings) {

        $demand = $this->objectManager->get('OliverBauer\\Bfbn\\Domain\\Model\\PersonDemand'); // Neuer Inhalt ist der Dateiname vom Domain Modell -> Classes -> Domain -> Model 
        $demand->setCategories(GeneralUtility::trimExplode(',', $settings['categories'], true));
		$demand->setStartingpoint(Page::extendPidListByChildren(
            (string)($settings['startingpoint'] ?? ''),
            (int)($settings['recursive'] ?? 0)
        ));
        if ($settings['art']==1) {
			$demand->setInstitution($suche->getInstitution());
		}
        if ($settings['art']==2) {
			$funktionen = $suche->getFunktionen();
			if (!is_array($funktionen)) {
				$funktionen = \TYPO3\CMS\Core\Utility\GeneralUtility::intExplode(',', $funktionen, TRUE);
			}						
			$demand->setFunktionen($funktionen);
		}
        if ($settings['art']==3) {
			$demand->setInstitution($suche->getInstitution());			
			$funktionen = $suche->getFunktionen();
			if (!is_array($funktionen)) {
				$funktionen = \TYPO3\CMS\Core\Utility\GeneralUtility::intExplode(',', $funktionen, TRUE);
			}						
			$demand->setFunktionen($funktionen);
		}		 		
        return $demand;
    }
	
	protected function createDemandObjectForInstitution($settings) {
        $demand = $this->objectManager->get('OliverBauer\\Bfbn\\Domain\\Model\\InstitutionDemand'); // Neuer Inhalt ist der Dateiname vom Domain Modell -> Classes -> Domain -> Model
		$demand->setStartingpoint(Page::extendPidListByChildren(
			(string)($settings['schulen'] ?? ''),
            (int)($settings['recursive'] ?? 0)
        ));		
		$demand->setBezirk(GeneralUtility::trimExplode(',', $settings['bezirke'], true));
		/** print \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($demand); */	
        return $demand;
    }
	
	protected function createDemandObjectForFunktionen($settings) {
        $demand = $this->objectManager->get('OliverBauer\\Bfbn\\Domain\\Model\\FunktionDemand'); // Neuer Inhalt ist der Dateiname vom Domain Modell -> Classes -> Domain -> Model
        $demand->setArt($settings['funktionart']);
		/** print \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($demand); */	
        return $demand;
    }	
	
}
