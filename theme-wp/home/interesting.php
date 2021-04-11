<?php 

// elm_get_categories_links( get_the_ID()  )

$interesting_posts = get_posts([
    'meta_key'    => 'interesting_news',
    'meta_value'  => 1,
    'order'       => 'desc',
    'numberposts' => 3,
]);

if( count($interesting_posts) ):
?>
<div class="container d-nonex">
    <!-- Interesante title -->
    <div class="d-flex justify-content-between">
        <div style="margin-bottom:-0.95rem">
            <p class="display-4 font-weight-bold m-0 mr-2">Interesante</p>
        </div>
        <div class="flex-grow-1 border-bottom" style="border-width:0.45rem !important;border-color:black !important"></div>
    </div>
    <br>

    <!-- Interesante content -->
    <section class="card-deck">
        <?php
            foreach($interesting_posts as $item)
            {
                elm_get_template_part('components/card-interesting-note', [
                    'post_category'  => array_shift( get_the_category($item->ID) ),
                    'post_date'      => get_the_date('', $item->ID),
                    'post_image'     => elm_get_the_post_thumbnail_url($item->ID, 'medium'),
                    'post_permalink' => get_the_permalink($item->ID),
                    'post_title'     => $item->post_title,
                ]);
            }
        ?>
    </section>
</div>
<?php endif; wp_reset_postdata() ?>
<br>