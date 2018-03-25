@extends('adminlte::page')

@section('title_postfix', 'Equipamentos')

@section('content_header')
    <h1>Lista de Patrimônios</h1>
@stop

@section('content')
    <p>
        <a href="#" class="btn btn-success">Adicionar Patrimônio</a>
    </p>

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
                    <td>{{ $patrimony->locale }}</td>
                    <td>{{ $patrimony->image }}</td>
                    <td>
                        <a class="btn btn-default" href="#">Editar</a>
                        <a class="btn btn-danger" href="#">Deletar</a>
                    </td>
                </tr>
            @endforeach            
        </tbody>
    </table>

    <div align="center">
        {!! $patrimonies->links() !!}
    </div>
@stop