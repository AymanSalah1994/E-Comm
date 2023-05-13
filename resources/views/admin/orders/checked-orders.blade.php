@extends('layouts.dashboard.main_panel')
@section('content')
    <div class="card">
        <div class="card-body">
            <h1> Orders </h1>
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
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }} </td>
                                <td><a href="{{ route('admin.order.view',$order->id)}}">
                                    {{ $order->tracking_id }}
                                </a> </td>
                                <td>{{ $order->total }}</td>
                                <td>Checked and Pending</td>
                                <td>
                                <form id="{{ $order->id }}" onsubmit="myButton.disabled = true; return true;" action="{{ route('admin.order.prepare', $order->id) }}"
                                    method="post" style="display: none">
                                    @csrf
                                    <button type="submit" name="myButton" class="btn btn-warning">Delete</button>
                                </form>
                                </td>
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
