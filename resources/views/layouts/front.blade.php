<!DOCTYPE html>
<html lang="ar" dir="@yield('dir', 'rtl')">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{route('index')}}/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css" integrity="sha512-Ez0cGzNzHR1tYAv56860NLspgUGuQw16GiOOp/I2LuTmpSK9xDXlgJz3XN4cnpXWDmkNBKXR/VDMTCnAaEooxA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <section id="main">
        <nav class="nav-bar">
            <img src="{{route('index')}}/assets/imgs/logo.png" alt="" class="logo">
        </nav>
        @yield('content')
    </section>
</body>
</html>
