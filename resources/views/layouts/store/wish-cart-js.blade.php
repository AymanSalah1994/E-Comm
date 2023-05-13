<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        loadCart();
        loadWishList();

        function loadCart() {
            $.ajax({
                type: "GET",
                url: '{{ route('cart.counter') }}',
                success: function(response) {
                    $('.cart_counter').html(response.cart_count);
                },
            });
        }

        function loadWishList() {
            $.ajax({
                type: "GET",
                url: '{{ route('wish.list.counter') }}',
                success: function(response) {
                    $('.wish_list_counter').html(response.wlc);
                },
            });
        }

        $('.addToCartBtn').click(function(e) {
            e.preventDefault();
            var product_id = $(this).closest('.product_data').find('.product_id').val();
            var product_quantity = $(this).closest('.product_data').find('.quantity-input').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: "POST",
                url: '{{ route('cart.add') }}',
                data: {
                    'product_id': product_id,
                    'product_quantity': product_quantity
                },
                success: function(response) {
                    $.notify(response.status, "success");
                    // swal(response.status)
                    loadCart();
                },
                error: function(request, status, error) {
                    var reqError = JSON.parse(request.responseText);
                    // swal("Soemthing Wrongyy , 10 Items are max")
                    $.notify("Maximum Number 10", "error");
                }
            });
        });


        $('.addToWishListBtn').click(function(e) {
            e.preventDefault();
            var product_id = $(this).closest('.product_data').find('.product_id').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: "POST",
                url: '{{ route('wish-list.add') }}',
                data: {
                    'product_id': product_id,
                },
                success: function(response) {
                    $.notify(response.status, "success");
                    loadWishList();
                },
                error: function(request, status, error) {
                    var reqError = JSON.parse(request.responseText);
                    $.notify(reqError.message, "error");
                }
            });
        });
    });
</script>
