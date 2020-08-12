<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relatório de Valores - Bolsa Auxílio</title>
    <link rel="stylesheet" href="{{ public_path('/css/bootstrap.min.css') }}">
    <style>
        .tab,
        tr {
            /* border: 2px solid #999999; */
            border: none;
        }
        body {
            font-size: 1.05rem
        }
          table td.borda{
            padding-top: 0px!important;
            padding-bottom: 0px!important;
            border:none!important;
        }
          table td.borda-menor{
            padding-top: 0px!important;
            padding-bottom: 0px!important;
        }
    </style>
</head>

<body>
<img src="{{ public_path('/images/logo-rhmais.png') }}" alt="" style="width:20%; margin-left:40%;">
<h4 class="text-center">Relatório de Valores - Bolsa Auxílio</h4>
<div class="tab">
    <table class="table" style="max-width: 100%">
        @foreach ($folha as $data)
        <tr>
            <td colspan="2" class="borda-menor"><strong> Matrícula:</strong>  {{$data->estagiario_id}}</td>
            <td class="borda-menor"><strong> Estagiário: </strong> {{$data->nome}} </td>
            <td class="borda-menor"><strong> CPF: </strong> {{$data->cpf}}</td>
        </tr>
        @foreach ($empresa as $emp)
        <tr>
            <td class="borda"><strong> Unidade:</strong> {{$emp->nome_fantasia}}</td>
            <td class="borda"><strong> Rua: </strong> {{$emp->rua}} </td>
            <td class="borda"><strong> Nº: </strong>  {{$emp->numero}}</td>
            <td class="borda"><strong> Complemento: </strong>  {{$emp->complemento}}</td>
        </tr>
        <tr>
            <td colspan="2" class="borda"><strong> Cidade:</strong> {{$emp->cidade}}</td>
            <td class="borda"><strong> Bairro: </strong> {{$emp->bairro}} </td>
            <td class="borda"><strong> Telefone: </strong>  {{$emp->telefone}}</td>
        </tr>

        <tr>
            <td class="borda"><strong> Valor Crédito:</strong> {{$data->bolsa}}</td>
            <td class="borda"><strong> Valor Débito: </strong> 0.00 </td>
            <td class="borda"><strong> Valor Líquido: </strong> {{$data->valor_liquido}} </td>
            <td class="borda"><strong> Referência: </strong>{{$data->referencia}} </td>
        </tr>
        <tr>
            <td class="borda"><strong> Banco/A:</strong> </td>
            <td class="borda"><strong> CC/Tipo: </strong>  </td>
            <td class="borda"><strong> Dt Início TCE: </strong> {{date('d/m/Y', strtotime($data->data_inicio))}} </td>
            <td class="borda"><strong> Dt Fim TCE: </strong> {{date('d/m/Y', strtotime($data->data_fim))}} </td>
        </tr>
        <tr>
            <td colspan="2" class="borda"><strong> Valor Pcte: 0.00</strong> </td>
            <td class="borda"><strong> Percentual %: 0.00</strong>  </td>
            <td class="borda"><strong> Valor: </strong> 0.00 </td>
        </tr>
        <tr>
            <td colspan="2" class="borda"><strong> Custo Unitário: {{$emp->custo_unitario}}</strong> </td>
            <td colspan="2" class="borda"><strong> Valor Adicional: 0.00</strong>  </td>
        </tr>
            @endforeach
        @endforeach
    </table>
</div>
</body>

</html>
