@extends('layout/app')
@section('titulo','Lista de Seguros - Apólices em Vigência | RH MAIS')
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
          <!-- <a href="{{url('cidade/exportar')}}">Print  PDF</a> -->
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                  <a href="{{route('seguro.create')}}" class="btn btn-success pull-right"> <i class="fa fa-list"> </i> Novo Seguro</a>
                    <h2>Lista de Seguros - Apólices em Vigência</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table class="table table-striped list table-bordered">
                      <thead>
                        <tr>
                          <th>Nome da Seguradora
                          <input type="text" class="form-control" >
                          </th>
                          <th>Nº da Apólice
                          <input type="text" class="form-control" style="width:100px;">
                          </th>
                          <th>Unidade
                          <input type="text" class="form-control">
                          </th>
                          <th>Cobertura
                          <input type="text" class="form-control" style="width:100px;">
                          </th>
                          <th>Ag. Integração
                          <input type="text" class="form-control">
                          </th>
                          <th>Opções</th>
                        </tr>
                      </thead>
                      <tbody>
                         <tr>
                           @foreach ($seguros as $seguro)
                         <td>{{$seguro->nome}}</td>
                         <td>{{$seguro->n_apolice}}</td>
                         <td>{{$seguro->empresa_id}}</td>
                         <td>{{$seguro->agente_integracao}}</td>
                         <td>{{$seguro->cobertura}}</td>
                             <td style="width:15%;">
                            <div class="col-md-3">
                              <a href="{{route('seguro.edit', [$seguro->id])}}" class="btn btn-primary"> <i class="fa fa-pencil"> </i></a>
                            </div>
                            <form class="col-md-3" style="margin-left:10px;" action="{{url('seguro', [$seguro->id])}}" method="POST">
                              <input type="hidden" name="_method" value="DELETE">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <button type="submit" class="btn btn-danger">
                              <i class="fa fa-trash"></i>
                              </button>
                            </form>
                            </div>
                            {{-- <td style="width:15%;">
                          <form class="col-md-3" action="#" method="POST">
    		                  <input type="hidden" name="_method" value="DELETE">
                              <button type="submit" class="btn btn-danger">
                              <i class="fa fa-trash"></i>
                              </button>
                          </form>
                            <div class="col-md-3" style="margin-left:10px;">
                            <a href="#" class="btn btn-primary"> <i class="fa fa-pencil"> </i></a> --}}
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