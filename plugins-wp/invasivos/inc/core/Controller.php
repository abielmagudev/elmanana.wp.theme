<?php namespace Inc\Core;

class Controller
{
    protected $connection;

    public static function request( $key = null )
    {
        return Web::request( $key );
    }

    public static function files( $key = null )
    {
        return Web::files( $key );
    }

    public static function redirect( $page, array $params = array(), $status = 200 )
    {
        return Locator::redirectSafe( $page, $params, $status );
    }

    public static function back( array $params = array() )
    {
        return Locator::backSafe( $params );
    }
}