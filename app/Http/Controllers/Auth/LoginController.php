<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
    
    protected $loginPath = 'pages.news'; 

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    
    public function __construct()
    {
         $this->middleware('guest', ['except' => ['logout', 'userLogout']]);
    }
    
    // Change login by using student number instead  of  email 
    protected function credentials(Request $request)
    {
        $field = filter_var($request->input($this->username()), FILTER_VALIDATE_EMAIL) ?  : 'student_number';
        $request->merge([$field => $request->input($this->username())]);
        return $request->only($field, 'password');
    }

     public function username()
    {
        return 'student_number';
    }
    
    public function userLogout()
    {
        Auth::guard('web')->logout();
        return redirect('/home');
    }
    
}
