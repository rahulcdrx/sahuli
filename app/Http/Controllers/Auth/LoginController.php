<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */

    public function redirectPath()
    {
        if (auth()->user()->is_admin) {
            return route('admin.home');
        }
        return route('user.home');
    }

/*
    protected function authenticated(Request $request)
    {
        Auth::logoutOtherDevices($request->password);
    }*/

/*
    public function postLogin()
    {
   // if authenticated, update the is_logged_in attribute to true in users table
         auth()->user()->update(['is_logged_in' => true]);
    }


    public function index()
    {
        if (auth()->check() && auth()->user()->is_logged_in == true) {
            // your error logic or redirect
        }
        return view('path.to.login');
    }

    public function logout()
    {
        Auth::user()->update(['is_logged_in' => false]);
        Auth::logout();
    }*/

   /* protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }
        auth()->logoutOtherDevices($request->password);
        return $request->wantsJson()
                    ? new Response('', 204)
                    : redirect()->intended($this->redirectPath());
    }*/


    protected function authenticated(Request $request, $user)
    {
        Auth::logoutOtherDevices($request->password);
    }
}
