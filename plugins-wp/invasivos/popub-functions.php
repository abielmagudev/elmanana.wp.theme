<?php

// DEFINES
define('DATETIME_NOW', date('Y-m-d h-m-s'));
define('DATE_NOW', date('Y-m-d'));
define('TIME_NOW', date('h-m-s'));

// FUNCTIONS
function popub_dirname()
{
    return dirname( __FILE__ );
}

function popub_plugin_basename()
{
    return plugin_basename( __FILE__ );
}

function popub_plugin_dir_path()
{
    return plugin_dir_path( __FILE__ );
}

function popub_plugins_url($url, $file = __FILE__)
{
    return plugins_url($url, $file);
}

function popub_config($file, $line = false)
{
    $config_path = popub_plugin_dir_path() . 'config/';
    $config_file = $config_path . $file . '.php';

    if(! file_exists($config_file) )
        return;

    $content = require($config_file);
    if( is_string($line) && isset( $content[$line] ) )
        return $content[$line];

    return $content;
}

function popub_include($file = '', $once = false)
{
    $include_path = popub_plugin_dir_path() . $file;
    
    if(! file_exists($include_path) )
        return false;

    if(! $once )
        return include $include_path;

    return include_once $include_path;
}

function popub_require($file = '', $once = false)
{
    $require_path = popub_plugin_dir_path() . $file;
    
    if(! file_exists($require_path) )
        return false;

    if(! $once )
        return require $require_path;

    return require_once $require_path;
}

function popub_render($template, array $data = [])
{
    $path_template = popub_plugin_dir_path() . "templates/{$template}.php";

    if(! file_exists($path_template) )
        return die('Template not exists');
    
    if( count($data) ) extract($data);

    return include $path_template;
}

function popub_admin_url($page, array $params = [])
{
    return Inc\Core\Locator::adminUrl($page, $params);
}

function popub_admin_post_url()
{
    return Inc\Core\Locator::adminPostUrl();
}

function popub_datetime_now()
{
    $timezone_format = _x('Y-m-d H:i:s', 'timezone date format');
    return date_i18n( $timezone_format ) ; //date('d-m-Y h:i:s')
}

function popub_token()
{
    return strrev( sha1( time() ) );
}

// FRONTSIDE

function popub_showtime()
{
    return Inc\Controllers\HomeController::showtime();
}