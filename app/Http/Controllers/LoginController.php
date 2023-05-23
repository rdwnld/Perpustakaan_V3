<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsersModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function proses_login(Request $request)
    {
        // $validasi = $request->validate([
        //     'username' => 'required',
        //     'password' => 'required|min:6',
        // ]);

        $data = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if (Auth::Attempt($data)) {

            $request->session()->put('login', 1);
            $request->session()->put('username', Auth::user()->username);
            $request->session()->regenerate();
            return redirect('/dashboard');
        } else {
            return redirect('/');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->forget('username', 'login');
        $request->session()->invalidate();
        return redirect('/');
    }
}
