<?php

$ll = 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:';
$ll_core = 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:';

return [
    'ctrl' => [
        'title' => $ll . 'tx_bfbn_domain_model_unfallstatistik',
        'label' => 'institution',
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
        'searchFields' => 'institution',
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
                'foreign_table' => 'tx_bfbn_domain_model_unfallstatistik',
                'foreign_table_where' => 'AND {#tx_bfbn_domain_model_unfallstatistik}.{#pid}=###CURRENT_PID### AND {#tx_bfbn_domain_model_unfallstatistik}.{#sys_language_uid} IN (-1,0)',
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
        'schueler' => [
            'exclude' => true,
            'label' => $ll . 'tx_bfbn_domain_model_unfallstatistik.schueler',
            'config' => [
                'type' => 'number',
                'size' => 2,
                'required' => 'true',
				'default' => 0,
            ],
        ],
        'unterricht' => [
            'exclude' => true,
            'label' => $ll . 'tx_bfbn_domain_model_unfallstatistik.unterricht',
            'config' => [
                'type' => 'number',
                'size' => 2,
                'required' => 'true',
				'default' => 0,				
            ],
        ],
        'sport' => [
            'exclude' => true,
            'label' => $ll . 'tx_bfbn_domain_model_unfallstatistik.sport',
            'config' => [
                'type' => 'number',
                'size' => 2,
                'required' => 'true',
				'default' => 0,
            ],
        ],
        'pause' => [
            'exclude' => true,
            'label' => $ll . 'tx_bfbn_domain_model_unfallstatistik.pause',
            'config' => [
                'type' => 'number',
                'size' => 2,
                'required' => 'true',
				'default' => 0,
            ],            
        ],
        'schulweg' => [
            'exclude' => true,
            'label' => $ll . 'tx_bfbn_domain_model_unfallstatistik.schulweg',
            'config' => [
                'type' => 'number',
                'size' => 2,
                'required' => 'true',
				'default' => 0,
            ]
        ],
        'schulwegpolizei' => [
            'exclude' => true,
            'label' => $ll . 'tx_bfbn_domain_model_unfallstatistik.schulwegpolizei',
            'config' => [
                'type' => 'number',
                'size' => 2,
                'required' => 'true',
				'default' => 0,
            ]
        ],
        'sonstige' => [
            'exclude' => true,
            'label' => $ll . 'tx_bfbn_domain_model_unfallstatistik.sonstige',
            'config' => [
                'type' => 'number',
                'size' => 2,
                'required' => 'true',
				'default' => 0,
            ],
        ],		
        'institution' => [
            'exclude' => true,
            'label' => $ll . 'tx_bfbn_domain_model_unfallstatistik.institution',
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
				schueler,
				--linebreak--,
				unterricht,sport,pause,
				--linebreak--,
				schulweg,schulwegpolizei,sonstige'
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
