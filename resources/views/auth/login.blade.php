<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/logo_msas.png')}}"/>

    <title>Dirpharme | Authentification</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <!-- Custom styles for this template -->

    <style>
        html,
        body {
        height: 100%;
        }

        body {
        display: -ms-flexbox;
        display: -webkit-box;
        display: flex;
        -ms-flex-align: center;
        -ms-flex-pack: center;
        -webkit-box-align: center;
        align-items: center;
        -webkit-box-pack: center;
        justify-content: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
        background-image: url('img/msas.jpg');
        background-size: cover;
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-position: center;
        height: 100%;
        }

        .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: 0 auto;
        background-color: aliceblue;
        }
        .form-signin .checkbox {
        font-weight: 400;
        }
        .form-signin .form-control {
        position: relative;
        box-sizing: border-box;
        height: auto;
        padding: 10px;
        font-size: 16px;
        }
        .form-signin .form-control:focus {
        z-index: 2;
        }
        .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
        }
        .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        }

    </style>
</head>
<body class="text-center">
    <form method="POST" action="{{ route('login') }}" class="needs-validation form-signin" novalidate="" >
        @csrf
        <img class="mb-4" src="{{ asset('img/logo_msas.png') }}" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Authentification</h1>

        <label for="inputEmail" class="sr-only">Email</label>
        <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" tabindex="1" required autofocus>
        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif

        <label for="inputPassword" class="sr-only">Mot de Passe</label>
        <input id="password" placeholder="Mot de Passe" type="password" class="form-control @error('password') is-invalid @enderror" autocomplete="current-password" name="password" tabindex="2" required>
        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif

        <div class="checkbox mb-3">
            <label>
                <a href="{{ route('password.request') }}">Mot de Passe Oublié?</a> | <a href="{{ route('register')}}">S'incrire</a>
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Se connecter</button>
        <p class="mt-5 mb-3 text-muted">&copy;MSAS-Dirpharme 2020</p>
    </form>
</body>
</html>
