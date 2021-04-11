<?php
$cats_pub_ids = elm_get_categories_public_only([
                    'global',
                    'cultura',
                    'tecnologia',
                    'deportes',
                    'escena',
                ]);

if( count($cats_pub_ids) ):
    foreach($cats_pub_ids as $cat_pub_id):
?>

<?php
$summary_posts = get_posts([
    'category' => $cat_pub_id,
    'numberposts' => 4,
    'sort_order' => 'desc',
    'status' => 'publish',
]);

if( is_array($summary_posts) && count($summary_posts) ):
    $category_summary = get_category($cat_pub_id);
    $category_summary->color = function_exists('elm_get_category_color') ? elm_get_category_color($cat_pub_id) : '#111111';
?>

<br>
<section class="container">
    <div class="d-flex justify-content-between align-items-center">
        <div class="flex-grow-1">
            <p class="text-white text-uppercase p-3" style="background-color:<?= $category_summary->color ?>"><?= $category_summary->name ?></p>
        </div>
        <div>
            <p class="bg-dark p-3">
                <a href="<?= get_category_link($category_summary) ?>" class="text-white text-uppercase px-3">Más</a>
            </p>
        </div>
    </div>
    <div class="row">
<?php 
    foreach( $summary_posts as $index => $note ):
        if( $index === 0 ): // First column
?>
        <div class="col-sm pt-0 pt-md-3">
            <?php elm_get_template_part('components/card-note', [
                'post_excerpt'   => $note->post_excerpt,
                'post_image' => elm_get_the_post_thumbnail_url($note->ID, 'medium'),
                'post_permalink' => get_the_permalink($note->ID),
                'post_title' => $note->post_title,
            ]) ?>
            <hr class="d-block d-md-none">
        </div>

        <?php else: // Second column ?>
        <?php if( $index === 1 ): ?>
        <div class="col-sm">
            <ul class="list-group list-group-flush">
        <?php endif ?>

                <li class="list-group-item px-0">
                <?php elm_get_template_part('components/block-note', [
                    'post_image' => elm_get_the_post_thumbnail_url($note->ID),
                    'post_permalink' => get_the_permalink($note->ID),
                    'post_title' => $note->post_title,
                ]) ?>
                </li>

        <?php if( $index === 4 ): ?>
            </ul>
        </div>
        <?php endif ?>
        
<?php // End of FOREACH Query
        endif;
    endforeach; wp_reset_postdata()
?>
    </div>
</section>
<br>

<?php // End of IF Query
endif
?>

<?php // End of CATEGORIES PUBLIC
    endforeach; 
endif 
?>
