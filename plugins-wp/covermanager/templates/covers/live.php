<?php if( is_object($content) && !empty($content->titulo) && !empty($content->embed) ): ?>
<div class="my-5 shadow" style="background:rgba(0,0,0,0.75) !important">
    <div class="row align-items-center no-gutters">
        <div class="col-lg col-lg-7 overflow-auto text-center">
            <?= stripslashes( html_entity_decode($content->embed) ) ?>
        </div>
        <div class="col-lg">
            <div class="card bg-transparent border-0 text-white">
                <div class="card-header bg-transparent border-0 text-right pb-0">
                    <b><span class="text-danger">*</span> EN VIVO</b>
                </div>
                <div class="card-body pt-0 pl-0">
                    <p class="h1"><?= $content->titulo ?></p>
                    <p><?= $content->descripcion ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif ?>