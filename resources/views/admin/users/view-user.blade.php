@extends('layouts.dashboard.main_panel')
@section('content')
    <div class="card">
        <div class="card-body">
            <h1> User : {{ $user->first_name }} </h1>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h3>User Details</h3>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <label for="">First Name</label>
                    <input class="form-control" type="text" placeholder="{{ $user->first_name }}" readonly>
                </div>
                <div class="col-md-6">
                    <label for="">Last Name</label>
                    <input class="form-control" type="text" placeholder="{{ $user->last_name }}" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="">City</label>
                    <input class="form-control" type="text" placeholder="{{ $user->city }}" readonly>
                </div>
                <div class="col-md-6">
                    <label for="">Phone</label>
                    <input class="form-control" type="text" placeholder="{{ $user->phone }}" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="">Address</label>
                    <input class="form-control" type="text" placeholder="{{ $user->address }}" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="">Email</label>
                    <input class="form-control" type="Email" placeholder="{{ $user->email }}" readonly>
                </div>
            </div>
            <br>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
