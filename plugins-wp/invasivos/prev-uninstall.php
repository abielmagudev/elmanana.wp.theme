<?php 

/**
 * Trigger this file on plugin uninstall
 * 
 * @package Popub
 * 
 * What do this file?
 * - Clear database stored data
 * - Clear custom fields, metaboxes, options...
 */


// SECURITY ACCESS
if (!defined('ABSPATH') && !defined('WP_UNINSTALL_PLUGIN')) die();

$tables = [
    'popub',
    'popub_publicities',
];

global $wpdb;
foreach ($tables as $tablename) {
    $prefix_tablename = $wpdb->prefix . $tablename;
    $wpdb->query( "DROP TABLE IF EXISTS {$prefix_tablename}" );
}

// Dev delete folders and images of posts publicity
// $dir_images = get_template_directory();

//Removes all 3 types of line breaks
// $string = str_replace("\r", "", $string);
// $string = str_replace("\n", "", $string);
// https://www.geeksforgeeks.org/how-to-remove-line-breaks-from-the-string-in-php/
