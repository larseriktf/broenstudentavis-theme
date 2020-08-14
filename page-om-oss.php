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
            <h2>Søker ansatte</h2>
            <p>
                Er du en student ved Høgskolen i Østfold som ønsker å delta i noe større?
                Vi søker deg som engasjerer seg for journalistikk, ledelse, grafisk design eller IT.
            </p>
            <p>Høres dette interessant ut? Ta kontakt og fortell oss hva du kan!</p>
            <a href="mailto:Broen@broenstudentavis.no?subject=Søknad%20til%20stilling" class="button-border-white element-centered">TA KONTAKT: broen@broenstudentavis.no</a>
            <p>Eller send oss en melding via <a href="https://www.facebook.com/Broen-Studentavis-110608023806866">Facebook siden</a> vår.</p>
            
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
