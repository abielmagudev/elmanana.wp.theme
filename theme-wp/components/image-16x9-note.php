<?php

$image = (object) array(
    'alt'     => isset($image_alt) ? $image_alt : null,
    'caption' => isset($image_caption) ? $image_caption : null,
    'link'    => isset($image_link) ? $image_link : false,
    'url'     => isset($image_url) ? $image_url : null,
);

?>

<?php if( is_string($image->link) ): ?>
<a href="<?= $image->link ?>" class="aspect-ratio-frame bg-dark">
    <img src="<?= $image->url ?>" alt="<?= $image->alt ?>" class="aspect-ratio-16x9">
</a>

<?php else: ?>
<figure class="figure aspect-ratio-frame bg-dark">
    <img src="<?= $image->url ?>" alt="<?= $image->alt ?>" class="figure-img aspect-ratio-16x9">
</figure>

<?php endif ?>