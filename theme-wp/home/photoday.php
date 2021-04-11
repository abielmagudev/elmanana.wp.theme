<?php

$dayphoto = elm_get_last_one_post('photosday');

if( is_object($dayphoto) && has_post_thumbnail( $dayphoto->ID ) ):
?>
<section class="py-5" style="background-color:black">
    <article class="container my-5 py-5">
        <p class="h1 d-block d-md-none text-center">
            <span class="d-block text-white font-georgia">La</span>
            <span class="d-block text-danger display-1 font-weight-bold" style="margin: -1.5rem 0 -1.5rem 0">Foto</span>
            <span class="d-block text-white font-georgia display-4">del día</span>
        </p>
        <br>
        <div class="row align-items-center">
            <div class="col-md">
                <img class="img-fluid rounded-0" 
                     src="<?= get_the_post_thumbnail_url( $dayphoto->ID, 'large' ) ?>" 
                     alt="<?= $dayphoto->post_title ?>"
                     style="border:0.5rem solid white">
                <br>
            </div>

            <div class="col-md col-md-4">
                <p class="h1 d-none d-md-block">
                    <span class="d-block text-white font-georgia">La</span>
                    <span class="d-block text-danger display-1 font-weight-bold" style="margin: -1.5rem 0 -1.5rem 0">Foto</span>
                    <span class="d-block text-white font-georgia display-4">del día</span>
                </p>
                <br>
                <blockquote class="blockquote text-white text-center text-md-left">
                    <small class="blockquote-footer text-capitalize"><?= get_the_date('', $dayphoto->ID)?></small> 
                    <span><?= wp_strip_all_tags($dayphoto->post_content) ?></span>
                </blockquote>
            </div>
        </div>
    </article>
</section>
<br>
<?php endif; wp_reset_postdata() ?>