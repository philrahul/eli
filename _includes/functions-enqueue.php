<?php
/***************************************************************
	Enqueue all scripts and styles.
	1. JS In the footer of course
  2. Load local versions of CSS, JS, and fonts rather than CDNs
  3. Do not use time-based cache busting for file versioning. Ever.
***************************************************************/

/**
	*    Table of Contents
	*1.  File Versioning for deployment
  *2.  Enqueue everything
	*3.  Ensure sure Gravity Forms works when scripts loaded in footer
**/

//1. File Versioning for deployment
  //The versioning below can be used to cache bust files either using webhook to the Workhorse Refresh plugin or manually in /wp-admin/options.php via "wh_wp_version" option. Plugin also clears common caches used by WHM.

global $whmbp_version;
if(get_option( 'wh_wp_version')){
  $whmbp_version = get_option( 'wh_wp_version');
}else{
  add_option( 'wh_wp_version', 'local_1' );
  $whmbp_version = get_option( 'wh_wp_version');
}
// 2. Enqueue everything
function whmbp_nq_scripts() {
  global $whmbp_version;
  wp_enqueue_style( 'style', get_stylesheet_uri(),null,$whmbp_version);
  wp_enqueue_script ('whmpb-script', get_stylesheet_directory_uri() . '/_js/js.js', array('jquery'), $whmbp_version, true);

}
add_action('wp_enqueue_scripts', 'whmbp_nq_scripts');

// 3. Ensure sure Gravity Forms works when scripts loaded in footer
if ( class_exists( 'GFCommon' ) ) {
  add_filter( 'gform_init_scripts_footer', '__return_true' );
  add_filter( 'gform_cdata_open', 'wrap_gform_cdata_open', 1 );
  add_filter( 'gform_cdata_close', 'wrap_gform_cdata_close', 99 );
  function wrap_gform_cdata_open( $content = '' ) {
    if ( ! do_wrap_gform_cdata() ) {
      return $content;
    }
    $content = 'document.addEventListener( "DOMContentLoaded", function() { ' . $content;
    return $content;
  }
  function wrap_gform_cdata_close( $content = '' ) {
    if ( ! do_wrap_gform_cdata() ) {
      return $content;
    }
    $content .= ' }, false );';
    return $content;
  }
  function do_wrap_gform_cdata() {
    if (
      is_admin()
      || ( defined( 'DOING_AJAX' ) && DOING_AJAX )
      || isset( $_POST['gform_ajax'] )
      || isset( $_GET['gf_page'] ) // Admin page (eg. form preview).
      || doing_action( 'wp_footer' )
      || did_action( 'wp_footer' )
    ) {
      return false;
    }
    return true;
  }
}
