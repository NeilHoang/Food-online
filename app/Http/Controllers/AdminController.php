<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function formLogin()
    {
        return view('admin.login.login');
    }

    function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $admin = Admin::where(['name' => $request->username, 'password' => $request->password])->count();
        if ($admin > 0) {
            $adminData = Admin::where(['name' => $request->username, 'password' => $request->password])->get();
            session(['adminData' => $adminData]);
            return redirect(route('home'));
        } else {
            return redirect(route('admin.form'))->with('msg', 'Invalid Username/Password!!');
        }
    }

    function logout()
    {
        session()->forget(['adminData']);
        return redirect(route('admin.form'));
    }
}

