<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function viewProfile()
    {
        $user = Auth::user();
        return view('customer.profile', compact('user'));
    }

    public function updateProfile(ProfileUpdateRequest $request)
    {
        $request_data = $request->handleRequest();
        $user_id = $request->user()->id;
        $user = User::find($user_id);
        $user->update($request_data);
        return redirect()->route('profile.view')->with('status', trans('Profile Updated Successfully'));
    }
    public function deleteProfile()
    {
    }
}
