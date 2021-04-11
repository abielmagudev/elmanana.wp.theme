<?php

return array(
    'plugin' => array(
        'page_title' => 'Invasivos',
        'menu_title' => 'Invasivos',
        'capability' => 'manage_options',
        'menu_slug' => 'popub-home',
        'function' => [Inc\Controllers\HomeController::class, 'index'],
        'icon_url' => 'dashicons-images-alt2',
        'position' => 8,
        'submenu' => array(
            [
                'parent_slug' => 'popub-home',
                'page_title' => 'Nuevo invasivo',
                'menu_title' => 'Nuevo invasivo',
                'capability' => 'manage_options',
                'menu_slug' => 'popub-add',
                'function' => [Inc\Controllers\PublicityController::class, 'add'],
            ],
            [
                'parent_slug' => 'popub-home',
                'page_title' => 'Configuración',
                'menu_title' => 'Configuración',
                'capability' => 'manage_options',
                'menu_slug' => 'popub-settings',
                'function' => [Inc\Controllers\SettingsController::class, 'index'],
            ]
        ),
    ),
);
