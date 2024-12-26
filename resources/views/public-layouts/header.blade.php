<header class="bg-white px-6 py-4 shadow-md">
    <!-- Top Row: Logo and Hamburger -->
    <div class="flex items-center justify-between">
        <!-- Logo -->
        <div class="flex items-center">
            <img src="{{ asset('images/logo.png') }}" alt="Loopgoods Logo" class="h-10 w-auto min-h-[90px] min-w-[90px]">
            <span class="ml-2 text-xl font-bold text-[#4EB57C]">LOOPGOODS</span>
        </div>

        <!-- Mobile Menu Button -->
        <button class="md:hidden text-[#4EB57C] focus:outline-none" id="menu-toggle">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>

        <!-- Desktop Navigation Links -->
        <nav class="hidden md:flex">
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
    </div>

    <!-- Mobile Navigation -->
    <nav class="hidden md:hidden mt-4" id="mobile-menu">
        <ul class="flex flex-col items-start gap-4">
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

<script>
    document.getElementById('menu-toggle').addEventListener('click', function () {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });
</script>
