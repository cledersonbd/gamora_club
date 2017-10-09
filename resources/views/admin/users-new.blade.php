@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="/admin/users">Users</a> /
                        Cadastrar</div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="/admin/users/new" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="email">Nome</label>
                                        <input type="text" class="form-control" name="name" placeholder="Email" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="Email" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Telefone</label>
                                        <input type="text" class="form-control" name="phone" placeholder="Email" value="">
                                    </div>

                                    <hr>
                                    Endereco
                                    <div class="form-group">
                                        <label for="email">Cep</label>
                                        <input type="text" class="form-control" name="cep" placeholder="cep" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Rua</label>
                                        <input type="text" class="form-control" name="street" placeholder="street" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Numero</label>
                                        <input type="text" class="form-control" name="number" placeholder="number" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Complemento</label>
                                        <input type="text" class="form-control" name="extra" placeholder="extra" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Cidade</label>
                                        <input type="text" class="form-control" name="city" placeholder="city" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Estado</label>
                                        <input type="text" class="form-control" name="state" placeholder="state" value="">
                                    </div>

                                    <button type="submit" class="btn btn-default btn-primary">Cadastrar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
