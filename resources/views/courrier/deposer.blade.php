
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/logo_msas.png')}}"/>

    <title>Service de Gestion des Courriers</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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
        }

        .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: 0 auto;
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
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('courrier.store') }}" enctype="multipart/form-data" class="needs-validation form-signin" novalidate="" >
            @csrf
            <img class="mb-4" src="{{ asset('img/logo_msas.png')}}" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Deposer votre courrier</h1>
            <label for="" class="sr-only">Service Emmetteur</label>
            <input type="text" name="emmetteur" class="form-control" placeholder="Service Emmetteur" required autofocus>
            <br>
            <label for="" class="sr-only">Numero de Telephone</label>
            <input type="text" name="phone" class="form-control" placeholder="Numero de Telephone" required>
            <br>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" name="email" class="form-control" placeholder="Email address" required autofocus>
            <br>
            <label for="inputPassword" class="sr-only">Fichier</label>
            <input type="file" name="fichier" class="form-control" required>
            
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" name="fichier"> Confidentiel
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Deposer</button>
            <p class="mt-5 mb-3 text-muted">&copy; DPM-2020</p>
        </form>
    </body>
</html>
