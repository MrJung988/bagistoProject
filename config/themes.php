<?php

return [
    'default' => 'default',

    'themes' => [
        'default' => [
            'views_path' => 'resources/themes/default/views',
            'assets_path' => 'public/themes/default/assets',
            'name' => 'Default'
        ],
        
        'customTheme' => [
            'views_path' => 'resources/themes/customTheme/views',
            'assets_path' => 'public/themes/default/assets',
            'name' => 'New Theme',
            'parent' => 'default'
        ],

        'bliss' => [
            'views_path' => 'resources/themes/bliss/views',
            'assets_path' => 'public/themes/bliss/assets',
            'name' => 'Bliss',
            'parent' => 'default'
        ],

        'velocity' => [
            'views_path' => 'resources/themes/velocity/views',
            'assets_path' => 'public/themes/velocity/assets',
            'name' => 'Velocity',
            'parent' => 'default'
        ],
    ],

    'admin-default' => 'default',

    'admin-themes' => [
        'default' => [
            'views_path' => 'resources/admin-themes/default/views',
            'assets_path' => 'public/admin-themes/default/assets',
            'name' => 'Default'
        ],
        
        'theme1' => [
            'views_path' => 'resources/admin-themes/theme1/views',
            'assets_path' => 'public/admin-themes/theme1/assets',
            'name' => 'theme1'
        ]
    ]
];
