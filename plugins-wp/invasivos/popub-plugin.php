<?php

/**
 * @package Invasivos
 * 
 * @version 0.1
*/

/*
Plugin Name: Invasivos
Plugin URI: http://wordpress.org/plugins/invasivos-plugin/
Description: Publicities Invasivos.
Author: Invasivos-publicity
Version: 0.1
Author URI: https://Invasivos-publicity.com/
License: GPLv2 or later
Text domain: Invasivos-publicity
*/

/* 
Licence about privacy content
*/

require_once 'popub-loader.php';

$popub = new Inc\Popub;
$popub->register();
$popub->action();
$popub->notify();

register_activation_hook( __FILE__ , [$popub, 'activate']);
register_deactivation_hook( __FILE__ , [$popub, 'deactivate']);