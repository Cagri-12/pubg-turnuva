<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name','SPACE STONE STARS') }}</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body style="
margin:0;
font-family:Arial,Helvetica,sans-serif;
background:
linear-gradient(rgba(8,11,25,.78),rgba(8,11,25,.88)),
url('{{ asset('images/auth-bg.png') }}') center center/cover no-repeat fixed;
min-height:100vh;
display:flex;
justify-content:center;
align-items:center;
">

<div style="width:100%;max-width:480px;padding:20px;">

    <div style="text-align:center;margin-bottom:30px;">

        <a href="/">

            <img
                src="{{ asset('images/logo.png') }}"
                style="width:120px;margin:auto;">

        </a>

        <h1 style="
            color:white;
            font-size:34px;
            font-weight:bold;
            margin-top:20px;
        ">
            SPACE STONE STARS
        </h1>

        <p style="
            color:#cbd5e1;
            margin-top:8px;
        ">
            PUBG MOBILE Tournament Platform
        </p>

    </div>

    <div style="
    position:relative;
background:rgba(15,23,42,.65);
backdrop-filter:blur(18px);
-webkit-backdrop-filter:blur(18px);

border:1px solid rgba(255,255,255,.10);
border-radius:24px;

padding:40px;

box-shadow:
0 20px 60px rgba(0,0,0,.55),
0 0 30px rgba(124,58,237,.20);

overflow:hidden;
">

<div style="
position:absolute;
top:-120px;
right:-120px;
width:250px;
height:250px;
background:rgba(124,58,237,.18);
filter:blur(80px);
border-radius:50%;
"></div>

{{ $slot }}

</div>

</div>

</body>

</html>