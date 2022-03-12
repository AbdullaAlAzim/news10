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
 */
get_header();
if (is_active_sidebar('sidebar-1')) {
    $main = 'col-lg-8';
    $sidebar = 'col-lg-4';
} else {
    $main = 'col-lg-8';
    $sidebar = 'col-lg-4';
}
?>
    <!-- news secton start  -->
  <section class="post-archive news10-section">
                <div class="container">
                    <div class="row">
                        <div class="<?php echo esc_attr($main);?>">
                             <div class="news10-title mt-0">
                                <div class="news10-title-text">
                                    <h2><?php esc_html_e('Archive','news10'); ?></h2>
                                </div>
                            </div>
                              <div class="news10-news-list">
                                <ul>
                            <?php if (have_posts()) :

                                /* Start the Loop */
                                while (have_posts()) : the_post();

                                    get_template_part('template-parts/content', get_post_format());

                                endwhile;

                            else :

                                get_template_part('template-parts/content', 'none');

                            endif; ?>
                             </ul>   
                        </div>
                    </div>
                    <div class="<?php echo esc_attr($sidebar);?>"><?php get_template_part( 'layouts/sidebar', 'right' ); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- news secton end  -->
     <nav class="news10-pagination" aria-label="Page navigation example">
        <div class="container">
             <?php news10_pagination(); ?>
        </div>
     </nav>
    
<?php get_footer();