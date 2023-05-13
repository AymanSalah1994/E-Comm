<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function allUsers()
    {
        $users = User::SearchWord()->paginate(7);
        return view('admin.users.all-users', compact('users'));
    }
    public function allCustomers()
    {
        $customers = User::where('role_as', '0')->get();
        return view('admin.users.all-customers', compact('customers'));
    }
    public function allMerchants()
    {
        $merchants = User::where('role_as', '2')->get();
        return view('admin.users.all-merchants', compact('merchants'));
    }
    public function allDealers()
    {
        $dealers = User::where('role_as', '3')->get();
        return view('admin.users.all-dealers', compact('dealers'));
    }

    public function toMerchant(Request $request)
    {
        $user = User::find($request->identifier);
        $user->role_as  = '2';
        $user->save();
        return redirect()->route('admin.users.merchants')->with('status', 'Done');
    }
    public function toDealer(Request $request)
    {
        $user = User::find($request->identifier);
        $user->role_as  = '3';
        $user->save();
        return redirect()->route('admin.users.dealers')->with('status', 'Done');
    }
    public function revoke(Request $request)
    {
        $user = User::find($request->identifier);
        $user->role_as  = '0';
        $user->save();
        return redirect()->route('admin.users.all')->with('status', 'Done');
    }
    public function userDelete(Request $request)
    {
        $user = User::find($request->identifier);
        $user->delete();
        return redirect()->route('admin.users.all')->with('status', 'Done');
    }
    public function userView($id)
    {
        $user = User::find($id);
        return view('admin.users.view-user', compact('user'));
    }
}
