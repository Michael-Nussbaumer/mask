<?php

use MASK\Mask\Enumeration\Tab;

$linkHandler = [
    'config.allowedTypes' => 12,
];
$validation = [
    'config.required' => 6,
    'config.appearance.allowedFileExtensions' => 6,
];

return [
    Tab::GENERAL->value => [
        [
            'config.default' => 6,
            'config.placeholder' => 6,
        ],
        [
            'config.size' => 6,
        ],
    ],
    Tab::VALIDATION->value => [
        $validation,
    ],
    Tab::FIELD_CONTROL->value => [
        $linkHandler,
    ],
    Tab::LOCALIZATION->value => [
        [
            'l10n_mode' => 12,
        ],
        [
            'config.behaviour.allowLanguageSynchronization' => 6,
        ],
    ],
    Tab::EXTENDED->value => [
        [
            'config.nullable' => 6,
            'config.mode' => 6,
        ],
    ],
];
