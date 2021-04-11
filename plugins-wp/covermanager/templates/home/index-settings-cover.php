    <!-- Settings -->
    <div class="row">

        <!-- Contents -->
        <div class="col-sm">
            <div class="card p-0 mw-100">
                <div class="card-body py-0">
                    <p>
                        <b>Contenido</b>
                    </p>

                    <div id="fieldsets-cover">
                        <?php foreach($layouts_cover as $form): ?>
                        <?php require maguk_plugin_path("templates/forms/{$form['id']}.php") ?>
                        <?php endforeach ?>
                    </div>

                </div>
            </div>
        </div>

        <!-- Background -->
        <div class="col-sm">
            <div class="card p-0 mw-100">
                <div class="card-body py-0">
                    <p class="">
                        <b>Fondo</b>
                    </p>

                    <div class="row align-items-center mb-3">
                        <div class="col text-center">
                            <input type="radio" name="background-type" id="fondo-ninguno" value="none" <?= $settings->background_type === 'none' ? 'checked' : '' ?>>
                        </div>
                        <div class="col">
                            <label for="fondo-ninguno">Ningúno</label>
                        </div>
                        <div class="col-8">
                            <span class="text-muted">Transparente</span>
                        </div>
                    </div>

                    <hr>

                    <div class="row align-items-center mb-3">
                        <div class="col text-center">
                            <input type="radio" name="background-type" id="fondo-color" value="color" <?= $settings->background_type === 'color' ? 'checked' : '' ?>>
                        </div>
                        <div class="col">
                            <label for="fondo-color">Color</label>
                        </div>
                        <div class="col-8">
                            <input type="color" name="background-color" value="<?= $settings->background_color ?>" id="fondo-color" class="form-control shadow-none">
                        </div>
                    </div>

                    <hr>

                    <div class="row align-items-center mb-3">
                        <div class="col text-center">
                            <input type="radio" name="background-type" id="fondo-imagen" value="image" <?= $settings->background_type === 'image' ? 'checked' : '' ?>>
                        </div>
                        <div class="col">
                            <label for="fondo-imagen">Imágen</label>
                        </div>
                        <div class="col-8">
                            <input type="file" name="background-image" id="fondo-imagen" class="form-control pl-3">
                        </div>
                        <?php if( !is_null($settings->background_image) ): ?>
                        <div class="w-100 mb-3"></div>
                        <div class="col"></div>
                        <div class="col-8">
                        <span class="text-muted">Imágen de fondo reciente</span>
                            <img src="<?= covermanager_url_background( $settings->background_path, $settings->background_image ) ?>" class="img-thumbnail">
                        </div>
                        <?php endif ?>
                    </div>

                </div>
            </div>
        </div>

    </div>