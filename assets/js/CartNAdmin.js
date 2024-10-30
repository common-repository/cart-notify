// For jQuery
(function ($) {
    "use strict";
    jQuery(document).ready(function () {
        // CNS_Options


        /**
        * Ajax install WooCommerce
        * 
        * @since 3.0
        */
        $(document).on('click', '.cartnotify-install-woocommerce', function (e) {
            e.preventDefault();

            var current = $(this);
            var plugin_slug = current.attr("data-plugin-slug");

            current.addClass('updating-message').text('Installing...');

            var data = {
                action: 'cartnotify_ajax_install_plugin',
                _ajax_nonce: CNS_admin.cns_ajax_nonce,
                slug: plugin_slug,
            };

            jQuery.post(CNS_admin.cns_admin_ajax, data, function (response) {
                // console.log(response);
                // console.log(response.data.activateUrl);
                current.removeClass('updating-message');
                current.addClass('updated-message').text('Installed!');
                current.attr("href", response.data.activateUrl);
            })
                .fail(function () {
                    current.removeClass('updating-message').text('Failed!');
                })
                .always(function () {
                    current.removeClass('cartnotify-install-woocommerce updated-message').addClass('activate-now button-primary').text('Activating...');
                    current.unbind(e);
                    current[0].click();
                });
        });

    })
})(jQuery);
