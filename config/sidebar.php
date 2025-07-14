<?php 

return [
        [
            'label' => 'Dashboard 1',
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
    ];