<?php

return array(
    'plugin' => array(
        'page_title' => 'Portadas de cabecera',
        'menu_title' => 'Portadas',
        'capability' => 'manage_options',
        'menu_slug' => 'covermanager-home',
        'function' => [Inc\Controllers\HomeController::class, 'index'],
        'icon_url' => 'dashicons-align-left',
        'position' => 8,
        'submenu' => array(
            // [
            //     'parent_slug' => 'popub-home',
            //     'page_title' => 'Nuevo invasivo',
            //     'menu_title' => 'Nuevo invasivo',
            //     'capability' => 'manage_options',
            //     'menu_slug' => 'popub-add',
            //     'function' => [Inc\Controllers\PublicityController::class, 'add'],
            // ],
            // [
            //     'parent_slug' => 'popub-home',
            //     'page_title' => 'Configuración',
            //     'menu_title' => 'Configuración',
            //     'capability' => 'manage_options',
            //     'menu_slug' => 'popub-settings',
            //     'function' => [Inc\Controllers\SettingsController::class, 'index'],
            // ]
        ),
    ),
);
