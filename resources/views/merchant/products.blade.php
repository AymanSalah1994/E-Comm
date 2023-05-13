@extends('layouts.merchant.merchant_panel')
@section('content')
    <div class="card">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-7">
                <div class="card px-5">
                    <div class="card-body">
                        <h3 class="card-title">{{ __('Search') }} :</h3>
                        <form action="" class="form-inline" style="width:100%">
                            <input type="search" name="search_word" class="input-group-text" style="width:100%">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        @foreach ($products as $product)
            <div class="row justify-content-end align-items-center">
                <div class="col-md-4">
                    <a href="{{ route('merchant.panel.product.view', $product->slug) }}" class="btn btn-primary">{{__('View')}}</a>
                </div>
                <div class="col-md-8">
                    <div class="card mb-1" style="">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="{{ $product->product_picture }}" class="card-img card-img-top" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text">
                                        {{ Str::limit($product->description, $limit = 50, $end = '...') }}
                                    </p>
                                    <p class="card-text">
                                        <small class="text-muted">
                                            Price : {{ $product->selling_price }}
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $products->appends(request()->only(['search_word']))->links() }}
@endsection

@section('scripts')
    @if ($status = session('status'))
        <script>
            swal("Done !", "{{ $status }}", "success");
        </script>
    @endif
@endsection
