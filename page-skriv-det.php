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

    <!-- page content -->
    <article class="post-651 page type-page status-publish hentry" id="post-651">
        <header class="entry-header has-text-align-center header-footer-group">
            <div class="entry-header-inner section-inner medium">
                <h1 class="entry-title">Skriv det</h1>
            </div><!-- .entry-header-inner -->
        </header><!-- .entry-header -->
                        
        <?php
        // the query
        $leserinnlegg_query = new WP_Query(array('post_type'=>'leserinnlegg', 'post_status'=>'publish', 'posts_per_page'=>-1,'cat'=> $category_id)); ?>
        <?php if ( $leserinnlegg_query->have_posts() ) : ?>

        <!-- the loop -->
       <?php while ( $leserinnlegg_query->have_posts() ) : $leserinnlegg_query->the_post(); ?>
            <div class="post-inner thin ">
                <div class="entry-content">
                    <div class="cell small-12 medium-4">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'twentyseventeen-featured-image' ); ?></a>
                    </div>
                    <div class="cell small-12 medium-8">
                    <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                    <?php the_content(''); ?>
                    </div>
                </div><!-- the actual content -->
            </div>
        <?php endwhile; ?>
        <!-- end of the loop -->
        <?php wp_reset_postdata(); ?>
        <?php else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>


        <div class="section-inner">
            <div class="post-meta-wrapper post-meta-edit-link-wrapper">
                <ul class="post-meta">
                    <li class="post-edit meta-wrapper">
                        <span class="meta-icon"><svg class="svg-icon" aria-hidden="true" role="img" focusable="false" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"><path fill="" d="M14.7272727,11.1763636 C14.7272727,10.7244943 15.0935852,10.3581818 15.5454545,10.3581818 C15.9973239,10.3581818 16.3636364,10.7244943 16.3636364,11.1763636 L16.3636364,15.5454545 C16.3636364,16.9010626 15.2646989,18 13.9090909,18 L2.45454545,18 C1.09893743,18 0,16.9010626 0,15.5454545 L0,4.09090909 C0,2.73530107 1.09893743,1.63636364 2.45454545,1.63636364 L6.82363636,1.63636364 C7.2755057,1.63636364 7.64181818,2.00267611 7.64181818,2.45454545 C7.64181818,2.9064148 7.2755057,3.27272727 6.82363636,3.27272727 L2.45454545,3.27272727 C2.00267611,3.27272727 1.63636364,3.63903975 1.63636364,4.09090909 L1.63636364,15.5454545 C1.63636364,15.9973239 2.00267611,16.3636364 2.45454545,16.3636364 L13.9090909,16.3636364 C14.3609602,16.3636364 14.7272727,15.9973239 14.7272727,15.5454545 L14.7272727,11.1763636 Z M6.54545455,9.33890201 L6.54545455,11.4545455 L8.66109799,11.4545455 L16.0247344,4.09090909 L13.9090909,1.97526564 L6.54545455,9.33890201 Z M14.4876328,0.239639906 L17.7603601,3.51236718 C18.07988,3.83188705 18.07988,4.34993113 17.7603601,4.669451 L9.57854191,12.8512692 C9.42510306,13.004708 9.21699531,13.0909091 9,13.0909091 L5.72727273,13.0909091 C5.27540339,13.0909091 4.90909091,12.7245966 4.90909091,12.2727273 L4.90909091,9 C4.90909091,8.78300469 4.99529196,8.57489694 5.14873082,8.42145809 L13.330549,0.239639906 C13.6500689,-0.0798799688 14.1681129,-0.0798799688 14.4876328,0.239639906 Z"></path></svg></span>
                        <span class="meta-text"><a href="https://broenstudentavis.local/wp-admin/post.php?post=651&amp;action=edit">Edit <span class="screen-reader-text">Skriv det</span></a></span>
                    </li>
                </ul><!-- .post-meta -->
            </div><!-- .post-meta-wrapper -->
        </div>
    </article>

</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php
get_footer();
