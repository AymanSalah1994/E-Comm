@extends('layouts.store.main_page')
@section('title', __('All Products'))
@section('content')
    <div class="py-3 px-5 mb-2 shadow-sm border-top">
        <ol class="breadcrumb">
            <li><a href="{{ route('store.index') }}">{{ __('Home') }}</a></li>
            <li><a href="{{ route('store.categories') }}">{{ __('All Categories') }}</a></li>
            <li class="active">{{ $category->name }}</li>
        </ol>
    </div>
    <div class="py-5">
        <div class="container">
            <h2 class="text-center">{{ $category->name }}</h2>
            <hr>
            <div class="row">
                @foreach ($categoryProducts as $product)
                    @include('layouts.store.storeparts.product-card')
                @endforeach
            </div>
        </div>
    </div>
@endsection
