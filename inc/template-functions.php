<?php

add_filter('body_class', 'news10_bodyclass_checker');
function news10_bodyclass_checker($classes)
{
    $classes[] = 'checkerbody';
    return $classes;
}


function news10_logo()
{
    $custom_logo_id = get_theme_mod('custom_logo');

    if ($custom_logo_id) {
        echo '<a class="site-logo" href=' . esc_url(home_url('/')) . ' rel="home">' . wp_get_attachment_image($custom_logo_id, 'full') . '</a>';
    } else {
        echo '<a class="site-logo" href=' . esc_url(home_url('/')) . ' rel="home">' . get_bloginfo('name') . '</a>';
    }
}

function news10_get_logo()
{
    $custom_logo_id = get_theme_mod('custom_logo');

    if ($custom_logo_id) {
        return '<a class="logo" href=' . esc_url(home_url('/')) . ' rel="home">' . wp_get_attachment_image($custom_logo_id, 'full') . '</a>';
    } else {
        return '<a class="logo" href=' . esc_url(home_url('/')) . ' rel="home">' . get_bloginfo('name') . '</a>';
    }
}

function news10_post_tag()
{

    if ('post' == get_post_type()) {

        $posttags = get_the_tags();
        $separator = '';
        $output = '';
        if ($posttags) {

            foreach ($posttags as $tag) {
                $output .= '<li><a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a></li>' . $separator;
            }

            $tags = trim($output, $separator);
            echo ' 
               
                    ' . $tags . '
                
            ';
        }
    }
}

function news10_post_share()
{
    ?>
    <ul>
        <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i
                        class="fab fa-facebook-f"></i></a></li>
        <li>
            <a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php echo the_title(); ?>&via=<?php the_author_meta('twitter'); ?>"><i
                        class="fab fa-twitter"></i></a></li>
        <li>
            <a href="mailto:type%20email%20address%20here?subject=I%20wanted%20to%20share%20this%20post%20with%20you%20from%20<?php bloginfo('name'); ?>&body=<?php the_title(); ?> - <?php the_permalink(); ?>"
               title="Email to a friend/colleague"><i class="far fa-envelope"></i></a></li>
        <li><a href="https://api.whatsapp.com/send?text=<?php the_title(); ?>: <?php the_permalink(); ?>"><i
                        class="fab fa-whatsapp"></i></a></li>
    </ul>
    <?php
}


function news10_single_category($default = true)
{

    if ('post' == get_post_type()) {
        $categories = get_the_category();
        $separator = ', ';
        $output = '';
        if ($categories) {
            foreach ($categories as $category) {

                $output .= '<a class="cat-links" href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>' . $separator;

            }
            $cat = trim($output, $separator);
            echo '<span class="post-cat leffect-1"><i class="dashicons dashicons-category"></i> ' . $cat . '</span>';
        }
    }

}

/*Filter searchform button markup*/
add_filter('get_search_form', 'news10_modify_search_form');

function news10_modify_search_form($form)
{
    $form = '<form class="password-form" role="search" method="get" id="search-form" action="' . esc_url(home_url('/')) . '" >
    <div><label class="screen-reader-text" for="s">' . esc_attr__('Search for:', 'news10') . '</label>
    <input type="text" placeholder="' . esc_attr__('Type and hit enter', 'news10') . '" class="form-control" value="' . get_search_query() . '" name="s" id="s" />
    <button type="submit"><i class="dashicons dashicons-search"></i></button>
    </div>
    </form>';

    return $form;
}


/*Filter password form markup*/
add_filter('the_password_form', 'news10_password_form');
function news10_password_form()
{
    global $post;
    $label = 'pwbox-' . (empty($post->ID) ? rand() : $post->ID);
    $o = '<form class="postpass-form" action="' .
        esc_url(site_url('wp-login.php?action=postpass',
            'login_post')) .
        '" method="post">
	 ' . esc_attr__('This post is password protected and this is what I want to say about that. To view it please enter your password below:', 'news10') . '
	 <input class="post-pass" name="post_password" placeholder="' . esc_attr__('Type and hit enter', 'news10') . '" id="' . $label . '" type="password" />
	 </form>
	 ';
    return $o;
}

/*No main nav fallback*/
function news10_no_main_nav($args)
{
    if (!current_user_can('manage_options')) {
        return;
    }
    extract($args);

    $link = $link_before . '<a href="' . esc_url(admin_url('nav-menus.php')) . '">' . $before . esc_attr__('Please assign PRIMARY menu location', 'news10') . $after . '</a>' . $link_after;

    if (FALSE !== stripos($items_wrap, '<ul') or FALSE !== stripos($items_wrap, '<ol')) {
        $link = "<li>$link</li>";
    }

    $output = sprintf($items_wrap, $menu_id, $menu_class, $link);
    if (!empty ($container)) {
        $output = "<$container class='$container_class' id='$container_id'>$output</$container>";
    }

    if ($echo) {
        echo news10_html($output);
    }

    return $output;
}

function news10_navigation()
{

    if (news10_theme_options('enb_single_nav')) {

        do_action('news10_single_navigation');

    } else { ?>
        <?php
        $prev = get_previous_post(true);
        $next = get_next_post(true);

        if ($prev) { ?>
            <a href="<?php echo get_permalink($prev->ID); ?>" class="news10-btn prev-post-btn"><span><i
                            class="fal fa-long-arrow-left"></i></span> Prev post</a>
        <?php }
        if ($next) { ?>
            <a href="<?php echo get_permalink($next->ID); ?>" class="news10-btn next-post-btn">Next post <span><i
                            class="fal fa-long-arrow-right"></i></span></a>
        <?php } ?>

    <?php }
}

function news10_numeric_posts_nav()
{

    if (is_singular())
        return;

    global $wp_query;

    /** Stop execution if there's only 1 page */
    if ($wp_query->max_num_pages <= 1)
        return;

    $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
    $max = intval($wp_query->max_num_pages);

    /** Add current page to the array */
    if ($paged >= 1)
        $links[] = $paged;

    /** Add the pages around the current page to the array */
    if ($paged >= 3) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if (($paged + 2) <= $max) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<nav class="news10-pagination">
								<ul>' . "\n";

    /** Previous Post Link */
    if (get_previous_posts_link())
        printf('<li>%s</li>' . "\n", get_previous_posts_link('<svg xmlns="http://www.w3.org/2000/svg" width="10" height="11" viewBox="0 0 10 11">
  <path id="Polygon_3" data-name="Polygon 3" d="M5.5,0,11,10H0Z" transform="translate(0 11) rotate(-90)" fill="#606060"/>
</svg>'));

    /** Link to first page, plus ellipses if necessary */
    if (!in_array(1, $links)) {
        $class = 1 == $paged ? ' class="active"' : '';

        printf('<li%s><a href="%s">0%s</a></li>' . "\n", $class, esc_url(get_pagenum_link(1)), '1');

        if (!in_array(2, $links))
            echo '<li>…</li>';
    }

    /** Link to current page, plus 2 pages in either direction if necessary */
    sort($links);
    foreach ((array)$links as $link) {
        $class = $paged == $link ? ' class="active"' : '';
        printf('<li%s><a href="%s">0%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($link)), $link);
    }

    /** Link to last page, plus ellipses if necessary */
    if (!in_array($max, $links)) {
        if (!in_array($max - 1, $links))
            echo '<li>…</li>' . "\n";

        $class = $paged == $max ? ' class="active"' : '';
        printf('<li%s><a href="%s">0%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($max)), $max);
    }

    /** Next Post Link */
    if (get_next_posts_link())
        printf('<li>%s</li>' . "\n", get_next_posts_link('<svg viewBox="0 0 124.512 124.512"><path d="M113.956,57.006l-97.4-56.2c-4-2.3-9,0.6-9,5.2v112.5c0,4.6,5,7.5,9,5.2l97.4-56.2 C117.956,65.105,117.956,59.306,113.956,57.006z"/></svg>'));

    echo '</ul></nav>' . "\n";

}

function news10_pagination()
{

    if (news10_theme_options('enb_pagination')) {

        do_action('news10_pagination');

    } else {

        news10_numeric_posts_nav();

    }
}

function news10_share_tags()
{

    if (news10_theme_options('enb_share_tag')) {

        do_action('news10_share_tags');

    } else {

        news10_post_tag();
    }
}

function news10_related_post()
{

    if (news10_theme_options('enb_rpost')) {

        do_action('news10_related_post');

    }

}

function news10_authorbox()
{

    if (news10_theme_options('enb_authbox')) {

        do_action('news10_authorbox');
    }

}

function news10_dynamic_header()
{
    $header_switch = news10_theme_meta('header_switch');
    $opt_header = news10_theme_options('opt_header');
    $opt_page_header = news10_theme_options('opt_page_header');

    if ($header_switch == '1') {
        do_action('news10_header');
    } else {
        if (!is_page_template('theme-builder.php') && !empty($opt_page_header)) {
            echo do_shortcode('[INSERT_ELEMENTOR id="' . $opt_page_header . '"]');
        } elseif (is_page_template('theme-builder.php') && !empty($opt_page_header)) {
            echo do_shortcode('[INSERT_ELEMENTOR id="' . $opt_header . '"]');
        } else {
            get_template_part('template-parts/header', 'one');
        }
    }
}

function news10_dynamic_footer()
{
    $footer_switch = news10_theme_meta('footer_switch');
    $opt_footer = news10_theme_options('opt_footer');

    if ($footer_switch == '1') {
        do_action('news10_footer');
    } else {
        if (!empty($opt_footer)) {
            echo do_shortcode('[INSERT_ELEMENTOR id="' . $opt_footer . '"]');
        } else {
            get_template_part('template-parts/footer', 'one');
        }
    }
}