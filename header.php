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
    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <!-- END FONT -->
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  	<!-- END BOOTSTRAP -->
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header class="bg-white main-header py-0 fixed-top">
      <nav class="navbar navbar-expand-lg navbar-dark d-block p-0">
        <div class="container-fluid py-4">
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
  		<?php include_once('header-searchform.php'); ?>
      </nav>
    </header>
