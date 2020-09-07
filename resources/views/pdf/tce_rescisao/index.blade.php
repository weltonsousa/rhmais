<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title> Termo de Conclusão / Rescisão do - TCE </title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ public_path('/css/bootstrap.min.css') }}">
    <style>
        h5,
        p {
            font-size: 8pt;
        }
        .borda{
            border-top:1px solid #000;
        }
        .titulo{
            text-decoration: underline;
        }
        table{
            padding:0px!important;
        }
        table td{
            padding:0px!important;
            border:none!important;
        }
        h4,
            p {
                font-size: 8pt;
            }
        hr {
            padding: 0px !important;
        }
        .fonte-10{
            font-size: 10pt!important;
        }
        .fonte-8{
            font-size: 8pt!important;
        }
    </style>
</head>

<body>
    <img src="{{ public_path('/images/logo-rhmais.png') }}" style="margin-left:270px; width:20%;">
    <h5 class="text-center"><strong> Termo de Conclusão / Rescisão do - TCE </strong></h5>
    <div class="borda"></div>
    <p>Instrumento jurídico de Termo de Compromisso de Estágio e Convênio de Concessão de Estágio, previstos na Lei
        11.788 de
        25/09/2008 que regulamenta e disciplina a contratação de Estagiários.
        As partes a seguir qualificadas, </p>
        <div class="borda"></div>
    <div>
        @foreach ($instituicoes as $inst)
        <h5 class="titulo fonte-8"><strong>INSTITUÍÇÃO DE ENSINO</strong></h5>
        <table class="table">
            <tbody>
                <tr>
                    <td colspan="2">
                        <span class="fonte-8"> Razão Social: </span>
                        <span class="fonte-10">
                        <strong> {{$inst->razao_social}} </strong>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <span class="fonte-8"> CNPJ: </span>
                        <span class="fonte-10">
                        <strong> {{$inst->cnpj}} </strong>
                        </span>
                    </td>
                      <td>
                        <span class="fonte-8"> Telefone: </span>
                        <span class="fonte-10">
                        <strong> {{$inst->telefone}} </strong>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="fonte-8"> Endereço: </span>
                        <span class="fonte-10">
                        <strong> {{$inst->rua}} </strong>
                        </span>
                    </td>
                    <td>
                        <span class="fonte-8"> Nº: </span>
                        <span class="fonte-10">
                        <strong> {{$inst->numero}} </strong>
                        </span>
                    </td>
                    <td>
                        <span class="fonte-8"> Bairro: </span>
                        <span class="fonte-10">
                        <strong> {{$inst->bairro}} </strong>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="fonte-8"> Cidade: </span>
                        <span class="fonte-10">
                        <strong> {{$inst->cidade}} </strong>
                        </span>
                    </td>
                    <td>
                        <span class="fonte-8"> Estado: </span>
                        <span class="fonte-10">
                        <strong> {{$inst->estado}} </strong>
                        </span>
                    </td>
                    <td>
                        <span class="fonte-8"> CEP: </span>
                        <span class="fonte-10">
                        <strong> {{$inst->cep}} </strong>
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="borda"></div>
    @endforeach
    <div>
        @foreach ($empresas as $emp)
        <h5 class="titulo fonte-8"><strong>parte Concedente : {{$emp->nome_fantasia}} </strong></h5>
        <table class="table">
            <tbody>
                <tr>
                    <td colspan="3">
                        <span class="fonte-8"> Razão Social: </span>
                        <span class="fonte-10">
                        <strong> {{$emp->razao_social}} </strong>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <span class="fonte-8"> CNPJ: </span>
                        <span class="fonte-10">
                        <strong> {{$emp->cnpj}} </strong>
                        </span>
                    </td>
                    <td>
                        <span class="fonte-8"> Telefone: </span>
                        <span class="fonte-10">
                        <strong> {{$emp->telefone}} </strong>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="fonte-8"> Endereço: </span>
                        <span class="fonte-10">
                        <strong> {{$emp->rua}} </strong>
                        </span>
                    </td>
                    <td>
                        <span class="fonte-8"> Nº: </span>
                        <span class="fonte-10">
                        <strong> {{$emp->numero}} </strong>
                        </span>
                    </td>
                    <td>
                        <span class="fonte-8"> Bairro: </span>
                        <span class="fonte-10">
                        <strong> {{$emp->bairro}} </strong>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="fonte-8"> Cidade: </span>
                        <span class="fonte-10">
                        <strong> {{$emp->cidade}} </strong>
                        </span>
                    </td>
                    <td>
                        <span class="fonte-8"> Estado: </span>
                        <span class="fonte-10">
                        <strong> {{$emp->estado}} </strong>
                        </span>
                    </td>
                    <td>
                        <span class="fonte-8"> CEP: </span>
                        <span class="fonte-10">
                        <strong> {{$emp->cep}} </strong>
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="borda"></div>
    @endforeach
    <div>
        @foreach ($estagiarios as $est)
        <h5 class="titulo fonte-8"><strong>Estagiário(a).</strong></h5>
        <table class="table">
            <tbody>
                <tr>
                    <td colspan="3">
                        <span class="fonte-8"> Nome: </span>
                        <span class="fonte-10">
                        <strong> {{$est->nome}} </strong>
                        </span>
                    </td>
                    <td>
                        <span class="fonte-8"> Email: </span>
                        <span class="fonte-10">
                        <strong> {{$est->email}} </strong>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <span class="fonte-8"> Endereço: </span>
                        <span class="fonte-10">
                        <strong> {{$est->rua}} </strong>
                        </span>
                    </td>
                    <td>
                        <span class="fonte-8"> Nº: </span>
                        <span class="fonte-10">
                        <strong> {{$est->numero}} </strong>
                        </span>
                    </td>
                    <td>
                        <span class="fonte-8"> Bairro: </span>
                        <span class="fonte-10">
                        <strong> {{$est->bairro}} </strong>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="fonte-8"> Cidade: </span>
                        <span class="fonte-10">
                        <strong> {{$est->cidade}} </strong>
                        </span>
                    </td>
                    <td  colspan="2">
                        <span class="fonte-8"> Estado: </span>
                        <span class="fonte-10">
                        <strong> {{$est->estado}} </strong>
                        </span>
                    </td>
                    <td>
                        <span class="fonte-8"> CEP: </span>
                        <span class="fonte-10">
                        <strong> {{$est->cep}} </strong>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="fonte-8"> CPF: </span>
                        <span class="fonte-10">
                        <strong> {{$est->cpf}} </strong>
                        </span>
                    </td>
                    <td colspan="2">
                        <span class="fonte-8"> Telefone: </span>
                        <span class="fonte-10">
                        <strong> {{$est->telefone}} </strong>
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="borda"></div>
    @endforeach
    <p class="text-justify"> Comunicado de Conclusão / Rescisão do - TCE, termos e condições a seguir: </p>
    @foreach($tceRescisao as $tce)
      <span class="fonte-10">
    <p class="text-justify"> 1) Período Estagiado: de <strong> {{date('d/m/Y', strtotime($tce->data_inicio))}} </strong> a <strong> {{date('d/m/Y', strtotime($tce->ultimo_dia))}} </strong>
    </span>
        @endforeach
    </p>
    <p class="text-justify">
        @foreach ($motivos as $mot)
            <span class="fonte-10">
        2) Motivo da Rescisão : <strong>  {{$mot->nome_motivo}} </strong>
            </span>
        @endforeach

    </p>
    <p class="text-justify">
        @foreach($atividades as $ativ)
           <span class="fonte-10">
        3) Atividade do Estagiário(a): <strong>{{$ativ->nome_atividade}}</strong>
           </span>
        @endforeach
    </p>
    @foreach($tceRescisao as $tce)
    <p class="pull-right"> Campinas, {{ date('d/m/Y', strtotime($tce->data_doc))}}.</p>
    <div style="height:50px;"></div>
@endforeach
    @foreach($empresas as $emp)
    <div class="row">
            <p class="pull-left">________________________________________________________
            <br>
            {{$emp->razao_social}} <br>
        <span>(assinatura e carimbo) </span>
@endforeach
            </p>
                @foreach($instituicoes as $inst)
            <p class="pull-left" style="margin-left:40px; width:320px!important;">
                __________________________________________________________ <br>
                {{$inst->razao_social}} <br>
        <span>(assinatura e carimbo) </span>
@endforeach
            </p>
        </div>
            @foreach($estagiarios as $est)
        <div style="height:100px;"></div>
        <div class="row">
            <p style="margin-left:10px;">
                __________________________________________________________ <br>
                {{$est->nome}}<br>
                (assinatura do(a) estagiário)
            </p>
        </div>
        @endforeach
</body>

</html>
