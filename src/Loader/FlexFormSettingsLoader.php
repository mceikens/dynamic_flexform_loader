<?php

namespace MCEikens\DynamicFlexformLoader\Loader;

use Doctrine\DBAL\Exception;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Service\FlexFormService;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class FlexFormSettingsLoader implements LoggerAwareInterface
{
    use LoggerAwareTrait;

    /**
     * @throws Exception
     */
    public function load(string $key): array
    {
        $row = GeneralUtility::makeInstance(ConnectionPool::class)
            ->getConnectionForTable('tt_content')
            ->select(['pi_flexform'], 'tt_content', ['dynamic_flexform_loader_key' => $key])
            ->fetchAssociative();

        if (!$row) {
            $this->logger->warning('Can not find flexform settings for ' . $key);
            return [];
        }

        return GeneralUtility::makeInstance(FlexFormService::class)
            ->convertFlexFormContentToArray($row['pi_flexform'])['settings'] ?? [];
    }
}
