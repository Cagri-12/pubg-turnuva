<!DOCTYPE html>
<html lang="tr">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $setting->site_name ?? 'SPACE STONE STARS' }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial,Helvetica,sans-serif;
        }

        html{
            scroll-behavior:smooth;
        }

        body{
            background:#070b16;
            color:#fff;
            overflow-x:hidden;
        }

        a{
            text-decoration:none;
            color:inherit;
        }

        img{
            max-width:100%;
            display:block;
        }

        ::-webkit-scrollbar{
            width:10px;
        }

        ::-webkit-scrollbar-thumb{
            background:#7c3aed;
            border-radius:20px;
        }

        .container{
            max-width:1400px;
            margin:auto;
            padding:90px 25px;
        }

    </style>

</head>

<body>

    @include('partials.navbar')

    @include('partials.hero')

    @include('partials.stats')

    @include('partials.features')

    @include('partials.tournaments')

    @include('partials.announcements')

    @include('partials.results')

    @include('partials.contact')

    @include('partials.payment')

    @include('partials.cta')

    @include('partials.footer')

</body>

</html>