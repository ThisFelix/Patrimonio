@extends('adminlte::page')

@section('title_postfix', 'Solicitação')

@section('content_header')
    <div class="col-sm-12">
        <h2>Formulário de Soliticação</h2>
    </div>
@stop

@section('content')
    <style>
    textarea {
        resize: none;
    }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <ol class="breadcrumb panel-heading">
                        <li><a href="{{ route('patrimoniesForLoan') }}">Itens</a></li>
                        <li class="active">Solicitação</li>
                    </ol>
                    <div class="panel-body">
                        <h3>Detalhes do item</h3>
                        <div class="row">
                            <div class="col-sm-5">
                                @if($patrimony[0]->image != null && $patrimony[0]->image != '')
                                    <img src="{{ url('storage/patrimony/'.$patrimony[0]->image) }}" alt="{{ $patrimony[0]->name }}" class="img-responsive">
                                @endif
                            </div>
                            <div class="col-sm-6">
                                <strong>Nome: </strong>{{ $patrimony[0]->name }} <br />
                                <strong>Modelo: </strong>{{ $patrimony[0]->model }} <br />
                                <strong>Descrição: </strong>{{ $patrimony[0]->description }} <br />
                                <strong>Número de série: </strong>{{ $patrimony[0]->serialNumber }} <br />
                                <strong>Número de patrimônio: </strong>{{ $patrimony[0]->patrimonyNumber }} <br />
                            </div>
                        </div>                        
                        <h3>Preencha os dados abaixo (Responsável pela solicitação)</h3>
                        <div class="row">
                            <div class="col-sm-5">
                                <form action="{{ route('patrimoniesForLoan.send_request') }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="patrimony" value="{{ $patrimony[0]->id }}" />
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="nome">Nome completo</label>
                                                <input type="text" class="form-control" name="name" placeholder="Nome" required="">
                                            </div>
                                            <div class="col-sm-6">
                                            <label for="cpf">CPF</label>
                                                <input type="text" class="form-control" name="cpf" placeholder="000.000.000-00" id="cpf" required="">
                                            </div>
                                        </div>                                        
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="description">Data de Retirada</label>
                                                <input type="text" class="form-control" name="borrow_date" placeholder="00/00/0000" id="borrow_date" required="">
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="description">Horário de Retirada</label>
                                                <input type="text" class="form-control" name="borrow_hour" placeholder="00:00" id="hr_borrow" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="description">Data de Entrega</label>
                                                <input type="text" class="form-control" name="return_date" placeholder="00/00/0000" id="return_date" required="">
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="description">Horário de Entrega</label>
                                                <input type="text" class="form-control" name="return_hour" placeholder="00:00" id="return_hr" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="reason">Motivo</label>
                                        <input type="text" class="form-control" name="reason" placeholder="Motivo" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="registry">Prontuário</label>
                                        <input type="text" class="form-control" name="prontuario" placeholder="gu0000000" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="comment">Mensagem</label>
                                        <textarea class="form-control" rows="5" id="message" name="message"></textarea>                                        
                                    </div>
                                    <button type="submit" class="btn btn-success">Solicitar</button>
                                </form>
                            </div>                            
                        </div>             
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('adminlte_js')
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script type="text/javascript">
        $('#return_hr').mask('00:00');
        $('#hr_borrow').mask('00:00');
        $('#return_date').mask('00/00/0000');
        $('#borrow_date').mask('00/00/0000');
        $('#cpf').mask('000.000.000-00');
    </script>
    @stack('js')
    @yield('js')
@stop