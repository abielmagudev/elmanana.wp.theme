<?php 

$category = get_queried_object();
$category->color = elm_get_category_color($category->term_id);

get_header();
?>
<div class="" style="background-color:<?= $category->color ?>;border-top: 2px solid #501121">
    <div class="container py-2">
        <p class="text-white text-uppercase text-center font-weight-bold small m-0"><?= $category->name ?></p>
    </div>
</div>
<br>
<div class="container">
    <div class="row">

        <div class="col-sm">
            <?php if( have_posts() ): ?>
            <section>
                <ul class="list-group list-group-flush">
                    <?php while( have_posts() ): the_post() ?>
                    <li class="list-group-item px-0 py-3">
                        <?php 
                        elm_get_template_part('components/block-note', [
                            'post_category'  => $category,
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
            <?php get_template_part('global/pagination') ?>

            <?php endif; wp_reset_query() ?>
            </div>

        <div class="col-sm col-sm-4">
            <?php get_sidebar('ads') ?>
        </div>
    </div>
</div>

<?php get_footer('category') ?>