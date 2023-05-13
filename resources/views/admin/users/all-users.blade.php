@extends('layouts.dashboard.main_panel')
@section('content')
    <div class="row">
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
            <h1> Users </h1>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                        <th>ID</th>
                        <th>User Name</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }} </td>
                                <td>{{ $user->first_name }} </td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->role_as }}</td>
                                <td>
                                <td>
                                    <a href="{{ route('admin.user.view', $user->id) }}" class="btn btn-primary">View</a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.user.to.merchant') }}" class="form form-inline"
                                        method="post" onsubmit="myButton.disabled = true; return true;">
                                        @csrf
                                        <input type="hidden" name="identifier" value="{{ $user->id }}">
                                        <button type="submit" name="myButton" class="btn btn-warning">TO Merchant</button>
                                    </form>
                                </td>

                                <td>
                                    <form action="{{ route('admin.user.to.dealer') }}" class="form form-inline"
                                        method="post" onsubmit="myButton.disabled = true; return true;">
                                        @csrf
                                        <input type="hidden" name="identifier" value="{{ $user->id }}">
                                        <button type="submit" name="myButton" class="btn btn-info">TO Dealer</button>
                                    </form>
                                </td>

                                <td>
                                    <form action="{{ route('admin.user.delete') }}" class="form form-inline" onsubmit="myButton.disabled = true; return true;" method="post">
                                        @csrf
                                        <input type="hidden" name="identifier" value="{{ $user->id }}">
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
    {{ $users->appends(request()->only(['search_word']))->links() }}
@endsection

@section('scripts')
    @if ($status = session('status'))
        <script>
            swal("Done !", "{{ $status }}", "success");
        </script>
    @endif
@endsection
