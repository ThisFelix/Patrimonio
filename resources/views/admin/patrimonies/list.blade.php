@extends('adminlte::page')

@section('title_postfix', 'Equipamentos')

@section('content_header')
    <h1>Lista de Patrimônios</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                        <ol class="breadcrumb panel-heading">
                            <li class="active">Patrimônios</li>
                        </ol>
                        <div class="panel-body">
                        <p>
                            <a href="{{ route('patrimonies.create') }}" class="btn btn-success">Adicionar Patrimônio</a>
                        </p>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Categoria</th>
                                    <th>Modelo</th>
                                    <th>Descrição</th>
                                    <th>Local</th>
                                    <th>Imagem</th>
                                    <th>Ação</th>
                                </thead>
                                <tbody>
                                    @foreach($patrimonies as $patrimony)
                                        <tr>
                                            <th scope="row">{{ $patrimony->id }}</td>
                                            <td>{{ $patrimony->name }}</td>
                                            <td>{{ $patrimony->category }}</td>
                                            <td>{{ $patrimony->model }}</td>
                                            <td>{{ $patrimony->description }}</td>
                                            <td>{{ $patrimony->location }}</td>
                                            <td>{{ $patrimony->image }}</td>
                                            <td>
                                                <a class="btn btn-default" href="#">Editar</a>
                                                <a class="btn btn-danger" href="#">Deletar</a>
                                            </td>
                                        </tr>
                                    @endforeach            
                                </tbody>
                            </table>
                        </div>
                        <div align="center">
                            {!! $patrimonies->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@stop