<?php
namespace OliverBauer\Bfbn\Controller;

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
 
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use OliverBauer\Bfbn\Utility\Page;
use OliverBauer\Bfbn\Domain\Repository\InstitutionRepository;
use OliverBauer\Bfbn\Domain\Repository\InstitutionAusbildungsrichtungRepository;
use OliverBauer\Bfbn\Domain\Repository\InstitutionSpracheRepository;
use OliverBauer\Bfbn\Domain\Repository\SpracheintwRepository;
use OliverBauer\Bfbn\Domain\Repository\GeschlechtRepository;
use OliverBauer\Bfbn\Domain\Repository\SchulartRepository;
use OliverBauer\Bfbn\Domain\Repository\JahrgangsstufeRepository;
use OliverBauer\Bfbn\Domain\Repository\AusbildungsrichtungRepository;
use OliverBauer\Bfbn\Domain\Repository\RegierungsbezirkRepository;
use OliverBauer\Bfbn\Domain\Repository\SpracheRepository;
use OliverBauer\Bfbn\Domain\Repository\InstitutionstatusRepository;
use OliverBauer\Bfbn\Domain\Repository\VorkursartRepository;
use OliverBauer\Bfbn\Domain\Repository\VorkurstagRepository;
use OliverBauer\Bfbn\Domain\Repository\AuswahljaneinRepository;
use OliverBauer\Bfbn\Service\AccessControlService;
use OliverBauer\Bfbn\Service\GeocodeService;
use OliverBauer\Bfbn\Domain\Repository\FrontendUserRepository;
use Psr\Http\Message\ResponseInterface;
 
/**
 * InstitutionController
 */
class InstitutionController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * InstitutionRepository
     * 
     * @var \OliverBauer\Bfbn\Domain\Repository\InstitutionRepository 	 
     */
    private $InstitutionRepository = null;
	
    /**
     * InstitutionausbildungsrichtungRepository
     * 
     * @var \OliverBauer\Bfbn\Domain\Repository\InstitutionAusbildungsrichtungRepository
     */
    private $InstitutionausbildungsrichtungRepository = null;

    /**
     * InstitutionspracheRepository
     * 
     * @var \OliverBauer\Bfbn\Domain\Repository\InstitutionSpracheRepository
     */
	 
    private $InstitutionspracheRepository = null;

    /**
     * SpracheintwRepository
     * 
     * @var \OliverBauer\Bfbn\Domain\Repository\SpracheintwRepository 
     */
	 
    private $SpracheintwRepository = null;
	
    /**
     * GeschlechtRepository
     * 
     * @var \OliverBauer\Bfbn\Domain\Repository\GeschlechtRepository
     */

	private $GeschlechtRepository = null;    
	
    /**
     * SchulartRepository
     * 
     * @var \OliverBauer\Bfbn\Domain\Repository\SchulartRepository
     */

	private $SchulartRepository = null;    
	
    /**
     * JahrgangsstufeRepository
     * 
     * @var \OliverBauer\Bfbn\Domain\Repository\JahrgangsstufeRepository
     */

	private $JahrgangsstufeRepository = null;    
	
    /**
     * AusbildungsrichtungRepository
     * 
     * @var \OliverBauer\Bfbn\Domain\Repository\AusbildungsrichtungRepository
     */

	private $AusbildungsrichtungRepository = null;    

    /**
     * RegierungsbezirkRepository
     * 
     * @var \OliverBauer\Bfbn\Domain\Repository\RegierungsbezirkRepository
     */

	private $RegierungsbezirkRepository = null;    

    /**
     * SpracheRepository
     * 
     * @var \OliverBauer\Bfbn\Domain\Repository\SpracheRepository
     */

	private $SpracheRepository = null;    
								
	 /**
     * InstitutionstatusRepository
     * 
     * @var \OliverBauer\Bfbn\Domain\Repository\InstitutionstatusRepository
     */

	private $InstitutionstatusRepository = null;    
								
    /**
     * VorkursartRepository
     * 
     * @var \OliverBauer\Bfbn\Domain\Repository\VorkursartRepository
     */
    
	private $VorkursartRepository = null;
	
    /**
     * VorkurstagRepository
     * 
     * @var \OliverBauer\Bfbn\Domain\Repository\VorkurstagRepository
     */
    
		private $VorkurstagRepository = null;
	
    /**
     * AuswahljaneinRepository
     * 
     * @var \OliverBauer\Bfbn\Domain\Repository\AuswahljaneinRepository
     */
    
	private $AuswahljaneinRepository = null;	
	
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
	 * @var \OliverBauer\Bfbn\Service\GeocodeService
	 */
	 
	private $GeocodeService;

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
     * Inject the Institutionausbildungsrichtung repository
     *
     * @param \OliverBauer\Bfbn\Domain\Repository\InstitutionausbildungsrichtungRepository $InstitutionausbildungsrichtungRepository
     */
    public function injectInstitutionausbildungsrichtungRepository(InstitutionausbildungsrichtungRepository $InstitutionausbildungsrichtungRepository)
    {
        $this->InstitutionausbildungsrichtungRepository = $InstitutionausbildungsrichtungRepository;
    }	

    /**
     * Inject the Institutionsprache repository
     *
     * @param \OliverBauer\Bfbn\Domain\Repository\InstitutionspracheRepository $InstitutionspracheRepository
     */
    public function injectInstitutionspracheRepository(InstitutionspracheRepository $InstitutionspracheRepository)
    {
        $this->InstitutionspracheRepository = $InstitutionspracheRepository;
    }
	
    /**
     * Inject the Spracheintw repository
     *
     * @param \OliverBauer\Bfbn\Domain\Repository\SpracheintwRepository $SpracheintwRepository
     */
    public function injectSpracheintwRepository(SpracheintwRepository $SpracheintwRepository)
    {
        $this->SpracheintwRepository = $SpracheintwRepository;
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
     * Inject the schulart repository
     *
     * @param \OliverBauer\Bfbn\Domain\Repository\SchulartRepository $SchulartRepository
     */
    public function injectSchulartRepository(SchulartRepository $SchulartRepository)
    {
        $this->SchulartRepository = $SchulartRepository;
    }
	
    /**
     * Inject the jahrgangsstufe repository
     *
     * @param \OliverBauer\Bfbn\Domain\Repository\JahrgangsstufeRepository $JahrgangsstufeRepository
     */
    public function injectJahrgangsstufeRepository(JahrgangsstufeRepository $JahrgangsstufeRepository)
    {
        $this->JahrgangsstufeRepository = $JahrgangsstufeRepository;
    }
	
    /**
     * Inject the ausbildungsrichtung repository
     *
     * @param \OliverBauer\Bfbn\Domain\Repository\AusbildungsrichtungRepository $AusbildungsrichtungRepository
     */
    public function injectAusbildungsrichtungRepository(AusbildungsrichtungRepository $AusbildungsrichtungRepository)
    {
        $this->AusbildungsrichtungRepository = $AusbildungsrichtungRepository;
    }		

    /**
     * Inject the regierungsbezirk repository
     *
     * @param \OliverBauer\Bfbn\Domain\Repository\RegierungsbezirkRepository $RegierungsbezirkRepository
     */
    public function injectRegierungsbezirkRepository(RegierungsbezirkRepository $RegierungsbezirkRepository)
    {
        $this->RegierungsbezirkRepository = $RegierungsbezirkRepository;
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
     * Inject the institutionstatus repository
     *
     * @param \OliverBauer\Bfbn\Domain\Repository\InstitutionstatusRepository $InstitutionstatusRepository
     */
    public function injectInstitutionstatusRepository(InstitutionstatusRepository $InstitutionstatusRepository)
    {
        $this->InstitutionstatusRepository = $InstitutionstatusRepository;
    }

    /**
     * Inject the vorkursart repository
     *
     * @param \OliverBauer\Bfbn\Domain\Repository\VorkursartRepository $VorkursartRepository
     */
    public function injectVorkursartRepository(VorkursartRepository $VorkursartRepository)
    {
        $this->VorkursartRepository = $VorkursartRepository;
    }

    /**
     * Inject the vorkurstag repository
     *
     * @param \OliverBauer\Bfbn\Domain\Repository\VorkurstagRepository $VorkurstagRepository
     */
    public function injectVorkurstagRepository(VorkurstagRepository $VorkurstagRepository)
    {
        $this->VorkurstagRepository = $VorkurstagRepository;
    }	

    /**
     * Inject the auswahljanein repository
     *
     * @param \OliverBauer\Bfbn\Domain\Repository\AuswahljaneinRepository $AuswahljaneinRepository
     */
    public function injectAuswahljaneinRepository(AuswahljaneinRepository $AuswahljaneinRepository)
    {
        $this->AuswahljaneinRepository = $AuswahljaneinRepository;
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
     * Inject the geocode service
     *
     * @param \OliverBauer\Bfbn\Service\GeocodeService $GeocodeService
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
        $demand = $this -> createDemandObjectFromSettings($this->settings);
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
     * @param \OliverBauer\Bfbn\Domain\Model\Institution|null $Institution
     * @return void
     */
    public function showAction(\OliverBauer\Bfbn\Domain\Model\Institution $institution=null): ResponseInterface
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
     * @param \OliverBauer\Bfbn\Domain\Model\Institution|null $Institution
     * @return void
     */
    public function showforeditAction(\OliverBauer\Bfbn\Domain\Model\Institution $institution=null): ResponseInterface
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
	
	public function searchAction(\OliverBauer\Bfbn\Domain\Model\InstitutionDemand $suche): ResponseInterface
    {
		$whichart = $this->settings['art'];
		if ($whichart < 5) {
			$demand = $this -> createDemandObjectFromSearch($suche,$this->settings);
			$institutionen = $this->InstitutionRepository->findDemanded($demand);		
			$this->view->assign('institutionen', $institutionen);
		} else {
			$coords = $this->GeocodeService->getCoordinatesForAddress(NULL, $suche->getPlz(), NULL, 'DE');
			if ($coords) {
				$institutionen = $this->InstitutionRepository->findByRadius($coords['latitude'],$coords['longitude'],$suche->getUmkreis(),$this->settings['startingpoint']);
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
     * @param \OliverBauer\Bfbn\Domain\Model\Institution $Institution
	 * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation("Institution")
     * @return void
     */
    public function searchshowAction(\OliverBauer\Bfbn\Domain\Model\Institution $institution): ResponseInterface
    {
		$this->objectManager->get(\TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager::class)->clearState();	
        $this->view->assign('institution', $institution);
		return $this->htmlResponse($this->view->render());	
    }
		
	protected function createDemandObjectFromSettings($settings) {

        $demand = $this->objectManager->get('OliverBauer\\Bfbn\\Domain\\Model\\InstitutionDemand'); // Neuer Inhalt ist der Dateiname vom Domain Modell -> Classes -> Domain -> Model
        $demand->setCategories(GeneralUtility::trimExplode(',', $settings['categories'], true));
		$demand->setStartingpoint(Page::extendPidListByChildren(
			(string)($settings['startingpoint'] ?? ''),
            (int)($settings['recursive'] ?? 0)
        ));
		$demand->setBezirk(GeneralUtility::trimExplode(',', $settings['bezirke'], true));
		$demand->setAusbildungsrichtungen(GeneralUtility::trimExplode(',', $settings['ausbildungsrichtungen'], true));
		$demand->setSprachen(GeneralUtility::trimExplode(',', $settings['sprachen'], true));
		$demand->setProfilinklusion($settings['inklusion']);
		$demand->setIvk($settings['ivk']);		
        return $demand;
    }
	
	protected function createDemandObjectFromSearch($suche,$settings) {
        $demand = $this->objectManager->get('OliverBauer\\Bfbn\\Domain\\Model\\InstitutionDemand'); // Neuer Inhalt ist der Dateiname vom Domain Modell -> Classes -> Domain -> Model
        if ($settings['art']==1) {
			$demand->setBezeichnung($suche->getBezeichnung());
		}
		if ($settings['art']==2) {
			$ausbildungsrichtungenarray = array();			
			$demand->setSchulart($suche->getSchulart());
			$demand->setJahrgangsstufe($suche->getJahrgangsstufe());
			$demand->setAusbildungsrichtung($suche->getAusbildungsrichtung());
			$demand->setRegierungsbezirk($suche->getRegierungsbezirk());
			$demand->setStatus($suche->getStatus());
			$ausbildungsrichtungen = $suche->getAusbildungsrichtung();
			if (!is_array($ausbildungsrichtungen)) {
				$ausbildungsrichtungen = \TYPO3\CMS\Core\Utility\GeneralUtility::intExplode(',', $ausbildungsrichtungen, TRUE);
			}			
			foreach ($ausbildungsrichtungen as $ausb)
			{
				if ($suche->getSchulart() == 1) {
					switch ($ausb)
					{
						case 1:
							$ausbildungsrichtungenarray[] = (1);
							$ausbildungsrichtungenarray[] = (2);
							$ausbildungsrichtungenarray[] = (3);
							break;
						case 2:
							$ausbildungsrichtungenarray[] = (6);
							$ausbildungsrichtungenarray[] = (7);
							$ausbildungsrichtungenarray[] = (8);
							break;						
						case 3:
							$ausbildungsrichtungenarray[] = (9);
							$ausbildungsrichtungenarray[] = (10);
							$ausbildungsrichtungenarray[] = (11);
							break;					
						case 4:
							$ausbildungsrichtungenarray[] = (14);
							$ausbildungsrichtungenarray[] = (15);
							$ausbildungsrichtungenarray[] = (16);
							break;						
						case 5:
							$ausbildungsrichtungenarray[] = (19);
							$ausbildungsrichtungenarray[] = (20);
							$ausbildungsrichtungenarray[] = (21);
							break;						
						case 6:
							$ausbildungsrichtungenarray[] = (24);
							$ausbildungsrichtungenarray[] = (25);
							$ausbildungsrichtungenarray[] = (26);
							break;							
						case 7:
							$ausbildungsrichtungenarray[] = (29);
							$ausbildungsrichtungenarray[] = (30);
							$ausbildungsrichtungenarray[] = (31);
							break;						
					}
				} else {
					
					switch ($ausb)
					{
						case 1:
							$ausbildungsrichtungenarray[] = (4);
							$ausbildungsrichtungenarray[] = (5);
							break;
						case 3:
							$ausbildungsrichtungenarray[] = (12);
							$ausbildungsrichtungenarray[] = (13);
							break;					
						case 4:
							$ausbildungsrichtungenarray[] = (17);
							$ausbildungsrichtungenarray[] = (18);
							break;						
						case 5:
							$ausbildungsrichtungenarray[] = (22);
							$ausbildungsrichtungenarray[] = (23);
							break;						
						case 6:
							$ausbildungsrichtungenarray[] = (27);
							$ausbildungsrichtungenarray[] = (28);
							break;							
						case 7:
							$ausbildungsrichtungenarray[] = (32);
							$ausbildungsrichtungenarray[] = (33);
							break;							
					}					
				}
			}
			$demand->setAusbildungsrichtungen($ausbildungsrichtungenarray);
			
		}
		if ($settings['art']==3) {	
			$demand->setSprache($suche->getSprache());
			$demand->setJahrgangsstufe($suche->getJahrgangsstufe());			
			$demand->setRegierungsbezirk($suche->getRegierungsbezirk());
			$demand->setStatus($suche->getStatus());			
			$switchsuche = $suche->getSprache().$suche->getJahrgangsstufe();
					
			switch ($switchsuche)
			{
			case 12:
				$demand->setSprachen(1);
				break;
			case 13:
				$demand->setSprachen(2);
				break;				
			case 22:
				$demand->setSprachen(3);
				break;
			case 23:
				$demand->setSprachen(4);
				break;				
			case 32:
				$demand->setSprachen(5);
				break;
			case 33:
				$demand->setSprachen(6);
				break;				
			case 42:
				$demand->setSprachen(7);
				break;
			case 43:
				$demand->setSprachen(8);
				break;				
			case 52:
				$demand->setSprachen(9);
				break;
			case 53:
				$demand->setSprachen(10);
				break;				
			}
		}
		
		if ($settings['art']==4) {			
			$demand->setSchulart($suche->getSchulart());
			$demand->setVorart($suche->getVorart());
			$demand->setRegierungsbezirk($suche->getRegierungsbezirk());
			$demand->setStatus($suche->getStatus());
		}
		
		$demand->setArt($settings['art']);
        $demand->setCategories(GeneralUtility::trimExplode(',', $settings['categories'], true));
		$demand->setStartingpoint(Page::extendPidListByChildren(
			(string)($settings['startingpoint'] ?? ''),
            (int)($settings['recursive'] ?? 0)
        ));
 				
        return $demand;
    }

	protected function createDemandObjectForAusbildungsrichtung($schulart,$ausbildungsrichtung) {
        $demand = $this->objectManager->get('OliverBauer\\Bfbn\\Domain\\Model\\InstitutionAusbildungsrichtungDemand'); // Neuer Inhalt ist der Dateiname vom Domain Modell -> Classes -> Domain -> Model
        $demand->setSchulart($schulart);
        $demand->setAusbildungsrichtung($ausbildungsrichtung);
		/** print \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($demand); */	
        return $demand;
    }
	
	protected function createDemandObjectForSprache($sprache) {
        $demand = $this->objectManager->get('OliverBauer\\Bfbn\\Domain\\Model\\InstitutionSpracheDemand'); // Neuer Inhalt ist der Dateiname vom Domain Modell -> Classes -> Domain -> Model
        $demand->setSprache($sprache);
		/** print \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($demand); */	
        return $demand;
    }	

    /**
     * action edit
     * 
     * @param \OliverBauer\Bfbn\Domain\Model\Institution $institution
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation $institution
     * @return void
     */
    public function editAction(\OliverBauer\Bfbn\Domain\Model\Institution $institution): ResponseInterface	
	{
		$demand = $this -> createDemandObjectForAusbildungsrichtung(1,1);
		$ausbabufos = $this->InstitutionausbildungsrichtungRepository->findDemanded($demand);
		$demand = $this -> createDemandObjectForAusbildungsrichtung(1,2);
		$ausbgstfos = $this->InstitutionausbildungsrichtungRepository->findDemanded($demand);
		$demand = $this -> createDemandObjectForAusbildungsrichtung(1,3);
		$ausbgesfos = $this->InstitutionausbildungsrichtungRepository->findDemanded($demand);
		$demand = $this -> createDemandObjectForAusbildungsrichtung(1,4);
		$ausbiwifos = $this->InstitutionausbildungsrichtungRepository->findDemanded($demand);
		$demand = $this -> createDemandObjectForAusbildungsrichtung(1,5);
		$ausbsozfos = $this->InstitutionausbildungsrichtungRepository->findDemanded($demand);
		$demand = $this -> createDemandObjectForAusbildungsrichtung(1,6);
		$ausbtecfos = $this->InstitutionausbildungsrichtungRepository->findDemanded($demand);
		$demand = $this -> createDemandObjectForAusbildungsrichtung(1,7);
		$ausbwuvfos = $this->InstitutionausbildungsrichtungRepository->findDemanded($demand);
		$demand = $this -> createDemandObjectForAusbildungsrichtung(2,1);
		$ausbabubos = $this->InstitutionausbildungsrichtungRepository->findDemanded($demand);
		$demand = $this -> createDemandObjectForAusbildungsrichtung(2,3);
		$ausbgesbos = $this->InstitutionausbildungsrichtungRepository->findDemanded($demand);
		$demand = $this -> createDemandObjectForAusbildungsrichtung(2,4);
		$ausbiwibos = $this->InstitutionausbildungsrichtungRepository->findDemanded($demand);
		$demand = $this -> createDemandObjectForAusbildungsrichtung(2,5);
		$ausbsozbos = $this->InstitutionausbildungsrichtungRepository->findDemanded($demand);
		$demand = $this -> createDemandObjectForAusbildungsrichtung(2,6);
		$ausbtecbos = $this->InstitutionausbildungsrichtungRepository->findDemanded($demand);
		$demand = $this -> createDemandObjectForAusbildungsrichtung(2,7);
		$ausbwuvbos = $this->InstitutionausbildungsrichtungRepository->findDemanded($demand);

		$demand = $this -> createDemandObjectForSprache(1);
		$franzoesisch = $this->InstitutionspracheRepository->findDemanded($demand);
		$demand = $this -> createDemandObjectForSprache(2);
		$italienisch = $this->InstitutionspracheRepository->findDemanded($demand);
		$demand = $this -> createDemandObjectForSprache(3);
		$latein = $this->InstitutionspracheRepository->findDemanded($demand);
		$demand = $this -> createDemandObjectForSprache(4);
		$russisch = $this->InstitutionspracheRepository->findDemanded($demand);
		$demand = $this -> createDemandObjectForSprache(5);
		$spanisch = $this->InstitutionspracheRepository->findDemanded($demand);
		
		$auswahlgeschlecht = $this->GeschlechtRepository->findAll();
		$auswahlvorkursart = $this->VorkursartRepository->findAll();
		$auswahlvorkurstag = $this->VorkurstagRepository->findAll();
		$auswahlsprachenintw = $this->SpracheintwRepository->findAll();
		$auswahljanein = $this->AuswahljaneinRepository->findAll();
		
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
		$this->view->assign('auswahljanein', $auswahljanein);		
  		
        $this->view->assign('institution', $institution);
		return $this->htmlResponse($this->view->render());		
    }
	
    /**
     * action update
     * 
     * @param \OliverBauer\Bfbn\Domain\Model\Institution $institution
     * @return void
     */
    public function updateAction(\OliverBauer\Bfbn\Domain\Model\Institution $institution): ResponseInterface
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

}
