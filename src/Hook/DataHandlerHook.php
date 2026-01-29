<?php

namespace MCEikens\DynamicFlexformLoader\Hook;

use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\DataHandling\DataHandler;
use TYPO3\CMS\Core\Service\FlexFormService;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class DataHandlerHook
{
    public function processDatamap_afterDatabaseOperations(
        string $status,
        string $table,
        string|int $id,
        array $fieldArray,
        DataHandler $dataHandler
    ): void {
        if ($table !== 'tt_content') {
            return;
        }

        $uid = $status === 'new' ? (int)$dataHandler->substNEWwithIDs[$id] : (int)$id;

        if ($uid <= 0) {
            return;
        }

        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)
            ->getQueryBuilderForTable('tt_content');

        $record = $queryBuilder
            ->select('*')
            ->from('tt_content')
            ->where(
                $queryBuilder->expr()->eq('uid', $queryBuilder->createNamedParameter($uid))
            )
            ->executeQuery()
            ->fetchAssociative();

        if (!$record || empty($record['pi_flexform_settings'])) {
            return;
        }

        $flexFormService = GeneralUtility::makeInstance(FlexFormService::class);
        $flexFormData = $flexFormService->convertFlexFormContentToArray($record['pi_flexform_settings']);

        $fieldMapping = [
            'settings.dynamicFlexformLoaderKey' => 'dynamic_flexform_loader_key',
        ];

        $updateFields = [];

        foreach ($fieldMapping as $flexFormPath => $dbField) {
            $value = $this->getFlexFormValue($flexFormData, $flexFormPath);
            if ($value !== null) {
                $updateFields[$dbField] = $value;
            }
        }

        if (!empty($updateFields)) {
            $connection = GeneralUtility::makeInstance(ConnectionPool::class)
                ->getConnectionForTable('tt_content');

            $connection->update(
                'tt_content',
                $updateFields,
                ['uid' => $uid]
            );
        }
    }

    private function getFlexFormValue(array $flexFormData, string $path): ?string
    {
        $keys = explode('.', $path);
        $value = $flexFormData;

        foreach ($keys as $key) {
            if (!isset($value[$key])) {
                return null;
            }
            $value = $value[$key];
        }

        return is_string($value) ? $value : null;
    }
}
