<?php

$ll = 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:';
$ll_core = 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:';

return [
    'ctrl' => [
        'title' => $ll . 'tx_bfbn_domain_model_funktion',
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
                'foreign_table' => 'tx_bfbn_domain_model_funktion',
                'foreign_table_where' => 'AND {#tx_bfbn_domain_model_funktion}.{#pid}=###CURRENT_PID### AND {#tx_bfbn_domain_model_funktion}.{#sys_language_uid} IN (-1,0)',
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
                    ],
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
                ],
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
                ],
            ],
        ],
        'bezeichnung' => [
            'exclude' => true,
            'label' => $ll . 'tx_bfbn_domain_model_funktion.bezeichnung',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'art' => [
            'exclude' => true,
			'onChange' => 'reload',
            'label' => $ll . 'tx_bfbn_domain_model_funktion.art',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_bfbn_domain_model_funktionart',
                'default' => 1,
                'minitems' => 1,
                'maxitems' => 1,
            ],            
        ],
        'sorting' => [
            'exclude' => true,
            'label' => $ll . 'tx_bfbn_domain_model_funktion.sorting',
            'config' => [
                'type' => 'input',
                'size' => 3,
                'eval' => 'trim'
            ],
        ],
        'anzahl' => [
            'exclude' => true,
			'displayCond' => 'FIELD:art:IN:5,7,9',
            'label' => $ll . 'tx_bfbn_domain_model_funktion.anzahl',
            'config' => [
				'type' => 'number',
				'range' => [
					'lower' => 1,
					'upper' => 9,
				],
				'slider' => [
					'step' => 1,
				],
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
				'art,
				--linebreak--,
				bezeichnung,
				--linebreak--,
				sorting,
				--linebreak--,
				anzahl'
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
