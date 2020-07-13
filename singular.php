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

function custom_categories($categories) {
    foreach ($categories AS $cat_id) :
        $cat = get_category( $cat_id );?>

        <div class="<?php echo 'post-category-' . $cat_id; ?>"></div>
    <?php endforeach;
}

// query
$mainPosts = new WP_Query(array(
    'posts_per_page' => -1,
    'cat' => '41, 44', // leserinnlegg, nyheter
    'post_type' => 'post',
    'orderby' => 'date',
    'order' => 'DESC',
    'paged' => $paged
));

$sidePosts = new WP_Query(array(
    'posts_per_page' => -1,
    'cat' => '1, 45, 42, 46', // uncategorized, spisekammeret, kultur, meninger
    'post_type' => 'post',
    'orderby' => 'date',
    'order' => 'DESC',
    'paged' => $paged
));

?>

<main id="site-content" role="main">

    <section class="section-frontpage">
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
