<?php

use MASK\Mask\Enumeration\Tab;

$validation1 = [
    'config.min' => 6,
    'config.max' => 6,
    'config.is_in' => 6,
];

$validation2 = [
    'config.required' => 6,
    'config.eval.trim' => 6,
    'config.eval.alpha' => 6,
    'config.eval.num' => 6,
    'config.eval.alphanum' => 6,
    'config.eval.alphanum_x' => 6,
    'config.eval.domainname' => 6,
    'config.eval.lower' => 6,
    'config.eval.upper' => 6,
    'config.eval.unique' => 6,
    'config.eval.uniqueInPid' => 6,
    'config.eval.nospace' => 6,
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
        $validation1,
        $validation2,
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
            'config.eval.md5' => 6,
            'config.eval.password' => 6,
            'config.autocomplete' => 6,
        ],
    ],
];
