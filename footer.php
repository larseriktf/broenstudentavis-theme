<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>
            <footer id="site-footer" role="contentinfo" class="header-footer-group">
                <div class="footer-showcase">
                    <img id="footer-showcase-photo" src="<?php echo get_stylesheet_directory_uri(); ?>/images/photos/photos_hiof_bygning.JPG" alt="hiof">
                </div>
                <div class="footer-content">
                    <div class="footer-column">
                        <h3>Om oss</h3>
                        <p>Broen er en studentavis ved  Høgskolen i Østfold den ble lansert 3. Februar 2020.</p>
                        <p>Broen Studentavis har som mål å gi Studentene ved HiØ en fri taleplattform for å uttrykke meningene, sakene, verdiene og idealene våre.</p>
                        <p>Broen Studentavis følger retningslinjene for pressefrihet, ytringsfrihet, tale- og informasjonsfrihet stipulert i Vær varsom plakaten.</p>
                    </div>
                    <div class="footer-column">
                    </div>
                    <div class="footer-column">
                    </div>
                    <div class="footer-column">
                    </div>
                </div>


                <div class="footer-copyright">
                    <div class="footer-credits">
                        <p class="footer-copyright">&copy;
                            <?php
                            echo date_i18n(
                                /* translators: Copyright date format, see https://secure.php.net/date */
                                _x( 'Y', 'copyright date format', 'twentytwenty' )
                            );
                            ?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
                        </p><!-- .footer-copyright -->
                        <p class="powered-by-wordpress">
                            <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'twentytwenty' ) ); ?>">
                                <?php _e( '', 'twentytwenty' ); ?>
                            </a>
                        </p><!-- .powered-by-wordpress -->
                    </div><!-- .footer-credits -->
                    
                    <a class="to-the-top" href="#site-header">
                        <span class="to-the-top-long">
                            <?php
                            /* translators: %s: HTML character for up arrow */
                            printf( __( 'To the top %s', 'twentytwenty' ), '<span class="arrow" aria-hidden="true">&uarr;</span>' );
                            ?>
                        </span><!-- .to-the-top-long -->
                        <span class="to-the-top-short">
                            <?php
                            /* translators: %s: HTML character for up arrow */
                            printf( __( 'Up %s', 'twentytwenty' ), '<span class="arrow" aria-hidden="true">&uarr;</span>' );
                            ?>
                        </span><!-- .to-the-top-short -->
                    </a><!-- .to-the-top -->
                </div>
			</footer><!-- #site-footer -->

        <?php wp_footer(); ?>

	</body>
</html>




<!--

<div>
    <h3>Om oss</h3>
    <p>Broen er en studentavis ved  Høgskolen i Østfold den ble lansert 3. Februar 2020.</p>
    <p>Broen Studentavis har som mål å gi Studentene ved HiØ en fri taleplattform for å uttrykke meningene, sakene, verdiene og idealene våre.</p>
    <p>Broen Studentavis følger retningslinjene for pressefrihet, ytringsfrihet, tale- og informasjonsfrihet stipulert i Vær varsom plakaten.</p>
</div>
<div>
    <h3>Kontakt oss</h3>
    <p>E-post: Broen@broenstudentavis.no</p>
</div>

-->