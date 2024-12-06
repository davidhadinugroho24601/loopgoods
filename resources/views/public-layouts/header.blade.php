<header>
    <nav>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="{{ route('about') }}">About</a></li>
            <li><a href="{{ route('contact')}}">Contact</a></li>

            <!-- Check if the user is authenticated -->
            @if (Auth::check())
                <!-- If the user is logged in, show the logout link -->
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <!-- If the user is not logged in, show login and signup links -->
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Sign Up</a></li>
            @endif
        </ul>
    </nav>
</header>
