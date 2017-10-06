<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Clubens</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/outdefault.css') }}" rel="stylesheet">

        <style type="text/css">
            body {
              background: url({{ asset('img/bg.png')}} ) no-repeat center center fixed;
              -webkit-background-size: cover;
              -moz-background-size: cover;
              background-size: cover;
              -o-background-size: cover;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid flex-center full-height">
            <div class="container-fluid row">
                <div class="col-md-6 leftcol">
                <div class="logo">
                        <img src="{{ asset('img/clubens.png') }}">
                    </div>
                    <div class="row slothin">
                        <div class="col-md-6 col-md-offset-6">
                            UM NOVO CONCEITO EM
                        </div>
                    </div>
                    <div class="row slothick">
                        <div class="col-md-6 col-md-offset-6">
                            CLUBE DE BENEFÍCIOS
                        </div>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-md-6 col-md-offset-6 nopadright">
                            <label for="name" >Nome</label>

                            <div>
                                <input id="name" type="text" class="" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-md-6 col-md-offset-6 nopadright">
                            <label for="email" >E-mail</label>

                            <div>
                                <input id="email" type="email" class="" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} col-md-6 col-md-offset-6 nopadright">
                            <label for="password">Senha</label>

                            <div>
                                <input id="password" type="password" class="" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-6 col-md-offset-6 nopadright">
                            <label for="password-confirm">Confirme a Senha</label>

                            <div>
                                <input id="password-confirm" type="password" class="" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group col-md-6 col-md-offset-6 nopadright">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Cadastrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 rightcol">
                    <img src="{{ asset('img/cell.psd.png') }}">
                </div>
            </div>
        </div>

    </body>
</html>

