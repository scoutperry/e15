<!doctype html>
<html lang='en'>
<head>
    <title>@yield('title', 'P3 SooChef')</title>
    <meta charset='utf-8'>


    @yield('head')
</head>
<body>

    @if(session('flash-alert'))
    <div class='flash-alert'>
        {{ session('flash-alert') }}
    </div>
    @endif

    <header>
        <h1>SooChef</h1>
        <nav>
            <ul>
                <li><a href='/'>Home</a></li>

                @if(Auth::user())
                <li><a href='/recipes'>All Recipes</a></li>
                <li><a href='/recipes/create'>Add a Recipe</a></li>
                {{-- <li><a href='/list'>Your List</a></li> --}}
                @endif

                <li><a href='/support'>Support</a></li>

                <li>
                    @if(!Auth::user())
                    <a href='/login'>Login</a>
                    @else
                    <form method='POST' id='logout' action='/logout'>
                        {{ csrf_field() }}
                        <a href='#' onClick='document.getElementById("logout").submit();'>Logout</a>
                    </form>
                    @endif
                </li>
            </ul>
        </nav>
    </header>

    <section>
        @yield('content')
    </section>

    <footer>
    </footer>

</body>
</html>
