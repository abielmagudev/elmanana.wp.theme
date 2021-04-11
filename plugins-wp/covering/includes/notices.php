<?php 

function cvr_notice($message, $status)
{
    $style = cvr_get_notice_style($status);
    add_action('admin_notices', function () use ($message, $style) {
        printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $style ), esc_html( $message ) ); 
    });
}

function cvr_get_notice_style($style)
{
    $styles = [
        'success' => 'notice notice-success is-dismissible',
        'warning' => 'notice notice-warning',
        'info'    => 'notice notice-info',
        'error'   => 'notice notice-error',
    ];

    if( isset( $styles[ $style ] ) )
        return $styles[ $style ];
    
    return false;
}