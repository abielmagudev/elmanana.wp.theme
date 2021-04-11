<!-- Portada Textual -->
<?php if( is_object($content) ): ?>
<div class="card rounded-0 bg-transparent border-0 py-5 h-100 text-white">
    <div class="card-body text-center my-5">
        <p class="display-4"><?= $content->titulo ?></p>
        <p class="lead"><?= $content->descripcion ?></p>
    </div>
</div>
<?php endif ?>
