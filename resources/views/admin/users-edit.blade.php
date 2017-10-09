@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="/admin/users">Users</a> /
                    {{$user->name}}</div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="/admin/users/{{$user->id}}/update" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="email">Nome</label>
                                        <input type="text" class="form-control" name="name" placeholder="Email" value="{{$user->name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="Email" value="{{$user->email}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Telefone</label>
                                        <input type="text" class="form-control" name="phone" placeholder="Email" value="{{$user->phone}}">
                                    </div>

                                    <hr>
                                    Endereco
                                    <div class="form-group">
                                        <label for="email">Cep</label>
                                        <input type="text" class="form-control" name="cep" placeholder="cep" value="{{$user->address->cep}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Rua</label>
                                        <input type="text" class="form-control" name="street" placeholder="street" value="{{$user->address->street}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Numero</label>
                                        <input type="text" class="form-control" name="number" placeholder="number" value="{{$user->address->number}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Complemento</label>
                                        <input type="text" class="form-control" name="extra" placeholder="extra" value="{{$user->address->extra}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Cidade</label>
                                        <input type="text" class="form-control" name="city" placeholder="city" value="{{$user->address->city}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Estado</label>
                                        <input type="text" class="form-control" name="state" placeholder="state" value="{{$user->address->state}}">
                                    </div>

                                    <button type="submit" class="btn btn-default btn-primary">Atualizar</button>
                                </form>
                                <a href="/admin/users/{{$user->id}}/delete" class="btn btn-danger pull-right">Excluir</a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
