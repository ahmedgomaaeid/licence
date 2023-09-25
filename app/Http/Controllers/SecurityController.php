<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SecurityController extends Controller
{
    public function login()
    {
        return view('security.login');
    }
    public function postLogin(Request $request)
    {
        if (auth()->guard('security')->attempt(['username' => request('username'), 'password' => request('password')])) {
            return redirect()->route('security.dashboard');
        }
        return redirect()->back()->with('err', 'اسم المستخدم او كلمة المرور غير صحيحة');
    }
    public function index()
    {
        $users = User::where('operation_approve', 1)->where('admin_approve', 1)->get();
        return view('security.index', compact('users'));
    }
    public function logout()
    {
        auth()->guard('security')->logout();
        return redirect()->route('security.login');
    }
}
