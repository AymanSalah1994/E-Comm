@extends('layouts.dashboard.main_panel')
@section('content')
    <div class="card">
        <div class="card-body">
            <h1>Dealers</h1>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                        <th>ID</th>
                        <th>Dealer Name</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($dealers as $dealer)
                            <tr>
                                <td>{{ $dealer->id }} </td>
                                <td>{{ $dealer->first_name }} </td>
                                <td>{{ $dealer->phone }}</td>
                                <td>{{ $dealer->role_as }}</td>
                                <td>
                                <td>
                                    <form action="{{ route('admin.user.revoke') }}" class="form form-inline"
                                        onsubmit="myButton.disabled = true; return true;" method="post">
                                        @csrf
                                        <input type="hidden" name="identifier" value="{{ $dealer->id }}">
                                        <button type="submit" name="myButton" class="btn btn-warning">Revoke</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('admin.user.delete') }}" class="form form-inline"
                                        onsubmit="myButton.disabled = true; return true;" method="post">
                                        @csrf
                                        <input type="hidden" name="identifier" value="{{ $dealer->id }}">
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
