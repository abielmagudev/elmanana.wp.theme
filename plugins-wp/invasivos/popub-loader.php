<?php 

defined('ABSPATH') OR die('PERMISSION DENIED');

$composer_autoload = dirname( __FILE__ ) . '/vendor/autoload.php';
if( class_exists('Popub') || !file_exists( $composer_autoload ) ) 
    die('CLASS OR AUTOLOAD FAILED');

require_once $composer_autoload;
require_once "popub-functions.php";