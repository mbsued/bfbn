<?php

namespace MbFosbos\Bfbn\Utility;

/**
 * This file is part of the "bfbn" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use MbFosbos\Bfbn\Service\AccessControlService;
use MbFosbos\Bfbn\Domain\Repository\InstitutionRepository;
use MbFosbos\Bfbn\Domain\Repository\FrontendUserRepository;
 
 class FormHook
{
    /**
     * InstitutionRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\InstitutionRepository 	 
     */	 
    private $InstitutionRepository = null;
	
	/**
     * UserRepository
     * 
     * @var \MbFosbos\Bfbn\Domain\Repository\FrontendUserRepository
     */
    private $FrontendUserRepository = null;	
	
	/**
	 * @var \MbFosbos\Bfbn\Service\AccessControlService
	 */	
	private $AccessControlService;

	/**
     * 
     * @param \MbFosbos\Bfbn\Service\AccessControlService $AccessControlService
     * @param \MbFosbos\Bfbn\Domain\Repository\FrontendUserRepository $FrontendUserRepository
     * @param \MbFosbos\Bfbn\Domain\Repository\InstitutionRepository $InstitutionRepository
     */	 
    public function __construct(AccessControlService $AccessControlService, FrontendUserRepository $FrontendUserRepository, InstitutionRepository $InstitutionRepository)
    {
        $this->AccessControlService = $AccessControlService;
        $this->FrontendUserRepository = $FrontendUserRepository;
        $this->InstitutionRepository = $InstitutionRepository;
    }
	
	/**
	* @param \TYPO3\CMS\Form\Domain\Model\Renderable\RenderableInterface $renderable
	* @return void
	*/	
	public function afterBuildingFinished(\TYPO3\CMS\Form\Domain\Model\Renderable\RenderableInterface $renderable)
	{
		if (method_exists($renderable, 'getUniqueIdentifier') && $renderable->getUniqueIdentifier() === 'anmeldung-Elite-341-schulnummer')  {
			if ($this->AccessControlService->hasLoggedInFrontendUser()) {
				$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
				$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
				if (!is_null($gesuchteinstitution)) {	
					$renderable->setDefaultValue($gesuchteinstitution->getNummer());
				}				
			} 
		} 
		if (method_exists($renderable, 'getUniqueIdentifier') && $renderable->getUniqueIdentifier() === 'anmeldung-Elite-341-instname')  {
			if ($this->AccessControlService->hasLoggedInFrontendUser()) {
				$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
				$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
				if (!is_null($gesuchteinstitution)) {	
					$renderable->setDefaultValue($gesuchteinstitution->getBezeichnung());
				}				
			} 
		}
		if (method_exists($renderable, 'getUniqueIdentifier') && $renderable->getUniqueIdentifier() === 'anmeldung-Elite-341-inststrasse')  {
			if ($this->AccessControlService->hasLoggedInFrontendUser()) {
				$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
				$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
				if (!is_null($gesuchteinstitution)) {	
					$renderable->setDefaultValue($gesuchteinstitution->getStrasse());
				}				
			} 
		}
		if (method_exists($renderable, 'getUniqueIdentifier') && $renderable->getUniqueIdentifier() === 'anmeldung-Elite-341-instplz')  {
			if ($this->AccessControlService->hasLoggedInFrontendUser()) {
				$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
				$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
				if (!is_null($gesuchteinstitution)) {	
					$renderable->setDefaultValue($gesuchteinstitution->getPlz());
				}				
			} 
		}
		if (method_exists($renderable, 'getUniqueIdentifier') && $renderable->getUniqueIdentifier() === 'anmeldung-Elite-341-instort')  {
			if ($this->AccessControlService->hasLoggedInFrontendUser()) {
				$user=$this->FrontendUserRepository->findByUid($this->AccessControlService->getFrontendUserUid());				 
				$gesuchteinstitution = $this->InstitutionRepository->findByUid($user->getCompany());
				if (!is_null($gesuchteinstitution)) {	
					$renderable->setDefaultValue($gesuchteinstitution->getOrt());
				}				
			} 
		}		
    }	
}