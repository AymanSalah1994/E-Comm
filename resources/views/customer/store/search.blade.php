@extends('layouts.store.main_page')
@section('title', 'Search')
@section('slider')
@endsection

@section('content')
    <section class="search-sec">
        <div class="container">
            <form action="" method="GET">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-12 p-0">
                                <input type="text" class="form-control search-slt" name="search_word"
                                    value="{{ request('search_word') }}" placeholder="{{ __('Search by Product Name') }}">
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 p-0">
                                <button type="submit" class="btn btn-primary wrn-btn">{{ __('Search') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    @include('layouts.dividers.divider-small')
    <form action="" method="GET">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <input type="number" class="form-control search-slt" placeholder="{{ __('maximum') }}"
                            name="maximum_price" value="{{ request('maximum_price') }}">
                    </div>
                    <div class="row">
                        <input type="number" class="form-control search-slt" placeholder="{{ __('minimum') }}"
                            name="minimum_price" value="{{ request('minimum_price') }}">
                    </div>
                    <div class="row">
                        <select class="search-slt" id="filter_by_pricing" name="order_by">
                            <option value="">{{ __('Order By') }} </option>
                            <option value="LtoH" {{ request('order_by') == 'LtoH' ? 'selected' : '' }}>
                                {{ __('Lowest to Highest') }}</option>
                            <option value="HtoL" {{ request('order_by') == 'HtoL' ? 'selected' : '' }}>
                                {{ __('Highest To lowest') }}</option>
                        </select>
                    </div>
                    <div class="row">
                        <select class="search-slt" id="filter_by_category" name="category">
                            <option value="">{{ __('Select Category') }}</option>
                            @foreach ($all_categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <select class="search-slt" id="filter_by_merchant" name="merchant">
                            <option value="">{{ __('Select Merchant') }}</option>
                            @foreach ($all_merchants as $merchant)
                                <option value="{{ $merchant->id }}"
                                    {{ request('merchant') == $merchant->id ? 'selected' : '' }}>
                                    {{ $merchant->first_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <button type="submit" name="myButton" class="btn btn-warning wrn-btn">{{ __('Filter') }}</button>
                    </div>
                    <div class="row">
                        <button type="reset" class="btn btn-primary wrn-btn" id="btn-clear">{{ __('Reset') }}</button>
                    </div>
                    <br>
                </div>
                <div class="col-md-8">
                    @foreach ($allProducts as $product)
                        <div class="card mb-3 gy-5" style="">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="{{ $product->product_picture }}" class="card-img card-img-top"
                                        alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <a href="{{ route('product.details', $product->slug) }}">
                                            <h5 class="card-title">{{ $product->name }}</h5>
                                        </a>
                                        <p class="card-text">
                                            {{ Str::limit($product->description, $limit = 50, $end = '...') }}
                                        </p>
                                        <p class="card-text">
                                            <small class="text-muted">
                                                {{ __('Price') }} : {{ $product->selling_price }} {{ __('EGP') }}
                                            </small>
                                        </p>
                                        <p class="card-text">
                                            <small class="text-muted">
                                                {{ __('Buyer') }} : {{ $product->user->first_name }}
                                            </small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </form>
    <div class="container">
        <hr>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                {{ $allProducts->appends(request()->only(['maximum_price', 'minimum_price', 'order_by', 'category', 'merchant', 'search_word']))->links() }}
            </div>
            <div class="col-md-8"></div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Here we will Make it Refresh Once Search Criteria Changes  ;
    </script>
@endsection
