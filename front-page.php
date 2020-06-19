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

    <section class="section-middle">
        <div class="flex-row">
            <div class="frontpage-main-thread">
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
                                    <div class="box-image"><?php // display image if exists, or replace
                                    if (has_post_thumbnail()) {
                                        the_post_thumbnail('medium_large');
                                    } else {
                                        echo wp_get_attachment_image(162, 'medium_large');
                                    } ?></div>
                                    <h2><?php echo the_title(); ?></h2>
                                </div>
                            </a>

                <?php endwhile; endif; ?>
            </div>
            <div class="frontpage-minor-thread">
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
                                    <div class="box-image"><?php // display image if exists, or replace
                                    if (has_post_thumbnail()) {
                                        the_post_thumbnail('medium');
                                    } else {
                                        echo wp_get_attachment_image(162, 'medium');
                                    } ?></div>
                                    <h2><?php echo the_title(); ?></h2>
                                </div>
                            </a>

                    <?php endwhile; endif; ?>
            </div>
        </div>
    </section>

</main><!-- #site-content -->

<?php
get_footer();
