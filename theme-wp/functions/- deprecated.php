<?php 

// DEFINES -------------------------------------------------------------------------------------------

if(! defined('ELM_CAT_IDS') )
    define('ELM_CAT_IDS', [2,3,4,5,6,7,8,9,10]);

if(! defined('ELM_MISSING_IMG') )
    define('ELM_MISSING_IMG', 'missing_img.jpg');

if(! defined('ELM_DEFAULT_IMAGE') )
    define('ELM_DEFAULT_IMAGE', 'missing_img.jpg');



// HOOKS FILTERS -------------------------------------------------------------------------------------------

if( !function_exits('elm_modify_title') )
{
    function elm_modify_title($title)
    {
        global $post;
        $cat = get_the_category( $post->ID );
        if( $cat[0]->category_parent === 2 || $cat[0]->term_id === 2  )
            return $title . ' - Nuevo Laredo';
            
        return $title;
    }
    add_filter('the_title', 'elm_modify_title');
}

if( !function_exists('elm_delete_fullsize_image') )
{
    // Elimina la imagen original despues de subirla
    function elm_delete_fullsize_image( $metadata )
    {
        $upload_dir = wp_upload_dir();
        $full_image_path = trailingslashit( $upload_dir['basedir'] ) . $metadata['file'];
        $deleted = unlink( $full_image_path );
        return $metadata;
    }
    add_filter( 'wp_generate_attachment_metadata', 'elm_delete_fullsize_image' );
}

remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );





// CUSTOM POST TYPE

if( !function_exists('elm_register_custom_post_opinion') )
{
    function elm_register_custom_post_opinion()
    {
        $labels = array(
            'name'          => 'Opiniones',
            'singular_name' => 'Opinión',
            'add_new_item'  => 'Agregar nueva opinión',
            'edit_item'     => 'Editar pinión',
            'new_item'      => 'Nueva opinión',
            'view_item'     => 'Ver opinión',
            'search_items'  => 'Buscar opiniónes',
            'not_found'     => 'No opiniónes',
        );
    
        $args = array(
            'label'         => 'Opinión',
            'labels'        => $labels,
            'description'   => 'La opinión categorizada por un columinsta.',
            'public'        => true,
            'show_ui'       => true,
            'supports'      => ['title','editor','excerpt'],
            'taxonomies'    => ['category', 'post_tag'],
            'menu_position' => 4
        );
    
        register_post_type('opinion', $args);
    }
    add_action('init', 'elm_register_custom_post_opinion', 10);
}





// HEAD -------------------------------------------------------------------------------------------
function elm_get_meta_title()
{
    if( is_single() )
    {
        global $post;
        $title = get_the_title();
        
        $cat = get_the_category( $post->ID );
        if( $cat[0]->category_parent === 2 || $cat[0]->term_id === 2  )
            return $title . ' - Nuevo Laredo';
            
        return $title;
    }
    elseif( is_category() )
    {
        $cat_id = get_query_var('cat');
        $cat = get_category( $cat_id );
        return get_bloginfo('name').' | '.$cat->name;
    }
    elseif( is_archive('opinions') )
    {
        return get_bloginfo('name').' | Opiniones';
    }
    else
    {
        return get_bloginfo('name');
    }
}





// GET LAST POST -------------------------------------------------------------------------------------------
if(! function_exists('elm_get_recent_post') )
{
    function elm_get_recent_posts ($args = []) 
    {
        if(! is_array($args) )
            $args = array();

        $args = array(
            'numberposts' => 1,
            'post_status' => 'publish',
            'order'       => 'DESC',
        );

        if( $posts = wp_get_recent_posts($args, OBJECT) )
        {
            wp_reset_query();
            return array_shift($posts);
        }

        return;
    }
}

function elm_most_recent($post_type, $post_status = 'publish')
{
    $args = [
        'post_type'   => $post_type,
        'post_status' => $post_status,
        'numberposts' => 1,
        'order'       => 'DESC'
    ];
    
    if( $posts = wp_get_recent_posts($args, OBJECT) )
    {
        wp_reset_query();
        return $posts[0];
    }

    return;
}





// IMAGES -------------------------------------------------------------------------------------------
function elm_get_thumbnail($post_id, $size = 'large', $thumbnail_missing = ELM_MISSING_IMG)
{
    if( has_post_thumbnail($post_id) )
        return get_the_post_thumbnail_url($post_id, $size);

    if( is_string($thumbnail_missing) )
        return elm_get_image_url($thumbnail_missing);
    
    return;
}


function elm_get_thumbnail_attrs($post_id, $key = false)
{
    if( $thumbnail_id = get_post_thumbnail_id($post_id) )
    {
        $attachment = get_post($thumbnail_id);
        $attrs = [
            'alt'         => get_post_meta($attachment->ID, '_wp_attachment_image_alt', true),
            'href'        => get_permalink( $attachment->ID ),
            'caption'     => $attachment->post_excerpt,
            'description' => $attachment->post_content,
            'title'       => $attachment->post_title,
            'src'         => get_the_post_thumbnail_url($post_id, 'full'),
            // 'src'         => $attachment->guid,
        ];

        if( is_string($key) && isset($attrs[$key]) )
            return $attrs[$key];

        return $attrs;
    }
    return false;
}

function elm_get_image_url($image)
{
    return get_bloginfo('template_url').'/assets/images/'.$image;
}




// COUNTER QUERY -------------------------------------------------------------------------------------------
function elm_get_result_posts()
{
    global $wp_query;
    return $wp_query->found_posts;

    $count = wp_count_posts();
    return $count->draft - $count->trash;
}





// HOOK CONTENT -------------------------------------------------------------------------------------------
function elm_get_video_iframe($content)
{
    $content = preg_replace( '/<iframe(.*)\/iframe>/is', '', $content );
    return $content;
}





// MENUS -------------------------------------------------------------------------------------------
function elm_get_navbar_categories()
{
    $get_nav_menu = function ($items, $slug)
    {
        $nav = array(
            'menu'    => [],
            'submenu' => []
        );

        foreach( $items as $item )
        {
            $element = [];
            $element['id']     = $item->ID;
            $element['object'] = $item->object;
            $element['title']  = $item->title;
            $element['url']    = $item->url;
            $element['class']  = current( $item->classes );
            $element['active'] = !is_null($slug) ? strpos($item->url, $slug) : true;

            if( $item->menu_item_parent == 0 )
            {
                // $slashes = explode('/', $element['url']); 
                // $element['class'] = end( array_filter($slashes) ); // array_filter: remove empty values
                array_push($nav['menu'], $element);
                continue;
            }

            if( $element['active'] && is_string($slug) )
                array_push($nav['submenu'], $element);
        }

        return $nav;
    };

    $menu_items = wp_get_nav_menu_items('categorias_subcategorias');
    $taxonomy_current_slug = elm_get_taxonomy_current_slug();

    return $get_nav_menu($menu_items, $taxonomy_current_slug);
}

function elm_get_taxonomy_current_slug()
{
    if( get_post_type() === 'opinions' || is_post_type_archive('opinions') )
    {
        return 'opinion';
    }
    elseif( is_category() )
    {
        $cat = elm_get_category_parent( get_query_var('cat') );
        if( in_array($cat->term_id, ELM_CAT_IDS) )
            return $cat->slug;
    }
    elseif( is_single() )
    {
        $cat = elm_get_category_parent( get_the_category() );
        if( in_array($cat->term_id, ELM_CAT_IDS) )
            return $cat->slug;
    }
    else
    {
        return;
    }
}

function elm_get_menu_company()
{
    $pages = wp_get_nav_menu_items('empresa');

    $nav = [];
    foreach($pages as $key => $page)
    {
        $item['url']  = $page->url;
        $item['title'] = $page->title;
        array_push($nav, $item);
    }

    return $nav;
}




// CATEGORIES -------------------------------------------------------------------------------------------

function elm_get_category_slug()
{
    global $post;
    $terms = get_the_terms($post->ID, 'category');
    if($terms)
    {
        foreach( $terms as $term )
        {
            $category = get_term($term->term_id, 'category');
            $slug = str_replace([' ','-'], '', $category->slug);
            return $slug;
        }
    }
}


function elm_get_categories_links( $post_id )
{
    $links = [];
    $categories_post = get_the_category( $post_id );
    foreach ($categories_post as $cat)
    {
        $href = get_category_link( $cat->term_id );
        if( $cat->category_parent )
        {
            $link_child = "<a href='{$href}' class='badge badge-pill badge-light align-middle' style='font-size:0.65rem'>{$cat->name}</a>";
            array_push($links, $link_child);
            continue;
        }
        
        if( $cat->term_id > 1 )
        {
            $link_parent = "<a href='{$href}' class='badge badge-pill text-white align-middle pt-1 bg-{$cat->slug}'>{$cat->name}</a>";
            array_unshift($links, $link_parent);
        }
    }

    return implode(' ', $links);
}


function elm_get_category_parent( $categories = null )
{
    $filter_parents = function ($array)
    {
        return array_filter($array, function ($i) {
            return $i->category_parent === 0;
        });
    };

    $filter_children = function ($array)
    {
        return array_filter($array, function ($i) {
            return $i->category_parent <> 0;
        });
    };

    $get_category_parent = function ($cat_id)
    {
        $parent = null;
        while( $cat_id )
        {
            $category = get_category($cat_id);
            if( $category->category_parent === 0 )
                $parent = $category;

            $cat_id = $category->category_parent;
        }
        return $parent;
    };

    if( is_array($categories) )
    {
        $parents = $filter_parents($categories);
        if( count($parents) )
            return array_shift($parents);
        
        $children = $filter_children($categories);
        if( count($children) )
        {
            $child = array_shift($children);
            return $get_category_parent( $child->term_id );
        }
    }
    elseif( is_integer($categories) || is_string($categories) )
    {
        return $get_category_parent( $categories );
    }
    else
    {
        return;
    }
}



// FILTERS -------------------------------------------------------------------------------------------

if(! function_exists('elm_add_image_class') )
{
    function elm_add_image_class($class)
    {
        return $class . ' img-fluid';
    }
    add_filter('get_image_tag_class','elm_add_image_class');
}
