<?php
$breakingnews_posts = get_posts([
    'meta_key'   => 'breaking_news',
    'meta_value' => 1,
    'order'      => 'desc',
    'date_query' => array(
        [
            'after' => '24 hours ago'
        ]
    )   
]);

if( count($breakingnews_posts) ): $active = 'active';
?>

<div class="bg-danger">
    <div class="container small" id="alertUltimasNoticias">
        <div class="d-flex justify-content-between align-items-center">

            <div class="d-none d-md-block pr-3">
                <p class="text-white text-uppercase m-0">Últimas noticias</p>
            </div>

            <div class="flex-grow-1 overflow-hidden">
                <div id="carouselUltimas" class="carousel carousel-fade-x slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php foreach( $breakingnews_posts as $index => $post ): ?>
                        <article class="carousel-item <?= $active ?> text-truncate">
                            <a class="font-weight-bold text-white" href="<?= get_the_permalink($post) ?>"><?= $post->post_title ?></a>
                        </article>
                        <?php $active = ''; endforeach ?>
                    </div>     
                </div>  
            </div>

            <div class="">
                <a href="#!" class="btn text-white" id="toggleAlertUltimasNoticias">
                    <i class="fas fa-times"></i>
                </a>
            </div>
        </div>
    </div>
</div>
<?php endif; wp_reset_postdata() ?>
