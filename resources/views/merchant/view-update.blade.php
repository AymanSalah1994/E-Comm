@extends('layouts.merchant.merchant_panel')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Product</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('merchant.panel.update.product') }}" onsubmit="myButton.disabled = true; return true;"
                method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->slug }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">{{ __('Name') }}</label>
                            <input type="text" class="form-control" name="name"
                                value="{{ old('name', $product->name) }}">
                            @error('name')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">{{ __('small description') }}</label>
                            <input type="text" class="form-control" name="small_description"
                                value="{{ old('small_description', $product->small_description) }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>{{ __('Description') }}</label>
                            <div class="form-group">
                                <textarea class="form-control" rows="5" name="description">{{ old('description', $product->description) }}</textarea>
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
                            <label class="bmd-label-floating">{{ __('Original Price') }}</label>
                            <input type="number" class="form-control" name="original_price"
                                value="{{ old('original_price', $product->original_price) }}">
                            @error('original_price')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="bmd-label-floating">{{ __('Selling Price') }}</label>
                            <input type="number" class="form-control" name="selling_price"
                                value="{{ old('selling_price', $product->selling_price) }}">
                            @error('selling_price')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="bmd-label-floating">{{ __('quantity') }}</label>
                            <input type="number" class="form-control" name="quantity"
                                value="{{ old('quantity', $product->quantity) }}">
                            @error('quantity')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>{{ __('keywords,Tags') }}</label>
                            <div class="form-group">
                                <textarea class="form-control" rows="5" name="keywords">{{ old('keywords', $product->keywords) }}</textarea>
                                @error('keywords')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="bmd-label-floating">{{ __('Status') }}</label>
                            <input type="checkbox" class="form-control" name="status"
                                {{ $product->status == '1' ? 'checked' : '' }}>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="bmd-label-floating">{{ __('Refundable') }}</label>
                            <input type="checkbox" class="form-control" name="refundable"
                                {{ $product->refundable == '1' ? 'checked' : '' }}>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <select name="category_id" class="form-select form-control">
                                <option value="">{{ __('Select Category') }}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $product->category_id == $category->id ? 'selected' : '' }}>
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
                            <img src="{{ $product->product_picture }}" alt="" width="100">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <img src="{{ $product->secondary_picture }}" alt="" width="100">
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
@endsection
