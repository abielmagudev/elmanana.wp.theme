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
<article class="row no-gutters">
    <div class="col pt-1">
        <?php elm_get_template_part('components/image-16x9-note', [
            'image_url' => $note->image,
            'image_alt' => $note->title,
            'image_link' => $note->permalink,
        ]) ?>
    </div>
    <div class="col-9 pl-3">
        <div class="d-flex justify-content-between align-items-center mb-1">
            <?php if( function_exists('elm_get_category_color') && is_object($note->category) ): ?>
            <div>
                <?php elm_get_template_part('components/badge-category-note', [
                        'badge_title'      => $note->category->name,
                        'badge_background' => elm_get_category_color($note->category->term_id),
                        'badge_permalink'  => get_category_link($note->category),
                    ]); ?>
            </div>
            <?php endif ?>
            <div>
                <small class="text-capitalize"><?= $note->date ?></small>
            </div>
        </div>
        <h1 class="h5 font-weight-bold">
            <a href="<?= $note->permalink ?>" class="text-primary"><?= $note->title ?></a>
        </h1>
        <p class="d-none d-md-block"><?= $note->excerpt ?></p>
    </div>
</article>
