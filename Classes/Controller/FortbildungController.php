<?php
namespace MbFosbos\Bfbn\Controller;

use TYPO3\CMS\Core\Core\Environment;
use MbFosbos\Bfbn\Factory\AbfrageDemandFactory;
use MbFosbos\Bfbn\Factory\FortbildungDemandFactory;
use MbFosbos\Bfbn\Domain\Repository\InstitutionRepository;
use MbFosbos\Bfbn\Domain\Repository\FortbildungRepository;
use MbFosbos\Bfbn\Domain\Repository\FortbildungartRepository;
use MbFosbos\Bfbn\Domain\Repository\FrontendUserRepository;
use MbFosbos\Bfbn\Domain\Repository\DatenbankRepository;
use MbFosbos\Bfbn\Domain\Repository\HtmlTemplateRepository;
use MbFosbos\Bfbn\Domain\Repository\PdfTemplateRepository;
use MbFosbos\Bfbn\Service\AccessControlService;
use MbFosbos\Bfbn\Service\PdfService;
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
 * FortbildungController
 */
class FortbildungController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

	/**
     * AbfrageDemandFactory
     * 
     * @var \MbFosbos\Bfbn\Factory\AbfrageDemandFactory 	 
     */
    private $AbfrageDemandFactory = null;

	/**
     * FortbildungDemandFactory
     * 
     * @var \MbFosbos\Bfbn\Factory\FortbildungDemandFactory 	 
     */
    private $FortbildungDemandFactory = null;
	
    /**
     * InstitutionRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\InstitutionRepository
     */
    private $InstitutionRepository = null;
	
    /**
     * FortbildungRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\FortbildungRepository
     */
    private $FortbildungRepository = null;

	
    /**
     * FortbildungartRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\FortbildungartRepository
     */    
	private $FortbildungartRepository = null;

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
     * htmlTemplateRepository
     *
     * @var HtmlTemplateRepository
     */
    private $htmlTemplateRepository = null;

    /**
     * pdfTemplateRepository
     *
     * @var PdfTemplateRepository
     */
    private $pdfTemplateRepository = null;
	
	/**
	 * @var \MbFosbos\Bfbn\Service\AccessControlService
	 */
	protected $AccessControlService;

    /**
     * Pdf Service
     *
     * @var \MbFosbos\Bfbn\Service\PdfService
     */
    private $pdfService;


    /**
     * Inject the Fortbildung Demand Factory
     *
     * @param \MbFosbos\Bfbn\Factory\FortbildungDemandFactory $FortbildungDemandFactory
     */
    public function injectFortbildungDemandFactory(FortbildungDemandFactory $FortbildungDemandFactory)
    {
        $this->FortbildungDemandFactory = $FortbildungDemandFactory;
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
     * Inject the Fortbildung repository
     *
     * @param \MbFosbos\Bfbn\Domain\Repository\FortbildungRepository $FortbildungRepository
     */
    public function injectFortbildungRepository(FortbildungRepository $FortbildungRepository)
    {
        $this->FortbildungRepository = $FortbildungRepository;
    }	

    /**
     * Inject the Fortbildungart repository
     *
     * @param \MbFosbos\Bfbn\Domain\Repository\FortbildungartRepository $FortbildungartRepository
     */
    public function injectFortbildungartRepository(FortbildungartRepository $FortbildungartRepository)
    {
        $this->FortbildungartRepository = $FortbildungartRepository;
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
     * @param \MbFosbos\Bfbn\Domain\Repository\HtmlTemplateRepository $htmlTemplateRepository
     */
    public function injectHtmlTemplateRepository(HtmlTemplateRepository $htmlTemplateRepository)
    {
        $this->htmlTemplateRepository = $htmlTemplateRepository;
    }

    /**
     * @param \MbFosbos\Bfbn\Domain\Repository\PdfTemplateRepository $pdfTemplateRepository
     */
    public function injectPdfTemplateRepository(PdfTemplateRepository $pdfTemplateRepository)
    {
        $this->pdfTemplateRepository = $pdfTemplateRepository;
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
     * @param PdfService $pdfService
     */
    public function injectPdfService(PdfService $pdfService)
    {
        $this->pdfService = $pdfService;
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
     * @param \MbFosbos\Bfbn\Domain\Model\Fortbildung $Fortbildung
     * @return void
     */
    public function showAction(\MbFosbos\Bfbn\Domain\Model\Fortbildung $Fortbildung): ResponseInterface
    {
        $this->view->assign('Fortbildungg', $Fortbildung);
		return $this->htmlResponse($this->view->render());		
    }
	
	/**
     * action list
     * 
     * @return void
     */
    public function listAction(\MbFosbos\Bfbn\Domain\Model\Fortbildung $fortbildung=null): ResponseInterface
	{
        if (is_null($fortbildung)) {
			if ($this->AccessControlService->hasLoggedInFrontendUser()) {
				$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
				$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
				if (!is_null($gesuchteinstitution)) {					
					if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
						$demand = $this->AbfrageDemandFactory->createDemandObject($gesuchteinstitution);
						$fortbildungen = $this->FortbildungRepository->findDemanded($demand);
						$this->view->assign('fortbildungen', $fortbildungen);						
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
     * @param \MbFosbos\Bfbn\Domain\Model\Fortbildung $fortbildung
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation ("fortbildung")
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation ("gesuchteinstitution")	 
     * @return void
     */
    public function editAction(\MbFosbos\Bfbn\Domain\Model\Fortbildung $fortbildung): ResponseInterface	
	{
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());			 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$auswahlart = $this->FortbildungartRepository->findAll();
					$this->view->assign('fortbildung', $fortbildung);
					$this->view->assign('institution', $gesuchteinstitution);
					$this->view->assign('auswahlart', $auswahlart);
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
     * @param \MbFosbos\Bfbn\Domain\Model\Fortbildung $fortbildung
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation ("fortbildung")
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation ("gesuchteinstitution")
	 *	
     * @return string
     */
    public function newAction(\MbFosbos\Bfbn\Domain\Model\Fortbildung $fortbildung = NULL): ResponseInterface
    {
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$auswahlart = $this->FortbildungartRepository->findAll();
					$this->view->assign('fortbildung', $fortbildung ?? NULL);
					$this->view->assign('institution', $gesuchteinstitution);
					$this->view->assign('auswahlart', $auswahlart);
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
     * @param \MbFosbos\Bfbn\Domain\Model\Fortbildung $fortbildung
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation ("fortbildung")
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation ("gesuchteinstitution")	 
	 * 
     * @return void
     */
    public function createAction(\MbFosbos\Bfbn\Domain\Model\Fortbildung $fortbildung): ResponseInterface
    {
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$this->addFlashMessage('Der Fortbildungsvorschlag wurde erfolgreich angelegt'); 					
					$this->FortbildungRepository->add($fortbildung);
					return $this->redirect('list','Fortbildung',NULL);
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
     * @param \MbFosbos\Bfbn\Domain\Model\Fortbildung $fortbildung
     * @return void
     */
    public function updateAction(\MbFosbos\Bfbn\Domain\Model\Fortbildung $fortbildung): ResponseInterface
    {
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$this->FortbildungRepository->update($fortbildung);
					return $this->redirect('list','Fortbildung', NULL);
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
     * @param \MbFosbos\Bfbn\Domain\Model\Fortbildung $fortbildung
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation ("fortbildung")
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation ("gesuchteinstitution")
	 *
     * @return void
     */
    public function deleteAction(\MbFosbos\Bfbn\Domain\Model\Fortbildung $fortbildung): ResponseInterface
    {
		if ($this->AccessControlService->hasLoggedInFrontendUser()) {
			$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
			$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
			if (!is_null($gesuchteinstitution)) {					
				if ($this->AccessControlService->checkLoggedInFrontendUser($gesuchteinstitution->getBearbeiter())) {
					$this->addFlashMessage('Der Fortbildungsvorschlag wurde gelöscht');
					$this->FortbildungRepository->remove($fortbildung);
					return $this->redirect('list','Fortbildung', NULL);
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
     * action listfma
     * 
     * @return void
     */
    public function listfmaAction(\MbFosbos\Bfbn\Domain\Model\Fortbildung $fortbildung=null): ResponseInterface
	{
        if (is_null($fortbildung)) {
			if ($this->AccessControlService->hasLoggedInFrontendUser()) {
				$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());

				$username = $user->getUsername();

				if (substr($username,0,3) === "fma" || $username === 'intern') {
					$demand = $this->FortbildungDemandFactory->createDemandObjectFromSettings($this->settings);				
					$fortbildungen = $this->DatenbankRepository->findFortbildungFma($demand);
					$this->view->assign('fortbildungen', $fortbildungen);						
				} else {
					$this->addFlashMessage('Sie haben keine Berechtigung die Aktion auszuführen.');	
				}
			} else {
				$this->addFlashMessage('Benutzer nicht eingeloggt.');
			}		
        }
		return $this->htmlResponse();
    }
	
    /**
     * action showfma
     * 
     * @param array $fortbildung
     * @return void
     */
    public function showfmaAction(array $fortbildung): ResponseInterface
    {
        if (!is_null($fortbildung)) {
			if ($this->AccessControlService->hasLoggedInFrontendUser()) {
				$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());

				$username = $user->getUsername();

				if (substr($username,0,3) === "fma" || $username === 'intern') {
					$pdfTemplateUid = $this->settings['pdftemplate'];
							
					/** @var PdfTemplate $pdfTemplate */
					$pdfTemplate = $this->pdfTemplateRepository->findByUid($pdfTemplateUid);		
					/** print \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($pdfTemplate->getFile()->getOriginalResource()->getPublicUrl()); */
					$filename = $pdfTemplate->getFile()->getOriginalResource()->getPublicUrl();
					if (strpos($filename,"/") == 0) {
						$filename = mb_substr($filename,1);
					}  
					if ($pdfTemplate && $pdfTemplate->getUid() && \nn\t3::File()->exists($filename)) {						
						$pdfTemplateFile = $pdfTemplate->getFile()->getOriginalResource()->getPublicUrl();
						$pdfFileName = $pdfTemplate->getFile()->getOriginalResource()->getName();
					} else {
						$pdfTemplateFile = null;
						$pdfFileName = null;
					}

					$htmlTemplateUid = $this->settings['htmltemplate'];
					/** @var HtmlTemplate $pdfTemplate */
					$htmlTemplate = $this->htmlTemplateRepository->findByUid($htmlTemplateUid);
					/** print \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($htmlTemplate);	*/
					$filename = $htmlTemplate->getFile()->getOriginalResource()->getPublicUrl();
					if (strpos($filename,"/") == 0) {
						$filename = mb_substr($filename,1);
					}  		
					$htmlTemplateFile =
						$htmlTemplate && $htmlTemplate->getUid() && \nn\t3::File()->exists($filename)
							? $htmlTemplate->getFile()->getOriginalResource()->getPublicUrl()
							: null;
					
					$mpdf = $this->pdfService->generate($pdfTemplateFile, $htmlTemplateFile, $fortbildung);

					$filename = $this->settings['ablageordner'] . 'vorschlag.pdf';
					$tempFile = \nn\t3::File()->absPath($filename);
					$tempFileUnique = \nn\t3::File()->uniqueFilename($tempFile);   
					$mpdf->OutputFile($tempFileUnique);
					$file = \nn\t3::Fal()->createSysFile($tempFileUnique); 

					$this->view->assign('fortbildung', $fortbildung);
					$this->view->assign('datei', $file);
				} else {
					$this->addFlashMessage('Sie haben keine Berechtigung die Aktion auszuführen.');	
				}
			} else {
				$this->addFlashMessage('Benutzer nicht eingeloggt.');
			}		
        }
		return $this->htmlResponse();
					
    }
	/**
     * action export
     * 
     * @return void
     */
    public function exportAction(): ResponseInterface	
	{

		$demand = $this->FortbildungDemandFactory->createDemandObjectFromSettings($this->settings);				
		$fortbildungen = $this->DatenbankRepository->findFortbildungFma($demand);
		if (!is_null($fortbildungen)) {
			$fieldsstack[] = 'eingereicht von';
			$fieldsstack[] = 'eingereicht für';
			$fieldsstack[] = 'Thema';
			$fieldsstack[] = 'Fach';
			$fieldsstack[] = 'Zielgruppe';
			$fieldsstack[] = 'Inhalt';
			$fieldsstack[] = 'Referent';			
			$fieldsstack[] = 'erstellt am';
			$fieldsstack[] = 'letzte Änderung';			
			$recordsstack[] = $fieldsstack;			
			foreach ($fortbildungen as $fortbildung)
			{

				$fieldsstack=[];
				$fieldsstack[] = $fortbildung['kurzbezeichnung'] . '(' . $fortbildung['nummer'] . ')';
				$fieldsstack[] = $fortbildung['bezeichnung'];
				$fieldsstack[] = $fortbildung['thema'];
				$fieldsstack[] = $fortbildung['fach'];
				$fieldsstack[] = $fortbildung['zielgruppe'];
				$fieldsstack[] = $fortbildung['inhalt'];
				$fieldsstack[] = $fortbildung['referent'];
				$intcrdate = (int)$fortbildung['crdate'];
				$fieldsstack[] = date("d.m.Y",$intcrdate);
				$inttstamp = (int)$fortbildung['tstamp'];
				$fieldsstack[] = date("d.m.Y",$inttstamp);
				$recordsstack[] = $fieldsstack; 				
			}
 
			$this->CsvService->setData($recordsstack);
		
			$this->CsvService->saveToOutput('export_fortbildungen');			
		}

		return (new ForwardResponse('listfma'))
			->withControllerName(('Fortbildung'))
			->withExtensionName('bfbn'); 
	}	
	
}
