@extends('layouts.dashboard.main_panel')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Edit new Product</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('products.update',$theProduct->slug) }}" onsubmit="myButton.disabled = true; return true;" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Name</label>
                            <input type="text" class="form-control" name="name"
                                value="{{ old('name', $theProduct->name) }}">
                            @error('name')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">small description</label>
                            <input type="text" class="form-control" name="small_description"
                                value="{{ old('small_description', $theProduct->small_description) }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Description</label>
                            <div class="form-group">
                                <textarea class="form-control" rows="5" name="description">{{ old('description', $theProduct->description) }}</textarea>
                                @error('description')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="bmd-label-floating">original price</label>
                            <input type="number" class="form-control" name="original_price"
                                value="{{ old('original_price', $theProduct->original_price) }}">
                            @error('original_price')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="bmd-label-floating">selling price</label>
                            <input type="number" class="form-control" name="selling_price"
                                value="{{ old('selling_price', $theProduct->selling_price) }}">
                            @error('selling_price')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="bmd-label-floating">quantity</label>
                            <input type="number" class="form-control" name="quantity"
                                value="{{ old('quantity', $theProduct->quantity) }}">
                            @error('quantity')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">YouTube URL :</label>
                            <input type="text" class="form-control" name="youtube_vid" value="{{ old('youtube_vid', $theProduct->youtube_vid) }}">
                            @error('name')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>keywords,Tags</label>
                            <div class="form-group">
                                <textarea class="form-control" rows="5" name="keywords">{{ old('keywords', $theProduct->keywords) }}</textarea>
                                @error('keywords')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="bmd-label-floating">Status</label>
                            <input type="checkbox" class="form-control" name="status"
                                {{ $theProduct->status == '1' ? 'checked' : '' }}>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="bmd-label-floating">trending</label>
                            <input type="checkbox" class="form-control" name="trending"
                                {{ $theProduct->trending == '1' ? 'checked' : '' }}>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="bmd-label-floating">Refundable</label>
                            <input type="checkbox" class="form-control" name="refundable"
                            {{ $theProduct->refundable == '1' ? 'checked' : '' }}>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select name="category_id" class="form-select form-control">
                                <option value="">Select Category</option>
                                @foreach ($allCategories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $theProduct->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <img src="{{ $theProduct->product_picture }}" alt="" width="100">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <img src="{{ $theProduct->secondary_picture }}" alt="" width="100">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="col-md-12">
                    <input type="file" class="form-group" name="product_picture">
                    <input type="file" class="form-group" name="secondary_picture">
                </div>
                <button type="submit" name="myButton" class="btn btn-primary pull-right">Edit Product</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    @error('name')
        <script>
            swal("!", "{{ $message }}", "warning");
        </script>
    @enderror
@endsection
