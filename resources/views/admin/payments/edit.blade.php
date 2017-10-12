@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="/admin/payments">Tipos de pagamento</a> /
                    {{$payment->name}}</div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="/admin/payments/{{$payment->id}}/update" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="description">Descrição</label>
                                        <input type="text" class="form-control" name="description" placeholder="Descrição" value="{{$payment->description}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Key</label>
                                        <input type="text" class="form-control" name="name" placeholder="Key" value="{{$payment->name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="hash">Class</label>
                                        <input type="text" class="form-control" name="hash" placeholder="Classe" value="{{$payment->class}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="active">Ativo</label>
                                        <input type="text" class="form-control" name="active" placeholder="Ativo 0 ou 1" value="{{$payment->active}}">
                                    </div>


                                    <button type="submit" class="btn btn-default btn-primary">Atualizar</button>
                                </form>
                                <a href="/admin/payments/{{$payment->id}}/delete" class="btn btn-danger pull-right">Excluir</a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
