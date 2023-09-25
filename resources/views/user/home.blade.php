@extends('layouts.front')
@section('title')
حوكمة الدخول للمركز
@endsection
@section('dir','rtl')
@section('content')
<style>
    .main-banner:before {
        background-image: none;
    }

    .sign-but {
        width: 200px;
        margin-top: 20px;
        font-size: 18px;
        font-weight: 400;
    }

    .rej {
        background-color: #e33437;
        color: #fff;
    }

    .carts {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        padding-top: 25px;
    }

    .cart {
        width: 300px;
        border: 3px solid #000;
        margin: 10px;
        padding: 10px;
        text-align: center;
        border-radius: 10px;
    }
    .form-wrap{
	background: rgba(255,255,255,1);
	width: 100%;
	max-width: 850px;
	padding: 50px;
	margin: 0 auto;
	position: relative;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	border-radius: 10px;
	-webkit-box-shadow: 0px 0px 40px rgba(0, 0, 0, 0.15);
	-moz-box-shadow: 0px 0px 40px rgba(0, 0, 0, 0.15);
	box-shadow: 0px 0px 40px rgba(0, 0, 0, 0.15);
}
.form-wrap:before{
	content: "";
	width: 90%;
	height: calc(100% + 60px);
	left: 0;
	right: 0;
	margin: 0 auto;
	position: absolute;
	top: -30px;
	background: #16365d;
	z-index: -1;
	opacity: 0.8;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	border-radius: 10px;
	-webkit-box-shadow: 0px 0px 40px rgba(0, 0, 0, 0.15);
	-moz-box-shadow: 0px 0px 40px rgba(0, 0, 0, 0.15);
	box-shadow: 0px 0px 40px rgba(0, 0, 0, 0.15);
}
.form-group{
	margin-bottom: 25px;
}
.form-group > label{
	display: block;
	font-size: 18px;
	color: #000;
}
.custom-control-label{
	color: #000;
	font-size: 16px;
}
.form-control{
	height: 50px;
	background: #ecf0f4;
	border-color: transparent;
	padding: 0 15px;
	font-size: 16px;
	-webkit-transition: all 0.3s ease-in-out;
	-moz-transition: all 0.3s ease-in-out;
	-o-transition: all 0.3s ease-in-out;
	transition: all 0.3s ease-in-out;
}
.form-control:focus{
	border-color: #16365d;
	-webkit-box-shadow: 0px 0px 20px rgba(0, 0, 0, .1);
	-moz-box-shadow: 0px 0px 20px rgba(0, 0, 0, .1);
	box-shadow: 0px 0px 20px rgba(0, 0, 0, .1);
}
textarea.form-control{
	height: 160px;
	padding-top: 15px;
	resize: none;
}

.btn{
	padding: .657rem .75rem;
	font-size: 18px;
	letter-spacing: 0.050em;
	-webkit-transition: all 0.3s ease-in-out;
	-moz-transition: all 0.3s ease-in-out;
	-o-transition: all 0.3s ease-in-out;
	transition: all 0.3s ease-in-out;
}

.btn-primary {
  color: #fff;
  background-color: #16365d;
  border-color: #16365d;
}

.btn-primary:hover {
  color: #16365d;
  background-color: #ffffff;
  border-color: #16365d;
	-webkit-box-shadow: 0px 0px 20px rgba(0, 0, 0, .1);
	-moz-box-shadow: 0px 0px 20px rgba(0, 0, 0, .1);
	box-shadow: 0px 0px 20px rgba(0, 0, 0, .1);
}

.btn-primary:focus, .btn-primary.focus {
  color: #16365d;
  background-color: #ffffff;
  border-color: #16365d;
  -webkit-box-shadow: 0px 0px 20px rgba(0, 0, 0, .1);
	-moz-box-shadow: 0px 0px 20px rgba(0, 0, 0, .1);
	box-shadow: 0px 0px 20px rgba(0, 0, 0, .1);
}

.btn-primary:not(:disabled):not(.disabled):active, .btn-primary:not(:disabled):not(.disabled).active,
.show > .btn-primary.dropdown-toggle {
  color: #16365d;
  background-color: #ffffff;
  border-color: #16365d;
}

.btn-primary:not(:disabled):not(.disabled):active:focus, .btn-primary:not(:disabled):not(.disabled).active:focus,
.show > .btn-primary.dropdown-toggle:focus {
  -webkit-box-shadow: 0px 0px 20px rgba(0, 0, 0, .1);
	-moz-box-shadow: 0px 0px 20px rgba(0, 0, 0, .1);
	box-shadow: 0px 0px 20px rgba(0, 0, 0, .1);
}
</style>
<div class="main-banner" id="top" style="visibility: visible;-webkit-animation-duration: 1s; -moz-animation-duration: 1s; animation-duration: 1s;-webkit-animation-delay: 0.5s; -moz-animation-delay: 0.5s; animation-delay: 0.5s;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-center main-head pt-4">
                    تسجيل استمارة تصريح
                </h2>
            </div>
            <div class="row" style="margin-top: 50px; color: #58b846;">
                @if($forms != 0)
               <h4 class="text-center"> تم تسجيل استمارة بنجاح </h4>
                @else
                <div class="form-wrap">
                    <form id="survey-form" method="post" action="{{route('add.form')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label style="display:inline;">نوع الطلب</label>
                                    <div class="custom-control custom-radio custom-control-inline" style="display:inline; margin-right:20px">
                                        <input type="radio" id="type1" value="0" name="type" class="custom-control-input" required>
                                        <label class="custom-control-label" for="type1">اضافة</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline" style="display:inline; margin-right:40px;">
                                        <input type="radio" id="type2" value="1" name="type" class="custom-control-input">
                                        <label class="custom-control-label" for="type2">حذف</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label style="display:inline;">السبب</label>
                                    <div class="custom-control custom-radio custom-control-inline" style="display:inline; margin-right:20px">
                                        <input type="radio" id="reson1" value="0" name="reson" class="custom-control-input" required>
                                        <label class="custom-control-label" for="reson1">موظف</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline" style="display:inline; margin-right:40px;">
                                        <input type="radio" id="reson2" value="1" name="reson" class="custom-control-input">
                                        <label class="custom-control-label" for="reson2">متدرب</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline" style="display:inline; margin-right:40px;">
                                        <input type="radio" id="reson3" value="2" name="reson" class="custom-control-input">
                                        <label class="custom-control-label" for="reson3">تمهير</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline" style="display:inline; margin-right:40px;">
                                        <input type="radio" id="reson4" value="3" name="reson" class="custom-control-input">
                                        <label class="custom-control-label" for="reson4">متطوع</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <h2>بيانات الموظف</h2>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label id="name-label" for="name">الاسم</label>
                                    <input type="text" name="name" id="name" placeholder="الاسم" class="form-control" value="{{Auth::user()->name}}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label id="email-label" for="email">رقم الهوية</label>
                                    <input type="text" name="nId" id="email" placeholder="رقم الهوية" class="form-control" value="{{Auth::user()->nId}}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label id="name-label" for="name">الجنسية</label>
                                    <input type="text" name="nationality" id="name" placeholder="الجنسية" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label id="email-label" for="email">الرقم الوظيفي</label>
                                    <input type="text" name="job_number" id="email" placeholder="الرقم الوظيفي" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label id="name-label" for="name">الايميل</label>
                                    <input type="text" name="email" id="name" placeholder="الايميل" class="form-control" value="{{Auth::user()->email}}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label id="email-label" for="email">الوظيفة</label>
                                    <input type="text" name="job" id="email" placeholder="الوظيفة" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <h2>خاص بالادارة المختصة</h2>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label id="name-label" for="name">بداية التصريح</label>
                                    <input type="text" name="start_date" id="name" placeholder="بداية التصريح" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label id="email-label" for="email">نهاية التصريح</label>
                                    <input type="text" name="end_date" id="email" placeholder="نهاية التصريح" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label id="name-label" for="name">الادارة</label>
                                    <input type="text" name="operation" id="name" placeholder="الادارة" class="form-control" value="{{Auth::user()->operation->name}}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label id="email-label" for="email">اسم مدير الادارة</label>
                                    <input type="text" name="operation_admin" id="email" placeholder="اسم مدير الادارة" class="form-control" required>
                                </div>
                            </div>
                        </div>





                        <div class="row">
                            <div class="col-md-4">
                                <button type="submit" id="submit" class="btn btn-primary btn-block">ارسال</button>
                            </div>
                        </div>

                    </form>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
</div>
@endsection
