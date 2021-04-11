<?php get_template_part('partners/facebook/connect-code') ?>
<?php if( function_exists('the_ad_placement') ) { the_ad_placement('elmanana_notaros_300x250_mobile_atf'); } ?>
<br>
<div class="container">
    
    <div class="row">
        <div class="col-sm">
        <?php if( function_exists('the_ad_placement') ) the_ad_placement('elmanana_notaros_728x90_desktop_atf') ?>
            
        <?php if( have_posts() ): ?>
            <section>

                <?php while( have_posts() ): the_post(); $category_post = array_shift( get_the_category() ) ?>
                <article class="">
                    <header class="">
                        
                        <div class="d-flex justify-content-between align-item-center">
                            <div>
                            <?php if( function_exists('elm_get_template_part') ): ?>
                                <?php
                                elm_get_template_part('components/badge-category-note', [
                                    'badge_title'      => $category_post->name,
                                    'badge_background' => elm_get_category_color($category_post->term_id),
                                    'badge_permalink'  => get_category_link($category_post),
                                ])
                                ?>
                            <?php endif ?>
                            </div>

                            <div>
                                <small class="text-capitalize"><?php the_date() ?></small>
                            </div>
                        </div>

                        <h1 class=""><?php the_title() ?></h1>
                        <br>
                
                        <figure class="figure w-100 text-center" style="background-color:black">
                        <?php if( has_post_thumbnail() ): $thumbnail = elm_get_thumbnail_info( get_post_thumbnail_id() ) ?>
                            <img class="figure-img img-fluid my-0" src="<?= get_the_post_thumbnail_url(get_the_ID(), 'medium_large') ?>" alt="<?= $thumbnail->alt ?>">
                            <?php if(! empty($thumbnail->caption) ): ?>
                            <figcaption class="figure-caption text-white p-2">
                                <small><?= $thumbnail->caption ?></small>
                            </figcaption>
                            <?php endif ?>

                        <?php else: ?>
                            <img class="figure-img img-fluid my-0" src="<?= elm_get_image_elmanana_url('dark') ?>" alt="<?php the_title() ?>">

                        <?php endif ?>
                        </figure>
                        <br>
                        <br>

                        <?php if( has_excerpt() ): ?>
                        <p class="border-left pl-2" style="border-width:0.25rem !important"><em><?= get_the_excerpt() ?></em></p>
                        <?php endif ?>

                        <p class="text-right">
                            <span>Por</span> 
                            <b><?= get_field('source_news') ?: 'Redacción El Mañana' ?></b>
                        </p>
                    </header>
                    <br>

                    <div class="content">
                        <?php the_content() ?>
                    </div>
                </article>
                
                <?php if( has_tag() ): $tags = get_the_tags() ?>
                <hr class="">
                <p>
                <?php foreach($tags as $tag): ?>
                    <a href="<?= get_tag_link($tag) ?>" class='btn btn-outline-primary btn-sm rounded-pill text-capitalize'><?= $tag->name ?></a> 
                <?php endforeach ?>
                </p>
                <?php endif ?>

                <?php endwhile ?>

            </section>
        <?php endif; wp_reset_query() ?>
        </div>

        <div class="col-sm col-sm-4">
            <?php get_sidebar('single') ?>
        </div>
    </div>

    <hr class="my-5">
</div>

<div>
    <script type="text/javascript" src="https://www5.smartadserver.com/ac?pgid=592805&insid=8881608&tmstp=[timestamp]&out=js&clcturl=[countgoEncoded]"></script>
    <noscript></noscript>
</div>

<?php /*
<p class="text-right d-none">
    <a href="#" class="badge badge-pill badge-warning p-2 text-white" data-toggle="tooltip" data-placement="top" title="Imágenes">
        <i class="fas fa-image"></i>
    </a>
    <a href="#" class="badge badge-pill badge-danger p-2" data-toggle="tooltip" data-placement="top" title="Video">
        <i class="fab fa-youtube"></i>
    </a>
    <a href="#" class="badge badge-pill badge-facebook p-2" data-toggle="tooltip" data-placement="top" title="Likes">
        <i class="fas fa-thumbs-up"></i>
        <span class="">4200</span>
    </a> 
</p>
*/ ?>