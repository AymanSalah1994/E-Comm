@extends('layouts.store.main_page')
@section('title', __('All Products'))
@section('content')
    <div class="container">
        <br>
        <h2 class="text-center">{{ $merchant->first_name }}</h2>
        <hr>
        <div class="row">
            @foreach ($products as $product)
                @include('layouts.store.storeparts.product-card')
            @endforeach
        </div>
        <div class="row">
            <hr>
        </div>
        <div class="row">
            {{ $products->links() }}
            {{-- <div class="col-4"></div> --}}
            {{-- <div class="col-4">
            </div> --}}
            {{-- <div class="col-4"></div> --}}
        </div>
    </div>

@endsection
