<?php

// DEFINES
define('PLUGIN_SLUG', 'covermanager');
define('DATETIME_NOW', date('Y-m-d h-m-s'));
define('DATE_NOW', date('Y-m-d'));
define('TIME_NOW', date('h-m-s'));

// FUNCTIONS
function maguk_dirname()
{
    return dirname( __FILE__ );
}

function maguk_plugin_basename()
{
    return plugin_basename( __FILE__ );
}

function maguk_plugin_dir_path()
{
    return plugin_dir_path( __FILE__ );
}

function maguk_plugins_url($url, $file = __FILE__)
{
    return plugins_url($url, $file);
}

function maguk_asset( $resource )
{
    return maguk_plugins_url('assets/' . $resource);
}

function maguk_theme_url( $extend = '' )
{
    return get_stylesheet_directory_uri() . '/' . $extend;
}

function maguk_config($file, $line = false)
{
    $config_path = maguk_plugin_dir_path() . 'config/';
    $config_file = $config_path . $file . '.php';

    if(! file_exists($config_file) )
        return;

    $content = require($config_file);
    if( is_string($line) && isset( $content[$line] ) )
        return $content[$line];

    return $content;
}

function maguk_include($file = '', $once = false, $data = null)
{
    $include_path = maguk_plugin_dir_path() . $file;
    
    if(! file_exists($include_path) )
        return false;

    if( is_array($data) )
        extract($data);

    if( $once )
    {
        return include_once $include_path;
    }
    
    return include $include_path;
}

function maguk_require($file = '', $once = false, $data = null)
{
    $require_path = maguk_plugin_dir_path() . $file;

    if(! file_exists($require_path) )
        return false;
    
    if( is_array($data) )
        extract($data);

    if( $once )
        return require_once $require_path;
        
    return require $require_path;
}

function maguk_plugin_path( $path = '' )
{
    return maguk_plugin_dir_path() . $path;
}

function maguk_render($template, array $data = [])
{
    $path_template = maguk_plugin_dir_path() . "templates/{$template}.php";

    if(! file_exists($path_template) )
        return die('Template not exists');
    
    if( count($data) ) extract($data);

    return include $path_template;
}

function maguk_admin_url($page, array $params = [])
{
    return Inc\Core\Locator::adminUrl($page, $params);
}

function maguk_admin_post_url()
{
    return Inc\Core\Locator::adminPostUrl();
}

function maguk_datetime_now()
{
    $timezone_format = _x('Y-m-d H:i:s', 'timezone date format');
    return date_i18n( $timezone_format ) ; //date('d-m-Y h:i:s')
}

function maguk_token()
{
    return strrev( sha1( time() ) );
}

function maguk_notice()
{
    return Inc\Core\Notice::get();
}

function maguk_dump( $var )
{
    echo '<pre>';
    print_r($var);
    echo '</pre>';
    die();
}

require_once "covermanager-functions.php";
