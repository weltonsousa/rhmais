@extends('layout/app')
@section('titulo','Lista das Avaliações Supervisor(a) Geradas')
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
                <!-- <a href="{{url('estagiario/exportar')}}">Print  PDF</a> -->
                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <a href="#" class="btn btn-success pull-right"> <i class="fa fa-print"> </i> Relátorio
                                    Avaliação Geradas</a>
                                <h2>Lista das Avaliações Supervisor(a) Geradas</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <table class="table list table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Estagiario
                                                <input type="text" class="form-control">
                                            </th>
                                            <th>Unidade Concedente
                                                <input type="text" class="form-control">
                                            </th>
                                            <th>Supervisor
                                                <input type="text" class="form-control" style="width:100px;">
                                            </th>
                                            <th>Período Avaliativo
                                                <input type="text" class="form-control" style="width:100px;">
                                            </th>
                                            <th>Situação</th>
                                            <th>Opções</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($avaliacoes as $avaliacao)
                                        <tr>
                                            <td>
                                                @foreach ($estagiarios as $estagiario)
                                                    @if ($estagiario->id == $avaliacao->estagiario_id)
                                                        {{$estagiario->nome}}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td style="width:24%;">
                                                @foreach ($empresas as $empresa)
                                                    @if ($empresa->id == $avaliacao->empresa_id)
                                                      {{$empresa->nome_fantasia}}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach ($orientadores as $orientador)
                                                    @if ($orientador->id == $avaliacao->supervisor)
                                                        {{$orientador->nome}}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{{date('d/m/Y', strtotime($avaliacao->periodo_avaliativo))}}</td>
                                            <td>
                                                @if ($avaliacao->status != 1)
                                                Não Assinado
                                                @else
                                                Assinado
                                                @endif
                                            </td>
                                            <td style="width:24%;">
                                                <div class="col-md-3">
                                                    <a href="{{route('assinar.avaliacao.supervisor', [$avaliacao->id])}}" class="btn btn-primary">
                                                        <i class="fa fa-star" title="Marcar como assinado"> </i> </a>
                                                </div>
                                                <a href="/editar_avaliacao_supervisor" class="btn btn-primary">
                                                    <i class="fa fa-pencil" title="Editar"> </i> </a>
                                                    </div>
                                                    <a href="{{route('deletar.avaliacao.supervisor', [$avaliacao->id])}}"
                                                        class="btn btn-danger" title="Excluir">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    </button>
                                                    </form>
                                                    <div class="col-md-3">
                                                        <a href="#" class="btn btn-warning" title="Imprimir"> <i class="fa fa-print"> </i> </a>
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

<!-- footer content -->
@include('layout.footer')
<!-- /footer content -->
</div>
</div>
@endsection
