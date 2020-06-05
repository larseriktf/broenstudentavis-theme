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
			<div class="site-logo-wrapper">
            </div>
            <div class="site-title-wrapper">
            </div>
        </header><!-- #site-header -->


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

				<?php }


                if (true === $enable_header_search || has_nav_menu( 'expanded' )) { // Expanded menu?>

					<div class="header-toggles hide-no-js">

					<?php if (has_nav_menu( 'expanded' )) { ?>

						<div class="toggle-wrapper nav-toggle-wrapper has-expanded-menu">
							<button class="toggle nav-toggle desktop-nav-toggle" data-toggle-target=".menu-modal" data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
								<span class="toggle-inner">
									<span class="toggle-text"><?php _e( 'Menu', 'twentytwenty' ); ?></span>
									<span class="toggle-icon">
										<?php twentytwenty_the_theme_svg( 'ellipsis' ); ?>
									</span>
								</span>
							</button><!-- .nav-toggle -->
						</div><!-- .nav-toggle-wrapper -->

					<?php }


					if (true === $enable_header_search) { ?>

						<div class="toggle-wrapper search-toggle-wrapper">
							<button class="toggle search-toggle desktop-search-toggle" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false">
								<span class="toggle-inner">
									<?php twentytwenty_the_theme_svg( 'search' ); ?>
									<span class="toggle-text"><?php _e( 'Search', 'twentytwenty' ); ?></span>
								</span>
							</button><!-- .search-toggle -->
						</div>

					<?php } ?>

					</div><!-- .header-toggles -->
				<?php } ?>

				</div><!-- navigation-wrapper -->


        

		<?php
		// Output the menu modal.
		get_template_part( 'template-parts/modal-menu' );