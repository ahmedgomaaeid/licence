<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Operation;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }
    public function login()
    {
        return view('user.login');
    }
    public function postLogin(Request $request)
    {
        if (auth()->guard('web')->attempt(['email' => request('email'), 'password' => request('password')])) {
            return redirect()->route('home');
        }
        return redirect()->back()->with('err', 'اسم المستخدم او كلمة المرور غير صحيحة');
    }
    public function register()
    {
        $operations = Operation::all();
        return view('user.register', compact('operations'));
    }
    public function postRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nId' => 'required|unique:users',
            'password' => 'required|confirmed|min:8',
            'email' => 'required|unique:users',
            'phone' => 'required|unique:users',
            'operation_id' => 'required',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->nId = $request->nId;
        $user->password = bcrypt($request->password);
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->operation_id = $request->operation_id;
        $user->save();
        return redirect()->route('login')->with('err', 'يرجى الانتظار حتى يتم الموافقة على طلبك');
    }
    public function home()
    {
        $user = auth()->guard('web')->user();
        //count number of forms
        $forms = $user->forms->count();
        return view('user.home', compact('user', 'forms'));
    }
    public function addForm(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'reson' => 'required',
            'nationality' => 'required',
            'job' => 'required',
            'job_number' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'operation_admin' => 'required',
        ]);
        $user = auth()->guard('web')->user();
        $form = new Form();
        $form->type = $request->type;
        $form->reson = $request->reson;
        $form->user_id = $user->id;
        $form->nationality = $request->nationality;
        $form->job = $request->job;
        $form->job_number = $request->job_number;
        $form->start_date = $request->start_date;
        $form->end_date = $request->end_date;
        $form->operation_admin = $request->operation_admin;
        $form->save();
        return redirect()->back()->with('success', 'تم ارسال الطلب بنجاح');
    }
    public function logout()
    {
        auth()->guard('web')->logout();
        return redirect()->route('index');
    }
}
