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
        
        <style>
            html, body {
                background-color: #fff;
                color: #ffffff;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            body {
              background: url({{ asset('img/bg.png')}} ) no-repeat center center fixed;
              -webkit-background-size: cover;
              -moz-background-size: cover;
              background-size: cover;
              -o-background-size: cover;
            }

            img {
                max-width: 100%;
                max-height: 100%;
            }

            button {
                border-radius: 10px;
                border-style: solid;
                background: white;
                color: blue;
                text-decoration: bold;
            }

            input {
                background: transparent;
                border-radius: 20px;
                border-color: white;
                border-style: solid;
                width:100% ;
                text-align: right;
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
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .leftcol {
                text-align:right;
            }

            .rightcol {
                text-align:left;
            }

            .slothin {
                font-size: 38px;
            }
            
            .slothick {
                font-size: 38px;
                font-weight: bold;
            }

            .nopadright {
                padding-right:0px;
            }

            .tip {
                font-size: 10px;
                color: white;
            }

            .thick {
                font-weight: bold;
            }
            a.button {
                -webkit-appearance: button;
                -moz-appearance: button;
                appearance: button;

                text-decoration: none;
                color: initial;
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
                    <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group col-md-6 col-md-offset-6 nopadright">
                            <label for="email">Email</label>
                            <div>
                                <input id="email" type="email" class="myinput" name="email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-md-offset-6 nopadright {{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">Senha</label>
                            <div >
                                <input id="password" type="password" class="myinput" name="password" required>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-md-offset-6">
                                <span class="thin tip">AINDA NÃO É CLUBENS?</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-md-offset-6">
                                <button type="submit" class="btn btn-primary">LOGIN</button>
                                <a href="{{ route('register') }}" class="btn btn-primary">
                                    <span>SEJA CLUBENS</span>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <a href="{{ route('password.request') }}" class="thick tip">ESQUECEU SUA SENHA?</a>
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
