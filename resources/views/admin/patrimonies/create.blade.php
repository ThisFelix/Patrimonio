@extends('adminlte::page')

@section('title_postfix', 'Equipamentos')

@section('content_header')
    <h1>Adicionar Patrimônio</h1>
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
                        <li><a href="{{ route('patrimonies.index') }}">Patrimônios</a></li>
                        <li class="active">Adicionar</li>
                    </ol>
                    <div class="panel-body">
                        <form action="{{ route('patrimonies.add') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input type="text" class="form-control" name="name" placeholder="Nome" required="">
                            </div>
                            <div class="form-group">
                                <label for="category">Categoria</label>
                                <input type="text" class="form-control" name="category" placeholder="Categoria" required="">
                            </div>
                            <div class="form-group">
                                <label for="model">Modelo</label>
                                <input type="text" class="form-control" name="model" placeholder="Modelo" required="">
                            </div>
                            <div class="form-group">
                                <label for="model">Número de Série</label>
                                <input type="text" class="form-control" name="serialNumber" placeholder="Número de Série" required="">
			    </div>
                                <div class="form-group">
                                  <label for="description">Número de Patrimônio Inicial</label>
                                  <input type="text" class="form-control" name="patrimonyNumber" placeholder="Número de Patrimônio Inicial" required="" id="InitialNumber">
				</div>
                            <div class="patrimonyNumbers">
			    </div>
                            <div class="form-group">
                                <label for="description">Quantidade</label>
                         	<input type="number" class="form-control" name="numberOfPatrimony" placeholder="Quantidade" required="" value="1" id="quantity">
                            </div>
                            <div class="form-group">
                               <label for="description">Descrição</label>
                                <input type="text" class="form-control" name="description" placeholder="Descrição" required="">
                            </div>
                            <div class="form-group">
                                <label for="local">Local</label>
                                <select class="form-control" name="location">
                                    @foreach($rooms as $room)
                                        <option value="{{ $room->id }}">Prédio: {{ $room->building_name->name }} - Sala: {{ $room->number }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">Setor</label>
                                <select class="form-control" name="sector">
                                    @foreach($sectors as $sector)
                                        <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="image">Imagem</label>
                                <input type="file" class="form-control" name="image" placeholder="Imagem">
                            </div>
                            <button type="submit" class="btn btn-success">Adicionar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
 @section('adminlte_js')
    <script src="{{ asset('js/script.js') }}"></script>
    @stack('js')
    @yield('js')
@stop

