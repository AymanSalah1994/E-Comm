@extends('layouts.store.main_page')
@section('title', 'FAQs')
@section('specifyStyle')
    <link rel="stylesheet" href="{{ asset('store_assets/css/faqs.css') }}">
@endsection
@section('slider')
@endsection

@section('content')
    @include('layouts.dividers.divider-small')
    <div class="main-container">
        <div class="heading">
            <h1 class="heading__title">{{__('Thanks For Visiting this Page')}}</h1>
            <p class="heading__credits">{{__('Just Few Things Needed')}}</p>
        </div>
        <div class="cards">
            <div class="card card-4">
                <div class="card__icon"><i class="fas fa-lightbulb-o"></i></div>
                <p class="card__exit"><i class="fas fa-check"></i></p>
                <p class="card__title">{{__('You Own products , No affiliates')}}</p>
                <p class="card__title">{{__('Reasonable Prices , and Quality!')}}</p>
                <p class="card__title">{{__('Provide Real Pictures')}}</p>
            </div>

            <div class="card card-5">
                <div class="card__icon"><i class="fas fa-lightbulb-o"></i></div>
                <p class="card__exit"><i class="fas fa-times"></i></p>
                <h2 class="card__title">{{__('Anything opposite is Disallowed')}}</h2>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
