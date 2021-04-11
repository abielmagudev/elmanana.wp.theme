<aside class="pt-4">

    <!-- Divisas -->
    <?php if( function_exists('exmoney_content') ): $content = exmoney_content() ?>
    <div class="bg-light border text-uppercase p-4">
        <div class="d-flex justify-content-between">
            <b class="text-danger">Compra</b>
            <b>$<?= $content['buy'] ?></b>
        </div>
        <hr class="my-1" style="box-shadow: 0 1px 0 white">
        <div class="d-flex justify-content-between">
            <b class="text-danger">Venta</b>
            <b>$<?= $content['sell'] ?></b>
        </div>
        <small class="d-none my-2 text-right text-muted"><?= $content['updated'] // d F, Y h:i:s ?></small>
    </div>
    <br>
    <?php endif ?>

    <!-- Ad1-sidebar -->
    <?php if( function_exists('the_ad_placement') ): ?>
    <div style="width: 300px; margin: 0px auto 20px auto;">
        <?php the_ad_placement('elmanana_home_300x600_desktop_btf1') ?>
    </div>
    <br>
    <?php endif ?>

    <!-- Imagen de puentes -->
    <div class="">
        <a href="<?= home_url('puentes-internacionales') ?>/" target="_blank">
            <img class="w-100" src="<?= elm_get_asset_url('images/camaras-puentes.jpg') ?>" alt="Puentes internacionales">
        </a>
    </div>
    <br>

    <!-- Avisos de ocasión -->
    <div class="">
        <a href="<?= home_url('avisos') ?>/" target="_blank">
            <img class="w-100" src="<?= elm_get_asset_url('images/avisos.jpg') ?>" alt="Puentes internacionales">
        </a>
    </div>
    <br>

    <!-- Ads -->
    <?php get_template_part('partners/ads/recuadro_derecha_300x250') ?>
    <br>

    <!-- Carton -->
    <?php 
    $paperboard = elm_get_last_one_post('paperboards');
    if( is_object($paperboard) && has_post_thumbnail( $paperboard->ID ) ):
    ?>
    <div class="card bg-dark border-0 rounded-0">
        <div class="card-header text-white">
            <b class="text-uppercase">Carton del día</b>
        </div>
        <div class="card-body p-0">
            <img class="w-100" src="<?= get_the_post_thumbnail_url($paperboard->ID, 'large') ?>" alt="Carton del día">
        </div>
    </div>
    <br>
    <?php endif ?>
    
    <!-- Encuesta -->
    <?php if ( function_exists( 'vote_poll' ) && ! in_pollarchive() ): ?>
    <div class="card rounded-0 border-0 mb-3">
        <div class="card-header rounded-0 bg-info text-white">
            <span class="font-weight-bold text-uppercase">Encuesta</span>
        </div>
        <div class="card-body bg-light rounded-bottom">
            <?php get_poll(); ?>
        </div>
    </div>
    <br>
    <?php endif; ?>

    <!-- Ad2-sidebar -->
    <?php if( function_exists('the_ad_placement') ): ?>
    <div style="width: 300px; margin: 0px auto 20px auto;">
        <?php the_ad_placement('elmanana_home_300x600_desktop_btf2') ?>
    </div>
    <br>
    <?php endif ?>
    


    <!-- TOP5 -->
    <?php if( false ): ?>
    <div class="card bg-dark border-0 mb-3 d-none" id="wrapper-tops">
        <div class="card-header bg-warning">
            <strong class="mr-2">TOP 5</strong>
            <span class="small d-none">VISITAS | COMENTADAS | LIKES</span>
        </div>
        
        <!-- Top nav -->
        <div class="nav nav-tabs nav-justified border-0" id="tabs-tops" role="tablist">
            <a class="nav-item nav-link nav-link-top rounded-0 border-0 bg-transparent active" id="nav-vistas-tab" data-toggle="tab" href="#nav-vistas" role="tab" aria-controls="nav-vistas" aria-selected="true">
                <i class="fas fa-eye fa-lg"></i>
            </a>
            <a class="nav-item nav-link nav-link-top rounded-0 border-0 bg-transparent" id="nav-comentadas-tab" data-toggle="tab" href="#nav-comentadas" role="tab" aria-controls="nav-comentadas" aria-selected="false">
                <i class="fas fa-comments fa-lg"></i>
            </a>
            <a class="nav-item nav-link nav-link-top rounded-0 border-0 bg-transparent" id="nav-likes-tab" data-toggle="tab" href="#nav-likes" role="tab" aria-controls="nav-likes" aria-selected="false">
                <i class="fas fa-thumbs-up fa-lg"></i>
            </a>
        </div>
        
        <!-- Top content -->
        <?php $top = 5 ?>
        <div class="tab-content" id="content-tops">
            
            <div class="tab-pane fade show active" id="nav-vistas" role="tabpanel" aria-labelledby="nav-vistas-tab">
                <div class="list-group list-group-flush">
                    <?php for($i = 1; $i <= $top; $i++): ?>
                    <a class="list-group-item list-group-item-action bg-transparent text-white" href="#">
                        <span class="badge badge-pill badge-warning mr-1 small"><?= $i ?></span>
                        <small>Top de vistas</small>
                    </a>
                    <?php endfor ?>    
                </div>
            </div>

            <div class="tab-pane fade" id="nav-comentadas" role="tabpanel" aria-labelledby="nav-comentadas-tab">
                <div class="list-group list-group-flush">
                    <?php for($i = 1; $i <= $top; $i++): ?>
                    <a class="list-group-item list-group-item-action bg-transparent text-white" href="#">
                        <span class="badge badge-pill badge-warning mr-1"><?= $i ?></span>
                        <small>Top de comentadas</small>
                    </a>
                    <?php endfor ?>    
                </div>
            </div>

            <div class="tab-pane fade" id="nav-likes" role="tabpanel" aria-labelledby="nav-likes-tab">
                <div class="list-group list-group-flush">
                    <?php for($i = 1; $i <= $top; $i++): ?>
                    <a class="list-group-item list-group-item-action bg-transparent text-white" href="#">
                        <span class="badge badge-pill badge-warning mr-1"><?= $i ?></span>
                        <small>Top de likes</small>
                    </a>
                    <?php endfor ?>    
                </div>
            </div>
        </div>
    </div>
    <br>
    <?php endif ?>

</aside>
