<?php

// The vars $post_settings come from elm_get_template_part($templante_name, $post_settings)

$note = (object) array(
    'author'    => isset($post_author)    ? $post_author : get_the_author_meta('display_name'),
    'category'  => isset($post_category)  ? $post_category : false,
    'date'      => isset($post_date)      ? $post_date : get_the_date(),
    'excerpt'   => isset($post_excerpt)   ? esc_html( $post_excerpt ) : false,
    'id'        => isset($post_id)        ? $post_id : get_the_ID(),
    'image'     => isset($post_image)     ? $post_image : '#!',
    'back_image' => isset($post_back_image) ? $post_back_image : 'dark',
    'permalink' => isset($post_permalink) ? esc_url( $post_permalink ) : '#',
    'title'     => isset($post_title)     ? esc_html( $post_title ) : esc_html( get_the_title() ),
);

?>

<article class="card border-0 rounded-0">
    <a href="<?= $note->permalink ?>" class="bg-dark aspect-ratio-frame">
        <img class="card-img-top rounded-0 aspect-ratio-16x9" src="<?= $note->image ?>" alt="<?= $note->title ?>">
    </a>
    <div class="card-body px-0 py-1">
        <div class="d-flex justify-content-between mb-1">
            <?php if( function_exists('elm_get_category_color') && is_object($note->category) ): ?>
            <div>
                <?php
                    elm_get_template_part('components/badge-category-note', [
                        'badge_title'      => $note->category->name,
                        'badge_background' => elm_get_category_color($note->category->term_id),
                        'badge_permalink'  => get_category_link($note->category),
                    ]);                
                ?>
            </div>
            <?php endif ?>
            <div>
                <small class="text-capitalize"><?= $note->date ?></small>
            </div>
        </div>
        <h1 class="card-text h5 font-weight-bold">
            <a href="<?= $note->permalink ?>" class="text-primary"><?= $note->title ?></a>
        </h1>
        <?php if( is_string($note->excerpt) ): ?>
        <p><?= $note->excerpt ?></p>
        <?php endif ?>
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