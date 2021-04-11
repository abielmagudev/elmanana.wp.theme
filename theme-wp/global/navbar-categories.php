<div class="d-none d-md-block" style="background-color:black">
    <div class="container">
        <nav class="text-center py-1">
            <?php foreach( wp_get_nav_menu_items('categorias') as $item ): $cat_id = get_cat_ID( $item->title ) ?>
            <?php $item_color = $cat_id > 0 ? elm_get_category_color($cat_id) : elm_cpt_opinions_color('dark') ?>
            <a href="<?= $item->url ?>" class="text-uppercase text-decoration-none small px-2">
                <span class="align-middle lead" style="color:<?= $item_color ?>">&#9632;</span>
                <span class="align-middle text-white"><?= $item->title ?></span>
            </a>
            <?php endforeach ?>
        </nav>
    </div>
</div>
