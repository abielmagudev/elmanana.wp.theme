<?php
$controls = array(
    'manual' => 'Muestra la publicación activada en la columna manual (<span class="dashicons dashicons-star-filled font-size-md"></span>).',
    'aleatorio' => 'Muestra todas las publicaciones de forma aleatoria.',
    'desactivado' => 'No muestra ninguna publicación.',
);
?>

<div class="wrap">
    <h1 class="mb-3">Invasivos</h1>
    
    <form action="<?= esc_url( admin_url('admin-post.php') ) ?>" method="post" class="box">
        <div class="box-body">
            <h2 class="mt-0 mb-3">Configuración</h2>
            <?php foreach($controls as $mode => $label): ?>
            <?php $checked = $mode === $settings->modo ? 'checked' : null ?>
            <input type="radio" id="modo-<?= $mode ?>" class="" name="modo" value="<?= $mode ?>" <?= $checked  ?>>
            <label for="modo-<?= $mode ?>" class=""><b><?= ucfirst($mode) ?>.</b> <?= $label ?></label>
    
            <?php if($mode <> 'desactivado'): ?>
            <hr>
            <?php endif ?>
    
            <?php endforeach ?>
    
            <br>
            <?php wp_nonce_field('popub_settings_update', 'popub_nonce') ?>
            <input type="hidden" name="action" value="popub_settings_update">
            <button class="button button-primary mt-4" type="submit">Actualizar</button>
        </div>
    </form>
</div>
