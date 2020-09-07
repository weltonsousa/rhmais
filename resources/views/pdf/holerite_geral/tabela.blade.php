<!doctype html>
<html lang="pt-br">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

  <title>Holerite</title>
</head>

<body>

  <div class="container border">
       @foreach ($folha as $key => $data)
    <div class="row">
      <div class="col">Recibo de Pagamento Bolsa-Auxílio</div>
      <div class="col">Referência</div>
      <div class="col">{{$data->referencia}}</div>
    </div>
    <div class="row border">
        @foreach ($rhmais as $rh)
      <div class="col">
        Agente de Integração:
      </div>
      <div class="col">
        {{$rh->razao_social}}
      </div>
      <div class="col">
        {{$rh->cnpj}}
      </div>
    </div>
    <div class="row border">
      <div class="col">Unidade Concedente :</div>
      <div class="col">C.N.P.J.</div>
    </div>
    <div class="row border">
      <div class="col">{{$data->nome_fantasia}}</div>
      <div class="col">{{$data->cnpj}}</div>
    </div>
    <div class="row border">
      <div class="col">Estagiário(a)</div>
      <div class="col">C.P.F</div>
      <div class="col">Data ínicio</div>
      <div class="col">{{date('d/m/Y', strtotime($data->data_inicio))}}</div>
    </div>
    <div class="row border">
      <div class="col">{{$data->nome}}</div>
      <div class="col">{{$data->cpf}}</div>
      <div class="col">Data fim</div>
      <div class="col">{{date('d/m/Y', strtotime($data->data_fim))}}</div>
    </div>
    <div class="row border">
      <div class="col">Código</div>
      <div class="col">Vencimentos</div>
      <div class="col">Descontos</div>
    </div>
    <div class="row border">
      <div class="col">1</div>
      <div class="col">Bolsa Auxílio</div>
      <div class="col">{{$data->valor_bolsa}}</div>
    </div>
    <div class="row border">
      <div class="col">Total de</div>
      <div class="col">Total de descontos</div>
    </div>
    <div class="row border">
      <div class="col">{{ number_format($data->valor_credito, 2, '.','')}}</div>
      <div class="col">{{number_format($data->valor_desconto, 2,'.','' )}}</div>
    </div>
    <div class="row border">
      <div class="col">Valor Base Bolsa-Auxilio</div>
      <div class="col">(=) Valor Liquido</div>
    </div>
    <div class="row border">
      <div class="col"> {{ $data->valor_bolsa }}</div>
      <div class="col">{{ $data->valor_liquido }}</div>
    </div>
    <div class="row border">
      <div class="col">Banco / Agência :</div>
      <div class="col">Conta / Tipo :</div>
    </div>
    <div class="row border">
      <div class="col">Mensagem :</div>
    </div>
    <div class="row">
      <div class="col">___/___/___</div>
      <div class="col">IMAGEM</div>
      <div class="col">_______________</div>
    </div>
    <div class="row">
      <div class="col">Data:</div>
      <div class="col">Assinatura</div>
    </div>
    <div style="margin-bottom: 50px"></div>
     @endforeach
       @endforeach
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
    crossorigin="anonymous"></script>
</body>

</html>