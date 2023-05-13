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
                url: '{{ route('merchant.panel.related.items.counter') }}',
                success: function(response) {
                    $('.related_count').html(response.relatedCount);
                },
            });
        }
    });
</script>
