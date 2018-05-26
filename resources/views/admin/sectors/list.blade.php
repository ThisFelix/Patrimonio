@extends('adminlte::page')

@section('title_postfix', 'Setores')

@section('content_header')
    <h1>Lista de Setores</h1>
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
                            <li class="active">Setores</li>
                        </ol>
                        <div class="panel-body">
                        <p>
                            <a href="{{ route('sectors.create') }}" class="btn btn-success">Adicionar Setor</a>
                        </p>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered" id="sectors">
                                <thead>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Telefone do Setor</th>
                                    <th>Email do Setor</th>
                                    <th>Responsável</th>
                                    <th>Email do responsável</th>
                                    <th>Ação</th>
                                </thead>
                                <tbody>
                                    @foreach($sectors as $sector)
                                        <tr>
                                            <th scope="row">{{ $sector->id }}</th>
                                            <td>{{ $sector->name }}</td>
                                            <td>{{ $sector->sectorPhone }}</td>
                                            <td>{{ $sector->sectorEmail }}</td>
                                            <td>{{ $sector->responsible }}</td>
                                            <td>{{ $sector->responsibleEmail }}</td>
                                            <td>
                                                <a class="btn btn-default" href="{{ route('sectors.edition', $sector->id) }}">Editar</a>
                                                <a class="btn btn-danger" href="javascript:(confirm('Deletar registro?') ? window.location.href = '{{ route('sectors.delete', $sector->id)}}' : false)">Deletar</a>
                                            </td>
                                        </tr>
                                    @endforeach 
                                </tbody>
                            </table>
                        </div>
                        <div align="center">
                            {!! $sectors->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@stop