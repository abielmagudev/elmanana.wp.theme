<?php 

if(! function_exists('elm_cpt_opinions_get_columnist_post') )
{
    function elm_cpt_opinions_get_columnist_post($opinion_post_id)
    {
        // ($post_id - string, $taxonomies - array)
        $opinion_terms = wp_get_post_terms($opinion_post_id, ['columnists']);
        $columnist = array(
            'id' => false,
            'sections' => [],
        );

        foreach($opinion_terms as $index => $term)
        {
            if( $term->parent )
            {
                $columnist['sections'][ $term->term_id ] = $term->name;
                continue;
            }

            $columnist['id']          = $term->term_id;
            $columnist['name']        = $term->name;
            $columnist['slug']        = $term->slug;
            $columnist['description'] = $term->description;
            $columnist['image']       = elm_cpt_opinions_get_columnist_image($term->term_id);
        }

        return (object) $columnist;
    }
}

if(! function_exists('elm_cpt_opinions_get_columnist_image') )
{
    function elm_cpt_opinions_get_columnist_image ($columnist_id, $size = 'medium')
    {
        $thumbnail_id = get_term_meta($columnist_id, 'thumbnail_id', true);

        if( $image = wp_get_attachment_image_url($thumbnail_id, $size) )
            return $image;

        return false;
    }
}

if(! function_exists('elm_cpt_opinions_color') )
{
    function elm_cpt_opinions_color($colorname)
    {
        $colors = array(
            // 'dark' => '#18A2B8',
            'dark' => '#0fa8b3',
            // 'light' => '#ECFDFF',
            'light' => '#EDF7F8',
        );

        if( array_key_exists($colorname, $colors) )
            return $colors[ $colorname ];

        return $colors['dark'];
    }
}

/*

if(! function_exists('elm_cpt_columnist_unknown') )
{
    function elm_cpt_columnist_unknown()
    {
        // code...
    }
}

add_action( 'pre_get_posts', 'elm_opinions_query' );
function elm_opinions_query( $query ){
    if( !is_admin() && $query->is_post_type_archive('opinions') ) // && $query->is_main_query()
    { 
        $query->set('posts_per_page', 5);
    }
}

*/


