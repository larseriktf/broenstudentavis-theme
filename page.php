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
// huh.. no functions?

global $post;
$cat_slug_id = get_category_by_slug( $post->post_name )->term_id;


// query
$mainPosts = new WP_Query(array(
    'posts_per_page' => -1,
    'cat' => $cat_slug_id,
    'post_type' => 'post',
    'orderby' => 'date',
    'order' => 'DESC',
    'paged' => $paged
));

?>

<main id="site-content" role="main">

    <section class="section-page">
        <div class="header-category">
            <h2>Kategori - <div class="post-category-<?php echo $cat_slug_id ?>"><?php echo $post->post_name ?></div></h2>
        </div>
        <div class="page-main-thread">
            <?php // the loop
                if ($mainPosts->have_posts()) :
                    while ($mainPosts->have_posts()) :
                        
                        $mainPosts->the_post();
                        ?>

                        <!-- html boxes -->
                        <a href="<?php echo the_permalink() ?>">
                            <div class="page-main-boxes">
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
    </section>

</main><!-- #site-content -->

<?php
get_footer();
