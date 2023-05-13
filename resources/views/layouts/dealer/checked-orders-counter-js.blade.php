<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        loadMerchantPanel();

        function loadMerchantPanel() {
            $.ajax({
                type: "GET",
                url: '{{ route('dealer.panel.checked.orders.counter') }}',
                success: function(response) {
                    $('.checked_cound').html(response.checkedOrdersCount);
                },
            });
        }
    });
</script>
