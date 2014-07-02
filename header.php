<?php
/**
 * The header template
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Gildersleeve
 */
?>

<!DOCTYPE html>
 
<!--[if lt IE 9]>
<html id="ie" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html class="no-js" <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width">
    
    <title><?php bloginfo('name'); ?><?php wp_title( '|', true, 'left' ); ?></title>
    
    <!-- favicon & links -->
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <!-- stylesheets are enqueued via functions.php -->

    <!-- all other scripts are enqueued via functions.php -->
    <!--[if lt IE 9]>
        <script src="<?php echo get_template_directory_uri(); ?>/assets/vendor/html5shiv.js" type="text/javascript"></script>
    <![endif]-->

      <?php // Lets other plugins and files tie into our theme's <head>:
    wp_head(); ?>
</head>
 
<body <?php body_class(); ?>>
<div id="page">
   <header id="site-header" role="banner">            
              <nav id="leftmenu" class="navigation" role="navigation">
                  <?php wp_nav_menu( array( 'theme_location' => 'leftmenu' ) ); ?>
              </nav><!-- #access -->    
              <h1>
                  <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                      <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php bloginfo('name'); ?>" />
                  </a>
              </h1>
              <nav id="rightmenu" class="navigation" role="navigation">
                  <?php wp_nav_menu( array( 'theme_location' => 'rightmenu' ) ); ?>
              </nav><!-- #access -->  
      </header><!-- #branding -->
   
   
      <div id="main">