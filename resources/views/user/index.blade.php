@extends('layouts.front')
@section('dir','ltr')
@section('title')
حوكمة الدخول للمركز
@endsection
@section('content')
<div class="main-banner" id="top" style="visibility: visible;-webkit-animation-duration: 1s; -moz-animation-duration: 1s; animation-duration: 1s;-webkit-animation-delay: 0.5s; -moz-animation-delay: 0.5s; animation-delay: 0.5s;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6 align-self-center">
                        <div class="left-content header-text" style="visibility: visible;-webkit-animation-duration: 1s; -moz-animation-duration: 1s; animation-duration: 1s;-webkit-animation-delay: 1s; -moz-animation-delay: 1s; animation-delay: 1s;">
                            <h2>حوكمة الدخول للمركز الوطني الصحي للقيادة والتحكم ٢٠٢٣ م
                            </h2>
                            <a class="sign-but" href="{{route('register')}}">سجل الان</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="right-image" style="visibility: visible;-webkit-animation-duration: 2s; -moz-animation-duration: 2s; animation-duration: 2s;-webkit-animation-delay: 1s; -moz-animation-delay: 1s; animation-delay: 1s;">
                            <img src="{{route('index')}}/assets/imgs/banner-right-image.png" alt>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
