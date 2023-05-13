@extends('layouts.store.main_page')
@section('title', __('All Orders'))
@section('slider')
@endsection

@section('content')
    <div class="py-3 px-5 mb-2 shadow-sm  border-top" style="">
        <nav aria-label="breadcrumb">
            <h3>{{ __('All Orders') }} :</h3>
        </nav>
    </div>
    <br>
    <div class="container">
        <div class="card ">
            <div class="card-header">
                <h3 class="text-center">{{ __('Orders') }}</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-responsive">
                        <thead>
                            <th>{{ __('Order Date') }}</th>
                            <th>{{ __('Tracking Number') }}</th>
                            {{-- <th>{{ __('Total') }}</th> --}}
                            <th>{{ __('Status') }}</th>
                            <th>#</th>
                            <th>#</th>
                        </thead>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->updated_at }}</td>
                                <td>
                                    <a href="{{ route('order.details', $order->tracking_id) }}">
                                        {{ $order->tracking_id }}
                                    </a>
                                </td>
                                {{-- <td>{{ $order->total }}</td> --}}
                                @switch($order->status)
                                    @case(0)
                                        <td>{{ __('Not Checked/In Cart') }}</td>
                                    @break

                                    @case(1)
                                        <td>{{ __('Checked and Pending') }}</td>
                                        <td>
                                            <form action="{{ route('order.cancel') }}"
                                                onsubmit="myButton.disabled = true; return true;" method="post"
                                                class="form-inline " onsubmit="myButton.disabled = true; return true;">
                                                @csrf
                                                <input type="hidden" name="tracking_id" value="{{ $order->tracking_id }}">
                                                <button name="myButton" class="btn btn-danger">{{ __('Cancel Order') }}</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{ route('return.order.to.cart') }}"
                                                onsubmit="myButton.disabled = true; return true;" method="post" class="form-inline"
                                                onsubmit="myButton.disabled = true; return true;">
                                                @csrf
                                                <input type="hidden" name="tracking_id" value="{{ $order->tracking_id }}">
                                                <button name="myButton"
                                                    class="btn btn-light">{{ __('Return Order to Cart') }}</button>
                                            </form>
                                        </td>
                                    @break

                                    @case(2)
                                        <td>{{ __('In Preparation') }}</td>
                                    @break

                                    @case(3)
                                        <td>{{ __('Cancelled') }}</td>
                                    @break

                                    @case(4)
                                        <td>{{ __('Done') }}</td>
                                    @break

                                    @case(5)
                                        <td>{{ __('Refunded') }}</td>
                                    @break

                                    @default
                                        <td>""</td>
                                @endswitch

                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        @if ($msdg = session('status'))
            // swal('{{ $msdg }}')
            $.notify('{{ $msdg }}', "success");
        @endif
    </script>
@endsection
