@extends('adminlte::page')

@section('title_postfix', 'Equipamentos')

@section('content_header')
    <h1>Editar Patrimônio</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <ol class="breadcrumb panel-heading">
                        <li><a href="{{ route('patrimonies.index') }}">Patrimônios</a></li>
                        <li class="active">Editar</li>
                    </ol>
                    <div class="panel-body">
                        <form action="{{ route('patrimonies.edit', $patrimony->id) }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="put">
                            <input type="hidden" name="enctype" value="multipart/form-data">
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input type="text" class="form-control" name="name" placeholder="Nome" required="" value="{{$patrimony->name}}">
                            </div>
                            <div class="form-group">
                                <label for="category">Categoria</label>
                                <input type="text" class="form-control" name="category" placeholder="Categoria" required="" value="{{$patrimony->category}}">
                            </div>
                            <div class="form-group">
                                <label for="model">Modelo</label>
                                <input type="text" class="form-control" name="model" placeholder="Modelo" required="" value="{{$patrimony->model}}">
                            </div>
                            <div class="form-group">
                                <label for="model">Número de Série</label>
                                <input type="text" class="form-control" name="serialNumber" placeholder="Número de Série" required="" value="{{$patrimony->serialNumber}}">
                            </div>
                            <div class="form-group">
                                <label for="description">Número de Patrimônio</label>
                                <input type="text" class="form-control" name="patrimonyNumber" placeholder="Número de Patrimônio" required="" value="{{$patrimony->patrimonyNumber}}">
                            </div>
                            <div class="form-group">
                                <label for="description">Descrição</label>
                                <input type="text" class="form-control" name="description" placeholder="Descrição" required="" value="{{$patrimony->description}}">
                            </div>
                            <div class="form-group">
                                <label for="local">Local</label>
                                <select class="form-control" name="location">
                                    @foreach($rooms as $room)
                                        <option value="{{ $room->id }}" @if($room->id == $patrimony->location) selected @endif>Prédio: {{ $room->building_name->name }} - Sala: {{ $room->number }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                @if($patrimony->image != null && $patrimony->image != '')
                                    <img src="{{ url('storage/patrimony/'.$patrimony->image) }}" alt="{{ $patrimony->name }}" class="img-responsive" style="max-width: 300px; height: auto;">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="image">Imagem</label>
                                <input type="file" class="form-control" name="image" placeholder="Imagem">
                            </div>
                            <button type="submit" class="btn btn-success">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@stop