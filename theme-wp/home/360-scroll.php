<?php

$cat_360 = get_category_by_slug('360');
$cat_360->color = elm_get_category_color($cat_306->term_id) ?: '#FF4706';

$posts_360 = get_posts([
    'category' => $cat_360->term_id,
    'numberposts' => 7,
    'sort_order' => 'desc',
    'status' => 'publish',
]);

if( is_array($posts_360) && count($posts_360) ):
?>
<br>
<div style="background-image: url('<?= elm_get_asset_url('images/bg-360.jpg') ?>');">
    <div class="py-5">
        <p class="text-center px-3">
            <img class="img-fluid" src="<?= elm_get_asset_url('images/360.png')?>" alt="El Mañana 360">
        </p>

        <div class="overflow-auto py-3" style="">
            <section class="d-flex flex-nowrap justify-content-between align-items-stretch">
                <div class="d-none d-md-block" style="min-width:36%"></div>
                <?php foreach($posts_360 as $index => $note): ?>
                <div class="ml-3" style="min-width:300px;background-color:black">
                    <?php elm_get_template_part('components/card-360-note', [
                        'post_image' => elm_get_the_post_thumbnail_url($note->ID, 'medium'),
                        'post_title' => $note->post_title,
                        'post_permalink' => get_the_permalink($note->ID),
                        'post_icon_color' => $cat_360->color,
                    ]) ?>
                </div>
                <?php endforeach ?>
                <div style="min-width:36%"></div>
            </section>
        </div>
        <br>

        <p class="text-center px-3">
            <a href="<?= get_category_link($cat_360->term_id) ?>" class="btn btn-lg rounded-pill text-white" style="background-color:<?= $cat_360->color ?>">Ver más videos</a>
        </p>
    </div>
</div>
<br>
<?php
endif;
wp_reset_postdata()
?>