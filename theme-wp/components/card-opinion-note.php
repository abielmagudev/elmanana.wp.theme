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

<article class="card border-0 text-center">
    <a href="<?= $opinion->permalink ?>" class="px-5 pt-4">
        <img class="img-thumbnail w-100 rounded-circle" style="min-height:200px; max-height:200px" src="<?= $opinion->columnist_image ?>" alt="<?= $opinion->title ?>">
    </a>
    <div class="card-body">
        <p class="text-uppercase">
            <small><?= implode(', ', $opinion->columnist_sections) ?: 'Opinión' ?></small>
            <small class="text-muted d-none"><?= $opinion->date ?></small>
        </p>
        <a href="<?= $opinion->columnist_link ?>" class="text-info font-georgia m-0"><?= $opinion->columnist_name ?></a>
        <h1 class="card-text h5 font-weight-bold mb-3">
            <a href="<?= $opinion->permalink ?>" class="text-dark font-georgia"><?= $opinion->title ?></a>
        </h1>
    </div>
</article>

  

<?php /*
<div class="card-footer text-right d-none">
    <a href="#" class="badge badge-pill badge-warning p-2 text-white" data-toggle="tooltip" data-placement="top" title="Imágenes">
        <i class="fas fa-image"></i>
    </a>
    <a href="#" class="badge badge-pill badge-danger p-2" data-toggle="tooltip" data-placement="top" title="Video">
        <i class="fab fa-youtube"></i>
    </a>
    <a href="#" class="badge badge-pill badge-facebook p-2" data-toggle="tooltip" data-placement="top" title="Likes">
        <i class="fas fa-thumbs-up"></i>
        <span class="">4200</span>
    </a> 
</div>

*/ ?>