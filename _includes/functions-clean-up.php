<?php
/**
	*Should match Workhorse Marketing Stand-alone scripts
	*Table of Contents
	*1.  Remove Windows Live Writer Link
	*2.  Remove shortlinks
	*3.  Remove comment feeds from head
	*5.  Remove admin styles
	*6.  Remove Theme Editor & Themes
	*7.  Remove blog client link
	*8.  Remove wp-embed.min.js
	*9. Remove Emoji styles
	*10. Remove extra feed links
**/

//1. Remove Windows Live Writer Link
remove_action( 'wp_head', 'wlwmanifest_link');

//2. Remove shortlinks
remove_action( 'wp_head', 'wp_shortlink_wp_head');

//3. Remove comment feeds from head
add_filter( 'feed_links_show_comments_feed', '__return_false' );

//5. Remove admin styles
function whmbp_admin_styles() {
	echo '<style>
     		#toplevel_page_wpengine-common, li#toplevel_page_wpmudev
			{
				display:none !important;
			}
     	</style>';
}
add_action('admin_head', 'whmbp_admin_styles');

//  6. Remove Theme Editor & Themes
function whmbp_remove_menus() {
	remove_submenu_page( 'themes.php', 'theme-editor.php' );
	remove_submenu_page ('themes.php', 'themes.php');
	remove_submenu_page ('themes.php', 'customize.php');
	remove_submenu_page ('index.php', 'update-core.php');
	remove_menu_page('plugins.php');
  remove_menu_page('edit-comments.php');
}
add_action( 'admin_menu', 'whmbp_remove_menus' );

//7. Remove blog client link
remove_action ('wp_head', 'rsd_link');

//8. Remove wp-embed.min.js
function whmbp_deregister_wp_embed() {
	wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'whmbp_deregister_wp_embed' );

//9. Remove emoji styles
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

//10. Remove extra feed links
remove_action( 'wp_head', 'feed_links_extra', 3 );
