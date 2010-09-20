<!DOCTYPE html>
<html class="chunk">
<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" href="http://www.travisberry.com/wp-content/themes/tbsite/ministyle2.css" type="text/css" media="screen" />
  <!--[if lte IE 7]>
  <link rel="stylesheet" href="http://www.travisberry.com/wp-content/themes/tbsite/ie.css" type="text/css" media="screen" />
  <![endif]-->
  <link rel="alternate" type="application/rss+xml" title="Travis Berry RSS Feed" href="http://www.travisberry.com/feed/" />
  <link rel="pingback" href="http://www.travisberry.com/xmlrpc.php" />
  <link rel="shortcut icon" href="http://www.travisberry.com/favicon.ico" type="image/x-icon" />
  <?php wp_head(); ?>
</head>
<body>
<section id="main">
    <!--[if lte IE 7]>
    <img src="http://www.travisberry.com/wp-content/themes/tbsite/images/footerimage.jpg" alt="Travis Berry" title="Travis Berry" />
    <![endif]-->
    <header>
        <nav>
            <ul>
                <li<?php if ( is_page('about') || is_404() ){ echo ' class="current_page_item"';}?>><a href="<?php echo get_option('home'); ?>/">Home</a></li>
                <li<?php if ( is_home() || is_page('blog')|| is_single() || is_search() || is_archive())  { echo ' class="current_page_item"'; } ?>><a href="<?php bloginfo('url'); ?>/blog/">Blog</a></li>
                <li<?php if ( is_page('work') || is_page('video') || is_page('web') || is_page('copyright-and-the-internet') || is_page('the-trunk') || is_page('applewood-rescue-commercial') || is_page('dccs-fashion-shoot') || is_page('dazbog-coffee-commercial') || is_page('changing-us-trailer') || is_page('canon-commercial') || is_page('aic-commercial') || is_page('apple-commercial'))  { echo ' class="current_page_item"'; } ?>><a href="<?php bloginfo('url'); ?>/work/">Work</a></li>
                <li<?php if ( is_page('contact') || is_page('343') || is_page('337'))  { echo ' class="current_page_item"'; } ?>><a href="<?php bloginfo('url'); ?>/contact/">Contact</a></li>
            </ul>
        </nav>
    </header>
