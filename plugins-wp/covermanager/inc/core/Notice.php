<?php namespace Inc\Core;

abstract class Notice
{
    private static $styles = [
        'primary' => 'notice',
        'success' => 'notice notice-success is-dismissible',
        'info'    => 'notice notice-info is-dismissible',
        'warning' => 'notice notice-warning is-dismissible',
        'error'   => 'notice notice-error',
    ];

    public static function set( $status, $message = null )
    {        
        return Session::set('notice', [
            'class' => self::style( $status ), // esc_attr( $status )
            'message' => esc_html($message),
        ]);
    }

    public static function get()
    {
        if(! $notice = Session::get('notice') )
            return;

        Session::unset('notice');
        return "<div class='{$notice['class']}'> <p>{$notice['message']}</p> </div>";
    }

    public static function verify()
    {
        return Session::isSet('notice') && is_array( Session::get('notice') );
    }

    private static function style( $status )
    {
        return isset( self::$styles[ $status ] ) ? self::$styles[ $status ] : self::$styles[ 'primary' ];
    }
}

// printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $style ), esc_html( $message ) ); 
// do_action('admin_notices');
// settings_errors();
// https://codex.wordpress.org/Plugin_API/Action_Reference/admin_notices
// https://codex.wordpress.org/Function_Reference/settings_errors
// https://www.youtube.com/watch?v=i_zr3P__r7w