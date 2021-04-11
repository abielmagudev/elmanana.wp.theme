<div class="wrap">
    <h1 class="">Administrador de portadas</h1>
    <?= maguk_notice() ?>

    <form action="<?= maguk_admin_post_url() ?>" method="post" autocomplete="off" id="form-covermananger-update" class="" enctype="multipart/form-data">
        <?php wp_nonce_field('covermanager_update', 'covermanager_nonce') ?>
        <input type="hidden" name="action" value="covermanager_update">

        <?php require maguk_plugin_path('templates/home/index-previews-cover.php') ?>

        <br>

        <?php require maguk_plugin_path('templates/home/index-settings-cover.php') ?>

        <br>
        
        <button type="submit" class="button button-primary">Actualizar</button>
    </form>

</div>
