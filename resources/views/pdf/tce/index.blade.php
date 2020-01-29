<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title> TCE - TERMO DE COMPROMISSO DE ESTÁGIO </title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ public_path('/css/bootstrap.min.css') }}">
    <style>
        h5,
        p {
            font-size: 8pt;
        }

        hr {
            padding: 0px !important;
        }
    </style>
</head>

<body>
    <img src="{{ public_path('/images/logo-rhmais.png') }}" style="margin-left:270px; width:20%;">
    {{-- <h1 style="font-size:10pt;">{{ $estagiario }}</h1> --}}
    <h5 class="text-center"><strong> TCE - TERMO DE COMPROMISSO DE ESTÁGIO </strong></h5>
    <hr>
    <p>Pelo presente instrumento particular denominado TERMO DE COMPROMISSO DE ESTÁGIO com base na Lei
        Federal 11.788 de 25/09/2008, as partes abaixo nomeadas no item 1 (um) acordam o que segue </p>
    <hr>
    <div>
        @foreach ($estagiario as $dados)
        <h5><strong>INSTITUÍÇÃO DE ENSINO</strong></h5>
        <p> <strong> Razão Social: </strong> <span class="text-danger"> {{$dados->instituicao_razao}} </span> <strong>
                CNPJ: <span class="text-danger"> {{$dados->instituicao_cnpj}} </span> </strong> </p>
        <p><strong> Endereço: </strong><span class="text-danger"> {{$dados->instituicao_rua}} </span> <span>
                <strong>Nº:</strong></span><span class="text-danger"> {{$dados->instituicao_numero}} </span>
            <span> <strong> Bairro: <span class="text-danger"> {{$dados->instituicao_bairro}} </strong></span> </span>
        </p>
        <p><strong> Cidade: </strong><span class="text-danger"> {{$dados->instituicao_cidade}} </span><span> <strong>UF:
                    <span class="text-danger"> {{$dados->instituicao_estado}} </span></strong> </span>
            <span> <strong> CEP: <span class="text-danger"> </span> {{$dados->instituicao_cep}}</strong></span>
        </p>
        <p> <strong> Representante: <span class="text-danger"> {{$dados->instituicao_nome_rep}} </span> </strong> <span>
                <strong> Cargo: <span class="text-danger"> {{$dados->instituicao_cargo_rep}} </span></strong></span>
        </p>
        <p> <strong> Orientador de estágio: </strong> <span class="text-danger">
            </span>
            <span> <strong> Telefone: </strong><span class="text-danger"> {{$dados->instituicao_telefone}} </span>
            </span>
        </p>
    </div>
    <div>
        <h5><strong>UNIDADE CONCEDENTE</strong></h5>
        <p> <strong> Razão Social: </strong><span class="text-danger"> {{$dados->empresa_razao}} </span><strong> CNPJ:
                <span class="text-danger"> {{$dados->empresa_cnpj}}</span> </strong> </p>
        <p><strong> Endereço: </strong> <span class="text-danger">{{$dados->empresa_rua}} </span> <span>
                <strong>Nº:</strong></span>
            <span class="text-danger"> </span>
            <span> <strong> Bairro: <span class="text-danger"> {{$dados->empresa_bairro}}</span></strong> </span> </p>
        <p><strong> Cidade: </strong><span class="text-danger">{{$dados->empresa_cidade}} </span><span> <strong>UF:
                    <span class="text-danger">{{$dados->empresa_estado}} </span></strong> </span>
            <span> <strong> CEP:<span class="text-danger"> {{$dados->empresa_cep}} </span> </strong></span> <span>
                <strong> Telefone: </strong><span class="text-danger"> {{$dados->empresa_telefone}} </span> </span>
        </p>
        <p> <strong> Representante: </strong> <span class="text-danger"> {{$dados->empresa_nome_rep}}
            </span><span><strong> Cargo: </strong> <span class="text-danger">  </span>
            </span> </span> </p>
        <p> <strong> Supervisor de estágio: </strong>  <span class="text-danger"> </span><span>
                <strong> Cargo:</strong> <span class="text-danger">  </span> </span>
        </p>
        <p> <strong> Formação Acadêmica: </strong> <span class="text-danger"> </span>
        </p>
    </div>
    <hr>
    <div>
        <h5><strong>A UNIDADE CONCEDENTE, juntamente com a INSTITUIÇÃO DE ENSINO, e o ESTUDANTE.</strong></h5>
        <p> <strong> Estudante: </strong> <span class="text-danger"> {{$dados->nome}} </span> <strong></p>
        <p><strong> Endereço: </strong><span class="text-danger"> {{$dados->rua}} </span> <span>
                <strong>Nº:</strong></span>
            <span class="text-danger"> {{$dados->numero}} </span>
            <span> <strong> Bairro: <span class="text-danger"> {{$dados->bairro}} </span> </strong> </span> </p>
        <p><strong> Cidade: </strong><span class="text-danger">{{$dados->cidade}} </span> <span> <strong>UF: <span
                        class="text-danger"> {{$dados->estado}} </span></strong> </span>
            <span> <strong> CEP: <span class="text-danger"> {{$dados->cep}} </span> </strong></span>
        </p>
        <p><strong> Telefone: </strong><span class="text-danger"> {{$dados->celular}} </span> <span> <strong>Email:
                    <span class="text-danger"> {{$dados->email}} </span></strong> </span>
        </p>
        <p><strong> CPF: </strong><span class="text-danger"> {{$dados->cpf}} </span> <span> <strong>RG: <span
                        class="text-danger"> {{$dados->rg}} </span></strong> </span>
            <span> <strong> RA: <span class="text-danger"> </span> </strong></span>
        </p>
        <p><strong> Curso: </strong><span class="text-danger"> </span> <span> <strong>Período/Ano: <span
                        class="text-danger"> </span></strong> </span>
        </p>
    </div>
    @endforeach
    <hr>
    <p class="text-justify">Celebram entre si, através do <strong> Agente de Integração </strong> Koster & Koster
        Consultoria em Recursos Humanos LTDA ME,
        CNPJ: 21.925.427/0001-70, o TERMO DE COMPROMISSO DE ESTÁGIO, de acordo com a Lei n° 11.788/2008, sob
        as seguintes condições: </p>

    <p class="text-justify"> <strong> CLÁUSULA 1ª</strong> - O Termo de Compromisso de Estágio não caracteriza a
        vinculação empregatícia entre o estudante e a
        Unidade Concedente. O presente Termo visa assegurar a complementação de aprendizagem através de treinamento
        prático, integração social e desenvolvimento do Estagiário, com acompanhamento efetivo pelo professor orientador
        de
        estágio da Instituição de Ensino e por supervisor da Parte Concedente. Pode ser OBRIGATORIO ou NÃO
        OBRIGATÓRIO.</p>
    <p class="text-justify"> <strong> CLÁUSULA 2ª </strong> - Este termo de Compromisso de Estágio terá vigência de
        <span class="text-danger">{{$dados->data_inicio}}</span> a <span class="text-danger"> {{$dados->data_fim}}</span>, podendo ser
        rescindido a qualquer momento por qualquer uma das partes sem ônus, multas ou aviso prévio através do Termo de
        Rescisão ou podendo ser prorrogado através de Termo Aditivo.</p>

    <p class="text-justify"> <strong> CLÁUSULA 3ª </strong> - As atividades de estágio se farão de <span
            class="text-danger"> {{$dados->horario}}, perfazendo 30
            horas semanais </span>. A jornada deverá ser compatível com o horário escolar do Estudante, sendo que
        durante as férias ou
        recessos escolares, outra jornada de atividades poderá ser estabelecida entre as partes.
    </p>

    <p class="text-justify"> <strong> CLÁUSULA 4ª </strong> - O estagiário tem direito a <strong> férias remuneradas
        </strong> de 30 (trinta) dias, após doze meses de estágio na mesma
        Empresa ou, o proporcional ao tempo de estágio, se menos de um ano.</p>

    <p class="text-justify"> <strong> CLÁUSULA 5ª </strong> - As atividades desenvolvidas deverão ser compatíveis com o
        Contexto Básico da Profissão do curso do
        estudante.
        ÚNICO - As atividades poderão ser ampliadas, reduzidas, alteradas, substituídas de acordo com a necessidade,
        sendo as
        atividades inicialmente desenvolvidas pelo estudante: </p>
    <p class="text-justify"><span class="text-danger">{{$dados->atividade}}</span>
    </p>
    <p class="text-justify"> <strong> CLÁUSULA 6ª </strong> - A Unidade Concedente remunerará em <span
            class="text-danger"> {{"R$ " .number_format($dados->bolsa, 2)}} </span>, o Estudante, a título de bolsa-
        auxílio, quantia esta que será paga a partir do mês subsequente ao vencimento,<span class="text-danger"> mais
            vale transportes </span>. O valor estabelecido
        poderá variar segundo a sua frequência mensal, grau de escolaridade, atividades desempenhadas, entendimento
        entre as partes
        ou outro motivo qualquer.</p>
    <p class="text-justify"><strong> CLÁUSULA 7ª </strong> - Aplica-se ao estagiário a legislação relacionado a saúde e
        segurança no trabalho, sendo sua implementação
        de responsabilidade da UNIDADE CONCEDENTE do estágio.</p>
    <p class="text-justify">
        <strong> CLÁUSULA 8ª </strong> - O ESTAGIÁRIO deverá cumprir de forma moral, ética e plena, o Programa de
        Estágio e as normas internas
        da UNIDADE CONCEDENTE, preservando o sigilo e a confidencialidade nas informações a que tiver acesso no decorrer
        do
        seu estágio junto a parte Concedente. </p>

    <p class="text-justify"> <strong> CLÁUSULA 9ª </strong> - Sempre que necessário, o estagiário deverá fornecer
        informações para o acompanhamento e supervisão do
        Programa de Estágio, dentro do prazo estipulado. </p>
    <p class="text-justify"> <strong> CLÁUSULA 10ª</strong> - Na eventual conclusão, abandono ou trancamento do curso,
        bem como o não cumprimento das normas
        estabelecidas neste Termo de Compromisso de Estágio, haverá a interrupção automática do referido Termo.</p>

    <p class="text-justify"> <strong> CLÁUSULA 11ª</strong> - Fica a Koster & Koster Consultoria em Recursos Humanos
        LTDA ME como centralizador do processo de
        estágio entre a Unidade Concedente, Instituição de Ensino e o Estudante. Quaisquer alterações que se façam
        necessárias neste
        Termo de Compromisso de Estágio, a Koster & Koster Consultoria em Recursos Humanos LTDA ME deverá ser
        comunicada. </p>

    <p class="text-justify"><strong> CLÁUSULA 12ª</strong> – Na vigência do presente Termo. O Estagiário estará incluído
        na cobertura do Seguro Contra Acidentes
        Pessoais proporcionado através da Seguradora <span class="text-danger"> SULAMÉRICA VIDA SIMPLES </span>, numero
        de proposta/apólice <span class="text-danger"> 6518050001 </span>
        com capital de <span class="text-danger"> R$ 15.678,00 </span> (<span class="text-danger"> Quinze mil seiscentos
            e setenta e oito reais </span>), sob a responsabilidade da Koster & Koster
        Consultoria em Recursos Humanos LTDA ME. </p>
    <p class="text-justify">
        Parágrafo único - O texto completo da Lei Federal 11.788 de 25 de setembro de 2008, em anexo, faz parte
        integrante do
        presente instrumento. </p>
    <h4> DO AGENTE DE INTEGRAÇÃO: </h4>
    <p class="text-justify">
        Atuar como auxiliar no processo de aperfeiçoamento do estágio identificando as oportunidades, ajustando suas
        condições de
        realização, fazendo o acompanhamento administrativo através de verificação in-loco e/ou através de relatórios,
        efetivar o
        Seguro Contra Acidentes Pessoais e cadastrar os estudantes (§1o do art. 5o da Lei no 11.788/08), selecionando os
        locais de
        estágio e organizando o cadastro dos concedentes das oportunidades de estágio (art. 6o da Lei no 11.788/08).
    </p>
    <p class="text-justify"> Parágrafo único: Se durante a vigência deste TCE, o Agente de Integração, em sua condição
        de legitimidade, atribuições e
        responsabilidades que são do conhecimento das partes contratantes, identificar violação dos compromissos
        assumidos por
        quaisquer das partes, cessarão suas responsabilidades legais, técnicas e administrativas, devendo o mesmo
        cientificar, por
        escrito, todas as partes envolvidas.</p>
    <p class="text-justify"> E por assim estarem de acordo, assinam este Termo de Compromisso de Estágio em 4 (quatro)
        vias de igual teor.</p>
    <p>
        <p class="pull-right"> Campinas, <span class="text-danger"> {{$dados->created_at}}. </span> </p>
        <div style="height:50px;"></div>
        <div class="row">
            <p class="pull-left">__________________________________ <br>
                    {{$dados->instituicao_razao}}
            </p>
            <p class="pull-left" style="margin-left:40px;">
                _________________________________ <br>
                {{$dados->empresa_razao}}
            </p>
        </div>
        <br>
        <div class="row">
            <p class="pull-right" style="margin-left:10px;">
                _______________________________________ <br>
                Koster & Koster Consultoria em RH LTDA ME
            </p>
            <p class="pull-left">
                _______________________________<br>
                {{$dados->nome}}
            </p>
            <p class="pull-left" style="margin-left:65px;">
                _________________________________<br>
                 {{$dados->nome_rep}}
            </p>
        </div>
</body>

</html>
