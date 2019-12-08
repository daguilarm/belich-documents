<?php

return [
    'Getting started||Empezando' => [
        'children' => [
            'About||Acerca de' => '_location_/home/about',
            'Features||Características' => '_location_/home/features',
            'Status||Estado' => '_location_/home/status',
        ],
    ],
    'Install||Instalación' => '_location_/install',
    'Config||Configuración' => '_location_/config',
    'Commands (Artisan)||Comandos (Artisan)' => '_location_/commands',
    'Routes||Rutas' => '_location_/routes',
    'Authorization||Autorización' => '_location_/authorize',
    'Facades||Facades' => [
        'children' => [
            'Belich||Belich' => [
                'children' => [
                    'Blade||Blade' => '_location_/facades/belich/blade',
                    'Models||Modelos' => '_location_/facades/belich/model',
                    'Operations||Operaciones' => '_location_/facades/belich/operations',
                ]
            ],
        ],
    ],
];
