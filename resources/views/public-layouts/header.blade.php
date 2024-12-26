<header class="flex items-center justify-between bg-white px-6 py-4 shadow-md">
    <!-- Logo -->
    <div class="flex items-center">
        <img src="{{ asset('images/logo.png') }}" alt="Loopgoods Logo" class="h-10 w-auto min-h-[90px] min-w-[90px]">
        <span class="ml-2 text-xl font-bold text-[#4EB57C]">LOOPGOODS</span>
    </div>

    <!-- Navigation Links -->
    <nav>
        <ul class="flex items-center gap-6">
            <li><a href="/" class="text-[#4EB57C] hover:text-[#357a5c] transition">Home</a></li>
            <li><a href="{{ route('about') }}" class="text-[#4EB57C] hover:text-[#357a5c] transition">About Us</a></li>
            <li><a href="{{ route('contact') }}" class="text-[#4EB57C] hover:text-[#357a5c] transition">Contact</a></li>

            @if (Auth::check())
                <!-- Logged-in Links -->
                <li><a href="{{ route('dashboard') }}" class="text-[#4EB57C] hover:text-[#357a5c] transition">Dashboard</a></li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-[#4EB57C] hover:text-[#357a5c] transition">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @else
                <!-- Guest Links -->
                <li>
                    <a href="{{ route('login') }}" class="border text-[#4EB57C] border-[#4EB57C] px-4 py-2 rounded transition hover:bg-[#e8f5ec]">Login</a>
                </li>
                <li>
                    <a href="{{ route('register') }}" class="bg-[#4EB57C] text-white px-4 py-2 rounded transition hover:bg-[#357a5c]">Sign Up</a>
                </li>
            @endif
        </ul>
    </nav>
</header>
