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
		1.g. Login page CSS
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

// 1.h. Login styling
require_once( __DIR__ . '/_includes/functions-blocks.php');
//1.g. Require Featured Image
// Required for valid structured data. Does not need to display on website frontend
add_theme_support('post-thumbnails'); // this needs to be defined before the following include

// if(current_theme_supports('post-thumbnails')){
// 	require_once( __DIR__ . '/_includes/functions-featured-image.php');
// }

// 2. Internationalization
add_action('after_setup_theme', 'whmbp_theme_setup');
function whmbp_theme_setup(){
    load_theme_textdomain( 'whmbp-theme', TEMPLATEPATH.'/languages' );
}

// 3. Theme Supports
add_theme_support( "title-tag" );

// 4. Custom Code

function mat_blocks($blocks,$skip_h=false){
	foreach ($blocks as $block_key=>$block) {
		if($block_key==0 && !$skip_h){
			$block['attrs']['data']['first_one'] = true;
			$block['attrs']['data']['hh_heading_tag'] = 'h1';
		}else{
			$block['attrs']['data']['first_one'] = false;
			$block['attrs']['data']['hh_heading_tag'] = 'h2';
		}
		$show = true;
		if(isset($block['attrs']['data']['hide_section']) && $block['attrs']['data']['hide_section']==1){
			$show = false;
		}
		if($show){
			if(isset($block['blockName']) && $block['blockName']){
				if(isset($block['attrs']['data']['headline'])){
					echo '<a name="'.clean_up_class($block['attrs']['data']['headline']).'" class="hh-anchor"></a>';
				}
				echo '<a name="section-'.($block_key+1).'" class="hh-anchor"></a>';
			}
			echo render_block($block);
		}
	}
}



function wh_setup_image($image,$size,$width,$height,$class='',$null_alt = false){
	if($image){
		$img_src = wp_get_attachment_image_url( $image, $size );
		$srcset = '';
		$sizes = '';
		$width_val = $height_val='';
		$alt_text = !$null_alt?get_post_meta($image, '_wp_attachment_image_alt',$size):'';
		$add_class = '';
		if($class){
			$add_class .= ' class="'.$class.'"';
		}
		if($width){ $width_val = ' width='.$width; }
		if($height){ $height_val = ' height='.$height; }
		return '<img '.$width_val. $height_val .' src="'.esc_url( $img_src ).'" alt="'.$alt_text.'"'.$add_class.'>';
	}
}

function wh_blocks($blocks,$skip_h=false){
	foreach ($blocks as $block_key=>$block) {
		if($block_key==0 && !$skip_h){
			$block['attrs']['data']['first_one'] = true;
			$block['attrs']['data']['hh_heading_tag'] = 'h1';
		}else{
			$block['attrs']['data']['first_one'] = false;
			$block['attrs']['data']['hh_heading_tag'] = 'h2';
		}
		$show = true;
		if(isset($block['attrs']['data']['hide_section']) && $block['attrs']['data']['hide_section']==1){
			$show = false;
		}
		if($show){
			if(isset($block['blockName']) && $block['blockName']){
				if(isset($block['attrs']['data']['headline'])){
					echo '<a name="'.clean_up_class($block['attrs']['data']['headline']).'" class="hh-anchor"></a>';
				}
				echo '<a name="section-'.($block_key+1).'" class="hh-anchor"></a>';
			}
			echo render_block($block);
		}
	}
}

function clean_up_class($class){
	$clean_class = strip_tags($class);
	$clean_class = strtolower($clean_class);
	$clean_class = str_replace(' ','-',$clean_class);
	$clean_class = str_replace('/','-',$clean_class);
	return $clean_class;
}

function wh_setup_buttons($buttons,$class="wh-btn-solid btn-custom"){
	//echo '<pre>'; print_r($buttons); echo '</pre>';
	if(isset($buttons) && is_array($buttons)){
		foreach($buttons as $button_array){
			$button = $button_array['button'];
			$wp_link =  $button['wp_link'];
			if($button['style']=="Outline"){
				$class = 'wh-btn-solid';
			}
			if($button['style']=="Outline"){
				$class = 'wh-btn-outline btn-custom-outline';
			}
			$target="";
			if($wp_link['target'] && !$button['video']){
				$target=' '.$wp_link['target'];
			}
			$video = '';
			$rel = '';
			if (strpos($wp_link['url'], 'http') !== false && strpos($wp_link['url'], $_SERVER['HTTP_HOST']) === false) {
				$rel = 'rel="noreferrer"';
			}
			$screenReaderText = '';
			if($button['screen_reader_text'] != ''){
				$screenReaderText = '<span class="screen-reader-text"> '.$button['screen_reader_text'].'</span>';
			}
			echo '<a href="'.$wp_link['url'].'"'.$target.$video.' class="'.$class.'" '.$rel.' aria-label="'.$wp_link['title'].'">'.$wp_link['title'].$screenReaderText.'</a>';
		}
	}
}

class My_Walker_Nav_Menu extends Walker_Nav_Menu {
	function start_lvl(&$output, $depth = 0, $args = NULL){
	$indent = str_repeat("\t", $depth);
	$output .= "\n$indent<ul class=\"dropdown-menu d-none d-lg-block\">\n"; 
	}
	function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
		$object = $item->object;
    	$type = $item->type;
    	$title = $item->title;
    	$description = $item->description;
    	$permalink = $item->url;
		
		array_push($item->classes, 'nav-item');
		if(in_array('menu-item-has-children', $item->classes)){
			array_push($item->classes, 'dropdown');
		}
		if($depth >= 1){
			$output .= "<li class='dropdown-item'><a href='".$permalink."'>".$title."</a></li>";
		} else {
			$output .= "<li class='" .  implode(" ", $item->classes) . "'>";

			if(in_array('menu-item-has-children', $item->classes)){
				$output .= '<a href="' . $permalink . '" class="nav-link dropdown-toggle">';
			}
			else{
				$output .= '<a href="' . $permalink . '" class="nav-link">';
			}

			if(in_array('menu-item-has-children', $item->classes)){
				$output .= '<span>'.$title.'</span>';
			}
			else{
				$output .= $title;
			}
			$output .= '</a>';

			if(in_array('menu-item-has-children', $item->classes)){
				$output .= '<button type="button" class="float-right show-menu"><i class="fas fa-plus d-lg-none"></i></button>';
			}
		}    
    }	
}

/*
* Registering Products Custom Post Type
*/
 
function custom_post_type() {
 
	// Set UI labels for Custom Post Type
		$labels = array(
			'name'                => _x( 'Products', 'Post Type General Name', 'whmbp-theme' ),
			'singular_name'       => _x( 'Product', 'Post Type Singular Name', 'whmbp-theme' ),
			'menu_name'           => __( 'Products', 'whmbp-theme' ),
			'parent_item_colon'   => __( 'Parent Product', 'whmbp-theme' ),
			'all_items'           => __( 'All Products', 'whmbp-theme' ),
			'view_item'           => __( 'View Product', 'whmbp-theme' ),
			'add_new_item'        => __( 'Add New Product', 'whmbp-theme' ),
			'add_new'             => __( 'Add New', 'whmbp-theme' ),
			'edit_item'           => __( 'Edit Product', 'whmbp-theme' ),
			'update_item'         => __( 'Update Product', 'whmbp-theme' ),
			'search_items'        => __( 'Search Products', 'whmbp-theme' ),
			'not_found'           => __( 'Not Found', 'whmbp-theme' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'whmbp-theme' ),
		);
		 
	// Set other options for Custom Post Type
		 
		$args = array(
			'label'               => __( 'products', 'whmbp-theme' ),
			'description'         => __( 'Products', 'whmbp-theme' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
			'taxonomies'          => array( 'categories' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'show_in_rest' => true,
			'menu_icon' => 'dashicons-superhero'
		);
 
		// Registering your Custom Post Type
		register_post_type( 'products', $args );	 
	}
	 
	add_action( 'init', 'custom_post_type', 0 );

/*Registering Product Categories*/
add_action( 'init', 'create_products_custom_taxonomy', 0 );
 
//create a custom taxonomy name it "type" for your posts
function create_products_custom_taxonomy() {
 
  $labels = array(
    'name' => _x( 'Categories', 'taxonomy general name' ),
    'singular_name' => _x( 'Category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Categories' ),
    'all_items' => __( 'All Categories' ),
    'parent_item' => __( 'Category Type' ),
    'parent_item_colon' => __( 'Category Type:' ),
    'edit_item' => __( 'Edit Category' ), 
    'update_item' => __( 'Update Category' ),
    'add_new_item' => __( 'Add New Category' ),
    'new_item_name' => __( 'New Category' ),
    'menu_name' => __( 'Categories' ),
  ); 	
 
  register_taxonomy('product-categories',array('products'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'categories' ),
  ));
}

/*
* Registering Learn Custom Post Type
*/
 
function learn_post_type() {
 
	// Set UI labels for Custom Post Type
		$labels = array(
			'name'                => _x( 'Learn', 'Post Type General Name', 'whmbp-theme' ),
			'singular_name'       => _x( 'Learn', 'Post Type Singular Name', 'whmbp-theme' ),
			'menu_name'           => __( 'Learn', 'whmbp-theme' ),
			'parent_item_colon'   => __( 'Parent Learn', 'whmbp-theme' ),
			'all_items'           => __( 'All Learn', 'whmbp-theme' ),
			'view_item'           => __( 'View Learn', 'whmbp-theme' ),
			'add_new_item'        => __( 'Add New Learn', 'whmbp-theme' ),
			'add_new'             => __( 'Add New', 'whmbp-theme' ),
			'edit_item'           => __( 'Edit Learn', 'whmbp-theme' ),
			'update_item'         => __( 'Update Learn', 'whmbp-theme' ),
			'search_items'        => __( 'Search Learn', 'whmbp-theme' ),
			'not_found'           => __( 'Not Found', 'whmbp-theme' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'whmbp-theme' ),
		);
		 
	// Set other options for Custom Post Type
		 
		$args = array(
			'label'               => __( 'learn', 'whmbp-theme' ),
			'description'         => __( 'Learn', 'whmbp-theme' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
			'taxonomies'          => array( 'categories' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'show_in_rest' => true,
			'menu_icon' => 'dashicons-welcome-learn-more'
		);
 
		// Registering your Custom Post Type
		register_post_type( 'learn', $args );	 
	}
	 
	add_action( 'init', 'learn_post_type', 0 );

/*Registering Product Categories*/
add_action( 'init', 'create_products_custom_taxonomy_learn', 0 );
 
//create a custom taxonomy name it "type" for your posts
function create_products_custom_taxonomy_learn() {
 
  $labels = array(
    'name' => _x( 'Categories', 'taxonomy general name' ),
    'singular_name' => _x( 'Category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Categories' ),
    'all_items' => __( 'All Categories' ),
    'parent_item' => __( 'Category Type' ),
    'parent_item_colon' => __( 'Category Type:' ),
    'edit_item' => __( 'Edit Category' ), 
    'update_item' => __( 'Update Category' ),
    'add_new_item' => __( 'Add New Category' ),
    'new_item_name' => __( 'New Category' ),
    'menu_name' => __( 'Categories' ),
  ); 	
 
  register_taxonomy('learn-categories',array('learn'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'categories' ),
	'show_in_rest' => true
  ));
}


	//Add site logo
	add_theme_support( 'custom-logo', array(
		'height'               => 100,
		'width'                => 400,
		'flex-height'          => true,
		'flex-width'           => true,
		'header-text'          => array( 'site-title', 'site-description' ),
		'unlink-homepage-logo' => true,
	) );
	 
 function add_stylesheets()
 {
	wp_enqueue_style('bootstrap-css','https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css');
	wp_enqueue_script( 'bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js', array(), '1.0.0', true );
	wp_enqueue_style( 'roboto', 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap', false );
	wp_enqueue_style( 
		'font-awesome-5', 
		'https://use.fontawesome.com/releases/v5.3.0/css/all.css', 
		array(), 
		'5.3.0' 
	);	
	wp_enqueue_style('main-css',get_template_directory_uri().'/_css/main.css');
}
 add_action('wp_enqueue_scripts','add_stylesheets');

?>