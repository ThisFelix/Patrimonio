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
                        <form action="{{ route('patrimonies.edit', $patrimony->id) }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="put">
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
                                <label for="description">Descrição</label>
                                <input type="text" class="form-control" name="description" placeholder="Descrição" required="" value="{{$patrimony->description}}">
                            </div>
                            <div class="form-group">
                                <label for="local">Local</label>
                                <input type="text" class="form-control" name="location" placeholder="Nº da Sala" required="" value="{{$patrimony->location}}">
                            </div>
                            <div class="form-group">
                                <label for="image">Imagem</label>
                                <input type="file" class="form-control" name="image" placeholder="Imagem" value="{{$patrimony->image}}">
                            </div>
                            <button type="submit" class="btn btn-success">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@stop