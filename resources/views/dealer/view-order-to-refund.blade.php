@if ($order->status == '4')
    @extends('layouts.dealer.dealer_panel')
    @section('content')
        <div class="card">
            <div class="card-body">
                <h1> Order : {{ $order->tracking_id }} </h1>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3>Order Details</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-responsive">
                                <thead>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </thead>
                                @foreach ($orderItems as $item)
                                    <tr>
                                        <td>{{ $item->product->name }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ (int) $item->quantity * (int) $item->product->selling_price }}</td>
                                        <td>
                                            @if ($item->status != '5')
                                                <form action="{{ route('dealer.panel.mark.item.refunded') }}"  method="POST"
                                                    onsubmit="myButton.disabled = true; return true;">
                                                    @csrf
                                                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                                                    <input type="hidden" name="item_id" value="{{ $item->id }}">
                                                    <button type="submit" name="myButton" class="btn btn-warning">Refund
                                                        this Only</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="card-footer">
                            <span>Total : {{ $order->total }}</span>
                        </div>
                        <div class="card-footer">
                            @switch($order->status)
                                @case(0)
                                    Not Checked/In Cart
                                @break

                                @case(1)
                                    Checked and Pending
                                @break

                                @case(2)
                                    In Preparation
                                @break

                                @case(3)
                                    Cancelled
                                @break

                                @case(4)
                                    Done
                                @break

                                @case(4)
                                    Refunded
                                @break

                                @default
                                    <td>""</td>
                            @endswitch
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('dealer.panel.mark.order.refunded', $order->id) }}" onsubmit="myButton.disabled = true; return true;" method="post"
                                    style="">
                                    @csrf
                                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                                    <button type="submit" name="myButton" class="btn btn-danger">Return the Whole Order</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>{{ __('Customer Name') }}:</h3>
                            <p> {{ $order->user->first_name }} {{ $order->user->last_name }}</p>
                        </div>
                        <div class="col-md-6">
                            <h3> {{ __('phone') }}: </h3>
                            <p>{{ $order->user->phone }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
    @endsection
    @section('scripts')
        @if ($status = session('status'))
            <script>
                swal("Done !", "{{ $status }}", "success");
            </script>
        @endif
    @endsection
@else
    @include('errors.404')
@endif
