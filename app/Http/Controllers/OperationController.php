<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class OperationController extends Controller
{
    public function login()
    {
        return view('operation.login');
    }
    public function postLogin(Request $request)
    {
        if (auth()->guard('operation')->attempt(['username' => request('username'), 'password' => request('password')])) {
            return redirect()->route('operation.dashboard');
        }
        return redirect()->back()->with('err', 'اسم المستخدم او كلمة المرور غير صحيحة');
    }
    public function index()
    {
        $users = User::where('operation_approve', 0)->where('operation_id', auth()->guard('operation')->user()->id)->get();
        return view('operation.index', compact('users'));
    }
    public function approve($id)
    {
        $user = User::find($id);
        $user->operation_approve = 1;
        $user->save();
        return redirect()->back()->with('success', 'تمت الموافقة على العميل');
    }
    public function logout()
    {
        auth()->guard('operation')->logout();
        return redirect()->route('operation.login');
    }
}
