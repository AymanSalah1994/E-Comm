@extends('layouts.store.main_page')
@section('title', 'Wish List Items')

@section('slider')

@endsection
@section('content')
    @if ($wishListItems->count() == 0)
        @include('layouts.dividers.divider-small')
        <div>
            <div class="container py-5">
                <div class="card shadow product_data mb-3">
                    <div class="card-body">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-6">
                                <img src="{{ asset('images/some_asset/cart.png') }}" alt="" width="30%">
                            </div>
                            <div class="col-md-3">
                                {{ __('Your Wish List is Empty !') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="container py-5">
            @foreach ($wishListItems as $wish_list_item)
                <div class="card shadow product_data mb-3">
                    <div class="card-body">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-4">
                                <img src="{{ Storage::url($wish_list_item->product->product_picture) }}"
                                    class="image-responsive" width="25%" alt="">
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('product.details', $wish_list_item->product->slug) }}">
                                    <h3>{{ $wish_list_item->product->name }}</h3>
                                </a>
                            </div>
                            <div class="col-md-2">
                                {{ $wish_list_item->product->selling_price }} {{ __('EGP') }}
                            </div>
                            <div class="col-md-2">
                                <input type="hidden" value="{{ $wish_list_item->id }}" class="wishListItemID">
                                <button type="button"
                                    class="btn btn-danger deleteFromWishListBtn from-prevent-multiple-submits">
                                    {{ __('Delete') }} <i class="bi bi-trash3"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <br>
    @endif
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.deleteFromWishListBtn').click(function(e) {
                e.preventDefault();
                $(".from-prevent-multiple-submits").attr("disabled", "true");
                var wishListItemID = $(this).closest('.product_data').find('.wishListItemID').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: "POST",
                    url: '{{ route('wish.list.item.delete') }}',
                    data: {
                        'wishListItemID': wishListItemID,
                    },
                    success: function(response) {
                        window.location.reload();
                        $.notify(response.status, "success");
                        // swal(response.status);
                        // $('.toast').toast('show');
                    },
                    error: function(request, status, error) {
                        var reqError = JSON.parse(request.responseText);
                        // swal(reqError.message)
                        $.notify(reqError.message, "error");
                    }
                });
            });
        });
    </script>
@endsection
