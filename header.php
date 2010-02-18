<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html class="chunk">
<head profile="http://gmpg.org/xfn/11">
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<!--<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />-->
<link rel="stylesheet" href="http://www.travisberry.com/wp-content/themes/tbsite/ministyle2.css" type="text/css" media="screen" />

<!--[if lte IE 7]>
<link rel="stylesheet" href="http://www.travisberry.com/wp-content/themes/tbsite/ie.css" type="text/css" media="screen" />
<![endif]-->
<link rel="alternate" type="application/rss+xml" title="Travis Berry RSS Feed" href="http://www.travisberry.com/feed/" />
<link rel="pingback" href="http://www.travisberry.com/xmlrpc.php" />
<meta http-equiv="X-UA-Compatible" content="IE=8" />
<?php wp_head(); ?>
</head>

<body>
<div id="main">
  <!--[if lte IE 7]>
  <img src="http://www.travisberry.com/wp-content/themes/tbsite/images/footerimage.jpg" alt="Travis Berry" title="Travis Berry" />
  <![endif]-->
<div id="navbar">
    <!--[if lt IE 7]>
  <div style='border: 1px solid #F7941D; background: #FEEFDA; text-align: center; clear: both; height: 75px; position: relative;'>
    <div style='position: absolute; right: 3px; top: 3px; font-family: courier new; font-weight: bold;'><a href='#' onclick='javascript:this.parentNode.parentNode.style.display="none"; return false;'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-cornerx.jpg' style='border: none;' alt='Close this notice'/></a></div>
    <div style='width: 640px; margin: 0 auto; text-align: left; padding: 0; overflow: hidden; color: black;'>
      <div style='width: 75px; float: left;'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-warning.jpg' alt='Warning!'/></div>
      <div style='width: 275px; float: left; font-family: Arial, sans-serif;'>
	<div style='font-size: 14px; font-weight: bold; margin-top: 12px;'>'Friends don't let friends use IE6'</div>
        <div style='font-size: 12px; margin-top: 10px;'>You are using an outdated browser</div>
        <div style='font-size: 10px; margin-top: 3px; line-height: 10px;'>For a better, more secure, experience using this, and other sites, please upgrade to a modern web browser. For more information click <a href="http://browsehappy.com/"  style="color: blue" target="blank">here.</a></div>
      </div>
      <div style='width: 75px; float: left;'><a href='http://www.firefox.com' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-firefox.jpg' style='border: none;' alt='Get Firefox 3.5'/></a></div>
      <div style='width: 75px; float: left;'><a href='http://www.browserforthebetter.com/download.html' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-ie8.jpg' style='border: none;' alt='Get Internet Explorer 8'/></a></div>
      <div style='width: 73px; float: left;'><a href='http://www.apple.com/safari/download/' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-safari.jpg' style='border: none;' alt='Get Safari 4'/></a></div>
      <div style='float: left;'><a href='http://www.google.com/chrome' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-chrome.jpg' style='border: none;' alt='Get Google Chrome'/></a></div>
    </div>
  </div>
  <![endif]-->

<ul><li<?php if ( is_page('about') || is_404() ){ echo ' class="current_page_item"
  ';}?>><a href="<?php echo get_option('home'); ?>/">Home</a></li>
  <li<?php if ( is_home() || is_page('blog')|| is_single() || is_search() || is_archive())  { echo ' class="current_page_item"'; } ?>><a href="<?php bloginfo('url'); ?>/blog/">Blog</a></li>
<li<?php if ( is_page('work') || is_page('video') || is_page('web'))  { echo ' class="current_page_item"'; } ?>><a href="<?php bloginfo('url'); ?>/work/">Work</a></li>
<li<?php if ( is_page('contact') || is_page('343') || is_page('337'))  { echo ' class="current_page_item"'; } ?>><a href="<?php bloginfo('url'); ?>/contact/">Contact</a></li>


</ul>
</div>