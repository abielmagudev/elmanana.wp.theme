<?php

// Load CSS ----------------------------------------------------------------------------------------
if( !function_exists('elm_load_css') )
{
    function elm_load_css()
    {
        wp_register_style('elm_bootstrap_css', get_template_directory_uri().'/assets/css/elm.min.css', array(), '4.4.1', 'all');
        wp_enqueue_style('elm_bootstrap_css');
    
    }
    add_action('wp_enqueue_scripts', 'elm_load_css');
}

// Load JS ----------------------------------------------------------------------------------------
if( !function_exists('elm_load_js') )
{
    function elm_load_js()
    {
        // if( !is_admin() )
        //     wp_deregister_script('jquery');

        # wp_register_script('elm_jquery_js' , 'https://code.jquery.com/jquery-3.5.0.min.js', array(), '3.5.0', true);
        wp_register_script('elm_jquery_js' , get_template_directory_uri().'/assets/js/jquery-3.5.0.min.js', array(), '3.5.0', true);
        
        # wp_register_script('elm_popper_js', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/esm/popper.min.js', array(), '1.16.1', true);
        # wp_register_script('elm_popper2_js', 'https://unpkg.com/@popperjs/core@2', array(), '2.3.3', true);
        
        # wp_register_script('elm_bootstrap_js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array(), '4.4.1', true);
        # wp_register_script('elm_bootstrap_js', get_template_directory_uri().'/assets/js/bootstrap-4.4.1.min.js', array(), '4.4.1', true);
        
        wp_register_script('elm_bootstrap_bundle_js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js', array(), '4.4.1', true);
        # wp_register_script('elm_bootstrap_bundle_js', get_template_directory_uri().'/assets/js/bootstrap.bundle-4.4.1.min.js', array(), '4.4.1', true);
       
        # wp_register_script('elm_fontawesome_js', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js', array(), '5.13.0', true);
        wp_register_script('elm_fontawesome_js', get_template_directory_uri().'/assets/js/fontawesome-5.13.0-all.min.js', array(), '5.13.0', true);
        
        wp_register_script('elm_share_js', '//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5c2a6fc00099d5ea', array(), '1', true);
        wp_register_script('elm_theme_js', get_template_directory_uri().'/assets/js/elm.min.js', array(), '2', true);
        
        wp_enqueue_script('elm_jquery_js');
        # wp_enqueue_script('elm_popper_js');
        # wp_enqueue_script('elm_popper2_js');
        # wp_enqueue_script('elm_bootstrap_js');
        wp_enqueue_script('elm_bootstrap_bundle_js');
        wp_enqueue_script('elm_fontawesome_js');
        wp_enqueue_script('elm_share_js');
        wp_enqueue_script('elm_theme_js');
    }
    add_action('wp_enqueue_scripts', 'elm_load_js');
}


// Adding scripts into header and footer ----------------------------------------------------------------------------------------
if( !function_exists('elm_add_scripts_header') )
{
    function elm_add_scripts_header ()
    {
        $scripts = array(
            'partners/google/analytics',
            # 'partners/google/tagservices',
            # 'partners/google/syndication',
        );
    
        array_walk($scripts, function ($item) {
            get_template_part($item);
        });
    }
    add_action('wp_head', 'elm_add_scripts_header');
}

if( !function_exists('elm_add_scripts_footer') )
{
    function elm_add_scripts_footer ()
    {
        # code...
    }
    add_action('wp_footer', 'elm_add_scripts_footer');
}


// Add in heads the ads publicity ----------------------------------------------------------------------------------------
if( !function_exists('elm_add_adm_head') )
{
    function elm_add_adm_head ()
    {
        get_template_part('partners/google/adm-head-all');

        if( is_front_page() || is_home() )
        {
            get_template_part('partners/google/adm-head-home');
        }

        if( is_single() )
        {
            get_template_part('partners/google/adm-head-notaROS');
        }

        if( is_category() && in_category( elm_get_categories_public() ) )
        {
            get_template_part('partners/google/adm-head-category');
        }

        if( is_page(59) )
        {
            get_template_part('partners/google/adm-head-page-puentes');
        }
    }
    add_action('wp_head', 'elm_add_adm_head');
}

if( !function_exists('elm_add_smart_head') )
{
    function elm_add_smart_head()
    {
        if( is_single() )
        {
            get_template_part('partners/smart/single-head');
        }
    }
    add_action('wp_head', 'elm_add_smart_head');
}




// Modify the main query before display ----------------------------------------------------------------------------------------

if(! function_exists('elm_modify_wpquery_category') )
{
    function elm_modify_wpquery_category ( $query ) 
    {
        if ( is_admin() || !$query->is_main_query() )
            return;

        if( is_category() )
        {
            $query->set('paged', ( get_query_var('paged') ? get_query_var('paged') : 1));
            $query->set('posts_per_page', get_option('posts_per_page'));
            $query->set('status', 'publish');
        }
    }
    add_action('pre_get_posts', 'elm_modify_wpquery_category');
}


if(! function_exists('elm_modify_wpquery_archive_opinions') )
{
    function elm_modify_wpquery_archive_opinions ( $query ) 
    {
        if ( is_admin() || !$query->is_main_query() )
            return;

        if( is_archive() )
        {
            $query->set('paged', ( get_query_var('paged') ? get_query_var('paged') : 1));
            $query->set('posts_per_page', 7);
            $query->set('status', 'publish');

            if( isset($_GET['columnista']) && $_GET['columnista'] !== 'todos' )
            {
                $query->set('tax_query', array(
                    ['taxonomy' => 'columnists', 'field' => 'slug','terms' => $_GET['columnista']],
                ));
            }
        }
    }
    add_action('pre_get_posts', 'elm_modify_wpquery_archive_opinions');
}


if( !function_exists('elm_modify_wpquery_search_and_tag') )
{
    function elm_modify_wpquery_search_and_tag ( $query )
    {
        if ( is_admin() || !$query->is_main_query() )
            return;

        if ( $query->is_search() || $query->is_tag() )
        {
            $query->set('post_type', ['post']);
            $query->set('post_status', 'publish');
        }
    }
    add_filter('pre_get_posts', 'elm_modify_wpquery_search_and_tag');
}
