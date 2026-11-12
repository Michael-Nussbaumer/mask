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

namespace MASK\Mask\Fluid;

use MASK\Mask\Helper\InlineHelper;
use TYPO3\CMS\Core\Information\Typo3Version;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class FluidTemplateContentObject extends \TYPO3\CMS\Frontend\ContentObject\FluidTemplateContentObject
{
    /**
     * Change variables for view
     */
    protected function getContentObjectVariables(array $conf = []): array
    {
        // Call Parent Function to maintain core functions
        $variables = parent::getContentObjectVariables($conf);

        // Make some enhancements to data of pages
        if ($this->cObj->getCurrentTable() === 'pages') {
            $data = $variables['data'];
            $inlineHelper = GeneralUtility::makeInstance(InlineHelper::class);
            $inlineHelper->addFilesToData($data, 'pages');
            $inlineHelper->addIrreToData($data, 'pages', '', 'pages');
            $variables['data'] = $data;
        } elseif (!array_key_exists('parentRecord', $variables)) {
            $variables['parentRecord'] = $this->getParentRecordData();
        }

        return $variables;
    }

    /**
     * TYPO3 v14 made ContentObjectRenderer->parentRecord protected without adding a getter.
     * The only remaining access is the (internal) state array.
     *
     * @todo Replace with a public API, once TYPO3 provides one.
     *
     * @return array<string, mixed>
     */
    protected function getParentRecordData(): array
    {
        if ((new Typo3Version())->getMajorVersion() < 14) {
            return $this->cObj->parentRecord['data'] ?? [];
        }
        // @phpstan-ignore-next-line getState() only exists in TYPO3 v14+
        $data = $this->cObj->getState()['parentRecord']['data'] ?? [];
        return is_array($data) ? $data : [];
    }
}
