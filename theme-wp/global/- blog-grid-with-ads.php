<?php 

// $categories = get_categories('hide_empty=0&exclude=10')

$order         = ['ASC','DESC'];
$post_cat      = get_the_category()[0];
$post_cat_id   = $post_cat->parent ?: $post_cat->term_id;
$categories_in = array_filter(ELM_CAT_IDS, function ($value) use ($post_cat_id ) {
                    return $value <> $post_cat_id;
                 });

$posts = get_posts([
    'post_status'  => 'publish',
    'numberposts'  => 18,
    'category__in' => $categories_in,
    'orderby'      => 'rand',
    'order'        => $order[ rand(0,1) ],
    'date_query'   => array(
        ['year' => date('Y'), 'compare' => '>='],
        ['month' => date('m'), 'compare' => '='],
    )
]);

?>

<?php if( $posts ): $posts_count = count($posts) ?>
<div class="container mb-5">
    <hr class="my-4">
    <p class="h2 font-weight-bold my-4">MÁS NOTICIAS</p>
    <div class="card-deck mb-4">
        <?php 
            for($i = 0; $i < 8; $i++): 
                $post_news = $posts[$i];
                $cat_news  = get_the_category($post_news->ID)[0];
        ?>

        <?php if( $i === 4 ): // Termina primera fila card-deck y comienza la segunda fila card-deck ?>
    </div>
    <div class="card-deck">
        <?php endif ?>

        <?php if( $i === null ): // 0  ?>
        <div class="card rounded-0">
            <p>Publicidad</p>
            <!-- <img class="card-img-top img-fluid" src="<?= elm_get_image_url('adpub.png') ?>" alt=""> -->
        </div>

        <?php elseif( $i === null ): // 7 ?>
        <div class="card rounded-0">
            <p>Publicidad</p>
            <!-- <img class="img-fluid w-100" src="<?= elm_get_image_url('adpub.png') ?>" alt=""> -->
        </div>

        <?php else: ?>
        <div class="card border-0 rounded-0">
            <a href="<?= get_permalink($post_news->ID) ?>" class="aspect-ratio-wrapper">
                <img class="card-img-top aspect-ratio-photo rounded-0 border-bottom" src="<?= elm_get_thumbnail($post_news->ID, 'medium') ?>" alt="<?= $post_news->post_title ?>">
            </a>
            <div class="card-body px-0 pt-1">
                <small class="small text-uppercase">
                    <span><?= elm_get_categories_links( $post_news->ID ) ?></span>
                    <span class="text-nowrap"><?= get_the_date('', $post_news->ID) ?></span>
                </small>
                <div class="card-text">
                    <a href="<?= get_permalink($post_news->ID) ?>" class="lead font-weight-bold"><?= $post_news->post_title ?></a>
                </div>
            </div>
        </div>

        <?php endif ?>

        <?php endfor ?>
    </div>
</div>
<?php endif ?>
