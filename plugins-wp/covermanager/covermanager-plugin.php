<?php

/**
 * @package Cover manager
 * 
 * @version 0.1
*/

/*
Plugin Name: Cover manager
Plugin URI: http://wordpress.org/plugins/covermanager-plugin/
Description: Multi covers manager.
Author: Cover manager
Version: 0.1
Author URI: https://covermanager.com/
License: GPLv2 or later
Text domain: Cover manager
*/

// Licence about privacy content

require_once 'maguk-loader.php';

$maguk = new Inc\Maguk;
$maguk->register();
$maguk->action();
$maguk->notify();

register_activation_hook( __FILE__ , [$maguk, 'activate']);
register_deactivation_hook( __FILE__ , [$maguk, 'deactivate']);
