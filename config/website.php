<?php

use Illuminate\Support\Facades\URL;

return [

    'global' => [

        'title' => '',

        'seo' => [
            'description' => '',
            'keywords' => [],
        ],

        'author' => 'Filipe Paladino',

        'versao' => '1.0.0'

    ],

    'backend' => [

        'sidebar' => [

            [
                'name'  => 'Banner',
                'slug'  => 'banner'
            ],

            [
                'name'  => 'Empresa',
                'slug'  => 'empresa'
            ],

            [
                'name'  => 'Produtos',
                'slug'  => 'produto',
                'children' => [

                    [
                        'name'  => 'Categorias',
                        'slug'  => 'banner'
                    ],
                    [
                        'name'  => 'Produtos',
                        'slug'  => 'banner'
                    ],


                ]
            ],

        ]

    ],

    'fronted' => [

        'sidebar' => [

        ]
    ]

];
