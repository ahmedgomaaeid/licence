@extends('layouts.login')
@section('title')
تسجيل دخول مركز العمليات
@endsection
@section('content')
<form method="post" id="form1" action="{{route('operation.login.post')}}">
@csrf
    <div class="box">
        <div class="logo">
            <img src="{{route('index')}}/assets/imgs/logo.png" width="190" height="100">
        </div>
        <div class="form">
            @if(session()->has('err'))
            <div class="alert alert-danger" style="color:red;">
                {{session()->get('err')}}
            </div>
            @endif
            <br>
            <div class="loginBox">
                <span id="User_Name_Lable" class="LABLES"> اسم المستخدم
                    : </span>
                <input name="username" type="text" id="username" class="Textbox" autocomplete="off" placeholder="اسم المستخدم">
            </div>
            <br>
            <div class="loginBox">
                <span id="Password_Lable" class="LABLES">كلمة المرور :
                </span>
                <input name="password" type="password" id="password" placeholder="كلمة المرور" class="Textbox">
                <i></i>
            </div>
            <div class="Links">
            </div>

            <input type="submit" name="LOGIN" value="تسجيل الدخول" id="LOGIN">
        </div>
    </div>
</form>
@endsection
