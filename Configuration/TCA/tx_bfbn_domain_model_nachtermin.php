<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_nachtermin',
        'label' => 'nachname',
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
            'endtime' => 'endtime',
        ],
        'searchFields' => 'nachname',
        'iconfile' => 'EXT:bfbn/Resources/Public/Icons/tx_bfbn_domain_model_abfrage.svg'
    ],
    'interface' => [
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, nachname, vorname, geschlecht, geburtsdatum, jahrgangsstufe, ausbildungsrichtung, deutsch, englisch, mathematik, cas, fach4, gruppenpruefung, ergaenzungspruefung, sprache, nachweis,institution, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
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
                'foreign_table' => 'tx_bfbn_domain_model_nachtermin',
                'foreign_table_where' => 'AND {#tx_bfbn_domain_model_nachtermin}.{#pid}=###CURRENT_PID### AND {#tx_bfbn_domain_model_nachtermin}.{#sys_language_uid} IN (-1,0)',
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
        'nachname' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_nachtermin.nachname',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
				'required' => 'true',
            ],
        ],
        'vorname' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_nachtermin.vorname',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
				'required' => 'true',
            ],
        ],
        'geschlecht' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_nachtermin.geschlecht',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_bfbn_domain_model_geschlecht',
                'default' => 1,
                'minitems' => 1,
                'maxitems' => 1,
            ],            
        ],
        'geburtsdatum' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_nachtermin.geburtsdatum',
            'config' => [
                'type' => 'datetime',
				'format' => 'date',
                'size' => 30,
				'required' => 'true',
            ],
        ],		
        'jahrgangsstufe' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_nachtermin.jahrgangsstufe',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_bfbn_domain_model_jahrgangsstufe',
                'default' => 1,
                'minitems' => 1,
                'maxitems' => 1,
            ],
        ],
        'ausbildungsrichtung' => [
            'exclude' => true,
			'onChange' => 'reload',			
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_nachtermin.ausbildungsrichtung',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',			
                'foreign_table' => 'tx_bfbn_domain_model_ausbildungsrichtung',
                'default' => 0,
                'minitems' => 1,
                'maxitems' => 1,
            ],
        ],
        'deutsch' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_nachtermin.deutsch',
            'config' => [
                'type' => 'check',
				'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        'label' => '',
                    ]
                ],
                'default' => 0,
            ]
        ],
        'englisch' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_nachtermin.englisch',
            'config' => [
                'type' => 'check',
				'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        'label' => '',
                    ]
                ],
                'default' => 0,
            ]
        ],
        'mathematik' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_nachtermin.mathematik',
            'config' => [
                'type' => 'check',
				'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        'label' => '',
                    ]
                ],
                'default' => 0,
            ]
        ],
        'cas' => [
            'exclude' => true,
			'displayCond' => 'FIELD:ausbildungsrichtung:=:6',			
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_nachtermin.cas',
            'config' => [
                'type' => 'check',
				'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        'label' => '',
                    ]
                ],
                'default' => 0,
            ]
        ],		
        'fach4' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_nachtermin.fach4',
            'config' => [
                'type' => 'check',
				'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        'label' => '',
                    ]
                ],
                'default' => 0,
            ]
        ],
        'gruppenpruefung' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_nachtermin.gruppenpruefung',
            'config' => [
                'type' => 'check',
				'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        'label' => '',
                    ]
                ],
                'default' => 0,
            ]
        ],
        'ergaenzungspruefung' => [
            'exclude' => true,
			'onChange' => 'reload',
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_nachtermin.ergaenzungspruefung',
            'config' => [
                'type' => 'check',
				'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        'label' => '',
                    ]
                ],
                'default' => 0,
            ]
        ],			
        'sprache' => [
            'exclude' => true,
			'displayCond' => 'FIELD:ergaenzungspruefung:REQ:true',			
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_nachtermin.sprache',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    0 => [
                        'label' => 'kein Eintrag',
                        'value' => 0,
                    ],
                ],				
                'foreign_table' => 'tx_bfbn_domain_model_sprache',
                'default' => 0,
                'minitems' => 1,
                'maxitems' => 1,
            ],
        ],
        'nachweis' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_nachtermin.nachweis',
            'config' => [
                'type' => 'check',
				'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        'label' => '',
                    ]
                ],
                'default' => 0,
            ]
        ],				
        'institution' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_elitepruefer.institution',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_bfbn_domain_model_institution',
                'default' => 1,
                'minitems' => 1,
                'maxitems' => 1,
            ],            
        ],    
    ],
];
