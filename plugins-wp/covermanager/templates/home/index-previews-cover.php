    <!-- Covers -->
    <div class="row">

        <?php foreach($layouts_cover as $layout): ?>
        <?php $selected = $layout['id'] == $settings->cover_type ? 'active-cover' : '' ?>
        <div class="col-sm">
            <label for="<?= $layout['id'] ?>">
                <input class="radio-cover invisible" type="radio" name="layout" value="<?= $layout['id'] ?>" id="<?= $layout['id'] ?>" <?= !empty($selected) ? 'checked' : '' ?>>
                <div class="preview-cover card m-0 p-0 <?= $selected ?>">
                    <div class="card-body py-0 px-3">
                        <img src="<?= maguk_asset("images/{$layout['id']}.jpg") ?>" alt="<?= $layout['label'] ?>" class="w-100">
                    </div>
                </div>
                <span class="d-block text-center mt-2">
                    <b><?= $layout['label'] ?></b>
                </span>
            </label>
        </div>
        <?php endforeach ?>

    </div>
    