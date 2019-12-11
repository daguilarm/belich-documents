<?php

return [
    'Belich||Belich' => [
        'url' => '_location_/home/about',
        'children' => [
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
                    'Resources||Recursos' => '_location_/facades/belich/resources',
                    'Routes||Rutas' => '_location_/facades/belich/route',
                    'System||Sistema' => '_location_/facades/belich/system',
                ]
            ],
            'Chart||Chart' => [
                'children' => [
                    'Assets||Assets' => '_location_/facades/chart/assets',
                    'Render||Visualización' => '_location_/facades/chart/render',
                ]
            ],
            'Helper||Helper' => '_location_/facades/helper/helpers',
        ],
    ],
    'Resources||Recursos' => [
        'url' => '_location_/artisan',
        'children' => [
            'Variables||Variables' => '_location_/resources/variables',
            'Methods||Métodos' => '_location_/resources/mandatory-methods',
        ]
    ],
    'Fields||Campos' => [
        'url' => '_location_/fields/field-default',
        'children' => [
            'General methods||Métodos generales' => '_location_/fields/methods',
            'General fields||Campos generales' => '_location_/fields/general-fields',
            'Authorization||Autorización' => '_location_/fields/auth',
            'Autocomplete||Autocompletar' => '_location_/fields/autocomplete',
            'Files/Img||Archivos/Img' => '_location_/fields/files',
            'Conditional||Condicionales' => '_location_/fields/conditional',
            'Visibility||Visualización' => '_location_/fields/visibility',
            'Validation||Validación' => '_location_/fields/validation',
            'Cast||Tipos/Valor' => '_location_/fields/casts',
            'Panel||Paneles' => '_location_/fields/panels',
            'Patterns||Patrones' => '_location_/fields/patterns',
            'Custom||Personalizados' => '_location_/fields/custom',
            'Tabs||Tabs' => '_location_/fields/tabs',
        ]
    ],
    'Relationships||Relaciones' => [
        'url' => '_location_/relationships/relationship-default',
        'children' => [
            'HasOne||HasOne' => '_location_/relationships/hasOne',
        ]
    ],
    'Views||Vistas' => [
        'url' => '_location_/views/views-default',
        'children' => [
            'Actions||Acciones' => '_location_/views/actions',
            'Blade||Blade' => '_location_/views/directives',
            'Breadcrumbs||Breadcrumbs' => '_location_/views/breadcrumbs',
            'Navbars||Navegación' => '_location_/views/navbars',
            'Dashboard||Dashboard' => '_location_/views/dashboard',
        ]
    ],
    'Graphs && Metrics||Graficas y Métricas' => [
        'url' => '_location_/metrics/metrics-default',
        'children' => [
            'Labels||Etiquetas' => '_location_/metrics/metrics-labels',
            'Cache||Caché' => '_location_/metrics/metrics-cache',
            'Calculations||Cálculos' => '_location_/metrics/metrics-calculate',
        ]
    ],
    'Cards||Cards' => [
        'url' => '_location_/cards/card',
        'children' => [
            'Controllers||Controlladores' => '_location_/cards/controller',
            'Views||Vistas' => '_location_/cards/view',
            'Cache||Caché' => '_location_/cards/cache',
        ]
    ],
    'Tools||Tools/Herramientas' => '_location_/tools',
    'Customization||Personalización' => '_location_/customization',
    'Credits||Créditos' => '_location_/credits',
];
