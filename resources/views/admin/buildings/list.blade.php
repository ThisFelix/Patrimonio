@extends('adminlte::page')

@section('title_postfix', 'Prédios')

@section('content_header')
    <h1>Lista de Prédios</h1>
@stop

@section('content')
    @if(session('flash_message'))

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div align="center" class="alert {{ session('flash_message')['class'] }}">
                    {{ session('flash_message')['msg'] }}
                </div>
            </div>
        </div>
    </div>

    @endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                        <ol class="breadcrumb panel-heading">
                            <li class="active">Prédios</li>
                        </ol>
                        <div class="panel-body">
                        <p>
                            <a href="{{ route('buildings.create') }}" class="btn btn-success">Adicionar Prédio</a>
                        </p>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Descrição</th>
                                    <th>Ação</th>
                                </thead>
                                <tbody>
                                    @foreach($buildings as $building)
                                        <tr>
                                            <th scope="row">{{ $building->id }}</td>
                                            <td>{{ $building->name }}</td>
                                            <td>{{ $building->description }}</td>
                                            <td>
                                                <a class="btn btn-default" href="{{ route('buildings.edition', $building->id) }}">Editar</a>
                                                <a class="btn btn-danger" href="javascript:(confirm('Deletar registro?') ? window.location.href = '{{ route('buildings.delete', $building->id)}}' : false)">Deletar</a>
                                            </td>
                                        </tr>   
                                    @endforeach        
                                </tbody>
                            </table>
                        </div>
                        <div align="center">
                            {!! $buildings->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@stop