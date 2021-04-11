<?php 
$cat_360 = get_category_by_slug('360');
$cat_360->color = elm_get_category_color($cat_360->term_id);
?>
<div class="" style="background-color:#171717">
    <div class="container py-5">
        <div class="row align-items-start">

            <section class="col-sm">
                <?php if( have_posts() ): ?>
                <article>
                <?php while( have_posts() ): the_post() ?>
                    <p class="text-muted text-capitalize m-0"><?php the_date() ?></p>
                    <h1 class="text-white"><?php the_title() ?></h1>
                    <div>
                        <?php the_content() ?>
                    </div>
                <?php endwhile ?>
                </article>
                <?php else: ?>
                <p class="text-white text-center">VIDEO NO DISPONIBLE</p>
                <?php endif; wp_reset_query() ?>
            </section>

            <div class="col-sm col-sm-4">
                <?php 
                    $posts_360 = get_posts([
                        'category' => $cat_360->term_id,
                        'numberposts' => 6,
                        'offset' => 0,
                        'post__not_in' => array( get_the_ID() )
                    ]);

                    if( is_array($posts_360) && count($posts_360) ):
                ?>
                <p>
                    <img src="<?= elm_get_asset_url('images/360.png') ?>" alt="El Mañana 360" class="img-fluid">
                </p>
                <div>
                    <div class="list-group list-group-flush">
                        <?php foreach($posts_360 as $index => $note): ?>
                        <div class="list-group-item bg-dark my-2">
                            <p class="text-muted text-capitalize m-0">
                                <small><?= get_the_date('', $note) ?></small>
                            </p>
                            <h2 class="text-muted m-0" style="font-size:1rem">
                                <a href="<?= get_the_permalink($note) ?>" class="text-white"><?= $note->post_title ?></a>
                            </h2>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
                <a href="<?= get_category_link($cat_360) ?>" class="btn btn-lg btn-block text-white rounded-0 mt-2" style="background-color:<?= $cat_360->color ?>">Ver más videos</a>
                <?php endif; wp_reset_postdata() ?>
            </div>
        </div>
    </div>
</div>
<br>
