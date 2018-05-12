@extends('adminlte::page')

@section('title_postfix', 'Setores')

@section('content_header')
    <h1>Editar Setor</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <ol class="breadcrumb panel-heading">
                        <li><a href="{{ route('sectors.index') }}">Setores</a></li>
                        <li class="active">Adicionar</li>
                    </ol>
                    <div class="panel-body">
                        <form action="{{ route('sectors.edit', $sector->id) }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="put">
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input type="text" class="form-control" name="name" placeholder="Nome" required="" value="{{ $sector->name }}">
                            </div>
                            <div class="form-group">
                                <label for="nome">Telefone do setor</label>
                                <input type="text" class="form-control" name="sectorPhone" placeholder="Telefone do setor" required="" value="{{ $sector->sectorPhone }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Email do setor</label>
                                <input type="email" class="form-control" name="sectorEmail" placeholder="Email do setor" required="" value="{{ $sector->sectorEmail }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Responsável</label>
                                <input type="text" class="form-control" name="responsible" placeholder="Responsável" required="" value="{{ $sector->responsible }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Email do Responsável</label>
                                <input type="email" class="form-control" name="responsibleEmail" placeholder="Email do Responsável" required="" value="{{ $sector->responsibleEmail }}">
                            </div>
                            <button type="submit" class="btn btn-success">Adicionar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@stop