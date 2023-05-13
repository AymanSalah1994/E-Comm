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
                url: '{{ route('admin.panel.checked.orders.counter') }}',
                success: function(response) {
                    $('.checked_count_admin').html(response.checkedOrdersCount);
                },
            });
        }
    });
</script>
