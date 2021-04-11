<fieldset id="fieldset-cols_1x2" <?= $settings->cover_type <> 'cols_1x2' ? 'style="display:none" disabled' : '' ?>>
    
    <div class="form-row align-items-center">
        <?php foreach($content['cols_1x2'] as $item): ?>
        <div class="col text-center">
            <b><?= $item->id ?></b>
        </div>
        <div class="col-11">
            <input type="url" class="form-control" name="posts[]" value="<?= !is_null($item->post_url) ? $item->post_url : '' ?>" placeholder="Dirección de la publicación" required>
            
            <?php if(isset($item->post->post_title)): ?>
            <small class="text-muted pl-2" id="post-title-<?= $item->id ?>">
                <a href="<?= $item->post_url ?>" target="_blank"><?= $item->post->post_title  ?></a>
            </small>
            <?php endif ?>
        </div>
        <div class="w-100 mb-3"></div>
        <?php endforeach ?>
    </div>

    <!-- <table class="table" style="border-collapse:collapse">
        <tbody>
            <tr>
                <td class="align-middle text-center">
                    <b>$$</b>
                </td>
            </tr>
        </tbody>
    </table> -->
</fieldset>