<?php

$ll = 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:';
$ll_core = 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:';

return [
    'ctrl' => [
        'title' => $ll . 'tx_bfbn_domain_model_nachtermin',
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
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => $ll_core . 'LGL.language',
            'config' => [
                'type' => 'language',
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => $ll_core . 'LGL.l18n_parent',
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
            'label' => $ll_core . 'LGL.visible',
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
            'label' => $ll_core . 'LGL.starttime',
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
            'label' => $ll_core . 'LGL.endtime',
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
            'label' => $ll . 'tx_bfbn_domain_model_nachtermin.nachname',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
				'required' => 'true',
            ],
        ],
        'vorname' => [
            'exclude' => true,
            'label' => $ll . 'tx_bfbn_domain_model_nachtermin.vorname',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
				'required' => 'true',
            ],
        ],
        'geschlecht' => [
            'exclude' => true,
            'label' => $ll . 'tx_bfbn_domain_model_nachtermin.geschlecht',
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
            'label' => $ll . 'tx_bfbn_domain_model_nachtermin.geburtsdatum',
            'config' => [
                'type' => 'datetime',
				'format' => 'date',
                'size' => 30,
				'required' => 'true',
            ],
        ],		
        'jahrgangsstufe' => [
            'exclude' => true,
			'onChange' => 'reload',			
            'label' => $ll . 'tx_bfbn_domain_model_nachtermin.jahrgangsstufe',
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
            'label' => $ll . 'tx_bfbn_domain_model_nachtermin.ausbildungsrichtung',
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
            'label' => $ll . 'tx_bfbn_domain_model_nachtermin.deutsch',
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
            'label' => $ll . 'tx_bfbn_domain_model_nachtermin.englisch',
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
            'label' => $ll . 'tx_bfbn_domain_model_nachtermin.mathematik',
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
            'label' => $ll . 'tx_bfbn_domain_model_nachtermin.cas',
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
            'label' => $ll . 'tx_bfbn_domain_model_nachtermin.fach4',
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
            'label' => $ll . 'tx_bfbn_domain_model_nachtermin.gruppenpruefung',
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
			'displayCond' => 'FIELD:jahrgangsstufe:=:3',		
            'exclude' => true,
			'onChange' => 'reload',
            'label' => $ll . 'tx_bfbn_domain_model_nachtermin.ergaenzungspruefung',
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
            'label' => $ll . 'tx_bfbn_domain_model_nachtermin.sprache',
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
            'label' => $ll . 'tx_bfbn_domain_model_nachtermin.nachweis',
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
            'label' => $ll . 'tx_bfbn_domain_model_elitepruefer.institution',
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
	'types' => [
        '1' => [
			'showitem' => '
					--palette--;;paletteCore,
				--div--;Inhalt,
                    --palette--;;paletteContent,					
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
				'institution,
				--linebreak--,
				vorname,nachname,
				--linebreak--,
				geschlecht,geburtsdatum'
		],
		'paletteContent' => [
			'showitem' => 
				'jahrgangsstufe,ausbildungsrichtung,
				--linebreak--,
				deutsch,englisch,mathematik,cas,fach4,
				--linebreak--,
				gruppenpruefung,ergaenzungspruefung,sprache,
				--linebreak--,
				nachweis'
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
		'paletteHidden' => [
			'showitem' => '
				hidden
			',
		],		
    ],		
];
