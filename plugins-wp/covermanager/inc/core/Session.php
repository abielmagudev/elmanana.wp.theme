<?php namespace Inc\Core;

abstract class Session
{
    public static function start()
    {
        if(! session_id() )
            session_start();
        
        return;
    }

    public static function close()
    {
        $_SESSION = array();
        return session_destroy();
    }

    public static function set( $key, $value )
    {
        return $_SESSION[$key] = $value;
    }

    public static function isSet( $key, $subkey = null )
    {
        if( !is_null($subkey) )
            return isset( $_SESSION[$key][$subkey] );

        return isset( $_SESSION[$key] );
    }

    public static function get( $key )
    {
        if( self::isSet($key) )
            return $_SESSION[$key];
        
        return;
    }

    public static function unset( $key )
    {
        if( isset($_SESSION[$key]) )
            unset( $_SESSION[$key] );
        
        return;
    }
}

// $wp_session = WP_Session::get_instance(); global $wp_session;
// https://www.ironistic.com/using-php-sessions-in-wordpress/
// https://stackoverflow.com/questions/23811748/how-do-you-use-session-variables-in-wordpress