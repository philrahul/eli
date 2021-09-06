<?php

/***************************************************************
Workhorse Marketing Boilerplate functions.php
	TABLE OF CONTENTS
	1. Includes for Specific Purposes
		1a. Add All Custom Post Types, menus, sidebars
		1b. Enqueue all scripts and styles
		1c. Clean up backend and frontend
		1d. Pagination
		1e. Security
    1.g. Login CSS
	2. Internationalization
	3. Theme Supports
	4. Custom Code
***************************************************************/

// 1. Includes
//	Please use these files which are grouped by type before adding to main functions.php file

// 1a. Add All Custom Post Types, menus, sidebars
require_once( __DIR__ . '/_includes/functions-register.php');

// 1.b. Enqueue all scripts and styles
require_once( __DIR__ . '/_includes/functions-enqueue.php');

// 1c. Clean up backend and frontend. Generally do not edit
require_once( __DIR__ . '/_includes/functions-clean-up.php');

// 1.d. Pagination
require_once( __DIR__ . '/_includes/functions-pagination.php');

// 1.e. Security
require_once( __DIR__ . '/_includes/functions-security.php');

// 1.f. ACF Sync - Warn if ACF field sync is needed
require_once( __DIR__ . '/_includes/functions-acf-sync.php');

// 1.g. Login page CSS
require_once( __DIR__ . '/_includes/functions-login.php');

require_once( __DIR__ . '/_includes/functions-blocks.php');

//1.g. Require Featured Image
// Required for valid structured data. Does not need to display on website frontend
add_theme_support('post-thumbnails'); // this needs to be defined before the following include
if(current_theme_supports('post-thumbnails')){
	require_once( __DIR__ . '/_includes/functions-featured-image.php');
}
// 2. Internationalization
add_action('after_setup_theme', 'whmbp_theme_setup');
function whmbp_theme_setup(){
    load_theme_textdomain( 'whmbp-theme', TEMPLATEPATH.'/languages' );
}

// 3. Theme Supports
add_theme_support( "title-tag" );

// 4. Custom Code

?>
