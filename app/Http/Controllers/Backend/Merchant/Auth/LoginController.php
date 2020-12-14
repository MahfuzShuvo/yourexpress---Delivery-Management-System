<?php

namespace App\Http\Controllers\Backend\Merchant\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use Auth;

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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::MERCHANT_HOME;

    public function username()
    {
        return 'phone';
    }

    public function showLoginForm()
    {
        return view('backend.merchant.auth.login');
    }

    public function login(Request $request)
    {
        // dd($request->all());
        // Validate login data
        $this->validateLogin($request);

        // Attempt to login
        if (Auth::guard('merchant')->attempt(['phone' => $request->phone, 'password' => $request->password], $request->remember)) {
            session()->flash('success', 'Successfully logged in');
            return redirect()->intended(route('merchant.dashboard'));
        } else {
            session()->flash('error', 'Invalid user');
            return redirect()->back();
        }
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'password' => 'required|string',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('merchant')->logout();
        return redirect()->route('merchant.login');
    }
}
