@extends('layouts.dashboard.main_panel')
@section('content')
    <div class="card">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Search :</h4>
                    <form action="" class="form-inline" style="width:100%">
                        <input type="search" name="search_word" class="input-group-text" style="width:100%">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h1> Orders {{ $alldoneOrders->count() }} </h1>
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
                        @foreach ($alldoneOrders as $order)
                            <tr>
                                <td>{{ $order->id }} </td>
                                <td>{{ $order->tracking_id }} </td>
                                <td>{{ $order->total }}</td>
                                <td>Done</td>
                                <td>
                                    <a href="{{ route('admin.refund.order.details', $order->id) }}"
                                        class="btn btn-danger">Refund</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{ $alldoneOrders->appends(request()->only(['search_word']))->links() }}
@endsection

@section('scripts')
    @if ($status = session('status'))
        <script>
            swal("Done !", "{{ $status }}", "success");
        </script>
    @endif
@endsection
