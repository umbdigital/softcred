;(function($) {

    'use strict'

    // media_upload
    var media_upload = function(button_class) {
        var _custom_media = true,
            _orig_send_attachment = wp.media.editor.send.attachment;
        jQuery('body').on('click', button_class, function(e) {
            var button_id = '#' + jQuery(this).attr('id');
            var self = jQuery(button_id);
            var send_attachment_bkp = wp.media.editor.send.attachment;
            var button = jQuery(button_id);
            var id = button.attr('id').replace('_button', '');
            _custom_media = true;
            wp.media.editor.send.attachment = function(props, attachment) {
                if (_custom_media) {
                    jQuery('.themesflat_media_id').val(attachment.id);
                    jQuery('.themesflat_image_uri').val(attachment.url);
                    jQuery('.themesflat_media_image').attr('src', attachment.url).css('display', 'block');
                } else {
                    return _orig_send_attachment.apply(button_id, [props, attachment]);
                }
            }
            wp.media.editor.open(button);
            return false;
        });
    };

// Dom Ready
$(function() {
    media_upload('.themesflat_media_upload');
});
})(jQuery);