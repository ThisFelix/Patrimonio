@extends('adminlte::page')

@section('title_postfix', 'Relatórios')

@section('content_header')
    <h1>Relatório Gerado</h1>
@stop

@section('content')
<div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                        <ol class="breadcrumb panel-heading">
                            <li><a href="{{ route('reports.index') }}">Gerar Relatório</a></li>
                            <li class="active">Patrimônios (Setor - {{ $sector->name }})</li>
                        </ol>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered display" id="patrimonies">
                                    <thead>
                                        <th>#</th>
                                        <th>Status</th>
                                        <th>Nome</th>
                                        <th>Categoria</th>
                                        <th>Modelo</th>
                                        <th>Número de Série</th>
                                        <th>Número de Patrimônio</th>
                                        <th>Descrição</th>
                                        <th>Local</th>
                                        <th>Imagem</th>
                                    </thead>
                                    <tbody>
                                        @foreach($patrimonies as $patrimony)
                                            <tr>
                                                <th scope="row">{{ $patrimony->id }}</td>
                                                <td>@if($patrimony->status == 1) Disponivel @elseif($patrimony->status == 2) Indisponivel @endif</td>
                                                <td>{{ $patrimony->name }}</td>
                                                <td>{{ $patrimony->category }}</td>
                                                <td>{{ $patrimony->model }}</td>
                                                <td>{{ $patrimony->serialNumber }}</td>
                                                <td>{{ $patrimony->patrimonyNumber }}</td>
                                                <td>{{ $patrimony->description }}</td>
                                                <td>{{ $patrimony->location_name->building_name->name.' '.$patrimony->location_name->number }}</td>
                                                <td>
                                                    @if($patrimony->image != null && $patrimony->image != '')
                                                        <img src="{{ url('storage/patrimony/'.$patrimony->image) }}" alt="{{ $patrimony->name }}" class="img-responsive" style="max-width: 100px; max-height: 100px;">
                                                    @endif

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

