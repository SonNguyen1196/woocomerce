$(document).ready(function () {
    $('.add-to-cart-link').on('click', function (e) {
        e.preventDefault();
        var linkIntane = $(this);
        var idProduct = $(this).data('product-id');
        $.ajax({
            data: {
                action: 'custom_ajax_add_to_cart',
                product_id: idProduct,
            },
            type: 'POST',
            dataType : 'json',
            url: ajax_object.ajax_url ,
            beforeSend: function(){
                linkIntane.find('.icon-handbag').hide();
                linkIntane.find('.fa-spinner').addClass('active');
                linkIntane.find('.fa-spinner').show();
            },

            success: function (response) {
                console.log(response);
                // if (response.data.code == 200){
                //     setTimeout(function () {
                //         linkIntane.find('.icon-handbag').show();
                //         linkIntane.find('.fa-spinner').hide();
                //     }, 2000);
                //
                // }
            },

            error: function () {

            }

        })
    })

})