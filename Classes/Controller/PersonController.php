<?php
namespace MbFosbos\Bfbn\Controller;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3\CMS\Extbase\Http\ForwardResponse;
use MbFosbos\Bfbn\Factory\PersonDemandFactory;
use MbFosbos\Bfbn\Domain\Repository\InstitutionRepository;
use MbFosbos\Bfbn\Domain\Repository\PersonRepository;
use MbFosbos\Bfbn\Domain\Repository\GeschlechtRepository;
use MbFosbos\Bfbn\Domain\Repository\FunktionRepository;
use MbFosbos\Bfbn\Domain\Repository\FrontendUserRepository;
use MbFosbos\Bfbn\Service\AccessControlService;
use MbFosbos\Bfbn\Service\CsvService;
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
 * PersonController
 */
class PersonController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
	/**
     * PersonDemandFactory
     * 
     * @var \MbFosbos\Bfbn\Factory\PersonDemandFactory 	 
     */
    private $PersonDemandFactory = null;

    /**
     * InstitutionRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\InstitutionRepository
     */
    protected $InstitutionRepository = null;
	
    /**
     * PersonRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\PersonRepository
     */
    protected $PersonRepository = null;

	/**
     * UserRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\FrontendUserRepository
     */
    protected $FrontendUserRepository = null;
	
    /**
     * GeschlechtRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\GeschlechtRepository
     */
    
	protected $GeschlechtRepository = null;
	
	/**
     * FunktionRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\FunktionRepository
     */
    protected $FunktionRepository = null;	
	
	
	/**
	 * @var \MbFosbos\Bfbn\Service\AccessControlService
	 */
	protected $AccessControlService;

    /**
     * Inject the Person Demand Factory
     *
     * @param \MbFosbos\Bfbn\Factory\PersonDemandFactory $PersonDemandFactory
     */
    public function injectPersonDemandFactory(PersonDemandFactory $PersonDemandFactory)
    {
        $this->PersonDemandFactory = $PersonDemandFactory;
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
     * Inject the person repository
     *
     * @param \MbFosbos\Bfbn\Domain\Repository\PersonRepository $PersonRepository
     */
    public function injectPersonRepository(PersonRepository $PersonRepository)
    {
        $this->PersonRepository = $PersonRepository;
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
     * Inject the funktion repository
     *
     * @param \MbFosbos\Bfbn\Domain\Repository\FunktionRepository $FunktionRepository
     */
    public function injectFunktionRepository(FunktionRepository $FunktionRepository)
    {
        $this->FunktionRepository = $FunktionRepository;
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
     * Inject the csv service
     *
     * @param \MbFosbos\Bfbn\Service\CsvService $CsvService
     */
    public function injectCsvService(CsvService $CsvService)
    {
        $this->CsvService = $CsvService;
    }
	
    /**
     * action show
     * 
     * @param \MbFosbos\Bfbn\Domain\Model\Person $Person
     * @return void
     */
    public function showAction(\MbFosbos\Bfbn\Domain\Model\Person $Person): ResponseInterface
    {
        $this->view->assign('Person', $Person);
    }

	/**
     * action list
     * 
     * @return void
     */
    public function listAction(\MbFosbos\Bfbn\Domain\Model\Person $person=null): ResponseInterface
	{
        if (is_null($person)) {
			if ($this->AccessControlService->hasLoggedInFrontendUser()) {
				$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
				$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
				if (!is_null($gesuchteinstitution)) {					
					if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {												
						$demand = $this->PersonDemandFactory->createDemandObject($gesuchteinstitution,$this->settings);
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
     * @param \MbFosbos\Bfbn\Domain\Model\Person $person
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation $person
     * @return void
     */
    public function editAction($funktionuid,\MbFosbos\Bfbn\Domain\Model\Person $person): ResponseInterface	
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
     * @param \MbFosbos\Bfbn\Domain\Model\Person $person
 	 * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation $person
	 *	
     * @return string
     */
    public function newAction($funktionuid,\MbFosbos\Bfbn\Domain\Model\Person $person = NULL): ResponseInterface
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
     * @param \MbFosbos\Bfbn\Domain\Model\Person $person
 	 * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation $person
	 *	
     * @return string
     */
    public function newftAction($funktionuid,\MbFosbos\Bfbn\Domain\Model\Person $person = NULL): ResponseInterface
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
     * @param \MbFosbos\Bfbn\Domain\Model\Person $person
	 * @param \MbFosbos\Bfbn\Domain\Model\Funktion $funktion
     * @return void
     */
    public function createAction(\MbFosbos\Bfbn\Domain\Model\Person $person, \MbFosbos\Bfbn\Domain\Model\Funktion $funktion): ResponseInterface
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
     * @param \MbFosbos\Bfbn\Domain\Model\Person $person
	 * @param \MbFosbos\Bfbn\Domain\Model\Funktion $funktion
     * @return void
     */
    public function createftAction(\MbFosbos\Bfbn\Domain\Model\Person $person, \MbFosbos\Bfbn\Domain\Model\Funktion $funktion): ResponseInterface
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
     * @param \MbFosbos\Bfbn\Domain\Model\Person $person
     * @return void
     */
    public function deleteAction(\MbFosbos\Bfbn\Domain\Model\Person $person): ResponseInterface
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
     * @param \MbFosbos\Bfbn\Domain\Model\Person $person
     * @return void
     */
    public function deleteftAction(\MbFosbos\Bfbn\Domain\Model\Person $person): ResponseInterface
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
     * @param \MbFosbos\Bfbn\Domain\Model\Person $person
     * @return void
     */
    public function updateAction(\MbFosbos\Bfbn\Domain\Model\Person $person): ResponseInterface
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
			$demand = $this->PersonDemandFactory->createDemandObjectForInstitution($this->settings);
			$auswahlinstitution = $this->InstitutionRepository->findDemanded($demand);		
			$this->view->assign('auswahlinstitution', $auswahlinstitution);	
		}
		if ($whichArt == 2) {
			$demand = $this->PersonDemandFactory->createDemandObjectForFunktionen($this->settings);
			$auswahlfunktionen = $this->FunktionRepository->findDemanded($demand);		
			$this->view->assign('auswahlfunktionen', $auswahlfunktionen);
		}
		if ($whichArt == 3) {
			$demand = $this->PersonDemandFactory->createDemandObjectForInstitution($this->settings);
			$auswahlinstitution = $this->InstitutionRepository->findDemanded($demand);		
			$this->view->assign('auswahlinstitution', $auswahlinstitution);			
			$demand = $this->PersonDemandFactory->createDemandObjectForFunktionen($this->settings);
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
	
	public function searchAction(\MbFosbos\Bfbn\DataTransferObject\PersonDemand $suche): ResponseInterface
    {

		$whichart = $this->settings['art'];
		$demand = $this->PersonDemandFactory->createDemandObjectFromSearch($suche,$this->settings);
		$personen = $this->PersonRepository->findDemanded($demand);		
		$this->view->assign('personen', $personen);
		if ($whichart == 1) {
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($suche->getInstitution());
			$this->view->assign('institution', $gesuchteinstitution);	
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
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($suche->getInstitution());
			$this->view->assign('institution', $gesuchteinstitution);			
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
	 * @param int $institution	
	 * @param array $funktionen
     * @return void
     */
    public function exportAction(int $institution = NULL, array $funktionen = NULL): ResponseInterface	
	{
		$demand = $this->PersonDemandFactory->createDemandObjectForExport($institution,$funktionen,$this->settings);
		$personen = $this->PersonRepository->findDemanded($demand);
		if (!is_null($personen)) {
			$fieldsstack[] = 'Titel';
			$fieldsstack[] = 'Vorname';
			$fieldsstack[] = 'Nachname';
			$fieldsstack[] = 'Geschlecht';
			$fieldsstack[] = 'Funktion';
			$fieldsstack[] = 'Schule';
			$fieldsstack[] = 'Schulnummer';			
			$fieldsstack[] = 'bestellt ab';
			$fieldsstack[] = 'letzte Änderung';			
			$recordsstack[] = $fieldsstack;			
			foreach ($personen as $person)
			{

				$personfunktionen = $person->getFunktionen();
				foreach ($personfunktionen as $personfunktion)
				{
					$funktion = $personfunktion->getBezeichnung();
				}
				$personinstitutionen = $person->getInstitutionen();
				foreach ($personinstitutionen as $personinstitution)
				{
					$institution = $personinstitution->getKurzbezeichnung();
					$nummer = $personinstitution->getNummer();
				}
				$fieldsstack=[];
				$fieldsstack[] = $person->getTitel();
				$fieldsstack[] = $person->getVorname();
				$fieldsstack[] = $person->getNachname();
				$fieldsstack[] = $person->getGeschlecht()->getBezeichnung();
				$fieldsstack[] = $funktion;
				$fieldsstack[] = $institution;
				$fieldsstack[] = $nummer;
				if (!is_null($person->getBestelltab())) {
					$fieldsstack[] = $person->getBestelltab()->format("d.m.Y");
				} else
				{
					$fieldsstack[] = '';
				}
				$fieldsstack[] = $person->getTstamp()->format("d.m.Y");				
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
}
