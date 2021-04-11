<?php

function cvr_save_covers()
{    
    if( $urls = cvr_get_urls($_POST) )
    {
        $posts_id  = cvr_get_posts_id($urls);
        $covers_id = cvr_get_covers_id($posts_id);
        $status    = cvr_put_contents($covers_id) ? 1 : 0;
    }
    else
    {
        $status = 2;
    }

    return wp_safe_redirect( wp_get_referer() . '&status='.$status );
}

function cvr_get_urls($request)
{
    if( isset($request['urls']) && count($request['urls']) ) 
        return $request['urls'];

    return false;
}

function cvr_get_posts_id(array $urls)
{
    $posts_id = [];
    foreach($urls as $url)
    {
        $post_id = filter_var($url, FILTER_VALIDATE_URL) ? url_to_postid($url) : null;
        array_push($posts_id, $post_id);       
    }
    return $posts_id;
}

function cvr_get_covers_id($posts_id)
{
    $stored = cvr_get_contents();
    $covers_id = [];

    foreach($posts_id as $key => $post_id)
    {
        $pid = $post_id;
        if( is_null($pid) )
        {
            if( isset( $stored->covers_id[$key] ) )
                $pid = $stored->covers_id[$key];
        }

        array_push($covers_id, $pid);
    }

    return $covers_id;
}

function cvr_get_stored()
{
    return cvr_get_contents();
}

function cvr_put_contents($covers_id)
{
    $path = cvr_get_path_storage();
    $data['covers_id']  = $covers_id;
    $data['updated'] = cvr_timestamp_now();
    return file_put_contents($path, json_encode($data));
}

function cvr_get_contents()
{
    $path = cvr_get_path_storage();
    if( file_exists( $path ) )
        return json_decode( file_get_contents($path) );
    
    return;
}

function cvr_get_covers_posts()
{
    $posts = [];
    $updated = false;
    if( $contents = cvr_get_contents() )
    {
        foreach($contents->covers_id as $cover_id)
        {
            $post = null;
            if( !is_null($cover_id) && get_post_status($cover_id) )
            {
                $post = get_post($cover_id);
            }
            array_push($posts, $post);
        }
        $updated = $contents->updated;
    }

    return [
        'posts' => $posts,
        'updated' => $updated
    ];
}

function cvr_get_post($post_id)
{
    $cat = get_the_category( $post_id )[0];
    return [
        'post_id'   => $post_id,
        'title'     => get_the_title( $post_id ),
        'excerpt'   => get_the_excerpt( $post_id ),
        'permalink' => get_the_permalink( $post_id ),
        'thumbnail' => get_the_post_thumbnail_url($post_id, 'large'),
        'date'      => get_the_date( '', $post_id ),
        'cat_id'    => $cat->term_id,
        'cat_name'  => $cat->name,
        'cat_slug'  => $cat->slug,
        'cat_permalink'  => get_category_link( $cat->term_id ),
    ];
}

function cvr_get_path_storage()
{
    return cvr()->getSetting('path').'covers.txt';
}