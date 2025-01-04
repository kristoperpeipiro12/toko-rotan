<?php


namespace App\Http\Controllers\Login;
use App\Http\Controllers\Controller;


use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(){
        return view("auth.login");
    }
    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        if (Auth::attempt($credentials)) {
            // Regenerate session untuk keamanan
            $request->session()->regenerate();
            return view('admin.dashboard.index');
        }

        // Jika gagal login
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }
    public function register(){
        return view("register");
    }
    public function registerproses (Request $request){
       $user = User::create([
        "name"=> $request->name,
        "email"=> $request->email,
        "password"=> Hash::make($request->password),

       ]);
       event(new Registered($user));

       Auth::login($user);
       return redirect('/email/verify');
    }

    public function dashboard(){
return view('dashboard');
}
}
