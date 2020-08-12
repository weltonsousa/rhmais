@extends('layout/app')
@section('titulo','Rescisões Processadas - Agente Integração | RH MAIS')
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

        <!-- JQuery -->
        <script src="{{URL::asset('js/jquery.min.js')}}"></script>

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <!-- <a href="{{url('estagiario/exportar')}}">Print  PDF</a> -->
                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <br>
                        <div class="x_panel">
                            <div class="x_title">

                                <h2>Rescisões Processados - Agente Integração</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <table class="table table-striped list  table-bordered" style="zoom:0.9;">
                                    <thead>
                                        <tr>
                                            <th>Status</th>
                                            <th>Referência
                                                <input type="text" class="form-control" style="width:100px;">
                                            </th>
                                            <th>Estagiario
                                                <input type="text" class="form-control">
                                            </th>
                                            <th>Un. Concedente
                                                <input type="text" class="form-control">
                                            </th>
                                            <th>Valor da Bolsa
                                                <input type="text" class="form-control" style="width:100px;">
                                            </th>
                                            <th>Valor Liquido
                                                <input type="text" class="form-control" style="width:100px;">
                                            </th>
                                            <th>Opções</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach ($rescisao as $resc)
                                            <td>
                                                @if ($resc->status == 0)
                                                Pendente
                                                @else
                                                Gerado
                                                @endif
                                            </td>
                                            <td>{{ $resc->referencia }}</td>
                                            <td>{{$resc->estagiario->nome}}</td>
                                            <td>{{$resc->empresa->nome_fantasia}}</td>
                                            <td class="dinheiro">{{ $resc->valor_bolsa }}</td>
                                            <td class="dinheiro">{{$resc->valor_liquido }}</td>
                                            <td>
                                                @if ($resc->status != 0)
                                                <a href="{{ route('holerite_rescisao', $resc->id) }}" target="_blank" class="btn btn-success">
                                                    <i class="fa fa-print" title="Imprimir"></i>
                                                </a>
                                                @else
                                                <div class="btn btn-success"><i class="fa fa-print" title="Imprimir"></i></div>
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
    </div>

    <!-- /page content -->

    <!-- footer content -->
    @include('layout.footer')
    <!-- /footer content -->
</div>
</div>
<script>
var und = [];
var ref = [];

$('#unidade-id').bind('change', function(){
   und = $(this).val();
});

$('#referencia').bind('change', function(){
   ref = $(this).val();
 });

    $('#grecibo').click(function(e){
        if(und > 0 && ref != null){
            $('#frm-rescisao').attr("action", '{{route('grecibo-rescisao')}}').attr( 'target','_blank' );
        }else {
            e.preventDefault();
            alert("Escolha ao lado");
        }
      });

      $('#processar').click(function(){
         $('#frm-rescisao').removeAttr('target');
        $('#frm-rescisao').attr("action", '{{route('processarRescisao')}}');
    });

     $('#grelacao').click(function(e){
          if(und > 0 && ref != null){
        $('#frm-rescisao').attr("action", '{{route('grelacao-rescisao')}}').attr( 'target','_blank' );
        }else {
            e.preventDefault();
            alert("Escolha ao lado");
        }
    });
</script>
@endsection
