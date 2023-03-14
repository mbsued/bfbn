<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl',
        'label' => 'institution',
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
        'searchFields' => 'institution',
        'iconfile' => 'EXT:bfbn/Resources/Public/Icons/tx_bfbn_domain_model_abfrage.svg'
    ],
    'interface' => [
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, deutsch1a, deutsch1l, deutsch1e, deutsch1d, deutsch2a, deutsch2l, deutsch2e, deutsch2d, deutsch3a, deutsch3l, deutsch3e, deutsch3d, deutsch4a, deutsch4l, deutsch4e, deutsch4d, deutsch5a, deutsch5l, deutsch5e, deutsch5d, deutsch6a, deutsch6l, deutsch6e, deutsch6d, deutsch7a, deutsch7l, deutsch7e, deutsch7d, mathe1a1, mathe1a2, mathe1b1, mathe1b2, mathe2a1, mathe2a2, mathe2b1, mathe2b2, mathe3a1, mathe3a2, mathe3b1, mathe3b2, mathe4a1, mathe4a2, mathe4b1, mathe4b2, mathe5a1, mathe5a2, mathe5b1, mathe5b2, mathe6a1, mathe6a2, mathe6b1, mathe6b2, mathe7a1, mathe7a2, mathe7b1, mathe7b2, physik1, physik2, physik3, paepsy1, paepsy2, gesuwi1, gesuwi2, gest1, gest2, gest3, schulart, jahrgangsstufe, institution, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
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
                'foreign_table' => 'tx_bfbn_domain_model_aufgabenauswahl',
                'foreign_table_where' => 'AND {#tx_bfbn_domain_model_aufgabenauswahl}.{#pid}=###CURRENT_PID### AND {#tx_bfbn_domain_model_aufgabenauswahl}.{#sys_language_uid} IN (-1,0)',
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

        'deutsch1a' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.deutsch1a',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'deutsch1l' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.deutsch1l',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'deutsch1e' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.deutsch1e',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'deutsch1d' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.deutsch1d',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'deutsch2a' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.deutsch2a',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'deutsch2l' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.deutsch2l',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'deutsch2e' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.deutsch2e',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'deutsch2d' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.deutsch2d',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'deutsch3a' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.deutsch3a',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'deutsch3l' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.deutsch3l',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'deutsch3e' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.deutsch3e',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'deutsch3d' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.deutsch3d',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'deutsch4a' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.deutsch4a',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'deutsch4l' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.deutsch4l',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'deutsch4e' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.deutsch4e',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'deutsch4d' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.deutsch4d',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'deutsch5a' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.deutsch5a',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'deutsch5l' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.deutsch5l',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'deutsch5e' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.deutsch5e',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'deutsch5d' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.deutsch5d',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'deutsch6a' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.deutsch6a',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'deutsch6l' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.deutsch6l',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'deutsch6e' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.deutsch6e',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'deutsch6d' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.deutsch6d',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'deutsch7a' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.deutsch7a',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'deutsch7l' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.deutsch7l',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'deutsch7e' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.deutsch7e',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'deutsch7d' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.deutsch7d',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'mathe1a1' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.mathe1a1',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'mathe1a2' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.mathe1a2',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'mathe1b1' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.mathe1b1',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'mathe1b2' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.mathe1b2',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'mathe2a1' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.mathe2a1',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'mathe2a2' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.mathe2a2',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'mathe2b1' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.mathe2b1',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'mathe2b2' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.mathe2b2',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'mathe3a1' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.mathe3a1',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'mathe3a2' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.mathe3a2',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'mathe3b1' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.mathe3b1',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'mathe3b2' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.mathe3b2',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'mathe4a1' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.mathe4a1',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'mathe4a2' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.mathe4a2',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'mathe4b1' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.mathe4b1',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'mathe4b2' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.mathe4b2',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'mathe5a1' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.mathe5a1',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'mathe5a2' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.mathe5a2',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'mathe5b1' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.mathe5b1',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'mathe5b2' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.mathe5b2',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'mathe6a1' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.mathe6a1',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'mathe6a2' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.mathe6a2',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'mathe6b1' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.mathe6b1',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'mathe6b2' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.mathe6b2',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'mathe7a1' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.mathe7a1',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'mathe7a2' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.mathe7a2',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'mathe7b1' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.mathe7b1',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'mathe7b2' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.mathe7b2',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'physik1' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.physik1',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'physik2' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.physik2',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'physik3' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.physik3',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'paepsy1' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.paepsy1',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'paepsy2' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.paepsy2',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'gesuwi1' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.gesuwi1',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'gesuwi2' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.gesuwi2',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'gest1' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.gest1',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'gest2' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.gest2',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],
        'gest3' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.gest3',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim'
            ],
        ],		
        'schulart' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.schulart',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_bfbn_domain_model_schulart',
                'default' => 1,
                'minitems' => 1,
                'maxitems' => 1,
            ],            
        ],		
        'jahrgangsstufe' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.jahrgangsstufe',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_bfbn_domain_model_jahrgangsstufe',
				'foreign_table_where' => 'AND {#tx_bfbn_domain_model_jahrgangsstufe}.uid > 1',
                'default' => 2,
                'minitems' => 1,
                'maxitems' => 1,
            ],
        ],
        'institution' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bfbn/Resources/Private/Language/locallang_db.xlf:tx_bfbn_domain_model_aufgabenauswahl.institution',
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
				--div--;Deutsch,
					--palette--;;paletteDeutsch,
				--div--;Mathematik,
					--palette--;;paletteMathematik,
				--div--;Physik,
					--palette--;;palettePhysik,
				--div--;Pädagogik/Psychologie,
					--palette--;;palettePädagogik,
				--div--;Gesundheitswissenschaften,
					--palette--;;paletteGesundheitswissenschaften,
				--div--;Gestaltung,
					--palette--;;paletteGestaltung,					
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
				'schulart,
				--linebreak--,
				jahrgangsstufe,
				--linebreak--,
				institution'
		],
		'paletteDeutsch' => [
			'showitem' => 
				'deutsch1a,	deutsch1l, deutsch1e, deutsch1d,			
				--linebreak--,
				deutsch2a,	deutsch2l, deutsch2e, deutsch2d,
				--linebreak--,
				deutsch3a,	deutsch3l, deutsch3e, deutsch3d,
				--linebreak--,
				deutsch4a,	deutsch4l, deutsch4e, deutsch4d,
				--linebreak--,
				deutsch5a,	deutsch5l, deutsch5e, deutsch5d,
				--linebreak--,
				deutsch6a,	deutsch6l, deutsch6e, deutsch6d,
				--linebreak--,
				deutsch7a,	deutsch7l, deutsch7e, deutsch7d'	
		],
		'paletteMathematik' => [
			'showitem' => 
				'mathe1a1, mathe1a2, mathe1b1, mathe1b2,			
				--linebreak--,
				mathe2a1, mathe2a2, mathe2b1, mathe2b2,
				--linebreak--,
				mathe3a1, mathe3a2, mathe3b1, mathe3b2,
				--linebreak--,
				mathe4a1, mathe4a2, mathe4b1, mathe4b2,
				--linebreak--,
				mathe5a1, mathe5a2, mathe5b1, mathe5b2,
				--linebreak--,
				mathe6a1, mathe6a2, mathe6b1, mathe6b2,
				--linebreak--,
				mathe7a1, mathe7a2, mathe7b1, mathe7b2'	
		],
		'palettePhysik' => [
			'showitem' => 
				'physik1,physik2,physik3'	
		],				
		'palettePädagogik' => [
			'showitem' => 
				'paepsy1,paepsy2'
		],
		'paletteGesundheitswissenschaften' => [
			'showitem' => 
				'gesuwi1,gesuwi2'	
		],
		'paletteGestaltung' => [
			'showitem' => 
				'gest1,gest2,gest3'
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
