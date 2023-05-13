@extends('layouts.dashboard.main_panel')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card card-chart">
                <div class="card-body">
                    <h4 class="card-title">Create</h4>
                    <a href="{{ route('products.create') }}">
                        <i class="material-icons">add_circle</i>
                        <span>Create new product</span>
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
            <h1> Products : {{ $products->count() }} </h1>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                        <th>ID</th>
                        <th>Category</th>
                        <th>Name</th>
                        <th>Seller</th>
                        <th>Selling Price</th>
                        <th>Action</th>
                        <th>Action</th>
                        <th>Image</th>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->user->first_name }}</td>
                                <td>{{ $product->selling_price }}</td>
                                <td><a href="{{ route('products.edit', $product) }}" class="btn btn-primary">View & Edit</a>
                                </td>
                                <td>
                                    <form id="{{ $product->id }}" action="{{ route('products.destroy', $product->slug) }}"
                                        method="post" onsubmit="myButton.disabled = true; return true;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" name="myButton" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                                <td>
                                    <img src="{{ $product->product_picture }}"
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
    {{ $products->appends(request()->only(['search_word']))->links() }}
@endsection

@section('scripts')
    @if ($status = session('status'))
        <script>
            swal("Done !", "{{ $status }}", "success");
        </script>
    @endif
@endsection
