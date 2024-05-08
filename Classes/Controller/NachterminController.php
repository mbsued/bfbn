<?php
namespace MbFosbos\Bfbn\Controller;

use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;
use MbFosbos\Bfbn\Factory\AbfrageDemandFactory;
use MbFosbos\Bfbn\Domain\Repository\InstitutionRepository;
use MbFosbos\Bfbn\Domain\Repository\NachterminRepository;
use MbFosbos\Bfbn\Domain\Repository\StatusnachterminRepository;
use MbFosbos\Bfbn\Domain\Repository\GeschlechtRepository;
use MbFosbos\Bfbn\Domain\Repository\JahrgangsstufeRepository;
use MbFosbos\Bfbn\Domain\Repository\AusbildungsrichtungRepository;
use MbFosbos\Bfbn\Domain\Repository\SpracheRepository;
use MbFosbos\Bfbn\Domain\Repository\FrontendUserRepository;
use MbFosbos\Bfbn\Domain\Repository\DatenbankRepository;
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
 * NachterminController
 */
class NachterminController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
	/**
     * PersistenceManager
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager 	 
     */	
	private $PersistenceManager = null;
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
     * NachterminRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\NachterminRepository
     */
    private $NachterminRepository = null;

    /**
     * StatusnachterminRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\StatusnachterminRepository
     */
    private $StatusnachterminRepository = null;
	
    /**
     * GeschlechtRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\GeschlechtRepository
     */    
	private $GeschlechtRepository = null;

	/**
     * JahrgangsstufeRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\JahrgangsstufeRepository
     */
    private $JahrgangsstufeRepository = null;	

	/**
     * AusbildungsrichtungRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\AusbildungsrichtungRepository
     */
    private $AusbildungsrichtungRepository = null;

	/**
     * SpracheRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\SpracheRepository
     */
    private $SpracheRepository = null;

    /**
     * DatenbankRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\DatenbankRepository 	 
     */
	 
    private $DatenbankRepository = null;

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
     * Inject the Persistence Manager
     *
     * @param \TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager $PersistenceManager
     */
    public function injectPersistenceMananger(PersistenceManager $PersistenceManager)
    {
        $this->PersistenceManager = $PersistenceManager;
    }

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
     * Inject the Nachtermin repository
     *
     * @param \MbFosbos\Bfbn\Domain\Repository\NachterminRepository $NachterminRepository
     */
    public function injectNachterminRepository(NachterminRepository $NachterminRepository)
    {
        $this->NachterminRepository = $NachterminRepository;
    }	

    /**
     * Inject the Stausnachtermin repository
     *
     * @param \MbFosbos\Bfbn\Domain\Repository\StatusnachterminRepository $StatusnachterminRepository
     */
    public function injectStatusnachterminRepository(StatusnachterminRepository $StatusnachterminRepository)
    {
        $this->StatusnachterminRepository = $StatusnachterminRepository;
    }	

    /**
     * Inject the Geschlecht repository
     *
     * @param \MbFosbos\Bfbn\Domain\Repository\GeschlechtRepository $GeschlechtRepository
     */
    public function injectGeschlechtRepository(GeschlechtRepository $GeschlechtRepository)
    {
        $this->GeschlechtRepository = $GeschlechtRepository;
    }

    /**
     * Inject the Jahrgangsstufe repository
     *
     * @param \MbFosbos\Bfbn\Domain\Repository\JahrgangsstufeRepository $JahrgangsstufeRepository
     */
    public function injectJahrgangsstufeRepository(JahrgangsstufeRepository $JahrgangsstufeRepository)
    {
        $this->JahrgangsstufeRepository = $JahrgangsstufeRepository;
    }	

    /**
     * Inject the Ausbildungsrichtung repository
     *
     * @param \MbFosbos\Bfbn\Domain\Repository\AusbildungsrichtungRepository $AusbildungsrichtungRepository
     */
    public function injectAusbildungsrichtungRepository(AusbildungsrichtungRepository $AusbildungsrichtungRepository)
    {
        $this->AusbildungsrichtungRepository = $AusbildungsrichtungRepository;
    }	

    /**
     * Inject the Sprache repository
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
     * Inject the Datenbank repository
     *
     * @param \MbFosbos\Bfbn\Domain\Repository\DatenbankRepository $DatenbankRepository
     */
    public function injectDatenbankRepository(DatenbankRepository $DatenbankRepository)
    {
        $this->DatenbankRepository = $DatenbankRepository;
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
     * @param \MbFosbos\Bfbn\Domain\Model\Nachtermin $nachtermin
     * @return void
     */
    public function showAction(\MbFosbos\Bfbn\Domain\Model\Nachtermin $nachtermin): ResponseInterface
    {
        $this->view->assign('Nachtermin', $nachtermin);
		return $this->htmlResponse($this->view->render());
    }
	
	/**
     * action list
     * 
     * @return void
     */
    public function listAction(\MbFosbos\Bfbn\Domain\Model\Nachtermin $nachtermin=null): ResponseInterface
	{
        if (is_null($nachtermin)) {
			if ($this->AccessControlService->hasLoggedInFrontendUser()) {
				$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
				$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
				if (!is_null($gesuchteinstitution)) {					
					if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {

						$demand = $this->AbfrageDemandFactory->createDemandObject($gesuchteinstitution);
						$nachtermine = $this->NachterminRepository->findDemanded($demand);
						$statusnachtermin = $this->StatusnachterminRepository->findDemanded($demand);
						/** print \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump( $statusnachtermin); */
						$whichTermin = $this->settings['termin'];
						$this->view->assign('termin', $whichtermin ?? 0);						
						$this->view->assign('nachtermine', $nachtermine);
						$this->view->assign('statusnachtermin', $statusnachtermin);
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
     * action statusfehlanzeige
     * 
     * @return void
     */
    public function statusfehlanzeigeAction(\MbFosbos\Bfbn\Domain\Model\Nachtermin $nachtermin=null): ResponseInterface
	{
        if (is_null($nachtermin)) {
			if ($this->AccessControlService->hasLoggedInFrontendUser()) {
				$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
				$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
				if (!is_null($gesuchteinstitution)) {					
					if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {

						$rows = $this->DatenbankRepository->updateStatusNachtermin($gesuchteinstitution->getUid(),true,false);

						return $this->redirect('list','Nachtermin', NULL);
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

	
    public function editAction(\MbFosbos\Bfbn\Domain\Model\Nachtermin $nachtermin): ResponseInterface	
	{
		
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$auswahlgeschlecht = $this->GeschlechtRepository->findAll();
					$auswahljahrgangsstufe = $this->JahrgangsstufeRepository->findNachtermin();
					$auswahlausbildungsrichtung = $this->AusbildungsrichtungRepository->findAll();
					$auswahlsprache = $this->SpracheRepository->findAll();
					$this->view->assign('nachtermin', $nachtermin);
					$this->view->assign('institution', $gesuchteinstitution);
					$this->view->assign('auswahlgeschlecht', $auswahlgeschlecht);
					$this->view->assign('auswahljahrgangsstufe', $auswahljahrgangsstufe);
					$this->view->assign('auswahlausbildungsrichtung', $auswahlausbildungsrichtung);
					$this->view->assign('auswahlsprache', $auswahlsprache);
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
     * @param \MbFosbos\Bfbn\Domain\Model\Nachtermin $nachtermin
 	 * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation $nachtermin
	 *	
     * @return string
     */
    public function newAction(\MbFosbos\Bfbn\Domain\Model\Nachtermin $nachtermin = NULL): ResponseInterface
    {
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$auswahlgeschlecht = $this->GeschlechtRepository->findAll();				
					$auswahljahrgangsstufe = $this->JahrgangsstufeRepository->findNachtermin();
					$auswahlausbildungsrichtung = $this->AusbildungsrichtungRepository->findAll();
					$auswahlsprache = $this->SpracheRepository->findAll();
					$this->view->assign('nachtermin', $nachtermin ?? NULL);
					$this->view->assign('institution', $gesuchteinstitution);
					$this->view->assign('auswahlgeschlecht', $auswahlgeschlecht);
					$this->view->assign('auswahljahrgangsstufe', $auswahljahrgangsstufe);
					$this->view->assign('auswahlausbildungsrichtung', $auswahlausbildungsrichtung);
					$this->view->assign('auswahlsprache', $auswahlsprache);
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
     * @param \MbFosbos\Bfbn\Domain\Model\Nachtermin $nachtermin
	 * 
     * @return void
     */
    public function createAction(\MbFosbos\Bfbn\Domain\Model\Nachtermin $nachtermin): ResponseInterface
    {
		
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());			
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());			
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$rows = $this->DatenbankRepository->updateStatusNachtermin($gesuchteinstitution->getUid(),false,true);					
					$this->addFlashMessage('Die Person wurde erfolgreich angelegt'); 					 						
					$this->NachterminRepository->add($nachtermin);
					return $this->redirect('list','Nachtermin',NULL);
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
     * @param \MbFosbos\Bfbn\Domain\Model\Nachtermin $nachtermin
     * @return void
     */
    public function updateAction(\MbFosbos\Bfbn\Domain\Model\Nachtermin $nachtermin): ResponseInterface
    {
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$rows = $this->DatenbankRepository->updateStatusNachtermin($gesuchteinstitution->getUid(),false,true);
					$this->NachterminRepository->update($nachtermin);
					return $this->redirect('list','Nachtermin', NULL);
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
     * @param \MbFosbos\Bfbn\Domain\Model\Nachtermin $nachtermin
     * @return void
     */
    public function deleteAction(\MbFosbos\Bfbn\Domain\Model\Nachtermin $nachtermin): ResponseInterface
    {
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$this->addFlashMessage('Die Person wurde gelöscht');
					$this->NachterminRepository->remove($nachtermin);
					$this->PersistenceManager->persistAll();
					
					$count = $this->DatenbankRepository->countNachtermin($gesuchteinstitution->getUid());
					
					if ($count > 0) {
						$rows = $this->DatenbankRepository->updateStatusNachtermin($gesuchteinstitution->getUid(),false,true);
					} else {
						$rows = $this->DatenbankRepository->updateStatusNachtermin($gesuchteinstitution->getUid(),false,false);
					}
					return $this->redirect('list','Nachtermin', NULL);

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
	
	public function initializeCreateAction() {
        if ($this->arguments->hasArgument('nachtermin')) {
            $this->arguments->getArgument('nachtermin')->getPropertyMappingConfiguration()->forProperty('geburtsdatum')->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter',\TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT,'Y-m-d');
			$postData = $this->request->getArgument('nachtermin') ;
			/** print \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($postData); */
			if (isset($postData['nachtermin'])) {
				if(is_null($postData['nachtermin']['sprache'])) {
					$this->arguments->getArgument('nachtermin')->getPropertyMappingConfiguration()->skipProperties('sprache');
				}
			}        
		}		
    }

	public function initializeUpdateAction() {
        if ($this->arguments->hasArgument('nachtermin')) {
            $this->arguments->getArgument('nachtermin')->getPropertyMappingConfiguration()->forProperty('geburtsdatum')->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter',\TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT,'Y-m-d');
        }	
    }
}
