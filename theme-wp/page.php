<?php get_header() ?>

<div class="container my-3">
    <?php while ( have_posts() ) : the_post() ?>
    
    <?php if( has_post_thumbnail() ): // the_post_thumbnail(); ?>
    <img class="img-fluid" src="<?= get_the_post_thumbnail_url( get_the_ID() ) ?>" alt="<?php the_title() ?>">
    <?php endif ?>

    <?php the_content() ?>
    <?php endwhile ?>
</div>

<?php get_footer() ?>