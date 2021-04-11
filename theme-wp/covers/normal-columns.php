<?php if( function_exists('covering_get_posts') && $covers = covering_get_posts() ): ?>

<section class="container mt-sm-3 mb-3">
    <div class="row">
       
        <?php if( ! is_null($covers['one']) ): ?>
        <div class="col-sm col-md-8 px-0 px-sm-3 mb-3 mb-sm-0">
            <article class="card bg-dark border-0 shadow text-white h-100 rounded-0">
                <a href="<?= $covers['one']->permalink ?>" class="aspect-ratio-wrapper bg-black">
                    <img class="card-img-top rounded-0 aspect-ratio-photo" src="<?= get_the_post_thumbnail_url($covers['one']->id, 'medium_large') ?: elm_get_image_url(ELM_MISSING_IMG) ?>"  alt="<?= $covers['one']->name ?>">
                    <?php // <img class="card-img-top w-100 rounded-0" src="<?= $covers['one']->thumbnail ?: elm_get_image_url(ELM_MISSING_IMG) ?->"  alt="<?= $covers['one']->name ?->"> ?>
                </a>
                <div class="card-body">
                    <header>
                        <small class="text-uppercase">
                            <?= elm_get_categories_links( $covers['one']->id ) ?>
                            <span class="text-nowrap"><?= $covers['one']->date ?></span>
                        </small>
                        <h1 class="h1-to-h4-sm">
                            <a href="<?= $covers['one']->permalink ?>" class="font-weight-bold text-white ">
                                <?= $covers['one']->title ?>
                            </a>
                        </h1>
                    </header> 
                    <p class="card-text"><?= $covers['one']->excerpt ?></p>
                </div>
                
                <div class="card-footer text-right d-none">
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
                </div>
            </article>
            
        </div>
        <?php endif ?>

        <div class="col-sm pl-3 pl-md-0">
            <div class="row">
               
                <div class="col-sm mb-3">
                    <?php if( function_exists('the_ad_placement') ) the_ad_placement('elmanana_home_300x250_desktop_atf') ?>
                </div>

                <?php if( false ): //! is_null($covers['two']) ?>
                <div class="col-sm mb-3">
                    <article class="card bg-dark border-0 shadow rounded-0">
                        <a href="<?= $covers['two']->permalink ?>" class="aspect-ratio-wrapper bg-black">
                            <img class="card-img-top aspect-ratio-photo w-100 rounded-0" src="<?= get_the_post_thumbnail_url($covers['two']->id, 'medium') ?: elm_get_image_url(ELM_MISSING_IMG) ?>" alt="<?= $covers['two']->name ?>">
                        </a>
                        <div class="card-body text-white">
                            <header class="mb-3">
                                <small class="text-uppercase">
                                    <?= elm_get_categories_links( $covers['two']->id ) ?>
                                    <span class="text-nowrap"><?= $covers['two']->date ?></span>
                                </small>
                                <h2 class="h4">
                                    <a href="<?= $covers['two']->permalink ?>" class="font-weight-bold text-white"><?= $covers['two']->title ?></a>
                                </h2>
                            </header> 
                        </div>
                        <div class="card-footer text-right d-none">
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
                        </div>
                    </article>
                </div>
                <?php endif ?>

                <?php if( ! is_null($covers['three']) ): ?>
                <div class="w-100"></div>
                
                <div class="col-sm">
                    <?php if( function_exists('the_ad_placement') ) the_ad_placement('elmanana_home_300x250_mobile_atf'); ?>

                    <article class="card bg-dark border-0 shadow rounded-0">
                        <a href="<?= $covers['three']->permalink ?>" class="aspect-ratio-wrapper bg-black">
                            <img class="card-img-top aspect-ratio-photo w-100 rounded-0" src="<?= get_the_post_thumbnail_url($covers['three']->id, 'medium') ?: elm_get_image_url(ELM_MISSING_IMG) ?>" alt="<?= $covers['three']->name ?>">
                        </a>
                        <div class="card-body text-white">
                            <header class="mb-3">
                                <small class="text-uppercase">
                                    <?= elm_get_categories_links( $covers['three']->id ) ?>
                                    <span class="text-nowrap"><?= $covers['three']->date ?></span>
                                </small>
                                <h2 class="h4">
                                    <a href="<?= $covers['three']->permalink ?>" class="font-weight-bold text-white"><?= $covers['three']->title ?></a>
                                </h2>
                            </header> 
                        </div>
                        <div class="card-footer text-right d-none">
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
                        </div>
                    </article>
                </div>
                <?php endif ?>
            </div>
        </div>

    </div>
</section>

<?php endif ?>