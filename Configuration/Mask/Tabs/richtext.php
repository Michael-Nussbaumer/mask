<?php

use MASK\Mask\Enumeration\Tab;

$validation = [
    'config.required' => 6,
];

return [
    Tab::GENERAL->value => [
        [
            'config.richtextConfiguration' => 6,
        ],
        [
            'config.default' => 6,
        ],
    ],
    Tab::VALIDATION->value => [
        $validation,
    ],
    Tab::LOCALIZATION->value => [
        [
            'l10n_mode' => 12,
        ],
        [
            'config.behaviour.allowLanguageSynchronization' => 6,
        ],
    ],
];
