<?php 

if( empty( get_search_query() ) ) 
    wp_redirect( home_url() );

get_header()
?>
<br>
<div class="container">
    <div class="row">
        <div class="col-sm">
            <?php if( have_posts() ): ?>
            <br>
            <section>
                <p class="h2 m-0">
                    <span>Busqueda:</span>  
                    <span class="text-primary"><?php the_search_query() ?></span>
                </p>
                <p>
                    <span class="badge badge-primary rounded-0 align-middle"><?= elm_get_query_counter() ?></span>
                    <span class="text-muted align-middle">Resultados</span>
                </p>
                <div>
                    <ul class="list-group list-group-flush">
                        <?php while( have_posts() ): the_post() ?>
                        <li class="list-group-item px-0 py-3">
                            <?php 
                            elm_get_template_part('components/block-note', [
                                'post_category'  => array_shift( get_the_category() ),
                                'post_title'     => get_the_title(),
                                'post_permalink' => get_the_permalink(),
                                'post_excerpt'   => get_the_excerpt(),
                                'post_image'     => elm_get_the_post_thumbnail_url(get_the_ID(), 'medium'),
                            ]); 
                            ?>
                        </li>
                        <?php endwhile ?>
                    </ul>
                </div>
            </section>
            <?php get_template_part('global/pagination') ?>
            <?php endif; wp_reset_query() ?>
        </div>
        <div class="col-sm col-sm-4">
            <?php get_sidebar('search_tag') ?>
        </div>
    </div>
</div>
<br>
<?php get_footer() ?>
