<?php

$ll = 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:';
$ll_core = 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:';

return [
    'ctrl' => [
        'title' => $ll . 'tx_bfbn_domain_model_schulfremdepruefer',
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
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, nachname, vorname, titel, geschlecht, schule, lehrbefaehigung, abschluss, fach1, fach2, fach3, institution, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
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
                'foreign_table' => 'tx_bfbn_domain_model_schulfremdepruefer',
                'foreign_table_where' => 'AND {#tx_bfbn_domain_model_schulfremdepruefer}.{#pid}=###CURRENT_PID### AND {#tx_bfbn_domain_model_schulfremdepruefer}.{#sys_language_uid} IN (-1,0)',
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
        'titel' => [
            'exclude' => true,
            'label' => $ll . 'tx_bfbn_domain_model_schulfremdepruefer.titel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'nachname' => [
            'exclude' => true,
            'label' => $ll . 'tx_bfbn_domain_model_schulfremdepruefer.nachname',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
				'required' => 'true',
            ],
        ],
        'vorname' => [
            'exclude' => true,
            'label' => $ll . 'tx_bfbn_domain_model_schulfremdepruefer.vorname',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
				'required' => 'true',
            ],
        ],
        'geschlecht' => [
            'exclude' => true,
            'label' => $ll . 'tx_bfbn_domain_model_schulfremdepruefer.geschlecht',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_bfbn_domain_model_geschlecht',
                'default' => 1,
                'minitems' => 1,
                'maxitems' => 1,
            ],            
        ],
        'schule' => [
            'exclude' => true,
            'label' => $ll . 'tx_bfbn_domain_model_schulfremdepruefer.schule',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
				'required' => 'true',
            ],
        ],
        'lehrbefaehigung' => [
            'exclude' => true,
            'label' => $ll . 'tx_bfbn_domain_model_schulfremdepruefer.lehrbefaehigung',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
				'required' => 'true',
            ],
        ],		
        'abschluss' => [
            'exclude' => true,
            'label' => $ll . 'tx_bfbn_domain_model_schulfremdepruefer.abschluss',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_bfbn_domain_model_abschluss',
                'default' => 1,
                'minitems' => 1,
                'maxitems' => 1,
            ],
        ],		
        'fach1' => [
            'exclude' => true,
            'label' => $ll . 'tx_bfbn_domain_model_schulfremdepruefer.fach1',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_bfbn_domain_model_fachkurz',
                'default' => 1,
                'minitems' => 1,
                'maxitems' => 1,
            ],
        ],
        'fach2' => [
            'exclude' => true,
            'label' => $ll . 'tx_bfbn_domain_model_schulfremdepruefer.fach2',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    0 => [
                        'label' => '',
                        'value' => 0,
                    ],
                ],				
                'foreign_table' => 'tx_bfbn_domain_model_fachkurz',
                'default' => 1,
                'minitems' => 1,
                'maxitems' => 1,
            ],
        ],
        'fach3' => [
            'exclude' => true,
            'label' => $ll . 'tx_bfbn_domain_model_schulfremdepruefer.fach3',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    0 => [
                        'label' => '',
                        'value' => 0,
                    ],
                ],				
                'foreign_table' => 'tx_bfbn_domain_model_fachkurz',
                'default' => 1,
                'minitems' => 1,
                'maxitems' => 1,
            ],
        ],		
        'institution' => [
            'exclude' => true,
            'label' => $ll . 'tx_bfbn_domain_model_schulfremdepruefer.institution',
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
				--div--;Zuordnung,
					--palette--;;paletteZuordnung,					
				--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,				
                    --palette--;;paletteLanguage,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                    --palette--;;paletteHidden,
                    --palette--;;paletteAccess'					
				],
    ],
	'palettes' => [
		'paletteCore' => [
			'showitem' => 
				'institution,
				--linebreak--,
				nachname,
				--linebreak--,
				vorname,
				--linebreak--,
				titel,				
				--linebreak--,
				geschlecht,
				--lienbreak--,
				schule'
		],
		'paletteZuordnung' => [
			'showitem' => 
				'lehrbefaehigung,
				--linebreak--,
				abschluss,
				--linebreak--,
				fach1,fach2,fach3'
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
