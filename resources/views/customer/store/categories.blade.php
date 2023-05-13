@extends('layouts.store.main_page')

@section('slider')
@endsection

@section('content')
    <div class="py-5">
        <div class="container">
            <br>
            <h2 class="text-center">{{ __('All Categories') }}</h2>
            <hr>
            <div class="row">
                @foreach ($allCategories as $category)
                    @include('layouts.store.storeparts.category-card')
                @endforeach
            </div>
        </div>
    </div>
    <br>
    <div class="py-5">
        <div class="container">
            <div class="">
                {{ $allCategories->links() }}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
