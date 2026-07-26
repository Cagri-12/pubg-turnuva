<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SPACE STONE STARS</title>

    <meta name="theme-color" content="#4f46e5">
    <meta name="description" content="SPACE STONE STARS Tournament Management Panel">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">

    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600;700&display=swap" rel="stylesheet" />

    <!-- Admin CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('css/player.css') }}"> --}}

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans antialiased">

<div
    class="min-h-screen"
    style="
        display:flex;
        flex-direction:column;

        background:
            linear-gradient(rgba(5,8,18,.82), rgba(5,8,18,.92)),
            url('{{ asset('images/space-bg.webp') }}');

        background-size:cover;
        background-position:center;
        background-repeat:no-repeat;
        background-attachment:fixed;
">

    @include('layouts.navigation')

    @isset($header)

    <header class="bg-transparent shadow-none">

        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">

            {{ $header }}

        </div>

    </header>

    @endisset

    <main style="flex:1;">

       {{ $slot }}

    </main>

    <footer style="
        margin-top:60px;
        background:#0f172a;
        color:#cbd5e1;
        text-align:center;
        padding:25px;
        border-top:1px solid rgba(255,255,255,.08);
    ">

        <div style="font-size:22px;font-weight:bold;color:white;">
            🎮 SPACE STONE STARS
        </div>

        <div style="margin-top:8px;">
            PUBG MOBILE Tournament Management System
        </div>

        <div style="margin-top:8px;font-size:14px;color:#94a3b8;">
            Version 1.0 • © {{ date('Y') }} All Rights Reserved
        </div>

    </footer>

</div>

</body>

</html>