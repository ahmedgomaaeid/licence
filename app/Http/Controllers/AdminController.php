<?php

namespace App\Http\Controllers;

use App\Models\Operation;
use App\Models\Security;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::where('operation_approve', 1)->where('admin_approve', 0)->get();
        return view('admin.index', compact('users'));
    }
    public function login()
    {
        return view('admin.login');
    }
    public function postLogin(Request $request)
    {
        if (auth()->guard('admin')->attempt(['username' => request('username'), 'password' => request('password')])) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->back()->with('err', 'اسم المستخدم او كلمة المرور غير صحيحة');
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
    public function approve($id)
    {
        $user = User::find($id);
        $user->admin_approve = 1;
        $user->save();
        return redirect()->back()->with('success', 'تمت الموافقة على الطلب');
    }
    public function disapprove($id)
    {
        $user = User::find($id);
        $user->admin_approve = 2;
        $user->save();
        return redirect()->back()->with('success', 'تم رفض الطلب');
    }
    public function operation()
    {
        $operations = Operation::all();
        return view('admin.operation', compact('operations'));
    }
    public function addOperation(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:operations',
            'password' => 'required',
        ]);
        $operation = new Operation();
        $operation->name = $request->name;
        $operation->username = $request->username;
        $operation->password = bcrypt($request->password);
        $operation->save();
        return redirect()->back()->with('success', 'تمت الاضافة بنجاح');
    }
    public function deleteOperation($id)
    {
        $operation = Operation::find($id);
        $operation->delete();
        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }
    public function security()
    {
        $securities = Security::all();
        return view('admin.security', compact('securities'));
    }
    public function addSecurity(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:operations',
            'password' => 'required',
        ]);
        $security = new security();
        $security->name = $request->name;
        $security->username = $request->username;
        $security->password = bcrypt($request->password);
        $security->save();
        return redirect()->back()->with('success', 'تمت الاضافة بنجاح');
    }
    public function deleteSecurity($id)
    {
        $security = Security::find($id);
        $security->delete();
        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }

}
