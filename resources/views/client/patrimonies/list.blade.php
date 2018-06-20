@extends('adminlte::page')

@section('title_postfix', 'Equipamentos')

@section('content_header')
    <h1>Itens para empréstimo</h1>
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
                    <div class="panel-body">
                    </p>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered display" id="patrimonies">
                                <thead>
                                <th>Nome</th>
                                <th>Categoria</th>
                                <th>Modelo</th>
                                <th>Descrição</th>
                                <th>Setor</th>
                                <th>Disponibilidade</th>
                                <th></th>
                                </thead>
                                <tbody>
                                @foreach($patrimonies as $patrimony)
                                    <tr>
                                        <td>{{ $patrimony->name }}</td>
                                        <td>{{ $patrimony->category }}</td>
                                        <td>{{ $patrimony->model }}</td>
                                        <td>{{ $patrimony->description }}</td>
                                        <td>{{ $patrimony->sector_name->name }}</td>
                                        <td>{{ $patrimony->get_count_modelo($patrimony->model) }}</td>
                                        <td class="text-center"><form action="{{ route('patrimoniesForLoan.request') }}" method="POST">{{ csrf_field() }}<input type="hidden" name="model_equip" value="{{ $patrimony->model }}" /><button type="submit" class="btn btn-primary">Solicitar</button></form></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
