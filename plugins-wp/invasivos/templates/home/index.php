<div class="wrap">
    <h1 class="mb-3">Invasivos</h1>
    <div class="notice-msg"></div>

    <div class="box">
        <!-- <div class="alignright">
            <a href="<?= admin_url('admin.php?page=popub-add') ?>" class="button button-primary">
                <span>Nueva publicidad</span>
            </a>
        </div> -->
        <div class="box-body">
            <h2 class="mt-0">Publicidades</h2>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>
                                <span class="dashicons dashicons-star-filled"></span>
                            </th>
                            <th>TITULO</th>
                            <th>TIPO</th>
                            <th>EN MÓVIL</th>
                            <th>EN ESCRITORIO</th>
                            <th>CREADO</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($publicities as $publicity): ?>
                        <tr>
                            <td>
                                <?php $checked = $settings->publicidad_id === $publicity->id ? 'checked' : '' ?>
                                <input type="radio" name="manual" value="<?= $publicity->id ?>" <?= $checked ?> form="form-publicity-manual">
                            </td>
                            <td><?= $publicity->titulo ?></td>
                            <td><?= ucfirst($publicity->tipo) ?></td>
                            <td><?= $publicity->en_movil ? 'Si' : 'No' ?></td>
                            <td><?= $publicity->en_escritorio ? 'Si' : 'No' ?></td>
                            <td><?= $publicity->creado_at ?></td>
                            <td>
                                <form action="<?= popub_admin_post_url() ?>" method="post">
                                    <?php wp_nonce_field('popub_publicity_delete', 'popub_nonce') ?>
                                    <input type="hidden" name="action" value="popub_publicity_delete">
                                    <input type="hidden" name="publicidad" value="<?= $publicity->id ?>">
                                    <button class="btn-link text-danger">
                                        <span class="dashicons dashicons-trash"></span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <form action="<?= popub_admin_post_url() ?>" method="post" id="form-publicity-manual">
                    <?php wp_nonce_field('popub_settings_update_manual', 'popub_nonce') ?>
                    <input type="hidden" name="action" value="popub_settings_update_manual">
                </form>
            </div>
        </div>
    </div>
</div>
