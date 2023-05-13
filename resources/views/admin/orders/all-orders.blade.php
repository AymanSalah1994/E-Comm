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
            <h1> Orders :{{ $orders->count() }} </h1>
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
                                <td>
                                    <a href="{{route('admin.order.view',$order->id)}}" class="">
                                        {{ $order->tracking_id }}
                                    </a>
                                </td>
                                <td>{{ $order->total }}</td>
                                @switch($order->status)
                                    @case(0)
                                        <td>Not Checked/In Cart</td>
                                    @break

                                    @case(1)
                                        <td>Checked and Pending</td>
                                    @break

                                    @case(2)
                                        <td> In Preparation</td>
                                    @break

                                    @case(3)
                                        <td>Cancelld</td>
                                    @break

                                    @case(4)
                                        <td>Done</td>
                                    @break

                                    @case(5)
                                        <td>Refunded</td>
                                    @break

                                    @default
                                        <td>""</td>
                                @endswitch
                                <td>
                                    <form id="{{ $order->id }}" onsubmit="myButton.disabled = true; return true;"
                                        action="{{ route('admin.order.delete', $order->id) }}" method="post">
                                        @csrf
                                        <button type="submit" name="myButton" class="btn btn-danger">Delete</button>
                                    </form>


                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{ $orders->appends(request()->only(['search_word']))->links() }}
@endsection

@section('scripts')
    @if ($status = session('status'))
        <script>
            swal("Done !", "{{ $status }}", "success");
        </script>
    @endif
@endsection
