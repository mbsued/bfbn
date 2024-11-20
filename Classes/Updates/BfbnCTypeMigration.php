<?php

declare(strict_types=1);

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

namespace MbFosbos\Bfbn\Updates;

use Doctrine\DBAL\Schema\Column;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Query\QueryBuilder;
use TYPO3\CMS\Core\Registry;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Install\Attribute\UpgradeWizard;
use TYPO3\CMS\Install\Updates\DatabaseUpdatedPrerequisite;
use TYPO3\CMS\Install\Updates\UpgradeWizardInterface;

#[UpgradeWizard('BfbnCTypeMigration')]
final class BfbnCTypeMigration implements UpgradeWizardInterface
{
    protected const TABLE_CONTENT = 'tt_content';

    public function __construct(
        private readonly Registry $registry,
        private readonly ConnectionPool $connectionPool,
    ) {}

    public function getTitle(): string
    {
        return 'Migrate Bfbn plugins to content elements.';
    }

    public function getDescription(): string
    {
        return 'The Bfbn plugins are now registered as content elements. Update migrates existing records.';
    }

    public function getPrerequisites(): array
    {
        return [
            DatabaseUpdatedPrerequisite::class,
        ];
    }

    public function updateNecessary(): bool
    {
        return ($this->columnsExistInContentTable() && $this->hasContentElementsToUpdate());

    }

    public function executeUpdate(): bool
    {
        if (($this->columnsExistInContentTable() && $this->hasContentElementsToUpdate())) {
            $this->updateContentElements();
        }

        return true;
    }

    protected function columnsExistInContentTable(): bool
    {
        $schemaManager = $this->connectionPool
            ->getConnectionForTable(self::TABLE_CONTENT)
            ->createSchemaManager();

        $tableColumnNames = array_flip(
            array_map(
                static fn(Column $column) => $column->getName(),
                $schemaManager->listTableColumns(self::TABLE_CONTENT)
            )
        );

        foreach (['CType', 'list_type'] as $column) {
            if (!isset($tableColumnNames[$column])) {
                return false;
            }
        }

        return true;
    }

    protected function hasContentElementsToUpdate(): bool
    {
        return (bool)$this->getPreparedQueryBuilderForContentElements()->count('uid')->executeQuery()->fetchOne();
    }

    protected function getContentElementsToUpdate(): array
    {
        return $this->getPreparedQueryBuilderForContentElements()->select('uid', 'CType', 'list_type')->executeQuery()->fetchAllAssociative();
    }


    protected function getPreparedQueryBuilderForContentElements(): QueryBuilder
    {
        $queryBuilder = $this->connectionPool->getQueryBuilderForTable(self::TABLE_CONTENT);
        $queryBuilder->getRestrictions()->removeAll();
        $queryBuilder
            ->from(self::TABLE_CONTENT)
            ->where(
                $queryBuilder->expr()->eq('CType', $queryBuilder->createNamedParameter('list')),
                $queryBuilder->expr()->like('list_type', $queryBuilder->createNamedParameter('bfbn%')),
            );

        return $queryBuilder;
    }

    protected function updateContentElements(): void
    {
        $connection = $this->connectionPool->getConnectionForTable(self::TABLE_CONTENT);

        foreach ($this->getContentElementsToUpdate() as $record) {
            $connection->update(
                self::TABLE_CONTENT,
                [
                    'CType' => $record['list_type'],
                    'list_type' => '',
                ],
                ['uid' => (int)$record['uid']]
            );
        }
    }
}
