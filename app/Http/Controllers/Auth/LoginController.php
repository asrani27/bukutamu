<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Alert;
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

    public function login()
    {
        $login = request()->input('email');
        
        //$field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        
        if(Auth::attempt(['email' => $login, 'password' => request()->password])) 
        {
            Alert::success('Senna','Berhasil Login');
            return redirect('/home');
        } 
        else 
        {
            Alert::error('Senna','Username / Password Salah');
            return back();
        }
    }
}
