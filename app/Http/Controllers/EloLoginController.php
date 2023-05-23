<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsersModel;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function proses_login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:6',
        ]);

        $users = UsersModel::where([
            'username' => $request->username
        ])->get();


        if (count($users) > 0) {
            if (Hash::Check($request->password, $users[0]->password)) {
                $request->session()->put('login', '1');
                $request->session()->put('username', $users[0]->username);
                $request->session()->put('level', $users[0]->level);
                return redirect('/dashboard');
            } else {
                Alert::warning('Username atau Password salah', '');
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget(['login', 'username', 'level']);
        $request->session()->flush();
        return redirect('/');
    }
}
