@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Usuarios</div>

                    <div class="panel-body">
                            <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Descrição</th>
                                        <th>Key</th>
                                        <th>Pagseguro Hash</th>
                                        <th>Ativo</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($plans as $plan)
                                        <tr>
                                            <td>{{$plan->description}}</td>
                                            <td>{{$plan->name}}</td>
                                            <td>{{$plan->hash}}</td>
                                            <td>{{$plan->active}}</td>
                                            <td>
                                                <a href="/admin/plans/{{$plan->id}}/edit" class="btn btn-warning">
                                                    Edit
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <td>
                                    <a href="/admin/plans/new" class="btn btn-primary">
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
