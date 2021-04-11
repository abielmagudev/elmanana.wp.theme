<?php 

$columnist = elm_cpt_opinions_get_columnist_post( get_the_ID() );

$opinions_columnist_query = new WP_Query([
    'post_type'      => 'opinions',
    'posts_per_page' => 7,
    'post__not_in'   => array( get_the_ID() ),
    'tax_query'      => array(
        [
            'taxonomy' => 'columnists',
            'field'    => 'id',
            'terms'    => $columnist->id
        ],
    )
]);

?>
<p class="">Más opiniones de <br><strong class="lead font-georgia" style="color:<?= elm_cpt_opinions_color('dark') ?>"><?= $columnist->name ?></strong></p>
<div>
    <div class="list-group list-group-flush">
        <?php if( $opinions_columnist_query->have_posts() ): ?>

        <?php while( $opinions_columnist_query->have_posts() ): $opinions_columnist_query->the_post() ?>
        <div class="list-group-item px-0">
            <small class="text-capitalize text-muted"><?php the_date() ?></small>
            <p>
                <a href="<?= get_the_permalink() ?>" class='text-dark font-weight-bold font-georgia'><?php the_title() ?></a>
            </p>
        </div>
        <?php endwhile ?>

        <?php endif ?>
    </div>
</div>