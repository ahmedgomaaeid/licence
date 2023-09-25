@extends('layouts.front')
@section('title')
الامن والسلامة
@endsection
@section('dir','rtl')
@section('content')
<style>
.main-banner:before {
    background-image: none;
}
.sign-but
{
    width: 200px;
    margin-top:20px;
    font-size: 18px;
    font-weight: 400;
}
.rej
{
    background-color: #e33437;
    color: #fff;
}
.carts
{
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    padding-top: 25px;
}
.cart
{
    width: 300px;
    border: 3px solid #000;
    margin: 10px;
    padding: 10px;
    text-align: center;
    border-radius: 10px;
}
.form
{
    width:400px !important;
    margin: auto !important;
    margin-top: 40px !important;
}
.form input
{
 padding: 10px;
 width: 100%;
 margin-bottom: 10px;
 text-align: right;
}
</style>
    <div class="main-banner" id="top"
      style="visibility: visible;-webkit-animation-duration: 1s; -moz-animation-duration: 1s; animation-duration: 1s;-webkit-animation-delay: 0.5s; -moz-animation-delay: 0.5s; animation-delay: 0.5s;">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="row">

                  @include('includes.admin.sidebar')

              </div>
            </div>
            <div class="row">
                <form class="form" action="{{route('admin.add.security')}}" method="post">
                    @csrf
                    <input type="text" name="name" placeholder="الاسم">
                    <input type="text" name="username" placeholder="اسم المستخدم">
                    <input type="password" name="password" placeholder="كلمة المرور">
                    <button type="submit" class="sign-but">اضافة</button>
                </form>
            </div>
            <div class="row">
                <div class="carts">
                    @foreach ($securities as $security)
                        <div class="cart">
                            <p> الاسم : {{$security->name}}</p>
                            <p>  اسم المستخدم : {{$security->username}}</p>
                            <a class="sign-but rej" href="{{route('admin.delete.operation',$security->id)}}">حذف</a>
                        </div>
                    @endforeach
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
