<?php namespace Inc\Core;

abstract class Locator
{
    public static function redirect( $page, array $params = array(), $status = 200 )
    {
        return wp_redirect( self::adminUrl($page, $params, $status) );
    }

    public static function redirectSafe( $page, array $params = array(), $status = 200 )
    {
        return wp_safe_redirect( self::adminUrl($page, $params, $status) );
    }

    public static function redirectJs( $page, array $params = array(), $status = 200 )
    {
        $redirect = self::adminUrl($page, $params);
        echo "<script> window.location = '{$redirect}' </script>";
        return;
    }

    public static function back( array $params = array() )
    {
        return wp_redirect( self::backUrl( $params ) );
    }

    public static function backSafe( array $params = array() )
    {
        return wp_safe_redirect( self::backUrl( $params ) );
    }

    public static function adminUrl( $page, array $params = array() )
    {
        if( count($params) )
            $page .= self::getUri( $params );
        
        return admin_url( $page );
    }

    public static function backUrl( array $params = array() )
    {
        $referer = wp_get_referer();
        if( count($params) )
            $referer .= self::getUri( $params );
        
        return $referer;
    }

    public static function adminPostUrl()
    {
        return esc_url( admin_url('admin-post.php') );
    }

    private static function getUri( $params, $init = true )
    {
        $items = [];
        foreach($params as $key => $value)
        {
            array_push($items, "{$key}={$value}");
        }

        $uri_start = $init ? '?' : '&';
        return $uri_start . implode('&', $items);
    }
}