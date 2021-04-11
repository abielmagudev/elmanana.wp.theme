<?php 

return array(
    'popub_publicity_store'  => [Inc\Controllers\PublicityController::class, 'store'],
    'popub_publicity_delete' => [Inc\Controllers\PublicityController::class, 'delete'],
    'popub_settings_update'  => [Inc\Controllers\SettingsController::class, 'update'],
    'popub_settings_update_manual'  => [Inc\Controllers\SettingsController::class, 'updateManual'],
);