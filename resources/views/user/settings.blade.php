@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('status-error'))
                        <div class="alert alert-danger">
                            {{ session('status-error') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <div class="row">
                        <div class="col-md-12">
                            <form action="/settings/email" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Email" value="{{auth()->user()->email}}">
                                </div>
                                <button type="submit" class="btn btn-default btn-primary">Alterar Email</button>
                            </form>
                        </div>
                    </div>
                        <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <form action="/settings/phone" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="phone">Telefone</label>
                                    <input type="tel" class="form-control" name="phone" placeholder="Telefone" value="{{auth()->user()->phone}}">
                                </div>
                                <button type="submit" class="btn btn-default btn-primary">Alterar Telefone</button>
                            </form>
                        </div>
                    </div>
                        <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <form action="/settings/change-password" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="password">Senha Atual</label>
                                    <input type="password" class="form-control" name="password" placeholder="Senha Atual">
                                </div>
                                <div class="form-group">
                                    <label for="new-password">Senha nova</label>
                                    <input type="password" class="form-control" name="new-password" placeholder="Senha nova">
                                </div>
                                <div class="form-group">
                                    <label for="new-password-confirmation">Confirmação de senha</label>
                                    <input type="password" class="form-control" name="new-password_confirmation" placeholder="Confirmação de senha">
                                </div>
                                <button type="submit" class="btn btn-default btn-primary">Alterar Senha</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
    $(function($){
        $("[name='phone']").mask("(99)9999-9999?9",{placeholder:"00000-000"});
    });
    </script>
@endsection
