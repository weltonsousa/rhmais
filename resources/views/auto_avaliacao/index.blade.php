@extends('layout/app')
@section('titulo','Auto-Avaliações Estagiário')
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
                                 <a href="{{route('auto_avaliacao.create')}}" class="btn btn-success pull-right"> Gerar Avaliação Estagiário</a>
                                <h2>TCE e Aditivos de Contratos Ativos - Gerar Auto-Avaliações</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <table class="table list table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Estagiario
                                                <input type="text" class="form-control" style="width:200px;">
                                            </th>
                                            <th>Un. Concedente
                                                <input type="text" class="form-control">
                                            </th>
                                            <th>TCE Início/Fim</th>
                                            {{-- <th>Qtd. Realizada</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach ($estagiarios as $estagiario)
                                            <td>{{$estagiario->nome}}</td>
                                            <td>
                                                @foreach ($empresas as $empresa)
                                                    @if ($estagiario->empresa_id == $empresa->id_empresa)
                                                        {{$empresa->nome_fantasia}}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{{date('d/m/Y', strtotime($estagiario->data_inicio)) }} / {{date('d/m/Y', strtotime ($estagiario->data_fim)) }}</td>
                                            {{-- <td style="width:5%;">
                                                  @foreach ($avaliacoes as $avaliacao)
                                                    @if($estagiario->id_estagiario == $avaliacao->estagiario_id)
                                                            {{$avaliacao->qtd}}
                                                    @endif
                                                @endforeach
                                            </td> --}}
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
