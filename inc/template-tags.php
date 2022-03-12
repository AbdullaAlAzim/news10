<?php

/**
 * 
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 */

function news10_theme_options($opt){
    $options = get_option('_news10');
    if (isset($options[$opt])){
        return $options[$opt];
    }
}

function news10_theme_meta($opt)
{
    $options = get_post_meta(get_the_ID(), '_news10_meta', 'true');
    if (isset($options[$opt])) {
        return $options[$opt];
    }
}

function news10_post_author(){
	$byline = sprintf(
		/* translators: %s: post author. */
		esc_html_x( '%s', 'post author', 'news10' ),
		'<a class="title" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>'
	);

	echo wp_kses_post($byline);
}

function news10_post_date(){

	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_attr( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_attr( get_the_modified_date() )
	);

	$posted_on = sprintf(
		/* translators: %s: post date. */
		esc_html_x( '%s', 'post date', 'news10' ),
		$time_string
	);

	echo '<span class="single-date"><i class="fas fa-clock"></i> '.$posted_on.'</span>';
}

function news10_category(){

        if ( 'post' == get_post_type() ) {
            $categories = get_the_category();
            $separator = '';
             
            $output = '';
            if($categories){
                foreach($categories as $category) {
          
                    $output .= '<a class="news10-btn" href="'.get_category_link( $category->term_id ).'">'.$category->cat_name.'</a>'.$separator;
                }
            $cat= trim($output, $separator);
            echo wp_kses_post($cat);
            }
        }

}

function news10_loop_category(){

        if ( 'post' == get_post_type() ) {
            $categories = get_the_category();
            $separator = ', ';

            $output = '';
            if($categories){
                foreach($categories as $category) {

                    $output .= $category->cat_name . $separator;
                }
            $cat= trim($output, $separator);
            echo wp_kses_post($cat);
            }
        }

}

function news10_loop_tags(){

        if ( 'post' == get_post_type() ) {
          
             $posttags = get_the_tags();
            if ($posttags) {
              foreach($posttags as $tag) {
                echo wp_kses_post($tag->name) . ' '; 
              }
            }
        }
    }
 

add_filter('wp_list_categories', 'news10_cat_count_span');
function news10_cat_count_span($links) {
  $links = str_replace('</a> (', '</a> <span class="cat-num">(', $links);
  $links = str_replace(')', ')</span>', $links);
  return $links;
}
function news10_style_the_archive_count($links) {
    $links = str_replace('</a>&nbsp;(', '</a> <span class="cat-num">(', $links);
    $links = str_replace(')', ')</span>', $links);
    return $links;
}

add_filter('get_archives_link', 'news10_style_the_archive_count');

add_filter('wp_generate_tag_cloud', 'news10_tagcloud_inline_style',10,1);
function news10_tagcloud_inline_style($input){
   return preg_replace('/ style=("|\')(.*?)("|\')/','',$input); 
}

function news10_theme_comment(){
    if ( ! post_password_required() ) {

        $num_comments = get_comments_number(); // get_comments_number returns only a numeric value

        if ( comments_open() ) {
            if ( $num_comments == 0 ) {
                $comments = esc_attr__('0 Comment', 'news10');
            } elseif ( $num_comments > 1 ) {
                $comments = $num_comments . esc_attr__('Comments', 'news10');
            } else {
                $comments = esc_attr__('1 Comment','news10');
            }
            $write_comments = $comments;

        } else {
            $write_comments =  esc_attr__('off', 'news10');
        }
        echo '<span>'.$write_comments.'</span>';
    }
}

function news10_html($out){
	return $out;
}


