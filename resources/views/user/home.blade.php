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
            <h2 class="text-center main-head pt-4">
                تسجيل استمارة تصريح
            </h2>
            </div>
            <div class="row">
                @if($forms != 0)
                    تم تسجيل استمارة بنجاح
                @else

                @endif
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
