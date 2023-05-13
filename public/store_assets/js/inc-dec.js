$(document).ready(function() {
    $('.increment-btn').click(function(e) {
        e.preventDefault();
        var box_value = $(this).closest('.product_data').find('.quantity-input').val();
        var parsed_box_value = parseInt(box_value, 10);
        parsed_box_value = isNaN(parsed_box_value) ? 0 : parsed_box_value;
        if (parsed_box_value < 10) {
            ++parsed_box_value;
            $(this).closest('.product_data').find('.quantity-input').val(parsed_box_value);
        }
    });

    $('.decrement-btn').click(function(e) {
        e.preventDefault();
        var box_value = $(this).closest('.product_data').find('.quantity-input').val();
        var parsed_box_value = parseInt(box_value, 10);
        console.log(parsed_box_value);
        parsed_box_value = isNaN(parsed_box_value) ? 0 : parsed_box_value;
        if (parsed_box_value > 1) {
            --parsed_box_value;
            $(this).closest('.product_data').find('.quantity-input').val(parsed_box_value);
        }
    });

});
