<?php

return [
    [
        'label' => 'navigation.dashboard',
        'icon' => 'solar:widget-add-line-duotone',
        'route' => 'admin.dashboard',
    ],
    [
        'label' => 'Test',
        'icon' => 'solar:widget-4-line-duotone',
        'url' => '#',
        'children' => [
            [
                'label' => 'Test',
                'route' => 'admin.test',
                'icon' => 'solar:widget-4-line-duotone',
            ],
            [
                'label' => 'new route',
                'route' => 'admin.new',
                'icon' => 'solar:widget-4-line-duotone',
            ],
        ],
    ],
    [
        'label' => 'navigation.settings',
        'icon' => 'solar:settings-line-duotone',
        'route' => 'admin.settings',
    ],
    [
        'label' => 'navigation.products.label',
        'icon' => 'solar:settings-line-duotone',
        'route' => 'admin.products',
        'children' => [
            [
                'label' => 'navigation.products.all',
                'route' => 'admin.products',
                'icon' => 'solar:widget-4-line-duotone',
            ],
        ],
    ],
    [
        'label' => 'navigation.pages.label',
        'icon' => 'solar:book-2-bold',
        'route' => '',
        'url' => '#',
        'children' => [
            [
                'label' => 'navigation.pages.index',
                'route' => 'admin.pages.index',
            ],
            [
                'label' => 'navigation.pages.create',
                'route' => 'admin.pages.create',
            ],
        ],
    ],
];
