$(document).ready(function () {
    console.log('ca');
    $('.woocommerce-pagination li .page-numbers').on('click', function (e) {
        e.preventDefault();
        $.ajax({
            method: 'GET',
            url: ajax_object.ajax_url,
            data: {
                page_number : $(this).text(),
                action: 'get_data_product_page_ajax',
            },
            dataType: 'html',
            success: function (data) {
                console.log(data);
            },

            error: function (error) {

            }
        })
    })
})