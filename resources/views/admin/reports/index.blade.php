@extends('adminlte::page')

@section('title_postfix', 'Relatórios')

@section('content_header')
    <h1>Relatórios <small>escolha um tipo de relatório</small></h1>
@stop

@section('content')
<div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                        <ol class="breadcrumb panel-heading">
                            <li class="active">Gerar Relatório</li>
                        </ol>
                        <div class="panel-body">
                            <div class="col-sm-12">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-3">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success">Listar patrimônios por sala</button>
                                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            @foreach($rooms as $room)
                                                <li><a href="{{ route('reports.room', $room->id) }}">Prédio {{ $room->building_name->name }} - Sala {{ $room->number }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>                     
                                </div>
                                <div class="col-sm-3">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success">Listar patrimônios por setor</button>
                                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            @foreach($sectors as $sector)
                                                <li><a href="{{ route('reports.sector', $sector->id) }}">{{ $sector->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div> 
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
</div>
@stop

