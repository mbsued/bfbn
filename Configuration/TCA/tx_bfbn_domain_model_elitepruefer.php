<?php

$ll = 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:';
$ll_core = 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:';

return [
    'ctrl' => [
        'title' => $ll. 'tx_bfbn_domain_model_elitepruefer',
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
                'foreign_table' => 'tx_bfbn_domain_model_elitepruefer',
                'foreign_table_where' => 'AND {#tx_bfbn_domain_model_elitepruefer}.{#pid}=###CURRENT_PID### AND {#tx_bfbn_domain_model_elitepruefer}.{#sys_language_uid} IN (-1,0)',
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
        'amtsbezeichnung' => [
            'exclude' => true,
            'label' => $ll. 'tx_bfbn_domain_model_elitepruefer.amtsbezeichnung',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],		
        'titel' => [
            'exclude' => true,
            'label' => $ll. 'tx_bfbn_domain_model_elitepruefer.titel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'nachname' => [
            'exclude' => true,
            'label' => $ll. 'tx_bfbn_domain_model_elitepruefer.nachname',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
				'required' => 'true',
            ],
        ],
        'vorname' => [
            'exclude' => true,
            'label' => $ll. 'tx_bfbn_domain_model_elitepruefer.vorname',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
				'required' => 'true',
            ],
        ],
        'geschlecht' => [
            'exclude' => true,
            'label' => $ll. 'tx_bfbn_domain_model_elitepruefer.geschlecht',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_bfbn_domain_model_geschlecht',
                'default' => 1,
                'minitems' => 1,
                'maxitems' => 1,
            ],            
        ],
        'email' => [
            'exclude' => true,
            'label' => $ll. 'tx_bfbn_domain_model_elitepruefer.email',
            'config' => [
                'type' => 'email',
                'size' => 30,
				'required' => 'true',
            ],
        ],
        'bemerkung' => [
            'exclude' => true,
            'label' => $ll. 'tx_bfbn_domain_model_elitepruefer.bemerkung',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],		
        'fach1' => [
            'exclude' => true,
            'label' => $ll. 'tx_bfbn_domain_model_elitepruefer.fach1',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_bfbn_domain_model_fachelite',
                'default' => 1,
                'minitems' => 1,
                'maxitems' => 1,
            ],
        ],
        'fach2' => [
            'exclude' => true,
            'label' => $ll. 'tx_bfbn_domain_model_elitepruefer.fach2',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    0 => [
                        'label' => 'kein Eintrag',
                        'value' => 0,
                    ],
                ],			
                'foreign_table' => 'tx_bfbn_domain_model_fachelite',
                'default' => 0,
                'minitems' => 1,
                'maxitems' => 1,
            ],
        ],
        'fach3' => [
            'exclude' => true,
            'label' => $ll. 'tx_bfbn_domain_model_elitepruefer.fach3',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    0 => [
                        'label' => 'kein Eintrag',
                        'value' => 0,
                    ],
                ],				
                'foreign_table' => 'tx_bfbn_domain_model_fachelite',
                'default' => 0,
                'minitems' => 1,
                'maxitems' => 1,
            ],
        ],		
        'institution' => [
            'exclude' => true,
            'label' => $ll. 'tx_bfbn_domain_model_elitepruefer.institution',
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
				--div--;Fächer und Schule,
					--palette--;;paletteFaecher,					
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
				'nachname,
				--linebreak--,
				vorname,
				--linebreak--,
				titel,				
				--linebreak--,
				amtsbezeichnung,
				--linebreak--,
				geschlecht,
				--linebreak--,				
				email'
		],
		'paletteFaecher' => [
			'showitem' => 
				'fach1, fach2, fach3,
				--linebreak--,
				bemerkung,
				--linebreak--,
				institution,'
		],		
		'paletteLanguage' => [
			'showitem' => '
				sys_language_uid;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:sys_language_uid_formlabel,l10n_parent, l10n_diffsource,
			',
		],		
		'paletteAccess' => [
			'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access',
			'showitem' => '
				starttime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:starttime_formlabel,
				endtime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:endtime_formlabel',
		],
		'paletteHidden' => [
			'showitem' => '
				hidden
			',
		],
	],	
];
