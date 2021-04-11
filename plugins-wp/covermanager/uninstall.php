<?php 

if( !defined('ABSPATH') && !defined('WP_UNINSTALL_PLUGIN') ) die();

global $wpdb;
$tables = [
    'wp_covermanager_settings',
    'wp_covermanager_cols',
    'wp_covermanager_rows',
    'wp_covermanager_textual',
    'wp_covermanager_live',
];

foreach($tables as $table)
{
    $wpdb->query("DROP TABLE IF EXISTS $table" );
}
        