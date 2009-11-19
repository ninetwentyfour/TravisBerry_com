<?php
/**
 * Functions:	Optimize and style Contact Form 7 - WPCF7
 *
 */
// Remove the default Contact Form 7 Stylesheet
add_action( 'wp_print_styles', 'deregister_ct7_styles', 100 );

function deregister_ct7_styles() {
wp_deregister_style( 'contact-form-7' );
}
?>