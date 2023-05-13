@extends('layouts.store.main_page')
@section('title', __('Merchant Details'))

@section('content')
    <div class="container">
        <h1 class="text-center">{{ $merchant->first_name }}</h1>
    </div>
    <hr>
    <div class="container">
        <div class="card shadow merchant_data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ $merchant->profile_picture }}" alt=""
                            style="width: 100%;height: 35vw;object-fit: cover;">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">{{ $merchant->first_name }}</h2>
                        <br>
                        <hr>
                        <p class="text-bg-light">{{ __('Bio') }} :
                        <div>
                            {{ $merchant->bio }}
                        </div>
                        </p>
                        <p class="text-bg-light">{{ __('Address') }} :
                        <div>
                            {{ $merchant->address }}</div>
                        </p>
                        <p class="text-bg-light">{{ __('Phone') }} :
                        <div>
                            {{ $merchant->phone }}</div>
                        </p>
                        <p class="text-bg-light">{{ __('Number Of Products') }} :
                        <div>
                            {{ $merchant->products->count() }}</div>
                        </p>
                        <p class="float-end">
                            <a href="{{ route('merchant.store.products', $merchant->slug) }}"
                                class="btn btn-primary rounded-pill">
                                {{ __('All Products') }}
                            </a>
                        </p>
                        <br>
                        @if ($merchant->fb_link)
                            <span>
                                <ul>
                                    <li style=""><a href="{{ $merchant->fb_link }}"><i class="fa fa-facebook"
                                                aria-hidden="true"></i></a>
                                    </li>
                                </ul>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection
