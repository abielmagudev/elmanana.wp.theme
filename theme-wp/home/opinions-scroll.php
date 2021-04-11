<?php

$color_dark = elm_cpt_opinions_color('dark');
$color_light = elm_cpt_opinions_color('light');
$opinions_columnist = get_post_type_archive_link('opinions') . "?columnista=";

$opinions_posts = get_posts([
    'numberposts' => 7,
    'order' => 'desc',
    'post_status' => 'publish',
    'post_type' => 'opinions',
]);

if( is_array($opinions_posts) && count($opinions_posts) ):
?>
<br>
<div class="position-relative bg-light" style="border-top:1rem solid <?= $color_dark ?>">
    <span class="position-absolute bg-light border-top border-info display-4 font-georgia py-2 px-4" style="border-width:1rem !important;color:<?= $color_dark ?>;top:-3rem;left:5%">Opinión</span>
    
    <br>
    <br>
    <div class="overflow-auto py-3">
        <section class="d-flex flex-nowrap align-items-stretch">
            <div style="min-width:37%"></div>
            <?php foreach($opinions_posts as $index => $opinion): $columnist = elm_cpt_opinions_get_columnist_post($opinion->ID) ?>
            <div class="bg-white shadow-sm border border-white mx-2" style="min-width:300px">
                <?php elm_get_template_part('components/card-opinion-note', [
                    'opinion_title' => $opinion->post_title,
                    'opinion_permalink' => get_the_permalink($opinion->ID),
                    'columnist_name' => $columnist->name,
                    'columnist_sections' => $columnist->sections,
                    'columnist_image' => $columnist->image,
                    'columnist_link' => $opinions_columnist . $columnist->slug,
                ]) ?>
            </div>
            <?php endforeach ?>
            <div style="min-width:37%"></div>
        </section>
    </div>
    <br>

    <div class="text-center">
        <a href="<?= get_post_type_archive_link('opinions') ?>" class="btn btn-info btn-lg font-georgia rounded-pill">Más opiniones</a>
    </div>
    <br>
</div>
<br>
<?php endif; wp_reset_postdata() ?>