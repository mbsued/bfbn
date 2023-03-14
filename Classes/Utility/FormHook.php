<?php

namespace OliverBauer\Bfbn\Utility;

/**
 * This file is part of the "bfbn" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use OliverBauer\Bfbn\Service\AccessControlService;
use OliverBauer\Bfbn\Domain\Repository\InstitutionRepository;
use OliverBauer\Bfbn\Domain\Repository\FrontendUserRepository;
 
 class FormHook
{
    /**
     * InstitutionRepository
     * 
     * @var \OliverBauer\Bfbn\Domain\Repository\InstitutionRepository 	 
     */	 
    private $InstitutionRepository = null;
	
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
     * 
     * @param \OliverBauer\Bfbn\Service\AccessControlService $AccessControlService
     * @param \OliverBauer\Bfbn\Domain\Repository\FrontendUserRepository $FrontendUserRepository
     * @param \OliverBauer\Bfbn\Domain\Repository\InstitutionRepository $InstitutionRepository
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