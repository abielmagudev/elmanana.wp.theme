    <footer class="py-5" style="background-color:#171717">
        <div class="container text-white">
            <div class="row align-items-center">
                <div class="col-lg mb-3 mb-lg-0">
                    <a class="btn btn-danger btn-lg btn-block" href="<?= home_url('eimpresa') ?>/" target="_blank">
                        <i class="far fa-newspaper"></i>
                        <span class="d-block d-md-inline-block ml-1">Edición <b class="font-weight-bold">Impresa</b></span>
                    </a>
                </div>

                <?php if( false ): ?>
                <div class="col-lg mb-3 mb-lg-0">
                    <form class="" action="#" method="post" autocomplete="off">
                        <div class="input-group">
                            <input type="email" class="form-control form-control-lg" placeholder="Tu correo electrónico" aria-label="" aria-describedby="" required>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Suscribeme</button>
                            </div>
                        </div>
                    </form>
                </div>
                <?php endif ?>

                <div class="col-lg mb-3 mb-lg-0">
                    <a class="btn btn-primary btn-lg btn-block" href="mailto:internet@elmanana.com.mx">
                        <i class="fas fa-envelope"></i>
                        <span class="d-block d-md-inline-block ml-1">internet@elmanana.com.mx</span>
                    </a>
                </div>

            </div>
        </div>
    </footer>

    <footer class="py-2" style="background-color:black">
        <div class="container text-white">
            <div class="row align-items-center">
                <div class="col-lg order-2 order-lg-1">
                    <p class="text-center text-xl-left m-0">
                        <small>Empresa de <strong>Editora Argos</strong> S.A. de C.V. Distintivo <strong>ESR.</strong></small>
                    </p>
                </div>

                <div class="col-lg order-1 order-lg-2">
                    <p class="text-center text-lg-right m-0">
                        <?php foreach( wp_get_nav_menu_items('empresa') as $item ): ?>
                        <a class="text-white" href="<?= $item->url ?>">
                            <small><?= $item->title ?></small>
                        </a>
                        <?php endforeach ?>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <p class="m-0" id="sg-popup-id-37047"></p>
    <a href="https://orangesites.mx"></a>

    <?php get_template_part('global/modal-nav') ?>
    <?php get_template_part('global/modal-search') ?>
    <?php wp_footer() ?>
    