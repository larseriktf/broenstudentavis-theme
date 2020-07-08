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


	<body id="site-body" <?php body_class(); ?>>
		<?php wp_body_open(); ?>

		<header id="site-header" class="header-footer-group" role="banner">
            <div class="header-content">
                    <h1 id="site-title"><?php the_title(); ?></h1>
                    <div class="site-logo">
                        <svg id="logo-graphic" class="abs-centered" aria-hidden="true" role="img" focusable="false" height="250px" width="250px" viewBox = "0 0 250 250" preserveAspectRatio="none">
                            <path
                                class="morph" d="m 250,125 c 0,8.62945 -9.18805,15.91238 -10.74164,23.50457 -1.55359,7.5922 4.08119,17.67367 0.91852,25.15107 -3.16267,7.4774 -14.27549,10.34745 -18.46726,16.55209 -4.19177,6.20463 -2.66613,17.52548 -8.32127,23.18062 -5.65514,5.65514 -16.97599,4.1295 -23.18062,8.32127 -6.20464,4.19177 -9.07469,15.30459 -16.55209,18.46726 -7.4774,3.16267 -17.55887,-2.47211 -25.15107,-0.91852 C 140.91238,240.81195 133.62945,250 125,250 c -8.62945,0 -15.91238,-9.18805 -23.50457,-10.74164 -7.592195,-1.55359 -17.673674,4.08119 -25.151071,0.91852 C 68.866962,237.01421 65.996915,225.90139 59.792274,221.70962 53.587634,217.51785 42.26679,219.04349 36.611652,213.38835 30.956515,207.73321 32.48215,196.41236 28.290377,190.20773 24.098604,184.00309 12.985792,181.13304 9.8231196,173.65564 6.6604475,166.17824 12.295226,156.09677 10.741639,148.50457 9.1880521,140.91238 0,133.62945 0,125 0,116.37055 9.1880521,109.08762 10.741639,101.49543 12.295226,93.903235 6.6604475,83.821756 9.8231196,76.344359 12.985792,68.866962 24.098604,65.996915 28.290377,59.792274 32.48215,53.587634 30.956515,42.26679 36.611652,36.611652 42.26679,30.956515 53.587634,32.48215 59.792274,28.290377 65.996915,24.098604 68.866962,12.985792 76.344359,9.8231196 83.821756,6.6604475 93.903235,12.295226 101.49543,10.741639 109.08762,9.1880521 116.37055,0 125,0 c 8.62945,0 15.91238,9.1880521 23.50457,10.741639 7.5922,1.553587 17.67367,-4.0811915 25.15107,-0.9185194 7.4774,3.1626724 10.34745,14.2754844 16.55209,18.4672574 6.20463,4.191773 17.52548,2.666138 23.18062,8.321275 5.65514,5.655138 4.1295,16.975982 8.32127,23.180622 4.19177,6.204641 15.30459,9.074688 18.46726,16.552085 3.16267,7.477397 -2.47211,17.558876 -0.91852,25.151071 C 240.81195,109.08762 250,116.37055 250,125 Z"
                                fill="#006387"
                            ></path>
                        </svg>
                        <?php echo the_custom_logo(); ?>
                    </div>


                <nav class="header-nav-desktop" aria-label="<?php esc_attr_e( 'Horizontal', 'twentytwenty' ); ?>" role="navigation">
                    <?php
                        wp_nav_menu(array(
                            'container' => ''
                        )); 
                    ?>
                </nav><!-- header-nav-desktop -->


                <!-- nav-tablet-button -->

                <button class="nav-toggle-waffle nav-unclicked" data-toggle-target=".menu-modal" data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
                    
				</button>

                <nav class="header-nav-tablet" aria-label="Mobile" role="navigation">
                    <?php
                        wp_nav_menu(array(
                            'container' => '',
                        )); 
                    ?>
				</nav><!-- header-nav-tablet -->

                <a class="header-tips-oss">
                    <div class="tips-oss-text">
                        <p>Tips Oss!</p>
                    </div>
                    <div class="tips-oss-icon">
                        <img id="tips-oss-img" src="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/icons_mail.svg" alt="mail icon" />
                    </div>
                    </a>
            </div> 
        </header><!-- #site-header -->

		<?php
		// Output the menu modal.
		get_template_part( 'template-parts/modal-menu' );
