@extends('layouts.signup')
@section('title')
انشاء حساب
@endsection
@section('content')
<form method="post" id="form1" class="container" action="{{route('register.post')}}">
    @csrf
    <nav>
        <img src="{{route('index')}}/assets/imgs/logo.png" width="180" height="80">
    </nav>
    <div class="title_div">
        <h4> انشاء حساب جديد : </h4>
    </div>
    <div id="user_form" class="user_forms">
        <div class="main-user-info">
            <div class="user-input-box">
                <label> الاسم ثلاثى : </label>
                <input name="name" type="text" id="Full_Name" placeholder="الاسم ثلاثى " autocomplete="off">
                @error('name')
                        {{$message}}

                    @enderror
            </div>
            <div class="user-input-box">
                <label>رقم الهويه :</label>
                <input name="nId" type="text" onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;" id="Employee_Number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" autocomplete="off" placeholder="رقم الهويه">
                @error('nId')
                        {{$message}}
                    @enderror
            </div>
            <div class="user-input-box">
                <label>رقم الجوال : </label>
                <input name="phone" type="text" maxlength="10" onchange="javascript:setTimeout('__doPostBack(\'Phone\',\'\')', 0)" onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;" id="Phone" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" autocomplete="off" placeholder="0555555555">
                @error('phone')
                        {{$message}}
                    @enderror
            </div>
            <div class="user-input-box">
                <label>البريد الالكتروني : </label>
                <input name="email" type="text" id="Email_address" placeholder="البريد الالكتروني" autocomplete="off">
                 @error('email')
                        {{$message}}
                    @enderror
            </div>
            <div class="user-input-box">
                <label>كلمة المرور</label>
                <input name="password" type="password" id="Password_S" minlength="8" autocomplete="off">
                @error('password')
                        {{$message}}
                    @enderror
            </div>
            <div class="user-input-box">
                <label>تأكيد كلمة المرور :</label>
                <input name="password_confirmation" type="password" id="Confirm" minlength="8" autocomplete="off">
                @error('password_confirmation')
                        {{$message}}
                    @enderror
            </div>
            <div class="user-input-box">
                <label> مركز العمليات :</label>
                <select name="operation_id" id="Operation">
                    @foreach ($operations as $operation)
                        <option value="{{$operation->id}}">{{$operation->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="user-input-box">

                <span id="error_ms" class="error_ms">
                    @if(session()->has('error'))
                        {{session()->get('error')}}
                    @endif
                </span>
            </div>


            <div class="user-input-button ">
                <input type="submit" name="sing_up" value="تسجيل" id="sing_up" class="button button1">
            </div>
            <div class="user-input-button">
                <a href="{{route('login')}}">
                    <input value="تسجيل الدخول" id="Cansel" class="button button2">
                </a>
            </div>
        </div>
    </div>
</form>
@endsection
