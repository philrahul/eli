<?php
/***************************************************************
Menus, Custom Post Types, Sidebars, etc...
    1. Menus
    2. Custom Posts Types	
    3. Sidebars		
***************************************************************/

// 1.  Menus
add_action( 'after_setup_theme', 'whmbp_register_menus' );
function whmbp_register_menus() {
	register_nav_menus( array(
		'primary_menu' => 'Primary Menu',
		'footer_menu' => 'Footer Menu',
	) );
}
// 3. Register Custom Post Types

// 4. Sidebars

// 5. ACF Options

if( function_exists('acf_add_options_page') && current_user_can( 'manage_options' ) ) {
	$parent = acf_add_options_page(array(
		'page_title' 	=> 'Options',
		'menu_title' 	=> 'Options',
		'redirect' 		=> false
	));
  
  $child = acf_add_options_sub_page(array(
      'page_title'  => __('Learn'),
      'menu_title'  => __('Learn'),
      'parent_slug' => $parent['menu_slug'],
  ));
  
}
