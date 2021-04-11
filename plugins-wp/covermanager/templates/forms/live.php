<fieldset id="fieldset-live" <?= $settings->cover_type <> 'live' ? 'style="display:none" disabled' : '' ?>>
    <div class="form-group">
        <label for="titulo">Título</label>
        <input type="text" class="form-control" name="titulo" value="<?= $content['live']->titulo ?>" required>
    </div>
    <div class="form-group">
        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" id="descripcion" cols="30" rows="5" class="form-control" required><?= $content['live']->descripcion ?></textarea>
    </div>
    <div class="form-group">
        <label for="titulo">Insertar código</label>
        <textarea name="embed" class="form-control" cols="30" rows="4" required><?= stripslashes( html_entity_decode($content['live']->embed) ) ?></textarea>
    </div>
    <p>
        <small class="text-muted">Actualizado <?= $content['live']->updated_at ?></small>
    </p>
</fieldset>