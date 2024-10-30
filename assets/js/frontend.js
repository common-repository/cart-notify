(function ($) {
    "use strict";

    var closing = "<svg xmlns='http://www.w3.org/2000/svg' x='0px' y='0px' width='15' height='15' viewBox='0 0 24 24'><path d='M12,2C6.47,2,2,6.47,2,12c0,5.53,4.47,10,10,10s10-4.47,10-10C22,6.47,17.53,2,12,2z M16.707,15.293 c0.391,0.391,0.391,1.023,0,1.414C16.512,16.902,16.256,17,16,17s-0.512-0.098-0.707-0.293L12,13.414l-3.293,3.293 C8.512,16.902,8.256,17,8,17s-0.512-0.098-0.707-0.293c-0.391-0.391-0.391-1.023,0-1.414L10.586,12L7.293,8.707 c-0.391-0.391-0.391-1.023,0-1.414s1.023-0.391,1.414,0L12,10.586l3.293-3.293c0.391-0.391,1.023-0.391,1.414,0 s0.391,1.023,0,1.414L13.414,12L16.707,15.293z'></path></svg>";

    console.log(closing);


    jQuery(document).ready(function () {
        $.notiny.addTheme("CNS_dark", {
            notification_class: "notify-theme-CNS-dark notiny-default-vars",
        });

        console.log(CNS_params.notifyposition);

        // add_to_cart_button function
        $(document).on(
            "click",
            ".add_to_cart_button:not(.product_type_variable)",
            function () {
                var productthumnail = $(this)
                    .closest(".product")
                    .find("img")
                    .attr("src");

                var productTitle = $(this).closest(".product").find("h2").text();
                productTitle = "<h2> " + productTitle + " </h2>";

                var successMessage =
                    "<span>The product has been successfully added to the cart</span>" + "<span class='cns_close'>" + closing + "</span>";

                var all = productTitle + " " + successMessage;
                $.notiny({
                    theme: "CNS_dark",
                    width: '400',
                    // autohide: false,
                    image: productthumnail,
                    text: all,
                    position: CNS_params.notifyposition,
                });
            }
        );

        // single_add_to_cart_button function
        $(document).on(
            "click",
            ".single_add_to_cart_button:not(.disabled)",
            function () {
                var productthumnail = $(this)
                    .closest(".product")
                    .find("figure")
                    .find("img")
                    .attr("src");

                var productthumnail = $(this)
                    .closest(".product")
                    .find(".woocommerce-product-gallery__wrapper")
                    .find("img");

                if (productthumnail.length == 0) {
                    var productthumnail = $(this)
                        .closest(".product")
                        .find("a")
                        .find("img");
                }
                if (
                    typeof productthumnail == "undefined" ||
                    productthumnail.length == 0
                ) {
                    return false;
                }

                var productThumb_src = productthumnail.attr("src");

                var producttitle = $(this)
                    .closest(".product")
                    .find(".product_title")
                    .text();

                var successMessage =
                    "<span>The product has been successfully added to the cart</span>" + "<span class='cns_close'>" + closing + "</span>";

                var all = producttitle + " " + successMessage;

                $.notiny({
                    theme: "CNS_dark",
                    width: '400',
                    image: productThumb_src,
                    text: all,
                    position: CNS_params.notifyposition,
                    // position: 'right-top',
                });
            }
        );
    });
})(jQuery);
