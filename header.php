<?php
/**
 * Header file for the Twenty Twenty WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >

		<link rel="profile" href="https://gmpg.org/xfn/11">

		<?php wp_head(); ?>
	</head>


	<body <?php body_class(); ?>>
		<?php wp_body_open(); ?>

		<header id="site-header" class="header-footer-group" role="banner">
            <div class="site-logo">
                <?php echo the_custom_logo(); ?>
            </div>

            <nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e( 'Horizontal', 'twentytwenty' ); ?>" role="navigation">
                <?php
                    wp_nav_menu(array(
                        'container' => ''
                    )); 
                ?>
            </nav><!-- .primary-menu-wrapper -->

            <div class="header-addons">
                <div class="header-tips-oss">

                </div>
            </div> 
        </header><!-- #site-header -->

		<?php
		// Output the menu modal.
		get_template_part( 'template-parts/modal-menu' );
