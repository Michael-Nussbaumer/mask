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

namespace MASK\Mask\EventListeners;

use MASK\Mask\Definition\TableDefinitionCollection;
use MASK\Mask\Enumeration\FieldType;
use MASK\Mask\Imaging\IconProvider\ContentElementIconProvider;
use TYPO3\CMS\Core\Core\Event\BootCompletedEvent;
use TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider;
use TYPO3\CMS\Core\Imaging\IconRegistry;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Registers the icons of the backend module and of the Mask content elements.
 * Runs on BootCompletedEvent, as TYPO3 v14 forbids using the IconRegistry in ext_localconf.php.
 */
class RegisterIcons
{
    public function __construct(
        protected IconRegistry $iconRegistry,
        protected TableDefinitionCollection $tableDefinitionCollection
    ) {}

    public function __invoke(BootCompletedEvent $event): void
    {
        // Register Icons needed in the backend module
        foreach (FieldType::cases() as $maskIcon) {
            $this->iconRegistry->registerIcon(
                'mask-fieldtype-' . $maskIcon->value,
                SvgIconProvider::class,
                ['source' => 'EXT:mask/Resources/Public/Icons/Fieldtypes/' . GeneralUtility::underscoredToUpperCamelCase($maskIcon->value) . '.svg']
            );
        }

        $this->registerContentElementIcons();
    }

    protected function registerContentElementIcons(): void
    {
        if (!$this->tableDefinitionCollection->hasTable('tt_content')) {
            return;
        }

        foreach ($this->tableDefinitionCollection->getTable('tt_content')->elements as $element) {
            $this->iconRegistry->registerIcon(
                'mask-ce-' . $element->key,
                ContentElementIconProvider::class,
                [
                    'key' => $element->key,
                    'label' => $element->label,
                    'icon' => $element->icon,
                    'color' => $element->color,
                ]
            );

            // @todo it is not possible right now to detect a custom overlay icon
            // @todo by name, as this requires FAL. A better way would be to
            // @todo add a configuration for custom icons, instead of magically
            // @todo detect them by name.
            if ($element->iconOverlay !== '') {
                $this->iconRegistry->registerIcon(
                    'mask-ce-' . $element->key . '-overlay',
                    ContentElementIconProvider::class,
                    [
                        // @todo '_overlay' added to not conflict with the main icon.
                        // @todo will only work right now, if a FontAwesome icon is selected. See comment above.
                        'key' => $element->key . '_overlay',
                        'label' => $element->label,
                        'icon' => $element->iconOverlay,
                        'color' => $element->colorOverlay,
                    ]
                );
            }
        }
    }
}
