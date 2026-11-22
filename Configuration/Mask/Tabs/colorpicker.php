<?php

use MASK\Mask\Enumeration\Tab;

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
    Tab::VALUE_PICKER->value => [
        [
            'config.valuePicker.mode' => 6,
            'config.valuePicker.items' => 12,
        ],
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
