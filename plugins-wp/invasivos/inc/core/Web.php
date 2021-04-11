<?php namespace Inc\Core;

abstract class Web
{
    public static function request( $key = null )
    {
        if( is_null($key) ) 
            return $_REQUEST;

        if( isset($_REQUEST[$key]) )
            return $_REQUEST[$key];
        
        return;
    }

    public static function files( $key = null )
    {
        if( $_FILES && is_null($key) ) 
            return $_FILES;

        if( isset($_FILES[$key]) )
            return $_FILES[$key];
        
        return;
    }

    public static function isSetRequest( $key )
    {
        return isset($_REQUEST[ $key ]);
    }

    public static function server( $key )
    {
        return isset($_SERVER[$key]) ? $_SERVER[$key] : null;
        // https://www.php.net/manual/en/reserved.variables.server.php
    }

    public static function method()
    {
        return self::server('REQUEST_METHOD');
    }
}