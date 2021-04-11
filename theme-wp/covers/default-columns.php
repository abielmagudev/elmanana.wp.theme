<?php if( function_exists('covering_get_posts') ): $covering_posts = covering_get_posts() ?>
<?php if( is_array($covering_posts) && count($covering_posts) ): $covers = (object) $covering_posts ?>
<div>
    <div class="d-none d-md-block">
        <br>
    </div>
    <div class="container">
        <div class="row">
            <!-- Main post -->
            <?php if( is_object($covers->one) ): ?>
            <section class="col-sm p-0">
                <article class="card bg-dark text-white border-0 rounded-0 h-100">
                    <a href="<?= $covers->one->permalink ?>">
                        <img src="<?= get_the_post_thumbnail_url($covers->one->id, 'medium_large') ?>" alt="<?= $covers->one->title ?>" class="card-img-top rounded-0">
                    </a>
                    <div class="card-body py-1">
                        <div class="d-flex justify-content-between mb-1">
                            <div>
                                <?php 
                                    // $covers->one->category = array_shift( get_the_category($item->ID) );
                                    elm_get_template_part('components/badge-category-note', [
                                        'badge_title'      => $covers->one->category->name,
                                        'badge_background' => elm_get_category_color($covers->one->category->term_id),
                                        'badge_permalink'  => get_category_link($covers->one->category->cat_ID),
                                    ]);
                                ?>
                            </div>
                            <div>
                                <small class="text-capitalize"><?= $covers->one->date ?></small>
                            </div>
                        </div>
                        <h1 class="">
                            <a href="<?= $covers->one->permalink ?>" class="text-white"><?= $covers->one->title ?></a>
                        </h1>
                        <p><?= $covers->one->excerpt ?></p>
                    </div>
                </article>
            </section>
            <?php endif ?>

            <!-- Secondaries posts -->
            <section class="col-sm col-sm-4">
                <!-- Ad -->
                <div class="card bg-dark rounded-0 d-none d-md-block">
                    <?php if( function_exists('the_ad_placement') ) the_ad_placement('elmanana_home_300x250_desktop_atf') ?>
                </div>
                <br>

                <!-- Submain post -->
                <?php if( is_object($covers->two) ): ?>
                <article class="card bg-dark text-white border-0 rounded-0">
                    <a href="<?= $covers->two->permalink ?>">
                        <img src="<?= get_the_post_thumbnail_url($covers->two->id, 'medium_large') ?>" alt="<?= $covers->two->title ?>" class="card-img-top rounded-0">
                    </a>
                    <div class="card-body py-1">
                        <div class="d-flex justify-content-between mb-1">
                            <div>
                                <?php
                                    elm_get_template_part('components/badge-category-note', [
                                        'badge_title'      => $covers->two->category->name,
                                        'badge_background' => elm_get_category_color($covers->two->category->term_id),
                                        'badge_permalink'  => get_category_link($covers->two->category->cat_ID),
                                    ]);
                                ?>
                            </div>
                            <div>
                                <small class="text-capitalize"><?= $covers->two->date ?></small>
                            </div>
                        </div>
                        <h1 class="h5 font-weight-bold">
                            <a href="<?= $covers->two->permalink ?>" class="text-white"><?= $covers->two->title ?></a>
                        </h1>
                        <p><?= $covers->two->excerpt ?></p>
                    </div>
                </article>
                <?php endif ?>
            </section>
        </div>
    </div>
</div>
<?php endif ?>
<?php endif ?>