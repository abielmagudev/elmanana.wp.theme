<?php

// Settings ------------------------------------------------------------------------------------------------------------

// add_image_size('cropped', 375, 232, true);

add_theme_support('post-thumbnails');

add_theme_support('html5', [
    'comment-list',
    'comment-form',
    'search-form',
    'gallery',
    'caption',
]);

register_nav_menus([
    'header-menu' => __('Menu del header'),
    'footer-menu' => __('Menu del footer')
]);




// Shortcodes ------------------------------------------------------------------------------------------------------------

if(! function_exists('elm_youtube_shortcode') )
{
    function elm_youtube_shortcode($atts, $url = null) {
        $iframe = '';
    
        $get_youtube_id = function ($url)
        {
            if(! is_null($url) )
            {
                // $parsed = parse_url($url);
                list($address, $query_string) = explode('?', $url);
                parse_str($query_string, $q);
                if( is_array($q) && isset($q['v']) ) 
                    return $q['v'];
            }
            return false;
        };
    
        if( $youtube_id = $get_youtube_id($url) )
        {
            $iframe = '<div class="embed-responsive embed-responsive-16by9">';
            $iframe .= "<iframe src='https://www.youtube.com/embed/{$youtube_id}' class='embed-responsive-item' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
            $iframe .= '</div>';
        }
        return $iframe;
    }
    add_shortcode('youtube', 'elm_youtube_shortcode');
}




// Widgets ------------------------------------------------------------------------------------------------------------

if( !function_exists('elm_register_widgets') )
{
    function elm_register_widgets()
    {
        register_sidebar( array(
            'name'          => 'Widget para ads del Mañana',
            'id'            => 'elm-widget-ads',
            'description'   => 'Zona de ads para El Mañana',
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ) );
    
        /*
        register_sidebar( array(
            'name'          => 'Widget',
            'id'            => 'elm-widget',
            'description'   => 'Zona de colocación de widgets para El Mañana',
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ) );
        */
    }
    add_action('widgets_init', 'elm_register_widgets');
}
