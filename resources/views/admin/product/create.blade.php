@extends('layouts.dashboard.main_panel')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Create new Product</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('products.store') }}" onsubmit="myButton.disabled = true; return true;" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <i class="bi bi-asterisk" style="color: red"></i>
                            <label class="bmd-label-floating">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            @error('name')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">small description</label>
                            <input type="text" class="form-control" name="small_description"
                                value="{{ old('small_description') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <i class="bi bi-asterisk" style="color: red"></i>
                            <label>Description</label>
                            <div class="form-group">
                                <textarea class="form-control" rows="5" name="description">{{ old('description') }}</textarea>
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
                            <i class="bi bi-asterisk" style="color: red"></i>
                            <label class="bmd-label-floating">original price</label>
                            <input type="number" class="form-control" name="original_price"
                                value="{{ old('original_price') }}" min="0">
                            @error('original_price')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <i class="bi bi-asterisk" style="color: red"></i>
                            <label class="bmd-label-floating">selling price</label>
                            <input type="number" class="form-control" name="selling_price"
                                value="{{ old('selling_price') }}" min="0">
                            @error('selling_price')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="bmd-label-floating">quantity</label>
                            <input type="number" class="form-control" name="quantity" value="{{ old('quantity') }}"
                                min="0">
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
                            <input type="text" class="form-control" name="youtube_vid" value="{{ old('youtube_vid') }}">
                            @error('youtube_vid')
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
                                <textarea class="form-control" rows="5" name="keywords">{{ old('keywords') }}</textarea>
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
                            <span>(Uncheck if Not exist)</span>
                            <input type="checkbox" class="form-control" name="status"
                                {{ old('status') == 'on' ? 'checked' : '' }}>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="bmd-label-floating">Trending</label>
                            <input type="checkbox" class="form-control" name="trending"
                                {{ old('trending') == 'on' ? 'checked' : '' }}>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="bmd-label-floating">Refundable</label>
                            <input type="checkbox" class="form-control" name="refundable"
                                {{ old('refundable') == 'on' ? 'checked' : '' }}>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <i class="bi bi-asterisk" style="color: red"></i>
                            <select name="category_id" class="form-select form-control">
                                <option value="">Select Category</option>
                                @foreach ($allCategories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
                <hr>
                <div class="col-md-12">
                    <input type="file" class="form-group" name="product_picture">
                    @error('product_picture')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                    <input type="file" class="form-group" name="secondary_picture">
                    @error('secondary_picture')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <span>png,jpeg,bmp Images Only</span>
                <button type="submit" name="myButton" class="btn btn-primary pull-right">Create Product</button>
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
