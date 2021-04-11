<?php

$freeverb = elm_get_last_one_post('freeverbs');

if( is_object($freeverb) ):
?>
<section class="container py-5">
    <article class="blockquote text-center">
        <p class="text-primary text-uppercase mb-1">
            <b>_<span class="font-weight-normal">VERBO</span> LIBRE_</b>
        </p>
        <p class="font-georgia"><?= wp_strip_all_tags( $freeverb->post_content ) ?></p>
    </article>
</section>
<?php endif ?>
