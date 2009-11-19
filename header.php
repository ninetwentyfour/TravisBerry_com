<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head profile="http://gmpg.org/xfn/11">
<title><?php bloginfo('name'); ?> &middot; <?php bloginfo('description'); ?></title>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=8" />
<!--[if lt IE 8]>
<script src="http://ie7-js.googlecode.com/svn/version/2.0(beta3)/IE8.js" type="text/javascript"></script>
<![endif]-->
<!--[if lte IE 7]>
<style type="text/css">
#footer {
display:none;
}
#sidestripe {
width: 300px;
    height: 670px;
    background-image:url('http://www.travisberry.com/wp-content/themes/tbsite/images/sidestripe.jpg');
    background-repeat:no-repeat;
    background-color:#efecc3;
    position:absolute;
    z-index:1;
    float:left;
}
#contentbox {
    float:right;
    width:660px;
   position:relative;
    z-index:33;
    background-color:#efecc3;
}
#content {
width: 650px;
    margin: 20px 20px 10px 0px;
    padding: 10px 5px 50px 5px;
    float:right ;
    border-style:solid;
border-width:5px;
    border-color:#54452e;
	color:#54452e;
    font-size:1.2em;
    letter-spacing: -.04em;
     line-height: 1em;
    word-spacing:-1px;
    position:absolute;
    z-index:34;
}
h4 {
font-size:48px;
color:#54452e;
font-family: "Boogie", 'Times New Roman', serif;
}
#navbar {
width: 640px;
    height:50px;
    background-color: #54452e;
    margin: 0px 0px 0px 12px;
    font-size:40px;
    color:#efecc3;
    font-family: "Boogie", 'Times New Roman', serif;
    padding: 0px 0px 8px 10px;
position:relative;
    z-index:1;
}
#navbar ul {
   list-style:none;
    margin: 0px 0px 0px 0px;
}
</style>
<![endif]-->

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
<li<?php if ( is_page('contact'))  { echo ' class="current_page_item"'; } ?>><a href="<?php bloginfo('url'); ?>/contact/">Contact</a></li>


</ul>
</div>