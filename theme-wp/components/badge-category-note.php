<?php

$badge = (object) array(
    'background' => isset($badge_background) ? $badge_background : false,
    'class'      => 'badge badge-pill text-white text-capitalize',
    'color'      => isset($badge_color) ? $badge_color : 'dark',
    'permalink'  => isset($badge_permalink) && is_string($badge_permalink) ? $badge_permalink : false,
    'title'      => isset($badge_title) ? $badge_title : 'Noticias',
);

?>

<?php if( $badge->permalink ): ?>
    <a 
        href="<?= $badge->permalink ?>"
        class="<?= $badge->class ?> <?= $badge->$badge_background === false ? "badge-{$badge->color}" : '' ?>"

        <?php if( is_string( $badge->background ) ): ?>
        style="background-color:<?= $badge->background ?>"
        <?php endif ?>> <!-- badge-link-end -->

        <?= $badge->title ?>
    </a>

<?php else: ?>
<small>
    <span 
        class="<?= $badge->class ?> <?= $badge->$badge_background === false ? "badge-{$badge->color}" : '' ?>"

        <?php if( is_string( $badge->background ) ): ?>
        style="background-color:<?= $badge->background ?>">
        <?php endif ?>> <!-- badge-link-end -->
            
        <?= $badge->title ?>
    </span>
</small>

<?php endif ?>