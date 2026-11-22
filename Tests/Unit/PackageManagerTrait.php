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

namespace MASK\Mask\Tests\Unit;

use TYPO3\CMS\Core\Core\Environment;
use TYPO3\CMS\Core\Package\Package;
use TYPO3\CMS\Core\Package\PackageManager;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

trait PackageManagerTrait
{
    public function registerPackageManager(): void
    {
        $maskPackageMock = $this->createMock(Package::class);
        $maskPackageMock->method('getPackagePath')->willReturn(self::getMaskExtensionPath());
        // Other extensions (e.g. a site package in a configured path) resolve to a path that does not exist.
        $otherPackageMock = $this->createMock(Package::class);
        $otherPackageMock->method('getPackagePath')->willReturn(Environment::getProjectPath() . '/non-existing-package/');
        $packageManagerMock = $this->createMock(PackageManager::class);
        $packageManagerMock->method('isPackageActive')->willReturn(true)->with('mask');
        $packageManagerMock->method('getPackage')->willReturnCallback(
            static fn(string $packageKey): Package => $packageKey === 'mask' ? $maskPackageMock : $otherPackageMock
        );
        // TYPO3 v13 resolves "EXT:" paths via PackageManager->resolvePackagePath().
        $packageManagerMock->method('resolvePackagePath')->willReturnCallback(
            static fn(string $path): string => str_starts_with($path, 'EXT:mask/')
                ? self::getMaskExtensionPath() . substr($path, 9)
                : Environment::getProjectPath() . $path
        );
        // TYPO3 v14 resolves "EXT:" paths via the system resource API, which needs the package key.
        $packageManagerMock->method('extractPackageKeyFromPackagePath')->willReturnCallback(
            static fn(string $path): string => explode('/', substr($path, 4), 2)[0]
        );
        ExtensionManagementUtility::setPackageManager($packageManagerMock);
    }

    /**
     * Absolute path of the extension with a trailing slash.
     * Can be used without a registered package manager, e.g. in tearDown().
     */
    public static function getMaskExtensionPath(): string
    {
        return realpath(__DIR__ . '/../../') . '/';
    }
}
