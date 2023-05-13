@extends('layouts.dashboard.main_panel')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card card-chart">
                <div class="card-body">
                    <h4 class="card-title">Create</h4>
                    <a href="{{ route('admin.categories.create') }}">
                        <i class="material-icons">add_circle</i>
                        <span>Create new Category</span>
                    </a>
                </div>
            </div>
        </div>
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
            <h1> Categories : {{ $categories->count() }}</h1>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Action</th>
                        <th>Action</th>
                        <th>Image</th>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }} </td>
                                <td>{{ $category->name }} </td>
                                <td>{{ Str::limit($category->description, 25) }}</td>
                                <td><a href="{{ route('admin.categories.edit', [$category->id, $category->slug]) }}"
                                        class="btn btn-primary">View & Edit</a></td>
                                <td>
                                    <form id="{{ $category->id }}"
                                        action="{{ route('admin.categories.delete', $category->id) }}" method="POST"
                                        style="display: hidden" onsubmit="myButton.disabled = true; return true;"
                                        class="form-inline">
                                        @csrf
                                        <button type="submit" name="myButton" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                                <td><img src="{{ $category->category_picture }}"
                                        style="width: 100%;
                                    height: 15vw;
                                    object-fit: cover;">
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{ $categories->appends(request()->only(['search_word']))->links() }}
@endsection

@section('scripts')
    @if ($status = session('status'))
        <script>
            swal("Done !", '{{ $status }}', "success");
        </script>
    @endif
@endsection
