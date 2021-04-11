<?php $navbar = elm_get_navbar_categories() ?>
<div class="bg-black d-none d-lg-block">
    <div class="container">
        <nav class="nav nav-fillx nav-categories justify-content-center text-uppercase font-weight-bold small" role="navigation">
            <?php foreach($navbar['menu'] as $item): ?>
            <?php if( $item['active'] ) $background = $item['class'] ?>
            <a href="<?= $item['url'] ?>" class="nav-item nav-link <?= 'nav-link-'.$item['class'] ?> <?= $item['active'] ? 'active' : '' ?>">
                <?= $item['title'] ?>
            </a>
            <?php endforeach ?>
        </nav>
    </div>
</div>

<?php if( $navbar['submenu'] ): ?>
<div class="bg-secondary <?= 'bg-'.$background ?>">
    <div class="container">
        <div class="nav navbar-scroll justify-content-center text-uppercase font-weight-boldx small">
            <?php foreach($navbar['submenu'] as $item): ?>
            <a class="nav-item nav-link text-white" href="<?= $item['url'] ?>">
                <?= $item['title'] ?>
            </a>
            <?php endforeach ?>   
        </div>
    </div>
</div>
<?php endif ?>

