@extends('adminlte::page')

@section('title_postfix', 'Prédios')

@section('content_header')
    <h1>Editar Sala</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <ol class="breadcrumb panel-heading">
                        <li><a href="{{ route('rooms.index') }}">Salas</a></li>
                        <li class="active">Adicionar</li>
                    </ol>
                    <div class="panel-body">
                        <form action="{{ route('rooms.edit', $room->id) }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="put">
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input type="text" class="form-control" name="name" placeholder="Nome" required="" value="{{ $room->name }}">
                            </div>
                            <div class="form-group">
                                <label for="nome">Número</label>
                                <input type="text" class="form-control" name="number" placeholder="Número da Sala" required="" value="{{ $room->number }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Descrição</label>
                                <input type="text" class="form-control" name="description" placeholder="Descrição" required="" value="{{ $room->description }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Prédio</label>
                                <select class="form-control" name="building">
                                    @foreach($buildings as $building)
                                        <option  value="{{ $building->id }}" @if($building->id == $room->building) selected @endif">{{ $building->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">Setor</label>
                                <select class="form-control" name="sector">
                                    @foreach($sectors as $sector)
                                        <option value="{{ $sector->id }}" @if($sector->id == $room->sector) selected @endif">{{ $sector->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-success">Adicionar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@stop