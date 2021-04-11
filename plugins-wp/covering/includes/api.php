<?php

function covering_get_posts()
{
    $positions = ['one', 'two', 'three'];
    $covers    = [];
    $posts     = cvr_get_covers_posts()['posts'];

    for($k = 0; $k < 3; $k++)
    {
        if( is_object($posts[$k]) )
        {
            $post_id       = $posts[$k]->ID;
            $title         = $posts[$k]->post_title;
            $name          = $posts[$k]->post_name;
            $excerpt       = $posts[$k]->post_excerpt;
            $thumbnail     = get_the_post_thumbnail_url($post_id , 'large');
            $permalink     = get_permalink($post_id );
            $date          = get_the_date('', $post_id );
            $category      = get_the_category( $post_id  )[0];
            $category_link = get_category_link($category->term_id);
    
            $props = [
                'id'            => $post_id,
                'title'         => $title,
                'name'          => $name,
                'excerpt'       => $excerpt,
                'thumbnail'     => $thumbnail,
                'permalink'     => $permalink,
                'date'          => $date,
                'category'      => $category,
                'category_link' => $category_link,
            ];
    
            $covers[ $positions[$k] ] = (object) $props;
        }
        else
        {
            $covers[ $positions[$k] ] = null;
        }
    }
    return $covers;
}
