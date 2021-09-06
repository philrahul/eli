<?php
/**
  *Should match Workhorse Marketing Stand-alone scripts
  *Table of Contents
  *1.  Disable XML-RPC
  *2.  Remove Rest API from <head> and headers
  *3.  Restrict access to the Rest API
  *4.  Disable application passwords
  *5.  Security Headers (commented out by default)
**/

//1. Disable XML-RPC
add_filter('xmlrpc_enabled', '__return_false');

//2. Remove Rest API from <head> and headers
remove_action('template_redirect', 'rest_output_link_header', 11);
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('xmlrpc_rsd_apis', 'rest_output_rsd');

//3. Restrict access to the Rest API to logged in users only
add_filter( 'rest_authentication_errors', function( $result ) {
  if ( ! empty( $result ) ) {
    return $result;
  }
  if ( ! is_user_logged_in() ) {
    return new WP_Error( 'rest_not_logged_in', 'You are not currently logged in.', array( 'status' => 401 ) );
  }
  return $result;
});

//4. Disable application passwords
add_filter( 'wp_is_application_passwords_available', '__return_false' );

//4. Security Headers (commented out by default)
/* Add via PHP here if .htaccess or server config is not available */
// function whmbp_add_security_headers() {
  // header( "strict-transport-security: max-age=31536000; preload" );
  // header( "x-content-type-options: nosniff" );
  // header( "x-xss-protection: 1; mode=block" );
  // header( "Permissions-Policy: geolocation=(), microphone=(), camera=()" );
  // header( "Referrer-Policy: no-referrer-when-downgrade" );
  // header ( "Content-Security-Policy: block-all-mixed-content; frame-ancestors 'self'" );
// }
// add_action( 'send_headers', 'whmbp_add_security_headers' );
