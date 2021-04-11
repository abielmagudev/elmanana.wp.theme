<?php

$featured_query = new WP_Query([
    'category__in'   => elm_get_categories_public(),
    'meta_key'       => 'featured_news',
    'meta_value'     => 1,
    'order'          => 'desc',
    'posts_per_page' => 10,
    'status'         => 'publish',
]);

?>
<div class="container">
    <div class="row">
        <div class="col-sm">
            <?php get_template_part('partners/ads/home_position_2') ?>

            <?php if( $featured_query->have_posts() ): ?>
            <section>
                <ul class="list-group list-group-flush">
                <?php while( $featured_query->have_posts() ): $featured_query->the_post() ?>
                    <li class="list-group-item px-0 py-3">
                        <?php 
                        elm_get_template_part('components/block-note', [
                            'post_category'  => array_shift( get_the_category() ),
                            'post_title'     => get_the_title(),
                            'post_permalink' => get_the_permalink(),
                            'post_excerpt'   => get_the_excerpt(),
                            'post_image'     => elm_get_the_post_thumbnail_url(get_the_ID(), 'thumbnail'),
                        ]); 
                        ?>
                    </li>
                <?php endwhile ?>
                </ul>
            </section>
            <?php endif; wp_reset_postdata() ?>
            
            <?php get_template_part('partners/ads/home_position_3') ?>
        </div>

        <div class="col-sm col-sm-4">
            <?php get_sidebar() ?>
        </div>
    </div>
</div>
<br>
