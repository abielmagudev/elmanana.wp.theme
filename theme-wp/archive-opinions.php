<?php

$color_light = elm_cpt_opinions_color('light');
$color_dark = elm_cpt_opinions_color('dark');
$opinions_columnist = get_post_type_archive_link('opinions') . "?columnista=";

get_header();
?>

<div class="" style="background-color:<?= $color_dark ?>;border-top: 2px solid #501121">
    <div class="container py-2">
        <p class="text-white text-uppercase text-center font-weight-bold small m-0">OPINIÓN</p>
    </div>
</div>
<div class="bg-light">
    <br>
    <div class="container">
        <div class="row">
            <section class="col-sm">
            <?php if( have_posts() ): ?>
            <?php while ( have_posts() ): the_post() ?>
            <?php $columnist = elm_cpt_opinions_get_columnist_post( get_the_ID() ) ?>
                <?php elm_get_template_part('components/block-opinion-note', [
                    'opinion_title' => get_the_title(),
                    'opinion_permalink' => get_the_permalink( get_the_ID() ),
                    'columnist_name' => $columnist->name,
                    'columnist_sections' => $columnist->sections,
                    'columnist_image' => $columnist->image,
                    'columnist_link' => $opinions_columnist . $columnist->slug,
                ]) ?>
                <br>
            <?php endwhile ?>

            <?php get_template_part('global/pagination') ?>

            <?php endif; wp_reset_query()  ?>
            </section>

            <div class="col-sm col-sm-4 order-first order-md-last">
                <?php get_sidebar('columnists') ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer() ?>