<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
        // $this->middleware('guest')->except('logout');
        // $this->middleware('auth')->only('logout');
    }
}

// namespace App\Http\Controllers\Auth;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

// class LoginController extends Controller
// {
//     /**
//      * Redirect setelah login berhasil.
//      */
//     protected $redirectTo = '/home';

//     /**
//      * Constructor.
//      */
//     public function __construct()
//     {
//         // $this->middleware('guest')->except('logout');
//     }

//     /**
//      * Menampilkan halaman login.
//      */
//     public function showLoginForm()
//     {
//         return view('auth.login');
//     }

//     /**
//      * Proses login.
//      */
//     public function login(Request $request)
// {
//     $request->validate([
//         'username' => 'required|string', 
//         'password' => 'required|string|min:6',
//     ]);

//     $loginType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

//     $login = [
//         $loginType => $request->username,
//         'password' => $request->password
//     ];

//     if (Auth::attempt($login)) {
//         return redirect()->intended('/');
//     }

//     return back()->withErrors(['username' => 'Email atau username dan password tidak sesuai.']);
// }

//     /**
//      * Logout user.
//      */
//     public function logout(Request $request)
//     {
//         Auth::logout();
//         $request->session()->invalidate();
//         return redirect('/');
//     }
// }