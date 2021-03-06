@extends('layout/app')
@section('titulo', 'Estagiários do Sistema | RH MAIS')
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

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <!-- <a href="{{ url('estagiario/exportar') }}">Print  PDF</a> -->
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            @include('layout.alerta.flash-message')
                            <div class="x_panel">
                                <div class="x_title">
                                    <a href="{{ route('estagiario.create') }}" class="btn btn-success pull-right"> <i
                                            class="fa fa-user"> </i> Adicionar Novo Estagiário</a>
                                    <h2>Estagiários</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <table class="table list table-striped table-bordered" style="zoom:0.8;">
                                        <thead>
                                            <tr>
                                                <th>Nome
                                                    <input type="text" class="form-control">
                                                </th>
                                                <th>Unidade
                                                    <input type="text" class="form-control" style="width:100px;">
                                                </th>
                                                <th>Tel.Celular
                                                    <input type="text" class="form-control" style="width:100px;">
                                                </th>
                                                <th>CPF
                                                    <input type="text" class="form-control" style="width:200px;">
                                                </th>
                                                <th>Cidade
                                                    <input type="text" class="form-control" style="width:100px;">
                                                </th>
                                                <th>Data de Nascimento
                                                    <input type="text" class="form-control" style="width:100px;">
                                                </th>
                                                <th>Escolaridade
                                                    <input type="text" class="form-control" style="width:100px;">
                                                </th>
                                                <th>Termino Curso
                                                    <input type="text" class="form-control" style="width:100px;">
                                                </th>
                                                <th>Ativo
                                                    <input type="text" class="form-control" style="width:100px;">
                                                </th>
                                                <th>Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($estagiarios as $estagiario)
                                                <tr>
                                                    <td>{{ $estagiario->nome }}</td>
                                                    <td>{{ $estagiario->empresa->nome_fantasia }}</td>
                                                    <td>{{ $estagiario->celular }}</td>
                                                    <td>{{ $estagiario->cpf }}</td>
                                                    <td>{{ $estagiario->cidade }}</td>
                                                    <td>{{ date('d/m/Y', strtotime($estagiario->data_nascimento)) }}</td>
                                                    <td>{{ $estagiario->curso }}</td>
                                                    <td>{{ date('d/m/Y', strtotime($estagiario->termino_curso)) }}</td>
                                                    <td>
                                                        @if ($estagiario->ativo == '1')
                                                            Sim
                                                        @else
                                                            Não
                                                        @endif
                                                    </td>
                                                    <td style="width:15%;">
                                                        <div class="col-md-3">
                                                            <a href="{!!  route('estagiario.edit', [$estagiario->id_estagiario]) !!}"
                                                                class='btn btn-primary' title="Editar"><i
                                                                    class="fa fa-pencil"></i></a>
                                                        </div>
                                                        <form class="col-md-3" style="margin-left:20px;"
                                                            action="{{ route('estagiario.destroy', [$estagiario->id_estagiario]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method("DELETE")
                                                            <button type="submit" class="btn btn-danger" title="Excluir"
                                                                data-toggle="tooltip" data-placement="top"
                                                                onclick="return confirm('Tem certeza que deseja deletar o estagiário selecionado?')">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
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
        <!-- footer content -->
        @include('layout.footer')
        <!-- /footer content -->
    </div>
    </div>
@endsection
