<?php
namespace MbFosbos\Bfbn\Controller;

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
 
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;
use MbFosbos\Bfbn\Factory\InstitutionDemandFactory;
use MbFosbos\Bfbn\Factory\InstitutionAusbildungsrichtungDemandFactory;
use MbFosbos\Bfbn\Factory\InstitutionSpracheDemandFactory;
use MbFosbos\Bfbn\Domain\Repository\InstitutionRepository;
use MbFosbos\Bfbn\Domain\Repository\InstitutionAusbildungsrichtungRepository;
use MbFosbos\Bfbn\Domain\Repository\InstitutionSpracheRepository;
use MbFosbos\Bfbn\Domain\Repository\SpracheintwRepository;
use MbFosbos\Bfbn\Domain\Repository\GeschlechtRepository;
use MbFosbos\Bfbn\Domain\Repository\SchulartRepository;
use MbFosbos\Bfbn\Domain\Repository\JahrgangsstufeRepository;
use MbFosbos\Bfbn\Domain\Repository\AusbildungsrichtungRepository;
use MbFosbos\Bfbn\Domain\Repository\RegierungsbezirkRepository;
use MbFosbos\Bfbn\Domain\Repository\SpracheRepository;
use MbFosbos\Bfbn\Domain\Repository\InstitutionstatusRepository;
use MbFosbos\Bfbn\Domain\Repository\VorkursartRepository;
use MbFosbos\Bfbn\Domain\Repository\VorkurstagRepository;
use MbFosbos\Bfbn\Service\AccessControlService;
use MbFosbos\Bfbn\Service\GeocodeService;
use MbFosbos\Bfbn\Domain\Repository\FrontendUserRepository;
use MbFosbos\Bfbn\Domain\Repository\DatenbankRepository;
use Psr\Http\Message\ResponseInterface;
 
/**
 * InstitutionController
 */
class InstitutionController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
	/**
     * PersistenceManager
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager 	 
     */	
	private $PersistenceManager = null;
	/**
     * InstitutionDemandFactory
     * 
     * @var \MbFosbos\Bfbn\Factory\InstitutionDemandFactory 	 
     */
    private $InstitutionDemandFactory = null;

	/**
     * InstitutionAusbildungsrichtungDemandFactory
     * 
     * @var \MbFosbos\Bfbn\Factory\InstitutionAusbildungsrichtungDemandFactory 	 
     */
    private $InstitutionAusbildungsrichtungDemandFactory = null;

	/**
     * InstitutionSpracheDemandFactory
     * 
     * @var \MbFosbos\Bfbn\Factory\InstitutionSpracheDemandFactory 	 
     */
    private $InstitutionSpracheDemandFactory = null;
			
	/**
     * InstitutionRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\InstitutionRepository 	 
     */
    private $InstitutionRepository = null;
	
    /**
     * InstitutionausbildungsrichtungRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\InstitutionAusbildungsrichtungRepository
     */
    private $InstitutionausbildungsrichtungRepository = null;

    /**
     * InstitutionspracheRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\InstitutionSpracheRepository
     */
	 
    private $InstitutionspracheRepository = null;

    /**
     * SpracheintwRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\SpracheintwRepository 
     */
	 
    private $SpracheintwRepository = null;
	
    /**
     * GeschlechtRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\GeschlechtRepository
     */

	private $GeschlechtRepository = null;    
	
    /**
     * SchulartRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\SchulartRepository
     */

	private $SchulartRepository = null;    
	
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
     * RegierungsbezirkRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\RegierungsbezirkRepository
     */

	private $RegierungsbezirkRepository = null;    

    /**
     * SpracheRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\SpracheRepository
     */

	private $SpracheRepository = null;    
								
	 /**
     * InstitutionstatusRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\InstitutionstatusRepository
     */

	private $InstitutionstatusRepository = null;    
								
    /**
     * VorkursartRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\VorkursartRepository
     */
    
	private $VorkursartRepository = null;
	
    /**
     * VorkurstagRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\VorkurstagRepository
     */
    
		private $VorkurstagRepository = null;
	
	/**
     * UserRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\FrontendUserRepository
     */
	 
    private $FrontendUserRepository = null;	

    /**
     * DatenbankRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\DatenbankRepository 	 
     */
	 
    private $DatenbankRepository = null;
	
	/**
	 * @var \MbFosbos\Bfbn\Service\AccessControlService
	 */	
	private $AccessControlService;
	
	/**
	 * @var \MbFosbos\Bfbn\Service\GeocodeService
	 */
	 
	private $GeocodeService;

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
     * Inject the Institution Demand Factory
     *
     * @param \MbFosbos\Bfbn\Factory\InstitutionDemandFactory $InstitutionDemandFactory
     */
    public function injectInstitutionDemandFactory(InstitutionDemandFactory $InstitutionDemandFactory)
    {
        $this->InstitutionDemandFactory = $InstitutionDemandFactory;
    }

    /**
     * Inject the Institution Ausbildungsrichtung Demand Factory
     *
     * @param \MbFosbos\Bfbn\Factory\InstitutionAusbildungsrichtungDemandFactory $InstitutionAusbildungsrichtungDemandFactory
     */
    public function injectInstitutionAusbildungsrichtungDemandFactory(InstitutionAusbildungsrichtungDemandFactory $InstitutionAusbildungsrichtungDemandFactory)
    {
        $this->InstitutionAusbildungsrichtungDemandFactory = $InstitutionAusbildungsrichtungDemandFactory;
    }

    /**
     * Inject the Institution Sprache Demand Factory
     *
     * @param \MbFosbos\Bfbn\Factory\InstitutionSpracheDemandFactory $InstitutionSpracheDemandFactory
     */
    public function injectInstitutionSpracheDemandFactory(InstitutionSpracheDemandFactory $InstitutionSpracheDemandFactory)
    {
        $this->InstitutionSpracheDemandFactory = $InstitutionSpracheDemandFactory;
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
     * Inject the Institutionausbildungsrichtung repository
     *
     * @param \MbFosbos\Bfbn\Domain\Repository\InstitutionausbildungsrichtungRepository $InstitutionausbildungsrichtungRepository
     */
    public function injectInstitutionausbildungsrichtungRepository(InstitutionausbildungsrichtungRepository $InstitutionausbildungsrichtungRepository)
    {
        $this->InstitutionausbildungsrichtungRepository = $InstitutionausbildungsrichtungRepository;
    }	

    /**
     * Inject the Institutionsprache repository
     *
     * @param \MbFosbos\Bfbn\Domain\Repository\InstitutionspracheRepository $InstitutionspracheRepository
     */
    public function injectInstitutionspracheRepository(InstitutionspracheRepository $InstitutionspracheRepository)
    {
        $this->InstitutionspracheRepository = $InstitutionspracheRepository;
    }
	
    /**
     * Inject the Spracheintw repository
     *
     * @param \MbFosbos\Bfbn\Domain\Repository\SpracheintwRepository $SpracheintwRepository
     */
    public function injectSpracheintwRepository(SpracheintwRepository $SpracheintwRepository)
    {
        $this->SpracheintwRepository = $SpracheintwRepository;
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
     * Inject the schulart repository
     *
     * @param \MbFosbos\Bfbn\Domain\Repository\SchulartRepository $SchulartRepository
     */
    public function injectSchulartRepository(SchulartRepository $SchulartRepository)
    {
        $this->SchulartRepository = $SchulartRepository;
    }
	
    /**
     * Inject the jahrgangsstufe repository
     *
     * @param \MbFosbos\Bfbn\Domain\Repository\JahrgangsstufeRepository $JahrgangsstufeRepository
     */
    public function injectJahrgangsstufeRepository(JahrgangsstufeRepository $JahrgangsstufeRepository)
    {
        $this->JahrgangsstufeRepository = $JahrgangsstufeRepository;
    }
	
    /**
     * Inject the ausbildungsrichtung repository
     *
     * @param \MbFosbos\Bfbn\Domain\Repository\AusbildungsrichtungRepository $AusbildungsrichtungRepository
     */
    public function injectAusbildungsrichtungRepository(AusbildungsrichtungRepository $AusbildungsrichtungRepository)
    {
        $this->AusbildungsrichtungRepository = $AusbildungsrichtungRepository;
    }		

    /**
     * Inject the regierungsbezirk repository
     *
     * @param \MbFosbos\Bfbn\Domain\Repository\RegierungsbezirkRepository $RegierungsbezirkRepository
     */
    public function injectRegierungsbezirkRepository(RegierungsbezirkRepository $RegierungsbezirkRepository)
    {
        $this->RegierungsbezirkRepository = $RegierungsbezirkRepository;
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
     * Inject the institutionstatus repository
     *
     * @param \MbFosbos\Bfbn\Domain\Repository\InstitutionstatusRepository $InstitutionstatusRepository
     */
    public function injectInstitutionstatusRepository(InstitutionstatusRepository $InstitutionstatusRepository)
    {
        $this->InstitutionstatusRepository = $InstitutionstatusRepository;
    }

    /**
     * Inject the vorkursart repository
     *
     * @param \MbFosbos\Bfbn\Domain\Repository\VorkursartRepository $VorkursartRepository
     */
    public function injectVorkursartRepository(VorkursartRepository $VorkursartRepository)
    {
        $this->VorkursartRepository = $VorkursartRepository;
    }

    /**
     * Inject the vorkurstag repository
     *
     * @param \MbFosbos\Bfbn\Domain\Repository\VorkurstagRepository $VorkurstagRepository
     */
    public function injectVorkurstagRepository(VorkurstagRepository $VorkurstagRepository)
    {
        $this->VorkurstagRepository = $VorkurstagRepository;
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
     * Inject the geocode service
     *
     * @param \MbFosbos\Bfbn\Service\GeocodeService $GeocodeService
     */
    public function injectGeocodeService(GeocodeService $GeocodeService)
    {
        $this->GeocodeService = $GeocodeService;
    }		
    /**
     * action list
     * 
     * @return void
     */
    public function listAction(): ResponseInterface
	{
        $demand = $this->InstitutionDemandFactory->createDemandObjectFromSettings($this->settings);
		$institutionen = $this->InstitutionRepository->findDemanded($demand);
		$whichAnsicht = $this->settings['ansicht'];
		$whichBezirk = $this->settings['bezirke'];
		$whichZoom = $this->settings['kartezoom'];
		$whichUeberschrift = $this->settings['ueberschrift'];
		$this->view->assign('ansicht', $whichAnsicht);
		$this->view->assign('bezirke', $whichBezirk);
		$this->view->assign('zoom', $whichZoom);
		$this->view->assign('ueberschrift', $whichUeberschrift);	
        $this->view->assign('institutionen', $institutionen);
		return $this->htmlResponse($this->view->render());
    }

    /**
     * action show
     * 
     * @param \MbFosbos\Bfbn\Domain\Model\Institution|null $institution
	 * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation("institution")	 
     * @return void
     */
    public function showAction(\MbFosbos\Bfbn\Domain\Model\Institution $institution=null): ResponseInterface
    {
        if (is_null($institution)) {
			/**print \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump( $this->settings['institution']); */
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($this->settings['institution']);
			$this->view->assign('institution', $gesuchteinstitution);
        } else {  
			$this->view->assign('institution', $institution);
		}
		return $this->htmlResponse($this->view->render());
    }
	
    /**
     * action showforedit
     * 
     * @param \MbFosbos\Bfbn\Domain\Model\Institution|null $Institution
     * @return void
     */
    public function showforeditAction(\MbFosbos\Bfbn\Domain\Model\Institution $institution=null): ResponseInterface
	{
        if (is_null($institution)) {
			if ($this->AccessControlService->hasLoggedInFrontendUser()) {
				$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
				$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
				if (!is_null($gesuchteinstitution)) {					
					if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
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
        }
		return $this->htmlResponse();
	}	

	/**
     * action searchform
     * @return void
     */
	
	public function searchformAction(): ResponseInterface
    {
		$whichArt = $this->settings['art'];
		$this->view->assign('art', $whichArt);
		if ($whichArt == 2) {
			$auswahlSchulart = $this->SchulartRepository->findAll();
			$auswahlJahrgangsstufe = $this->JahrgangsstufeRepository->findAll();
			$auswahlAusbildungsrichtung = $this->AusbildungsrichtungRepository->findAll();
			$auswahlRegierungsbezirk = $this->RegierungsbezirkRepository->findAll();
			$auswahlStatus = $this->InstitutionstatusRepository->findAll();
			$this->view->assign('auswahlschulart', $auswahlSchulart); 
			$this->view->assign('auswahljahrgangsstufe', $auswahlJahrgangsstufe);
			$this->view->assign('auswahlausbildungsrichtung', $auswahlAusbildungsrichtung);
			$this->view->assign('regierungsbezirke', $auswahlRegierungsbezirk);
			$this->view->assign('stati', $auswahlStatus);
		}
		if ($whichArt == 3) {
			$auswahlSprache = $this->SpracheRepository->findAll();
			$auswahlJahrgangsstufe = $this->JahrgangsstufeRepository->findSprachensuche();			
			$auswahlRegierungsbezirk = $this->RegierungsbezirkRepository->findAll();
			$auswahlStatus = $this->InstitutionstatusRepository->findAll();
			$this->view->assign('auswahlsprache', $auswahlSprache);
			$this->view->assign('auswahljahrgangsstufe', $auswahlJahrgangsstufe);
			$this->view->assign('regierungsbezirke', $auswahlRegierungsbezirk);
			$this->view->assign('stati', $auswahlStatus);
		}
		if ($whichArt == 4) {
			$auswahlSchulart = $this->SchulartRepository->findAll();			
			$auswahlRegierungsbezirk = $this->RegierungsbezirkRepository->findAll();
			$auswahlStatus = $this->InstitutionstatusRepository->findAll();
			$this->view->assign('auswahlschulart', $auswahlSchulart);
			$this->view->assign('regierungsbezirke', $auswahlRegierungsbezirk);
			$this->view->assign('stati', $auswahlStatus);
		}
		
		return $this->htmlResponse($this->view->render());
    }
	
	/**
     * action searchname
	 * 
     * @return void
     */
	
	public function searchAction(\MbFosbos\Bfbn\DataTransferObject\InstitutionDemand $suche): ResponseInterface
    {
		$whichart = $this->settings['art'];
		if ($whichart < 5) {
			$demand = $this->InstitutionDemandFactory->createDemandObjectFromSearch($suche,$this->settings);
			$institutionen = $this->InstitutionRepository->findDemanded($demand);		
			$this->view->assign('institutionen', $institutionen);
		} else {
			$coords = $this->GeocodeService->getCoordinatesForAddress(NULL, $suche->getPlz(), NULL, 'DE');
			if ($coords) {
				$institutionen = $this->DatenbankRepository->findByRadius($coords['latitude'],$coords['longitude'],$suche->getUmkreis(),$this->settings['startingpoint']);
				$institutionenkomplett = array();
				foreach ($institutionen as $institution) {
					$institutioneinzel = $this->InstitutionRepository->findByUid($institution['uid']);
					$institutionenkomplett[] = $institutioneinzel;					
				}	
			}
			$this->view->assign('institutionen', $institutionenkomplett);
		}
		$whichAnsicht = $this->settings['ansicht'];		
		$this->view->assign('ansicht', $whichAnsicht);
		return $this->htmlResponse($this->view->render());
    }

    /**
     * action searchshow
     * 
     * @param \MbFosbos\Bfbn\Domain\Model\Institution $institution
	 * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation("institution")
     * @return void
     */
    public function searchshowAction(\MbFosbos\Bfbn\Domain\Model\Institution $institution): ResponseInterface
    {
		$this->PersistenceManager->clearState();	
        $this->view->assign('institution', $institution);
		return $this->htmlResponse($this->view->render());	
    }

    /**
     * action edit
     * 
     * @param \MbFosbos\Bfbn\Domain\Model\Institution $institution
	 * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation("institution")
     * @return void
     */
    public function editAction(\MbFosbos\Bfbn\Domain\Model\Institution $institution): ResponseInterface	
	{
		$demand = $this->InstitutionAusbildungsrichtungDemandFactory -> createDemandObjectForAusbildungsrichtung(1,1);
		$ausbabufos = $this->InstitutionausbildungsrichtungRepository->findDemanded($demand);
		$demand = $this->InstitutionAusbildungsrichtungDemandFactory -> createDemandObjectForAusbildungsrichtung(1,2);
		$ausbgstfos = $this->InstitutionausbildungsrichtungRepository->findDemanded($demand);
		$demand = $this->InstitutionAusbildungsrichtungDemandFactory -> createDemandObjectForAusbildungsrichtung(1,3);
		$ausbgesfos = $this->InstitutionausbildungsrichtungRepository->findDemanded($demand);
		$demand = $this->InstitutionAusbildungsrichtungDemandFactory -> createDemandObjectForAusbildungsrichtung(1,4);
		$ausbiwifos = $this->InstitutionausbildungsrichtungRepository->findDemanded($demand);
		$demand = $this->InstitutionAusbildungsrichtungDemandFactory -> createDemandObjectForAusbildungsrichtung(1,5);
		$ausbsozfos = $this->InstitutionausbildungsrichtungRepository->findDemanded($demand);
		$demand = $this->InstitutionAusbildungsrichtungDemandFactory -> createDemandObjectForAusbildungsrichtung(1,6);
		$ausbtecfos = $this->InstitutionausbildungsrichtungRepository->findDemanded($demand);
		$demand = $this->InstitutionAusbildungsrichtungDemandFactory -> createDemandObjectForAusbildungsrichtung(1,7);
		$ausbwuvfos = $this->InstitutionausbildungsrichtungRepository->findDemanded($demand);
		$demand = $this->InstitutionAusbildungsrichtungDemandFactory -> createDemandObjectForAusbildungsrichtung(2,1);
		$ausbabubos = $this->InstitutionausbildungsrichtungRepository->findDemanded($demand);
		$demand = $this->InstitutionAusbildungsrichtungDemandFactory -> createDemandObjectForAusbildungsrichtung(2,3);
		$ausbgesbos = $this->InstitutionausbildungsrichtungRepository->findDemanded($demand);
		$demand = $this->InstitutionAusbildungsrichtungDemandFactory -> createDemandObjectForAusbildungsrichtung(2,4);
		$ausbiwibos = $this->InstitutionausbildungsrichtungRepository->findDemanded($demand);
		$demand = $this->InstitutionAusbildungsrichtungDemandFactory -> createDemandObjectForAusbildungsrichtung(2,5);
		$ausbsozbos = $this->InstitutionausbildungsrichtungRepository->findDemanded($demand);
		$demand = $this->InstitutionAusbildungsrichtungDemandFactory -> createDemandObjectForAusbildungsrichtung(2,6);
		$ausbtecbos = $this->InstitutionausbildungsrichtungRepository->findDemanded($demand);
		$demand = $this->InstitutionAusbildungsrichtungDemandFactory -> createDemandObjectForAusbildungsrichtung(2,7);
		$ausbwuvbos = $this->InstitutionausbildungsrichtungRepository->findDemanded($demand);

		$demand = $this->InstitutionSpracheDemandFactory -> createDemandObjectForSprache(1);
		$franzoesisch = $this->InstitutionspracheRepository->findDemanded($demand);
		$demand = $this->InstitutionSpracheDemandFactory -> createDemandObjectForSprache(2);
		$italienisch = $this->InstitutionspracheRepository->findDemanded($demand);
		$demand = $this->InstitutionSpracheDemandFactory -> createDemandObjectForSprache(3);
		$latein = $this->InstitutionspracheRepository->findDemanded($demand);
		$demand = $this->InstitutionSpracheDemandFactory -> createDemandObjectForSprache(4);
		$russisch = $this->InstitutionspracheRepository->findDemanded($demand);
		$demand = $this->InstitutionSpracheDemandFactory -> createDemandObjectForSprache(5);
		$spanisch = $this->InstitutionspracheRepository->findDemanded($demand);
		
		$auswahlgeschlecht = $this->GeschlechtRepository->findAll();
		$auswahlvorkursart = $this->VorkursartRepository->findAll();
		$auswahlvorkurstag = $this->VorkurstagRepository->findAll();
		$auswahlsprachenintw = $this->SpracheintwRepository->findAll();
		
        $this->view->assign('ausbabufos', $ausbabufos); 
        $this->view->assign('ausbgstfos', $ausbgstfos);
        $this->view->assign('ausbgesfos', $ausbgesfos); 
        $this->view->assign('ausbiwifos', $ausbiwifos); 
        $this->view->assign('ausbsozfos', $ausbsozfos); 
        $this->view->assign('ausbtecfos', $ausbtecfos);
        $this->view->assign('ausbwuvfos', $ausbwuvfos);
        $this->view->assign('ausbabubos', $ausbabubos);
        $this->view->assign('ausbgesbos', $ausbgesbos); 
        $this->view->assign('ausbiwibos', $ausbiwibos); 
        $this->view->assign('ausbsozbos', $ausbsozbos); 
        $this->view->assign('ausbtecbos', $ausbtecbos);
        $this->view->assign('ausbwuvbos', $ausbwuvbos);
		
        $this->view->assign('franzoesisch', $franzoesisch); 
        $this->view->assign('italienisch', $italienisch); 
        $this->view->assign('latein', $latein); 
        $this->view->assign('russisch', $russisch);
        $this->view->assign('spanisch', $spanisch);

		$this->view->assign('auswahlsprachenintw', $auswahlsprachenintw);
		$this->view->assign('auswahlgeschlecht', $auswahlgeschlecht);
		$this->view->assign('auswahlvorkursart', $auswahlvorkursart);
		$this->view->assign('auswahlvorkurstag', $auswahlvorkurstag);
  		
        $this->view->assign('institution', $institution);
		return $this->htmlResponse($this->view->render());		
    }
	
    /**
     * action update
     * 
     * @param \MbFosbos\Bfbn\Domain\Model\Institution $institution
     * @return void
     */
    public function updateAction(\MbFosbos\Bfbn\Domain\Model\Institution $institution): ResponseInterface
    {
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$this->InstitutionRepository->update($institution);
					return $this->redirect('showforedit');
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
		if ($this->arguments->hasArgument('institution')) {			

			$postData = $this->request->getArgument('institution') ;

			if (isset($postData['institution'])) {
				if(is_null($postData['institution']['vorkursartfos'])) {
					$this->arguments->getArgument('institution')->getPropertyMappingConfiguration()->skipProperties('vorkursartfos');
				}
				if(is_null($postData['institution']['vorkurstagfos'])) {
					$this->arguments->getArgument('institution')->getPropertyMappingConfiguration()->skipProperties('vorkurstagfos');
				}
				if(is_null($postData['institution']['vorkursartbos'])) {
					$this->arguments->getArgument('institution')->getPropertyMappingConfiguration()->skipProperties('vorkursartbos');
				}
				if(is_null($postData['institution']['vorkurstagbos'])) {
					$this->arguments->getArgument('institution')->getPropertyMappingConfiguration()->skipProperties('vorkurstagbos');
				}				
			}
		}
	}	
}
