<?php 

$category_post = array_shift( get_the_category() );

$relatednews = new WP_Query([
    'cat' => $category_post->term_id,
    'offset' => 0,
    'post__not_in' => array( get_the_ID() ),
    'posts_per_page' => 4,
]);

?>

<aside class="">
    <?php if( function_exists('the_ad_placement') ): ?>
    <div style="width: 300px; margin: 0 auto 20px auto;">
        <?php the_ad_placement('elmanana_notaros_300x250_desktop_atf') ?>
    </div>
    <?php endif ?>

    <!-- Noticias relacionadas - sidebar -->
    <?php if( $relatednews->have_posts() ): ?>
    <section>
        <?php while( $relatednews->have_posts() ): $relatednews->the_post() ?>
        <?php if( $relatednews->current_post > 1 && wp_is_mobile() ) break ?>
        <div class="<?= $relatednews->current_post > 1 ? 'd-none d-md-block' : '' ?>">
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
        <br>
        <?php endwhile ?>
    </section>
    <?php endif; wp_reset_postdata() ?>

    <?php if( function_exists('the_ad_placement') ): ?> 
    <div style="width: 300px; margin: 20px auto 0 auto;">
        <?php the_ad_placement('elmanana_notaros_300x600_desktop_btf1') ?>
    </div>
    <?php endif ?>

    <?php if( function_exists('the_ad_placement') ): ?> 
    <div style="width: 300px; margin: 20px auto 0 auto;">
        <?php the_ad_placement('elmanana_notaros_300x600_desktop_btf2') ?>
    </div>
    <?php endif ?>

</aside>
