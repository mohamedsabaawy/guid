<!DOCTYPE html>
<html>
<head>
    <title>@yield('title' ,'Home')</title>

    <meta charset="utf-8"/>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link href="{{asset('front/Home.css')}}" rel="stylesheet" type="text/css">
{{--    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">--}}
</head>


<body>


<header>
    <div class="navbar">
        <div class="container flex">
            <h1 style="color: white">E-Guide</h1>
            <ul>
                <li><a href="{{route('front.welcome')}}">Home</a></li>
                <li><a href="{{route('front.hotel.index')}}">Hotels</a></li>
                <li><a href="{{route('front.restaurant.index')}}">Restaurants</a></li>
                <li><a href="#">Landmarks</a></li>
                @auth('client')
                    <ul style="border:white 2px solid">
                        <li><a href="#" >{{auth('client')->user()->name}}</a></li>
                        <li style="color: white">
                            <form action="{{route('client.logout')}}" method="post">
                                @csrf
                                <button>lohout</button>
{{--                                <input style="" type="submit" value="log out">--}}
                            </form>
                        </li>
                    </ul>
                @else
                    <a href="{{route('client.form.login')}}"> login</a>
                    <a href="{{route('client.form.register')}}"> register</a>
                @endauth
            </ul>
        </div>
    </div>
</header>

<div class="Content">
    @yield('content')
</div>
{{--<script src="{{asset('front/Home.js')}}">--}}
{{--</script>--}}
@stack('script')
</body>
</html>
