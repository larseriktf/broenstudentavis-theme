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

// variables
$cat_artikkel = get_category_by_slug( 'artikkel' )->term_id;
$cat_debatt = get_category_by_slug( 'debatt' )->term_id;
$cat_leserinnlegg = get_category_by_slug( 'leserinnlegg' )->term_id;
$cat_spiskammeret = get_category_by_slug( 'spisekammeret' )->term_id;
$cat_uncategorized = get_category_by_slug( 'uncategorized' )->term_id;
$cat_utdanningskvalitet = get_category_by_slug( 'utdanningskvalitet' )->term_id;

// query
$mainPosts = new WP_Query(array(
    'posts_per_page' => -1,
    'cat' =>    $cat_artikkel .','.
                $cat_leserinnlegg .','.
                $cat_debatt .','.
                $cat_utdanningskvalitet,
    'post_type' => 'post',
    'orderby' => 'date',
    'order' => 'DESC',
    'paged' => $paged
));

$sidePosts = new WP_Query(array(
    'posts_per_page' => -1,
    'cat' =>    $cat_spiskammeret .','.
                $cat_uncategorized,
    'post_type' => 'post',
    'orderby' => 'date',
    'order' => 'DESC',
    'paged' => $paged
));

?>

<main id="site-content" role="main">

    <section class="section-frontpage">
        <div class="frontpage-main-thread">
            <div class="header-swift">
                <h2>Hva er nytt? <?php echo $cat_kultur ?></h2>
            </div>

            <?php // the first loop

                if ($mainPosts->have_posts()) :
                    while ($mainPosts->have_posts()) :
                        
                        $mainPosts->the_post();
                        $post_categories = wp_get_post_categories(get_the_ID()); // array of categories for current post
                        ?>

                        <!-- html boxes -->
                        <a href="<?php echo the_permalink() ?>">
                            <div class="frontpage-main-boxes">
                                <!-- category boxes -->
                                <div class="category-boxes"><?php custom_categories($post_categories); ?></div>
                                <?php // display image if exists, or replace
                                if (has_post_thumbnail()) {
                                    the_post_thumbnail('medium_large');
                                } else {
                                    echo wp_get_attachment_image(900, 'medium_large');
                                } ?>
                                <h2><?php echo the_title(); ?></h2>
                            </div>
                        </a>

            <?php endwhile; endif; ?>
        </div>
        <div class="frontpage-minor-thread">
            <div class="header-swift">
                <h2>Se også</h2>
            </div>

            <?php // the second loop

                if ($sidePosts->have_posts()) :
                    while ($sidePosts->have_posts()) :
                        
                        $sidePosts->the_post();
                        $post_categories = wp_get_post_categories(get_the_ID()); // array of categories for current post
                        ?>

                        <!-- html boxes -->
                        <a href="<?php echo the_permalink() ?>">
                            <div class="frontpage-minor-boxes">
                                <!-- category boxes -->
                                <div class="category-boxes"><?php custom_categories($post_categories); ?></div>
                                <?php // display image if exists, or replace
                                if (has_post_thumbnail()) {
                                    the_post_thumbnail('medium');
                                } else {
                                    echo wp_get_attachment_image(900, 'medium_large');
                                } ?>
                                <h2><?php echo the_title(); ?></h2>
                            </div>
                        </a>

                <?php endwhile; endif; ?>
        </div>
    </section>

</main><!-- #site-content -->

<?php
get_footer();
