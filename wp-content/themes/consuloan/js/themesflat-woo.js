/**
* flexslider_img_woo
* quantity_adjust
*/

;(function($) {

    'use strict'

    var flexslider_img_woo = function() { 
        if ($('.themesflat-slider .slides').data('gallery_image_product') === true) {
            $(window).load(function() {
                $('.themesflat-slider').flexslider({
                    animation: "slide",
                    controlNav: "thumbnails",
                    nextText: '<i class="fa fa-angle-right" aria-hidden="true"></i>',
                    prevText: '<i class="fa fa-angle-left" aria-hidden="true"></i>'
                });
            });
        } 
         
    };

    var quantity_adjust = function() {
        $( 'body' ).on( 'click', '.quantity .plus', function( e ) {
            var $input = $( this ).parent().parent().find( 'input' );
            $input.val( parseInt( $input.val() ) + 1 );

            $input.trigger( 'change' );
        });
        $( 'body' ).on( 'click', '.quantity .minus', function( e ) {
            var $input = $( this ).parent().parent().find( 'input' );
            var value = parseInt( $input.val() ) - 1;
            if ( value < 0 ) value = 0;
            $input.val( value );

            $input.trigger( 'change' );
        });
    };


// Dom Ready
$(function() {
    flexslider_img_woo(); 
    quantity_adjust();
});
})(jQuery);