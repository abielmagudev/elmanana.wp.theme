<?php 

// Set attributes on links css -----------------------------------------------------------------------------
if(! function_exists('elm_set_attributes_css_link') )
{
    function elm_set_attributes_css_link ($html, $handle, $href, $media)
    {
        if( $handle === 'elm_bootstrap_css' )
            return str_replace("id='elm_bootstrap_css-css'", 'id="elm_bootstrap_css" rel="preload" as="style"', $html);
        
        return $html;
    }
    add_filter('style_loader_tag', 'elm_set_attributes_css_link', 10, 4);
}

# apply_filters( 'script_loader_tag', string $tag, string $handle, string $src )


// Set attributes defer and async on scripts js
if(! function_exists('elm_add_defer_async_attrs') )
{
    function elm_add_defer_async_attrs($tag, $handle)
    {
        $scripts = array(
            'elm_share_js',
            'wp-embed',
            'wp-polls',
            'wpfc-toolbar',
        );
        if( !in_array($handle, $scripts) )
            return $tag;
            
        return str_replace(' src', ' async defer src', $tag);
    }
    add_filter('script_loader_tag', 'elm_add_defer_async_attrs', 10, 2);
}

// Set length exceprt of post -----------------------------------------------------------------------------
if(! function_exists('elm_excerpt_length') )
{
    function elm_excerpt_length()
    { 
        return 32; 
    }
    add_filter('excerpt_length', 'elm_excerpt_length', 999);
}

// Modify content if there breaklines to br into paragraph and newlines to another new paragraph ----------------------
if(! function_exists('elm_set_p_on_breaklines_and_newlines_content') )
{
    function elm_set_p_on_breaklines_and_newlines_content($content)
    {
        return wpautop($content);
    }
    add_filter('the_content', 'elm_set_p_on_breaklines_and_newlines_content');
    // https://developer.wordpress.org/reference/functions/wpautop/
}

// Set classes on images of content post -----------------------------------------------------------------------------
if(! function_exists('elm_set_class_image_content') )
{
    function elm_set_class_image_content($content)
    {
        return str_replace('<img ', '<img class="img-thumbnail w-100"', $content);
    }
    add_filter('the_content', 'elm_set_class_image_content');
}
