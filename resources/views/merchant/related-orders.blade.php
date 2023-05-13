@extends('layouts.merchant.merchant_panel')
@section('content')
    <div class="container">
        <div class="row">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <h3>{{__("Name")}}</h3>
                        </div>
                        <div class="col-md-4">
                            <h3>{{__("Quantity")}}</h3>
                        </div>
                        <div class="col-md-4">
                            <h3>{{__("Date")}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @foreach ($relatedCartItems as $item)
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="{{ route('merchant.panel.product.view', $item->product->slug) }}">
                                {{ $item->product->name }}
                            </a>
                        </div>
                        <div class="col-md-4">{{ $item->quantity }}</div>
                        <div class="col-md-4">{{ $item->updated_at }}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@section('scripts')
@endsection
