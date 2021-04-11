<!-- Navigation Modal -->
<?php 
$nav = wp_get_nav_menu_items('categorias');
$first_items = array_slice($nav, 0, 5);
$last_items = array_slice($nav, 5, 8);
?>

<div class="modal fade" id="navigationModal" tabindex="-1" role="dialog" aria-labelledby="navigationModalLabel" aria-hidden="true">
    <div class="modal-dialog mt-0" role="document">
        <div class="modal-content border-0 rounded-0">
            <div class="modal-header border-0">
                <p class="modal-title lead">Bienvenido(a)</p>                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body py-0">
                <p class="text-center">
                    <small class=""><?= ucfirst( elm_get_current_date_human_display() ) ?></small>
                </p>
                <div class="row">
                    <div class="col-6">
                        <ul class="p-0 list-unstyled">
                            <?php foreach($first_items as $item): $cat_id = get_cat_ID( $item->title ) ?>
                            <?php $item_color = $cat_id > 0 ? elm_get_category_color($cat_id) : elm_cpt_opinions_color('dark') ?>
                            <li class="">
                                <a href="<?= $item->url ?>" class="btn btn-sm text-uppercase text-nowrap">
                                    <span class="align-middle lead" style="color:<?= $item_color ?>">&#9632;</span>
                                    <span class="align-middle text-dark"><?= $item->title ?></span>
                                </a>
                            </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                    <div class="col-6">
                        <ul class="p-0 list-unstyled">
                            <?php foreach($last_items as $item): $cat_id = get_cat_ID( $item->title ) ?>
                            <?php $item_color = $cat_id > 0 ? elm_get_category_color($cat_id) : elm_cpt_opinions_color('dark') ?>
                            <li class="">
                                <a href="<?= $item->url ?>" class="btn btn-sm text-uppercase text-nowrap">
                                    <span class="align-middle lead" style="color:<?= $item_color ?>">&#9632;</span>
                                    <span class="align-middle text-dark"><?= $item->title ?></span>
                                </a>
                            </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
            </div>
            
            <a href="<?= home_url('avisos') ?>" class="btn btn-warning btn-block rounded-0" target="_blank">
                <i class="fas fa-tags"></i>
                <span class="small font-weight-bold text-uppercase">Avisos de ocasión</span>
            </a>
            
            <div class="modal-body bg-whitesmoke text-center">
                <div class="float-right d-none">
                    <a href="#" class="btn btn-outline-primary btn-sm border-0">
                        <i class="fas fa-user"></i>
                        <span class="small text-uppercase font-weight-bold ml-1">Iniciar sesión</span>
                    </a>
                </div>
                <a href="https://www.facebook.com/elmananadenuevolaredo/" class="btn btn-sm text-white" target="_blank" style="background-color:#4267B2;padding-left:0.75rem;padding-right:0.75rem">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://twitter.com/elmananaonline" class="btn btn-sm text-white" target="_blank" style="background-color:#1DA1F2">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="https://www.instagram.com/elmanananl/" class="btn btn-sm text-white" target="_blank" style="background-color:#FF3D69">
                    <i class="fab fa-instagram fa-lg"></i>
                </a>
                <a href="https://www.youtube.com/user/ElMananaVideos/videos" class="btn btn-sm text-white" target="_blank" style="background-color:#D40000">
                    <i class="fab fa-youtube"></i>
                </a>
                <a href="<?= home_url('puentes-internacionales') ?>" class="btn btn-primary btn-sm" target="_blank">
                    <i class="fas fa-archway"></i>
                </a>
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
            </div>
            
        </div>
    </div>
</div>