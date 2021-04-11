<?php
$elm_color = elm_get_default('color');
$elm_icon = elm_get_asset_url('images/elmanana-favicon.png');
$bloginfo_name = get_bloginfo('name');
?>
<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>

    <title><?= is_single() ? get_the_title() : $bloginfo_name ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="application-name" content="<?= $bloginfo_name ?>" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="<?= $elm_color ?>" />
    <meta name="apple-mobile-web-app-title" content="<?= $bloginfo_name ?>" />
    <meta name="msapplication-tap-highlight" content="no" />
    <meta name="msapplication-TileColor" content="<?= $elm_color ?>" />
    <meta name="msapplication-TileImage" content="<?= $elm_icon ?>">
    <meta name="theme-color" content="<?= $elm_color ?>" />
    <meta property="fb:pages" content="123177025337" />
    <link rel="canonical" href="<?= bloginfo('url') ?>" />
    <link rel="icon" href="<?= $elm_icon ?>" sizes="32x32" />
    <link rel="apple-touch-icon" href="<?= $elm_icon ?>" />
    <?php 
    // <link rel="alternate" type="application/rss+xml" title="Fuente RSS para El Mañana" href="https://www.elmanana.com.mx/rss/feed.xml" />
    // <link rel="stylesheet" href="<?php bloginfo('template_url') ?X>/style.css" />
    wp_head();
    ?>

</head>
<body>
  <?php
      get_template_part('global/navbar-breakingnews');
      get_template_part('global/navbar-services');
      get_template_part('global/navbar-logo');
      get_template_part('global/navbar-categories');
  ?>