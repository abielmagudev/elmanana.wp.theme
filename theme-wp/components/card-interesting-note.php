<?php

// The vars $post_settings come from elm_get_template_part($templante_name, $post_settings)
$note = (object) array(
    'author'    => isset($post_author)    ? $post_author : get_the_author_meta('display_name'),
    'category'  => isset($post_category)  ? $post_category : false,
    'date'      => isset($post_date)      ? $post_date : get_the_date(),
    'excerpt'   => isset($post_excerpt)   ? esc_html( $post_excerpt ) : false,
    'id'        => isset($post_id)        ? $post_id : get_the_ID(),
    'image'     => isset($post_image)     ? $post_image : false,
    'backimage' => isset($post_backimage) ? $post_backimage : 'dark',
    'permalink' => isset($post_permalink) ? esc_url( $post_permalink ) : '#',
    'title'     => isset($post_title)     ? esc_html( $post_title ) : esc_html( get_the_title() ),
);

?>

<article class="card text-white border-0 rounded-0" style="background-color:black">
    <div class="card-top-image p-3" style="background-image:url('<?= $note->image ?>');background-size:cover;backdrop-filter: grayscale(0.5) !important;">
        <a href="<?= $note->permalink ?>">
            <img src="<?= $note->image ?>" alt="<?= $note->title ?>" class="w-100" style="height:auto;max-height:200px !important">
        </a>
    </div>
    <div class="card-body py-1">
        <div class="d-flex justify-content-between mb-1">
            <div>
                <?php

                if( is_object($note->category) )
                {
                    elm_get_template_part('components/badge-category-note', [
                        'badge_title'      => $note->category->name,
                        'badge_background' => elm_get_category_color($note->category->term_id),
                        'badge_permalink'  => get_category_link($note->category),
                    ]);
                }

                ?>
            </div>
            <div>
                <small class="text-capitalize"><?= $note->date ?></small>
            </div>
        </div>
        <h1 class="h5">
            <a href="<?= $note->permalink ?>" class="text-white"><?= $note->title ?></a>
        </h1>
    </div>
</article>
