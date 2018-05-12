@extends('adminlte::page')

@section('title_postfix', 'Setores')

@section('content_header')
    <h1>Adicionar Setor</h1>
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
                        <li><a href="{{ route('sectors.index') }}">Setores</a></li>
                        <li class="active">Adicionar</li>
                    </ol>
                    <div class="panel-body">
                        <form action="{{ route('sectors.add') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input type="text" class="form-control" name="name" placeholder="Nome" required="">
                            </div>
                            <div class="form-group">
                                <label for="nome">Telefone do setor</label>
                                <input type="text" class="form-control" name="sectorPhone" placeholder="Telefone do setor" required="">
                            </div>
                            <div class="form-group">
                                <label for="description">Email do setor</label>
                                <input type="email" class="form-control" name="sectorEmail" placeholder="Email do setor" required="">
                            </div>
                            <div class="form-group">
                                <label for="description">Responsável</label>
                                <input type="text" class="form-control" name="responsible" placeholder="Responsável" required="">
                            </div>
                            <div class="form-group">
                                <label for="description">Email do Responsável</label>
                                <input type="email" class="form-control" name="responsibleEmail" placeholder="Email do Responsável" required="">
                            </div>
                            
                            <button type="submit" class="btn btn-success">Adicionar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@stop