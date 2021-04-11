<?php 

// Define constants for theme El manana
if(! defined('ELM_TEMPLATEPATH') && defined('TEMPLATEPATH') )
     define('ELM_TEMPLATEPATH', TEMPLATEPATH . DIRECTORY_SEPARATOR);


// Improved function of get_template_part of WP, can pass vars to template
if(! function_exists('elm_get_template_part') )
{
    function elm_get_template_part ($path = null, $vars = [])
    {
        $fullpath = is_string($path) ? ELM_TEMPLATEPATH . "{$path}.php" : false;

        if(! is_file($fullpath) )
            return;
        
        if( is_array($vars) )
            extract($vars);
        
        return include($fullpath);
    }
    // include( locate_template($path, bool, bool);
}

// Get default image uploaded by WP of El manana
if(! function_exists('elm_get_image_elmanana_url') )
{
    function elm_get_image_elmanana_url($key = 'dark', $size = 'medium_large')
    {
        $images = array(
            'light' => 128895,
            'dark' => 128896,
        );

        if( array_key_exists($key, $images) )
            return array_shift( wp_get_attachment_image_src( $images[$key] ) );

        return array_shift( wp_get_attachment_url( $images['dark'] ) );
    }

    // wp_get_attachment_image_src()
    // wp_get_attachment_image()
    // wp_get_attachment_url()
}

// Get the thumbnail post if not has, then return defualt image
if(! function_exists('elm_get_the_post_thumbnail_url') )
{
    function elm_get_the_post_thumbnail_url ($post_id, $size = 'thumbnail', $backimage = 'dark')
    {
        if( has_post_thumbnail($post_id) )
            return get_the_post_thumbnail_url($post_id, $size);
        
        return elm_get_image_elmanana_url($backimage);
        #return elm_get_asset_url('images/elm-transparent-dark.png');
    }
}

// Get info of image, like legend, alt... 
if(! function_exists('elm_get_thumbnail_info') )
{
    function elm_get_thumbnail_info ( $thumbnail_id )
    {
        if( $thumbnail = get_post($thumbnail_id) )
        {
            return (object) array(
                'alt'         => get_post_meta($thumbnail->ID, '_wp_attachment_image_alt', true),
                'href'        => get_permalink( $thumbnail->ID ),
                'caption'     => $thumbnail->post_excerpt,
                'description' => $thumbnail->post_content,
                'title'       => $thumbnail->post_title,
                'guid'        => $thumbnail->guid,                
            );
        }

        return false;
    }
}

// Get the most recent post type
if(! function_exists('elm_get_last_one_post') )
{
    function elm_get_last_one_post ($type = 'post')
    {
        $posts = get_posts([
            'numberposts' => 1,
            'order'       => 'DESC',
            'post_status' => 'publish',
            'post_type'   => $type,
        ]);
        wp_reset_postdata();

        if( is_array($posts) && count($posts) )
            return array_shift( $posts );
        
        return null;
    }
}

// Get categories public like nuevo-laredo, laredo...
if(! function_exists('elm_get_categories_public') )
{
    function elm_get_categories_public ($with_slugs = false)
    {
        $categories_public = array(
            'nuevo-laredo' => 2,
            'laredo-texas' => 3,
            'estado' => 4,
            'nacional' => 5,
            'global' => 6,
            'cultura' => 7,
            'tecnologia' => 8,
            'deportes' => 9,
            'escena' => 10,
        );

        if( $with_slugs )
            return $categories_public;

        return array_values($categories_public);
    }
}

if(! function_exists('elm_get_categories_public_only') )
{
    function elm_get_categories_public_only ($only_categories_slugs = [])
    {
        $categories_public = elm_get_categories_public(true);

        $categories_filtered = array_filter($categories_public, function ($cat_public_slug) use ($only_categories_slugs) {
            return in_array($cat_public_slug, $only_categories_slugs);
        }, ARRAY_FILTER_USE_KEY);

        return array_values($categories_filtered);
    }
}

// Get the count total items of query
if(! function_exists('elm_get_query_counter') )
{
    function elm_get_query_counter()
    {
        global $wp_query;
        return $wp_query->found_posts;
    
        // $count = wp_count_posts();
        // return $count->draft - $count->trash;
    }
}

// Display the date for read by human
if(! function_exists('elm_get_current_date_human_display') )
{
    function elm_get_current_date_human_display ()
    {
        setlocale(LC_ALL, 'es_MX');
        list($date, $time) = explode(' ', current_time('mysql'));

        $datetime_instance = new Datetime($date);
        $date_human_display = strftime("%A, %d de %B de %Y", $datetime_instance->getTimestamp());
        return utf8_encode($date_human_display);
    }
}

// Pagination items
if(! function_exists('elm_get_pagination_items') )
{
    function elm_get_pagination_items ()
    {
        global $wp_query;
        $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');

        $big = 999999999; // need an unlikely integer
    
        $items = paginate_links( array(
                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format' => '?paged=%#%',
                'current' => max( 1, get_query_var('paged') ),
                'total' => $wp_query->max_num_pages,
                'type'  => 'array',
                'prev_next'   => true,
                'prev_text'    => __('«'),
                'next_text'    => __('»'),
            )
        );

        if( is_array($items) )
            return $items;

        return array();
    }
}

// Set if its a new Query or current query for display of template blog #DontUse
if(! function_exists('elm_blogging') )
{
    function elm_blogging ($template, $settings = []) 
    {
        $query_instance = is_array($settings) && count($settings) ? new WP_Query($settings) : $GLOBALS['wp_query'];

        return elm_get_template_part($template, ['query_blog' => $query_instance]);
    }
}


// Get color default of elmanana
if(! function_exists('elm_default_color') )
{
    function elm_get_default ($key)
    {
        $defaults = array(
            'color' => '#621528',
        );

        if( array_key_exists($key, $defaults) )
            return $defaults[ $key ];
        
        return;
    }
}

// Get asset
if(! function_exists('elm_get_asset_url') )
{
    function elm_get_asset_url($endpoint)
    {
        return get_bloginfo('template_url') . "/assets/{$endpoint}";
    }
}

// Dump on console browser
if(! function_exists('elm_dump_console') )
{
    function elm_dump_console ($var)
    {
        $printed_var = print_r($var, true);

        echo '<script>';
        echo "console.log({$printed_var})";
        echo '</script>';
        return;
    }
}

// Dump on browser php
if(! function_exists('elm_dump') )
{
    function elm_dump ($var)
    {
        echo '<pre>';
        echo print_r($var, true);
        echo '</pre>';
        return;
    }
}