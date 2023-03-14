<?php
declare(strict_types = 1);

return [
    \OliverBauer\Bfbn\Domain\Model\Bearbeiter::class => [
        'tableName' => 'fe_users',        
    ],
	\OliverBauer\Bfbn\Domain\Model\FrontendUser::class => [
		'tableName' => 'fe_users',
	],
];
