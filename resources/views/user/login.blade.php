@extends('layouts.login')
@section('title')
تسجيل الدخول
@endsection
@section('content')
<form method="post" id="form1" action="{{route('login.post')}}">
@csrf

            <div class="box">
                <div class="logo">
                    <img src="{{route('index')}}/assets/imgs/logo.png" width="190"
                        height="100">
                </div>
                <div class="form">
                    @if(session()->has('err'))
            <div class="alert alert-danger" style="color:red;">
                {{session()->get('err')}}
            </div>
            @endif
                    <br>
                    <div class="loginBox">
                        <span id="email_Lable" class="LABLES"> البريد الالكتروني
                            : </span>
                        <input name="email" type="email" placeholder="البريد الالكتروني " id="email"
                            class="Textbox" autocomplete="off">
                    </div>
                    <br>
                    <div class="loginBox">
                        <span id="Password_Lable" class="LABLES">كلمة المرور :
                        </span>
                        <input name="password" type="password" placeholder="كلمة المرور" id="password"
                            class="Textbox">
                        <i></i>
                    </div>
                    <div class="Links">
                        <a id="Signup"
                            href="{{route('register')}}">انشاء حساب</a>
                    </div>

                    <input type="submit" name="LOGIN" value="تسجيل الدخول" id="LOGIN">
                </div>
            </div>
        </form>
@endsection
