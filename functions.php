<?php
// Remove links in header for replacement with static links
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wp_generator');
// Remove the default Contact Form 7 Stylesheet
add_action( 'wp_print_styles', 'deregister_ct7_styles', 100 );

function deregister_ct7_styles() {
wp_deregister_style( 'contact-form-7' );
}
// Add the Contact Form 7 scripts on selected pages
function deregister_cf7_js() {
if ( !is_page('contact') ) {
wp_deregister_script( 'contact-form-7' );
}
}
add_action( 'wp_print_scripts', 'deregister_cf7_js', 100 );
// Remove more link jump
function remove_more_jump_link($link) { 
$offset = strpos($link, '#more-');
if ($offset) {
$end = strpos($link, '"',$offset);
}
if ($end) {
$link = substr_replace($link, '', $offset, $end-$offset);
}
return $link;
}
add_filter('the_content_more_link', 'remove_more_jump_link');
?>