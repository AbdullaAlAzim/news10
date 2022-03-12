(function($){
    $(document).ready(function(){
        jQuery( '.like-button' ).on( 'click', function(e) {
    e.preventDefault();
    var post_id = jQuery(this).attr('data-id'),
        nonce = jQuery(this).attr("data-nonce");
        e.stopPropagation();

        const isLiked = localStorage.getItem('liked-'+post_id);
        if(isLiked) return false;
 console.log('ajax url', likeit.ajax_url)
    jQuery.ajax({
        url : likeit.ajax_url,
        type : 'post',
        data : {
            action : 'pt_like_it',
            post_id : post_id,
            nonce : nonce
        },
        success : function( response ) {
            console.log(response);
            jQuery('#like-count-'+post_id).html( response );
            localStorage.setItem('liked-'+post_id, true);
        }
    });
      
})
    })
})(jQuery)
// jQuery( document ).on( 'click', '.like-button', function(event) {
//     var post_id = jQuery(this).find('.like-button').attr('data-id'),
//         nonce = jQuery(this).find('.like-button').attr("data-nonce");
//     event.preventDefault();
//     e.stopPropagation();
//     jQuery.ajax({
//         url : likeit.ajax_url,
//         type : 'post',
//         data : {
//             action : 'pt_like_it',
//             post_id : post_id,
//             nonce : nonce
//         },
//         success : function( response ) {
//             jQuery('#like-count-'+post_id).html( response );
//         }
//     });

//     return false;
// });
// jQuery( document ).on( 'click', '.pt-like-it', function() {
//     var post_id = jQuery(this).find('.like-button').attr('data-id'),
//         nonce = jQuery(this).find('.like-button').attr("data-nonce");

//     jQuery.ajax({
//         url : likeit.ajax_url,
//         type : 'post',
//         data : {
//             action : 'pt_like_it',
//             post_id : post_id,
//             nonce : nonce
//         },
//         success : function( response ) {
//             jQuery('#like-count-'+post_id).html( response );
//         }
//     });

    // return false;
// });