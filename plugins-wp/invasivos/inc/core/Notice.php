<?php namespace Inc\Core;

abstract class Notice
{
    private static $styles = [
        'success' => 'notice notice-success is-dismissible',
        'info'    => 'notice notice-info is-dismissible',
        'warning' => 'notice notice-warning is-dismissible',
        'error'   => 'notice notice-error',
        'primary' => 'notice',
    ];

    public static function get( $notice_status )
    {
        $notice_type = self::getType( $notice_status );
        return self::set( $notice_type[0], $notice_type[1] );
    }

    public static function getType( $notice_status )
    {
        switch ( $notice_status )
        {
            case 'saved': 
                return ['success', 'Se guardó correctamente']; 
                break;
            case 'updated': 
                return ['success', 'Se actualizó correctamente']; 
                break;
            case 'deleted': 
                return ['success', 'Se eliminó correctamente']; 
                break;
            case 'error': 
                return ['error', 'Error al realizar acción']; 
                break;
            default: 
                return ['warning', $notice_status];
        }
    }

    public static function set( $class, $message )
    {        
        $esc_style = esc_attr( self::style($class) );
        $esc_message = esc_html( $message );
        return "<div class='{$esc_style}'> <p>{$esc_message}</p> </div>";

        // Session::set('notice', $element);
    }

    private static function style( $class )
    {
        return isset( self::$styles[$class] ) ? self::$styles[$class] : self::$styles['primary'];
    }
}

// printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $style ), esc_html( $message ) ); 
// do_action('admin_notices');
// settings_errors();
// https://codex.wordpress.org/Plugin_API/Action_Reference/admin_notices
// https://codex.wordpress.org/Function_Reference/settings_errors