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

use MASK\Mask\CodeGenerator\TyposcriptCodeGenerator;
use TYPO3\CMS\Core\TypoScript\IncludeTree\Event\BeforeLoadedPageTsConfigEvent;

/**
 * Adds the generated page TSconfig (new content element wizard, backend layout field labels).
 * Replaces ExtensionManagementUtility::addPageTSConfig(), which was removed in TYPO3 v14.
 */
class AddPageTsConfig
{
    public function __construct(
        protected TyposcriptCodeGenerator $typoScriptCodeGenerator
    ) {}

    public function __invoke(BeforeLoadedPageTsConfigEvent $event): void
    {
        $event->addTsConfig($this->typoScriptCodeGenerator->generateTsConfig());
        $event->addTsConfig($this->typoScriptCodeGenerator->generatePageTSConfigOverridesForBackendLayouts());
    }
}
