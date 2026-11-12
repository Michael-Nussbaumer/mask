<?php

use MASK\Mask\Enumeration\Tab;

$validation = [
    'config.required' => 6,
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
        [
            'config.range.lower' => 6,
            'config.range.upper' => 6,
        ],
    ],
    Tab::FIELD_CONTROL->value => [
        [
            'config.slider.step' => 6,
            'config.slider.width' => 6,
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
            'config.autocomplete' => 6,
        ],
    ],
];
