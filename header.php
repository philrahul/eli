<!DOCTYPE html>
<html <?php language_attributes(); ?> >
  <head>
  	<meta charset="<?php bloginfo( 'charset' ); ?>" />
  	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#75d55b">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">    
  	<?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <a class="screen-reader-text" href="#content"><?php _e( 'Skip to Main Content', 'whmbp-theme' ); ?></a>
    <header class="bg-white main-header py-0">
      <nav class="navbar navbar-expand-lg navbar-dark d-block p-0">
        <div class="container-fluid py-4">
          <div class="row">
            <div class="col-12 d-flex">
          <?php $custom_logo_id = get_theme_mod( 'custom_logo' );
          $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );?>
              <a class="navbar-brand" href="/">
                <img src="<?php echo $image[0];?>" alt="eli_logo"
                  class="o-contain">
              </a>
              <button class="navbar-toggler d-block d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExample03"
                aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <?php wp_nav_menu( array('theme_location' => 'primary_menu',
                'container_class' => 'collapse navbar-collapse',
                'container_id'   => 'navbarsExample03',
                'menu_class'   =>  'navbar-nav ml-auto mt-5 mt-lg-0',
                'walker' => new My_Walker_Nav_Menu() ) ); ?>                             
            </div>
          </div>
          </div>
  		<?php //include_once('header-searchform.php'); ?>
      </nav>
    </header>