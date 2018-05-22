@extends('adminlte::page')
@section('header')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/buttons.dataTable.min.js') }}">
@stop
@section('title_postfix', 'Equipamentos')

@section('content_header')
    <h1>Lista de Patrimônios</h1>
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
                            <li class="active">Patrimônios</li>
                        </ol>
                        <div class="panel-body">
                        <p>
                        <div class="btn-group">
                            <button type="button" class="btn btn-success">Opções</button>
                            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('patrimonies.create') }}">Adicionar Patrimônio</a></li>
                                <li><a data-toggle="modal" data-target="#modal-success">Alocar Lote</a></li>
                            </ul>
                        </div>
                            
                            
                        </p>
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
                                    <th>Setor</th>
                                    <th>Imagem</th>
                                    <th>Ação</th>
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
                                            <td>{{ $patrimony->sector_name->name }}</td>
                                            <td>
                                                @if($patrimony->image != null && $patrimony->image != '')
                                                    <img src="{{ url('storage/patrimony/'.$patrimony->image) }}" alt="{{ $patrimony->name }}" class="img-responsive" style="max-width: 100px; max-height: 100px;">
                                                @endif

                                            </td>
                                            <td>
                                                <a class="btn btn-default" href="{{ route('patrimonies.edition', $patrimony->id) }}">Editar</a>
                                                <a class="btn btn-danger" href="javascript:(confirm('Deletar registro?') ? window.location.href = '{{ route('patrimonies.delete', $patrimony->id)}}' : false)">Deletar</a>
                                            </td>
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
    <div class="modal modal-success fade" id="modal-success">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title text-center">Alocação de Patrimônios</h3>
                </div>
                <form action="{{ route('patrimonies.allocate') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="row my-4">
                        <div class="col-sm-12 my-4">
                            <div class="row mt-4">
                                <div class="col-sm-12">                                        
                                    <label for="patrimonies">Locais Disponíveis</label>
                                    <select class="form-control" name="location" required="">
                                        <option value="" selected>Escolha um local</option>
                                        @foreach($rooms as $room)
                                            <option value="{{ $room->id }}">Prédio: {{ $room->building_name->name }} - Sala: {{ $room->number }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="padding-top: 10px;">
                                <div class="col-sm-6">
                                    <label for="nome">Número inicial</label>
                                    <input type="number" class="form-control" name="init_number" placeholder="0" min="0" required="">
                                </div>
                                <div class="col-sm-6">
                                    <label for="nome">Número final</label>
                                    <input type="number" class="form-control" name="final_number" placeholder="0" min="0" required="">
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="modal-footer">                    
                    <button type="submit" class="btn btn-outline">Alocar Patrimônios</button>                               
                    </form>
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    @stop
@section('adminlte_js')
        <script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('js/dataTables.editor.js') }}"></script>
        <script src="{{ asset('js/dataTables.responsive.js') }}"></script>
        <script src="{{ asset('js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('js/jszip.min.js') }}"></script>
        <script src="{{ asset('js/pdfmake.min.js') }}"></script>
        <script src="{{ asset('js/vfs_fonts.js') }}"></script>
        <script src="{{ asset('js/script.js') }}"></script>
        <script src="{{ asset('js/jquery-1.12.4.js') }}"></script>
        <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    @stack('js')
    @yield('js')
@stop
