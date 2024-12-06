<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
        <title>Document</title>
    <link href="/css/main.css" rel="stylesheet">
    <link href="/bs-css/bootstrap.css" rel="stylesheet">
    <script src="/bs-js/bootstrap.bundle.min.js"></script>

</head>
<body>
<header class="navbar">
    <div class="container">
        <!-- Logo Section -->
        <div class="logo">
            <img src="path/to/your/logo.png" alt="Logo" class="logo-img">
        </div>

        <!-- Navigation Links -->
        <nav class="nav-links">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="{{ route('about')}}">About Us</a></li>
                <li><a href="#">Categories</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>

        <!-- Login & Sign Up Buttons -->
        <div class="auth-buttons">
            <a href="{{ route('login') }}" class="login-btn">Login</a>
            <a href="{{ route('register') }}" class="signup-btn">Sign Up</a>
        </div>
    </div>
</header>