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
?>

<main id="site-content" role="main">

    <section class="section-middle">
        <div class="frontpage-main-thread">
            <?php
            $homepagePosts = new WP_Query(array(
                'posts_per_page' => 10,
                'post_type' => 'post',
                'orderby' => 'date',
                'order' => 'DESC',
                'paged' => $paged
            ));

            if ( $homepagePosts->have_posts() ) : 
                while ( $homepagePosts->have_posts() ) :
                    
                    $homepagePosts->the_post();
                
                    // setup variables
                    $post_categories = wp_get_post_categories(get_the_ID()); // array of categories for current post
                    $check = array();
                    $allowed = array('41', '44', '46', '42'); // allowed categories

                    foreach ($post_categories AS $cat_id) { array_push($check, $cat_id); }

                    $contains = count(array_intersect($check, $allowed)) == count($check); // all values exists within 'allowed' array
                    if ($contains) : ?>

                    <!-- html boxes -->
                    <a href="<?php echo the_permalink() ?>">
                        <div class="frontpage-main-boxes">
                            <!-- category boxes -->
                            <div class="category-boxes">
                                <?php
                                    
                                foreach ($post_categories AS $cat_id) {
                                    $cat = get_category( $cat_id );?>

                                    <div class="<?php echo 'post-category-' . $cat_id; ?>"><?php echo $cat->name; ?></div>
                                <?php } ?>
                            </div>
                            <div class="box-image"><?php // display image if exists, or replace
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('medium_large');
                            } else {
                                echo wp_get_attachment_image(162, 'medium_large');
                            } ?></div>
                            <h2><?php echo the_title(); ?></h2>
                        </div>
                    </a>

                    <?php endif;
                endwhile; 
            endif; ?>
        </div>
        <div class="frontpage-minor-thread">
            <?php
             if ( $homepagePosts->have_posts() ) : 
                while ( $homepagePosts->have_posts() ) :

                    $homepagePosts->the_post();

                    // setup variables
                    $post_categories = wp_get_post_categories(get_the_ID()); // array of categories for current post
                    $check = array();
                    $allowed = array('1', '45'); // allowed categories

                    foreach ($post_categories AS $cat_id) { array_push($check, $cat_id); }

                    $contains = count(array_intersect($check, $allowed)) == count($check); // all values exists within 'allowed' array
                    if ($contains) : ?>

                    <!-- html boxes -->
                    <a href="<?php echo the_permalink() ?>">
                        <div class="frontpage-minor-boxes">
                            <!-- category boxes -->
                            <div class="category-boxes">
                                <?php
                                    
                                foreach ($post_categories AS $cat_id) {
                                    $cat = get_category( $cat_id );?>

                                    <div class="<?php echo 'post-category-' . $cat_id; ?>"><?php echo $cat->name; ?></div>
                                <?php } ?>
                            </div>
                            <div class="box-image"><?php // display image if exists, or replace
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('medium');
                            } else {
                                echo wp_get_attachment_image(162, 'medium');
                            } ?></div>
                            <h2><?php echo the_title(); ?></h2>
                        </div>
                    </a>

                    <?php endif;
                endwhile; 
            endif; ?>
        </div>
    </section>

</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php
get_footer();
