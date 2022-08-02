<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <!-- Linking the CSS file -->
    <link rel="stylesheet" href="/css/app.css" type="text/css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

</head>
<body>

    <!-- The Header Class -->
    <div class="header">

         <!-- The Container Class -->
        <div class="container">
            <!-- NavBar -->
            <div class="navbar navbar-expand-md navbar-light">

                <!-- Logo -->
                <div class="logo">
                    <a href="/"><img src="/images/logo.png" alt="" width="75px" height="75px"></a>
                </div>

                <!-- Text-link -->
                <nav>
                    <ul id="MenuItems">
                    <li><a href="/">Home</a></li>
                    @auth
                    @if ( Auth::user()->role == 1)
                    <ul id="MenuItems">
                        <li><a href="{{route('shops.index')}}">Dashboard</a></li>
                        <li><a href="">Services</a></li>

                    @elseif ( Auth::user()->role == 2)
                    <ul id="MenuItems">
                        <li><a href="{{route('shop_dashboard', ['id'=>Auth::id()])}}">Dashboard</a></li>
                        <li><a href="">Services</a></li>

                    @else
                    <ul id="MenuItems">
                        <li><a href="{{route('shops.index')}}">Dashboard</a></li>
                        <li><a href="">Services</a></li>
                    @endif
                    @endauth
                    @auth
                        <li><form class="inline" method="POST" action="/logout">
                            @csrf
                            <button>Logout</button>
                        </form></li>
                    @else
                        <li><a href="/login">Login</a></li>
                        <li><a href="/register">Register</a></li>
                    @endauth
                    </ul>


                </nav>
                 <!-- Image Icon for Cart on the Upper Right-->
                @auth
                    @if ( Auth::user()->role == 2)

                        <a href="{{ route('earnings', ['id'=>Auth::id()] )}}">
                            <img src="/images/laundry-basket.png" alt="" width="30px" height="30px">
                        </a>
                            <img src="/images/menu.png" class="menu-icon" onclick="menutoggle()">
                    @else
                        <a href="{{ route('mycart') }}">
                            <img src="/images/laundry-basket.png" alt="" width="30px" height="30px">
                        </a>
                            <img src="/images/menu.png" class="menu-icon" onclick="menutoggle()">
                    @endif
                @else
                    <a href="/">
                        <img src="/images/laundry-basket.png" alt="" width="30px" height="30px">
                    </a>
                        <img src="/images/menu.png" class="menu-icon" onclick="menutoggle()">
                @endauth

            </div>
        </div>
    </div>


        <main class="py-4">
            @yield('content')
        </main>
</body>
</html>
