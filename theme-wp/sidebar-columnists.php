<?php
$columnists = get_terms('columnists', 'opinions');
$columnist_filter = isset($_GET['columnista']) ? $_GET['columnista'] : null;
$opinions_columnist_link = get_post_type_archive_link('opinions') . "?columnista=";
$color_dark = elm_cpt_opinions_color('dark');
$color_light = elm_cpt_opinions_color('light');
?>
<aside>

    <?php if( count($columnists) ): ?>
    <div class="d-block d-md-none">
        <div class="card border-0 rounded-0">
            <div class="card-body p-0">
                <form action="<?= home_url('opiniones/') ?>" method="get">
                    <select name="columnista" class="form-control rounded-0" onchange="submit()" style="border-color:<?= $color_dark ?>" required>
                        <option label="Seleccionar columnista..." disabled selected></option>
                        <?php foreach($columnists as $columnist): if( $columnist->parent === 0 ): ?>
                        <option value="<?= $columnist->slug ?>" <?= $columnist->slug === $columnist_filter ? 'selected' : '' ?>>
                            <?php //$inner = $columnist->parent ? '- ' : '' ?>
                            <?= $columnist->name ?>
                        </option>
                        <?php endif; endforeach ?>
                    </select>
                </form>
            </div>
        </div>
        <br>
    </div>

    <div class="d-none d-md-block">
        <p class="text-uppercase font-georgia">Columnistas</p>
        <ul>
            <?php foreach($columnists as $columnist): if( $columnist->parent === 0 ): ?>
            <li class="">
                <a href="<?= $opinions_columnist_link . $columnist->slug ?>" style="color:<?= $color_dark ?>"><?= $columnist->name ?></a>
            </li>
            <?php endif; endforeach ?>
        </ul>
    </div>
    <?php endif ?>

</aside>