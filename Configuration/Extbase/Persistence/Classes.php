<?php
declare(strict_types = 1);

return [
    \MbFosbos\Bfbn\Domain\Model\Bearbeiter::class => [
        'tableName' => 'fe_users',        
    ],
	\MbFosbos\Bfbn\Domain\Model\FrontendUser::class => [
		'tableName' => 'fe_users',
	],
];
