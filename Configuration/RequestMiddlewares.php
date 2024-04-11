<?php

declare(strict_types=1);

use MbFosbos\Bfbn\Middleware\RemoveSelectIfEmptyMiddleware;

return [
    'frontend' => [
        'mbfosbos/bfbn/remove-faecher-if-empty' => [
            'target' => RemoveSelectIfEmptyMiddleware::class,
            'before' => [
                'typo3/cms-frontend/shortcut-and-mountpoint-redirect',
            ],
            'after' => [
                'typo3/cms-frontend/prepare-tsfe-rendering',
            ],
        ],
    ],
];
