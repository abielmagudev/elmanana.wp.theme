<?php

$image = (object) array(
    'alt'     => isset($image_alt) ? $image_alt : null,
    'caption' => isset($image_caption) ? $image_caption : null,
    'link'    => isset($image_link) ? $image_link : false,
    'url'     => isset($image_url) ? $image_url : null,
);

?>

<?php if( is_string($image->link) ): ?>
<figure class="figure">
    <a href="<?= $image->link ?>" class="aspect-ratio-frame">
        <img src="<?= $image->url ?>" alt="<?= $image->alt ?>" class="figure-img aspect-ratio-16x9">
    </a>
    <figcaption class="figure-caption"><?= $image->caption ?></figcaption>
</figure>

<?php else: ?>
<figure class="figure">
    <div class="aspect-ratio-frame">
        <img src="<?= $image->url ?>" alt="<?= $image->alt ?>" class="aspect-ratio-16x9">
    </div>
    <figcaption class="figure-caption"><?= $image->caption ?></figcaption>
</figure>

<?php endif ?>