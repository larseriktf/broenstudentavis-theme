<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

get_header();

// functions etc.

?>

<main id="site-content" role="main">
    <section class="section-post">
        <div class="rekrutt-blokk style-info-box">
            <div class="icons-exclamation-mark"></div>
            <h2>Vi trenger flere ansatte!</h2>
            <p>
                test contenttest contenttest contenttest contenttest contenttest contenttest contenttest contenttest contenttest contenttest contenttest content
            </p>
            <p>Høres dette interessant ut for deg? Klikk her: <a>Link til påmelding</a></p>
        </div>

        <?php

            if ( have_posts() ) {

                while ( have_posts() ) {
                    the_post();

                    get_template_part( 'template-parts/content', get_post_type() );
                }
            }

        ?>
    </section>

</main><!-- #site-content -->

<?php
get_footer();
