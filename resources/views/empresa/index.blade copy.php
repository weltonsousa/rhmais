@extends('layout/app')
@section('titulo','Empresas | RH MAIS')
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

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
              @include('layout.alerta.flash-message')
                <div class="x_panel">
                  <div class="x_title">
                  <a href="{{route('empresa.create')}}" class="btn btn-success pull-right"> <i class="fa fa-plus"> </i> Adicionar Empresa Parceira</a>
                    <h2>Empresas Parceiras</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table class="table list table-striped table-bordered" style="zoom:0.8;">
                      <thead>
                        <tr>
                          <th>Nome
                          <input type="text" class="form-control">
                          </th>
                          <th>Cidade
                          <input type="text" class="form-control">
                          </th>
                          <th>Telefone
                          <input type="text" class="form-control">
                          </th>
                          <th>CNPJ
                          <input type="text" class="form-control">
                          </th>
                          <th>Custo <br> Unitario
                          <input type="text" class="form-control">
                          </th>
                          <th>Ativo
                          <input type="text" class="form-control">
                          </th>
                          <th>Ação</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($empresas as $empresa)
                         <tr>
                            <td>{{$empresa->nome_fantasia}}</td>
                            <td>{{$empresa->cidade}}</td>
                            <td>{{$empresa->telefone}}</td>
                            <td>{{$empresa->cnpj}}</td>
                            <td class="dinheiro">{{ $empresa->custo_unitario }}</td>
                            <td>
                              @if ($empresa->ativo == '1')
                                Sim
                                @else
                                Não
                              @endif
                            </td>
                            <td style="width:15%;">
                              <div class="col-md-3">
                                <a href="{{ route('empresa.edit',[$empresa->id_empresa])}}" class="btn btn-primary" title="Editar"> <i class="fa fa-pencil"> </i> </a>
                              </div>
                              <form  class="col-md-3" style="margin-left:10px;" action="{{route('empresa.destroy', [$empresa->id_empresa])}}" method="POST">
                                @csrf
                                @method("DELETE")
                              <button type="submit" class="btn btn-danger" title="Excluir" onclick="return confirm('Tem certeza que deseja deletar a empresa selecionada?')">
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
