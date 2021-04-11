<section class="bg-primary text-white" id="navbar-services">
    <div class="container px-0 px-md-3">
        <div class="d-flex justify-content-between align-items-center">
            <div class="">
                <div class="d-block d-lg-none">
                    <a class="btn text-white" href="<?= get_home_url() ?>">
                        <img src="<?= elm_get_asset_url('images/elmanana-navbar.png') ?>" width="160" height="auto">
                    </a>
                </div>
                <div class="d-none d-lg-block">
                    <a class="btn text-white rounded-0" href="https://www.facebook.com/elmananadenuevolaredo/" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="btn text-white rounded-0" href="https://twitter.com/elmananaonline" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="btn text-white rounded-0" href="https://www.instagram.com/elmanananl/" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="btn text-white rounded-0" href="https://www.youtube.com/user/ElMananaVideos/videos" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Youtube">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>

            <div class="d-none d-md-block text-center">
                <small class=""><?= ucfirst( elm_get_current_date_human_display() ) ?></small>
            </div>

            <div class="text-right">
                <div class="d-block d-lg-none">
                    <a class="btn btn-lg text-white rounded-0" href="#" data-toggle="modal" data-target="#searchModal">
                        <i class="fas fa-search fa-sm"></i>
                    </a>
                    <a class="btn btn-lg pl-0 text-white rounded-0" href="#" id="toggleNavigationModal" data-toggle="modal" data-target="#navigationModal">
                        <i class="fas fa-bars"></i>
                    </a>
                </div>
                <div class="d-none d-lg-block">
                    <a class="btn text-white rounded-0 text-warning text-uppercase" href="<?= home_url('avisos') ?>/" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Avisos de ocasión">
                        <i class="fas fa-tags"></i>
                    </a>
                    <a class="btn text-white rounded-0" href="<?= home_url('puentes-internacionales') ?>/" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Puentes internacionales">
                        <i class="fas fa-archway fa-sm"></i>
                    </a>
                    <a class="btn text-white rounded-0 d-none" href="#sesion" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Iniciar sesión">
                        <i class="fas fa-user"></i>
                    </a>
                    <a class="btn text-white rounded-0" href="#buscar" data-toggle="modal" data-target="#searchModal">
                        <i class="fas fa-search"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
