<?php

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
   'tx_bfbn_domain_model_institution',
   'categories'
);
return [
    'ctrl' => [
        'title' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_institution',
        'label' => 'nummer',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime'
        ],
		'type' => 'art:uid',
        'searchFields' => 'bezeichnung,kurzbezeichnung,nummer,',
        'iconfile' => 'EXT:bfbn/Resources/Public/Icons/tx_bfbn_domain_model_institution.svg'
    ],
    'interface' => [
    ],
    'types' => [
		'1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, bezeichnung, kurzbezeichnung, nummer, strasse, plz, ort, telefon, fax, email, homepage, laengengrad, breitengrad, regierungsbezirk, mbbezirk, status, art, personen,--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
        '2' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, bezeichnung, kurzbezeichnung, nummer, strasse, plz, ort, bezeichnungfos, kurzbezeichnungfos, nummerfos, bezeichnungbos, kurzbezeichnungbos, nummerbos, telefon, fax, email, homepage, laengengrad, breitengrad, vorklassefos, vorklassebos, vorkursfos, vorkursbos, bosteilzeit, dbfh, profilinklusion, ivk, regierungsbezirk, mbbezirk, mbbezirk2, status, art, vorkursartbos, vorkurstagbos, vorkursartfos, vorkurstagfos, ausbildungsrichtungen, sprachen, sprachenintw, personen, hinweis, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
        '3' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, bezeichnung, kurzbezeichnung, nummer, strasse, plz, ort, bezeichnungfos, kurzbezeichnungfos, nummerfos, telefon, fax, email, homepage, laengengrad, breitengrad, vorklassefos, vorkursfos, vorkursartfos, vorkurstagfos, dbfh, profilinklusion, ivk, regierungsbezirk, mbbezirk, mbbezirk2, status, art, ausbildungsrichtungen, sprachen, sprachenintw, personen, hinweis, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
        '4' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, bezeichnung, kurzbezeichnung, nummer, strasse, plz, ort, bezeichnungbos, kurzbezeichnungbos, nummerbos, telefon, fax, email, homepage, laengengrad, breitengrad, vorklassebos, vorkursbos, vorkursartbos, vorkurstagbos, bosteilzeit, profilinklusion, ivk, regierungsbezirk, mbbezirk, mbbezirk2, status, art, ausbildungsrichtungen, sprachen, sprachenintw, personen, hinweis, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],	
	],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'language',
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    0 => [
                        'label' => '',
                        'value' => 0,
                    ],
                ],
                'foreign_table' => 'tx_bfbn_domain_model_institution',
                'foreign_table_where' => 'AND {#tx_bfbn_domain_model_institution}.{#pid}=###CURRENT_PID### AND {#tx_bfbn_domain_model_institution}.{#sys_language_uid} IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        'label' => '',
                        'invertStateDisplay' => true
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'datetime', 
                'format' => 'datetime',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'datetime',
                'format' => 'datetime',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
        'bezeichnung' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_institution.bezeichnung',
            'config' => [
                'type' => 'input',
                'size' => 30,
				'max' => 255,
                'eval' => 'trim',
				'required' => 'true',
            ],
        ],
        'kurzbezeichnung' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_institution.kurzbezeichnung',
            'config' => [
                'type' => 'input',
                'size' => 30,
				'max' => 255,
                'eval' => 'trim',
				'required' => 'true',
            ],
        ],
        'nummer' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_institution.nummer',
            'config' => [
                'type' => 'input',
                'size' => 4,
				'min' => 4,
				'max' => 4,
                'eval' => 'trim',
				'required' => 'true',
            ],
        ],
        'strasse' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_institution.strasse',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
				'required' => 'true',
            ],
        ],
        'plz' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_institution.plz',
            'config' => [
                'type' => 'input',
                'size' => 5,
				'max' => 5,
				'min' => 5,
                'eval' => 'trim',
				'required' => 'true',
            ],
        ],
        'ort' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_institution.ort',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
				'required' => 'true',
            ],
        ],
        'bezeichnungfos' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_institution.bezeichnungfos',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'kurzbezeichnungfos' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_institution.kurzbezeichnungfos',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'nummerfos' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_institution.nummerfos',
            'config' => [
                'type' => 'input',
                'size' => 4,
				'min' => 4,
				'max' => 4,
                'eval' => 'trim'
            ],
        ],
        'bezeichnungbos' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_institution.bezeichnungbos',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'kurzbezeichnungbos' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_institution.kurzbezeichnungbos',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'nummerbos' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_institution.nummerbos',
            'config' => [
                'type' => 'input',
                'size' => 30,
				'min' => 4,
				'max' => 4,
                'eval' => 'trim'
            ],
        ],
        'telefon' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_institution.telefon',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
				'required' => 'true',
            ],
        ],
        'fax' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_institution.fax',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
				'required' => 'true',
            ],
        ],
        'email' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_institution.email',
            'config' => [
                'type' => 'email',
                'size' => 30,
				'required' => 'true',
            ],
        ],
        'homepage' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_institution.homepage',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
				'required' => 'true',
            ],
        ],
		'breitengrad' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_institution.breitengrad',
            'config' => [
                'type' => 'input',
                'eval' => \MbFosbos\Bfbn\Evaluation\LatitudeEvaluation::class,
                'default' => null,
            ],
        ],
        'laengengrad' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_institution.laengengrad',
            'config' => [
                'type' => 'input',
                'eval' => \MbFosbos\Bfbn\Evaluation\LatitudeEvaluation::class,
                'default' => null,
            ],
        ],
        'vorklassefos' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_institution.vorklassefos',
			'config' => [
                'type' => 'check',
				'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        'label' => '',
                    ]
                ],
                'default' => 0,
            ],
        ],
        'vorklassebos' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_institution.vorklassebos',
            'config' => [
                'type' => 'check',
				'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        'label' => '',
                    ]
                ],
                'default' => 0,
            ],
        ],
        'vorkursfos' => [
            'exclude' => true,
			'onChange' => 'reload',			
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_institution.vorkursfos',
            'config' => [
                'type' => 'check',
				'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        'label' => '',
                    ]
                ],
                'default' => 0,
            ],
        ],
        'vorkursbos' => [
            'exclude' => true,
			'onChange' => 'reload',
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_institution.vorkursbos',
            'config' => [
                'type' => 'check',
				'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        'label' => '',
                    ]
                ],
                'default' => 0,
            ],
        ],
        'bosteilzeit' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_institution.bosteilzeit',
            'config' => [
                'type' => 'check',
				'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        'label' => '',
                    ]
                ],
                'default' => 0,
            ],
        ],		
        'dbfh' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_institution.dbfh',
            'config' => [
                'type' => 'check',
				'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        'label' => '',
                    ]
                ],
                'default' => 0,
            ],
        ],
        'profilinklusion' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_institution.profilinklusion',
            'config' => [
                'type' => 'check',
				'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        'label' => '',
                    ]
                ],
                'default' => 0,
            ],
        ],
        'ivk' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_institution.ivk',
            'config' => [
                'type' => 'check',
				'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        'label' => '',
                    ]
                ],
                'default' => 0,
            ],
        ],		
        'regierungsbezirk' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_institution.regierungsbezirk',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_bfbn_domain_model_regierungsbezirk',
                'default' => 1,
                'minitems' => 1,
                'maxitems' => 1,
            ],
            
        ],
        'mbbezirk' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_institution.mbbezirk',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_bfbn_domain_model_mbbezirk',
                'default' => 1,
                'minitems' => 1,
                'maxitems' => 1,
            ],
            
        ],
        'mbbezirk2' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_institution.mbbezirk2',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    0 => [
                        'label' => 'kein Eintrag',
                        'value' => 0,
                    ],
                ],				
                'foreign_table' => 'tx_bfbn_domain_model_mbbezirk',
                'default' => 0,
                'minitems' => 1,
                'maxitems' => 1,
            ],
            
        ],		
        'status' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_institution.status',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_bfbn_domain_model_institutionstatus',
                'default' => 1,
                'minitems' => 1,
                'maxitems' => 1,
            ],
            
        ],
        'art' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_institution.art',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_bfbn_domain_model_institutionart',
                'default' => 1,
                'minitems' => 1,
                'maxitems' => 1,
            ],
            
        ],
        'vorkursartbos' => [
			'displayCond' => 'FIELD:vorkursbos:REQ:true',
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_institution.vorkursartbos',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_bfbn_domain_model_vorkursart',
                'default' => 1,
                'minitems' => 1,
                'maxitems' => 1,
            ],
		],	
        'vorkurstagbos' => [
			'displayCond' => 'FIELD:vorkursbos:REQ:true',
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_institution.vorkurstagbos',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_bfbn_domain_model_vorkurstag',
                'default' => 1,
                'minitems' => 1,
                'maxitems' => 1,
            ],            
        ],
        'vorkursartfos' => [
			'displayCond' => 'FIELD:vorkursfos:REQ:true',
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_institution.vorkursartfos',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_bfbn_domain_model_vorkursart',
                'default' => 1,
                'minitems' => 1,
                'maxitems' => 1,
            ],
		],	
        'vorkurstagfos' => [
			'displayCond' => 'FIELD:vorkursfos:REQ:true',
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_institution.vorkurstagfos',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_bfbn_domain_model_vorkurstag',
                'default' => 1,
                'minitems' => 1,
                'maxitems' => 1,
            ],            
        ],		
        'ausbildungsrichtungen' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_institution.ausbildungsrichtungen',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_bfbn_domain_model_institutionausbildungsrichtung',
                'MM' => 'tx_bfbn_institution_institutionausbildungsrichtung_mm',
                'size' => 10,
                'autoSizeMax' => 30,
                'maxitems' => 9999,
                'multiple' => 0,
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false,
                    ],
                    'addRecord' => [
                        'disabled' => false,
                    ],
                    'listModule' => [
                        'disabled' => true,
                    ],
                ],
            ],
            
        ],
        'sprachen' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_institution.sprachen',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectCheckBox',
                'foreign_table' => 'tx_bfbn_domain_model_institutionsprache',
                'MM' => 'tx_bfbn_institution_institutionsprache_mm',
            ],         
        ],
        'sprachenintw' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_institution.sprachenintw',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectCheckBox',
                'foreign_table' => 'tx_bfbn_domain_model_spracheintw',
                'MM' => 'tx_bfbn_institution_spracheintw_mm',
            ],         
        ],		
        'personen' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_institution.personen',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_bfbn_domain_model_person',
                'MM' => 'tx_bfbn_institution_person_mm',
                'size' => 10,
                'autoSizeMax' => 30,
                'maxitems' => 9999,
                'multiple' => 0,
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false,
                    ],
                    'addRecord' => [
                        'disabled' => false,
                    ],
                    'listModule' => [
                        'disabled' => true,
                    ],
                ],
            ],
            
        ],
        'bearbeiter' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_institution.bearbeiter',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'fe_users',
                'MM' => 'tx_bfbn_institution_bearbeiter_mm',
                'size' => 10,
                'autoSizeMax' => 30,
                'maxitems' => 9999,
                'multiple' => 0,
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false,
                    ],
                    'addRecord' => [
                        'disabled' => false,
                    ],
                    'listModule' => [
                        'disabled' => true,
                    ],
                ],
            ],
            
        ],		
        'hinweis' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_institution.hinweis',
            'config' => [
                'type' => 'input',
                'size' => 30,
				'max' => 255,
                'eval' => 'trim'
            ],
        ],	
    ],
	'types' => [
        '1' => [
			'showitem' => '
					--palette--;;paletteCore,
				--div--;Kontakt,
					--palette--;;paletteContact,
				--div--;Status,
					--palette--;;paletteStatus,
				--div--;Personen,
					--palette--;;palettePersonen,					
				--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                    --palette--;;paletteLanguage,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                    --palette--;;paletteHidden,
                    --palette--;;paletteAccess,'
				],
        '2' => [
			'showitem' => '
					--palette--;;paletteCore,
					--palette--;;paletteFOSBOS,
				--div--;Kontakt,
					--palette--;;paletteContact,
				--div--;Status,
					--palette--;;paletteStatus,
				--div--;Ausbildungsrichtungen,
					--palette--;;paletteAusbildungsrichtungen,
				--div--;Sprachenangebot,
					--palette--;;paletteSprachenangebot,
				--div--;Personen,
					--palette--;;palettePersonen,
				--div--;Bearbeiter,
					--palette--;;paletteBearbeiter,					
				--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                    --palette--;;paletteLanguage,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                    --palette--;;paletteHidden,
                    --palette--;;paletteAccess,'
				],
        '3' => [
			'showitem' => '
					--palette--;;paletteCore,
					--palette--;;paletteFOS,
				--div--;Kontakt,
					--palette--;;paletteContact,
				--div--;Status,
					--palette--;;paletteStatus,
				--div--;Ausbildungsrichtungen,
					--palette--;;paletteAusbildungsrichtungen,
				--div--;Sprachenangebot,
					--palette--;;paletteSprachenangebot,
				--div--;Personen,				
					--palette--;;palettePersonen,
				--div--;Bearbeiter,
					--palette--;;paletteBearbeiter,					
				--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                    --palette--;;paletteLanguage,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                    --palette--;;paletteHidden,
                    --palette--;;paletteAccess,'
				],
        '4' => [
			'showitem' => '
					--palette--;;paletteCore,
					--palette--;;paletteBOS,
				--div--;Kontakt,
					--palette--;;paletteContact,
				--div--;Status,
					--palette--;;paletteStatus,
				--div--;Ausbildungsrichtungen,
					--palette--;;paletteAusbildungsrichtungen,
				--div--;Sprachenangebot,
					--palette--;;paletteSprachenangebot,
				--div--;Personen,
					--palette--;;palettePersonen,
				--div--;Bearbeiter,
					--palette--;;paletteBearbeiter,					
				--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                    --palette--;;paletteLanguage,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                    --palette--;;paletteHidden,
                    --palette--;;paletteAccess,'
				],				
    ],		
	'palettes' => [
		'paletteCore' => [
			'showitem' => 
				'art,
				--linebreak--,
				nummer,
				--linebreak--,
				bezeichnung,
				--linebreak--,
				kurzbezeichnung'
		],
		'paletteFOSBOS' => [
			'showitem' => 
				'nummerfos,nummerbos,				
				--linebreak--,
				bezeichnungfos,bezeichnungbos,
				--linebreak--,
				kurzbezeichnungfos,kurzbezeichnungbos,
				--linebreak--,
				vorklassefos,vorklassebos,dbfh,profilinklusion,
				--linebreak--,
				vorkursfos,vorkursartfos,vorkurstagfos,ivk,
				--linebreak--,
				vorkursbos,vorkursartbos,vorkurstagbos,bosteilzeit,
				--linebreak--,
				hinweis'	
		],
		'paletteFOS' => [
			'showitem' => 
				'nummerfos,				
				--linebreak--,
				bezeichnungfos,
				--linebreak--,
				kurzbezeichnungfos,
				--linebreak--,
				vorklassefos,vorkursfos,vorkursartfos,vorkurstagfos,
				--linebreak--,
				dbfh, profilinklusion,ivk,
				--linebreak--,
				hinweis'	
		],
		'paletteBOS' => [
			'showitem' => 
				'nummerbos,				
				--linebreak--,
				bezeichnungbos,
				--linebreak--,
				kurzbezeichnungbos,
				--linebreak--,
				vorklassebos,vorkursbos,vorkursartbos,vorkurstagbos,
				--linebreak--,
				bosteilzeit,profilinklusion,ivk, 
				--linebreak--,
				hinweis'	
		],				
		'paletteContact' => [
			'showitem' => 
				'plz,ort,strasse,
				--linebreak--,
				telefon,fax,
				--linebreak--,
				email,homepage,
				--linebreak--,
				breitengrad,laengengrad'
		],
		'paletteAusbildungsrichtungen' => [
			'showitem' => 
				'ausbildungsrichtungen'	
		],
		'paletteSprachenangebot' => [
			'showitem' => 
				'sprachen,
				--linebreak--,
				sprachenintw'
		],
		'palettePersonen' => [
			'showitem' => 
				'personen'	
		],
		'paletteBearbeiter' => [
			'showitem' => 
				'bearbeiter'	
		],						
		'paletteStatus' => [
			'showitem' => 
				'status,
				--linebreak--,
				regierungsbezirk,
				--linebreak--,
				mbbezirk,
				--linebreak--,
				mbbezirk2'	
		],		
		'paletteHidden' => [
			'showitem' => '
				hidden
			',
		],
		'paletteAccess' => [
			'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access',
			'showitem' => '
				starttime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:starttime_formlabel,
				endtime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:endtime_formlabel,
				--linebreak--,
				fe_group;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:fe_group_formlabel,
				--linebreak--,editlock
			',
		],
		'paletteLanguage' => [
			'showitem' => '
				sys_language_uid;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:sys_language_uid_formlabel,l10n_parent, l10n_diffsource,
			',
		],
		'paletteCategory' => [
			'showitem' => '
				categories
			',
		],
    ],
];
