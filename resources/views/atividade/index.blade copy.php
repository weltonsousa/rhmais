@extends('layout/app')
@section('titulo', 'Atividades Relacionadas aos Setores - Listagem | RH MAIS')
@section('conteudo')
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    @include('layout.menu.menu')
                    <br />
                    @include('layout.menu.sidebar')
                </div>
            </div>
            @include('layout.menu.menutop')
            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <!-- <a href="{{ url('cidade/exportar') }}">Print  PDF</a> -->
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            @include('layout.alerta.flash-message')
                            <div class="x_panel">
                                <div class="x_title">
                                    <a href="{{ route('atividade.create') }}" class="btn btn-success pull-right"> <i
                                            class="fa fa-list"> </i> Novo</a>
                                    {{--
                                    <!-- Botão para acionar modal -->
                                    <button type="button" class="btn btn-success pull-right" data-toggle="modal"
                                        data-target="#modalExemplo">
                                        <i class="fa fa-list"> </i> Novo
                                    </button> --}}
                                    <h2>Atividades Relacionadas aos Setores - Listagem</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <table class="table table-striped list table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nome da Atividade
                                                    <input type="text" class="form-control">
                                                </th>
                                                <th>Unidade
                                                    <input type="text" class="form-control">
                                                </th>
                                                <th>Opções</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @foreach ($atividades as $atividade)
                                                    <td>{{ $atividade->nome_atividade }}</td>
                                                    <td>{{ $atividade->empresa->nome_fantasia }}</td>
                                                    <td style="width:15%;">
                                                        <div class="col-md-3">
                                                            <a href="{{ route('atividade.edit', [$atividade->id_atividade]) }}"
                                                                class="btn btn-primary" title="Editar"> <i
                                                                    class="fa fa-pencil"> </i></a>
                                                        </div>
                                                        <form class="col-md-3" style="margin-left:10px;"
                                                            action="{{ route('atividade.destroy', [$atividade->id_atividade]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method("DELETE")
                                                            <button type="submit" class="btn btn-danger"
                                                                data-toggle="tooltip" data-placement="top" title="Excluir"
                                                                onclick="return confirm('Tem certeza que deseja deletar a atividade selecionado?')">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                </div>
                            </div>
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
    </div>
    <!-- /page content -->
    {{-- @include('atividade.modal_add') --}}
    <!-- footer content -->
    @include('layout.footer')
    <!-- /footer content -->
    </div>
    </div>
@endsection
