<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package TheOne
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
    return;
}
?>
<div class="maan-comment-area">
<?php
// You can start editing here -- including this comment!
if ( have_comments() ) : ?>
    
        <h3 class="comment-title">
            <?php
                printf( // WPCS: XSS OK.
                    esc_html( _nx( '1 Comment', '%1$s Comments', get_comments_number(), 'comments title', 'news10' ) ),
                    number_format_i18n( get_comments_number() ),
                    '<span>' . get_the_title() . '</span>'
                );
            ?>
        </h3>
    
    <?php the_comments_navigation(); ?>
        <ul class="comment-list">
        <?php
            wp_list_comments( array(
                'style'      => 'ul',
                'short_ping' => true,
                'callback'  => 'theone_comment_template'
            ) );
        ?>
    </ul>


    <?php the_comments_navigation();
    // If comments are closed and there are comments, let's leave a little note, shall we?
    if ( ! comments_open() ) : ?>
        <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'news10' ); ?></p>
    <?php
    endif;
endif; //Check for have_comments(). 
?>
</div>

<div class="news10-news-form">
<?php 
$theone_comments_args = array(
            // Change the title of send button
            'label_submit' => esc_html__( 'Post Comment', 'news10' ),
            
             'fields'       =>array(

                'author'    => '<div class="row"><div class="col-lg-6"><input id="author" class="form-control mt-3" name="author" placeholder="Name*" type="text" size="30" maxlength="245" aria-required="true" required="required"></div>',                                
                
                'email'=> '<div class="col-lg-6"><input id="email"  name="email" class="form-control mt-3" placeholder="Email*" type="email" size="30" maxlength="100" aria-describedby="email-notes" aria-required="true" required="required"></div></div>',

                'url' =>'<div class="col-12"><input type="url" name="url" class="form-control mt-3" placeholder="Your Website"></div>',
                                                                                                    
                
            ),
        
            // Change the title of the reply section
            'title_reply' => esc_html__( 'Leave a Reply', 'news10' ),
            // Remove "Text or HTML to be displayed after the set of comment fields".
            'comment_notes_after' => '',
             'title_reply_before'    => '<h4 class="comment-title">',
             'title_reply_after'     => '</h4>',
            
            // Redefine your own textarea (the comment body).
             'comment_field'          =>'<div class="col-12"><textarea id="comment" class="form-control mt-3" name="comment" value= "message" placeholder="Write Comments" cols="45" rows="11" maxlength="65525" aria-required="true" required="required"></textarea></div>',


    );
    comment_form( $theone_comments_args );
?>
</div>
