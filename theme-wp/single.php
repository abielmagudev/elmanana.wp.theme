<?php get_header() ?>

<?php
$template = in_category('360') ? '360' : 'default';
get_template_part("single/{$template}");
get_template_part('single/more-news');
?>

<?php get_footer('single') ?>