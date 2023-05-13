@extends('layouts.dashboard.main_panel')
@section('content')
    <div class="card">
        <div class="card-body">
            <h1> Refunded Orders </h1>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                        <th>ID</th>
                        <th>tracking number</th>
                        <th>total</th>
                        <th>status</th>
                    </thead>
                    <tbody>
                        @foreach ($allRefundedOrders as $order)
                            <tr>
                                <td>{{ $order->id }} </td>
                                <td>{{ $order->tracking_id }} </td>
                                <td>{{ $order->total }}</td>
                                <td>REfunded</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @if ($status = session('status'))
        <script>
            swal("Done !", "{{ $status }}", "success");
        </script>
    @endif
@endsection
