@extends('layouts.store.main_page')
@section('title', 'Check Out')

@section('slider')
    @include('customer.store.toast')
@endsection
@section('content')
    @include('layouts.dividers.divider-small')
    @if ($cartItems->count() > 0)
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h3>{{ __('User Details') }}</h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">{{ __('First Name') }}</label>
                                    <input class="form-control" type="text"
                                        placeholder="{{ request()->user()->first_name }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="">{{ __('Last Name') }}</label>
                                    <input class="form-control" type="text"
                                        placeholder="{{ request()->user()->last_name }}" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">{{ __('City') }}</label>
                                    <input class="form-control" type="text" placeholder="{{ request()->user()->city }}"
                                        readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="">{{ __('Phone') }}</label>
                                    <input class="form-control" type="text" placeholder="{{ request()->user()->phone }}"
                                        readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">{{ __('Address') }}</label>
                                    <input class="form-control" type="text"
                                        placeholder="{{ request()->user()->address }}" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">{{ __('Email') }}</label>
                                    <input class="form-control" type="Email" placeholder="{{ request()->user()->email }}"
                                        readonly>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{ route('profile.view') }}"
                                        class="btn btn-primary">{{ __('Edit Your Profile') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header">
                            <h3>{{ __('Order Details') }}</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <th>{{ __('Product Name') }}</th>
                                    <th>{{ __('Quantity') }}</th>
                                    <th>{{ __('Price') }}</th>
                                </thead>
                                @php
                                    $total = 0;
                                    $checking_order = '';
                                @endphp
                                @foreach ($cartItems as $item)
                                    <tr>
                                        <td>{{ $item->product->name }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $item->product->selling_price }}</td>
                                        {{-- <td>{{ (int) $item->quantity * (int) $item->product->selling_price }}</td> --}}
                                    </tr>
                                    @php
                                        $total += $item->product->selling_price*$item->quantity;
                                        $checking_order = $item->order_id;
                                    @endphp
                                @endforeach
                            </table>
                        </div>
                        <div class="card-footer">
                            <span>{{ __('Total') }} : {{ $total }}</span>
                        </div>
                        <div class="card-footer">
                            <span>{{ __('Shipping') }} : {{__('You Will be informed By the Shipping Fees')}}</span>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                @if (request()->user()->phone)
                                    <form action="{{ route('order.confirm') }}" class="row"
                                        onsubmit="myButton.disabled = true; return true;" method="POST">
                                        @csrf
                                        <input type="hidden" name="checking_order" value="{{ $checking_order }}">
                                        <button type="submit" name="myButton"
                                            class="btn btn-success rounded-pill">{{ __('Confirm (Pay on Delivery)') }}</button>
                                    </form>
                                @else
                                    <div class="card bg-danger">
                                        <div class="card-header">
                                            {{ __('Note :') }}
                                        </div>
                                        <div class="card-body">
                                            {{ __('Please Add a Phone Number To Proceed') }}
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <br>
                            <div class="row">
                                <form action="" class="row">
                                    <button class="btn btn-success rounded-pill"
                                        disabled>{{ __('Online (Not Working Currently)') }}</button>
                                </form>
                            </div>
                            {{-- Make it a Button for Form , Form to change order status --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="container py-5">
            <div class="card shadow mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">
                            <h1>You Don't Have Running Orders!</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <br>
@endsection

@section('scripts')

@endsection
