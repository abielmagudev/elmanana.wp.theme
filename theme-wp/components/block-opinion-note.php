<?php

// The vars $post_settings come from elm_get_template_part($templante_name, $post_settings)

$opinion = (object) array(
    'author'    => isset($opinion_author) ? $opinion_author : get_the_author_meta('display_name'),
    'date'      => isset($opinion_date) ? $opinion_date : get_the_date(),
    'id'        => isset($opinion_id) ? $opinion_id : get_the_ID(),
    'image'     => isset($opinion_image)  ? $opinion_image : '#!',
    'back_image' => isset($opinion_back_image) ? $opinion_back_image : 'dark',
    'permalink' => isset($opinion_permalink) ? esc_url( $opinion_permalink ) : '#',
    'title'     => isset($opinion_title) ? esc_html( $opinion_title ) : esc_html( get_the_title() ),
    'columnist_name' => isset($columnist_name) ? esc_html( $columnist_name ) : 'columnista',
    'columnist_sections' => isset($columnist_sections) ? $columnist_sections : [],
    'columnist_image' => isset($columnist_image) ? $columnist_image : '#!',
    'columnist_link' => isset($columnist_link) ? $columnist_link : '#!',
);

?>
<article class="card shadow-sm border-0 rounded-0 text-center text-md-left">
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-sm mb-3 mb-md-0">
                <a href="<?= $opinion->permalink ?>" class="">
                    <img src="<?= $opinion->columnist_image ?>" alt="<?= $opinion->columnist_name ?>" style="max-height:150px;min-height:150px;max-width:150px" class="img-thumbnail w-100 rounded-circle">
                </a>
            </div>
            <div class="col-sm col-sm-9">
                <p class=" text-uppercase small m-0"><?= implode(', ', $opinion->columnist_sections) ?: 'Opinión' ?></p>
                <p>
                    <a href="<?= $opinion->columnist_link ?>" class="font-georgia" style="color:<?= elm_cpt_opinions_color('dark') ?>"><?= $opinion->columnist_name ?></a>
                </p>
                <h2 class="h4">
                    <a href="<?= $opinion->permalink ?>" class="text-dark font-georgia"><?= $opinion->title ?></a>
                </h2>
            </div>
        </div>
    </div>
</article>