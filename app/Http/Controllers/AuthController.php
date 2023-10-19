<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (session('success')) {
                Alert::success(session('success'));
            }

            if (session('error')) {
                Alert::error(session('error'));
            }

            return $next($request);
        });
    }
    public function login()
    {
        return view('login');
    }

    public function check(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $user = User::where(['username' => $username, 'aktif' => 'y'])->first();
        if (!$user) {
            return back()->withInput()->with('error', 'Silahkan cek username/password anda!');
        }
        if (!Hash::check($password, $user->password)) {
            return back()->withInput()->with('error', 'Password kurang tepat!');
        }
        session(['userdata' => $user, 'logged_in' => true]);
        return redirect('/');
    }

    public function logout(Request $request)
    {
        session()->flush();
        return redirect('/login');
    }
}
