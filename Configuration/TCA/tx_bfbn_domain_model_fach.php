<?php

$ll = 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:';
$ll_core = 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:';

return [
    'ctrl' => [
        'title' => $ll.'tx_bfbn_domain_model_fach',
        'label' => 'bezeichnung',
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
        'searchFields' => 'bezeichnung',
        'iconfile' => 'EXT:bfbn/Resources/Public/Icons/tx_bfbn_domain_model_datensatz.svg'
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
                'foreign_table' => 'tx_bfbn_domain_model_fach',
                'foreign_table_where' => 'AND {#tx_bfbn_domain_model_fach}.{#pid}=###CURRENT_PID### AND {#tx_bfbn_domain_model_fach}.{#sys_language_uid} IN (-1,0)',
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

        'bezeichnung' => [
            'exclude' => true,
            'label' => $ll.'tx_bfbn_domain_model_fach.bezeichnung',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'anzeigefachberatung' => [
            'exclude' => true,
            'label' => $ll.'tx_bfbn_domain_model_fach.anzeigefachberatung',
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
		'bild' => [
			'label' => $ll_core . 'LGL.images',
			'config' =>  [
				'type' => 'file',
				'appearance' => [
					'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference',
					'fileUploadAllowed' => false,
					'fileByUrlAllowed' => false,					
				],
				'allowed' => 'common-image-types',
			], 
		],		
        'sorting' => [
            'exclude' => true,
            'label' => $ll.'tx_bfbn_domain_model_fach.sorting',
            'config' => [
                'type' => 'input',
                'size' => 3,
                'eval' => 'trim'
            ],
        ],
        'pageuidfach' => [
            'exclude' => true,
            'label' => $ll.'tx_bfbn_domain_model_fach.pageuidfach',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectTree',
				'foreign_table' => 'pages',
				'foreign_table_where' => 'ORDER BY pages.sorting',
				'size' => 20,
				'treeConfig' => [ 
					'parentField' => 'pid',
					'appearance' => [ 
						'expandAll' => true,
						'showHeader' => true,
					],
				],
            ],     
        ],
        'personen' => [
            'exclude' => true,
            'label' => $ll.'tx_bfbn_domain_model_fach.personen',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_bfbn_domain_model_person',
                'foreign_table_where' => 'AND ({#tx_bfbn_domain_model_person}.{#pid}=69 OR {#tx_bfbn_domain_model_person}.{#pid}=37)',			
                'MM' => 'tx_bfbn_person_fach_mm',
				'MM_opposite_field' => 'faecher',
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
    ],
	'types' => [
        '1' => [
			'showitem' => '
					--palette--;;paletteCore,
				--div--;Bild und Seite,
					--palette--;;paletteBild,
				--div--;Personen,
					--palette--;;palettePersonen,					
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
				'bezeichnung,
				--linebreak--,
				anzeigefachberatung, sorting'
		],
		'paletteBild' => [
			'showitem' => 
				'bild,
				--linebreak--,
				pageuidfach'
		],
		'palettePersonen' => [
			'showitem' => 
				'personen'
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
