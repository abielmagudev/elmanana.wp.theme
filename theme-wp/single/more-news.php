<?php

$category = array_shift( get_the_category() );

$morenews_query = new WP_Query([
    'category__not_in' => [$category->term_id],
    'post_status' => 'publish',
    'posts_per_page' => 8,
    'status' => 'publish',
]);

?>
<div class="container">
    <p class="h2">Más noticias</p>
    <br>

    <?php if( $morenews_query->have_posts() ): ?>
    <div class="row">
        <?php while( $morenews_query->have_posts() ): $morenews_query->the_post() ?>
        <?php if( $morenews_query->current_post > 3 && wp_is_mobile() ) break ?>
        <div class="col-sm col-sm-3 mb-5 <?= $morenews_query->current_post > 3 ? 'd-none d-md-block' : '' ?>">
            <?php 
                elm_get_template_part('components/card-note', [
                    'post_category'  => array_shift( get_the_category() ),
                    'post_title'     => get_the_title(),
                    'post_permalink' => get_the_permalink(),
                    'post_date'      => get_the_date(),
                    'post_image'     => elm_get_the_post_thumbnail_url(get_the_ID(), 'medium'),
                ]); 
            ?> 
        </div>
        <?php endwhile ?>
    </div>
    <?php endif; wp_reset_postdata() ?>
</div>
<br>
