<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        
    }
    // public function username()
    // {
    //     if(Auth::attempt(['phone' => request('phone'), 'password' => request('password')]) ||
    //         Auth::attempt(['email' => request('email'), 'password' => request('password')]) ||
    //         Auth::attempt(['name' => request('name'), 'password' => request('password')])){
    //             // do something ...
    //     }
    // }
    public function username()
    {
        return 'name';
    }
    public function userphone()
    {
        return 'phone';
    }
}
