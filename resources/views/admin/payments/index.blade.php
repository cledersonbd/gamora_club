@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Pagamentos</div>

                    <div class="panel-body">
                            <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Descrição</th>
                                        <th>Key</th>
                                        <th>Ativo</th>
                                        <th>View</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($payments as $payment)
                                        <tr>
                                            <td>{{$payment->description}}</td>
                                            <td>{{$payment->name}}</td>
                                            <td>{{$payment->active}}</td>
                                            <td>{{$payment->view}}</td>
                                            <td>
                                                <a href="/admin/payments/{{$payment->id}}/edit" class="btn btn-warning">
                                                    Edit
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <td>
                                    <a href="/admin/payments/new" class="btn btn-primary">
                                        Novo
                                    </a>
                                </td>
                            </div>
                            </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
