<?php

if(! function_exists('elm_facebook_featured_image') )
{
    function elm_facebook_featured_image()
    {
        if( is_single() )
        {
            global $post;
            $title       = get_the_title($post->ID);
            $description = has_excerpt($post->ID) ? get_the_excerpt($post->ID) : 'Leer notica completa en el sitio web elmanana.com.mx';
            $permalink   = get_the_permalink($post->ID);
    
            if( is_singular('opinions') )
            {
                $columnist = elm_cpt_opinions_get_columnist_post($post->ID);
                $image = $columnist->image;
            }
            elseif( has_post_thumbnail($post->ID) )
            {
                $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), "full")[0];
            }
            else
            {
                $image = elm_get_asset_url('images/missing_photo.jpg');
            }
    
            $metas = [
                'type'        => '<meta property="og:type" content="article" />',
                'title'       => '<meta property="og:title" content="'.$title.'" />',
                'description' => '<meta property="og:description" content="'.$description.'" />',
                'permalink'   => '<meta property="og:url" content="'.$permalink.'"/>',
                'image'       => '<meta property="og:image" content="'.$image.'" />',
                'itempro'     => '<meta itemprop="image" content="'.$image.'" />'
            ];
            echo implode('', $metas);
            return;
        }
    }
    add_action('wp_head', 'elm_facebook_featured_image');
}
