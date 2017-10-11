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
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th>Admin</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->admin}}</td>
                                            <td>
                                                <a href="/admin/users/{{$user->id}}/edit" class="btn btn-warning">
                                                    Edit
                                                </a>
                                                <a class="btn btn-success" href="/admin/{{$user->id}}/grant"
                                                   onclick="event.preventDefault();
                                                     document.getElementById('admin-form-{{$user->id}}').submit();">
                                                    Admin
                                                </a>

                                                <form id="admin-form-{{$user->id}}" action="/admin/{{$user->id}}/grant" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <td>
                                    <a href="/admin/users/new" class="btn btn-primary">
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
