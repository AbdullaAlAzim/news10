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

if (is_active_sidebar('sidebar-2')) {
    $main = 'col-lg-8';
    $sidebar = 'col-lg-4';
} else {
    $main = 'col-lg-8';
    $sidebar = 'col-lg-4';
}
?>
 <section class="business news10-slide-section news10-section">
        <div class="container">
            <div class="row">

 
                <div class="<?php echo esc_attr($main);?>">
                    <div class="news10-title">
                        <div class="news10-title-text">
                            <h2><?php the_archive_title(); ?></h2>
                        </div>
                    </div>
                   <?php if (have_posts()) :
                        /* Start the Loop */
                        while (have_posts()) : the_post();
                            get_template_part('template-parts/buisnesss');
                        endwhile;
                    endif; ?>
                </div>
               <div class="<?php echo esc_attr($sidebar);?>">
             
                <?php get_template_part( 'layouts/inner', 'sidebar' ); ?>
               
            </div>
        </div>
 </section>
    <!-- news secton end  -->


        <nav class="news10-pagination" aria-label="Page navigation example">
        <div class="container">
            <?php

           global  $wp_query;

           if ($wp_query->max_num_pages >= 3):

            news10_pagination();

        endif;
           ?>
             
        </div>
     </nav>
 <?php get_footer();