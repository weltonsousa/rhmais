<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Holerite - Estagiario</title>

    <link rel="stylesheet" href="{{ public_path('/css/bootstrap.min.css') }}">
    <style>
        .page-break{
            display: block; page-break-after: always;
        }
        table,
        tr {
            border: 2px solid #999999;
        }
        table td.borda{
            margin-top:-5px!important;
            margin-bottom:-5px!important;
            border:none!important;
        }
        body {
            font-size: 1.05rem;
        }
    </style>
</head>

<body>
    <table class="table" style="max-width: 100%">
        @foreach ($folhaRescisao as $key => $data)
        <tr>
            <td colspan="2">Recibo de Pagamento Bolsa-Auxílio</td>
            <td>Referência</td>
            <td style="text-decoration: underline">{{$data->referencia}}</td>
        </tr>
          @foreach ($rhmais as $rh)
        <tr>
            <td colspan="3">Agente de Integração: <br>{{$rh->razao_social}}</td>
            <td>CNPJ<br>{{$rh->cnpj}}</td>
        </tr>
        @endforeach
        <tr>
            <td colspan="3">Unidade Concedente: <br>{{$data->nome_fantasia}}</td>
            <td>CNPJ <br>{{$data->cnpj}}</td>
        </tr>
        <tr>
            <td colspan="2">Estagiário(a)<br> {{$data->nome}}  - {{$data->cpf}} </td>
            <td colspan="2">
                Data Início:  {{date('d/m/Y', strtotime($data->data_inicio))}} <br>
                Data Fim:     {{date('d/m/Y', strtotime($data->data_fim))}}
            </td>
        </tr>
        <tr>
            <td>Código</td>
            <td>Descrição</td>
            <td>Vencimentos</td>
            <td>Descontos</td>
        </tr>
        <tr>
            <td style="padding-left: 3rem">#</td>
            <td>Bolsa Auxílio</td>
            <td colspan="2">{{$data->valor_bolsa}}</td>
        </tr>
        @foreach ($beneficio as $ben)
        <tr>
            <td  style="padding-left: 3rem" class="borda">{{$ben->beneficio_id}}</td>
            <td class="borda">{{$ben->nome_beneficio}}</td>
            <td class="borda">@if($ben->tipo == 1){{$ben->valor}}@endif</td>
            <td class="borda">@if($ben->tipo == 2){{$ben->valor}}@endif</td>
        </tr>
        @endforeach
        @if($data->faltas) > 0)
        <tr>
            <td  style="padding-left: 3rem" class="borda">#</td>
            <td class="borda">Desconto Faltas Estagio</td>
            <td class="borda"></td>
            <td class="borda">{{number_format($data->valor_falta, 2, '.', '')}}</td>
        </tr>
        @endif
        <tr>
            <td style="padding-right: 3rem">Total de  {{ number_format($data->valor_credito, 2, '.','')}} </td>
            <td colspan="3">Total de Descontos {{number_format($data->valor_desconto, 2,'.','' )}}</td>
        </tr>
        <tr>
            <td colspan="3" style="padding-right: 3rem">Valor Base Bolsa-Auxílio <br>
                 {{ $data->valor_bolsa }}
            </td>
            <td>Valor Líquido<br>
                <u>
                 {{ $data->valor_liquido }}
                </u>
            </td>
        </tr>
        <tr>
            <td colspan="2">Banco/Agência</td>
            <td colspan="2">Conta/Tipo</td>
        </tr>
        <tr>
            <td colspan="4">Mensagem: </td>
        </tr>
    </table>

    <div class="clearfix"></div>
    <div>
        <div style="float: left; margin-left: 3rem">
            ____/_____/_________<br>
            Data
        </div>
        <div style="float: left; margin-left: 12rem">
         <img src="{{ public_path('/images/logo-rhmais.png') }}" alt="" width="80">
        </div>
        <div style="float: right; margin-right: 3rem">
            ______________________________________<br>
            Assinatura
        </div>
    </div>
    <div class="clearfix"></div>

    <hr style="border: dotted 1px black">

    <table class="table" style="max-width: 100%">
        <tr>
            <td colspan="2">Recibo de Pagamento Bolsa-Auxílio</td>
            <td>Referência</td>
            <td>{{$data->referencia}}</td>
        </tr>
         @foreach ($rhmais as $rh)
        <tr>
            <td colspan="3">Agente de Integração: <br>{{$rh->razao_social}}</td>
            <td>CNPJ<br>{{$rh->cnpj}}</td>
        </tr>
        @endforeach
         <tr>
            <td colspan="3">Unidade Concedente: <br>{{$data->nome_fantasia}}</td>
            <td>CNPJ <br>{{$data->cnpj}}</td>
        </tr>
        <tr>
            <td colspan="2">Estagiário(a)<br>{{$data->nome}}  - {{$data->cpf}}</td>
            <td colspan="2">
                Data Início: {{ date('d/m/Y', strtotime($data->data_inicio))}}<br>
                Data Fim:   {{date('d/m/Y', strtotime($data->data_fim))}}
            </td>
        </tr>
        <tr>
            <td>Código</td>
            <td>Descrição</td>
            <td>Vencimentos</td>
            <td>Descontos</td>
        </tr>
       <tr>
            <td style="padding-left: 3rem">#</td>
            <td>Bolsa Auxílio</td>
            <td colspan="2">{{$data->valor_bolsa}}</td>
        </tr>
        @foreach ($beneficio as $ben)
        <tr class="borda">
            <td  style="padding-left: 3rem" class="borda codigo">{{$ben->beneficio_id}}</td>
            <td class="borda">{{$ben->nome_beneficio}}</td>
            <td class="borda">@if($ben->tipo == 1){{$ben->valor}}@endif</td>
            <td class="borda">@if($ben->tipo == 2){{$ben->valor}}@endif</td>
        </tr>
        @endforeach
          @if($data->faltas > 0)
        <tr>
            <td  style="padding-left: 3rem" class="borda">#</td>
            <td class="borda">Desconto Faltas Estagio</td>
            <td class="borda"></td>
            <td class="borda">{{number_format($data->valor_falta, 2,'.','')}}</td>
        </tr>
        @endif
         <tr>
            <td style="padding-right: 3rem">Total de  {{number_format($data->valor_credito, 2,'.','')}}</td>
            <td colspan="3">Total de Descontos {{number_format($data->valor_desconto, 2,'.','')}}</td>
        </tr>
        <tr>
            <td colspan="3" style="padding-right: 3rem">Valor Base Bolsa-Auxílio <br>
                 {{ $data->valor_bolsa }}
                </td>
            <td>Valor Líquido<br>
                <u>
                 {{ $data->valor_liquido }}
                </u>
             </td>
        </tr>
        <tr>
            <td colspan="2">Banco/Agência</td>
            <td colspan="2">Conta/Tipo</td>
        </tr>
        <tr>
            <td colspan="4">Mensagem: </td>
        </tr>
        @endforeach
    </table>

    <div class="clearfix"></div>
    <div>
        <div style="float: left; margin-left: 3rem">
            ____/_____/_________<br>
            Data
        </div>
        <div style="float: left; margin-left: 12rem">

        <img src="{{ public_path('images/logo-rhmais.png') }}" alt="" width="80">
        </div>
        <div style="float: right; margin-right: 3rem">
            ______________________________________<br>
            Assinatura
        </div>
    </div>

</body>
</html>
