@extends('layouts.merchant.merchant_panel')
@section('content')
    <div class="card">
        <div class="card-body">
            <h3> {{ __('User') }} : {{ request()->user()->first_name }} </h3>
        </div>
    </div>
    <form action="{{ route('merchant.panel.profile.update') }}" onsubmit="myButton.disabled = true; return true;"
        method="post" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <h3 class="text-center">{{ __('User Details') }}</h3>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <span class="text h4">{{ __('First Name') }}</span>
                        <input class="form-control" type="text" name="first_name"
                            value="{{ old('first_name', request()->user()->first_name) }}">
                        @error('first_name')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <span class="text h4">{{ __('Last Name') }}</span>
                        <input class="form-control" type="text" name="last_name"
                            value="{{ old('last_name', request()->user()->last_name) }}">
                        @error('last_name')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <span class="text h4">{{ __('City') }}</span>
                        <input class="form-control" type="text" name="city"
                            value="{{ old('city', request()->user()->city) }}">
                    </div>
                    <div class="col-md-6">
                        <span class="text h4">{{ __('Phone') }}</span>
                        <input class="form-control" type="text" name="phone"
                            value="{{ old('phone', request()->user()->phone) }}">
                        @error('phone')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <span class="text h4">{{ __('Address') }}</span>
                        <input class="form-control" type="text" name="address"
                            value="{{ old('address', request()->user()->address) }}">
                        @error('address')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <span class="text h4">{{ __('Email') }}</span>
                        <input class="form-control" type="Email" name="email"
                            value="{{ old('email', request()->user()->email) }}">
                        @error('email')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <span class="text h4">{{ __('Bio') }}</span>
                        <input class="form-control" type="" name="bio"
                            value="{{ old('bio', request()->user()->bio) }}">
                        @error('bio')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <span class="text h4">Facebook Link</span>
                        <input class="form-control" name="fb_link"
                            value="{{ old('fb_link', request()->user()->fb_link) }}">
                        @error('fb_link')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <span class="text h4">YouTube Video</span>
                        <input class="form-control" name="youtube_vid"
                            value="{{ old('youtube_vid', request()->user()->youtube_vid) }}">
                        @error('youtube_vid')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row ">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new img-thumbnail" style="width: 150px; height: 150px;">
                            <img src="{{ request()->user()->profile_picture }}"
                                alt="...">
                        </div>
                        <div class="fileinput-preview fileinput-exists img-thumbnail "
                            style="max-width: 150px; max-height: 150px;"></div>
                        <div class="">
                            <span class="btn btn-outline-secondary btn-file">
                                <span class="fileinput-new">Select image</span>
                                <span class="fileinput-exists">Change</span>
                                <input type="file" name="profile_picture" accept="image/*">
                            </span>
                            <a href="#" class="btn btn-outline-secondary fileinput-exists"
                                data-dismiss="fileinput">Remove</a>
                        </div>
                    </div>
                </div>
                @error('profile_picture')
                    <span style="color: red">{{ $message }}</span>
                @enderror

                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" name="myButton"
                            class="btn btn-warning float-right">{{ __('Update') }}</button>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    @if ($status = session('status'))
        <script>
            swal("Done !", "{{ $status }}", "success");
        </script>
    @endif
@endsection
