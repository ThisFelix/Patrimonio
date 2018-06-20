@extends('adminlte::page')

@section('title_postfix', 'Solicitações')

@section('content_header')
    <h1>Lista de Solicitações</h1>
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
                        <p>
                        </p>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered display" id="patrimonies">
                                <thead>
                                <th>#</th>
                                <th>Solicitante</th>
                                <th>CPF</th>
                                <th>Prontuário</th>
                                <th>Patrimônio</th>
                                <th>Motivo</th>
                                <th>Status</th>
                                <th>Ações</th>
                                </thead>
                                <tbody>
                                @foreach($requests as $request)
                                    <tr>
                                        <th scope="row">
                                        {{ $request->id }}</td>
                                        <td>{{ $request->name }}</td>
                                        <td>{{ $request->cpf }}</td>
                                        <td>{{ $request->prontuario }}</td>
                                        <td>{{ $request->patrimony }}</td>
                                        <td>{{ $request->reason }}</td>
                                        <td>{{ $request->status }}</td>
                                        <td>
                                            @if($request->status == 'Pendente')
                                            <a class="btn btn-danger"
                                               href="javascript:(confirm('Negar Solicitação?') ? window.location.href = '{{ route('requests.deny', $request->id) }}' : false)">Negar</a>
                                               <a class="btn btn-success"
                                               href="javascript:(confirm('Aceitar Solicitação?') ? window.location.href = '{{ route('requests.accept', $request->id) }}' : false)">Aprovar</a>
                                            @endif
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
    
@stop
@section('adminlte_js')
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.5/js/dataTables.select.min.js"></script>
    @stack('js')
    @yield('js')
@stop
