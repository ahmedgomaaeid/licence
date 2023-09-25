@extends('layouts.front')
@section('title')
لوحة تحكم المشرف
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
                <div class="carts">
                    @foreach ($users as $user)
                        <div class="cart">
                            <p> الاسم : {{$user->name}}</p>
                            <p> رقم الهويه : {{$user->nId}}</p>
                            <p> رقم الهاتف : {{$user->phone}}</p>
                            <p> البريد الالكتروني : {{$user->email}}</p>
                            <p> مركز العمليات : {{$user->operation->name}} </p>
                            <a class="sign-but" href="{{route('admin.approve',$user->id)}}">قبول</a>
                            <a class="sign-but rej" href="{{route('admin.dashboard',$user->id)}}">رفض</a>
                        </div>
                    @endforeach
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
