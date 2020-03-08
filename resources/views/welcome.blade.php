<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dirpharme | Acceuil</title>
        <link rel="shortcut icon" type="image/png" href="{{ asset('img/logo_msas.png')}}"/>


        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                background-image: url('img/msas.jpg');
                background-size: cover;
                background-attachment: fixed;
                background-repeat: no-repeat;
                background-position: center;
                height: 100%;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
                width: 100%;
                max-width: 100%;
                padding: 15px;
                margin: 0 auto;
                background-color: aliceblue;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else

                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-ms">
                    Direction de la Pharmacie et du Medicament
                </div>

                <div class="links">
                    <a href="#">Docs</a>
                    <a href="{{ url('officine') }}">Officines</a>
                    <a href="{{ route('login') }}">AMM</a>
                    <a href="#">Pharmacovigilance</a>
                    <a href="#">Base de données </a>
                    <a href="#">Blog</a>
                    <!-- <a href="#">GitHub</a> -->
                </div>
            </div>
        </div>
    </body>
</html>
