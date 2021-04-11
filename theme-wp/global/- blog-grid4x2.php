<?php

$posts = get_posts([
    'post_status'  => 'publish',
    'numberposts'  => 8,
    'category__not_in' => $post->post_category,
]);

?>


<?php if( $posts ): ?>
<section class="container">
    <hr>
    <h1 class="h2">
        <span class="align-top-text text-primary">+</span>
        <span class="align-middle">Más noticias</span>
    </h1>
    <br>
    <div class="row">

        <?php $num_col = 1 ?>
        <?php foreach($posts as $note): if( $num_col > 4 && wp_is_mobile() ) break; ?>
        <div class="col-sm col-sm-3 mb-5 <?= $num_col > 4 ? 'd-none d-md-block' : '' ?>">
            <article class="card border-0">
                <a href="<?= get_permalink($note->ID) ?>" class="bg-dark aspect-ratio-wrapper">
                    <img class="card-img-top aspect-ratio-photo rounded-0 border-bottom" src="<?= elm_get_thumbnail($note->ID, 'medium') ?>" alt="<?= $note->post_title ?>">
                </a>
                <div class="card-body px-0 py-2">
                    <div class="d-flex justify-content-between text-uppercase mb-2">
                        <small class=""><?= elm_get_categories_links( $note->ID ) ?></small>
                        <small class="text-nowrap text-right"><?= get_the_date('', $note->ID) ?></small>
                    </div>
                    
                    <div class="card-text">
                        <a href="<?= get_permalink($note->ID) ?>" class="lead font-weight-bold"><?= $note->post_title ?></a>
                    </div>
                </div>
            </article>
        </div>
        <?php $num_col++; endforeach ?>

    </div>
</section>
<br>
<?php endif ?>