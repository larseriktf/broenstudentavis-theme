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
                while ( $homepagePosts->have_posts() ) : $homepagePosts->the_post();?>
                
                <a href="<?php echo the_permalink() ?>">
                    <div class="frontpage-main-boxes">
                        <?php //echo wp_get_attachment_image_srcset(get_post_thumbnail_id())?>
                        <!-- category boxes -->
                        <div class="category-boxes">
                            <?php
                            $post_categories = wp_get_post_categories(get_the_ID());
                            foreach ($post_categories AS $cat_id) {
                                $cat = get_category( $cat_id );?>

                                <div class="<?php echo 'post-category-' . $cat_id; ?>"><?php echo $cat->name; ?></div>
                            <?php } ?>
                        </div>

                        <div class="box-image"><?php echo the_post_thumbnail('medium_large'); ?></div>
                        <h2><?php echo the_title(); ?></h2>
                    </div>
                </a>
                
                <?endwhile; 
            endif;
            ?>
        </div>
        <div class="fontpage-minor-thread">
        </div>
    </section>

</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php
get_footer();
