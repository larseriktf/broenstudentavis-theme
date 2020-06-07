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
            <div class="site-header-top">
                <div class="site-logo-wrapper">
                    <?php echo the_custom_logo(); ?>
                </div>
                <div class="site-tagline-wrapper">
                    <p><?php echo get_bloginfo('description'); ?></p>
                </div>
            </div>

            <div class="site-header-bottom">
                <div class="site-title-wrapper">
                    <h1><a href="<?php echo home_url(); ?>"><?php echo get_bloginfo('name'); ?></a></h1>
                </div>

                <div class="navigation-wrapper">
                    <?php if (has_nav_menu( 'primary' ) || !has_nav_menu( 'expanded' )) { // Primary Menu ?>
                        <nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e( 'Horizontal', 'twentytwenty' ); ?>" role="navigation">
                            <ul class="primary-menu reset-list-style">
                                <?php
                                if (has_nav_menu( 'primary' )) {

                                    wp_nav_menu(
                                            array(
                                                'container'  => '',
                                                'items_wrap' => '%3$s',
                                                'theme_location' => 'primary',
                                            )
                                        );

                                    } elseif (!has_nav_menu( 'expanded' )) {

                                        wp_list_pages(
                                            array(
                                                'match_menu_classes' => true,
                                                'show_sub_menu_icons' => true,
                                                'title_li' => false,
                                                'walker'   => new TwentyTwenty_Walker_Page(),
                                            )
                                        );
                                    }
                                ?>
                            </ul>
                        </nav><!-- .primary-menu-wrapper -->
                    <?php } ?>
                </div><!-- navigation-wrapper -->
            </div><!-- site-navbar-wrapper -->
        </header><!-- #site-header -->

		<?php
		// Output the menu modal.
		get_template_part( 'template-parts/modal-menu' );
