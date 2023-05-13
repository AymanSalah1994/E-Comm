<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException as ValidationValidationException;
use Laravel\Socialite\Facades\Socialite ;
// use Socialite as Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    public function __construct()
    {

        $this->middleware('guest')->except('logout');
    }

    protected function authenticated()
    {
        if (Auth::user()->role_as == '1') {
            return redirect()->route('admin.dashboard');
        } elseif (Auth::user()->role_as == '2') {
            return redirect()->route('merchant.panel.index');
        } elseif (Auth::user()->role_as == '3') {
            return redirect()->route('dealer.panel.home');
        } elseif (Auth::user()->role_as == '0') {
            return redirect()->route('store.index');
        }
    }
    // THis is for Overring Bwlow Bleow

    public function username()
    {
        $login = request()->input('username');

        if (is_numeric($login)) {
            $field = 'phone';
        } else {
            $field = 'email';
        }

        request()->merge([$field => $login]);

        return $field;
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationValidationException::withMessages([
            'username' => [trans('auth.failed')],
        ]);
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/login');
        }

        // check if they're an existing user
        $existingUser = User::where('email', $user->email)->first();
        if ($existingUser) {
            auth()->login($existingUser, true);
        } else {
            $newUser = new User;
            $newUser->first_name = $user->name;
            $newUser->email = $user->email;
            // $newUser->phone = $user->phone ;
            $newUser->password = $user->id;
            $newUser->google_id = $user->id;
            $newUser->save();
            auth()->login($newUser, true);
        }
        return redirect()->to('/');
    }
}
