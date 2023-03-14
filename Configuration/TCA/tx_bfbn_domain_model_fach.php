<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_fach',
        'label' => 'bezeichnung',
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
        ],
        'searchFields' => 'bezeichnung',
        'iconfile' => 'EXT:bfbn/Resources/Public/Icons/tx_bfbn_domain_model_datensatz.svg'
    ],
    'interface' => [        
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, bezeichnung, anzeigefachberatung, bild, sorting, pageuidfach, personen, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
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

        'bezeichnung' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_fach.bezeichnung',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'anzeigefachberatung' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_fach.anzeigefachberatung',
            'config' => [
                'type' => 'check',
				'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        1 => ''
                    ]
                ],
                'default' => 0,
            ]
        ],		
		'bild' => [
			'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.images',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig('bild', [
				'appearance' => [
					'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference',
					'fileUploadAllowed' => false,
					'fileByUrlAllowed' => false,					
				],
				// custom configuration for displaying fields in the overlay/reference table
				// to use the imageoverlayPalette instead of the basicoverlayPalette
				'foreign_types' => [
					// ...
				]
			], $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'])
		],		
        'sorting' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_fach.sorting',
            'config' => [
                'type' => 'input',
                'size' => 3,
                'eval' => 'trim'
            ],
        ],
        'pageuidfach' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_fach.pageuidfach',
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
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_fach.personen',
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
];
