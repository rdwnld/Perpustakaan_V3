<?php

namespace App\Http\Controllers;

use App\Models\UsersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;


class UsersController extends Controller
{
    public function index()
    {
        $users = UsersModel::get();

        $title = 'Hapus User';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('users', compact('users'));
    }

    // CREATE
    public function tambah()
    {
        return view('tambah_user');
    }

    public function userstore(Request $request)
    {

        $request->validate([
            'username'  => 'required|unique:users|max:225',
            'password'  => 'required|min:6',
            'level'     => 'required',
        ]);

        UsersModel::insert([
            'username'  => $request->username,
            'password'  => Hash::make($request->password),
            'level'     => $request->level,
        ]);


        Alert::success('Success', 'Data berhasil di tambah');
        return redirect('/users');
    }
    // CREATE END


    // EDIT
    public function edit($user_id)
    {
        $users = UsersModel::where('user_id', $user_id)->get();

        return view('edit_user', compact('users'));
    }

    public function useredit(Request $request, $user_id)
    {

        $request->validate([
            'username'  => 'required|max:225',
            'level'     => 'required',
        ]);

        if ($request->password == '') {
            UsersModel::where('user_id', $user_id)->update([
                'username'  => $request->username,
                'level'     => $request->level,
            ]);
        } else {
            UsersModel::where('user_id', $user_id)->update([
                'username'  => $request->username,
                'password'  => Hash::make($request->password),
                'level'     => $request->level,
            ]);
        }

        Alert::success('Success', 'Data berhasil di edit');

        return redirect('/users');
    }
    // EDIT END


    // DELETE

    public function delete($user_id)
    {
        UsersModel::where('user_id', $user_id)->delete();

        Alert::success('Success', 'Data berhasil di hapus');

        return redirect('/users');
    }
    // DELETE END
}
