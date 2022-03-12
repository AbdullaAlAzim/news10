<?php
/**
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 */

if (!function_exists('news10_setup')) {

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function news10_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on _s, use a find and replace
         * to change 'news10' to the name of your theme in all the template files.
         */
        load_theme_textdomain('news10', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');
        // Add theme support for images siza.
        add_image_size('news10-770-430', 770, 430, true);
        add_image_size('news10-370-260', 370, 260, true);
        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo');
        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => esc_html__('Primary', 'news10'),
        ));

        add_theme_support('wp-block-styles');
        add_theme_support('align-wide');
        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'script',
            'style',
        ));
        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('news10_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        //post formats

        add_theme_support('post-formats', array('video'));

    }
}
add_action('after_setup_theme', 'news10_setup');

define('NEWS10_PATH', get_template_directory());
define('NEWS10_URL', get_template_directory_uri());
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function news10_content_width()
{
    $GLOBALS['content_width'] = apply_filters('news10_content_width', 640);
}

add_action('after_setup_theme', 'news10_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function news10_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'news10'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'news10'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => ' <div class="news10-title"><h2>',
        'after_title' => '</div></h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Inner-sidebar', 'news10'),
        'id' => 'sidebar-2',
        'description' => esc_html__('Add widgets here.', 'news10'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => ' <div class="news10-title"><h2>',
        'after_title' => '</div></h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Widget', 'news10'),
        'id' => 'footer-widget',
        'description' => esc_html__('Add widgets here.', 'news10'),
        'before_widget' => '<div class="col-lg-4"><div id="%1$s" class="footer-items %2$s">',
        'after_widget' => '</div></div>',
        'before_title' => '<h2 class="title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'news10_widgets_init');

function news10_theme_version()
{
    $news10theme = wp_get_theme();
    $news10_version = esc_html($news10theme->get('Version'));
    return $news10_version;
}

/**
 * Register Google fonts.
 *
 * @return string Google fonts URL for the theme.
 */
function news10_fonts_url()
{
    $fonts_url = '';
    $fonts = array();
    $subsets = '';

    if ('off' !== esc_html_x('on', 'Jost font: on or off', 'news10')) {
        $fonts[] = 'Jost:300,400,500,600,700,800,900';
    }
    if ('off' !== esc_html_x('on', 'Open Sans: on or off', 'news10')) {
        $fonts[] = 'Open Sans:300,400,600,700,800,900';
    }

    if ($fonts) {
        $fonts_url = add_query_arg(array(
            'family' => urlencode(implode('|', $fonts)),
            'subset' => urlencode($subsets),
        ), 'https://fonts.googleapis.com/css');
    }

    return $fonts_url;
}

/**
 * Enqueue scripts and styles.
 */
function news10_scripts()
{
    //css style
    wp_enqueue_style('news10-fonts', news10_fonts_url());

    wp_enqueue_style('news10-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
    wp_enqueue_style('news10-flaticon', get_template_directory_uri() . '/assets/fonts/flaticon/flaticon.css');

    wp_enqueue_style('news10-fontawesome', get_template_directory_uri() . '/assets/fonts/fontawesome/css/fontawesome-all.min.css');

    wp_enqueue_style('news10-defaultt', get_template_directory_uri() . '/assets/css/news10-default.css');

    wp_enqueue_style('news10-responsive', get_template_directory_uri() . '/assets/css/responsive.css');

    wp_enqueue_style('news10-select', get_template_directory_uri() . '/assets/css/nice-select.css');

    wp_enqueue_style('news10-main', get_template_directory_uri() . '/assets/css/style.css');

    wp_enqueue_style('news10-new', get_template_directory_uri() . '/assets/css/new.css');

    wp_enqueue_style('news10-default', get_template_directory_uri() . '/assets/css/default.css');

    wp_enqueue_style('news10', get_stylesheet_uri());

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    //js style
    wp_enqueue_style('dashicons');

    wp_enqueue_script('news10-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), news10_theme_version(), true);

    wp_enqueue_script('news10-imagesloadedd', get_template_directory_uri() . '/assets/js/imagesloaded.pkgd.min.js', array('jquery'), news10_theme_version(), true);

    wp_enqueue_script('news10-isotopee', get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js', array('jquery'), news10_theme_version(), true);

    wp_enqueue_script('news10-counterupp', get_template_directory_uri() . '/assets/js/counterup.min.js', array('jquery'), news10_theme_version(), true);

    wp_enqueue_script('news10-venoboxx', get_template_directory_uri() . '/assets/js/venobox.min.js', array('jquery'), news10_theme_version(), true);

    wp_enqueue_script('news10-themeee', get_template_directory_uri() . '/assets/js/theme.js', array('jquery'), news10_theme_version(), true);

}
add_action('wp_enqueue_scripts', 'news10_scripts', 99);

function news10_admin_css()
{
    wp_enqueue_style('news10-admin-style', get_template_directory_uri() . '/assets/css/admin.css');
}

add_action('admin_enqueue_scripts', 'news10_admin_css');

/**
 * Custom template tags for this theme.
 */
require_once get_template_directory() . '/inc/template-tags.php';
require_once get_template_directory() . '/helper/customizer-extra.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require_once get_template_directory() . '/inc/template-functions.php';
/**
 * Functions which loaded from plugin.
 */
require_once get_template_directory() . '/inc/plug-dependent.php';
/**
 * Load plugin recommendation.
 */
require_once get_template_directory() . '/inc/plugin-recommendations.php';

/*for commnets tempples*/
require_once get_template_directory() . '/inc/comment-template.php';

// custom image size
add_image_size('news10-point-170-126', 170, 126, true);
add_image_size('news10-point-558-328', 558, 328, true);
add_image_size('news10-point-270-160', 270, 160, true);
add_image_size('news10-point-815-891', 815, 891, true);
add_image_size('news10-point-570-540', 570, 540, true);
add_image_size('news10-point-270-160', 270, 160, true);
add_image_size('news10-point-370-484', 370, 484, true);
add_image_size('news10-point-770-321', 770, 321, true);
add_image_size('news10-point-370-205', 370, 205, true);
add_image_size('news10-point-127-98', 127, 98, true);
add_image_size('news10-point-510-283', 510, 283, true);
add_image_size('news10-point-240-140', 240, 140, true);
add_image_size('news10-point-570-413', 570, 413, true);
add_image_size('news10-point-270-154', 270, 154, true);
add_image_size('news10-point-320-400', 320, 400, true);
add_image_size('news10-point-122-122', 122, 122, true);
add_image_size('news10-point-306-174', 306, 174, true);
add_image_size('news10-point-270-183', 270, 183, true);
add_image_size('news10-point-570-299', 570, 299, true);
add_image_size('news10-point-270-422', 270, 422, true);
add_image_size('news10-point-370-238', 370, 238, true);
add_image_size('news10-point-122-122', 122, 122, true);
add_image_size('news10-point-170-131', 170, 131, true);
add_image_size('news10-point-770-426', 770, 426, true);
add_image_size('news10-point-80-80', 80, 80, true);
add_image_size('news10-point-306-306', 306, 306, true);

/*
 * Set post views count using post meta
 */
function setPostViews($postID)
{
    $countKey = 'post_views_count';
    $count = get_post_meta($postID, $countKey, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $countKey);
        add_post_meta($postID, $countKey, '0');
    } else {
        $count++;
        update_post_meta($postID, $countKey, $count);
    }
}

function risset($array, $default = false)
{
    if (isset($array)) {
        return $array;
    }
    return $default;
}

//comment button
function custom_submit_comment_form($submit_button)
{
    return '<button type="submit" class="btn reply-btn">Post Comment</button>';
}

add_filter('comment_form_submit_button', 'custom_submit_comment_form');

/**
 * Moving the comments text field to bottom
 *
 */
function plus_point_move_comment($fields)
{
    $comment_field = $fields['comment'];
    unset($fields['comment']);
    $fields['comment'] = $comment_field;
    return $fields;
}
add_filter('comment_form_fields', 'plus_point_move_comment');

add_action('wp_enqueue_scripts', 'pt_like_it_scripts');
function pt_like_it_scripts()
{
    //if( is_single() ) {

    wp_enqueue_script('like-it', get_template_directory_uri() . '/assets/js/like-it.js', array('jquery'), '1.0', true);

    wp_localize_script('like-it', 'likeit', array(
        'ajax_url' => admin_url('admin-ajax.php'),
    ));
    //}
}
add_action('wp_ajax_nopriv_pt_like_it', 'pt_like_it');
add_action('wp_ajax_pt_like_it', 'pt_like_it');
function pt_like_it()
{

    if (!wp_verify_nonce($_POST['nonce'], 'pt_like_it_nonce')) {
        exit("No naughty business please");
    }

    $likes = get_post_meta($_REQUEST['post_id'], '_pt_likes', true);
    $likes = (empty($likes)) ? 0 : $likes;
    $new_likes = $likes + 1;

    update_post_meta($_REQUEST['post_id'], '_pt_likes', $new_likes);

    if (defined('DOING_AJAX') && DOING_AJAX) {
        echo wp_kses_post($new_likes);
        die();
    }
    die();
}
//add_filter( 'the_content', 'like_it_button_html', 99 );

function like_it_button_html($content)
{
    global $post;
    $like_text = '';

    $nonce = wp_create_nonce('pt_like_it_nonce');
    $link = admin_url('admin-ajax.php?action=pt_like_it&post_id=' . $post->ID . '&nonce=' . $nonce);
    $likes = get_post_meta(get_the_ID(), '_pt_likes', true);
    $likes = (empty($likes)) ? 0 : $likes;
    $like_text = '

                        <a class="like-button" href="#" data-id="' . get_the_ID() . '" data-nonce="' . $nonce . '"><i class="flaticon-like"></i> <span id="like-count-' . get_the_ID() . '" class="like-count">' . $likes . '</span> ' .
    __('Likes', 'news10') .
        '</a>
                  ';
    return $content . $like_text;
}


