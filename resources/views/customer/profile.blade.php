@extends('layouts.store.main_page')
@section('title', 'Profile')

@section('slider')
@endsection
@section('content')
    <div class="py-3 px-5 mb-2 shadow-sm border-top" style="">
        <nav aria-label="breadcrumb">
            <h4>{{__('Profile')}}</h4>
        </nav>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <form action="{{ route('profile.update') }}" onsubmit="myButton.disabled = true; return true;" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <h3>{{ __('User Details') }}</h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">{{ __('First Name') }}</label>
                                    <input class="form-control" type="text" name="first_name"
                                        value="{{ old('first_name', $user->first_name) }}">
                                    @error('first_name')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="">{{ __('Last Name') }}</label>
                                    <input class="form-control" type="text" name="last_name"
                                        value="{{ old('last_name', $user->last_name) }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">{{__('City')}}</label>
                                    <input class="form-control" type="text" name="city"
                                        value="{{ old('city', $user->city) }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="">{{ __('Phone') }}</label>
                                    <input class="form-control" type="text" name="phone"
                                        value="{{ old('phone', $user->phone) }}">
                                    @error('phone')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">{{ __('Address') }}</label>
                                    <textarea name="address" class="form-control" width="100%">{{ old('address', $user->address) }}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">{{ __('Email') }}</label>
                                    <input class="form-control" type="Email" name="email"
                                        value="{{ old('email', $user->email) }}">
                                    @error('email')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="submit" name="myButton" class="btn btn-primary">
                                        {{ __('Save Changes') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h3>{{__('Actions')}}</h3>
                    </div>
                    <div class="card-footer">
                        <br>
                        <div class="row">
                            <button class="btn btn-success rounded-pill float-end" disabled>{{__('Delete your Profile')}} </button>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection

@section('scripts')
    @if ($status = session('status'))
        <script>
            // swal('{{ $status }}');
            $.notify('{{ $status }}', "success");
        </script>
    @endif
@endsection
