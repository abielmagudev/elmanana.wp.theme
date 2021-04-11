<fieldset id="fieldset-textual" <?= $settings->cover_type <> 'textual' ? 'style="display:none" disabled' : '' ?>>
    <div class="form-group">
        <label for="titulo">Título</label>
        <input type="text" class="form-control" name="titulo" value="<?= trim($content['textual']->titulo) ?>" required>
    </div>
    <div class="form-group">
        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" id="descripcion" cols="30" rows="5" class="form-control" required><?= trim($content['textual']->descripcion) ?></textarea>
    </div>
    <p>
        <small class="text-muted">Actualizado <?= $content['textual']->updated_at ?></small>
    </p>
</fieldset>