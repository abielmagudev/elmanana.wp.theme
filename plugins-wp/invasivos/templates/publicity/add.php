<div class="wrap">
    <h1 class="mb-3">Invasivos</h1>

    <form action="<?= popub_admin_post_url() ?>" method="post" class="box" enctype="multipart/form-data" autocomplete="off">
        <div class="box-body">
            <h2 class="mt-0 mb-3">Nuevo invasivo</h2>
            <div class="form-group">
                <label for="titulo" class="font-size-md">Titulo</label>
                <input type="text" name="titulo" id="titulo" class="input" required>
            </div>
            <div class="form-group">
                <label for="select_tipo" class="font-size-md">Tipo</label>
                <select name="tipo" id="select_tipo" class="select" required>
                    <!-- <option selected disabled></option> -->
                    <?php foreach($types as $type): ?>
                    <option value="<?= $type ?>"><?= ucfirst($type) ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group" id="wrapper_contenido">
                <!-- <label class="font-size-md">Contenido</label> -->

                <!-- Code input -->
                <div id="contenido_codigo" style="display:none">
                    <label for="input_codigo">Escribe o pega el código</label>
                    <textarea name="codigo" class="textarea" id="input_codigo" cols="20" rows="5"></textarea>
                </div>
                
                <!-- Image input -->
                <div id="contenido_imagen">
                    <label for="input_imagen">Seleccionar la imagen</label>
                    <input name="imagen" class="input mb-3" id="input_imagen" type="file">

                    <label for="input_enlace">Url de enlace</label>
                    <input name="enlace" class="input" id="input_enlace" type="text" placeholder="">
                </div>

            </div>

            <label class="d-block text-muted mb-2">Disponible</label>
            <input type="checkbox" id="checkbox_en_movil" name="en_movil" value="1">
            <label for="checkbox_en_movil">En móvil</label>

            <br>

            <input type="checkbox" id="checkbox_en_escritorio" name="en_escritorio" value="1">
            <label for="checkbox_en_escritorio">En escritorio</label>

            <div class="d-block mb-3"></div>

            <?php wp_nonce_field('popub_publicity_store', 'popub_nonce') ?>
            <input type="hidden" name="action" value="popub_publicity_store">
            <button class="button button-primary">Guardar Invasivo</button>
        </div>
    </form>
</div>
