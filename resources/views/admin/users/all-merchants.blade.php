@extends('layouts.dashboard.main_panel')
@section('content')
    <div class="card">
        <div class="card-body">
            <h1>All Merchants</h1>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                        <th>ID</th>
                        <th>{{ __('Merchant Name') }}</th>
                        <th>{{ __('Phone') }}</th>
                        <th>{{ __('Role') }}</th>
                        <th>{{ __('Action') }}</th>
                    </thead>
                    <tbody>
                        @foreach ($merchants as $merchant)
                            <tr>
                                <td>{{ $merchant->id }} </td>
                                <td>{{ $merchant->first_name }} </td>
                                <td>{{ $merchant->phone }}</td>
                                <td>{{ $merchant->role_as }}</td>
                                <td>
                                    <form action="{{ route('admin.user.revoke') }}" class="form form-inline" onsubmit="myButton.disabled = true; return true;" method="post">
                                        @csrf
                                        <input type="hidden" name="identifier" value="{{ $merchant->id }}">
                                        <button type="submit" name="myButton" class="btn btn-warning">Revoke</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('admin.user.delete') }}" class="form form-inline"
                                        method="post" onsubmit="myButton.disabled = true; return true;">
                                        @csrf
                                        <input type="hidden" name="identifier" value="{{ $merchant->id }}">
                                        <button type="submit" name="myButton" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
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
