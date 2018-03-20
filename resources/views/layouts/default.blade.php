<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>@yield('title')</title>

        <!-- Styles -->
        <link href="/css/app.css" rel="stylesheet">
        <!-- @yield('css') -->
        <!-- Scripts -->
        <script src="/js/app.js"></script>
    </head>
    <body>  
        <div class="grid-x">
            <div class="cell small-8 medium-offset-1">
                <h1>@yield("title")</h1>
            </div>  
            <div class="cell small-3">
                <ul class="menu">
                    @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                    <li >

                        <a href="#">{{ Auth::user()->name }}</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}" 
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" 
                              method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                    @endguest
                </ul>
            </div>  
        </div>
        <div class="grid-x">
            <div class="cell small-8 medium-offset-2">@yield("content")</div>
        </div>
        <script>$(document).foundation();</script>
    </body>
</html>