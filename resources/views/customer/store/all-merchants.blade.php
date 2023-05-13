@extends('layouts.store.main_page')
@section('title', __('All Merchants'))
@section('content')

    <div class="py-5">
        <div class="container">
            <br>
            <h2 class="text-center">{{ __('All Merchants') }}</h2>
            <hr>
            <div class="row">
                @foreach ($all_merchants as $merchant)
                    @include('layouts.store.storeparts.merchant-card')
                @endforeach
            </div>
        </div>
        <div class="py-5">
            <div class="container">
                <div class="">
                    {{ $all_merchants->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
