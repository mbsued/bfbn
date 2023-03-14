<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_elite',
        'label' => 'instname',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
			'fe_group' => 'fe_group'
        ],
        'searchFields' => 'instname,schulnummer',
        'iconfile' => 'EXT:bfbn/Resources/Public/Icons/tx_bfbn_domain_model_abfrage.svg'
    ],
    'interface' => [
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, institution, instname, schulnummer, inststrasse, instplz, instort, instperson, insttelefon, instemail, nachname, vorname, geschlecht, gebdat, gebort, strasse, plz, ort, telefon, email, ndhoch, ndabprf, jgst, ar, fach3, fach4, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
	
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
                    ['', 0],
                ],
                'foreign_table' => 'tx_bfbn_domain_model_elite',
                'foreign_table_where' => 'AND {#tx_bfbn_domain_model_elite}.{#pid}=###CURRENT_PID### AND {#tx_bfbn_domain_model_elite}.{#sys_language_uid} IN (-1,0)',
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
                        0 => '',
                        1 => '',
                        'invertStateDisplay' => true
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
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
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
        'fe_group' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.fe_group',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'size' => 5,
                'maxitems' => 20,
                'items' => [
                    [
                        'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.hide_at_login',
                        -1,
                    ],
                    [
                        'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.any_login',
                        -2,
                    ],
                    [
                        'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.usergroups',
                        '--div--',
                    ],
                ],
                'exclusiveKeys' => '-1,-2',
                'foreign_table' => 'fe_groups',
                'foreign_table_where' => 'ORDER BY fe_groups.title',
            ],
        ],
        'institution' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_elite.institution',
            'config' => [
                'type' => 'input',
                'size' => 30,
				'max' => 255,
                'eval' => 'required,trim'
            ],
        ],
        'instname' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_elite.instname',
            'config' => [
                'type' => 'input',
                'size' => 30,
				'max' => 255,
                'eval' => 'required,trim'
            ],
        ],
        'schulnummer' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_elite.schulnummer',
            'config' => [
                'type' => 'input',
                'size' => 4,
				'min' => 4,
				'max' => 4,
                'eval' => 'trim'
            ],
        ],
        'inststrasse' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_elite.inststrasse',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'required,trim'
            ],
        ],
        'instplz' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_elite.instplz',
            'config' => [
                'type' => 'input',
                'size' => 5,
				'max' => 5,
				'min' => 5,
                'eval' => 'required,trim'
            ],
        ],
        'instort' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_elite.instort',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'required,trim'
            ],
        ],
        'instperson' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_elite.instperson',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'required,trim'
            ],
        ],
        'insttelefon' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_elite.insttelefon',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'required,trim'
            ],
        ],
        'instemail' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_elite.instemail',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'required,trim'
            ],
        ],
        'nachname' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_elite.nachname',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'required,trim'
            ],
        ],
        'vorname' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_elite.vorname',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'required,trim'
            ],
        ],
        'geschlecht' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_elite.geschlecht',
            'config' => [
                'type' => 'input',
                'size' => 10,
                'eval' => 'required,trim'
            ],
        ],
        'gebdat' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_elite.gebdat',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'required,trim'
            ],
        ],
        'gebort' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_elite.gebort',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'required,trim'
            ],
        ],
        'strasse' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_elite.strasse',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'required,trim'
            ],
        ],
        'plz' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_elite.plz',
            'config' => [
                'type' => 'input',
                'size' => 5,
                'eval' => 'required,trim'
            ],
        ],
		'ort' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_elite.ort',
            'config' => [
                'type' => 'input',
                'size' => 30,				
                'eval' => 'required,trim',
            ],
        ],
        'telefon' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_elite.telefon',
            'config' => [
                'type' => 'input',
                'size' => 30,				
                'eval' => 'required,trim',
            ],
        ],
        'email' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_elite.email',
            'config' => [
                'type' => 'input',
                'size' => 30,				
                'eval' => 'required,trim',
            ],
        ],
        'ndhoch' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_elite.ndhoch',
            'config' => [
                'type' => 'input',
                'size' => 4,				
                'eval' => 'required,trim',
            ],
        ],
        'ndabprf' => [
            'exclude' => true,			
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_elite.ndabprf',
            'config' => [
                'type' => 'input',
                'size' => 4,				
                'eval' => 'required,trim',
            ],
        ],
        'jgst' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_elite.jgst',
            'config' => [
                'type' => 'input',
                'size' => 2,				
                'eval' => 'trim',
            ],
        ],
        'ar' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_elite.ar',
            'config' => [
                'type' => 'input',
                'size' => 30,				
                'eval' => 'trim',
            ],
        ],		
        'fach3' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_elite.fach3',
            'config' => [
                'type' => 'input',
                'size' => 30,				
                'eval' => 'required,trim',
            ],
        ],		
        'fach4' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_elite.fach4',
            'config' => [
                'type' => 'input',
                'size' => 30,				
                'eval' => 'required,trim',
            ],            
        ],
    ],
	'types' => [
        '1' => [
			'showitem' => '
					--palette--;;paletteCore,
				--div--;Person,
					--palette--;;palettePerson,
				--div--;Schulische Daten,
					--palette--;;paletteSchule,				
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
				schulnummer,
				--linebreak--,
				instname,
				--linebreak--,
				inststrasse,instplz,instort,
				--linebreak--,
				instperson,insttelefon,instemail'
		],
		'palettePerson' => [
			'showitem' =>
				'nachname,vorname,geschlecht,	
				--linebreak--,
				gebdat, gebort,
				--linebreak--,
				plz,ort,strasse,
				--linebreak--,
				telefon,email'
		],
		'paletteSchule' => [
			'showitem' => 
				'ndhoch,ndabprf,
				--linebreak--,
				jgst,ar,
				--linebreak--,
				fach3,fach4'	
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
    ],
];
