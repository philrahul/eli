<?php

if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_types');
}
function register_acf_block_types() {
  /* Icons pulled from https://github.com/FortAwesome/Font-Awesome/tree/master/svgs */
  $flag = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M336.174 80c-49.132 0-93.305-32-161.913-32-31.301 0-58.303 6.482-80.721 15.168a48.04 48.04 0 0 0 2.142-20.727C93.067 19.575 74.167 1.594 51.201.104 23.242-1.71 0 20.431 0 48c0 17.764 9.657 33.262 24 41.562V496c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-83.443C109.869 395.28 143.259 384 199.826 384c49.132 0 93.305 32 161.913 32 58.479 0 101.972-22.617 128.548-39.981C503.846 367.161 512 352.051 512 335.855V95.937c0-34.459-35.264-57.768-66.904-44.117C409.193 67.309 371.641 80 336.174 80zM464 336c-21.783 15.412-60.824 32-102.261 32-59.945 0-102.002-32-161.913-32-43.361 0-96.379 9.403-127.826 24V128c21.784-15.412 60.824-32 102.261-32 59.945 0 102.002 32 161.913 32 43.271 0 96.32-17.366 127.826-32v240z"/></svg>';
  
    acf_register_block_type(array(
    'name'              => 'hero',
    'title'             => __('Hero'),
    'description'       => __('A hero block.'),
    'render_template'   => '_template-parts/blocks/hero.php',
    'category'          => 'formatting',
    'icon'              => $flag ,
    'keywords'          => array( 'banner'),
    'post_types'        => array('page'),
    ));

    acf_register_block_type(array(
        'name'              => 'cta-banner',
        'title'             => __('CTA Banner'),
        'description'       => __('A Banner block with call to action.'),
        'render_template'   => '_template-parts/blocks/cta-banner.php',
        'category'          => 'formatting',
        'icon'              => $flag ,
        'keywords'          => array( 'cta','banner'),
        'post_types'        => array('page'),
        ));

    acf_register_block_type(array(
        'name'              => 'image-aside-text-with-background',
        'title'             => __('Image aside text with background'),
        'description'       => __('A Block for displaying Image aside text with background.'),
        'render_template'   => '_template-parts/blocks/image-aside-text-with-background.php',
        'category'          => 'formatting',
        'icon'              => $flag ,
        'keywords'          => array( 'image','text','background'),
        'post_types'        => array('page'),
        ));

    acf_register_block_type(array(
        'name'              => 'image-aside-text',
        'title'             => __('Image aside text'),
        'description'       => __('A Block for displaying Image aside text.'),
        'render_template'   => '_template-parts/blocks/image-aside-text.php',
        'category'          => 'formatting',
        'icon'              => $flag ,
        'keywords'          => array( 'image','text'),
        'post_types'        => array('page'),
        ));

    acf_register_block_type(array(
        'name'              => 'two-columns-cta',
        'title'             => __('Two columns with CTA'),
        'description'       => __('A Block for displaying Two columns with CTA.'),
        'render_template'   => '_template-parts/blocks/two-columns-cta.php',
        'category'          => 'formatting',
        'icon'              => $flag ,
        'keywords'          => array( 'columns','cta','text'),
        'post_types'        => array('page'),
        ));

    acf_register_block_type(array(
        'name'              => 'products-cta',
        'title'             => __('Products CTA'),
        'description'       => __('A Block for displaying Products CTA.'),
        'render_template'   => '_template-parts/blocks/products-cta.php',
        'category'          => 'formatting',
        'icon'              => $flag ,
        'keywords'          => array( 'columns','cta','text','products'),
        'post_types'        => array('page'),
        ));

    acf_register_block_type(array(
        'name'              => 'blog-list-cta',
        'title'             => __('Blog list CTA'),
        'description'       => __('A Block for displaying Products CTA.'),
        'render_template'   => '_template-parts/blocks/blog-list-cta.php',
        'category'          => 'formatting',
        'icon'              => $flag ,
        'keywords'          => array( 'columns','cta','text','blog'),
        'post_types'        => array('page'),
        ));

    acf_register_block_type(array(
        'name'              => 'form-aside-text',
        'title'             => __('Form aside text'),
        'description'       => __('A Block for displaying Form aside text.'),
        'render_template'   => '_template-parts/blocks/form-aside-text.php',
        'category'          => 'formatting',
        'icon'              => $flag ,
        'keywords'          => array( 'columns','form','text'),
        'post_types'        => array('page'),
        ));

    acf_register_block_type(array(
      'name'              => 'two-columns-cta-repeater',
      'title'             => __('Two columns CTA repeater'),
      'description'       => __('A Block for displaying Repeater with Two columns CTA.'),
      'render_template'   => '_template-parts/blocks/two-columns-cta-repeater.php',
      'category'          => 'formatting',
      'icon'              => $flag ,
      'keywords'          => array( 'columns','text','repeater'),
      'post_types'        => array('page'),
      ));

    acf_register_block_type(array(
      'name'              => 'image-aside-text-slider',
      'title'             => __('Image aside text slider'),
      'description'       => __('A Block for displaying a slider with image aside text.'),
      'render_template'   => '_template-parts/blocks/image-aside-text-slider.php',
      'category'          => 'formatting',
      'icon'              => $flag ,
      'keywords'          => array( 'image','text','slider'),
      'post_types'        => array('page'),
      ));

      acf_register_block_type(array(
        'name'              => 'image-aside-text-slider-with-background',
        'title'             => __('Image aside text slider with background'),
        'description'       => __('A Block for displaying a slider with image aside text with background.'),
        'render_template'   => '_template-parts/blocks/image-aside-text-slider-with-background.php',
        'category'          => 'formatting',
        'icon'              => $flag ,
        'keywords'          => array( 'image','text','slider','background'),
        'post_types'        => array('page'),
        ));
        
        

      

}


global $post;
$add_editor_style = false;
if (is_admin() && isset($_GET['post']) ) {
  global $common_blocks;
  $common_blocks = array('acf/cta-banner','acf/image-aside-text-with-background','acf/image-aside-text','acf/two-columns-cta','acf/blog-list-cta','acf/two-columns-cta-repeater','acf/image-aside-text-slider','acf/image-aside-text-slider-with-background');
  $pagetemplate = get_post_meta($_GET['post'], '_wp_page_template', true);
  if ( !empty( $pagetemplate ) ) {
    if ( $pagetemplate == 'page-custom-blocks.php') {
      $add_editor_style = true;
      add_filter('allowed_block_types', 'allowed_custom_blocks');
      function allowed_custom_blocks( $allowed_blocks ) {
        global $common_blocks;
        return $common_blocks;
      }
    }
  }
}

function tabor_setup() {
	  global $add_editor_style,$whmbp_version;
    if($add_editor_style){
      add_theme_support( 'editor-styles' );
      wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Roboto+Slab:wght@100;300;400;500;600;700;800&display=swap', false ); 
      add_editor_style( 'style.css' );
      add_editor_style( '_css/bootstrap.min.css' );
      add_editor_style( '_css/style.css');
        wp_enqueue_script ('whmpb-script', get_stylesheet_directory_uri() . '/_js/js.js', array('jquery'), $whmbp_version, true);
    }
}
add_action( 'after_setup_theme', 'tabor_setup' );


function wpdocs_enqueue_custom_admin_style() {
        wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/_css/admin.css', false, '1.0.5' );
        wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'wpdocs_enqueue_custom_admin_style' );

?>