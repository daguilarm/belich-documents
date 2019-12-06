<?php

return [
    'baseUrl' => 'https://www.belich.dev',
    'production' => false,
    'siteName' => 'Belich dashboard',
    'siteDescription' => 'Belich is a Laravel dashboard admin. You can find all the documentation here...',

    // localization
    'locale' => function($page) {
        return $page->locale ?? 'en';
    },

    'path' => '{locale}/{-filename}',
        'collections' => [
            'en' => [
                'locale' => 'en',
            ],
            'es' => [
                'locale' => 'es',
            ],
        ],

    'path' => '{locale}/{folder}/{-filename}',
        'collections' => [
            'en' => [
                'locale' => 'en',
            ],
            'es' => [
                'locale' => 'es',
            ],
        ],

    // Algolia DocSearch credentials
    'docsearchApiKey' => '',
    'docsearchIndexName' => '',

    // navigation menu
    'navigation' => require_once('navigation.php'),

    // helpers
    'isActive' => function ($page, $path) {
        return ends_with(trimPath($page->getPath()), trimPath($path));
    },
    'isActiveParent' => function ($page, $menuItem) {
        if (is_object($menuItem) && $menuItem->children) {
            return $menuItem->children->contains(function ($child) use ($page) {
                return trimPath($page->getPath()) == trimPath($child);
            });
        }
    },
    'url' => function ($page, $path) {
        return starts_with($path, 'http') ? $path : '/' . trimPath($path);
    },
];
