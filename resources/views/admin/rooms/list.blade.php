@extends('adminlte::page')

@section('title_postfix', 'Salas')

@section('content_header')
    <h1>Lista de Salas</h1>
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
                            <li class="active">Salas</li>
                        </ol>
                        <div class="panel-body">
                        <p>
                            <a href="{{ route('rooms.create') }}" class="btn btn-success">Adicionar Sala</a>
                        </p>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered" id="rooms">
                                <thead>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Número</th>
                                    <th>Descrição</th>
                                    <th>Prédio</th>
                                    <th>Setor</th>
                                    <th>Ação</th>
                                </thead>
                                <tbody>
                                    @foreach($rooms as $room)
                                        <tr>
                                            <th scope="row">{{ $room->id }}</th>
                                            <td>{{ $room->name }}</td>
                                            <td>{{ $room->number }}</td>
                                            <td>{{ $room->description }}</td>
                                            <td>{{ $room->building_name->name }}</td>
                                            <td>{{ $room->sector_name->name }}</td>
                                            <td>
                                                <a class="btn btn-default" href="{{ route('rooms.edition', $room->id) }}">Editar</a>
                                                <a class="btn btn-danger" href="javascript:(confirm('Deletar registro?') ? window.location.href = '{{ route('rooms.delete', $room->id)}}' : false)">Deletar</a>
                                            </td>
                                        </tr>
                                    @endforeach 
                                </tbody>
                            </table>
                        </div>
                        <div align="center">
                            {!! $rooms->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@stop